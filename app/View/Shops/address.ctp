<?php echo $this->set('title_for_layout', 'Address'); ?>

<?php echo $this->Html->script(array('shops_address.js'), array('inline' => false)); ?>

<h1>Please fill in your address details</h1>


<div class="checkout">
 
    <div class="row">
      <div class="col-md-12">

        <!-- Checkout page title -->
          <h4 class="title"><i class="icon-shopping-cart"></i> Checkout</h4>

          <!-- Sub title -->
          <h5 class="title">Shipping &amp; Billing Details</h5>
          <!-- Address and Shipping details form -->
            <div class="form form-small">
              <!-- Register form (not working)-->
              
              <?php echo $this->Form->create('Order'); ?>
              
              <form role"form" method="post">
                  <!-- Name -->
                  <div class="form-group col-md-4">

     					<?php echo $this->Form->input('first_name', array('class' => 'form-control')); ?>
						
                 		<?php echo $this->Form->input('last_name', array('class' => 'form-control')); ?>
						
						<?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
						
						<?php echo $this->Form->input('phone', array('class' => 'form-control')); ?>

                    </div>


                  	<div class="form-group col-md-4">
						
						<?php echo $this->Form->input('billing_address', array('class' => 'form-control')); ?>
						
                        <?php echo $this->Form->input('billing_address2', array('label' => 'Room/ Apt/ Building/ Floor','class' => 'form-control')); ?>
						
                        <?php echo $this->Form->input('billing_city', array('class' => 'form-control')); ?>
						
                        <?php echo $this->Form->input('billing_state', array('class' => 'form-control','options' => $states, 'empty' => '')); ?>
						
                        <?php echo $this->Form->input('billing_zip', array('class' => 'form-control')); ?>
                        
                    </div>
                    

                    <div class="form-group col-md-4">
                 
						<?php echo $this->Form->input('shipping_address', array('class' => 'form-control')); ?>
                        
                        <?php echo $this->Form->input('shipping_address2', array('label' => 'Room/ Apt/ Building/ Floor','class' => 'form-control')); ?>
                        
                        <?php echo $this->Form->input('shipping_city', array('class' => 'form-control')); ?>
                        
                        <?php echo $this->Form->input('shipping_state', array('options' => $states, 'empty' => '','class' => 'form-control')); ?>
                        
                        <?php echo $this->Form->input('shipping_zip', array('class' => 'form-control')); ?>
                      
                    </div>
                    

                  <div class="col-md-3 col-md-offset-8 air20">
                  
                       <div class="input checkbox">
                               <?php echo $this->Form->input('sameaddress', array('type' => 'checkbox','label' => 'Copy Billing Address to Shipping')); ?>
                       </div>
                     
					<div class="clearfix air20"></div>
                    
                       <div class="input checkbox">	

                               <?php echo $this->Form->input('residential', array('type' => 'checkbox', 'label' => 'Is this a Business Address?'));?>
                       </div>  
					</div>
                    
			</div>
         
			<!-- Confirm order button -->
              <div class="row">
                <div class="col-md-4 col-md-offset-8">
                  <div class="pull-right">
                     <?php echo $this->Form->button('<i class="icon-arrow-right icon-white"></i> Continue', array('class' => 'btn btn-primary air20 earth30', 'escape' => false));?>
                  </div>
                </div>
              </div>

      </div>
    </div>

</div>

    <?php echo $this->Form->end(); ?>
    
    </form>