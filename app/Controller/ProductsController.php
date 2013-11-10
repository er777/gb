<?php
App::uses('AppController', 'Controller');
class ProductsController extends AppController {

////////////////////////////////////////////////////////////

	public function maestro($key = null) {

		if($key != 'secret') {
			die('sorry');
		}

		App::uses('HttpSocket', 'Network/Http');
		$httpSocket = new HttpSocket();

		$yesterday = date('Y-m-d H:i:s', strtotime('-1 day'));

		// print_r($yesterday);
		// die;

		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'conditions' => array(
				'Product.user_id' => 11,
				'Product.active' => 1,
				'Product.stock_updated <' => $yesterday
			),
			'order' => 'RAND()',
			'limit' => 20
		));

		foreach($products as $product) {

			//sleep(1);

			$response = $httpSocket->get('https://www.maestrolico.com/api/checkstockstatus.asp?distributorid=117&productid=' . $product['Product']['vendor_sku']);
			echo '<br /><hr><br />';
			echo $product['Product']['name'] . ' - ' . $product['Product']['vendor_sku'];
			echo '<br /><br />';
			debug($response['body']);

			$update = explode('|', $response['body']);

			debug($update);

			debug(date('H:i:s'));

			$data['Product']['id'] = $product['Product']['id'];
			$data['Product']['stock'] = $update[1];
			$data['Product']['stock_updated'] = date('Y-m-d H:i:s');
			$this->Product->save($data, false);

		}

		die('end');
	}

////////////////////////////////////////////////////////////

	public function slug() {
		die('slug');
		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'conditions' => array(
				'Product.slug' => ''
			),
			'limit' => 10000
		));

		foreach($products as $product) {
			$data['Product']['id'] = $product['Product']['id'];
			$data['Product']['slug'] = strtolower(Inflector::slug($product['Product']['name'], '-'));
			$this->Product->save($data, false);
		}
		die('end');
	}

////////////////////////////////////////////////////////////

	public function __trimname() {
		die('trim');
		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'conditions' => array(
			//'Product.slug' => ''
			),
			'limit' => 10000
		));

		foreach($products as $product) {
			$data['Product']['id'] = $product['Product']['id'];
			$data['Product']['name'] = trim($product['Product']['name']);
			$this->Product->save($data, false);
		}
		die('end');
	}

////////////////////////////////////////////////////////////

	public function index() {

		$conditions = array('User.level' => 'vendor');

		if(!isset($this->params->query['debug'])) {
			$useractive = 1;
		} else {
			$useractive = array(0,1);
		}

		$subDomain = $this->_getSubDomain();

		if($subDomain != 'www') {
			$user = $this->Product->User->getBySubdomain($subDomain, $useractive);
			if(!$user) {
				die('error');
			}

			$usercategories =  $this->Product->find('all', array(
				'contain' => array('Category'),
				'fields' => array(
					'Category.name',
					'Category.slug'
				),
				'conditions' => array(
					'Product.active' => 1,
					'Product.show' => 1,
					'Product.user_id' => $user['User']['id']
				),
				'group' => array(
					'Product.category_id'
				),
				'order' => array(
					'Category.name' => 'ASC'
				),
			));
		} else{
			$user = array();
			$usercategories = array();
		}
		$this->set(compact('user', 'usercategories'));

		if(!empty($user)) {
			$conditions[] = array(
				'Product.active' => 1,
				'Product.show' => 1,
				'Product.user_id' => $user['User']['id']
			);
		}

		$brands = $this->Product->find('all', array(
			'contain' => array('Brand'),
			'fields' => array(
				'Brand.name',
			),
			'conditions' => array(
				'Product.active' => 1,
				'Product.show' => 1,
				'Product.user_id' => $user['User']['id']
			),
			'order' => array(
				'Brand.name' => 'ASC'
			),
			'group' => array(
				'Brand.id'
			),
		));
		// print_r($brands);
		$this->set(compact('brands'));


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
				'User.slug',
				'User.more',
				'User.name',
				'Brand.name'
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

		$products = $this->paginate('Product');

		$displaygroups = $this->Product->displaygroups();

		$this->set(compact('products','brand','displaygroups'));

		$title = empty($user) ? 'All Products' : $user['User']['name'];

		$title_for_layout = $title . ' :: GB';
		$this->set(compact('title_for_layout'));

	}

