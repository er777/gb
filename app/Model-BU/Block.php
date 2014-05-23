<?php
App::uses('AppModel', 'Model');
class Block extends AppModel {

////////////////////////////////////////////////////////////

	// Relationship of block has many articles
	public $hasMany = array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'block_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

////////////////////////////////////////////////////////////

	// Find number of blocks
	public function findList() {
		return $blocks = $this->find('list', array(
				'order' => array(
						'Block.name' => 'ASC'
				)
		));
	}

////////////////////////////////////////////////////////////

}
