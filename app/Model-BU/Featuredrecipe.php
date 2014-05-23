<?php
App::uses('AppModel', 'Model');
class Featuredrecipe extends AppModel {

	public $name = 'Featuredrecipe';
	
////////////////////////////////////////////////////////////

public $belongsTo = array(
		'Featuredrecipe' => array(
			'className' => 'Featuredrecipe',
			'foreignKey' => 'recipe_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array('Recipe.active' => 1)

		),
	);
	
}