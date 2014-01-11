<?php echo $this->set('title_for_layout', 'Order Review'); ?>

<?php echo $this->Html->script(array('shops_review.js'), array('inline' => false)); ?>

<div id="shopping-cart">

	<h1 class="gb-heading cart">Order Review</h1>

	<div class="row">
		<div class="span4">

			<span class="bold">Name: </span><?php echo $shop['Order']['first_name'];?>&nbsp;<?php echo $shop['Order']['last_name'];?><br />
			<span class="bold">Email: </span><?php echo $shop['Order']['email'];?><br />
			<span class="bold">Phone: </span><?php echo $shop['Order']['phone'];?><br />

		</div>

	<div class="span4">

		<span class="bold">Billing Address</span><br /><?php echo $shop['Order']['billing_address'];?><br />
		<?php if(!empty($order['Order']['billing_address2'])) : ?><?php echo $shop['Order']['billing_address2'];?><br />
		<?php endif; ?>
		<?php echo $shop['Order']['billing_city'];?>,&nbsp;
		<?php echo $shop['Order']['billing_state'];?>&nbsp;&nbsp;
		<?php echo $shop['Order']['billing_zip'];?>

	</div>

	<div class="span4">

		<span class="bold">Shipping Address</span><br /><?php echo $shop['Order']['shipping_address'];?><br />
		<?php if(!empty($order['Order']['shipping_address2'])) : ?>Shipping Address 2: <?php echo $shop['Order']['shipping_address2'];?><br />
		<?php endif; ?>
        
        <?php if (($shop['Order']['residential']) == 0) {
					$destination = 'Residential';
		}
			  else $destination = 'Business';
		 ?>
        
		<?php echo $shop['Order']['shipping_city'];?>,&nbsp;
		<?php echo $shop['Order']['shipping_state'];?>&nbsp;&nbsp;
		<?php echo $shop['Order']['shipping_zip'];?>&nbsp;&nbsp;(&nbsp;
        <?php echo $destination;?>&nbsp;&nbsp;)

	</div>

	</div>

	<hr>

	<div class="row">
		<div class="span3 bold"><span class="bold">VENDOR</div>
		<div class="span1 bold" style="width:40px">IMAGE</div>
		<div class="span3 bold">ITEM</div>
		<div class="span1 bold">QTY</div>
		<div class="span1 bold">WEIGHT</div>
		<div class="span1 bold">TOTAL WEIGHT</div>
		<div class="span1 bold">PRICE</div>

		<div class="span1"><span class="bold">SUBTOTAL</span></div>
	</div>

	<?php foreach ($shop['OrderItem'] as $item): ?>
		<div class="row">
			<div class="span3"><?php echo $shop['Users'][$item['Product']['user_id']]['name']; ?> -&nbsp;<?php echo $shop['Users'][$item['Product']['user_id']]['state']; ?>
			<?php $shop['Users'][$item['Product']['user_id']]['zip']; ?></div>

			<div class="span1" style="width:40px"><?php echo $this->Html->image('products/image/' . $item['Product']['image'], array('class' => 'px60')); ?></div>

			<div class="span3">
				<strong><?php echo $item['name']; ?></strong>
				<?php if(isset($item['productmod_name'])) : ?>
					<br />
					<?php echo $item['productmod_name']; ?>
				<?php endif; ?>
			</div>

			<div class="span1"><?php echo $item['quantity']; ?></div>

			<div class="span1"><?php echo $item['weight']; ?></div>

			<div class="span1"><?php echo $item['weight_total']; ?></div>

			<div class="span1">$<?php echo $item['price']; ?></div>

			<div class="span1">$<?php echo $item['subtotal']; ?></div>
		</div>
	<?php endforeach; ?>


	<hr>

	<div class="row">
		<div class="span3"><strong>Totals</strong></div>
		<div class="span1" style="width:40px"></div>
		<div class="span4"></div>
		<div class="span1"><strong><?php echo $shop['Order']['weight']; ?></strong></div>
		<div class="span1"><strong><?php echo $shop['Order']['quantity']; ?></strong></div>
		<div class="span1 offset1"><strong>$<?php echo $shop['Order']['subtotal']; ?></strong></div>
	</div>


	<?php if(!$ccform): ?>
	<! --Labels -->
	<hr>

	<div class="row">

	<div class="span2 bold">VENDOR</div>
	<div class="span2 bold">Ship Zip:</div>
	<div class="span1 bold">Tax:</div>
	<div class="span1 bold">Subtotal:</div>
	<div class="span1 bold">Qty:</div>
	<div class="span1 bold">Weight: </div>


	<div class="span3 bold">Shipping Service Type</div>
	<div class="span1 bold">Fee</div>

	</div>
    
		<?php $ups_residential = 2.80 ?>
		<?php $fedex_residential = 2.75 ?>
		<?php //echo ($ups_residential); ?>

    
	<div class="row">

	<?php foreach ($shop['Users'] as $key => $value): ?>

		<div class="span2"><?php echo $shop['Users'][$key]['name']; ?></div>
		<div class="span2"><?php echo $shop['Users'][$key]['zip']; ?></div>
		<div class="span1">$<?php echo $shop['Users'][$key]['tax']; ?></div>
		<div class="span1"><?php echo $shop['Users'][$key]['subtotal']; ?></div>
		<div class="span1"><?php echo $shop['Users'][$key]['quantity']; ?></div>
		<div class="span1"> <?php echo $shop['Users'][$key]['weight']; ?> LBS</div>
		<div class="span3"><?php echo $shop['Users'][$key]['shipping_service']; ?></div>
        <?php $shipping_residential = $shop['Users'][$key]['shipping'] + (Configure::read('Settings.UPS_RESIDENTIAL_FEE')); ?>
		<div class="span13"><?php //echo $shop['Users'][$key]['shipping']; ?><?php echo $shipping_residential; ?></div>
		<div class="row">

			<?php //foreach ($value['Shippingfees'] as $ship): ?>
				<!--<span><?php //echo $ship['ServiceCode']; ?></span>
				<span ><?php //echo $ship['ServiceName']; ?></span>
				<span><?php //echo $ship['TotalCharges']; ?></span>    -->
			<?php //endforeach; ?>

	</div>


	<?php endforeach; ?>


