<?php
App::uses('AppController', 'Controller');
class FeaturesController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
		$this->Feature->recursive = 0;
		$this->set('features', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function view($id = null) {
		$feature = $this->Feature->find('first', array(
			'conditions' => array(
				'Feature.id' => $id
			)
		));
		if (empty($feature)) {
			$this->redirect(array('action' => 'index'), 301);
		}
		$this->set(compact('feature'));
	}

////////////////////////////////////////////////////////////

	public function admin_reset() {
		$this->Session->delete('Feature');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		if ($this->request->is('post')) {

			if(!empty($this->request->data['Feature']['name'])) {
				$filter = $this->request->data['Feature']['filter'];
				$this->Session->write('Feature.filter', $filter);
				$name = $this->request->data['Feature']['name'];
				$this->Session->write('Feature.name', $name);
				$conditions[] = array(
					'Feature.' . $filter . ' LIKE' => '%' . $name . '%'
				);
			} else {
				$this->Session->write('Feature.filter', '');
				$this->Session->write('Feature.name', '');
			}

			$this->Session->write('Feature.conditions', $conditions);
			$this->redirect(array('action' => 'index'));

		}

		$all = array(
			'user_id' => '',
			'feature_id' => '',
			'name' => '',
			'filter' => '',
			'conditions' => ''
		);
		

		if($this->Session->check('Feature')) {
			$all = $this->Session->read('Feature');
		}

		$this->set(compact('all'));

		$this->paginate = array(
			'recursive' => -1,
			'contain' => array(
			),
			'conditions' => $all['conditions'],
			'limit' => 50,
		);

		$features = $this->paginate('Feature');

		$this->set(compact('features'));
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		if (isset($this->request->data['Feature']['image_type'])) {

			$slug = $this->request->data['Feature']['slug'];
			$image = $this->request->data['Feature']['slug'] . '.jpg';

			$type = $this->request->data['Feature']['image_type'];

			$targetdir = IMAGES . 'features/' . $type;

			$this->Image = $this->Components->load('Image');

			$upload = $this->Image->upload($this->request->data['Feature']['image']['tmp_name'], $targetdir, $image);

			if($upload == 'Success') {
				$this->Feature->id = $this->request->data['Feature']['id'];
				$this->Feature->saveField($type, $image);
				$uploadedfile = $targetdir . '/' . $image;
				$this->Image->resample($uploadedfile, IMAGES . '/features/' . $type . '/', $image, 150, 150, 1, 0);
				//$this->Image->resample($uploadedfile, IMAGES . '/user_image/', $image, 200, 200, 1, 0);
			}

			$this->Session->setFlash($upload);
			$this->redirect($this->referer());
		}

		$feature = $this->Feature->find('first', array(
			'conditions' => array(
				'Feature.id' => $id
			)
		));
		if (empty($feature)) {
			throw new NotFoundException('Invalid Feature');
		}
		$this->set(compact('feature'));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Feature->create();
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash('The feature has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The feature could not be saved. Please, try again.');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Feature->exists($id)) {
			throw new NotFoundException(__('Invalid feature'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$product = ClassRegistry::init('Product')->find('first', array(
				'contain' => array(
					'User'
				),
				'conditions' => array(
					'Product.id' => $this->request->data['Feature']['gwm_product']
				)
			));
			$this->request->data['Feature']['gwm_full_url'] = 'http://' . $product['User']['slug'] . Configure::read('Settings.DOMAIN'). '/product/' . $product['Product']['id'] . '-' . $product['Product']['slug'];
			
			
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash('The feature has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The feature could not be saved. Please, try again.');
			}
		} else {
			$options = array('conditions' => array('Feature.id' => $id));
			$this->request->data = $this->Feature->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Feature->id = $id;
		if (!$this->Feature->exists()) {
			throw new NotFoundException('Invalid feature');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Feature->delete()) {
			$this->Session->setFlash('Feature deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Feature was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
