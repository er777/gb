<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>

<h1>Shopping Cart</h1>

<?php if(empty($shop['OrderItem'])) : ?>

Shopping Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shops', 'action' => 'cartupdate'))); ?>

<hr>

<div class="row">
	<div class="span2">VENDOR</div>
	<div class="span1">IMAGE</div>
	<div class="span3">ITEM</div>
	<div class="span1">WEIGHT</div>
	<div class="span1">TOTAL WEIGHT</div>
	<div class="span1">PRICE</div>
	<div class="span1">QUANTITY</div>
	<div class="span1">SUBTOTAL</div>
	<div class="span1">REMOVE</div>
</div>

<?php foreach ($shop['OrderItem'] as $item): ?>
	<div class="row">
		<div class="span2"><?php echo $shop['Users'][$item['Product']['user_id']]['name']; ?><br /><?php echo $shop['Users'][$item['Product']['user_id']]['state']; ?> <?php $shop['Users'][$item['Product']['user_id']]['zip']; ?></div>
		<div class="span1"><?php echo $this->Html->image('products/image/' . $item['Product']['image'], array('class' => 'px60')); ?></div>
		<div class="span3"><strong><?php echo $this->Html->link($item['Product']['name'], array('controller' => 'products', 'action' => 'view', 'id' => $item['Product']['id'], 'slug' => $item['Product']['slug'])); ?></strong></div>
		<div class="span1"><?php echo $item['Product']['weight']; ?></div>
		<div class="span1"><?php echo $item['weight_total']; ?></div>
		<div class="span1">$<?php echo $item['Product']['price']; ?></div>
		<div class="span1"><?php echo $this->Form->input('quantity-' . $item['Product']['id'], array('div' => false, 'class' => 'numeric span1', 'label' => false, 'size' => 2, 'maxlength' => 2, 'value' => $item['quantity'])); ?></div>
		<div class="span1">$<?php echo $item['subtotal']; ?></div>
		<div class="span1"><span class="remove" id="<?php echo $item['Product']['id']; ?>"></span></div>
	</div>
<?php endforeach; ?>

<hr>

<div class="row">
	<div class="span2 offset8">
		<?php echo $this->Html->link('<i class="icon-remove icon"></i> Clear Cart', array('controller' => 'shops', 'action' => 'clear'), array('class' => 'btn', 'escape' => false)); ?>
	</div>
	<div class="span2">
		<?php echo $this->Form->button('<i class="icon-refresh icon"></i> Recalculate', array('class' => 'btn', 'escape' => false));?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<hr>

<div class="row">

	<div class="span10">

		<br />
		<br />

		<div class="row">
			<div class="span2">Name</div>
			<div class="span2" style="width:180px;">Email</div>
			<div class="span1" style="width:30px;">State</div>
			<div class="span1" style="width:40px;">Zip</div>
			<div class="span1 qty">Qty</div>
			<div class="span1">Weight</div>
			<div class="span1">Price</div>
			<div class="span1 shipping">Shipping</div>
		</div>

		<div class="row">
			<div class="span10"><hr></div>
		</div>

		<?php foreach ($shop['Users'] as $user): ?>

		<div class="row">
			<div class="span2"><?php echo $user['name']; ?></div>
			<div class="span2"style="width:180px;"><?php echo $user['email']; ?></div>
			<div class="span1"style="width:30px;"><?php echo $user['state']; ?></div>
			<div class="span1"style="width:40px;"><?php echo $user['zip']; ?></div>
			<div class="span1 qty"><?php echo $user['quantity']; ?></div>
			<div class="span1"><?php echo $user['weight']; ?></div>
			<div class="span1">$<?php echo $user['subtotal']; ?></div>
			<div class="span1 shipping">
            	<?php if (($user['shipping']) == 0) :
					 		echo ('<span class="label btn-global">Checkout to see</span>');
					  else :
							echo '$' . $user['shipping']; ?>
				<?php endif; ?>
            </div>
		</div>

		<?php endforeach; ?>

		<div class="row">
			<div class="span10"><hr></div>
		</div>

		<div class="row">
			<div class="span6"style="width:450px;">Totals: </div>
			<div class="span1 qty"><?php echo $shop['Order']['quantity']; ?></div>
			<div class="span1"><?php echo $shop['Order']['weight']; ?></div>
			<div class="span1">$<?php echo $shop['Order']['subtotal']; ?></div>
		</div>

		<div class="row">
			<div class="span10"><hr></div>
		</div>


	</div>


	<div class="span2">
		Subtotal: <span class="normal">$<?php echo $shop['Order']['subtotal']; ?></span>
		<br />
		<br />
		Sales Tax: <span class="normal">N/A</span>
		<br />
		<br />
		Shipping: <span class="normal">$<?php echo $shop['Order']['shipping']; ?></span>
		<br />
		<br />
		Order Total: <span class="red">$<?php echo $shop['Order']['total']; ?></span>
		<br />
		<br />

		<?php echo $this->Html->link('<i class="icon-arrow-right icon-white"></i> Checkout', array('controller' => 'shops', 'action' => 'address'), array('class' => 'btn btn-primary', 'escape' => false)); ?>

		<br />
		<br />

	</div>
</div>

<br />
<br />

<?php endif; ?>
