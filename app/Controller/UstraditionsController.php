<?php
App::uses('AppController', 'Controller');
class UstraditionsController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
		$this->Ustradition->recursive = 0;
		$this->set('ustraditions', $this->paginate());
		
	}

////////////////////////////////////////////////////////////

	public function view() {
		
		$args = array_unique(func_get_args());
		
		//// Tradition Name //////
		$this->set('fst',$args['0']);
		
		///////////////// Left Panel - Other Us Traditions Start ///////////////////////
		$ustraditions = $this->Ustradition->find('all', array(
			'recursive' => -1,
			'conditions' => array(
				'Ustradition.active' => 1
			),
			'order' => array(
				'Ustradition.name' => 'ASC'
			)
		));
		$this->set(compact('ustraditions'));
		////////////////// Other Us Traditions End ////////////////////
		
		$ustradition = $this->Ustradition->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Ustradition.slug' => $args['0']
			)
		));
		if(empty($ustradition)) {
			die('Invalid US Region');
		}
		$this->set(compact('ustradition'));
		
		
		$ustradition_id = $ustradition['Ustradition']['id'];

		$this->loadModel('Product');
	
		////////////////////Fetch Products Brands///////////////
		
		if(!empty($args['1']) && $args['1']=='brand'){
			$this->loadModel('Brand');
			$Brandinfo = $this->Brand->find('first', array(
				'recursive' => -1,
				'conditions' => array(
					'Brand.slug' => $args['2']
				)
			));
			$bid = $Brandinfo['Brand']['id'];
			//////Product SQL for brand and ustraditions////////////
			$productconditions =  array(
					'Product.active' => 1,
				'User.active' => 1,
				'Product.ustradition_id' => $ustradition_id,
				'Product.brand_id' => $bid,
			);
		}
		else
		{
		//////////////// Product SQL for ustraditions only////////////////
			$productconditions =  array(
				'Product.active' => 1,
				'User.active' => 1,
				'Product.ustradition_id' => $ustradition_id,
			);
		}
		////////////////////////Product Listing Query//////////////////////////////
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
				'Product.name',
				'Product.slug',
				'Product.description',
				'Product.price',
				'Product.displaygroup',
				'Product.image',
				'Product.category_id',
				'User.id',
				'User.slug',
				'User.username',
				'User.name',
			),
			'conditions' =>$productconditions,
			'limit' => 32,
			'order' => array(
				'Product.name' => 'ASC',
				'Product.displaygroup' => 'ASC'
				
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
				'User.active' => 1,
				'Product.active' => 1,
				'Product.ustradition_id' => $ustradition_id,
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

	public function admin_index() {
		$this->Ustradition->recursive = 0;
		$this->set('ustraditions', $this->paginate());
	}

////////////////////////////////////////////////////////////

//	public function admin_view($id = null) {
//		if (!$this->Ustradition->exists($id)) {
//			throw new NotFoundException(__('Invalid ustradition'));
//		}
//		$ustradition = $this->Ustradition->find('first', array(
//			'conditions' => array(
//				'Ustradition.id' => $id
//			)
//		));
//		$this->set(compact('ustradition'));
//	}
//

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->Ustradition->exists($id)) {
			throw new NotFoundException(__('Invalid ustradition'));
		}
				
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ustradition->save($this->request->data)) {
				$this->Session->setFlash(__('The ustradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustradition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ustradition.' . $this->Ustradition->primaryKey => $id));
			$this->request->data = $this->Ustradition->find('first', $options);
		}
		
		$ustradition = $this->Ustradition->find('first', array(
			'conditions' => array(
				'Ustradition.id' => $id
			)
		));
		
		$this->set(compact('ustradition'));
	}



////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Ustradition->create();
			if ($this->Ustradition->save($this->request->data)) {
				$this->Session->setFlash(__('The ustradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustradition could not be saved. Please, try again.'));
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Ustradition->exists($id)) {
			throw new NotFoundException(__('Invalid ustradition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ustradition->save($this->request->data)) {
				$this->Session->setFlash(__('The ustradition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustradition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ustradition.' . $this->Ustradition->primaryKey => $id));
			$this->request->data = $this->Ustradition->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Ustradition->id = $id;
		if (!$this->Ustradition->exists()) {
			throw new NotFoundException(__('Invalid ustradition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ustradition->delete()) {
			$this->Session->setFlash(__('Ustradition deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ustradition was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
