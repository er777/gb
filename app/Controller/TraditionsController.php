<?php
App::uses('AppController', 'Controller');

class TraditionsController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
				
	}


////////////////////////////////////////////////////////////

	public function view() {
		$args = array_unique(func_get_args());
		$this->set('fst',$args['0']);
		$tradition = $this->Tradition->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Tradition.slug' => $args['0']
			)
		));	
	
		$countries_list1 = explode(',', $tradition['Tradition']['countries_list']);
		$countries_list = array_map('trim', $countries_list1);
		$this->set(compact('countries_list'));
		
				
		if(empty($tradition)) {
			die('invalid tradition');
		}
		$this->set(compact('tradition'));

		$traditionid = $tradition['Tradition']['id'];

		$traditions = $this->Tradition->find('all', array(
			'recursive' => -1,
			'conditions' => array(),
			'fields' => array(
				'Tradition.id',
				'Tradition.slug',
				'Tradition.name',
			),
			'order' => array(
				'Tradition.name' => 'ASC'
			)
		));
		
		$this->set(compact('traditions'));

		$this->loadModel('Product');
		
		/////////////////////////////////////////////
		if(!empty($args['1']) && $args['1']=='brand'){
			$this->loadModel('Brand');
			$Brandinfo = $this->Brand->find('first', array(
				'recursive' => -1,
				'conditions' => array(
					'Brand.slug' => $args['2']
				)
			));
			$bid = $Brandinfo['Brand']['id'];
			//////Product SQL for brand and traditions////////////
			$condtions =  array(
					'Product.active' => 1,
				'User.active' => 1,
				'Product.brand_id' => $bid,
				"FIND_IN_SET('$traditionid', traditions)"
				);
		}
		else{
			$condtions =  array(
				'Product.active' => 1,
				'User.active' => 1,
				"FIND_IN_SET('$traditionid', traditions)"
			);
		}
		$this->paginate = array(
			'joins' => array(
				array(
					'table' => 'users',
					'type' => 'RIGHT',
					'alias' => 'User',
					'conditions' => array('User.id = Product.user_id AND User.level = "vendor"')
				),
				array(
					'table' => 'categories',
					'type' => 'RIGHT',
					'alias' => 'categories',
					'conditions' => array('categories.id = Product.category_id')
				),
				array(
					'table' => 'subcategories',
					'type' => 'RIGHT',
					'alias' => 'subcategories',
					'conditions' => array('subcategories.id = Product.subcategory_id')
				)
			),
			'fields' => array(
				'Product.id',
				//'Product.category_id',
				'Product.name',
				'Product.slug',
				'Product.price',
				'Product.displaygroup',
				'Product.image',
				'User.id',
				'User.slug',
				'User.name',
				'User.active',
			),
			'conditions' => $condtions,
			'limit' => 32,
			'order' => array(
				'Product.displaygroup' => 'ASC',
				'Product.name' => 'ASC'
				)
		);


		$products = $this->paginate('Product');
		$this->set(compact('products'));
	/////////////////////Left Pannel Brand Names Start ///////////////////////////
		$ProductsForBrand = $this->Product->find('all', array(
			'recursive' => -1,
				'joins' => array(
				array(
					'table' => 'users',
					'type' => 'RIGHT',
					'alias' => 'User',
					'conditions' => array('User.id = Product.user_id AND User.level = "vendor"')
				),
				array(
					'table' => 'categories',
					'type' => 'RIGHT',
					'alias' => 'categories',
					'conditions' => array('categories.id = Product.category_id')
				),
				array(
					'table' => 'subcategories',
					'type' => 'RIGHT',
					'alias' => 'subcategories',
					'conditions' => array('subcategories.id = Product.subcategory_id')
				)
			),
			'fields' => array(
				'Product.brand_id'
			),
			'conditions' => array(
				'Product.active' => 1,
				'User.active' => 1,
				"FIND_IN_SET('$traditionid', traditions)"
			),
	));
		
 $UniquebrndIds = array_unique(Hash::extract($ProductsForBrand, '{n}.Product.brand_id'));
		foreach ($UniquebrndIds as $key => $value) {
					$UniquebrndIds;
			}
		$this->loadModel('Brand');
		$brands = $this->Brand->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Brand.id',
				'Brand.slug',
				'Brand.name',
			),
			'conditions' => array(
				'Brand.id' => $UniquebrndIds
			),
			'order' => array(
				'Brand.name' => 'ASC'
			)
		));
		$this->set(compact('brands'));
		////////////////////Left Pannel Brand Name End////////////////
	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Tradition->recursive = 0;
		$this->set('traditions', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		
		if (isset($this->request->data['Tradition']['image_type'])) {

			$slug = $this->request->data['Tradition']['slug'];
			$image = $this->request->data['Tradition']['slug'] . '.jpg';
			$awning_image = $this->request->data['Tradition']['slug'] . '.png';

			$type = $this->request->data['Tradition']['image_type'];

			$targetdir = IMAGES . 'Traditions/' . $type . '/';

			$this->Image = $this->Components->load('Image');

			$upload = $this->Image->upload($this->request->data['Tradition']['image']['tmp_name'], $targetdir, $image);
			$upload_awning = $this->Image->upload($this->request->data['Tradition']['image']['tmp_name'], $targetdir, $awning_image);

			if($upload == 'Success') {
					$this->Tradition->id = $this->request->data['Tradition']['id'];
					$this->Tradition->saveField($type, $image);
					$uploadedfile = $targetdir . '/' . $image;
					//$this->Image->resample($uploadedfile, IMAGES . '/Tradition_image/' . $slug . '/', $image, 900, 600, 1, 0);
					//$this->Image->resample($uploadedfile, IMAGES . '/Tradition_image/', $image, 200, 200, 1, 0);
			}

			$this->Session->setFlash($upload);
			$this->redirect($this->referer());
		}
		
		
		if (!$this->Tradition->exists($id)) {
			throw new NotFoundException(__('Invalid tradition'));
		}
		$options = array('conditions' => array('Tradition.' . $this->Tradition->primaryKey => $id));
		$this->set('tradition', $this->Tradition->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Tradition->create();
			if ($this->Tradition->save($this->request->data)) {
				$this->Session->setFlash(__('The tradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tradition could not be saved. Please, try again.'));
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Tradition->exists($id)) {
			throw new NotFoundException(__('Invalid tradition'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tradition->save($this->request->data)) {
				$this->Session->setFlash(__('The tradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tradition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tradition.' . $this->Tradition->primaryKey => $id));
			$this->request->data = $this->Tradition->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Tradition->id = $id;
		if (!$this->Tradition->exists()) {
			throw new NotFoundException(__('Invalid tradition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tradition->delete()) {
			$this->Session->setFlash(__('Tradition deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tradition was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_awnings() {
		$users = $this->Tradition->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Tradition.id',
				'Tradition.slug',
				'Tradition.name',
				'Tradition.image_1',
				'Tradition.awning_image',
			),
			'order' => array(
				'Tradition.name' => 'ASC'
			),
		));

		$this->set(compact('traditions'));

	}

////////////////////////////////////////////////////////////

	public function admin_awning($id = null) {

		$this->Tradition->id = $id;
		if (!$this->Tradition->exists()) {
			throw new NotFoundException(__('Invalid tradition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->Tradition->save($this->request->data)) {
				$this->Session->setFlash('The tradition has been saved');
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash('The tradition could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->Tradition->read(null, $id);
			$this->set('tradition', $this->Tradition->read(null, $id));
		}
	}

////////////////////////////////////////////////////////////

}
