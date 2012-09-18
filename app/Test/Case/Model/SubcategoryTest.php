<?php
App::uses('Subcategory', 'Model');

/**
 * Subcategory Test Case
 *
 */
class SubcategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subcategory',
		'app.category',
		'app.user',
		'app.product',
		'app.brand',
		'app.nutrition',
		'app.tag',
		'app.products_tag',
		'app.subsubcategory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Subcategory = ClassRegistry::init('Subcategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Subcategory);

		parent::tearDown();
	}

}
