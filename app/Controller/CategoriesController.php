<?php
App::uses('AppController', 'Controller');
class CategoriesController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
		$categories = $this->Category->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Category.id',
				'Category.name',
				'Category.slug',
				'Category.image',
			),
			'conditions' => array(
				'Category.product_count >' => 1
			),
			'order' => array(
				'Category.name' => 'ASC'
			)
		));
		$this->set(compact('categories'));
		$this->layout = 'categories';
	}

////////////////////////////////////////////////////////////

	public function view() {

		$args = array_unique(func_get_args());

		$categoryslug = $args[0];

		//debug($args);

		$category = $this->Category->find('first', array(
			'recursive' => -1,
			'fields' => array(
				'Category.*',
			),
			'conditions' => array(
				'Category.slug' => $categoryslug
			)
		));
		$this->set(compact('category'));

		if(empty($category)) {
			die('invalid category');
		}

		$subcategories = $this->Category->Product->find('all', array(
			'recursive' => -1,
			'contain' => array(
				'User',
				'Subcategory'
			),
			'fields' => array(
				'Subcategory.*'
			),
			'conditions' => array(
				'User.active' => 1,
				'Product.active' => 1,
				'Product.category_id >' => 0,
				'Product.subcategory_id >' => 0,
				'Subcategory.category_id' => $category['Category']['id'],
				'Subcategory.product_count >' => 1
			),
			'group' => array(
				'Subcategory.id'
			),
			'order' => array(
				'Subcategory.name' => 'ASC'
			),
		));
//		debug($subcategories);
		$this->set(compact('subcategories'));

		$productconditions = array(
			'User.active' => 1,
			'Product.active' => 1,
			'Product.category_id' => $category['Category']['id']
		);

		if(isset($args[1])) {
			$subcategory =  $this->Category->Subcategory->find('first', array(
				'conditions' => array(
					'Subcategory.category_id' => $category['Category']['id'],
					'Subcategory.slug' => $args[1]
				)
			));
//			debug($subcategory);
			$this->set(compact('subcategory'));

			$productconditions[] = array(
				'Product.subcategory_id' => $subcategory['Subcategory']['id']
			);

			$subsubcategories = $this->Category->Product->find('all', array(
				'recursive' => -1,
				'contain' => array(
					'User',
					'Subsubcategory'
				),
				'fields' => array(
					'Product.*',
					'Subsubcategory.*'
				),
				'conditions' => array(
					'User.active' => 1,
					'Product.active' => 1,
					'Product.subcategory_id' => $subcategory['Subcategory']['id'],
					'Product.subsubcategory_id >' => 0,
					'Subsubcategory.name >' => ''
				),
				'group' => array(
					'Subsubcategory.id'
				)
			));
//			debug($subsubcategories);
			$this->set(compact('subsubcategories'));
		}

		if(isset($args[2])) {
			$subsubcategory = $this->Category->Product->Subsubcategory->find('first', array(
				'conditions' => array(
//					'Subsubcategory.subcategory_id' => $subcategory['Subcategory']['id'],
					'Subsubcategory.slug' => $args[2]
				)
			));
			$productconditions[] = array(
				'Product.subsubcategory_id' => $subsubcategory['Subsubcategory']['id']
			);
			$this->set(compact('subsubcategory'));
		}

		//debug($productconditions);

		$products = $this->Category->Product->find('all', array(
			'recursive' => -1,
			'contain' => array('User'),
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.slug',
				'Product.image',
				'Product.price',
				'Product.brand',
				'User.id',
				'User.name',
				'User.slug',
			),
			'conditions' => $productconditions
		));
//		debug($products);
		$this->set(compact('products'));

	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		$this->paginate = array(
			'recursive' => -1,
			'fields' => array(
				'Category.*',
			),
			'order' => array(
				'Category.name' => 'ASC'
			),
			'limit' => 100,
			'paramType' => 'querystring',
		);
		$categories = $this->paginate('Category');
		$this->set(compact('categories'));

	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		if (isset($this->request->data['Category']['image_type'])) {

			$slug = $this->request->data['Category']['slug'];
			$image = $this->request->data['Category']['slug'] . '.jpg';

			$type = $this->request->data['Category']['image_type'];

			$targetdir = IMAGES . 'categories/' . $type . '/';

			$this->Image = $this->Components->load('Image');

			$upload = $this->Image->upload($this->request->data['Category']['image']['tmp_name'], $targetdir, $image);

			if($upload == 'Success') {
				$this->Category->id = $this->request->data['Category']['id'];
				$this->Category->saveField($type, $image);
				$uploadedfile = $targetdir . '/' . $image;
				//$this->Image->resample($uploadedfile, IMAGES . '/categories/' . $slug . '/', $image, 900, 600, 1, 0);
				//$this->Image->resample($uploadedfile, IMAGES . '/categories/', $image, 200, 200, 1, 0);
			}

			$this->Session->setFlash($upload);
			$this->redirect($this->referer());
		}

		if (!$this->Category->exists($id)) {
			throw new NotFoundException('Invalid category');
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The category could not be saved. Please, try again.');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.id' => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException('Invalid category');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash('Category deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Category was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