////////////////////////////////////////////////////////////

	public function view($id = null) {

		$subDomain = $this->_getSubDomain();

		if(!isset($this->params->query['debug'])) {
			$useractive = 1;
		} else {
			$useractive = array(0,1);
		}

		if($subDomain != 'www') {
			$user = $this->Product->User->getBySubdomain($subDomain, $useractive);

			$usercategories = $this->Product->find('all', array(
				'contain' => array('Category'),
				'fields' => array(
					'Category.name',
					'Category.slug',
					//'Brand.name',
				),
				'conditions' => array(
					'Product.active' => 1,
					'Product.show' => 1,
					'Product.user_id' => $user['User']['id']
				),
				'group' => array(
					'Product.category_id'
				),
				'order' => array(
					'Category.name' => 'ASC'
				),
			));

			$vendorshop = true;

		} else {
			$user = array();
			$usercategories = null;
			$vendorshop = false;
		}
		$this->set(compact('user', 'usercategories'));

		$productconditions = array(
			'Product.id' => $id,
			'Product.active' => 1,
			'Product.show' => 1,
		);

		if(isset($this->params->query['debug'])) {
			$productconditions = array(
				'Product.id' => $id,
			);
		}

		$product = $this->Product->find('first', array(
			'recursive' => -1,
			'contain' => array(
				'Category',
				'Subcategory',
				'Subsubcategory',
				'Brand',
				'Ustradition',
				'User' => array(
					'fields' => array(
						'User.image',
						'User.shipping_policy',
						'User.mini_shipping_policy',
						'User.name',
						'User.slug'
					),
				),
			),
			'conditions' => $productconditions
		));

		if (empty($product)) {
			$this->redirect(array('action' => 'index'), 301);
		}

		$auxcategoriesIds = array($product['Product']['auxcategory_1'], $product['Product']['auxcategory_2'], $product['Product']['auxcategory_3']);
		// debug($auxcategoriesIds);

		$auxcategories = $this->Product->Category->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Category.id',
				'Category.slug',
				'Category.name',
			),
			'conditions' => array(
				'Category.id' => $auxcategoriesIds
			),
			'order' => array(
				'Category.name' => 'ASC'
			)
		));
		//debug($auxcategories);

		$this->set(compact('auxcategories'));

		if($vendorshop && ($subDomain != $product['User']['slug'])) {
			$this->redirect(array('action' => 'index'), 301);
		}

		if(!empty($product['Product']['related_products'])) {

			$related_products_ids = $product['Product']['related_products'];

			$related_products = $this->Product->find('all', array(
				'recursive' => -1,
				'conditions' => array(
					'Product.id' => $related_products_ids,
					'Product.active' => 1,
					'Product.show' => 1,
				)
			));

		} else {
			$related_products = array();
		}
		$this->set(compact('related_products'));

		$attributes = array();
		foreach($product['Product'] as $key => $value) {
			if($value == 1 && (substr($key, 0, 5) == 'attr_')) {
				$attributes[substr($key, 5)] = $value;
			}
		}
		$this->set(compact('attributes'));

		$nuts = array();
		foreach($product['Product'] as $nkey => $nvalue) {
			if((substr($nkey, 0, 4) == 'nut_')) {
				if(!empty($nvalue) || $nkey == 'nut_vitamin_a' || $nkey == 'nut_vitamin_c' || $nkey == 'nut_calcium' || $nkey == 'nut_iron') {
					// if(!empty($nvalue)) {
						$nuts[substr($nkey, 4)] = $nvalue;
					// }
				}
			}
		}
		$this->set(compact('nuts'));

		$productmods = $this->Product->Productmod->getAllProductMods($id, $product['Product']['price']);
		$this->set('productmodshtml', $productmods['productmodshtml']);
		// $this->set('productmods', $productmods['productmods']);
		// $this->set('deviation_json', $productmods['deviation_json']);

		if ($product['Product']['user_id'] == 11) {
			$days_ago_1 = date('Y-m-d H:i:s', strtotime('-3 days'));
			if($product['Product']['stock_updated'] < $days_ago_1) {
				App::uses('HttpSocket', 'Network/Http');
				$httpSocket = new HttpSocket();
				$gbrequest = 'https://www.maestrolico.com/api/checkstockstatus.asp?distributorid=' . Configure::read('Settings.MAESTRO_DISTRIBUTOR_ID') . '&productid=' . $product['Product']['vendor_sku'];
				// echo $gbrequest;
				$response = $httpSocket->get($gbrequest);
				$res = explode('|', $response['body']);
				$this->Product->updateAll(
					array(
						'Product.stock' => $res[1],
						'Product.stock_updated' => 'NOW()',
					),
					array('Product.id' => $product['Product']['id'])
				);
				$product['Product']['stock'] = $res[1];
			}
		}

		// if $product['Product']['stock_updated'] > 1 day
		// check stock from maestro
		// update $product['Product']['stock_updated']
		// update $product['Product']['stock']
		// endif

		// $product['Product']['last_viewed']

		// $d = date('Y-m-d H:i:s');
		// echo $d;
		// $days_ago = date('Y-m-d H:i:s', strtotime('-2 days', strtotime($d)));
		// echo $days_ago;

		// App::uses('HttpSocket', 'Network/Http');
		// $httpSocket = new HttpSocket();
		// $response = $httpSocket->get('https://www.maestrolico.com/api/checkstockstatus.asp?distributorid=' . Configure::read('Settings.MAESTRO_DISTRIBUTOR_ID') . '&productid=' . $this->product['Product']['vendor_sku']);
		// $res = explode('|', $response['body']);
		// if($res[1] < $quantity) {

		// cron
		// $product['Product']['stock_updated'] > 2 weeks AND $product['Product']['stock'] == 0
		// check stock from maestro
		// disable from store if stock = 0 ???

		$this->Product->updateAll(
			array(
				'Product.viewed' => 'Product.viewed + 1',
				'Product.last_viewed' => 'NOW()',
			),
			array('Product.id' => $product['Product']['id'])
		);

		$this->set(compact('product'));
		$title_for_layout = $product['Product']['name'] . ' - Gourmet Basket';
		$this->set(compact('title_for_layout'));

	}

