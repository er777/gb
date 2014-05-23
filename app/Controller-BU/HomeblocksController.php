<?php
App::uses('AppController', 'Controller');
/**
 * Homeblocks Controller
 *
 * @property Homeblock $Homeblock
 */
class HomeblocksController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Homeblock->recursive = 0;
		$this->set('homeblocks', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Homeblock->exists($id)) {
			throw new NotFoundException(__('Invalid homeblock'));
		}
		$options = array('conditions' => array('Homeblock.' . $this->Homeblock->primaryKey => $id));
		$this->set('homeblock', $this->Homeblock->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Homeblock->create();
			if ($this->Homeblock->save($this->request->data)) {
				$this->Session->setFlash(__('The homeblock has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The homeblock could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Homeblock->exists($id)) {
			throw new NotFoundException(__('Invalid homeblock'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Homeblock->save($this->request->data)) {
				$this->Session->setFlash(__('The homeblock has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The homeblock could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Homeblock.' . $this->Homeblock->primaryKey => $id));
			$this->request->data = $this->Homeblock->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Homeblock->id = $id;
		if (!$this->Homeblock->exists()) {
			throw new NotFoundException(__('Invalid homeblock'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Homeblock->delete()) {
			$this->Session->setFlash(__('Homeblock deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Homeblock was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Homeblock->recursive = 0;
		$this->set('homeblocks', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Homeblock->exists($id)) {
			throw new NotFoundException(__('Invalid homeblock'));
		}
		$options = array('conditions' => array('Homeblock.' . $this->Homeblock->primaryKey => $id));
		$this->set('homeblock', $this->Homeblock->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Homeblock->create();
			if ($this->Homeblock->save($this->request->data)) {
				$this->Session->setFlash(__('The homeblock has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The homeblock could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Homeblock->exists($id)) {
			throw new NotFoundException(__('Invalid homeblock'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Homeblock->save($this->request->data)) {
				$this->Session->setFlash(__('The homeblock has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The homeblock could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Homeblock.' . $this->Homeblock->primaryKey => $id));
			$this->request->data = $this->Homeblock->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Homeblock->id = $id;
		if (!$this->Homeblock->exists()) {
			throw new NotFoundException(__('Invalid homeblock'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Homeblock->delete()) {
			$this->Session->setFlash(__('Homeblock deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Homeblock was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
