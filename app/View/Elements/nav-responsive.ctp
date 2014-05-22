 <!-- Navigation -->
<div class="navbar navbar-gwm navbar-inverse">

	<div class="container">
	 
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href=" " title="responsive Mega Menu"><strong>GWM</strong></a>
		</div>
		
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				
				-<li><a href="">Main Menu</a></li>
											
				<li class="dropdown mega-menu-5 transition"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home icon-white"></i> VENDORS<b class="caret"></b></a>
					<ul class="dropdown-menu">
							
						<li class="two-column start">
							<ul><?php 
								$i = 0;
								foreach($menuvendors as $menuvendor) : 
								$i++;
								?>
								<li><?php echo $this->Html->link($menuvendor['User']['name'], 'http://' . $menuvendor['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/'); ?></li>
								<?php
								if (($i % 15) == 0) { echo "</ul>\n</li>\n<li class=\"two-column loop\">\n<ul>\n";	}
								endforeach;
							?>
							</ul>
						</li>
							
					</ul>
				
			</li><!-- 1 Column Menu Ends -->
						
				<li class="dropdown mega-menu-5 transition">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>Food Types<b class="caret"></b></a>
					<ul class="dropdown-menu">
						
						<li class="two-column">
							<ul>
								<p class="nav-special"><a href="/categories">Stop by our "Pantry"</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/accessories">Accessories</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/appetizers">Appetizers</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/bakery">Bakery</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/beverages">Beverages</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/chocolates">Chocolates</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/coffee">Coffee</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/condiments">Condiments</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/confections">Confections</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/dairy">Dairy</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/desserts">Desserts</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/seafood">Fish & Seafood</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/fruits">Fruits</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/gluten-free">Gluten-Free</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/grains-and-cereals">Grains & Cereals</a></li>
							</ul>
						</li>	
						
						<li class="two-column">
							<ul>
								<li><a href="http://www.gourmetworldmarket.com/foods/herbs-spices">Herbs and Spices</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/jams-syrups">Jams & Syrups</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/legumes-beans">Legumes & Beans</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/lifestyle-products">Lifestyle Products</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/meats-poultry">Meats & Poultry</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/nuts-and-seeds">Nuts & Seeds</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/oils-vinegars">Oils & Vinegars</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/pasta-noodles">Pasta & Noodles</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/rice">Rice</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/salts-peppers">Salts & Peppers</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/sauces">Sauces & Marinades</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/snacks">Snacks</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/soups-prepared-foods">Soup / Prepared Foods</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/sweeteners-honey">Sweeteners & Honey</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/teas">Teas</a></li>
								<li><a href="http://www.gourmetworldmarket.com/foods/vegetables-and-potatoes">Vegetables & Potatoes</a></li>													
							</ul>
						</li>
					</ul>
				</li>			
									
				<li class="dropdown mega-menu-2 transition">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>US REGIONS<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="one-column">
							<ul>
								<li><a href="http://www.gourmetworldmarket.com/us/amish">Amish</a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/deep-south ">Deep South </a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/far-west ">Far West </a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/great-lakes">Great Lakes</a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/hawaii">Hawaii</a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/louisiana">Louisiana</a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/mid-atlantic">Mid-Atlantic</a></li>
							</ul>
						</li>
						<li class="one-column">
							<ul>
								
								<li><a href="http://www.gourmetworldmarket.com/us/mid-west">Midwest and Plains </a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/native-american">Native American</a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/new-england">New England</a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/northwest">Pacific Northwest</a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/southeast">Southeast</a></li>
								<li><a href="http://www.gourmetworldmarket.com/us/southwest">Southwest</a></li>
							</ul>
						</li>
					</ul>
				</li>		
			



				<li class="dropdown mega-menu-3 transition">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>INTL REGIONS<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="one-column">
							<ul>
							
								<li><a href="http://www.gourmetworldmarket.com/international/africa">Africa </a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/british-isles">British Isles &amp; Ireland</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/china">China and Taiwan</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/central-america">Central America</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/eastern-europe">Eastern and Central Europe</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/japan">Japan</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/korea">Korea</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/mediterranean">Mediterranean Europe</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/mexico">Mexico</a></li>
							</ul>
						</li>
						<li class="two-column">
							<ul>
								<li><a href="http://www.gourmetworldmarket.com/international/middle-east">Middle East</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/north-america">North America / Canada</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/oceania">Oceania</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/scandinavia">Scandinavia</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/southeast-asia">Southeast Asia</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/south-america">South America</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/south-asia">South Asia</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/the-caribbean">The Caribbean</a></li>
								<li><a href="http://www.gourmetworldmarket.com/international/western-europe">Western Europe</a></li>
							</ul>
						</li>
					</ul>
				</li>	
				

				<li class="dropdown mega-menu-1 transition">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>SPECIAL DIETS<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="one-column">
							<ul>
								<a>Coming soon...</a>
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>RECIPES<b class="caret"></b></a></li>
                                <li><a href="/articles" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>ARTICLES<b class="caret"></b></a>
                                <li><a href="http://www.blog.<?php echo Configure::read('Settings.DOMAIN'); ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>BLOG<b class="caret"></b></a>
						<!--<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/">All Natural</a></p>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/">No Preservatives</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/">Gluten Free</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/">Lactose Free</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/">Vegetarian</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/">Kosher</a></li>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/">Halal</a></li>-->			
							</ul>
						</li>
					</ul>
				</li>	

			</ul><!-- 5 Menu Examples Ends -->



				


						
		</div><!--/.nav-collapse -->
		
	</div><!--/.container -->	
		
					
</div><!-- /.navbar .navbar-inverse -->  






























