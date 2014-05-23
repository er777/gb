<?php
class FedexComponent extends Component {

////////////////////////////////////////////////////////////

	public $url = 'https://wsbeta.fedex.com/web-services';
	//public $url = 'https://gatewaybeta.fedex.com/web-services/';
	

	public $defaults = array();

	public function startup(Controller $controller, $options=array()) {
		$this->defaults = array_merge((array)$this->defaults, (array)$options);
	}

////////////////////////////////////////////////////////////

	public function getRate($data = null) {

		$xml = $this->buildRequest($data);
		App::uses('HttpSocket', 'Network/Http');
		$httpSocket = new HttpSocket();
		$response = $httpSocket->post($this->url, $xml);

		$dom = new DOMDocument();
		$dom->loadXml($response['body']);

		$results = array();
		$i = 0;

		if ($dom->getElementsByTagName('HighestSeverity')->item(0)->nodeValue == 'FAILURE' || $dom->getElementsByTagName('HighestSeverity')->item(0)->nodeValue == 'ERROR') {
			$error = $dom->getElementsByTagName('HighestSeverity')->item(0)->nodeValue;
		} else {
			$rate_reply_details = $dom->getElementsByTagName('RateReplyDetails');

			foreach ($rate_reply_details as $rate_reply_detail) {
				$code = strtolower($rate_reply_detail->getElementsByTagName('ServiceType')->item(0)->nodeValue);
				$total_net_charge = $rate_reply_detail->getElementsByTagName('RatedShipmentDetails')->item(0)->getElementsByTagName('ShipmentRateDetail')->item(0)->getElementsByTagName('TotalNetCharge')->item(0);
				$cost = $total_net_charge->getElementsByTagName('Amount')->item(0)->nodeValue;
				
				$shipping_residential = (Configure::read('Settings.FEDEX_RESIDENTIAL_FEE'));
				$total_cost = ($cost + $shipping_residential) ;

				$results[$i] = array(
					'ServiceCode'	=> $code,
					'ServiceName'	=> ucwords(str_replace('_', ' ', $code)),
					'ServiceResidential' => (Configure::read('Settings.FEDEX_RESIDENTIAL_FEE')),
					'TotalCharges'	=> sprintf('%.2f', $total_cost)
					
				);
				$i++;
			}
		}

		if (!empty($results)) {
			$results = Hash::sort($results, '{n}.TotalCharges', 'ASC');
			return $results;
		}
		return false;

	}

//////////////////////////////////////////////////

