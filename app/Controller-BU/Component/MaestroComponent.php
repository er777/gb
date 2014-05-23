<?php
class MaestroComponent extends Component {

////////////////////////////////////////////////////////////

	public $defaults = array();

	public function startup(Controller $controller, $options=array()) {
		$this->defaults = array_merge((array)$this->defaults, (array)$options);
	}

////////////////////////////////////////////////////////////

	public function getRate($data = null, $shop = null) {

		$xml = $this->buildRequest($data, $shop);

		// print_r($xml);

		// print_r(Configure::read('Settings.MAESTRO_API_URL'));

		App::uses('HttpSocket', 'Network/Http');
		$httpSocket = new HttpSocket();
		$res = $httpSocket->post(Configure::read('Settings.MAESTRO_API_URL_CARTCHECK'), $xml);

		App::uses('Xml', 'Utility');
		$response = Xml::toArray(Xml::build($res['body']));
		 // echo('here');
		 // print_r($response);
		 // die();

		// debug($response['checkout']['order']['shippingcharge']);

		$results[0] = array(
			'ServiceCode'	=> 'gb flat',
			'ServiceName'	=> 'gb flat',
			'TotalCharges'	=> sprintf('%.2f', $response['checkout']['order']['shippingcharge']),
		);

		return $results;

		// die('maestro maestro maestro');

	}

//////////////////////////////////////////////////

	protected function buildRequest($data = array(), $shop) {

		$this->defaults = array_merge((array)$this->defaults, (array)$data);

		$items = '';

		foreach ($shop['OrderItem'] as $vendoritem) {

			if($vendoritem['user_id'] == 11) {

				// debug($vendoritem);

				$productid = ClassRegistry::init('Product')->field('vendor_sku', array('Product.id' => $vendoritem['Product']['id']));

				// debug($productid);

				$items .= "
						<product>
							<productid>" . $productid . "</productid>
							<quantity>" . $vendoritem['quantity'] . "</quantity>
						</product>
						";

			}

		}

		// debug($items);

		$xml = '<?xml version="1.0" encoding="UTF-8"?>
			<checkout>
				<shipto>
					<name>' . $this->defaults['CustomerFullName'] . '</name>
					<address>' . $this->defaults['CustomerAddress'] . '</address>
					<city>' . $this->defaults['CustomerCity'] . '</city>
					<state>' . $this->defaults['CustomerState'] . '</state>
					<zip>' . substr($this->defaults['CustomerZipCode'], 0, 5) . '</zip>
					<country>US</country>
				</shipto>
				<shoppingcart>
					' . $items . '
				</shoppingcart>
			</checkout>';

		return $xml;

	}

////////////////////////////////////////////////////////////

	public function purchasePost($order, $vendor, $vendoritems) {

		// debug($order);
		// debug($vendor);
		// debug($vendoritems);

		$items = '';

		foreach ($vendoritems as $vendoritem) {

			$productid = ClassRegistry::init('Product')->field('vendor_sku', array('Product.id' => $vendoritem['product_id']));

			$items .= "
						<product>
							<productid>" . $productid . "</productid>
							<quantity>" . $vendoritem['quantity'] . "</quantity>
							<price>" . $vendoritem['price'] . "</price>
						</product>
					";
		}

		$xml = '<?xml version="1.0"?>
			<checkout>
				<success>1</success>
				<error>
					<errornumber></errornumber>
					<errordetail></errordetail>
				</error>
				<order>
					<orderid>' . $order['Order']['id'] . '</orderid>
					<orderdate>' . date('n/j/Y g:i:s A', strtotime($order['Order']['created'])) . '</orderdate>
					<shippingcharge>' . $vendor['shipping'] . '</shippingcharge>
					<total>' . $vendor['total'] . '</total>
					<orderdetails>
						' . $items . '
					</orderdetails>
					<shipto>
						<name>' . $order['Order']['first_name'] . ' ' . $order['Order']['last_name'] . '</name>
						<address>' . $order['Order']['shipping_address'] . ' ' . $order['Order']['shipping_address2'] . '</address>
						<city>' . $order['Order']['shipping_city'] . '</city>
						<state>' . $order['Order']['shipping_state'] . '</state>
						<zip>' . $order['Order']['shipping_zip'] . '</zip>
						<country>US</country>
					</shipto>
				</order>
			</checkout>';

			// debug($xml);

			App::uses('HttpSocket', 'Network/Http');
			$httpSocket = new HttpSocket();
			$res = $httpSocket->post(Configure::read('Settings.MAESTRO_API_URL'), $xml);

			App::uses('Xml', 'Utility');
			$response = Xml::toArray(Xml::build($res['body']));

			return $response;

	}

////////////////////////////////////////////////////////////

	// ErrorNumber: 1000
	// ErrorDetail: General Processing Error. Pls Contact Tech Suppport

	// ErrorNumber: 1001
	// ErrorDetail: Credit Card Declined

	// ErrorNumber: 1002
	// ErrorDetail: Shipping Address Invalid/Incomplete

	// ErrorNumber: 1003
	// ErrorDetail: Account on file not found

	// ErrorNumber: 3001
	// ErrorDetail: Invalid XML Format

	// ErrorNumber: 3001
	// ErrorDetail: Invalid Product ID XXXX

	// ErrorNumber: 3002
	// ErrorDetail: Product Disabled/No Longer Available.

	// ErrorNumber: 3003
	// ErrorDetail: Product Quantity Requested Exceeds Available Quantity

	// ErrorNumber: 3004
	// ErrorDetail: Invalid ProductID or Product is Disabled

	// ErrorNumber: 4004
	// ErrorDetail: Creating Sale Details failed

////////////////////////////////////////////////////////////

}