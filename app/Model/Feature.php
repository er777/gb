<?php
App::uses('AppModel', 'Model');
class Feature extends AppModel {

////////////////////////////////////////////////////////////

	public $hasOne = array(
		'Feature' => array(
			'className' => 'Feature',
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

	// Find number of features
	public function findList() {
		return $features = $this->find('list', array(
				'order' => array(
						'Feature.gwm_product' => 'ASC'
				)
		));
	}

////////////////////////////////////////////////////////////

}
