<div class="orderUsers view">
<h2><?php  echo __('Order User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderUser['Order']['id'], array('controller' => 'orders', 'action' => 'view', $orderUser['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($orderUser['User']['name'], array('controller' => 'users', 'action' => 'view', $orderUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shipping Method'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['shipping_method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shipping Service'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['shipping_service']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtotal'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['subtotal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shipping'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['shipping']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tracking Number'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['tracking_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($orderUser['OrderUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Order User'), array('action' => 'edit', $orderUser['OrderUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Order User'), array('action' => 'delete', $orderUser['OrderUser']['id']), null, __('Are you sure you want to delete # %s?', $orderUser['OrderUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
