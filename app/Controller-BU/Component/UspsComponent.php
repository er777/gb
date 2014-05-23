<?php
class UspsComponent extends Component {

////////////////////////////////////////////////////////////

	public $defaults = array();

////////////////////////////////////////////////////////////

	public function startup(Controller $controller, $options=array()) {
		$this->defaults = array_merge((array)$this->defaults, (array)$options);
	}

////////////////////////////////////////////////////////////

	public function getRate($data = null) {

		$xml = $this->buildRequest($data);

		$url = 'http://production.shippingapis.com/ShippingAPI.dll?' . 'API=RateV4&XML=' . urlencode($xml);

		$response = @file_get_contents($url);

		$response = str_replace('&amp;lt;sup&amp;gt;&amp;amp;reg;&amp;lt;/sup&amp;gt;', '', $response);

		App::uses('Xml', 'Utility');
		$formattedResponse = Xml::toArray(Xml::build($response));

		$serviceAllowed = array(1, 4);

		$results = array();
		$i = 0;

		if(!empty($formattedResponse['RateV4Response']) && empty($formattedResponse['Error'])) {
			foreach ($formattedResponse['RateV4Response']['Package']['Postage'] as $key => $value) {
				if(in_array($value['@CLASSID'], $serviceAllowed)) {
					$results[$i]['ServiceCode'] = $value['@CLASSID'];
					$results[$i]['ServiceName'] = $value['MailService'];
					$results[$i]['TotalCharges'] = sprintf('%.2f', $value['Rate']);
					$i++;
				}
			}
		}

		if (!empty($results)) {

			$results = Hash::sort($results, '{n}.TotalCharges', 'ASC');

			return $results;
		}
		return false;

	}

////////////////////////////////////////////////////////////

	protected function buildRequest($data = array()) {

		if ($data['Weight'] < 0.1) {
			$data['Weight'] = 0.1;
		}

		if ($data['Weight'] > 70) {
			$data['Weight'] = 70;
		}

		$this->defaults = array_merge((array)$this->defaults, (array)$data);

		$weight = ($this->defaults['Weight'] < 0.1 ? 0.1 : $this->defaults['Weight']);
		$pounds = floor($weight);
		$ounces = round(16 * ($weight - $pounds), 2);

		$xml = '<RateV4Request USERID="' . Configure::read('Settings.USPS_USERID') . '">
					<Package ID="1">
						<Service>ALL</Service>
						<ZipOrigination>' . substr($this->defaults['UserZipCode'], 0, 5) . '</ZipOrigination>
						<ZipDestination>' . substr($this->defaults['CustomerZipCode'], 0, 5) .'</ZipDestination>
						<Pounds>' . $pounds . '</Pounds>
						<Ounces>' . $ounces . '</Ounces>
						<Container>Variable</Container>
						<Size>Regular</Size>
						<Width>5</Width>
						<Length>5</Length>
						<Height>5</Height>
						<Girth>' . (round(((float)1 + (float)1 * 2 + 1 * 2), 1)) . '</Girth>
						<Machinable>false</Machinable>
					</Package>
				</RateV4Request>';

		return $xml;

	}

////////////////////////////////////////////////////////////

}