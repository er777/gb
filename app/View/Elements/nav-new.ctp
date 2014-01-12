  <!-- Navigation -->
          <div class="navbar bs-docs-nav" role="banner">
           
             <div class="container">
               <div class="navbar-header">
				  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
      
				</div>
               <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                 <ul class="nav navbar-nav">
                   <li><a href="index.html"><i class="icon-home"></i></a></li>
				   
				   
                   <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="myaccount.html">My Account</a></li>
                        <li><a href="view-cart.html">View Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="wish-list.html">Wish List</a></li>
                        <li><a href="order-history.html">Order History</a></li>
                        <li><a href="edit-profile.html">Edit Profile</a></li>
                        <li><a href="confirmation.html">Confirmation</a></li>
                      </ul>
                   </li>
				   
				   
				                      
				<li class="dropdown mega-menu-4 transition"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home icon-white"></i> VENDORS<b class="caret"></b></a>
					<ul class="dropdown-menu">
							
						<li class="two-column">
							<ul><?php 
							$i = 0;
							foreach($menuvendors as $menuvendor) : 
							$i++;
							?><li><?php echo $this->Html->link($menuvendor['User']['name'], 'http://' . $menuvendor['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/'); ?></li>
							<?php
							if (($i % 15) == 0) { echo "</ul>\n</li>\n<li class=\"two-column loop\">\n<ul>\n";	}
							endforeach;
							?>
							</ul>
						</li>
							
					</ul>
					
				</li><!-- Vendor Menu Ends -->					
					

				 <li class="dropdown" id="usfoods-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">U.S. FOODS<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/far-west ">Far West </a></li>
							<!--<ul class="dropdown-menu">
								<li><a href="#">Login</a></li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="#">More options</a>
									<ul class="dropdown-menu">
										<li><a tabindex="-1" href="#">Second level</a></li>
										<li class="dropdown-submenu">
											<a href="#">More..</a>
											<ul class="dropdown-menu">
												<li><a href="#">3rd level</a></li>
												<li><a href="#">3rd level</a></li>
											</ul>
										</li>
								<li><a href="#">Second level</a></li>
								<li><a href="#">Second level</a></li>
							</ul>
						</li>
						<li><a href="#">Register</a></li>
						<li class="divider"></li>
						<li><a href="#">Logout</a></li>
                    </ul>-->
								
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/northwest">Pacific Northwest</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/mid-west">Plains/ Midwest</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/southwest">Southwest</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/southeast">Southeast</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/deep-south">South Central</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/great-lakes">Great Lakes</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/mid-atlantic">Mid-Atlantic</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/new-england">New England</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/amish">Amish</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/native-american">Native American</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/louisiana">Louisiana</a></li>
					</ul>
					
				</li><!-- US Foods Menu Ends -->					
					
					
					
					 <li class="dropdown" id="intlfoods-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"INTL FOODS<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/far-west ">Far West </a></li>
							<!--<ul class="dropdown-menu">
								<li><a href="#">Login</a></li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="#">More options</a>
									<ul class="dropdown-menu">
										<li><a tabindex="-1" href="#">Second level</a></li>
										<li class="dropdown-submenu">
											<a href="#">More..</a>
											<ul class="dropdown-menu">
												<li><a href="#">3rd level</a></li>
												<li><a href="#">3rd level</a></li>
											</ul>
										</li>
								<li><a href="#">Second level</a></li>
								<li><a href="#">Second level</a></li>
							</ul>
						</li>
						<li><a href="#">Register</a></li>
						<li class="divider"></li>
						<li><a href="#">Logout</a></li>
                    </ul>-->
								
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/northwest">Pacific Northwest</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/mid-west">Plains/ Midwest</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/southwest">Southwest</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/southeast">Southeast</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/deep-south">South Central</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/great-lakes">Great Lakes</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/mid-atlantic">Mid-Atlantic</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/new-england">New England</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/amish">Amish</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/native-american">Native American</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/louisiana">Louisiana</a></li>
					</ul>
					
				</li><!-- US Foods Menu Ends -->					
			
				   
                                                         
                 
                 </ul>
               </nav>
              </div>
           </div>