</div>


<div class="accordion" id="ship_options">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#ship_options" href="#collapseOne">
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
					$('#myCollapsible').collapse('hide');

				});

			</script>
            
           
			<br />
			<?php echo $this->Form->create('Ship'); ?>

			<?php foreach ($shop['Users'] as $key => $value): ?>

			<div class="span3 gb-ship">
				<?php if(count($value['Shippingfees']) > 1): ?>

				<strong><?php echo $shop['Users'][$key]['name']; ?></strong>

				<?php $optionship = array(); ?>

				<?php foreach ($value['Shippingfees'] as $ship): ?>
					<?php //echo ($TotalChargesResidential); ?>
                
                	<?php $TotalChargesResidential = ($ship['TotalCharges']) + (Configure::read('Settings.UPS_RESIDENTIAL_FEE')) ; ?>
					<?php $optionship[] = $ship['ServiceName'] . '<strong>&nbsp;(' .  $TotalChargesResidential . '&nbsp;)</strong>' ;?>
					
					<?php //$optionship[] = $ship['ServiceName'] . '<strong>&nbsp;(' .  $ship['TotalCharges'] . '&nbsp;)</strong>' ;?>
					<?php endforeach; ?>
					<?php echo $this->Form->input('rating_' . $shop['Users'][$key]['id'], array('type' => 'radio', 'legend' => false, 'options' => $optionship, 'value' => $shop['Users'][$key]['shipping_selected']));?>
					<br />

				<?php else: ?>
					<strong><?php echo $shop['Users'][$key]['name']; ?></strong><br />
					<?php foreach ($value['Shippingfees'] as $ship): ?>
						<?php echo $ship['ServiceName']; ?>: $<?php echo $ship['TotalCharges'] . + (Configure::read('Settings.UPS_RESIDENTIAL_FEE')); ?><br />
					<?php endforeach; ?>

				<?php endif; ?>
				<br />

			</div>
			<?php endforeach; ?>

			<?php //echo $this->Form->button('Change Shipping Method', array('class' => 'btn', 'ecape' => false)); ?>
			<?php echo $this->Form->end(); ?>

			<?php endif; ?>

			</div>
		</div>


