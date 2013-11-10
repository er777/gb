<?php
App::uses('AppController', 'Controller');
class HomeblocksController extends AppController {

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Homeblocks->recursive = 0;
		$this->set('Homeblocks', $this->paginate());
		
		
		$project = $this->Homeblock->find('list', array(
			'order' => array(
				'Homeblock.modified' => 'DESC'
			)
		));

		$this->set(compact('homeblocks'));
		
		
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		$this->Homeblock->id = $id;
		if (!$this->Homeblock->exists()) {
			throw new NotFoundException(__('Invalid Homeblock'));
		}
		$this->set('Homeblock', $this->Homeblock->read(null, $id));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Homeblock->create();
			if ($this->Homeblock->save($this->request->data)) {
				$this->Session->setFlash(__('The Homeblock has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Homeblock could not be saved. Please, try again.'));
			}
		}
			
				
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {		
		$this->Homeblock->id = $id;
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if ($this->Homeblock->save($this->request->data)) {
				$this->Session->setFlash(__('The Homeblock has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Homeblock could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Homeblock->read(null, $id);
		}
		
	
		
	
	}
		
////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Homeblock->id = $id;
		if (!$this->Homeblock->exists()) {
			throw new NotFoundException(__('Invalid Homeblock'));
		}
		if ($this->Homeblock->delete()) {
			$this->Session->setFlash(__('Homeblock deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Homeblock was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}