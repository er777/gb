<!-- Global File -->

 <style>
 .right-inner-addon {
    position: relative;
 }
   .right-inner-addon input {
	   padding-right: 30px;    
   }
   .right-inner-addon i {
	   position: absolute;
	   right: 0px;
	   padding: 10px 12px;
	   pointer-events: none;
   }
</style>
<header>

			
       <div class="page container masthead">
	   
	           
			<div class="row">
            
            <img src="/img/global/gwm-oval-100.png"  alt="gourmet world market" class=" hidden-logo ">
               <!-- Search -->
               <div class="col-lg-md-3 col-md-3 col-sm-md-3 col-xs-md-3 col-md-offset-6 search right-inner-addon"> 
               
              
                   
               <!-- Search Box --> 
               <i class="icon-search"></i>
<?php echo $this->Form->create('Product', array('type' => 'GET', 'class' => 'navbar-form', 'url' => array('controller' => 'products', 'action' => 'search'))); ?> <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'autocomplete' => 'on')); ?>
                       <?php //echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array('div' => false, 'class' => 'btn btn-gb', 'escape' => false)); ?>
                       <?php echo $this->Form->end(); ?>
                  
               </div>
               
               
               <!-- Other -->
               <div class="col-md-3 header-tools"> 
                   <ul class="gwm-horiz-account">
                    	
                       <li class="cart">
                           <button class="cart" type="submit">
                           <a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/shops/cart"></i><img src="/img/global/cart.png" width="40" height="29" alt="cart"></a>
                           </button>
                       </li>
                       <li class="social"><a href="https://www.facebook.com/pages/Gourmet-Basket/603379453015040"><img src="/img/global/fb.png" width="28" height="27" alt="facebook"></a></li>
                       <li class="social"><a href="https://twitter.com/search/users?q=gourmetbasket1"><img src="/img/global/tw.png" width="28" height="27"></a></li>
                       <li class="social"><a href="http://pinterest.com/gourmetbasket1/"><img src="/img/global/pin.png" width="27" height="27" alt="pinterest"></a></li>
                       <!--<li class="gwm-account"><a href="/members/register">BECOME A MEMBER</a></li>--> 
                       <!-- <li class="gwm-account"><a href="/members/login">LOG IN</a></li>-->
                   </ul>
                   
                   <!--<div class="hlinks">-->
                       <!--<span>-->
   					<!-- item details with price -->
                       <!--<a href="#cart" role="button" data-toggle="modal">3 Item(s) in your <i class="icon-shopping-cart"></i></a> -<span class="bold">$25</span>
                       </span>-->
                       
                       <!-- Login and Register link --> 
                       <!--<span class="lr"><a href="#login" role="button" data-toggle="modal">Login</a> or <a href="#register" role="button" data-toggle="modal">Register</a></span>-->
                   <!--</div>-->
                   
               </div>
               
               
               
           </div>
       </div>
   </div>
   
</header>
<!-- End of Header include -->