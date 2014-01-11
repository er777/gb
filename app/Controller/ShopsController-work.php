<?php
App::uses('AppController', 'Controller');
class ShopsController extends AppController {

////////////////////////////////////////////////////////////

	public $components = array(
		'Cart',
		'Usps',
		'Ups',
		'Fedex',
		'AuthorizeNet',
		'Maestro',
	);

////////////////////////////////////////////////////////////

	public function beforeFilter() {
		parent::beforeFilter();
		$this->disableCache();
	}

////////////////////////////////////////////////////////////

	public function testapi() {

		$postdata1 = "<?xml version='1.0' encoding='UTF-8'?>
			<checkout>
				<shipto>
					<name>Eddie Reyes</name>
					<address>3308 Port Royale</address>
					<city>Fort Lauderdale</city>
					<state>FL</state>
					<zip>33308</zip>
					<country>US</country>
				</shipto>
				<shoppingcart>
					<product>
						<productid>9900</productid>
						<quantity>10</quantity>
					</product>
					<product>
						<productid>6061</productid>
						<quantity>100</quantity>
					</product>
				</shoppingcart>
			</checkout>";

		$postdata2 = "<?xml version='1.0'?>
			<checkout>
				<success>1</success>
				<error>
					<errornumber></errornumber>
					<errordetail></errordetail>
				</error>
				<order>
					<orderid>1042</orderid>
					<orderdate>5/31/2013 1:10:49 AM</orderdate>
					<shippingcharge>6.99</shippingcharge>
					<total>23.69</total>
					<orderdetails>
						<product>
							<productid>9900</productid>
							<quantity>2</quantity>
							<price>3.25</price>
						</product>
						<product>
							<productid>4690</productid>
							<quantity>15</quantity>
							<price>0.58</price>
						</product>
						<product>
							<productid>6061</productid>
							<quantity>1</quantity>
							<price>1.5</price>
						</product>
					</orderdetails>
					<shipto>
						<name>John Doe</name>
						<address>90210 West Hollywood st</address>
						<city>Hollywood</city>
						<state>CA</state>
						<zip>90210</zip>
						<country>US</country>
					</shipto>
				</order>
			</checkout>";

		App::uses('HttpSocket', 'Network/Http');
		$httpSocket = new HttpSocket();
		$res = $httpSocket->post(Configure::read('Settings.MAESTRO_API_URL'), $postdata2);

		debug($res);

		App::uses('Xml', 'Utility');
		$response = Xml::toArray(Xml::build($res['body']));

		debug($response);


		debug($response['checkout']['order']['shippingcharge']);

		die('maestro maestro maestro');

	}

////////////////////////////////////////////////////////////

	public function clear() {
		$clear = $this->Cart->clear();
		$this->Session->setFlash('All item(s) removed from your shopping cart', 'flash_error');
		$this->redirect('/');
	}

////////////////////////////////////////////////////////////

	public function add() {
		if ($this->request->is('post')) {
			$id = $this->request->data['Product']['id'];
			$quantity = $this->request->data['Product']['quantity'];

			$productmod = null;

			$productmodId = isset($this->request->data['mods']) ? $this->request->data['mods'] : null;

			$product = $this->Cart->add($id, $quantity, $productmodId);
		}
		if(!empty($product)) {
			$this->Session->setFlash($product['Product']['name'] . ' was added to your shopping cart.', 'flash_success');
		} else {
			$this->Session->setFlash('Unable to add this product to your shopping cart.', 'flash_error');
		}
		$this->redirect($this->referer());
	}

////////////////////////////////////////////////////////////

	public function update() {
		$this->Cart->update($this->request->data['Product']['id'], 1);
	}

////////////////////////////////////////////////////////////

	public function remove($id = null) {
		$product = $this->Cart->remove($id);
		if(!empty($product)) {
			$this->Session->setFlash($product['Product']['name'] . ' was removed from your shopping cart', 'flash_error');
		}
		$this->redirect(array('action' => 'cart'));
	}


////////////////////////////////////////////////////////////

	public function cartupdate() {
		if ($this->request->is('post')) {
			foreach($this->request->data['Shop'] as $key => $value) {
				$p = explode('-', $key);
				$this->Cart->add($p[1], $value, $p[2]);
			}
			$this->Session->setFlash('Shopping Cart is updated.', 'flash_success');
		}
		$this->redirect(array('action' => 'cart'));
	}

////////////////////////////////////////////////////////////

	public function cart() {
		$shop = $this->Session->read('Shop');
		$this->set(compact('shop'));
	}

////////////////////////////////////////////////////////////

