<?php
App::uses('AppController', 'Controller');
class OrderUsersController extends AppController {

////////////////////////////////////////////////////////////

	// public function index() {
	// 	$this->OrderUser->recursive = 0;
	// 	$this->set('orderUsers', $this->paginate());
	// }

////////////////////////////////////////////////////////////

	// public function view($id = null) {
	// 	if (!$this->OrderUser->exists($id)) {
	// 		throw new NotFoundException(__('Invalid order user'));
	// 	}
	// 	$options = array('conditions' => array('OrderUser.' . $this->OrderUser->primaryKey => $id));
	// 	$this->set('orderUser', $this->OrderUser->find('first', $options));
	// }

////////////////////////////////////////////////////////////

	// public function add() {
	// 	if ($this->request->is('post')) {
	// 		$this->OrderUser->create();
	// 		if ($this->OrderUser->save($this->request->data)) {
	// 			$this->Session->setFlash(__('The order user has been saved'));
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The order user could not be saved. Please, try again.'));
	// 		}
	// 	}
	// 	$orders = $this->OrderUser->Order->find('list');
	// 	$users = $this->OrderUser->User->find('list');
	// 	$this->set(compact('orders', 'users'));
	// }

////////////////////////////////////////////////////////////

	// public function edit($id = null) {
	// 	if (!$this->OrderUser->exists($id)) {
	// 		throw new NotFoundException(__('Invalid order user'));
	// 	}
	// 	if ($this->request->is('post') || $this->request->is('put')) {
	// 		if ($this->OrderUser->save($this->request->data)) {
	// 			$this->Session->setFlash(__('The order user has been saved'));
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The order user could not be saved. Please, try again.'));
	// 		}
	// 	} else {
	// 		$options = array('conditions' => array('OrderUser.' . $this->OrderUser->primaryKey => $id));
	// 		$this->request->data = $this->OrderUser->find('first', $options);
	// 	}
	// 	$orders = $this->OrderUser->Order->find('list');
	// 	$users = $this->OrderUser->User->find('list');
	// 	$this->set(compact('orders', 'users'));
	// }

////////////////////////////////////////////////////////////

	// public function delete($id = null) {
	// 	$this->OrderUser->id = $id;
	// 	if (!$this->OrderUser->exists()) {
	// 		throw new NotFoundException(__('Invalid order user'));
	// 	}
	// 	$this->request->onlyAllow('post', 'delete');
	// 	if ($this->OrderUser->delete()) {
	// 		$this->Session->setFlash(__('Order user deleted'));
	// 		$this->redirect(array('action' => 'index'));
	// 	}
	// 	$this->Session->setFlash(__('Order user was not deleted'));
	// 	$this->redirect(array('action' => 'index'));
	// }

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->OrderUser->recursive = 0;
		$this->set('orderUsers', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->OrderUser->exists($id)) {
			throw new NotFoundException(__('Invalid order user'));
		}
		$options = array('conditions' => array('OrderUser.' . $this->OrderUser->primaryKey => $id));
		$this->set('orderUser', $this->OrderUser->find('first', $options));
	}

////////////////////////////////////////////////////////////

	// public function admin_add() {
	// 	if ($this->request->is('post')) {
	// 		$this->OrderUser->create();
	// 		if ($this->OrderUser->save($this->request->data)) {
	// 			$this->Session->setFlash(__('The order user has been saved'));
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The order user could not be saved. Please, try again.'));
	// 		}
	// 	}
	// 	$orders = $this->OrderUser->Order->find('list');
	// 	$users = $this->OrderUser->User->find('list');
	// 	$this->set(compact('orders', 'users'));
	// }

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->OrderUser->exists($id)) {
			throw new NotFoundException(__('Invalid order user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrderUser->save($this->request->data)) {
				$this->Session->setFlash(__('The order user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrderUser.' . $this->OrderUser->primaryKey => $id));
			$this->request->data = $this->OrderUser->find('first', $options);
		}
		$orders = $this->OrderUser->Order->find('list');
		$users = $this->OrderUser->User->find('list');
		$this->set(compact('orders', 'users'));
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->OrderUser->id = $id;
		if (!$this->OrderUser->exists()) {
			throw new NotFoundException(__('Invalid order user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrderUser->delete()) {
			$this->Session->setFlash(__('Order user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function vendor_index() {

		$this->paginate = array(
			'recursive' => 0,
			'conditions' => array(
				'OrderUser.user_id' => $this->Auth->user('id')
			),
			'order' => array(
				'OrderUser.id' => 'DESC',
			)
		);
		$orderUsers = $this->paginate();
		$this->set(compact('orderUsers'));
	}

////////////////////////////////////////////////////////////

	public function vendor_view($id = null) {
		$orderUser = $this->OrderUser->find('first', array(
			'contain' => array(
				'Order'
			),
			'conditions' => array(
				'OrderUser.id' => $id,
				'OrderUser.user_id' => $this->Auth->user('id')
			)
		));
		// print_r($orderUser);
		$this->set(compact('orderUser'));

		$orderItems = ClassRegistry::init('OrderItem')->find('all', array(
			'contain' => array(
				'Product'
			),
			'fields' => array(
				'Product.image',
				'OrderItem.*'
			),
			'conditions' => array(
				'OrderItem.order_id' => $orderUser['Order']['id'],
				'OrderItem.user_id' => $this->Auth->user('id')
			)
		));
		// print_r($orderItems);
		$this->set(compact('orderItems'));

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrderUser->save($this->request->data)) {
				$this->Session->setFlash('The order user has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The order user could not be saved. Please, try again.');
			}
		} else {
			$options = array('conditions' => array('OrderUser.id' => $id));
			$this->request->data = $this->OrderUser->find('first', $options);
		}

	}

////////////////////////////////////////////////////////////

	// public function vendor_add() {
	// 	if ($this->request->is('post')) {
	// 		$this->OrderUser->create();
	// 		if ($this->OrderUser->save($this->request->data)) {
	// 			$this->Session->setFlash(__('The order user has been saved'));
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The order user could not be saved. Please, try again.'));
	// 		}
	// 	}
	// 	$orders = $this->OrderUser->Order->find('list');
	// 	$users = $this->OrderUser->User->find('list');
	// 	$this->set(compact('orders', 'users'));
	// }

////////////////////////////////////////////////////////////

	public function vendor_edit($id = null) {
		if (!$this->OrderUser->exists($id)) {
			throw new NotFoundException(__('Invalid order user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrderUser->save($this->request->data)) {
				$this->Session->setFlash('The order user has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The order user could not be saved. Please, try again.');
			}
		} else {
			$options = array('conditions' => array('OrderUser.id' => $id));
			$this->request->data = $this->OrderUser->find('first', $options);
		}
		$orders = $this->OrderUser->Order->find('list');
		$users = $this->OrderUser->User->find('list');
		$this->set(compact('orders', 'users'));
	}

////////////////////////////////////////////////////////////

	// public function vendor_delete($id = null) {
	// 	$this->OrderUser->id = $id;
	// 	if (!$this->OrderUser->exists()) {
	// 		throw new NotFoundException(__('Invalid order user'));
	// 	}
	// 	$this->request->onlyAllow('post', 'delete');
	// 	if ($this->OrderUser->delete()) {
	// 		$this->Session->setFlash(__('Order user deleted'));
	// 		$this->redirect(array('action' => 'index'));
	// 	}
	// 	$this->Session->setFlash(__('Order user was not deleted'));
	// 	$this->redirect(array('action' => 'index'));
	// }

////////////////////////////////////////////////////////////

}
