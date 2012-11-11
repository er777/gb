<?php
class CartComponent extends Component {

//////////////////////////////////////////////////

	public $components = array('Session');

//////////////////////////////////////////////////

	public $controller = null;

//////////////////////////////////////////////////

	public function startup(&$controller) {
		$this->controller =& $controller;
	}

//////////////////////////////////////////////////

	public $maxQuantity = 100;

//////////////////////////////////////////////////

	public function add($id, $quantity = 1) {

		if(!is_numeric($quantity)) {
			$quantity = 1;
		}
		$quantity = abs($quantity);
		if($quantity > $this->maxQuantity) {
			$quantity = $this->maxQuantity;
		}
		if($quantity == 0) {
			$this->remove($id);
			return;
		}

		$product = ClassRegistry::init('Product')->find('first', array(
			'recursive' => -1,
			'contain' => array('User'),
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.slug',
				'Product.image',
				'Product.price',
				'Product.weight_unit',
				'Product.weight',
				'Product.height',
				'Product.length',
				'Product.width',
				'User.id',
				'User.name',
				'User.email',
				'User.zip',
				'User.state',
			),
			'conditions' => array(
				'Product.id' => $id
			)
		));
		if(empty($product)) {
			return false;
		}
		$data['name'] = $product['Product']['name'];
		$data['price'] = $product['Product']['price'];

		$data['quantity'] = $quantity;
		$data['subtotal'] = sprintf('%01.2f', $product['Product']['price'] * $quantity);
		$data['subtotal'] = sprintf('%01.2f', $product['Product']['price'] * $quantity);
		$data['totalweight'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);

		$data['Product'] = $product['Product'];
		$data['User'] = $product['User'];
		$this->Session->write('Shop.OrderItem.' . $id, $data);

		$this->cart();

		return $product;
	}

//////////////////////////////////////////////////

	public function remove($id) {
		if($this->Session->check('Shop.OrderItem.' . $id)) {
			$product = $this->Session->read('Shop.OrderItem.' . $id);
			$this->Session->delete('Shop.OrderItem.' . $id);
			$this->cart();
			return $product;
		}
		return false;
	}

//////////////////////////////////////////////////

	public function cart() {
		$shop = $this->Session->read('Shop');
		$cartTotal = 0;
		$cartQuantity = 0;
		$cartWeight = 0;

		$this->Session->delete('Shop.Order');
		$this->Session->delete('Shop.Shipping');

		$property = array();
		$users = array();

		if (count($shop['OrderItem']) > 0) {
			foreach ($shop['OrderItem'] as $item) {
				$cartTotal += $item['subtotal'];
				$cartQuantity += $item['quantity'];
				$cartWeight += $item['totalweight'];

				$users[$item['User']['id']]['id'] = $item['User']['id'];
				$users[$item['User']['id']]['name'] = $item['User']['name'];
				$users[$item['User']['id']]['email'] = $item['User']['email'];
				$users[$item['User']['id']]['zip'] = $item['User']['zip'];
				$users[$item['User']['id']]['state'] = $item['User']['state'];
				$users[$item['User']['id']]['totalprice'] = 0;
				$users[$item['User']['id']]['totalquantity'] = 0;
				$users[$item['User']['id']]['totalweight'] = 0;
			}
			foreach ($shop['OrderItem'] as $item) {
				$users[$item['User']['id']]['totalprice'] += $item['subtotal'];
				$users[$item['User']['id']]['totalquantity'] += $item['quantity'];
				$users[$item['User']['id']]['totalweight'] += $item['totalweight'];
			}
			foreach ($users as & $ship) {
				$ship['totalprice'] = sprintf('%.2f', $ship['totalprice']);
			}

			$property['total'] = sprintf('%.2f', $cartTotal);
			$property['quantity'] = $cartQuantity;
			$property['weight'] = $cartWeight;
			$this->Session->write('Shop.Order', $property);

			$this->Session->write('Shop.Users', $users);

			return true;
		}
		else {
			$this->Session->delete('Shop');
			return false;
		}
	}

//////////////////////////////////////////////////

}
