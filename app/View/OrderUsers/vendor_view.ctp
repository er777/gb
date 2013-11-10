
<h2>Order</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>Id</td>
		<td><?php echo h($orderUser['OrderUser']['id']); ?></td>
	</tr>
	<tr>
		<td>Shipping Method</td>
		<td><?php echo h($orderUser['OrderUser']['shipping_method']); ?></td>
	</tr>
	<tr>
		<td>Shipping Service</td>
		<td><?php echo h($orderUser['OrderUser']['shipping_service']); ?></td>
	</tr>
	<tr>
		<td>Weight</td>
		<td><?php echo h($orderUser['OrderUser']['weight']); ?></td>
	</tr>
	<tr>
		<td>Quantity</td>
		<td><?php echo h($orderUser['OrderUser']['quantity']); ?></td>
	</tr>
	<tr>
		<td>Subtotal</td>
		<td><?php echo h($orderUser['OrderUser']['subtotal']); ?></td>
	</tr>
	<tr>
		<td>Tax</td>
		<td><?php echo h($orderUser['OrderUser']['tax']); ?></td>
	</tr>
	<tr>
		<td>Shipping</td>
		<td><?php echo h($orderUser['OrderUser']['shipping']); ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo h($orderUser['OrderUser']['total']); ?></td>
	</tr>
	<tr>
		<td>Tracking Number</td>
		<td><?php echo h($orderUser['OrderUser']['tracking_number']); ?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><?php echo h($orderUser['OrderUser']['status']); ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($orderUser['OrderUser']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($orderUser['OrderUser']['modified']); ?></td>
	</tr>
</table>

<br />
<br />

<h2>Order</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>First Name</td>
		<td><?php echo h($orderUser['Order']['first_name']); ?></td>
	</tr>
	<tr>
		<td>First Name</td>
		<td><?php echo h($orderUser['Order']['first_name']); ?></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><?php echo h($orderUser['Order']['last_name']); ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo h($orderUser['Order']['email']); ?></td>
	</tr>
	<tr>
		<td>Phone</td>
		<td><?php echo h($orderUser['Order']['phone']); ?></td>
	</tr>
	<tr>
		<td>Billing Address</td>
		<td><?php echo h($orderUser['Order']['billing_address']); ?></td>
	</tr>
</table>

<br />

<h2>Edit Order</h2>
<?php echo $this->Form->create('OrderUser'); ?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('tracking_number'); ?>
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>

<br />

<h2>Order Items</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<thead>
		<td>Product Image</td>
		<td>Product Name</td>
		<td>Product Price</td>
		<td>Product Quantity</td>
		<td>Product Subtotal</td>
	</thead>
	<?php foreach($orderItems as $orderItem): ?>
	<tr>
		<td><?php echo $this->Html->image('products/image/' . $orderItem['Product']['image'], array('class' => 'order-user-pic ')); ?></td>
		<td><?php echo h($orderItem['OrderItem']['name']); ?></td>
		<td>$<?php echo h($orderItem['OrderItem']['price']); ?></td>
		<td><?php echo h($orderItem['OrderItem']['quantity']); ?></td>
		<td>$<?php echo h($orderItem['OrderItem']['subtotal']); ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />


<?php //debug($orderUser); ?>

<br />
<br />

<?php //debug($orderItems); ?>

<br />
<br />