////////////////////////////////////////////////////////////

	public function category() {

		$args = array_unique(func_get_args());

		$subDomain = $this->_getSubDomain();
		if($subDomain != 'www') {
			$user = $this->Product->User->getBySubdomain($subDomain);
			$this->set(compact('user'));
		}

		$category = $this->Product->Category->find('first', array(
			'conditions' => array(
				'Category.slug' => $args[0]
			)
		));
		$this->set(compact('category'));

		$productconditions = array(
			'Product.active' => 1,
			'Product.user_id' => $user['User']['id'],
			'Product.category_id' => $category['Category']['id'],
		);

		$subcategories =  $this->Product->find('all', array(
			'contain' => array(
				'Subcategory'
			),
			'fields' => array(
				'Subcategory.id',
				'Subcategory.category_id',
				'Subcategory.name',
				'Subcategory.slug',
			),
			'conditions' => array(
				'Product.active' => 1,
				'Product.user_id' => $user['User']['id'],
				'Product.category_id' => $category['Category']['id'],
				'Product.subcategory_id >' => 0,
			),
			'group' => array(
				'Product.subcategory_id'
			),
			'order' => array(
				'Subcategory.name' => 'ASC'
			),
		));
		$this->set(compact('subcategories'));

		if(isset($args[1])) {
			$subcategory =  $this->Product->find('first', array(
				'contain' => array(
					// 'User',
					'Subcategory'
				),
				'fields' => array(
					'Subcategory.*'
				),
				'conditions' => array(
					// 'User.active' => 1,
					'Product.active' => 1,
					'Product.user_id' => $user['User']['id'],
					'Product.category_id' => $category['Category']['id'],
					'Subcategory.category_id' => $category['Category']['id'],
					'Subcategory.slug' => $args[1]
				),
				'order' => array(
					'Product.displaygroup' => 'ASC'
				),
			));
			$this->set(compact('subcategory'));

			if(!empty($subcategory)) {
				$productconditions[] = array(
					'Product.subcategory_id' => $subcategory['Subcategory']['id']
				);
			}

			$subsubcategories = $this->Product->find('all', array(
				'recursive' => -1,
				'contain' => array(
					'User',
					'Category',
					'Subcategory',
					'Subsubcategory',
				),
				'fields' => array(
					'Category.*',
					'Subcategory.*',
					'Subsubcategory.*',
				),
				'conditions' => array(
					'User.active' => 1,
					'User.active' => 1,
					'Product.active' => 1,
					'Product.user_id' => $user['User']['id'],
					'Product.category_id' => $category['Category']['id'],
					'Product.subcategory_id' => $subcategory['Subcategory']['id'],
					'Product.subsubcategory_id >' => 0,
					'Subsubcategory.name >' => ''
				),
				'group' => array(
					'Subsubcategory.id'
				)
			));
			$this->set(compact('subsubcategories'));
		}

		if(isset($args[2])) {
			$subsubcategory = $this->Product->find('first', array(
				'contain' => array(
					'User',
					'Subsubcategory'
				),
				'fields' => array(
					'Subsubcategory.*',
				),
				'conditions' => array(
					'User.active' => 1,
					'Product.active' => 1,
					'Subsubcategory.slug' => $args[2]
				)
			));
			$this->set(compact('subsubcategory'));

			if(!empty($subsubcategory)) {
				$productconditions[] = array(
					'Product.subsubcategory_id' => $subsubcategory['Subsubcategory']['id']
				);
			}
		}

		$this->paginate = array(
			'contain' => array('User'),
			'recursive' => -1,
			'fields' => array(
				'Product.id',
				'Product.name',
				'Product.slug',
				'Product.image',
				'Product.price',
				'Product.displaygroup',
				//'Brand.name',
				'User.slug',
				'User.more',
			),
			'limit' => 40,
			'conditions' => $productconditions,
			'order' => array(
				'Product.displaygroup' => 'ASC',
				'Product.name' => 'ASC'
			),
			'paramType' => 'querystring',
		);
		$products = $this->paginate('Product');
		$this->set(compact('products'));

		$this->render('index');
	}

