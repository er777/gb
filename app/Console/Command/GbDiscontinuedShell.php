<?php

ini_set('memory_limit', '1024M');

class GBDiscontinuedShell extends Shell {

	public $uses = array('Product');

////////////////////////////////////////////////////////////

	public function main() {

		App::uses('Sanitize', 'Utility');

		$filename = TMP . 'DiscontinuedProducts117_201364.csv';

		ini_set('auto_detect_line_endings', true);

		$handle = fopen($filename, 'r');

		$header = fgetcsv($handle);

		$i = 0;

		while (($row = fgetcsv($handle)) !== FALSE) {

			$data = array();

			foreach ($header as $k => $head) {
				if (strpos($head, '.') !== false) {
					$h = explode('.', $head);
					$data[$h[0]][$h[1]] = (isset($row[$k])) ? trim($row[$k]) : '';
				}
				else {
					$head = strtolower($head);
					$data['Product'][$head] = (isset($row[$k])) ? trim($row[$k]) : '';
				}
			}

			$this->out($data['Product']['productid']);

			$product = $this->Product->find('first', array(
				'recursive' => -1,
				'fields' => array(
					'Product.id',
					'Product.name',
					'Product.vendor_sku',
				),
				'conditions' => array(
					'Product.user_id' => 11,
					'Product.vendor_sku' => $data['Product']['productid']
				)
			));

			if(!empty($product)) {

				$this->Product->id = $product['Product']['id'];
				$this->Product->saveField('discontinued', 1);

				$this->out('###################################');
				$this->out($data['Product']['productid']);
				print_r($product);
				$this->out('###################################');

				$i++;

			}

		}

		fclose($handle);

		$this->out('Discontinued');
		$this->out($i);

	}

////////////////////////////////////////////////////////////

}
