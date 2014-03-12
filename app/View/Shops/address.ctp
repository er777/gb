<?php echo $this->set('title_for_layout', 'Address'); ?>

<?php echo $this->Html->script(array('shops_address.js'), array('inline' => false)); ?>

<h1>Please fill in your address details</h1>


<div class="checkout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <!-- Checkout page title -->
          <h4 class="title"><i class="icon-shopping-cart"></i> Checkout</h4>

          <!-- Sub title -->
          <h5 class="title">Shipping &amp; Billing Details</h5>
          <!-- Address and Shipping details form -->
            <div class="form form-small">
                                      <!-- Register form (not working)-->
                                      <form class="form-horizontal">
                                          <!-- Name -->
                                          <div class="form-group">
                                            
                                            <div class="col-md-6">***
                                              <?php echo $this->Form->input('first_name', array('class' => 'col-md-3')); ?>**
                                            </div>
                                          </div>   
                                          <!-- Email -->
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="email1">Email</label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" id="email1">
                                            </div>
                                          </div>
                                          <!-- Telephone -->
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="telephone">Telephone</label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" id="telephone">
                                            </div>
                                          </div>  
                                          <!-- Address -->
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="address">Address</label>
                                            <div class="col-md-6">
                                              <textarea class="form-control" id="address"></textarea>
                                            </div>
                                          </div>                           
                                        
                                            
                                          <!-- State -->
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="city">State</label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" id="state">
                                            </div>
                                          </div>                                               
                                          <!-- City -->
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="city">City</label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" id="city">
                                            </div>
                                          </div>    
                                          
                                      </form>
                                    </div>

                                    <hr />


      <!-- Payment details section -->
        <!-- Title -->
          <h5 class="title">Payment Details</h5>

         
          <!-- Confirm order button -->
              <div class="row">
                <div class="col-md-4 col-md-offset-8">
                  <div class="pull-right">
                    <a href="checkout.html" class="btn btn-danger">Confirm Order</a>
                  </div>
                </div>
              </div>

      </div>
    </div>
  </div>
</div>












<?php echo $this->Form->create('Order'); ?>

<hr>

<div class="row">
    <div class="col-md-4">
    
    <?php echo $this->Form->input('first_name', array('class' => 'col-md-4')); ?>
    
    <?php echo $this->Form->input('last_name', array('class' => 'col-md-4')); ?>
    
    <?php echo $this->Form->input('email', array('class' => 'col-md-4')); ?>
    
    <?php echo $this->Form->input('phone', array('class' => 'col-md-4')); ?>
    
    <br />
    
    </div>
    <div class="col-md-4">
    
    <?php echo $this->Form->input('billing_address', array('class' => 'col-md-4')); ?>
    
    <?php echo $this->Form->input('billing_address2', array('class' => 'col-md-4','label' => 'Room/ Apt/ Bldng/ Flr')); ?>
    
    <?php echo $this->Form->input('billing_city', array('class' => 'col-md-4')); ?>
    
    <?php echo $this->Form->input('billing_state', array('options' => $states, 'empty' => '', 'class' => 'col-md-4')); ?>
    
    <?php echo $this->Form->input('billing_zip', array('class' => 'col-md-4')); ?>
    
    <br />
    
    
    </div>
    <div class="col-md-4">
    
    <?php echo $this->Form->input('shipping_address', array('class' => 'col-md-4')); ?>
    
    <?php echo $this->Form->input('shipping_address2', array('class' => 'col-md-4','label' => 'Rm/ Apt/ Bldng/ Flr')); ?>
    
    <?php echo $this->Form->input('shipping_city', array('class' => 'col-md-4')); ?>
    
    <?php echo $this->Form->input('shipping_state', array('options' => $states, 'empty' => '', 'class' => 'col-md-4')); ?>
    
    <?php echo $this->Form->input('shipping_zip', array('class' => 'col-md-4')); ?>
    
    <br />
    
	<?php echo $this->Form->input('sameaddress', array('type' => 'checkbox', 'label' => 'Copy Billing Address to Shipping')); ?>
	<br />
    <br />

    <?php echo $this->Form->input('residential', array('type' => 'checkbox', 'label' => 'Is this a Residential Address?'));?>
    <br />
    <br />
    <?php echo $this->Form->button('<i class="icon-arrow-right icon-white"></i> Continue', array('class' => 'btn btn-primary', 'escape' => false));?>
    <?php echo $this->Form->end(); ?>
    
    </div>
</div>