////////////////////////////////////////////////////////////

	// public function subcategory($id) {

	// 	$subDomain = $this->_getSubDomain();

	// 	if($subDomain != 'www') {
	// 		$user = $this->Product->User->getBySubdomain($subDomain);
	// 	}

	// 	$subcategory = $this->Product->Subcategory->find('first', array(
	// 		'conditions' => array(
	// 			'Subcategory.id' => $id
	// 		)
	// 	));

	// 	$category = $this->Product->Category->find('first', array(
	// 		'conditions' => array(
	// 			'Category.id' => $subcategory['Subcategory']['category_id']
	// 		)
	// 	));

	// 	$usersubsubcategories =  $this->Product->find('all', array(
	// 		'contain' => array('Category', 'Subcategory', 'Subsubcategory'),
	// 		'fields' => array(
	// 			'Subsubcategory.name',
	// 			'Subsubcategory.slug',
	// 		),
	// 		'conditions' => array(
	// 			'Product.active' => 1,
	// 			'Product.user_id' => $user['User']['id'],
	// 			'Product.subcategory_id' => $id,
	// 		),
	// 		'group' => array(
	// 			'Product.subsubcategory_id'
	// 		),
	// 		'order' => array(
	// 			'Subsubcategory.name' => 'ASC'
	// 		),
	// 	));

	// 	$this->paginate = array(
	// 		'contain' => array('User', 'Category', 'Subcategory', 'Subsubcategory'),
	// 		'fields' => array(
	// 			'Product.id',
	// 			'Product.name',
	// 			'Product.slug',
	// 			'Product.image',
	// 			'Product.price',
	// 			//'Product.brand_id',
	// 			//'Brand.name',
	// 			'User.slug'
	// 		),
	// 		'conditions' => array(
	// 			'Product.active' => 1,
	// 			'Product.user_id' => $user['User']['id'],
	// 			'Product.subcategory_id' => $id,
	// 		),
	// 		'order' => array(
	// 			'Subsubcategory.name' => 'ASC'
	// 		),
	// 		'paramType' => 'querystring',
	// 	);
	// 	$products = $this->paginate('Product');

	// 	$this->set(compact('user', 'category', 'subcategory', 'usersubsubcategories', 'products'));

	// 	$this->render('index');
	// }

////////////////////////////////////////////////////////////

	// public function subsubcategory($slug) {

	// 	$subDomain = $this->_getSubDomain();

	// 	if($subDomain != 'www') {
	// 		$user = $this->Product->User->getBySubdomain($subDomain);
	// 	}

	// 	$subsubcategory = $this->Product->Subsubcategory->find('first', array(
	// 		'conditions' => array(
	// 			'Subsubcategory.id' => $slug
	// 		)
	// 	));

	// 	$subcategory = $this->Product->Subcategory->find('first', array(
	// 		'conditions' => array(
	// 			'Subcategory.id' => $subsubcategory['Subsubcategory']['subcategory_id']
	// 		)
	// 	));

	// 	$category = $this->Product->Category->find('first', array(
	// 		'conditions' => array(
	// 			'Category.id' => $subcategory['Subcategory']['category_id']
	// 		)
	// 	));

	// 	$this->paginate = array(
	// 		'contain' => array('User'),
	// 		'fields' => array(
	// 			'Product.id',
	// 			'Product.name',
	// 			'Product.slug',
	// 			'Product.image',
	// 			'Product.price',
	// 			//'Product.brand_name',
	// 			'User.slug'
	// 		),
	// 		'conditions' => array(
	// 			'Product.active' => 1,
	// 			'Product.user_id' => $user['User']['id'],
	// 			'Product.subsubcategory_id' => $slug,
	// 		),
	// 		'order' => array(
	// 			'Product.name' => 'ASC'
	// 		),
	// 		'paramType' => 'querystring',
	// 	);
	// 	$products = $this->paginate('Product');

	// 	$this->set(compact('user', 'category',  'subcategory', 'subsubcategory', 'products'));

	// 	$this->render('index');
	// }

