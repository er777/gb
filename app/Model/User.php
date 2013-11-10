<?php
App::uses('AppModel', 'Model');
class User extends AppModel {

	 //var $actsAs = array('Acl.MemberLinker', 'Containable', 'Acl' => 'requester');

////////////////////////////////////////////////////////////

	public $validate = array(
		'username' => array(
			'rule1' => array(
				'rule' => array('between', 3, 50),
				'message' => 'invalid name',
				'allowEmpty' => false,
				'required' => false,
			),
			'rule2' => array(
				'rule' => array('isUnique'),
				'message' => 'name already exists',
				'allowEmpty' => false,
				'required' => false,
			),
		),
		'slug' => array(
			'rule1' => array(
				'rule' => array('between', 3, 50),
				'message' => 'invalid slug',
				'allowEmpty' => false,
				'required' => false,
			),
			'rule2' => array(
				'rule' => array('isUnique'),
				'message' => 'slug already exists',
				'allowEmpty' => false,
				'required' => false,
			),
			'rule3' => array(
				'rule' => '/^[a-z0-9-]{3,}$/',
				'message' => 'Only letters and integers, min 3 characters'
			)
		),
	);

////////////////////////////////////////////////////////////

	public $hasMany = array(
		'Product',
		'Feature'
	);

////////////////////////////////////////////////////////////

	public $hasOne = array(
		'Tax' => array(
			'className' => 'Tax',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Approval' => array(
			'className' => 'Approval',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),

	);

////////////////////////////////////////////////////////////

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

////////////////////////////////////////////////////////////

	public function getBySubdomain($subDomain, $useractive = 1) {

		$user = $this->find('first', array(
			'recursive' => -1,
			'fields' => array(
				'User.id',
				'User.name',
				'User.city',
				'User.state',
				'User.slug',
				'User.shop_quote',
				'User.min_purchase',
				'User.mini_shipping_policy',
				'User.shipping_policy',
				'User.shop_signature',
				'User.shop_description',
				'User.image',
				'User.image_1',
				'User.image_2',
				'User.image_3',
				'User.image_4',
				'User.image_5',
				'User.image_6',
				'User.pic_title_1',
				'User.pic_title_2',
				'User.pic_title_3',
				'User.pic_title_4',
				'User.pic_title_5',
				'User.pic_title_6',
				'User.attr_1',
				'User.attr_2',
				'User.attr_3',
				'User.attr_4',
				'User.attr_5',
				'User.attr_6',
				'User.awning_css',
				'User.awning_image',
			),
			'conditions' => array(
				'User.level' => 'vendor',
				'User.show' => $useractive,
				'User.slug' => $subDomain,
			)
		));
		if(!empty($user)) {
			return $user;
		}
		return false;
	}

////////////////////////////////////////////////////////////

	public function getVendors() {

		$menuvendors = $this->find('all', array(
			'fields' => array(
				'User.id',
				'User.name',
				'User.slug',
			),
			'conditions' => array(
				'User.level' => 'vendor',
				'User.show' => 1,
				'User.product_count >' => 0,
			),
			'order' => array(
				'User.name' => 'ASC'
			),
		));
		return $menuvendors;
	}

////////////////////////////////////////////////////////////

}
