<?php
App::uses('AppModel', 'Model');
/**
 * Recipescategory Model
 *
 * @property Recipe $Recipe
 */
class Recipescategory extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'recipescategory_id',
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

}
