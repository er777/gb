<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>


<h1>Shopping Cart</h1>

<?php if(empty($items)) : ?>

Shopping Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'cartupdate'))); ?>

<hr>

<div class="row">
	<div class="span2">VENDOR</div>
	<div class="span1">IMAGE</div>
	<div class="span4">ITEM</div>
	<div class="span1">WEIGHT</div>
	<div class="span1">PRICE</div>
	<div class="span1">QUANTITY</div>
	<div class="span1">SUBTOTAL</div>
	<div class="span1">REMOVE</div>
</div>

<?php foreach ($items as $item): ?>
	<div class="row">
		<div class="span2"><?php echo $item['User']['shop_name']; ?><br /><?php echo $item['User']['state']; ?> <?php echo $item['User']['zip']; ?></div>
		<div class="span1"><?php echo $this->Html->image('products/' . $item['Product']['image'], array('class' => 'px60')); ?></div>
		<div class="span4"><strong><?php echo $this->Html->link($item['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $item['Product']['slug'])); ?></strong></div>
		<div class="span1"><?php echo $item['Product']['weight']; ?></div>
		<div class="span1">$<?php echo $item['Product']['price']; ?></div>
		<div class="span1"><?php echo $this->Form->input('quantity-' . $item['Product']['id'], array('div' => false, 'class' => 'numeric span1', 'label' => false, 'size' => 2, 'maxlength' => 2, 'value' => $item['quantity'])); ?></div>
		<div class="span1">$<?php echo $item['subtotal']; ?></div>
		<div class="span1"><span class="remove" id="<?php echo $item['Product']['id']; ?>"></span></div>
	</div>
<?php endforeach; ?>

<hr>

<div class="row">
	<div class="span2 offset8">
		<?php echo $this->Html->link('<i class="icon-remove icon"></i> Clear Cart', array('controller' => 'shop', 'action' => 'clear'), array('class' => 'btn', 'escape' => false)); ?>
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
			<div class="span1">State</div>
			<div class="span1">Zip</div>
			<div class="span1">Quantity</div>
			<div class="span1">Weight</div>
			<div class="span1">Price</div>
		</div>

		<div class="row">
			<div class="span7"><hr></div>
		</div>

		<?php foreach ($cart['Shipping'] as $ship): ?>

		<div class="row">
			<div class="span2"><?php echo $ship['name']; ?></div>
			<div class="span1"><?php echo $ship['state']; ?></div>
			<div class="span1"><?php echo $ship['zip']; ?></div>
			<div class="span1"><?php echo $ship['totalquantity']; ?></div>
			<div class="span1"><?php echo $ship['totalweight']; ?></div>
			<div class="span1">$<?php echo $ship['totalprice']; ?></div>
		</div>

		<?php endforeach; ?>

		<div class="row">
			<div class="span7"><hr></div>
		</div>

		<div class="row">
			<div class="span4">Totals: </div>
			<div class="span1"><?php echo $cart['Property']['cartQuantity']; ?></div>
			<div class="span1"><?php echo $cart['Property']['cartWeight']; ?></div>
			<div class="span1">$<?php echo $cart['Property']['cartTotal']; ?></div>
		</div>

		<div class="row">
			<div class="span7"><hr></div>
		</div>


	</div>


	<div class="span2">
		Subtotal: <span class="normal">$<?php echo $cartTotal; ?></span>
		<br />
		<br />
		Sales Tax: <span class="normal">N/A</span>
		<br />
		<br />
		Shipping: <span class="normal">N/A</span>
		<br />
		<br />
		Order Total: <span class="red">$<?php echo $cartTotal; ?></span>
		<br />
		<br />

		<?php echo $this->Html->link('<i class="icon-arrow-right icon-white"></i> Checkout', array('controller' => 'shop', 'action' => 'address'), array('class' => 'btn btn-primary', 'escape' => false)); ?>

		<br />
		<br />

		<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'step1'))); ?>
		<input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal' class="sbumit" />
		<?php echo $this->Form->end(); ?>

	</div>
</div>

<br />
<br />

<?php endif; ?>