	protected function buildRequest($data = array()) {

		if ($data['Weight'] < 0.1) {
			$data['Weight'] = 0.1;
		}

		if ($data['Weight'] > 70) {
			$data['Weight'] = 70;
		}

		$this->defaults = array_merge((array)$this->defaults, (array)$data);

		$date = time();

		$day = date('l', $date);

		if ($day == 'Saturday') {
			$date += 172800;
		} elseif ($day == 'Sunday') {
			$date += 86400;
		}

		$xml = '<?xml version="1.0"?>
		<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://fedex.com/ws/rate/v10">
			<SOAP-ENV:Body>
				<ns1:RateRequest>
					<ns1:WebAuthenticationDetail>
						<ns1:UserCredential>
							<ns1:Key>' . Configure::read('Settings.FEDEX_KEY') . '</ns1:Key>
							<ns1:Password>' . Configure::read('Settings.FEDEX_PASSWORD') . '</ns1:Password>
						</ns1:UserCredential>
					</ns1:WebAuthenticationDetail>
					<ns1:ClientDetail>
						<ns1:AccountNumber>' . Configure::read('Settings.FEDEX_ACCOUNT') . '</ns1:AccountNumber>
						<ns1:MeterNumber>' . Configure::read('Settings.FEDEX_METER') . '</ns1:MeterNumber>
					</ns1:ClientDetail>
					<ns1:Version>
						<ns1:ServiceId>crs</ns1:ServiceId>
						<ns1:Major>10</ns1:Major>
						<ns1:Intermediate>0</ns1:Intermediate>
						<ns1:Minor>0</ns1:Minor>
					</ns1:Version>
					<ns1:ReturnTransitAndCommit>true</ns1:ReturnTransitAndCommit>
					<ns1:RequestedShipment>
						<ns1:ShipTimestamp>' . date('c', $date) . '</ns1:ShipTimestamp>
						<ns1:DropoffType>REGULAR_PICKUP</ns1:DropoffType>
						<ns1:PackagingType>YOUR_PACKAGING</ns1:PackagingType>
						<ns1:Shipper>
							<ns1:Contact>
								<ns1:PersonName>' . $this->defaults['UserName'] . '</ns1:PersonName>
								<ns1:CompanyName>' . $this->defaults['UserCompany'] . '</ns1:CompanyName>
								<ns1:PhoneNumber>' . $this->defaults['UserPhone'] . '</ns1:PhoneNumber>
							</ns1:Contact>
							<ns1:Address>
								<ns1:StateOrProvinceCode>' . $this->defaults['UserState'] . '</ns1:StateOrProvinceCode>
								<ns1:PostalCode>' . substr($this->defaults['UserZipCode'], 0, 5) . '</ns1:PostalCode>
								<ns1:CountryCode>US</ns1:CountryCode>
							</ns1:Address>
						</ns1:Shipper>
						<ns1:Recipient>
							<ns1:Contact>
								<ns1:PersonName>' . $this->defaults['CustomerFullName'] . '</ns1:PersonName>
								<ns1:CompanyName></ns1:CompanyName>
								<ns1:PhoneNumber>' . $this->defaults['CustomerPhone'] . '</ns1:PhoneNumber>
							</ns1:Contact>
							<ns1:Address>
								<ns1:StreetLines>' . $this->defaults['CustomerAddress'] . '</ns1:StreetLines>
								<ns1:City>' . $this->defaults['CustomerCity'] . '</ns1:City>
								<ns1:StateOrProvinceCode>' . $this->defaults['CustomerState'] . '</ns1:StateOrProvinceCode>
								<ns1:PostalCode>' . substr($this->defaults['CustomerZipCode'], 0, 5) . '</ns1:PostalCode>
								<ns1:CountryCode>US</ns1:CountryCode>
								<ns1:Residential>true</ns1:Residential>
							</ns1:Address>
						</ns1:Recipient>
						<ns1:ShippingChargesPayment>
							<ns1:PaymentType>SENDER</ns1:PaymentType>
							<ns1:Payor>
								<ns1:AccountNumber>' . Configure::read('Settings.FEDEX_ACCOUNT') . '</ns1:AccountNumber>
								<ns1:CountryCode>US</ns1:CountryCode>
							</ns1:Payor>
						</ns1:ShippingChargesPayment>
						<ns1:RateRequestTypes>LIST</ns1:RateRequestTypes>
						<ns1:PackageCount>1</ns1:PackageCount>
						<ns1:RequestedPackageLineItems>
							<ns1:SequenceNumber>1</ns1:SequenceNumber>
							<ns1:GroupPackageCount>1</ns1:GroupPackageCount>
							<ns1:Weight>
								<ns1:Units>LB</ns1:Units>
								<ns1:Value>' . number_format($this->defaults['Weight'], 2, '.', '') . '</ns1:Value>
							</ns1:Weight>
							<ns1:Dimensions>
								<ns1:Length>10</ns1:Length>
								<ns1:Width>10</ns1:Width>
								<ns1:Height>10</ns1:Height>
								<ns1:Units>IN</ns1:Units>
							</ns1:Dimensions>
						</ns1:RequestedPackageLineItems>
					</ns1:RequestedShipment>
				</ns1:RateRequest>
			</SOAP-ENV:Body>
		</SOAP-ENV:Envelope>';

		return $xml;
	}

////////////////////////////////////////////////////////////

}