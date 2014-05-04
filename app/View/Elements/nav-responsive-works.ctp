   
    <div class="navbar navbar-inverse">
	
		<div class="container">
		
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>" title="responsive Mega Menu">
                <img src="/img/global/gwm-oval.png"  alt="gourmet basket" class="img-responsive">
                <!--<strong>GWM</strong>-->
                
                </a>
			</div>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				
					<li class="dropdown"><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>">HOME</a>
							
					<li class="dropdown mega-menu-4 transition vendors">
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
					
                    							
					<li class="dropdown mega-menu-4 transition foods">
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
										
					<li class="dropdown mega-menu-3 transition">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>REGIONS<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="one-column">
								<ul><h4>US REGIONS</h4>
                                	<?php
                                    $i = 0; ?>
									<?php foreach($menu_ustraditions as $menu_ustradition) : ?>
									<?php $i++; ?>
                                    
                                    <li><a href="http://<?php echo Configure::read('Settings.DOMAIN') .'/us/'. $menu_ustradition['Ustradition']['slug']; ?>"><?php echo $menu_ustradition['Ustradition']['name']; ?></a></li>
                                    
                                    <?php endforeach; ?>
									
								</ul>
							</li>
							<li class="two-column">
								<ul><h4>INTERNATIONAL REGIONS</h4>
                                	<?php
                                    $i = 0; ?>
									<?php foreach($menu_traditions as $menu_tradition) : ?>
									<?php $i++; ?>
                                    <li><a href="http://<?php echo Configure::read('Settings.DOMAIN') .'/international/'. $menu_tradition['Tradition']['slug']; ?>"><?php echo $menu_tradition['Tradition']['name']; ?></a></li>
                                    <?php endforeach; ?>
								</ul>
							</li>
						</ul>
					</li>	
				

				<li class="dropdown mega-menu-1 transition recipes">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>RECIPES<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="one-column">
							<ul>
								<li><a href="http://<?php echo Configure::read('Settings.DOMAIN'); ?>/recipes/all">ALL RECIPES</a></li>
                                <li><a href="/recipes"><i class="icon-briefcase icon-white"></i>RECIPES</a></li>
							</ul>
						</li>
					</ul>
				</li>	

				
				<li class="dropdown mega-menu-1 transition explore">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase icon-white"></i>EXPLORE!<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="one-column">
							<ul>
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
	
	<!-- End of Nav Include -->
    
    