	public function address() {

		$minimumShipping = '';

		$shop = $this->Session->read('Shop');
		if(!$shop['Order']['total']) {
			$this->redirect('/');
		}

		if ($this->request->is('post')) {
			$this->loadModel('Order');
			$this->Order->set($this->request->data);
			if($this->Order->validates()) {

				$order = $this->request->data['Order'];
				$order['order_type'] = 'creditcard';

				$i = 0;
				$taxtotal = 0;

				foreach($shop['Users'] as $user) {

					$data['Weight'] = $user['weight'];

					$data['UserName'] = $user['name'];
					$data['UserCompany'] = $user['name'];
					$data['UserPhone'] = $user['phone'];
					$data['UserState'] = $user['state'];
					$data['UserZipCode'] = $user['zip'];

					$data['CustomerFullName'] = $order['first_name'] . ' ' . $order['last_name'];
					$data['CustomerPhone'] = $order['phone'];
					$data['CustomerAddress'] = $order['shipping_address'];
					$data['CustomerCity'] = $order['shipping_city'];
					$data['CustomerState'] = $order['shipping_state'];
					$data['CustomerZipCode'] = $order['shipping_zip'];

					if($order['shipping_state'] == $user['state']) {
						$tax = sprintf('%.2f', $user['subtotal'] * ($user['Tax']['total_food_tax_in_state'] / 100));
						$totalandtax = sprintf('%.2f', $user['subtotal'] + $tax);
					} else {
						$tax = 0;
						$totalandtax = $user['subtotal'];
					}
					$taxtotal += $tax;

					$this->Session->write('Shop.Users.' . $user['id'] . '.tax', $tax);
					$this->Session->write('Shop.Users.' . $user['id'] . '.totalandtax', $totalandtax);

					if($user['flat_shipping'] != 1) {

						if($user["min_shipping_check"] = 1) {
							$minimumShipping = ($user['min_shipping']);
						}

						$shipping_companies = array('usps', 'ups', 'fedex');
						if (in_array($user['shipping_method'], $shipping_companies)) {

							$shippingMethod = ucfirst($user['shipping_method']);

							$result = $this->$shippingMethod->getRate($data);

							if(!$result) {
								$this->Session->setFlash('Unable to rate the shipment');
								$this->redirect(array('action' => 'address'));
							}

							$this->Session->write('Shop.Users.' . $user['id'] . '.shipping_service', $result[0]['ServiceName']);
							$this->Session->write('Shop.Users.' . $user['id'] . '.shipping', $result[0]['TotalCharges']);
							$this->Session->write('Shop.Users.' . $user['id'] . '.Shippingfees', $result);

						} elseif ($user['id'] == 11) {

							$result = $this->Maestro->getRate($data, $shop);

							if(!$result) {
								$this->Session->setFlash('Unable to rate the shipment');
								$this->redirect(array('action' => 'address'));
							}

							$this->Session->write('Shop.Users.' . $user['id'] . '.shipping_service', $result[0]['ServiceName']);
							$this->Session->write('Shop.Users.' . $user['id'] . '.shipping', $result[0]['TotalCharges']);
							$this->Session->write('Shop.Users.' . $user['id'] . '.Shippingfees', $result);

						}

					} else {

						$result = array(
							0 => array(
								'ServiceCode' => '1',
								'ServiceName' => 'Flat',
								'TotalCharges' => $user['shipping']
							)
						);

						$this->Session->write('Shop.Users.' . $user['id'] . '.shipping_service', $result[0]['ServiceName']);
						$this->Session->write('Shop.Users.' . $user['id'] . '.shipping', $user['shipping']);
						$this->Session->write('Shop.Users.' . $user['id'] . '.Shippingfees', $result);

					}

					$i++;
				}

				$shop = $this->Session->read('Shop');

				$shippingtotal = 0;
				foreach($shop['Users'] as $user) {
					if 
					$shippingtotal += $user['Shippingfees'][0]['TotalCharges'] + (Configure::read('Settings.UPS_RESIDENTIAL_FEE'));
				}
				$shippingtotal = sprintf('%.2f', $shippingtotal);

				$order['shipping'] = $shippingtotal;
				$order['tax'] = sprintf('%.2f', $taxtotal);
				$order['total'] = sprintf('%.2f', $shop['Order']['subtotal'] - $shop['Order']['discount'] + $taxtotal + $shippingtotal);

				$this->Session->write('Shop.Order', $order + $shop['Order']);

				$this->redirect(array('action' => 'review'));
			} else {
				$this->Session->setFlash('The form could not be saved. Please, try again.', 'flash_error');
			}
		}
		if(!empty($shop['Order'])) {
			$this->request->data['Order'] = $shop['Order'];
		}

		$states = $this->Shop->states();
		$this->set(compact('states'));

	}

////////////////////////////////////////////////////////////