////////////////////////////////////////////////////////////

	public function search() {

		$search = null;
		if(!empty($this->request->query['search']) || !empty($this->request->data['name'])) {
			$search = empty($this->request->query['search']) ? $this->request->data['name'] : $this->request->query['search'] ;
			//$search = preg_replace('/[^a-zA-Z0-9 ]/', '', $search);
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			$conditions = array(
				'User.active' => 1,
				'User.level' => 'vendor',
				'Product.active' => 1,
			);
			foreach($terms as $term) {
				//$terms1[] = preg_replace('/[^a-zA-Z0-9]/', '', $term);
				$term = strtolower($term);
				$conditions[] = array(
					'OR' => array(
						'Product.name LIKE' => '%' . $term . '%',
						'Brand.name LIKE' => '%' . $term . '%',
						'Category.name LIKE' => '%' . $term . '%',
					)
				);
			}
			$products = $this->Product->find('all', array(
				'recursive' => -1,
				'contain' => array(
					'User',
					'Brand',
					'Category'
				),
				'fields' => array(
					'Product.id',
					'Product.name',
					'Product.slug',
					'Product.image',
					'Product.price',
					'Brand.name',
					'User.slug',
				),
				'conditions' => $conditions,
				'limit' => 200,
			));
			if(count($products) == 1) {
				$this->redirect(array('subdomain' => $products[0]['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $products[0]['Product']['id'], 'slug' => $products[0]['Product']['slug']));
			}
			$terms1 = array_diff($terms, array(''));
			$this->set(compact('products', 'terms1'));
		}
		$this->set(compact('search'));

		if ($this->request->is('ajax')) {
			$this->layout = false;
			$this->set('ajax', 1);
		} else {
			$this->set('ajax', 0);
		}

		$this->set('title_for_layout', 'Search');

		$description = 'Search';
		$this->set(compact('description'));

		$keywords = 'search';
		$this->set(compact('keywords'));
	}

////////////////////////////////////////////////////////////

	public function searchjson() {
		$search = null;
		if(!empty($this->request->query['search'])) {
			$search = $this->request->query['search'];
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			$conditions = array(
				'User.active' => 1,
				'User.level' => 'vendor',
				'Product.active' => 1,
			);
			foreach($terms as $term) {
				//$conditions[] = array(
				//'Product.name LIKE' => '%' . $term . '%'
				//);
				$conditions[] = array(
					// 'OR' => array(
						array('Product.name LIKE' => '%' . $term . '%'),
						// array('Product.brand LIKE' => '%' . $term . '%'),
					// )
				);
			}
			$products = $this->Product->find('all', array(
				'recursive' => 0,
				'contain' => array('User'),
				'fields' => array(
					'Product.name',
					'Product.image'
				),
				'conditions' => $conditions,
				'limit' => 200,
			));
		}
		echo json_encode($products);
		$this->autoRender = false;
	}

////////////////////////////////////////////////////////////

	public function mailchimp() {

		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'contain' => array('User'),
			'fields' => array(
				//'Product.id',
				//'Product.slug',
				//'User.slug'
			),
			'conditions' => array(
				'User.active' => 1,
				'User.level' => 'vendor',
				'Product.active' => 1,
			),
			'order' => array(
				'rand()'
			),
			'limit' => 30
		));
		$this->set(compact('products'));
		$this->layout = 'rss';
		$this->response->type('rss');

	}

////////////////////////////////////////////////////////////

	public function sitemap() {
		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'contain' => array('User'),
			'fields' => array(
				'Product.id',
				'Product.slug',
				'User.slug'
			),
			'conditions' => array(
				'User.active' => 1,
				'User.level' => 'vendor',
				'Product.active' => 1,
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
		));
		$this->set(compact('products'));
		$this->layout = 'xml';
		$this->response->type('xml');
	}

