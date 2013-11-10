<?php
class ProductStockShell extends Shell {

	public $uses = array('Product');

	public function main() {

		App::uses('HttpSocket', 'Network/Http');
		$httpSocket = new HttpSocket();

		$yesterday = date('Y-m-d H:i:s', strtotime('-3 day'));

		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'conditions' => array(
				'Product.user_id' => 11,
				'Product.active' => 1,
				'Product.stock_updated <' => $yesterday
			),
			// 'order' => 'RAND()',
			// 'limit' => 1000
		));

		$this->out(count($products));

		$body = 'maestro stock shsll' . count($products);

		mail(Configure::read('Settings.ADMIN_EMAIL'), 'maestro stock shsll', $body);

		foreach($products as $product) {

			sleep(1);

			$response = $httpSocket->get('https://www.maestrolico.com/api/checkstockstatus.asp?distributorid=' . Configure::read('Settings.MAESTRO_DISTRIBUTOR_ID') . '&productid=' . $product['Product']['vendor_sku']);
			// echo '<br /><hr><br />';
			// echo $product['Product']['name'] . ' - ' . $product['Product']['vendor_sku'];
			// echo '<br /><br />';
			//debug($response['body']);

			$update = explode('|', $response['body']);

			// debug($update);

			// debug(date('H:i:s'));

			$data['Product']['id'] = $product['Product']['id'];
			$data['Product']['stock'] = $update[1];
			$data['Product']['stock_updated'] = date('Y-m-d H:i:s');
			debug($data);
			$this->Product->save($data, false);

		}

	}

}
