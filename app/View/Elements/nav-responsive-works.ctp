	<div class="navbar navbar-inverse">
	
		<div class="container">
		
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>" title="responsive Mega Menu">
                <img src="/img/global/gwm-oval.png"  alt="gourmet basket" width="100%">
                <!--<strong>GWM</strong>-->
                
                </a>
			</div>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
							
					<li class="dropdown mega-menu-4 transition">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home icon-white"></i> VENDORS<b class="caret"></b></a>
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
							</li><!-- 2 Column Menu Ends -->
								
						</ul>
			
					</li>
					
					
							
					<li class="dropdown mega-menu-4 transition">
						<a href="/categories" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>FOOD TYPES<b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<li class="two-column start">
								<ul><li>
									<?php
                                    $i = 0; ?>
									<?php foreach($menucategories as $menucategory) : ?>
									<?php $i++; ?>
									<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN') .'/foods/'. $menucategory['Category']['slug']; ?>"><?php echo $menucategory['Category']['name']; ?></a></li>

									<?php
                                    if (($i % 15) == 0) { echo "</ul>\n</li>\n<li class=\"two-column loop\">\n<ul>\n";	}
									endforeach; ?>
                                    <li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN') . '/categories/'; ?>">Stop by our "Pantry"</a>
                                    	
                                    </li>
								</ul>
							</li>
						</ul>
					</li>			
										
					<li class="dropdown mega-menu-4 transition">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>REGIONS<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="two-column">
								<ul><h4>US REGIONS</h4>
									<!--<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/amish">Amish</a></li> -->
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/deep-south ">Deep South </a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/far-west ">Far West </a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/great-lakes">Great Lakes</a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/hawaii">Hawaii</a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/louisiana">Louisiana</a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/mid-atlantic">Mid-Atlantic</a></li>
                                    <li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/mid-west">Midwest and Plains </a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/native-american">Native American</a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/new-england">New England</a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/northwest">Pacific Northwest</a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/southeast">Southeast</a></li>
									<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/us/southwest">Southwest</a></li>
								</ul>
							</li>
							<li class="two-column">
								<ul><h4>INTERNATIONAL REGIONS</h4>
                                <li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/africa">Africa </a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/british-isles">British Isles &amp; Ireland</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/china">China and Taiwan</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/central-america">Central America</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/eastern-europe">Eastern and Central Europe</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/japan">Japan</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/korea">Korea</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/mediterranean">Mediterranean Europe</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/mexico">Mexico</a></li>
                                <li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/middle-east">Middle East</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/north-america">North America / Canada</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/oceania">Oceania</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/scandinavia">Scandinavia</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/southeast-asia">Southeast Asia</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/south-america">South America</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/south-asia">South Asia</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/the-caribbean">The Caribbean</a></li>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/international/western-europe">Western Europe</a></li>


									
								</ul>
							</li>
					</ul>
				</li>		
				
							
				
				<li class="dropdown mega-menu-1 transition">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>EXPLORE!<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="one-column">
							<ul>
                             	<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/recipes/all"><i class="icon-briefcase icon-white"></i>ALL RECIPES</a></li>
                                <li><a href="/recipes"><i class="icon-briefcase icon-white"></i>RECIPES</a></li>
                                <!--<li><a href="/articles"> <i class="icon-briefcase icon-white"></i>ARTICLES</a></li>-->
                                <li><a href="http://www.blog.<?php echo Configure::read('Settings.DOMAIN'); ?>">BLOG</a></li>
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

<!-- 1 Column Menu Ends -->
					
				</ul><!-- 5 Menu Examples Ends -->
					
							
			</div><!--/.nav-collapse -->
			
		</div><!--/.container -->	

						
	</div><!-- /.navbar .navbar-inverse -->