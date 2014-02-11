<?php
App::uses('AppModel', 'Model');
class OrderUser extends AppModel {

////////////////////////////////////////////////////////////

	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

////////////////////////////////////////////////////////////

	public function status() {
		$status = array(
			'Pending' => 'Pending',
			'Received' => 'Received',
			'Processing' => 'Processing',
			'Shipped' => 'Shipped',
			'Complete' => 'Complete',
			'Canceled' => 'Canceled',
			'Denied' => 'Denied',
			'Canceled Reversal' => 'Canceled Reversal',
			'Failed' => 'Failed',
			'Refunded' => 'Refunded',
			'Reversed' => 'Reversed',
			'Chargeback' => 'Chargeback',
			'Expired' => 'Expired',
			'Processed' => 'Processed',
			'Voided' => 'Voided'	
		);
		return $status;
	}




}