<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>

<?php echo $this->Html->script(array('bootstrap-editable.js'), array('inline' => false)); ?>
<script>
$(document).ready(function() {

	$('.shipping_actual').editable({
		type:  'text',
		name: 'shipping_actual',
		url:   '/admin/orderusers/editable',
		title: 'shipping_actual',
		placement: 'right',


	});

});
</script>


<?php //debug($order); ?>

<h2>Order</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>Id</td>
		<td><?php echo h($order['Order']['id']); ?></td>
	</tr>
	<tr>
		<td>First Name</td>
		<td><?php echo h($order['Order']['first_name']); ?></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><?php echo h($order['Order']['last_name']); ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo h($order['Order']['email']); ?></td>
	</tr>
	<tr>
		<td>Subtotal</td>
		<td><?php echo h($order['Order']['subtotal']); ?></td>
	</tr>
	<tr>
		<td>Tax</td>
		<td><?php echo h($order['Order']['tax']); ?></td>
	</tr>
	<tr>
		<td>Shipping</td>
		<td><?php echo h($order['Order']['shipping']); ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo h($order['Order']['total']); ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($order['Order']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($order['Order']['modified']); ?></td>
	</tr>
</table>


<h3>Related Vendors</h3>

<?php if (!empty($order['OrderUser'])):?>
	<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th>Vendor</th>
		<th>Shipping Method</th>
		<th>Shipping Service</th>
		<th>Weight</th>
		<th>Tax</th>
		<th style="color:#008000">Shipping</th>
        <th style="color:blue">Shipping Actual</th>
		<th style="color:red">Shipping Variance</th>
		<th>total</th>
		<th>status</th>
		<th>Created</th>
		<th>Modified</th>
		<th class="actions"></th>
	</tr>
	<?php foreach ($order['OrderUser'] as $orderUser): ?>
		<tr>
			<td><?php echo $orderUser['User']['name'];?></td>
			<td><?php echo $orderUser['shipping_method'];?></td>
			<td><?php echo $orderUser['shipping_service'];?></td>
			<td><?php echo $orderUser['weight'];?></td>
			<td><?php echo $orderUser['tax'];?></td>
			<td style="color:#008000"><?php echo $orderUser['shipping'];?></td>
            <td style="color:blue"><span class="shipping_actual" data-value="<?php echo $orderUser['shipping_actual']; ?>" data-pk="<?php echo $orderUser['id']; ?>"><?php echo $orderUser['shipping_actual']; ?></span></td>
			<td style="color:red"><?php echo $orderUser['shipping_variance'];?>%</td>
			<td><?php echo $orderUser['total'];?></td>
			<td><?php echo $orderUser['status'];?></td>
			<td><?php echo $orderUser['created'];?></td>
			<td><?php echo $orderUser['modified'];?></td>
			<td class="actions">
				<?php //echo $this->Html->link('View', array('controller' => 'order_items', 'action' => 'view', $orderItem['id']), array('class' => 'btn btn-mini')); ?>
				<?php //echo $this->Html->link('Edit', array('controller' => 'order_items', 'action' => 'edit', $orderItem['id']), array('class' => 'btn btn-mini')); ?>
				<?php //echo $this->Form->postLink('Delete', array('controller' => 'order_items', 'action' => 'delete', $orderItem['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $orderItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


<h3>Related Order Items</h3>

<?php if (!empty($order['OrderItem'])):?>
	<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th>Id</th>
		<th>Vendor</th>
		<th>Name</th>
		<th>mod name</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Created</th>
		<th>Modified</th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($order['OrderItem'] as $orderItem): ?>
		<tr>
			<td><?php echo $orderItem['id'];?></td>
			<td><?php echo $orderItem['User']['name'];?></td>
			<td><?php echo $orderItem['name'];?></td>
			<td><?php echo $orderItem['productmod_name'];?></td>
			<td><?php echo $orderItem['quantity'];?></td>
			<td><?php echo $orderItem['price'];?></td>
			<td><?php echo $orderItem['created'];?></td>
			<td><?php echo $orderItem['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link('View', array('controller' => 'order_items', 'action' => 'view', $orderItem['id']), array('class' => 'btn btn-mini')); ?>
				<?php //echo $this->Html->link('Edit', array('controller' => 'order_items', 'action' => 'edit', $orderItem['id']), array('class' => 'btn btn-mini')); ?>
				<?php //echo $this->Form->postLink('Delete', array('controller' => 'order_items', 'action' => 'delete', $orderItem['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $orderItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<br />
<br />

<h3>Order History</h3>

<?php if (!empty($order['OrderHistory'])):?>
	<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th>Status</th>
		<th>Comment</th>
		<th>Created</th>
		<th class="actions"></th>
	</tr>
	<?php foreach ($order['OrderHistory'] as $OrderHistory): ?>
		<tr>
			<td><?php echo $OrderHistory['OrderStatus']['name'];?></td>
			<td><?php echo $OrderHistory['comment'];?></td>
			<td><?php echo $OrderHistory['created'];?></td>
			<td class="actions">
				<?php //echo $this->Html->link('View', array('controller' => 'order_items', 'action' => 'view', $OrderHistory['id']), array('class' => 'btn btn-mini')); ?>
				<?php //echo $this->Html->link('Edit', array('controller' => 'order_items', 'action' => 'edit', $orderItem['id']), array('class' => 'btn btn-mini')); ?>
				<?php //echo $this->Form->postLink('Delete', array('controller' => 'order_items', 'action' => 'delete', $orderItem['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $orderItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<br />
<br />
<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn')); ?> </li>

<br />
<br />

<?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>

<br />
<br />
<br />