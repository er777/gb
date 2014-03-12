<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>

<h1>Shopping Cart</h1>

<?php if(empty($shop['OrderItem'])) : ?>

Shopping Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shops', 'action' => 'cartupdate'))); ?>

<hr>

			<!-- Table -->
			  <table class="table table-striped tcart">
				<thead>
				  <tr>
					<th>#</th>
					<th>VENDOR</th>
					<th>IMAGE</th>
					<th>ITEM</th>
					<th>WEIGHT</th>
					<th>TOTAL WEIGHT</th>
					<th>PRICE</th>
					<th>QUANTITY</th>
					<th>SUB TOTAL</th>
					<th>REMOVE</th>
				  </tr>
				</thead>
				
				
				<tbody>
				

<?php foreach ($shop['OrderItem'] as $key => $item): ?>
	
					<tr>
					<!-- Index -->
					<td>1</td>
					
					<!-- Vendor  name -->
					<td><?php echo $shop['Users'][$item['Product']['user_id']]['name']; ?><br /><?php echo $shop['Users'][$item['Product']['user_id']]['state']; ?> <?php $shop['Users'][$item['Product']['user_id']]['zip']; ?></td>
					
					<!-- Product image -->
					<td class="cart-pic"><?php echo $this->Html->image('products/image/' . $item['Product']['image'], array('class' => 'px60')); ?></td>
					
					<!-- Product Name-->
					<td><strong><?php echo $this->Html->link($item['Product']['name'], array('controller' => 'products', 'action' => 'view', 'id' => $item['Product']['id'], 'slug' => $item['Product']['slug'])); ?></strong>
						<?php if(isset($item['Product']['productmod_name'])) : ?>
						<br />
						<?php echo $item['Product']['productmod_name']; ?>
						<?php endif; ?>
					</td>

					<!-- Product weight-->
					<td><?php echo $item['Product']['weight']; ?>
					</td>

					<!-- Product weight total-->
					<td><?php echo $item['weight_total']; ?>
					</td>
					
					<!-- Product price-->
					<td><?php echo $item['Product']['price']; ?>
					</td>
					
					<!-- Product Quantity-->
					<td><?php echo $this->Form->input('quantity-' . $key, array('div' => false, 'class' => 'numeric span1', 'label' => false, 'size' => 2, 'maxlength' => 2, 'value' => $item['quantity'])); ?>
					</td>

					<!-- Product Subtotal-->
					<td><?php echo $item['Product']['price']; ?>
					</td>
					
					<!-- Remove-->
					<td><span class="remove" id="<?php echo $key; ?>"></span>
					</td>
					
<?php endforeach; ?>                    


                 

				  </tr>
				</tbody>
			  </table>
					

<div class="row">

<?php if(!isset($shop['Coupon'])): ?>
	<div class="span2">
		<?php echo $this->Form->create('Coupon', array('url' => array('controller' => 'coupons', 'action' => 'add'))); ?>
		<?php echo $this->Form->input('code', array('div' => false, 'class' => 'span2 input-mini', 'label' => false, 'size' => 10, 'maxlength' => 10)); ?>
	</div>
	<div class="span3">
		<?php echo $this->Form->button('<i class="icon-tag icon"></i> Add Coupon Code', array('class' => 'btn btn-mini', 'escape' => false));?>
		<?php echo $this->Form->end(); ?>
	</div>

<?php else: ?>

	<div class="span3">
		Coupon Code: <?php echo $shop['Coupon']['code'];?>
	</div>

	<div class="span3">
		Discount Applied: $ <?php echo $shop['Order']['discount'];?>
	</div>
	<div class="span3">
		<?php echo $this->Html->link('<i class="icon-tag icon-white"></i> Remove Coupon', array('controller' => 'coupons', 'action' => 'remove'), array('class' => 'btn btn-warning btn-mini', 'escape' => false)); ?>
	</div>

<?php endif; ?>

</div>

<hr>

<div class="row">

	<div class="span10">

		<br />
		<br />

		<div class="row">
			<div class="span3">Name</div>
			<div class="span1" style="width:30px;">State</div>
			<div class="span1" style="width:30px;">Zip</div>
			<div class="span1 qty">Qty</div>
			<div class="span1 weight">Weight</div>
			<div class="span1">Price</div>
			<div class="span1 shipping">Shipping</div>
		</div>

		<div class="row">
			<div class="span10"><hr></div>
		</div>

		<?php foreach ($shop['Users'] as $user): ?>

		<div class="row">
			<div class="span3"><?php echo $user['name']; ?></div>
			<div class="span1"style="width:30px;"><?php echo $user['state']; ?></div>
			<div class="span1"style="width:30px;"><?php echo $user['zip']; ?></div>
			<div class="span1 qty"><?php echo $user['quantity']; ?></div>
			<div class="span1 weight"><?php echo $user['weight']; ?></div>
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
			<div class="span5"style="width:320px;">Totals: </div>
			<div class="span1 qty"><?php echo $shop['Order']['quantity']; ?></div>
			<div class="span1 weight"><?php echo $shop['Order']['weight']; ?></div>
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
		<?php if(isset($shop['Coupon'])) : ?>
		Discount: <span class="normal">($<?php echo $shop['Order']['discount']; ?>)</span>
		<br />
		<br />
		<?php endif; ?>
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

