<?php
App::uses('AppModel', 'Model');
class Shop extends AppModel {

////////////////////////////////////////////////////////////

	public $useTable = false;

////////////////////////////////////////////////////////////

	public function getFormUrl($shop) {

		$xmlRequest = new DOMDocument('1.0','UTF-8');

		$xmlRequest->formatOutput = true;
		$xmlSale = $xmlRequest->createElement('sale');

		$gatewayURL = Configure::read('Settings.NMI_gatewayURL');
		$APIKey = Configure::read('Settings.NMI_APIKey');

		// Amount, authentication, and Redirect-URL are typically the bare mininum.
		$this->appendXmlNode($xmlSale,'api-key', $APIKey);
		$this->appendXmlNode($xmlSale,'redirect-url', $_SERVER['HTTP_REFERER']);
		$this->appendXmlNode($xmlSale, 'amount', $shop['Order']['total']);
		$this->appendXmlNode($xmlSale, 'ip-address', $_SERVER['REMOTE_ADDR']);
		//$this->appendXmlNode($xmlSale, 'processor-id' , 'processor-a');
		$this->appendXmlNode($xmlSale, 'currency', 'USD');
		// $this->appendXmlNode($xmlSale, 'dup-seconds' , '2');

		// Some additonal fields may have been previously decided by user
		$this->appendXmlNode($xmlSale, 'order-id', date('YmdHis'));
		$this->appendXmlNode($xmlSale, 'order-description', 'GB Order');
		// $this->appendXmlNode($xmlSale, 'merchant-defined-field-1' , 'Red');
		// $this->appendXmlNode($xmlSale, 'merchant-defined-field-2', 'Medium');
		$this->appendXmlNode($xmlSale, 'tax-amount' , '0.00');
		$this->appendXmlNode($xmlSale, 'shipping-amount' , $shop['Order']['shipping']);

		/*if(!empty($shop['Order']['customer-vault-id'])) {
			$this->appendXmlNode($xmlSale, 'customer-vault-id' , $shop['Order']['customer-vault-id']);
		}else {
			 $xmlAdd = $xmlRequest->createElement('add-customer');
			 $this->appendXmlNode($xmlAdd, 'customer-vault-id' ,411);
			 $xmlSale->appendChild($xmlAdd);
		}*/

		// Set the Billing and Shipping from what was collected on initial shopping cart form
		$xmlBillingAddress = $xmlRequest->createElement('billing');
		$this->appendXmlNode($xmlBillingAddress,'first-name', $shop['Order']['first_name']);
		$this->appendXmlNode($xmlBillingAddress,'last-name', $shop['Order']['last_name']);
		$this->appendXmlNode($xmlBillingAddress,'address1', $shop['Order']['billing_address']);
		$this->appendXmlNode($xmlBillingAddress,'address2', $shop['Order']['billing_address2']);
		$this->appendXmlNode($xmlBillingAddress,'city', $shop['Order']['billing_city']);
		$this->appendXmlNode($xmlBillingAddress,'state', $shop['Order']['billing_state']);
		$this->appendXmlNode($xmlBillingAddress,'postal', $shop['Order']['billing_zip']);
		$this->appendXmlNode($xmlBillingAddress,'country', 'US');
		$this->appendXmlNode($xmlBillingAddress,'email', $shop['Order']['email']);
		$this->appendXmlNode($xmlBillingAddress,'phone', $shop['Order']['phone']);
		// $this->appendXmlNode($xmlBillingAddress,'company', $shop['Order']['billing-address-company']);
		// $this->appendXmlNode($xmlBillingAddress,'fax', $shop['Order']['billing-address-fax']);
		$xmlSale->appendChild($xmlBillingAddress);

		$xmlShippingAddress = $xmlRequest->createElement('shipping');
		$this->appendXmlNode($xmlShippingAddress,'first-name', $shop['Order']['first_name']);
		$this->appendXmlNode($xmlShippingAddress,'last-name', $shop['Order']['last_name']);
		$this->appendXmlNode($xmlShippingAddress,'address1', $shop['Order']['shipping_address']);
		$this->appendXmlNode($xmlShippingAddress,'address2', $shop['Order']['shipping_address2']);
		$this->appendXmlNode($xmlShippingAddress,'city', $shop['Order']['shipping_city']);
		$this->appendXmlNode($xmlShippingAddress,'state', $shop['Order']['shipping_state']);
		$this->appendXmlNode($xmlShippingAddress,'postal', $shop['Order']['shipping_zip']);
		$this->appendXmlNode($xmlShippingAddress,'country', 'US');
		$this->appendXmlNode($xmlShippingAddress,'phone', $shop['Order']['phone']);
		// $this->appendXmlNode($xmlShippingAddress,'company', $shop['Order']['shipping_company']);
		// $this->appendXmlNode($xmlShippingAddress,'fax', $shop['Order']['shipping-address-fax']);
		$xmlSale->appendChild($xmlShippingAddress);

		// Products already chosen by user
		// $xmlProduct = $xmlRequest->createElement('product');
		// $this->appendXmlNode($xmlProduct,'product-code' , 'SKU-123456');
		// $this->appendXmlNode($xmlProduct,'description' , 'test product description');
		// $this->appendXmlNode($xmlProduct,'commodity-code' , 'abc');
		// $this->appendXmlNode($xmlProduct,'unit-of-measure' , 'lbs');
		// $this->appendXmlNode($xmlProduct,'unit-cost' , '5.00');
		// $this->appendXmlNode($xmlProduct,'quantity' , '1');
		// $this->appendXmlNode($xmlProduct,'total-amount' , '7.00');
		// $this->appendXmlNode($xmlProduct,'tax-amount' , '2.00');

		// $this->appendXmlNode($xmlProduct,'tax-rate' , '1.00');
		// $this->appendXmlNode($xmlProduct,'discount-amount', '2.00');
		// $this->appendXmlNode($xmlProduct,'discount-rate' , '1.00');
		// $this->appendXmlNode($xmlProduct,'tax-type' , 'sales');
		// $this->appendXmlNode($xmlProduct,'alternate-tax-id' , '12345');

		// $xmlSale->appendChild($xmlProduct);

		// $xmlProduct = $xmlRequest->createElement('product');
		// $this->appendXmlNode($xmlProduct,'product-code' , 'a');
		// $this->appendXmlNode($xmlProduct,'description' , 'products');
		// $this->appendXmlNode($xmlProduct,'commodity-code' , 'products');
		// $this->appendXmlNode($xmlProduct,'unit-of-measure' , 'lbs');
		// $this->appendXmlNode($xmlProduct,'unit-cost' , $shop['Order']['total']);
		// $this->appendXmlNode($xmlProduct,'quantity' , '1');
		// $this->appendXmlNode($xmlProduct,'total-amount' , $shop['Order']['total']);
		// $this->appendXmlNode($xmlProduct,'tax-amount' , '2.00');

		// $this->appendXmlNode($xmlProduct,'tax-rate' , '1.00');
		// $this->appendXmlNode($xmlProduct,'discount-amount', '2.00');
		// $this->appendXmlNode($xmlProduct,'discount-rate' , '1.00');
		// $this->appendXmlNode($xmlProduct,'tax-type' , 'sales');
		// $this->appendXmlNode($xmlProduct,'alternate-tax-id' , '12345');

		// $xmlSale->appendChild($xmlProduct);

		$xmlRequest->appendChild($xmlSale);

		// Process Step One: Submit all transaction details to the Payment Gateway except the customer's sensitive payment information.
		// The Payment Gateway will return a variable form-url.

		// print_r($xmlRequest);
		// die;

		$data = $this->sendXMLviaCurl($xmlRequest, $gatewayURL);

		// Parse Step One's XML response
		$gwResponse = @new SimpleXMLElement($data);

		if ((string)$gwResponse->result == 1 ) {
			// The form url for used in Step Two below
			$formURL = $gwResponse->{'form-url'};
			return $formURL;
		} else {
			throw New Exception(print " Error, received " . $data);
		}

}

////////////////////////////////////////////////////////////