////////////////////////////////////////////////////////////

	public function admin_reset() {
		$this->Session->delete('Product');

		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_filter() {

		$field = $this->request->query['field'];
		$id = $this->request->query['id'];

		$this->Session->delete('Product');

		if($field == 'user_id') {
			$conditions[] = array(
				'Product.user_id' => $id,
			);
			$this->Session->write('Product.user_id', $id);
			$this->Session->write('Product.filter', '');
			$this->Session->write('Product.name', '');
		} else {
			$this->Session->write('Product.user_id', null);
			$this->Session->write('Product.filter', $field);
			$this->Session->write('Product.name', $id);
			$conditions[] = array(
				'Product.' . $field => $id
			);
		}

		$this->Session->write('Product.conditions', $conditions);

		$this->redirect(array('action' => 'index'));

	}

////////////////////////////////////////////////////////////

	public function vendor_index() {
		$this->paginate = array(
			'recursive' => 0,
			'conditions' => array(
				'Product.user_id' => $this->Auth->user('id')
			),
			'fields' => array(
				'Product.*',
				'User.id',
				'User.name',
				'User.level',
				'Category.id',
				'Category.name',
				'Subcategory.id',
				'Subcategory.name',
				'Subsubcategory.id',
				'Subsubcategory.name',
				'Ustradition.id',
				'Ustradition.name',
				'Brand.id',
				'Brand.name',

			),
			'limit' => 50,
		);
		$products = $this->paginate('Product');
		$this->set(compact('products','brands'));
	}

////////////////////////////////////////////////////////////

	public function related_products() {
		$this->paginate = array(
			'recursive' => 0,
			'conditions' => array(
				'Product.user_id' => $this->Auth->user('id')
			),
			'fields' => array(
				'Product.*',
				'User.id',
				'User.name',
				'User.level',

			),
			'limit' => 50,
		);
		$products = $this->paginate('Product');
		$this->set(compact('products'));
	}

////////////////////////////////////////////////////////////

	public function admin_csv($id = null) {

		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'conditions' => array(),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => 1000,
		));
		$this->set(compact('products'));

		$this->layout = false;

	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		if ($this->request->is('post')) {

			if(!empty($this->request->data['Product']['user_id'])) {
				$conditions[] = array(
					'Product.user_id' => $this->request->data['Product']['user_id']
				);
				$this->Session->write('Product.user_id', $this->request->data['Product']['user_id']);
			} else {
				$this->Session->write('Product.user_id', '');
			}

			if(!empty($this->request->data['Product']['brand_id'])) {
				$conditions[] = array(
					'Product.brand_id' => $this->request->data['Product']['brand_id']
				);
				$this->Session->write('Product.brand_id', $this->request->data['Product']['brand_id']);
			} else {
				$this->Session->write('Product.brand_id', '');
			}

			if(!empty($this->request->data['Product']['name'])) {
				$filter = $this->request->data['Product']['filter'];
				$this->Session->write('Product.filter', $filter);
				$name = $this->request->data['Product']['name'];
				$this->Session->write('Product.name', $name);
				$conditions[] = array(
					'Product.' . $filter . ' LIKE' => '%' . $name . '%'
				);
			} else {
				$this->Session->write('Product.filter', '');
				$this->Session->write('Product.name', '');
			}

			$this->Session->write('Product.conditions', $conditions);
			$this->redirect(array('action' => 'index'));

		}

		$all = array(
			'user_id' => '',
			'brand_id' => '',
			'name' => '',
			'filter' => '',
			'conditions' => ''
		);

		if($this->Session->check('Product')) {
			$all = $this->Session->read('Product');
		}

		$this->set(compact('all'));

		$this->paginate = array(
			'recursive' => -1,
			'contain' => array(
				'User',
				'Category',
				'Subcategory',
				'Subsubcategory',
				'Ustradition',
				'Brand',
			),
			'conditions' => $all['conditions'],
			'fields' => array(
				'Product.*',
				'User.id',
				'User.name',
				'User.slug',
				'User.active',
				'Category.id',
				'Category.name',
				'Subcategory.id',
				'Subcategory.name',
				'Subsubcategory.id',
				'Subsubcategory.name',
				'Ustradition.id',
				'Ustradition.name',
				'Brand.id',
				'Brand.name',
			),
			'limit' => 50,
		);

		$products = $this->paginate('Product');

		$this->set(compact('products'));

		$users = $this->Product->find('all', array(
			'contain' => array('User'),
			'fields' => array(
				'User.id',
				'User.name',
				'User.active',
			),
			'conditions' => array(
			),
			'order' => array(
				'User.active' => 'DESC',
				'User.name' => 'ASC',
				'Product.displaygroup' => 'DESC',
				'Product.discontinued' => 'ASC'
			),
			'group' => array(
				'Product.user_id',
			),
		));
		$users = Hash::combine($users, '{n}.User.id', array('%s - (%s)', '{n}.User.name', '{n}.User.active'));
		$users = str_replace(array('(1)','(0)'), array('(active)','(inactive)'), $users);

		$categories = $this->Product->Category->findList();

		$subcategories = $this->Product->Subcategory->find('list', array(
			'recursive' => -1,
			'order' => array(
				'Subcategory.name' => 'ASC'
			)
		));

		$subsubcategories = $this->Product->Subsubcategory->find('list', array(
			'recursive' => -1,
			'order' => array(
				'Subsubcategory.name' => 'ASC'
			)
		));

		$displaygroups = $this->Product->displaygroups();

		$ustraditions = $this->Product->Ustradition->findList();

		$brands = $this->Product->Brand->findList();

		$countries = $this->Product->countries();

		$this->set(compact('users', 'categories', 'subcategories', 'subsubcategories', 'ustraditions', 'brands', 'countries', 'displaygroups'));

	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		if ($this->request->is('post')) {

			$image = $this->request->data['Product']['id'] . '.jpg';

			$type = $this->request->data['Product']['image_type'];

			$targetdir = IMAGES . 'products/' . $type . '/';

			$this->Image = $this->Components->load('Image');

			$upload = $this->Image->upload($this->request->data['Product']['image']['tmp_name'], $targetdir, $image);

			if($upload == 'Success') {
				$this->Product->id = $this->request->data['Product']['id'];
				$this->Product->saveField($type, $image);
				$uploadedfile = $targetdir . '/' . $image;
				//$this->Image->resample($uploadedfile, IMAGES . '/user_image/' . $slug . '/', $image, 900, 600, 1, 0);
				//$this->Image->resample($uploadedfile, IMAGES . '/user_image/', $image, 200, 200, 1, 0);
			}

			$this->Session->setFlash($upload);
			$this->redirect($this->referer());
		}

		if (!$this->Product->exists($id)) {
			throw new NotFoundException('Invalid product');
		}

		$product = $this->Product->find('first', array(
			'recursive' => 0,
			'contain' => array(
				'User',
				'Brand',
				'Category',
				'Subcategory',
				'Subsubcategory',
			),
			'conditions' => array(
				'Product.id' => $id
			)
		));

		$this->set(compact('product'));

	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Product->create();

	if(!empty($this->request->data['Product']['traditions'])) {
				asort($this->request->data['Product']['traditions']);
				$this->request->data['Product']['traditions'] = implode(',', $this->request->data['Product']['traditions']);
			}

			if(!isset($this->request->data['Product']['subcategory_id'])) {
				$this->request->data['Product']['subcategory_id'] = '';
			}

			if(!isset($this->request->data['Product']['subsubcategory_id'])) {
				$this->request->data['Product']['subsubcategory_id'] = '';
			}

			$this->request->data['Product']['weight'] = sprintf('%.1f', $this->request->data['Product']['shipping_weight'] / 16);

			if ($this->Product->save($this->request->data)) {

				$product1= $this->Product->find('first', array(
					'recursive' => -1,
					'conditions' => array(
						'Product.id' => $this->Product->id
					)
				));
				$markup = (($product1['Product']['price'] - $product1['Product']['price_wholesale']) / $product1['Product']['price_wholesale']) * 100;
				$this->Product->saveField('markup', $markup);

				$this->Session->setFlash('The product has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$product = $this->Product->find('first', array(
					'recursive' => 0,
					'conditions' => array(
						'Product.id' => $id
					)
				));
				$this->set(compact('product'));
				$this->Session->setFlash('The product could not be saved. Please, try again.');
			}


			$this->set(compact('product'));
		}

		$users = $this->Product->User->find('list', array(
			'fields' => array(
				'User.id',
				'User.name',
			),
			'conditions' => array(
				'User.level' => 'vendor',
			),
			'order' => array(
				'User.active' => 'DESC',
				'User.name' => 'ASC'
			),
		));
