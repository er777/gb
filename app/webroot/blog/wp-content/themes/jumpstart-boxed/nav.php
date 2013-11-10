

<div class="navbar">

    <div class="navbar-inner">
    
    <div class="nav-collapse">
    
        <ul class="meganizr mzr-slide mzr-responsive">
            
            <!-- 4 Columns Mega Dropdown --> 
            <!-- Portfolio -->
            <li class="mzr-drop"> <a href="/categories">Foods<b class="caret"></b></a>
                <div class="mzr-content drop-three-columns popover-content">
					<div class="wide">
                     	<p class="nav-special"><a href="/categories">Stop by our "Pantry"</a></p>
						<?php foreach($menucategories as $menucategory) : ?>
						<p><a href="http://www.<?php echo Configure::read('Settings.DOMAIN') .'/categories/view/'. $menucategory['Category']['slug']; ?>">
											   <?php echo $menucategory['Category']['name']; ?></a></p>
                        
						<?php endforeach; ?>
                       
					</div>
				</div>
            </li>
            
            <li class="mzr-drop"> <a href="#" >Shops<b class="caret"></b></a>
                <div class="mzr-content drop-three-columns popover-content">
					<div class="wide">
                    <?php foreach($menuvendors as $menuvendor) : ?>
                    <p><?php echo $this->Html->link($menuvendor['User']['name'], 'http://' . $menuvendor['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/'); ?></p>
                    <?php endforeach; ?>
                    <span class="special"><a href="/users/vendors">Full Vendor List</a></span>
					</div>
				</div>
            </li>

            <li class="mzr-drop">
            	<a href="#">US Traditions<b class="caret"></b></a>
                <div class="mzr-content drop-three-columns popover-content">
					<div class="wide">
                    <?php //foreach($menu_ustraditions as $menu_ustradition) : ?>
                    <!--<li><?php //echo $this->Html->link($menu_ustradition['Ustradition']['name'], array('controller' => 'ustraditions', 'action' => 'view', $menu_ustradition['Ustradition']['slug'])); ?></li>-->
                    <?php //endforeach; ?>
                    <p><a href="/us/amish">Amish</a></p>
                    <p><a href="/us/deep-south ">Deep South </a></p>
                    <p><a href="/us/far-west ">Far West </a></p>
                    <p><a href="/us/great-lakes">Great Lakes</a></p>
                    <p><a href="/us/hawaii">Hawaii</a></p>
                    <p><a href="/us/louisiana">Louisiana</a></p>
                    <p><a href="/us/mid-atlantic">Mid-Atlantic</a></p>
                    <p><a href="/us/midwest">Midwest and Plains </a></p>
                    <p><a href="/us/native-american">Native American</a></p>
                    <p><a href="/us/new-england">New England</a></p>
                    <p><a href="/us/northwest">Pacific Northwest</a></p>
                    <p><a href="/us/southeast">Southeast</a></p>
                    <p><a href="/us/southwest">Southwest</a></p>
                    <p></p>
                    <?php /*?> <span class="special"><a href="/ustraditions">[ The US Map Tool ]</a></span><?php */?>
					</div>
				</div>
            </li>
            <!--<a href="http://www.gourmetdev.com/ustraditions">US Traditions</a>-->
            <?php //echo $this->Html->link('US Markets', array('controller' => 'ustraditions', 'action' => 'index')); ?>
           
            
            
            <li class="mzr-drop"> <a href="#">Int'l Food Traditions<b class="caret"></b></a>
            	<div class="mzr-content drop-three-columns popover-content">
					<div class="wide">
                    <p><a href="/international/africa">Africa </a></p>
                    <p><a href="/international/british-isles">British Isles &amp; Ireland</a></p>
                    <p><a href="/international/china">China and Taiwan</a></p>
                    <p><a href="/international/central-america">Central America</a></p>
                    <p><a href="/international/eastern-europe">Eastern and Central Europe</a></p>
                    <p><a href="/international/japan">Japan</a></p>
                    <p><a href="/international/korea">Korea</a></p>
                    <p><a href="/international/mediterranean-europe">Mediterranean Europe</a></p>
                    <p><a href="/international/mexico">Mexico< /a></p>
                    <p><a href="/international/middle-east">Middle East</a></p>
                    <p><a href="/international/north-america">North America / Canada</a></p>
                    <p><a href="/international/oceania">Oceania</a></p>
                    <p><a href="/international/scandinavia">Scandinavia</a></p>
                    <p><a href="/international/southeast-asia">Southeast Asia</a></p>
                    <p><a href="/international/south-america">South America</a></p>
                    <p><a href="/international/south-asia">South Asia</a></p>
                    <p><a href="/international/the-caribbean">The Caribbean</a></p>
                    <p><a href="/international/western-europe">Western Europe</a></p>
                    <p></p>
                    <?php /*?><span class="special"><a href="/traditions">[ The World Map Tool ]</a></span><?php */?>
                
                <?php //echo $this->Html->link('Int\'l Markets', array('controller' => 'traditions', 'action' => 'index')); ?>
                     </div>
                </div>
            </li>
            
            
            <li class="mzr-drop"> <a href="/recipes">Recipes<b class="caret"></b></a>
				<div class="mzr-content drop-two-columns popover-content">
                	<div class="wide">
						<p><a href="/recipes">All Gourmet Basket Recipes</a></p>
            		</div>
                </div>
            </li>
            
            <!-- For overlay Articles overlay -->
            
            <li class="mzr-drop"> <a href="/magazine" >The Magazine<b class="caret"></b></a>
                <div class="mzr-content drop-two-columns popover-content">
                	<div class="wide">
                    <p class="nav-special"><a href="/articles">The Latest</a></p>
                    <p class="nav-special"><a href="/articles/blogosphere">The Blogosphere</a></p>
                    <hr class="thin tight">
                   <!-- <span class="special nolink">MAGAZINE SECTIONS:</span>-->
                    <p class="special">THE INFO SOURCE:</p>
                    <ul>
                        
                        <?php foreach($menublocks as $menublock) : ?>
                        	<?php $check = $menublock['Block']['id'] ?>
                            
								<?php if($check != 1 ): ?>
                                <li><p>-<a href="http://www.<?php echo Configure::read('Settings.DOMAIN') . '/articles/' . $menublock['Block']['slug']; ?>">
                                <?php echo  $menublock['Block']['name'] ; ?>
                            
                            <?php endif; ?>
                        
                           </a></li>
                    
                    <?php endforeach; ?>
                     </div>
                </div>
            </li>
            
            <?php //echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index')); ?>
            
           <?php /*?> <li class='btn btn-gb'><?php echo $this->Html->link('CART', array( 'controller' => 'shops', 'action' => 'cart')); ?></li>
            <?php */?>
            
             <li class="cart">
                 <a href="/shops/cart">
                 <button class="btn btn-global" type="submit"><i class="icon-shopping-cart icon-white"></i>GO TO CART</button>
                 </a>
             </li>
            
            
        </ul>
</div>
</div>
</div>
