<?php echo $this->set('title_for_layout', 'Order Review'); ?><?php echo $this->Html->script(array('shops_review.js'), array('inline' => false)); ?>

<div class="row" style="margin-top:20px">
	<h1 class="gwm-heading cart">Order Review</h1>
	<div class="col-md-4 earth20"> <span class="bold">Name: </span><?php echo $shop['Order']['first_name'];?>&nbsp;<?php echo $shop['Order']['last_name'];?><br />
		<span class="bold">Email: </span><?php echo $shop['Order']['email'];?><br />
		<span class="bold">Phone: </span><?php echo $shop['Order']['phone'];?><br />
	</div>
	<div class="col-md-4 earth20"> <span class="bold">Billing Address</span><br />
		<?php echo $shop['Order']['billing_address'];?><br />
		<?php if(!empty($order['Order']['billing_address2'])) : ?>
		<?php echo $shop['Order']['billing_address2'];?><br />
		<?php endif; ?>
		<?php echo $shop['Order']['billing_city'];?>,&nbsp; <?php echo $shop['Order']['billing_state'];?>&nbsp;&nbsp; <?php echo $shop['Order']['billing_zip'];?> </div>
	<div class="col-md-4 earth20"> <span class="bold">Shipping Address</span><br />
		<?php echo $shop['Order']['shipping_address'];?><br />
		<?php if(!empty($order['Order']['shipping_address2'])) : ?>
		Shipping Address 2: <?php echo $shop['Order']['shipping_address2'];?><br />
		<?php endif; ?>
		<?php echo $shop['Order']['shipping_city'];?>,&nbsp; <?php echo $shop['Order']['shipping_state'];?>&nbsp;&nbsp; <?php echo $shop['Order']['shipping_zip'];?> </div>
</div>

<!-- Table -->
<div class="row">
<table class="table table-striped tcart">
	<thead>
		<tr>
			<th>VENDOR</th>
			<th>IMAGE</th>
			<th>ITEM</th>
			<th>QTY</th>
			<th>WEIGHT</th>
			<th>TOTAL WEIGHT</th>
			<th>PRICE</th>
			<th>SUBTOTAL</th>
		</tr>
	</thead>
	<?php foreach ($shop['OrderItem'] as $item): ?>
	<tr>
		<td><?php echo $shop['Users'][$item['Product']['user_id']]['name']; ?>-&nbsp;<?php echo $shop['Users'][$item['Product']['user_id']]['state']; ?>
			<?php $shop['Users'][$item['Product']['user_id']]['zip']; ?></td>
		<td class="cart-pic"><?php echo $this->Html->image('products/image/' . $item['Product']['image'], array('class' => 'px60')); ?></td>
		<td><strong><?php echo $item['name']; ?></strong>
			<?php if(isset($item['productmod_name'])) : ?>
			<br />
			<?php echo $item['productmod_name']; ?>
			<?php endif; ?></td>
		<td><?php echo $item['quantity']; ?></td>
		<td><?php echo $item['weight']; ?></td>
		<td><?php echo $item['weight_total']; ?></td>
		<td>$<?php echo $item['price']; ?></td>
		<td>$<?php echo $item['subtotal']; ?></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td><strong>Totals</strong></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><strong><?php echo $shop['Order']['quantity']; ?></strong></td>
		<td>&nbsp;</td>
		<td><strong><?php echo $shop['Order']['weight']; ?></td>
		<td>&nbsp;</td>
		<td><strong>$<?php echo $shop['Order']['subtotal']; ?></strong></td>
	</tr>
	<hr>
	<tr>
		<th>VENDOR</th>
		<th>Ship Zip:</th>
		<th>Tax:</th>
		<th>Subtotal:</th>
		<th>Qty:</th>
		<th>Weight:</th>
		<th>Shipping Service Type</th>
		<th>Fee</th>
	</tr>
	<?php foreach ($shop['Users'] as $key => $value): ?>
	<tr>
		<td><?php echo $shop['Users'][$key]['name']; ?></td>
		<td><?php echo $shop['Users'][$key]['zip']; ?></td>
		<td>$<?php echo $shop['Users'][$key]['tax']; ?></td>
		<td><?php echo $shop['Users'][$key]['subtotal']; ?></td>
		<td><?php echo $shop['Users'][$key]['quantity']; ?></td>
		<td><?php echo $shop['Users'][$key]['weight']; ?> LBS</td>
		<td><?php echo $shop['Users'][$key]['shipping_service']; ?></td>
		<td><?php echo $shop['Users'][$key]['shipping']; ?></td>
		<?php //foreach ($value['Shippingfees'] as $ship): ?>
		<!--<span><?php //echo $ship['ServiceCode']; ?></span>
                            <span ><?php //echo $ship['ServiceName']; ?></span>
                            <span><?php //echo $ship['TotalCharges']; ?></span>    -->
		<?php //endforeach; ?>
		<?php endforeach; ?>
