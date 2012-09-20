<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

////////////////////////////////////////////////////////////

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login');
	}

////////////////////////////////////////////////////////////

	public function vendors() {
		$users = $this->User->find('all', array(
			'fields' => array(
				'User.id',
				'User.short_name',
				'User.shop_name',
				'User.logo',
			),
			'conditions' => array(
				'User.short_name !=' => ''
			),
			'order' => array(
				'User.short_name' => 'ASC'
			),
		));

//		foreach($users as $user) {
//			if(strstr($user['User']['logo'], '.jpg')) {
//				rename(IMAGES . 'logos/' . $user['User']['logo'], IMAGES . 'logo/' . $user['User']['short_name'] . '.jpg');

//				$data['User']['id'] = $user['User']['id'];
//				$data['User']['logo'] = $user['User']['short_name'] . '.jpg';
//				print_r($data);
//				$this->User->save($data, false);
//			}
//		}

		$this->set(compact('users'));
	}

////////////////////////////////////////////////////////////

	public function login() {
		if ($this->request->is('post')) {
			if($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Login is incorrect');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
