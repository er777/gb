<div class="navbar">

	<div class="navbar-inner">

	<div class="nav-collapse">
	
	
	
	
	    <nav id="main-nav">	
	
	

		<ul class="meganizr mzr-slide mzr-responsive">

			<!-- 4 Columns Mega Dropdown -->
			<!-- Portfolio -->

			<li class="mzr-drop"> <a class="parent" href="#" ><span style="color:#a53043;text-shadow:1px 1px #000"></span>VENDORS<b class="caret"></b></a>
				<div class="mzr-content drop-three-columns popover-content">
					<div class="wide">
					<?php foreach($menuvendors as $menuvendor) : ?>
					<p><?php echo $this->Html->link($menuvendor['User']['name'], 'http://' . $menuvendor['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/'); ?></p>
					<?php endforeach; ?>
					<span class="special"><a href="/users/vendors">Full Vendor List</a></span>
					</div>
				</div>
			</li>


			
				<!-- BEGIN Menu Item THREE -->
				
				<li class="mzr-drop"> <a class="parent" href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/categories">FOOD TYPES<b class="caret"></b></a>

				<div class="mzr-content drop-three-columns popover-content">
					<div class="wide">
						<p class="nav-special"><a href="/categories">Stop by our "Pantry"</a></p>
						<?php foreach($menucategories as $menucategory) : ?>
						<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN') .'/foods/'. $menucategory['Category']['slug']; ?>"><?php echo $menucategory['Category']['name']; ?></a></p>

						<?php endforeach; ?>

					</div>
				</div>
			</li>


			<li class="mzr-drop">
				<a class="parent" href="#">U.S. FOODS<b class="caret"></b></a>
				<div class="mzr-content drop-three-columns popover-content">
					<div class="wide">
					<?php //foreach($menu_ustraditions as $menu_ustradition) : ?>
					<!--<li><?php //echo $this->Html->link($menu_ustradition['Ustradition']['name'], array('controller' => 'ustraditions', 'action' => 'view', $menu_ustradition['Ustradition']['slug'])); ?></li>-->
					<?php //endforeach; ?>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/amish">Amish</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/deep-south ">Deep South </a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/far-west ">Far West </a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/great-lakes">Great Lakes</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/hawaii">Hawaii</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/louisiana">Louisiana</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/mid-atlantic">Mid-Atlantic</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/mid-west">Midwest and Plains </a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/native-american">Native American</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/new-england">New England</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/northwest">Pacific Northwest</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/southeast">Southeast</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/us/southwest">Southwest</a></p>
					<p></p>
					<?php /*?> <span class="special"><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/ustraditions">[ The US Map Tool ]</a></span><?php */?>
					</div>
				</div>
			</li>
			<!--<a href="http://www.gourmetdev.com/ustraditions">US Traditions</a>-->
			<?php //echo $this->Html->link('US Markets', array('controller' => 'ustraditions', 'action' => 'index')); ?>

			<li class="mzr-drop"> <a class="parent" href="#">INT'L FOODS<b class="caret"></b></a>
				<div class="mzr-content drop-three-columns popover-content">
					<div class="wide">
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/africa">Africa </a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/british-isles">British Isles &amp; Ireland</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/china">China and Taiwan</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/central-america">Central America</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/eastern-europe">Eastern and Central Europe</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/japan">Japan</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/korea">Korea</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/mediterranean">Mediterranean Europe</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/mexico">Mexico</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/middle-east">Middle East</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/north-america">North America / Canada</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/oceania">Oceania</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/scandinavia">Scandinavia</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/southeast-asia">Southeast Asia</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/south-america">South America</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/south-asia">South Asia</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/the-caribbean">The Caribbean</a></p>
					<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/international/western-europe">Western Europe</a></p>
					<p></p>
					<?php /*?><span class="special"><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/traditions">[ The World Map Tool ]</a></span><?php */?>

				<?php //echo $this->Html->link('Int\'l Markets', array('controller' => 'traditions', 'action' => 'index')); ?>
					 </div>
				</div>
			</li>
			
			<li class="mzr-drop"><a class="parent" href="/">SPECIAL DIETS<b class="caret"></b></a>
				<div class="mzr-content drop-two-columns popover-content">
					<div class="wide">
						<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/recipes">Special Diets</a></p>
					</div>
				</div>
			</li>

			<li class="mzr-drop"><a class="parent" href="/recipes">RECIPES<b class="caret"></b></a>
				<div class="mzr-content drop-two-columns popover-content">
					<div class="wide">
						<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/recipes">All Gourmet World Recipes</a></p>
					</div>
				</div>
			</li>
            
			<li class="mzr-drop"><a class="parent" href="http://blog.gourmetworldmarket.com">ARTICLES/BLOG<b class="caret"></b></a>
				<div class="mzr-content drop-two-columns popover-content">
					<div class="wide">
						<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/recipes">Articles/Blog</a></p>
					</div>
				</div>
			</li>

            <!--<li class="cart">
				
			</li>
-->
			<div class="magazine">
            	<!--<a href="/magazine">the magazine</a> / <a href="http://blog.gourmetworldmarket.com">the blog</a>-->
            
			<!-- For overlay Articles overlay -->

      <!--         <li class="mzr-drop"> <a href="/magazine" >The Magazine<b class="caret"></b></a>
                   <div class="mzr-content drop-two-columns popover-content">
                       <div class="wide">
                          <p class="nav-special"><a href="/articles">The Latest</a></p>
                          
                          <hr class="thin tight">
                          <!-- <span class="special nolink">MAGAZINE SECTIONS:</span>-->
                          <!--<p class="special">THE INFO SOURCE:</p>-->
                          <!--<ul>
      
                              <?php //foreach($menublocks as $menublock) : ?>
                                  <?php //$check = $menublock['Block']['id'] ?>
      
                                      <?php //if($check != 1 ): ?>
										<li><p>-<a href="http://www.<?php //echo Configure::read('Settings.DOMAIN') . '/articles/' . $menublock['Block']['slug']; ?>">
                                      <?php //echo  $menublock['Block']['name'] ; ?>
                                              </a>
										</li>
										<?php //endif; ?>
                          		<?php //endforeach; ?>
                          
                          
                          </ul>-->
                  </li>
						</div>
				</div>
             </div>
               
               

			<!--<li> <a href="http://blog.gourmetworldmarket.com" >The Blog</a>
			<li> <a href="http://www.<?php echo Configure::read('Settings.DOMAIN') . '/blog/';?>" >The Blog</a>

			</li>-->

			<?php //echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?>

			<?php /*?> <li class='btn btn-gb'><?php echo $this->Html->link('CART', array( 'controller' => 'shops', 'action' => 'cart')); ?></li>
			<?php */?>

			

		</ul>
</div>
</div>
</div>