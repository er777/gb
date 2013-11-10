<div class="container">
	<div class="navbar yamm">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
	            </button>

				
				<div class="nav-collapse collapse" id="nav1">
					<ul class="nav">
						<!-- Classic list -->
						<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> VENDORS<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<li> 
									<!-- Content container to add padding -->
									<div class="yamm-content">
										<ul class="span3 unstyled">
										
											<?php $i = 0; ?>
											<?php foreach($menuvendors as $menuvendor) : ?>
											<?php $i++; ?>
											<li><?php echo $this->Html->link($menuvendor['User']['name'], 'http://' . $menuvendor['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/'); ?></li>
	
											
											<?php if (($i % 10) == 0) { ?>
										</ul>
										<ul class="span3 unstyled">
										<?php
											}
											endforeach; ?>
										</ul>
									</div>
								</li>
							</ul>
						</li>
						
						<!-- Classic list -->
						<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> FOOD TYPES<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<li> 
									<!-- Content container to add padding -->
									<div class="yamm-content">
										<ul class="span2 unstyled">
										
											<?php $i = 0; ?>
											<?php foreach($menucategories as $menucategory) : ?>
											<?php $i++; ?>
											<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN') .'/foods/'. $menucategory['Category']['slug']; ?>"><?php echo $menucategory['Category']['name']; ?></a></li>
	
											
											<?php if (($i % 8) == 0) { ?>
										</ul>
										<ul class="span2 unstyled">
										<?php } endforeach; ?>
										</ul>
									</div>
								</li>
							</ul>
						</li>
						
						<!-- Classic dropdown -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> US FOODS <b class="caret"></b> </a>
							
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
								<li>
									<!-- Content container to add padding -->
									<!--<div class="yamm-content">-->
									<div class="yamm-content">
										<ul>
											<?php foreach($menu_ustraditions as $menu_ustradition) : ?>
											<li>
											<?php echo $this->Html->link($menu_ustradition['Ustradition']['name'], array('controller' => 'ustraditions', 'action' => 'view', $menu_ustradition['Ustradition']['slug'])); ?>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</li>
							</ul>
						<!--</div>-->
                		</li>

						
						
						
						
						
						
						
												
					</ul>
				</div>
				<!--/.nav-collapse --> 
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
</div>

<!--<div class="navbar-inner">
	
		<div class="container">
		
			<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-th-list"></span>
			</a>

			<div class="nav-collapse collapse">
			
			
			
			
				<nav id="main-nav">	
			
			
		
				<ul class="nav">
		
					<!-- 4 Columns Mega Dropdown --> 
<!-- Portfolio --> 

<!--<li class="dropdown">
						<a class="dropdown-toggledata-toggle="dropdown"" href="#" >
							<span style="color:#a53043;text-shadow:1px 1px #000"></span>VENDORS
							<b class="caret"></b>
							</a>
						<ul class="dropdown-menu">
							<li>
								<div class="yamm-content">
									<?php //foreach($menuvendors as $menuvendor) : ?>
									<p><?php //echo $this->Html->link($menuvendor['User']['name'], 'http://' . $menuvendor['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/'); ?></p>						
								</div>
									<?php //endforeach; ?>
							</li>
						</ul>
							<span class="special"><a href="/users/vendors">Full Vendor List</a></span>
							</div>
						</div>
					</li>
		
					
		
				</ul>
			</div>
		</div>
	</div>--> 