	public function sendXMLviaCurl($xmlRequest,$gatewayURL) {
		// helper function demonstrating how to send the xml with curl
		$ch = curl_init(); // Initialize curl handle
		curl_setopt($ch, CURLOPT_URL, $gatewayURL); // Set POST URL

		$headers = array();
		$headers[] = "Content-type: text/xml";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Add http headers to let it know we're sending XML
		$xmlString = $xmlRequest->saveXML();
		curl_setopt($ch, CURLOPT_FAILONERROR, 1); // Fail on errors
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Allow redirects
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return into a variable
		curl_setopt($ch, CURLOPT_PORT, 443); // Set the port number
		curl_setopt($ch, CURLOPT_TIMEOUT, 15); // Times out after 15s
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlString); // Add XML directly in POST
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

		// This should be unset in production use. With it on, it forces the ssl cert to be valid
		// before sending info.
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		if (!($data = curl_exec($ch))) {
			print  "curl error =>" .curl_error($ch) ."\n";
			throw New Exception(" CURL ERROR :" . curl_error($ch));
		}
		curl_close($ch);

		return $data;
	}

////////////////////////////////////////////////////////////

	public function appendXmlNode($parentNode, $name = '', $value = 'value') {
		$tempNode = new DOMElement($name,$value);
		$parentNode->appendChild($tempNode);
	}

////////////////////////////////////////////////////////////

}
