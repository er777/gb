<?php
App::uses('AppController', 'Controller');
class OrdersController extends AppController {

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->paginate = array(
			'recursive' => -1,
			'order' => array(
				'Order.id' => 'DESC',
			)
		);
		$this->set('orders', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		$order = $this->Order->find('first', array(
			'contain' => array(
				'OrderUser' => array(
					'order' => array(
						'OrderUser.user_id' => 'ASC'
					),
					'User' => array(
						'fields' => array(
							'User.name',
							'User.username'
						)
					)
				),
				'OrderItem' => array(
					'order' => array(
						'OrderItem.user_id' => 'ASC'
					),
					'User' => array(
						'fields' => array(
							'User.name',
							'User.username'
						)
					)
				),
				'OrderHistory'=> array(
					'OrderStatus'
				),
			),
			'conditions' => array(
				'Order.id' => $id
			)
		));

		if (empty($order)) {
			throw new NotFoundException('Invalid order');
		}

		$this->set(compact('order'));
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException('Invalid order');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash('The order has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The order could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->Order->read(null, $id);
		}
	}
////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException('Invalid order');
		}
		if ($this->Order->delete()) {
			$this->Session->setFlash('Order deleted');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Order was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
