<?php
App::uses('AppController', 'Controller');
class BlocksController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
		$this->Block->recursive = 0;
		$this->set('blocks', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function view($id = null) {
		$block = $this->Block->find('first', array(
			'conditions' => array(
				'Block.id' => $id
			)
		));
		if (empty($block)) {
			$this->redirect(array('action' => 'index'), 301);
		}
		$this->set(compact('block'));
	}

////////////////////////////////////////////////////////////

	public function admin_reset() {
		$this->Session->delete('Block');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		if ($this->request->is('post')) {

			if(!empty($this->request->data['Block']['name'])) {
				$filter = $this->request->data['Block']['filter'];
				$this->Session->write('Block.filter', $filter);
				$name = $this->request->data['Block']['name'];
				$this->Session->write('Block.name', $name);
				$conditions[] = array(
					'Block.' . $filter . ' LIKE' => '%' . $name . '%'
				);
			} else {
				$this->Session->write('Block.filter', '');
				$this->Session->write('Block.name', '');
			}

			$this->Session->write('Block.conditions', $conditions);
			$this->redirect(array('action' => 'index'));

		}

		$all = array(
			'user_id' => '',
			'block_id' => '',
			'name' => '',
			'filter' => '',
			'conditions' => ''
		);
		

		if($this->Session->check('Block')) {
			$all = $this->Session->read('Block');
		}

		$this->set(compact('all'));

		$this->paginate = array(
			'recursive' => -1,
			'contain' => array(
			),
			'conditions' => $all['conditions'],
			'limit' => 50,
		);

		$blocks = $this->paginate('Block');

		$this->set(compact('blocks'));
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		if (isset($this->request->data['Block']['image_type'])) {

			$slug = $this->request->data['Block']['slug'];
			$image = $this->request->data['Block']['slug'] . '.jpg';

			$type = $this->request->data['Block']['image_type'];

			$targetdir = IMAGES . 'blocks/' . $type;

			$this->Image = $this->Components->load('Image');

			$upload = $this->Image->upload($this->request->data['Block']['image']['tmp_name'], $targetdir, $image);

			if($upload == 'Success') {
				$this->Block->id = $this->request->data['Block']['id'];
				$this->Block->saveField($type, $image);
				$uploadedfile = $targetdir . '/' . $image;
				$this->Image->resample($uploadedfile, IMAGES . '/blocks/' . $type . '/', $image, 150, 150, 1, 0);
				//$this->Image->resample($uploadedfile, IMAGES . '/user_image/', $image, 200, 200, 1, 0);
			}

			$this->Session->setFlash($upload);
			$this->redirect($this->referer());
		}

		$block = $this->Block->find('first', array(
			'conditions' => array(
				'Block.id' => $id
			)
		));
		if (empty($block)) {
			throw new NotFoundException('Invalid Block');
		}
		$this->set(compact('block'));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Block->create();
			if ($this->Block->save($this->request->data)) {
				$this->Session->setFlash('The block has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The block could not be saved. Please, try again.');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Block->exists($id)) {
			throw new NotFoundException(__('Invalid block'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Block->save($this->request->data)) {
				$this->Session->setFlash('The block has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The block could not be saved. Please, try again.');
			}
		} else {
			$options = array('conditions' => array('Block.id' => $id));
			$this->request->data = $this->Block->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Block->id = $id;
		if (!$this->Block->exists()) {
			throw new NotFoundException('Invalid block');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Block->delete()) {
			$this->Session->setFlash('Block deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Block was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
