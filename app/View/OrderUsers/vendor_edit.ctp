<div class="orderUsers form">
<?php echo $this->Form->create('OrderUser'); ?>
	<fieldset>
		<legend><?php echo __('Vendor Edit Order User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('order_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('shipping_method');
		echo $this->Form->input('shipping_service');
		echo $this->Form->input('weight');
		echo $this->Form->input('quantity');
		echo $this->Form->input('subtotal');
		echo $this->Form->input('tax');
		echo $this->Form->input('shipping');
		echo $this->Form->input('total');
		echo $this->Form->input('tracking_number');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrderUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OrderUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Order Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