</table>

<!-- CASE #1: If there is not a credit card form present -->
<?php if(!$ccform): ?>
<div class="accordion col-md-9" id="ship_options">
	<div class="accordion-group">
	
		<div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#ship_options" href="#collapseOne">
			<h4>Change Shipping Types</h4>
			</a>
		</div>
			
		<div id="collapseOne" class="accordion-body collapse">
			<div class="accordion-inner"> 
				<script type="text/javascript">
                           $(document).ready(function(){
                               $('input[type=radio]').click(function() {
                               $(this).closest("form").submit();
                           });
          
                           //Accordion
                           //$('#myCollapsible').collapse();
          
                       });
          
                   </script> 
				<br />
				<?php echo $this->Form->create('Ship'); ?>
				<?php foreach ($shop['Users'] as $key => $value): ?>
				<div class="col-md-3 gwm-ship">
					<?php if(count($value['Shippingfees']) > 1): ?>
					<strong><?php echo $shop['Users'][$key]['name']; ?></strong>
					<?php $optionship = array(); ?>
					<?php foreach ($value['Shippingfees'] as $ship): ?>
					<?php $optionship[] = $ship['ServiceName'] . '<strong>&nbsp;(' .  $ship['TotalCharges'] . '&nbsp;)</strong><br />' ;?>
					<?php endforeach; ?>
					<?php echo $this->Form->input('rating_' . $shop['Users'][$key]['id'], array('type' => 'radio', 'legend' => false, 'options' => $optionship, 'value' => $shop['Users'][$key]['shipping_selected']));?> <br />
					<?php else: ?>
					<strong><?php echo $shop['Users'][$key]['name']; ?></strong><br />
					<?php foreach ($value['Shippingfees'] as $ship): ?>
					<?php echo $ship['ServiceName']; ?>: $<?php echo $ship['TotalCharges']; ?><br />
					<br />
					<?php endforeach; ?>
					<?php endif; ?>
					<br />
				</div>
				<?php endforeach; ?>
				<?php //echo $this->Form->button('Change Shipping Method', array('class' => 'btn', 'ecape' => false)); ?>
				<?php echo $this->Form->end(); ?> </div>
			<?php endif; ?>
		</div>
	</div>
</div>



<!-- CASE #2: If there is a Credit Card form present -->

<?php if($ccform): ?>

<br />
<h4>Pay by Credit Card</h4>
<form action="<?php echo $formURL;?>" method="POST">

<?php //echo $this->Form->input('billing-cc-number', array('class' => 'span2 ccinput', 'maxLength' => 16, 'autocomplete' => 'off')); ?>
Credit Card Number<br />
<input type="text" name="billing-cc-number" value="">
<div> Credit Card Expiration<br />
	(Format: Month and Year: ex <strong>0115</strong> <br />
	<input type ="text" name="billing-cc-exp" value="">
</div>
<?php //echo $this->Form->input('cvv', array('label' => 'Card Security Code', 'class' => 'span1', 'maxLength' => 4)); ?>
CVV Code <br />
<input type="text" name="cvv">
<br />
<br />
<?php echo $this->Form->button('<i class="icon-thumbs-up icon-white"></i> Finalize Order', array('class' => 'btn btn-primary', 'ecape' => false)); ?> <?php echo $this->Form->end(); ?> <br />
<br />
<br />
<br />
<!-- <div style="color:red">XXXXX</div> -->

<?php else: ?>
<div class="col-md-3 pull-right CC">
	<p style="text-align:right; padding-right:50px"> <strong>Subtotal: $<?php echo $shop['Order']['subtotal']; ?></strong> <br />
		<strong>Discount ($<?php echo $shop['Order']['discount']; ?>)</strong> <br />
		<strong>Tax: <?php echo $shop['Order']['tax']; ?></strong> <br />
		<strong>Shipping: <?php echo $shop['Order']['shipping']; ?></strong> <br />
		<strong>Order Total: <?php echo $shop['Order']['total']; ?></strong> <br />
	</p>

<?php echo $this->Form->create('Order'); ?> <?php echo $this->Form->hidden('formURL', array('value' => 1)); ?> <?php echo $this->Form->button('<i class="icon-thumbs-up icon-white"></i> Continue', array('class' => 'btn btn-primary pull-right cc', 'ecape' => false)); ?> <?php echo $this->Form->end(); ?> </div>
<?php endif; ?>

</div>

<br />
<br />
