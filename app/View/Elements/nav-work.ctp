
<div class="navbar navbar-inverse">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar">
			</span> <span class="icon-bar">
			</span> <span class="icon-bar">
			</span>
		</button>
	</div>
	
<div class="navbar-collapse collapse">

	<ul class="nav navbar-nav">
		<!-- ONE -->
		<li class="dropdown mega-menu-5"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> VENDORS<b class="caret"></b> </a>
			<ul class="dropdown-menu pull-left">
				<li class="two-column">
					<ul>
						<?php $i = 0; ?>
						<?php foreach($menuvendors as $menuvendor) : ?>
						<?php $i++; ?>
						<li><?php echo $this->Html->link($menuvendor['User']['name'], 'http://' . $menuvendor['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/'); ?></li>
						<?php if (($i % 10) == 0) { ?>
					</ul>
				</li>
				<li class="two-column">
					<ul>
						<?php } endforeach; ?>
					</ul>
				</li>
			</ul>
		</li>
		
		<!-- TWO -->
		<li class="dropdown mega-menu-2"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> FOOD TYPES<b class="caret"></b> </a>
			<ul class="dropdown-menu">
				<li class="two-column">
					<ul>
						<?php $i = 0; ?>
						<?php foreach($menucategories as $menucategory) : ?>
						<?php $i++; ?>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN') .'/foods/'. $menucategory['Category']['slug']; ?>"><?php echo $menucategory['Category']['name']; ?></a></li>
						<?php if (($i % 8) == 0) { ?>
					</ul>
					<ul>
						<?php } endforeach; ?>
					</ul>
				</div>
				</li>
			</ul>
		</li>
		
		<!-- THREE -->
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> US FOODS <b class="caret"></b> </a>
			<ul class="dropdown-menu">
				<li class="two-column">
					<ul>
						<?php $i = 0; ?>
						<?php foreach($menu_ustraditions as $menu_ustradition) : ?>
						<?php $i++; ?>
						<li><a href="http://www.<?php echo Configure::read('Settings.DOMAIN') .'/foods/'. $menu_ustradition['Ustradition']['slug']; ?>"><?php echo $menu_ustradition['Ustradition']['name']; ?></a></li>
						<?php if (($i % 8) == 0) { ?>
					</ul>
					<ul>
						<?php } endforeach; ?>
					</ul>
				</div>
				</li>
			</ul>
		</li>
		
	</ul>
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
	
