<?php
App::uses('AppController', 'Controller');

class ContentsController extends AppController {

////////////////////////////////////////////////////////////

	public function homepage() {
	
		$feature = ClassRegistry::init('Feature')->find('all', array(
			'fields' => array(
				'Feature.gwm_product',
				'Feature.user_id',
				'Feature.type',
			),
		));
		
		$this->set(compact('features'));		
		//debug($features);
		
		$productIds = Set::classicExtract($feature, '{n}.Feature.gwm_product');
			//print_r($productIds);
				
/////// SEASONAL			
				
			$gift = ClassRegistry::init('Feature')->find('all', array(
				'fields' => array(
					'Feature.type',
					'Feature.gwm_product',
					'Feature.user_id',
				),
				'conditions' => array(
					'Feature.type' => 1,
				)		
			));
			
			$this->set(compact('gift'));
			//debug($gift);
						
			$giftProductIds = Set::classicExtract($gift, '{n}.Feature.gwm_product');
			//print_r($productIds);				
				
			$gift_products = ClassRegistry::init('Product')->find('all', array(
				'contain' => array(
					'User',					
				),				
				'fields' => array(
					'Product.id',
					'Product.name', 
					'Product.slug', 
					'Product.image',
					'Product.price',
					'User.slug',
				),
				'conditions' => array(
					'Product.id' => $giftProductIds
				)
			));
			$this->set(compact('gift_products'));
			//debug($products);

/////// US FOODS				
				
			$us = ClassRegistry::init('Feature')->find('all', array(
				'fields' => array(
					'Feature.type',
					'Feature.gwm_product',
					'Feature.user_id',
				),
				'conditions' => array(
					'Feature.type' => 2,
				)		
			));
			
			$this->set(compact('us'));
			//debug($us);
						
			$usProductIds = Set::classicExtract($us, '{n}.Feature.gwm_product');		
				
			$us_products = ClassRegistry::init('Product')->find('all', array(
				'contain' => array(
					'User',					
				),				
				'fields' => array(
					'Product.id',
					'Product.user_id',
					'Product.name', 
					'Product.slug', 
					'Product.image',
					'Product.price',
					'User.slug',
				),
				'conditions' => array(
					'Product.id' => $usProductIds
				)
			));
			$this->set(compact('us_products'));


/////// INTL FOODS							
			$intl = ClassRegistry::init('Feature')->find('all', array(
				'fields' => array(
					'Feature.type',
					'Feature.gwm_product',
					'Feature.user_id',
				),
				'conditions' => array(
					'Feature.type' => 3,
				)		
			));
			$this->set(compact('intl'));
						
			$intlProductIds = Set::classicExtract($intl, '{n}.Feature.gwm_product');
				
			$intl_products = ClassRegistry::init('Product')->find('all', array(
				'contain' => array(
					'User',					
				),				
				'fields' => array(
					'Product.id',
					'Product.user_id',
					'Product.name', 
					'Product.slug', 
					'Product.image',
					'Product.price',
					'User.slug',
				),
				'conditions' => array(
					'Product.id' => $intlProductIds
				)
			));
			$this->set(compact('intl_products'));
			
/////// RECIPES							
			$featurerecipe= ClassRegistry::init('Recipe')->find('all', array(
				'fields' => array(
					'Recipe.name',
					'Recipe.slug',
					'Recipe.image_1',
					'Recipe.id',
				),
				'conditions' => array(
					'Recipe.featured' => 1,
				)		
			));
			
			$this->set(compact('featurerecipe'));
			//debug($recipe);
						
			$featurerecipeObjectIds = Set::classicExtract($featurerecipe, '{n}.Recipe.id');
			//print_r($productIds);								
			$featurerecipe_objects = ClassRegistry::init('Recipe')->find('all', array(	
				'contain' => array(
					'User',
				),			
				'fields' => array(
					'Recipe.name', 
					'Recipe.slug', 
					'Recipe.image_1',
					'Recipe.id',
					'User.slug',
					'Recipe.user_id',
				),
				'conditions' => array(
					'Recipe.featured' => 1,
					'Recipe.id' => $featurerecipeObjectIds
				)
			));
			$this->set(compact('featurerecipe_objects'));
			//debug($featurerecipe_objects);


	

		$contents = $this->Content->find('all', array(
			'conditions' => array(
				'Content.active' => 1,
				'Content.type' => 'slider'
			)
		));
		$this->set(compact('contents'));
		
		

		$welcome = $this->Content->find('first', array(
			'conditions' => array(
				'Content.type' => 'welcome'
			)
		));
		$this->set(compact('welcome'));


		$types = $this->Content->find('first', array(
			
		));
		$this->set(compact('types'));

		//$blocks = ClassRegistry::init('Block')->find('all');
		//$this->set(compact('blocks'));



		$title_for_layout = 'Gourmet World Market and Magazine';
		$this->set(compact('title_for_layout'));
		
		
		
		$this->layout = 'homepage';

	}

////////////////////////////////////////////////////////////

	public function magazine() {

		$magazine_landing= $this->Content->find('first', array(
			'conditions' => array(
				'Content.type' => 'magazine'
			)
		));
		$this->set(compact('magazine_landing'));

		$blocks = ClassRegistry::init('Block')->find('all');
		$this->set(compact('blocks'));

		$this->layout = 'magazine';

	}

////////////////////////////////////////////////////////////


	public function index() {
		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function view($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
		$this->set('content', $this->Content->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function add() {
		if ($this->request->is('post')) {
			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		}
	}

////////////////////////////////////////////////////////////

	public function edit($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
			$this->request->data = $this->Content->find('first', $options);
		}

	}

////////////////////////////////////////////////////////////

	public function delete($id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Content->delete()) {
			$this->Session->setFlash(__('Content deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
		$this->set('content', $this->Content->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
			$this->request->data = $this->Content->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Content->delete()) {
			$this->Session->setFlash(__('Content deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}