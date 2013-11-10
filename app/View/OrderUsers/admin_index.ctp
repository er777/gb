<div class="orderUsers index">
	<h2><?php echo __('Order Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('shipping_method'); ?></th>
			<th><?php echo $this->Paginator->sort('shipping_service'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('subtotal'); ?></th>
			<th><?php echo $this->Paginator->sort('tax'); ?></th>
			<th><?php echo $this->Paginator->sort('shipping'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('tracking_number'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orderUsers as $orderUser): ?>
	<tr>
		<td><?php echo h($orderUser['OrderUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($orderUser['Order']['id'], array('controller' => 'orders', 'action' => 'view', $orderUser['Order']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($orderUser['User']['name'], array('controller' => 'users', 'action' => 'view', $orderUser['User']['id'])); ?>
		</td>
		<td><?php echo h($orderUser['OrderUser']['shipping_method']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['shipping_service']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['weight']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['subtotal']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['tax']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['shipping']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['total']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['tracking_number']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['status']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($orderUser['OrderUser']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $orderUser['OrderUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $orderUser['OrderUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orderUser['OrderUser']['id']), null, __('Are you sure you want to delete # %s?', $orderUser['OrderUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Order User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