	// public function charge() {

	// 	$shop = $this->Session->read('Shop');

	// 	$payment = array(
	// 		'creditcard_number' => '4111111111111111',
	// 		'creditcard_month' => '12',
	// 		'creditcard_year' => '12',
	// 		'creditcard_code' => '123',
	// 	);

	// 	try {
	// 		$authorizeNet = $this->AuthorizeNet->charge($shop['Order'], $payment);
	// 		debug($authorizeNet);
	// 	} catch(Exception $e) {
	// 		debug($e->getMessage());
	// 	}

	// 	die('charge end.');

	// }

////////////////////////////////////////////////////////////

	public function review() {

		$shop = $this->Session->read('Shop');
		$total = array();
		$i = 0;

		if(empty($shop)) {
			$this->redirect('/');
		}

		if ($this->request->is('post') && isset($this->request->data['Ship'])) {

			foreach($this->request->data['Ship'] as $key => $value) {
				$userId = str_replace('rating_', '', $key);
				if($this->Session->check('Shop.Users.' . $userId . '.shipping_selected')) {
					$this->Session->write('Shop.Users.' . $userId . '.shipping_selected', $value);
					$this->Session->write('Shop.Users.' . $userId . '.shipping_service', $shop['Users'][$userId]['Shippingfees'][$value]['ServiceName']);
					$this->Session->write('Shop.Users.' . $userId . '.shipping', $shop['Users'][$userId]['Shippingfees'][$value]['TotalCharges']);
				}
			}

			$shop = $this->Session->read('Shop');
			$shippingtotal = 0;

			foreach($shop['Users'] as $user) {
				$shippingtotal += $user['Shippingfees'][$user['shipping_selected']]['TotalCharges'];
			}
			$shippingtotal = sprintf('%.2f', $shippingtotal);

			$order['shipping'] = $shippingtotal;
			$order['total'] = sprintf('%.2f', $shop['Order']['subtotal'] + $shippingtotal);

			$this->Session->write('Shop.Order', $order + $shop['Order']);

			$this->redirect(array('action' => 'review'));

		}

		$ccform = false;
		$formURL = null;

		if ($this->request->is('post') && isset($this->request->data['Order']['formURL'])) {
			try {
				// $authorizeNet = $this->AuthorizeNet->charge($shop['Order'], $payment);
				$formURL = $this->Shop->getFormUrl($shop);
			} catch(Exception $e) {
				$this->Session->setFlash($e->getMessage());
				$this->redirect(array('action' => 'review'));
			}
			$ccform = true;

		}

		if (isset($this->request->query['token-id'])) {

			$gatewayURL = Configure::read('Settings.NMI_gatewayURL');
			$APIKey = Configure::read('Settings.NMI_APIKey');

			$tokenId = $this->request->query['token-id'];
			$xmlRequest = new DOMDocument('1.0','UTF-8');
			$xmlRequest->formatOutput = true;
			$xmlCompleteTransaction = $xmlRequest->createElement('complete-action');
			$this->Shop->appendXmlNode($xmlCompleteTransaction,'api-key', $APIKey);
			$this->Shop->appendXmlNode($xmlCompleteTransaction,'token-id', $tokenId);
			$xmlRequest->appendChild($xmlCompleteTransaction);

			// Process Step Three
			$data = $this->Shop->sendXMLviaCurl($xmlRequest, $gatewayURL);

			$gwResponse = @new SimpleXMLElement((string)$data);

			if ((string)$gwResponse->result == 1 ) {
				// print " <p><h3> Transaction was Approved, XML response was:</h3></p>\n";
				// print '<pre>' . (htmlentities($data)) . '</pre>';

			} elseif((string)$gwResponse->result == 2)  {
				print " <p><h3> Transaction was Declined.</h3>\n";
				print " Decline Description : " . (string)$gwResponse->{'result-text'} ." </p>";
				print " <p><h3>XML response was:</h3></p>\n";
				print '<pre>' . (htmlentities($data)) . '</pre>';
				die;
			} else {
				print " <p><h3> Transaction caused an Error.</h3>\n";
				print " Error Description: " . (string)$gwResponse->{'result-text'} ." </p>";
				print " <p><h3>XML response was:</h3></p>\n";
				print '<pre>' . (htmlentities($data)) . '</pre>';
				die;
			}

			$this->loadModel('Order');

			$this->Order->set($this->request->data);
			if($this->Order->validates()) {

				// $payment = array(
				// 	'creditcard_number' => $this->request->data['Order']['creditcard_number'],
				// 	'creditcard_month' => $this->request->data['Order']['creditcard_month'],
				// 	'creditcard_year' => $this->request->data['Order']['creditcard_year'],
				// 	'creditcard_code' => $this->request->data['Order']['creditcard_code'],
				// );

				$o['OrderItem'] = $shop['OrderItem'];

				$i = 0;
				foreach($shop['Users'] as $user) {
					$o['OrderUser'][$i] = $user;
					$o['OrderUser'][$i]['id'] = null;
					$o['OrderUser'][$i]['user_id'] = $user['id'];
					$o['OrderUser'][$i]['tax'] = $user['tax'];
					$o['OrderUser'][$i]['total'] = $user['subtotal'] + $user['tax'] + $user['shipping'];
					$o['OrderUser'][$i]['status'] = 'new order';
					$i++;
				}

				$o['Order'] = $shop['Order'];

				$o['Order']['order_status_id'] = 1;
				$o['Order']['ip_address'] = $_SERVER['REMOTE_ADDR'];
				$o['Order']['remotehost'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				$o['Order']['useragent'] = $_SERVER['HTTP_USER_AGENT'];

				$save = $this->Order->saveAll($o, array('validate' => 'first'));
				if($save) {
					$this->sendemails($this->Order->id);
					$this->redirect(array('action' => 'success'));
				}

			} else {
				$this->Session->setFlash('The order could not be processed. Please, try again.', 'flash_error');
			}
		}

		$this->set(compact('shop', 'ccform', 'formURL'));

	}

////////////////////////////////////////////////////////////

	public function sendemails($id) {

		$this->loadModel('Order');

		$order = $this->Order->find('first', array(
			'contain' => array(
				'OrderUser' => array('User' => array(
					'fields' => array(
						'User.id',
						'User.name',
						'User.email_orders',
					)
				)),
				'OrderItem' => array('User' => array(
					'fields' => array(
						'User.id',
						'User.name',
						'User.email_orders',
					)
				)),
			),
			'conditions' => array(
				'Order.id' => $id
			),
		));

		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();

		$email->from(Configure::read('Settings.ADMIN_EMAIL'))
			->cc(Configure::read('Settings.ADMIN_EMAIL'))
			->to(Configure::read('Settings.ADMIN_EMAIL'))
			->subject('Shop Order - Admin Copy')
			->template('order-admin')
			->emailFormat('html')
			->viewVars(array('order' => $order))
			->send()
		;

		$email->from(Configure::read('Settings.ADMIN_EMAIL'))
			->cc(Configure::read('Settings.ADMIN_EMAIL'))
			->to($order['Order']['email'])
			->subject('Shop Order - Customer Copy')
			->template('order-customer')
			->emailFormat('html')
			->viewVars(array('order' => $order))
			->send()
		;

		foreach($order['OrderUser'] as $vendor) {

			$vendoritems = array();

			foreach($order['OrderItem'] as $items) {
				if($items['user_id'] == $vendor['user_id']) {
					$vendoritems[] = $items;
				}
			}

			if($vendor['User']['id'] == 11) {
				$result = $this->Maestro->purchasePost($order, $vendor, $vendoritems);
				// debug($result);
				// debug($result['checkout']['order']['orderid']);
				$maestro_response = print_r($result, true);
				mail('andras@kende.com', 'order success', $maestro_response);
				mail('er@erdigitaldesign.com', 'order success', $maestro_response);
				$extra['OrderUser']['id'] = $vendor['id'];
				$extra['OrderUser']['extra'] = $result['checkout']['order']['orderid'];
				$extra['OrderUser']['maestro_response'] = $maestro_response;
				ClassRegistry::init('OrderUser')->save($extra, false);
			}

			$email->from(Configure::read('Settings.ADMIN_EMAIL'))
				->cc(Configure::read('Settings.ADMIN_EMAIL'))
				->to($vendor['User']['email_orders'])
				->subject('Gourmet Basket Shop Order: ' . $vendor['User']['name'])
				->template('order-vendor')
				->emailFormat('html')
				->viewVars(array('order' => $order, 'vendor' => $vendor, 'vendoritems' => $vendoritems))
				->send();

		}

	}

////////////////////////////////////////////////////////////

	public function success() {
		$shop = $this->Session->read('Shop');
		$clear = $this->Cart->clear();

		if(empty($shop)) {
			$this->redirect('/');
		}
		$this->set(compact('shop'));
	}

////////////////////////////////////////////////////////////

}