<?php if($ccform): ?>


	<?php $ups_residential = 2.80 ?>
	<?php $fedex_residential = 2.75 ?>

<div class="span3 offset9 CC">
	<p style="text-align:right; padding-right:30px;">
	<strong>Subtotal: $<?php echo $shop['Order']['subtotal']; ?></strong> <br />
	<strong>Discount ($<?php echo $shop['Order']['discount']; ?>)</strong> <br />
	<strong>Tax: <?php echo $shop['Order']['tax']; ?></strong> <br />
    <?php $order_total_shipping = ($shop['Order']['shipping'] + (Configure::read('Settings.UPS_RESIDENTIAL_FEE'))); ?>
	<strong>Shipping: <?php //echo $shop['Order']['shipping']; ?><?php echo $order_total_shipping ; ?></strong> <br />
	<strong>Order Total: <?php echo $shop['Order']['total']; ?></strong> <br />
	</p>
</div>


<div class="span3 offset8 cc">
	<br />
	<h4>Payment Method</h4>
	<br />
	<br />

	<form action="<?php echo $formURL;?>" method="POST">
	<div id="ccbox"> Credit Card Type. </div>
	<?php //echo $this->Form->input('billing-cc-number', array('class' => 'span2 ccinput', 'maxLength' => 16, 'autocomplete' => 'off')); ?>
	Credit Card Number<br />
	<input type="text" name="billing-cc-number" value="">

	<div class="row">
		<div class="span2"> Credit Card Expiration (Format: Month and Year: ex <strong>0115</strong> <br />
			<input type ="text" name="billing-cc-exp" value="">

		</div>

		<div class="span2">

		</div>
	</div>

	<?php //echo $this->Form->input('cvv', array('label' => 'Card Security Code', 'class' => 'span1', 'maxLength' => 4)); ?>

	CVV Code <br />

	<input type="text" name="cvv">
	<br />
	<br />
	<?php echo $this->Form->button('<i class="icon-thumbs-up icon-white"></i> Finalize Order', array('class' => 'btn btn-primary', 'ecape' => false)); ?> <?php echo $this->Form->end(); ?>

	<!-- <div style="color:red">XXXXX</div> -->

	<?php else: ?>
	<div class="span3 offset9 pre-cc">
		<p style="text-align:right; padding-right:30px;">
		<strong>Subtotal: $<?php echo $shop['Order']['subtotal']; ?></strong> <br />
		<strong>Discount ($<?php echo $shop['Order']['discount']; ?>)</strong> <br />
		<strong>Tax: <?php echo $shop['Order']['tax']; ?></strong> <br />
        <?php $order_total_shipping = ($shop['Order']['shipping'] + (Configure::read('Settings.UPS_RESIDENTIAL_FEE'))); ?>
		<strong>Shipping: <?php //echo $shop['Order']['shipping']; ?><?php echo $order_total_shipping ; ?></strong> <br />
		<strong>Order Total: <?php echo $shop['Order']['total']; ?></strong> <br />
		</p>
	</div>

	<div class="span3 offset10 pre-cc submit"> <?php echo $this->Form->create('Order'); ?> <?php echo $this->Form->hidden('formURL', array('value' => 1)); ?> <?php echo $this->Form->button('<i class="icon-thumbs-up icon-white"></i> Continue', array('class' => 'btn btn-primary', 'ecape' => false)); ?> <?php echo $this->Form->end(); ?>
	</div>

	<?php endif; ?>

	</div>

	</div>

</div>