//		$users = Hash::combine($users, '{n}.User.id', array('%s - (%s)', '{n}.User.name', '{n}.User.active'));

		$categories = $this->Product->Category->findList();

		$subcategories = $this->Product->Subcategory->findChain();

		$subsubcategories = $this->Product->Subsubcategory->findChain();

		$traditions = ClassRegistry::init('Tradition')->find('list', array(
			'recursive' => -1,
			'fields'=> array(
				'Tradition.id',
				'Tradition.name',
			),
			'order' => array(
				'Tradition.name' => 'ASC'
			)
		));

		$traditionsselected = array_map('intval', explode(',', $product['Product']['traditions']));

		$ustraditions = $this->Product->Ustradition->findList();

		$displaygroups = $this->Product->displaygroups();

		$brands = $this->Product->Brand->findList();

		$countries = $this->Product->countries();

		$creations = $this->Product->creations();

		$this->set(compact('users', 'categories', 'subcategories', 'subsubcategories', 'traditions', 'traditionsselected', 'ustraditions', 'brands', 'countries', 'creations', 'displaygroups'));

	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {

		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException('Invalid product');
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if(!empty($this->request->data['Product']['traditions'])) {
				asort($this->request->data['Product']['traditions']);
				$this->request->data['Product']['traditions'] = implode(',', $this->request->data['Product']['traditions']);
			}

			if(!isset($this->request->data['Product']['subcategory_id'])) {
				$this->request->data['Product']['subcategory_id'] = '';
			}

			if(!isset($this->request->data['Product']['subsubcategory_id'])) {
				$this->request->data['Product']['subsubcategory_id'] = '';
			}

			$this->request->data['Product']['weight'] = sprintf('%.1f', $this->request->data['Product']['shipping_weight'] / 16);

			if ($this->Product->save($this->request->data)) {

				$product1= $this->Product->find('first', array(
					'recursive' => -1,
					'conditions' => array(
						'Product.id' => $this->Product->id
					)
				));
				$markup = (($product1['Product']['price'] - $product1['Product']['price_wholesale']) / $product1['Product']['price_wholesale']) * 100;
				$this->Product->saveField('markup', $markup);

				$this->Session->setFlash('The product has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$product = $this->Product->find('first', array(
					'recursive' => 0,
					'conditions' => array(
						'Product.id' => $id
					)
				));
				$this->set(compact('product'));
				$this->Session->setFlash('The product could not be saved. Please, try again.');
			}
		} else {

			$this->request->data = $this->Product->find('first', array(
				'recursive' => 0,
				'conditions' => array('Product.id' => $id)
			));

			$product = $this->Product->find('first', array(
				'recursive' => 0,
				'conditions' => array(
					'Product.id' => $id
				)
			));
			$this->set(compact('product'));
		}

		$users = $this->Product->User->find('list', array(
			'fields' => array(
				'User.id',
				'User.name',
			),
			'conditions' => array(
				'User.level' => 'vendor',
			),
			'order' => array(
				'User.active' => 'DESC',
				'User.name' => 'ASC'
			),
		));
