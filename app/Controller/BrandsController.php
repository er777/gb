<?php
App::uses('AppController', 'Controller');
class BrandsController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {

		$subDomain = $this->_getSubDomain();

		if(!isset($this->params->query['debug'])) {
			$useractive = 1;
		} else {
			$useractive = array(0,1);
		}

		if($subDomain != 'www') {
			$user = $this->Brand->Product->User->getBySubdomain($subDomain, $useractive);
			if(!$user) {
				die('error');
			}

		} else{
			$user = array();
		}

		// print_r($user);

		if(!empty($user)) {
			$conditions[] = array(
				'Product.active' => 1,
				'Product.show' => 1,
				'Product.user_id' => $user['User']['id']
			);
		} else {
			$conditions[] = array(
				'Product.active' => 1,
				'Product.show' => 1,
			);
		}

		$this->paginate = array(
			'contain' => array(
				'User',
				'Brand'
			),
			'recursive' => -1,
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.slug',
				'Product.image',
				'Product.price',
				'Product.displaygroup',
				'Product.brand_id',
				'User.slug',
				'User.name',
				'User.more',
				'Brand.name',
			),
			'limit' => 20,
			'order' => array(
				'Product.displaygroup' => 'ASC',
				//'Product.name' => 'ASC',
				'Brand.name' => 'ASC'
			),
			'paramType' => 'querystring',
			'conditions' => $conditions
		);
		$products = $this->paginate($this->Brand->Product);
		// print_r($products);
		// die;
		$this->set(compact('products'));

		$brands = $this->Brand->Product->find('all', array(
			'contain' => array('Brand'),
			'fields' => array(
				'Brand.name',
				'Brand.slug',
			),
			'conditions' => $conditions,
			'order' => array(
				'Brand.name' => 'ASC'
			),
			'group' => array(
				'Brand.id'
			),
		));
		// print_r($brands);
		$this->set(compact('brands'));

	}

////////////////////////////////////////////////////////////

	public function view($id = null) {
		$brand = $this->Brand->find('first', array(
			'conditions' => array(
				'Brand.slug' => $id
			)
		));
		if (empty($brand)) {
			$this->redirect(array('action' => 'index'), 301);
		}
		// print_r($brand);
		$this->set(compact('brand'));


		$subDomain = $this->_getSubDomain();

		if(!isset($this->params->query['debug'])) {
			$useractive = 1;
		} else {
			$useractive = array(0,1);
		}

		if($subDomain != 'www') {
			$user = $this->Brand->Product->User->getBySubdomain($subDomain, $useractive);
			if(!$user) {
				die('error');
			}

		} else{
			$user = array();
		}
		$this->set(compact('user'));

		if(!empty($user)) {
			$conditions[] = array(
				'Product.active' => 1,
				'Product.show' => 1,
				'Product.user_id' => $user['User']['id'],
				'Product.brand_id' => $brand['Brand']['id'],
			);
		} else {
			$conditions[] = array(
				'Product.active' => 1,
				'Product.show' => 1,
				'Product.brand_id' => $brand['Brand']['id'],
			);
		}

		// print_r($conditions);
		// die;

		$this->paginate = array(
			'contain' => array(
				'User',
				'Brand'
			),
			'recursive' => -1,
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.slug',
				'Product.image',
				'Product.price',
				'Product.displaygroup',
				'Product.brand_id',
				'User.slug',
				'User.more',
				'Brand.name',
			),
			'limit' => 20,
			'order' => array(
				'Product.displaygroup' => 'ASC',
				//'Product.name' => 'ASC',
				'Brand.name' => 'ASC'
			),
			'paramType' => 'querystring',
			'conditions' => $conditions
		);
		$products = $this->paginate($this->Brand->Product);
		// print_r($products);
		// die;
		$this->set(compact('products'));


		$brands = array();
		$this->set(compact('brands'));

		$usercategories = array();
		$this->set(compact('usercategories'));

		// $this->render('/Products/index');

	}

////////////////////////////////////////////////////////////

	public function admin_reset() {
		$this->Session->delete('Brand');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		if ($this->request->is('post')) {

			if(!empty($this->request->data['Brand']['name'])) {
				$filter = $this->request->data['Brand']['filter'];
				$this->Session->write('Brand.filter', $filter);
				$name = $this->request->data['Brand']['name'];
				$this->Session->write('Brand.name', $name);
				$conditions[] = array(
					'Brand.' . $filter . ' LIKE' => '%' . $name . '%'
				);
			} else {
				$this->Session->write('Brand.filter', '');
				$this->Session->write('Brand.name', '');
			}

			$this->Session->write('Brand.conditions', $conditions);
			$this->redirect(array('action' => 'index'));

		}

		$all = array(
			'user_id' => '',
			'brand_id' => '',
			'name' => '',
			'filter' => '',
			'conditions' => ''
		);


		if($this->Session->check('Brand')) {
			$all = $this->Session->read('Brand');
		}

		$this->set(compact('all'));

		$this->paginate = array(
			'recursive' => -1,
			'contain' => array(
			),

			'order' => array(
				'Brand.modified' => 'DESC'
			),
			'conditions' => $all['conditions'],
			'limit' => 50,
		);

		$brands = $this->paginate('Brand');

		$this->set(compact('brands'));
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		if (isset($this->request->data['Brand']['image_type'])) {

			$slug = $this->request->data['Brand']['slug'];
			$image = $this->request->data['Brand']['slug'] . '.jpg';

			$type = $this->request->data['Brand']['image_type'];

			$targetdir = IMAGES . 'brands/' . $type;

			$this->Image = $this->Components->load('Image');

			$upload = $this->Image->upload($this->request->data['Brand']['image']['tmp_name'], $targetdir, $image);

			if($upload == 'Success') {
				$this->Brand->id = $this->request->data['Brand']['id'];
				$this->Brand->saveField($type, $image);
				$uploadedfile = $targetdir . '/' . $image;
				$this->Image->resample($uploadedfile, IMAGES . '/brands/' . $type . '/', $image, 150, 150, 1, 0);
				//$this->Image->resample($uploadedfile, IMAGES . '/user_image/', $image, 200, 200, 1, 0);
			}

			$this->Session->setFlash($upload);
			$this->redirect($this->referer());
		}

		$brand = $this->Brand->find('first', array(
			'conditions' => array(
				'Brand.id' => $id
			)
		));
		if (empty($brand)) {
			throw new NotFoundException('Invalid Brand');
		}
		$this->set(compact('brand'));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Brand->create();
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash('The brand has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The brand could not be saved. Please, try again.');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Invalid brand'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash('The brand has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The brand could not be saved. Please, try again.');
			}
		} else {
			$options = array('conditions' => array('Brand.id' => $id));
			$this->request->data = $this->Brand->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException('Invalid brand');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Brand->delete()) {
			$this->Session->setFlash('Brand deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Brand was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
