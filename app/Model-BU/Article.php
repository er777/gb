<?php
App::uses('AppModel', 'Model');
class Article extends AppModel {
	
	// Pagination Setup
	var $name = 'Article';

////////////////////////////////////////////////////////////

	public $validate = array(
		'name' => array(
			'rule1' => array(
				'rule' => array('between', 3, 100),
				'message' => 'invalid name',
				'allowEmpty' => false,
				'required' => true,
			),
			'rule2' => array(
				'rule' => array('isUnique'),
				'message' => 'name already exists',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'slug' => array(
			'rule1' => array(
				'rule' => array('between', 3, 100),
				'message' => 'invalid slug',
				'allowEmpty' => false,
				'required' => true,
			),
			'rule2' => array(
				'rule' => array('isUnique'),
				'message' => 'slug already exists',
				'allowEmpty' => false,
				'required' => true,
			),
			'rule3' => array(
				'rule' => '/^[a-z0-9-]{3,}$/',
				'message' => 'Only letters and integers, min 3 characters'
			)
		),
	);

////////////////////////////////////////////////////////////

// Relationship of articles belongs to blocks, groups

	public $belongsTo = array(
            'Block' => array(
                    'className' => 'Block',
                    'foreignKey' => 'block_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => '',
                    'counterCache' => true,
            ),			
	);
	
	
////////////////////////////////////////////////////////////

//  Excellent Food Adventures relationships
	public function groups() {
		$groups = array(
			'0' => 'Free',
			'1' => 'International Traditions',
			'2' => 'US Traditions',
			'3' => 'Hot Food & Beverage Trends',
			'4' => 'Categories',
			'5' => 'World Pantries',
			'6' => 'Special Ingredients',
		);
		return $groups;
	}
	
////////////////////////////////////////////////////////////

	public function findList() {
		return $this->find('list', array(
			'order' => array(
				'Article.name' => 'ASC'
			)
		));
	}
	
	
}
