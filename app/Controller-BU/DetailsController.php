<?php
App::uses('AppController', 'Controller');
/**
 * Details Controller
 *
 * @property Detail $Detail
 */
class DetailsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Detail->recursive = 0;
		$this->set('details', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Detail->exists($id)) {
			throw new NotFoundException(__('Invalid detail'));
		}
		
		$vendor = $this->Detail->find('first', array(
			'conditions' => array(
				'Detail.type' => 'vendor'
			)
		));
		$this->set(compact('vendor'));
		
		
		
		
		
		$about = $this->Detail->find('first', array(
			'conditions' => array(
				'Detail.type' => 'about'
			)
		));
		$this->set(compact('about'));

		
		$options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
		$this->set('detail', $this->Detail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Detail->create();
			if ($this->Detail->save($this->request->data)) {
				$this->Session->setFlash(__('The detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
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
		if (!$this->Detail->exists($id)) {
			throw new NotFoundException(__('Invalid detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Detail->save($this->request->data)) {
				$this->Session->setFlash(__('The detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
			$this->request->data = $this->Detail->find('first', $options);
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
		$this->Detail->id = $id;
		if (!$this->Detail->exists()) {
			throw new NotFoundException(__('Invalid detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Detail->delete()) {
			$this->Session->setFlash(__('Detail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Detail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Detail->recursive = 0;
		$this->set('details', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Detail->exists($id)) {
			throw new NotFoundException(__('Invalid detail'));
		}
		$options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
		$this->set('detail', $this->Detail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Detail->create();
			if ($this->Detail->save($this->request->data)) {
				$this->Session->setFlash(__('The detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
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
		if (!$this->Detail->exists($id)) {
			throw new NotFoundException(__('Invalid detail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Detail->save($this->request->data)) {
				$this->Session->setFlash(__('The detail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
			$this->request->data = $this->Detail->find('first', $options);
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
		$this->Detail->id = $id;
		if (!$this->Detail->exists()) {
			throw new NotFoundException(__('Invalid detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Detail->delete()) {
			$this->Session->setFlash(__('Detail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Detail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
