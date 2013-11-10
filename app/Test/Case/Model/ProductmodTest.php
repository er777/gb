<?php
App::uses('Productmod', 'Model');

/**
 * Productmod Test Case
 *
 */
class ProductmodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.productmod',
		'app.product',
		'app.user',
		'app.tax',
		'app.approval',
		'app.category',
		'app.subcategory',
		'app.recipe',
		'app.recipescategory',
		'app.tradition',
		'app.ustradition',
		'app.subsubcategory',
		'app.brand'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Productmod = ClassRegistry::init('Productmod');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Productmod);

		parent::tearDown();
	}

}