//		$users = Hash::combine($users, '{n}.User.id', array('%s - (%s)', '{n}.User.name', '{n}.User.active'));

		$categories = $this->Product->Category->findList();

		$subcategories = $this->Product->Subcategory->findChain();

		$subsubcategories = $this->Product->Subsubcategory->findChain();

		$traditions = ClassRegistry::init('Tradition')->find('list', array(
			'recursive' => -1,
			'fields'=> array(
				'Tradition.id',
				'Tradition.name',
			),
			'order' => array(
				'Tradition.name' => 'ASC'
			)
		));

		$traditionsselected = array_map('intval', explode(',', $product['Product']['traditions']));

		$ustraditions = $this->Product->Ustradition->findList();

		$displaygroups = $this->Product->displaygroups();

		$brands = $this->Product->Brand->findList();

		$countries = $this->Product->countries();

		$creations = $this->Product->creations();

		$productmods = $this->Product->Productmod->find('all', array(
			'conditions' => array(
				'Productmod.product_id' => $product['Product']['id']
			)
		));

		$this->set(compact('users', 'categories', 'subcategories', 'subsubcategories', 'traditions', 'traditionsselected', 'ustraditions', 'brands', 'countries', 'creations', 'displaygroups', 'productmods'));

	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException('Invalid product');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash('Product deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Product was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}