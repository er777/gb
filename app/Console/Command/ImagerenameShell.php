<?php
class ImagerenameShell extends Shell {

	public $uses = array('Product');

	public function main() {

		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.image',
			),
			'limit' => 10000
		));

		foreach($products as $product) {

			$newname = $product['Product']['id'] . '.jpg';

			copy(IMAGES . 'products/' . $product['Product']['image'], IMAGES . '/productsnew/' . $newname);

			$data['Product']['id'] = $product['Product']['id'];
			$data['Product']['image'] = $newname;
//			$this->Product->save($data, false);

			print_r($product);

			print_r($data);
		}

	}

}
