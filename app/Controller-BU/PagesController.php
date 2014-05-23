<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {

////////////////////////////////////////////////////////////

	// public function index() {
	// 	$this->Page->recursive = 0;
	// 	$this->set('pages', $this->paginate());
	// }

////////////////////////////////////////////////////////////

	public function view($slug = null) {

		$page = $this->Page->find('first', array(
			'conditions' => array(
				'Page.slug' => $slug
			)
		));
		if (empty($page)) {
			throw new NotFoundException('Invalid page');
		}

		$this->set(compact('page'));
	}

////////////////////////////////////////////////////////////

	// public function add() {
	// 	if ($this->request->is('post')) {
	// 		$this->Page->create();
	// 		if ($this->Page->save($this->request->data)) {
	// 			$this->Session->setFlash('The page has been saved');
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash('The page could not be saved. Please, try again.');
	// 		}
	// 	}
	// }

////////////////////////////////////////////////////////////

	// public function edit($id = null) {
	// 	if (!$this->Page->exists($id)) {
	// 		throw new NotFoundException('Invalid page');
	// 	}
	// 	if ($this->request->is('post') || $this->request->is('put')) {
	// 		if ($this->Page->save($this->request->data)) {
	// 			$this->Session->setFlash('The page has been saved');
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash('The page could not be saved. Please, try again.');
	// 		}
	// 	} else {
	// 		$options = array('conditions' => array('Page.id' => $id));
	// 		$this->request->data = $this->Page->find('first', $options);
	// 	}
	// }

////////////////////////////////////////////////////////////

	// public function delete($id = null) {
	// 	$this->Page->id = $id;
	// 	if (!$this->Page->exists()) {
	// 		throw new NotFoundException('Invalid page');
	// 	}
	// 	$this->request->onlyAllow('post', 'delete');
	// 	if ($this->Page->delete()) {
	// 		$this->Session->setFlash('Page deleted');
	// 		$this->redirect(array('action' => 'index'));
	// 	}
	// 	$this->Session->setFlash('Page was not deleted');
	// 	$this->redirect(array('action' => 'index'));
	// }

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Page->recursive = 0;
		$this->set('pages', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->Page->exists($id)) {
			throw new NotFoundException('Invalid page');
		}
		$options = array('conditions' => array('Page.id' => $id));
		$this->set('page', $this->Page->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Page->create();
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash('The page has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The page could not be saved. Please, try again.');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Page->exists($id)) {
			throw new NotFoundException('Invalid page');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash('The page has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The page could not be saved. Please, try again.');
			}
		} else {
			$options = array('conditions' => array('Page.id' => $id));
			$this->request->data = $this->Page->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException('Invalid page');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Page->delete()) {
			$this->Session->setFlash('Page deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Page was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
