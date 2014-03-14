<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>

<div class="row" style="margin-top:20px">

<h1>Your Shopping Cart</h1>

<?php if(empty($shop['OrderItem'])) : ?>

Shopping Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shops', 'action' => 'cartupdate'))); ?>




<hr>

			<!-- Table -->
			  <table class="table table-striped tcart">
				<thead>
				  <tr>
				
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
					
					<!-- Vendor  name -->
					<td><?php echo $shop['Users'][$item['Product']['user_id']]['name']; ?><br />
					<?php //echo $shop['Users'][$item['Product']['user_id']]['state']; ?>
					<?php //echo $shop['Users'][$item['Product']['user_id']]['zip']; ?></td>
					
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
					<td><?php echo $item['subtotal']; ?>
					</td>
					
					<!-- Remove-->
					<td><span class="remove" id="<?php echo $key; ?>"></span>
					</td>
					
<?php endforeach; ?>                    
			<tr>
                <td>&nbsp;</td>
                
                				<?php if(!isset($shop['Coupon'])): ?>
				<td>
				<?php echo $this->Form->create('Coupon', array('url' => array('controller' => 'coupons', 'action' => 'add'))); ?>
				<?php echo $this->Form->input('code', array('div' => false, 'class' => 'span2 input-mini', 'label' => false, 'size' => 10, 'maxlength' => 10)); ?>
				</td>
    
                <td>
                <?php echo $this->Form->button('<i class="icon-tag icon"></i> Add Coupon Code', array('class' => 'btn btn-mini', 'escape' => false));?>
				<?php echo $this->Form->end(); ?>
                </td>

                
                <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                                <td><?php echo $this->Form->button('<i class="icon-refresh icon"></i> Recalculate', array('class' => 'btn', 'escape' => false));?>
		<?php echo $this->Form->end(); ?></td>

				<td><?php echo $this->Html->link('<i class="icon-remove icon"></i> Clear Cart', array('controller' => 'shops', 'action' => 'clear'), array('class' => 'btn', 'escape' => false)); ?></td>

             </tr>
             <tr>
             

             
             </tr>
             
             
				</tbody>
			  </table>
					
				
					 

    
    
	<div class="span3">
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



<hr>

<div class="col-md-9">
	  <!-- Table -->
		<table class="table table-striped tcart">
		  <thead>
			<tr>
			  <th>Name</th>
			  <th>State</th>
			  <th>ZIP</th>
			  <th>Qty</th>
			  <th>Weight</th>
			  <th>Price</th>
			</tr>
		  </thead>
		  
		  <tbody>

		<?php foreach ($shop['Users'] as $user): ?>
		<tr>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['state']; ?></td>
			<td><?php echo $user['zip']; ?></td>
			<td><?php echo $user['quantity']; ?></td>
			<td><?php echo $user['weight']; ?></td>
			<td>$<?php echo $user['subtotal']; ?></td>
			<td>
				<?php if (($user['shipping']) == 0) :
							echo ('<span class="label btn-global">Checkout to see</span>');
					  else :
							echo '$' . $user['shipping']; ?>
				<?php endif; ?>
			</td>
		</tr>

		<?php endforeach; ?>
        
		<tr>
			<td></td>
	
			<td>&nbsp;</td>
		
			<td><strong>TOTALS</strong></td>
		
            <td><?php echo $shop['Order']['quantity']; ?></td>
		
		
			<td><?php echo $shop['Order']['weight']; ?></td>
		
			<td>$<?php echo $shop['Order']['subtotal']; ?></td>
	
		
		
				</tbody>
			  </table>
</div>		
		 
<div class="col-md-3">

		<table class="table table-striped tcart">	  

		<tr>
			<td>Subtotal: </td><td><span class="normal">$<?php echo $shop['Order']['subtotal']; ?></span></td>
		</tr>
		<tr>
		<?php if(isset($shop['Coupon'])) : ?>
			<td>Discount: </td><td><span class="normal">($<?php echo $shop['Order']['discount']; ?>)</span>
		</tr>
		<tr>
		<?php endif; ?>
			<td>Sales Tax: </td><td><span class="normal">N/A</span></td>
		</tr>
		<tr>
			<td>Shipping: </td><td><span class="normal">$<?php echo $shop['Order']['shipping']; ?></span></td>
		</tr>
		<tr>
			<td>Order Total: </td><td><span class="red">$<?php echo $shop['Order']['total']; ?></span></td>
		</tr>
        
		<tr>
        <td></td>
		<td><?php echo $this->Html->link('<i class="icon-arrow-right icon-white"></i> Checkout', array('controller' => 'shops', 'action' => 'address'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
        </td>
		<tr>
	</table>
</div>					


<?php endif; ?>

