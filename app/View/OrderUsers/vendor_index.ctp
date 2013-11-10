<h2>Orders</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('order_id'); ?></th>

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
		<td><?php echo h($orderUser['OrderUser']['id']); ?></td>
		<td><?php echo $orderUser['Order']['id']; ?></td>
		<td><?php echo h($orderUser['OrderUser']['shipping_method']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['shipping_service']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['weight']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['quantity']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['subtotal']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['tax']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['shipping']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['total']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['tracking_number']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['status']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['created']); ?></td>
		<td><?php echo h($orderUser['OrderUser']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $orderUser['OrderUser']['id']), array('class' => 'btn btn-mini')); ?>
			<?php // echo $this->Html->link(__('Edit'), array('action' => 'edit', $orderUser['OrderUser']['id'])); ?>
			<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $orderUser['OrderUser']['id']), null, __('Are you sure you want to delete # %s?', $orderUser['OrderUser']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />