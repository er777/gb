<style type="text/css">
	.navList li a {
		<?php //echo $user['User']['awning_css']; ?>
	}
	.navList li ul.listTab li a, .navList li ul.listTab li {
		background-color:#fff;
	}
</style>

<?php if(!empty($user)) : ?>

<style type="text/css">
	.vendor-css {
		<?php echo $user['User']['awning_css']; ?>
	}
</style>

<?php
	$cat_crumb ="";
	$subcat_crumb ="";
	$subsubcat_crumb ="";
?>

<div class="row">

	<!--Sidebar -->
	<div class="col-md-3 col-sm-3 hidden-xs">
    
       <div id="sidebar-title" class="vendor-css">
   
              <?php if(!empty($user)) : ?>
             <a href="/"> 
   
               <h1 class="vendor-title"><?php echo $user['User']['name']; ?></h1></a>
               <div class="white"><?php echo $user['User']['city']; ?>, <?php echo $user['User']['state']; ?></div>
   
              
           <?php endif; ?>
       </div>
 
    	<div id="left-sidebar">   
        
        	
   
       <hr />
       
           <a class="gb-nav" href="/">All Our Products</a>
           
			<?php if (($user['User']['id']) == 11) : ?>
			
			<div style="overflow-y:scroll;height:300px">
			
			<?php endif; ?>


   
   
           <?php if(!empty($category)) : ?><br /><span class="gb-nav"><img src="/img/global/dash-2.png"></span>
   
               <?php echo $this->Html->link($category['Category']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'])); ?>
   
               <?php $cat_crumb = $category['Category']['name']?>
   
   
           <?php endif; ?>
   
           <?php if(!empty($subcategory)) : ?>
               <br /><span class="gb-nav"><img src="/img/global/dash-4.png"></span><?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'])); ?>
   
               <?php $subcat_crumb = $subcategory['Subcategory']['name']?>
   
           <?php endif; ?>
   
           <?php if(!empty($subsubcategory)) : ?>
               <br /><span class="gb-nav"><img src="/img/global/dash-7.png"></span><?php echo $this->Html->link($subsubcategory['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'], $subsubcategory['Subsubcategory']['slug'])); ?>
   
               <?php $subsubcat_crumb = $subsubcategory['Subsubcategory']['name']?>
   
           <?php endif; ?>
   
   
           <div style="clear:both">
   
               <!-- Sub Sub Category Loop -->
   
               <?php if(!empty($subsubcategories)) : ?>
   
               <?php foreach ($subsubcategories as $subsubcategory): ?>
   
                   <?php if ($subsubcat_crumb !== $subsubcategory['Subsubcategory']['name']) : ?>
   
   
                       <span class="gb-nav"><img src="/img/global/dash-7.png"></span><?php echo $this->Html->link($subsubcategory['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'category', $subsubcategory['Category']['slug'], $subsubcategory['Subcategory']['slug'], $subsubcategory['Subsubcategory']['slug'])); ?><br />
   
                  <?php endif ; ?>
   
               <?php endforeach; ?>
           <?php endif; ?>
   
   
   
               <!-- Sub Category Loop -->
   
           <?php if(!empty($subcategories)) : ?>
   
               <?php foreach ($subcategories as $subcategory): ?>
   
                   <?php //echo 'subcat_crumb:' . ($subcat_crumb)  .  '----subcategory:' . ($subcategory['Subcategory']['name']) .'<br />';?>
   
                       <?php //if(!empty($subcat_crumb)) : ?>
                           <?php if ($subcat_crumb !== $subcategory['Subcategory']['name']) : ?>
                       <?php //endif; ?>
   
                           <span class="gb-nav"><img src="/img/global/dash-4.png"></span><?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'])); ?><br />
   
                       <?php //if(!empty($subcat_crumb)) : ?>
                           <?php endif; ?>
                       <?php //endif; ?>
   
   
               <?php endforeach; ?>
   
           <?php endif; ?>
   
   
               <!-- Category Loop -->
   
               <?php if(!empty($usercategories)) : ?>
   
                   <?php foreach ($usercategories as $usercategory): ?>
                   <span class="gb-nav"><img src="/img/global/dash-2.png"></span>
   
   
                   <?php echo $this->Html->link($usercategory['Category']['name'], array('controller' => 'products', 'action' => 'category', $usercategory['Category']['slug'])); ?><br />
   
                   <?php endforeach; ?>
   
               <?php endif; ?>
   
               <?php /*?><?php
                   $count = 1;
                   foreach ($brands as $brand):
                       echo $product['Brands']['name'];
                       echo($count) . '<br />';
                       $count++;
                   endforeach; ?>
       <?php */?>
                  


			<?php if (($user['User']['id']) == 11) : ?>
			
			</div>
			
			<?php endif; ?>
                  
                  
                  
                  
                   </div>
                   
                  
       
	<hr />
			<?php 
			//print_r($brands);
			//die;
			?>
    
			<?php if(!empty($brands)) : ?>
			
		


			<a class="gb-nav" href="/">All Our Brands</a><br />
			
					
				<div style="overflow-y:scroll;height:150px">
					
			

				<?php foreach ($brands as $brnd): ?> 
			
					<span class="gb-nav"><img src="/img/global/dash-2.png"></span>
					<?php echo $this->Html->link($brnd['Brand']['name'], array('controller' => 'products', 'action' => 'brand', $brnd['Brand']['slug'])); ?><br />

				<?php endforeach; ?>

				</div>
                
                

			<?php endif; ?>
			
				
				
		<div style="clear:both"></div>
    
    
    <hr />
    
 	 
    
			<a class="btn btn-gb" href="#" id="story">Our Story</a>
			

			<!-- Vendor Story -->
			<div id="story_content" style="display:none;color:#000;width:960px;background-color:#fff;padding:20px;">
				<span class="b-close btn-gb"><span>X</span></span>
	
				<div class="row">
					<div class="col-md-4 left-corner-air">
						<?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' =>'frame vendor-article-logo')); ?>
					</div>
	
					<div class="col-md-6 quote-air">
	
							<div class="vendor-special vendor-css">
								<blockquote>
									<?php echo $user['User']['shop_quote'] ?>
	
									<div class="signature"><?php echo $user['User']['shop_signature'] ?></div>
								</blockquote>
							</div>
	
					</div>
                    
                    
                    
                    
                    
                    
				</div>
	
				<div class="row">
	
					<div class="col-md-8 vendor-block">
	
						<div id="vendor-group">
	
							<div id="vendor-article">
								<?php echo $user['User']['shop_description'] ?>
							</div>
	
	
						</div>
	
					</div>
                    
                    
                    
			<!-- Vendor Story Pics -->
					<div class="col-md-4">
	
						<div class="air">
						<?php if(!empty($user['User']['image_1'])) : echo $this->Html->image('users/image_1/' . $user['User']['image_1'], array('class' =>'vendor-pic')); ?>
						<div class="attr"><?php echo $user['User']['attr_1']; ?></div>
						<div class="title"><?php echo $user['User']['pic_title_1']; ?></div>
						<?php endif ?>
						</div>
	
						<div class="air">
						<?php if(!empty($user['User']['image_2'])) : echo $this->Html->image('users/image_2/' . $user['User']['image_2'], array('class' =>'vendor-pic')); ?>
						<div class="attr"><?php echo $user['User']['attr_2']; ?></div>
						<div class="title"><?php echo $user['User']['pic_title_2']; ?></div>
						<?php endif ?>
						</div>
	
						<div class="air">
						<?php if(!empty($user['User']['image_3'])) : echo $this->Html->image('users/image_3/' . $user['User']['image_3'], array('class' =>'vendor-pic')); ?>
						<div class="attr"><?php echo $user['User']['attr_3']; ?></div>
						<div class="title"><?php echo $user['User']['pic_title_3']; ?></div>
						<?php endif ?>
						</div>
	
						<div class="air">
						<?php if(!empty($user['User']['image_4'])) : echo $this->Html->image('users/image_4/' . $user['User']['image_4'], array('class' =>'vendor-pic')); ?>
						<div class="attr"><?php echo $user['User']['attr_4']; ?></div>
						<div class="title"><?php echo $user['User']['pic_title_4']; ?></div>
						<?php endif ?>
						</div>
	
						<div class="air">
						<?php if(!empty($user['User']['image_5'])) : echo $this->Html->image('users/image_5/' . $user['User']['image_5'], array('class' =>'vendor-pic'));  ?>
						<div class="attr"><?php echo $user['User']['attr_5']; ?></div>
						<div class="title"><?php echo $user['User']['pic_title_5']; ?></div>
						<?php endif ?>
						</div>
	
						<div class="air">
						<?php if(!empty($user['User']['image_6'])) : echo $this->Html->image('users/image_6/' . $user['User']['image_6'], array('class' =>'vendor-pic')); ?>
						<div class="attr"><?php echo $user['User']['attr_6']; ?></div>
						<div class="title"><?php echo $user['User']['pic_title_6']; ?></div>
						<?php endif ?>
						</div>
	
					</div>
                    
                    
                    
                    
                    
                    
	
    			</div>
	
	
	
				</div>
	
			

			<div class="btn btn-gb">
				<a class="vendor-css" href="/recipes">Our Recipes</a>
			</div>

			<!--<ul class="navList">
						<li><a href="#vendor-unit">Our Regions</a></li>
			</ul>-->

			</div>

			<div>
				<?php $vendor_policy = $user['User']['shipping_policy']; ?>
				<br />

				<a href="#" id="policies" class="btn btn-gb">SHIPPING & CUSTOMER SERVICE</a>

			</div>

			<!-- Element to pop up -->
			<div id="policy_content">
			<div class="policy-heading ">Customer Satisfaction, Shipping and Return Policy</div>
			 <hr />
				<div class="pad">
				<?php echo ($vendor_policy); ?>
				</div>
			</div>
			<br />


			<!-- Vendor Sidebar Pics -->

			<div class="vendor-sidebar-pics">

				<?php if(!empty($user['User']['image_1'])) :
							echo $this->Html->image('users/image_1/' . $user['User']['image_1'], array('class' => 'img-polaroid'));
						endif ?>

				<?php if(!empty($user['User']['image_2'])) :
							echo $this->Html->image('users/image_2/' . $user['User']['image_2'], array('class' => 'img-polaroid'));
						endif ?>
	
	
	
				<?php endif; ?>
			</div>
	
</div>


	
	
		<!-- Main Content -->
	<div class="col-md-9 col-sm-9">
		<!-- Banner -->
		<div class="awning">
			<div class="vendor-logo">
				<?php echo $this->Html->image('users/image/' . $user['User']['image'], array( 'width' =>'226px')); ?>
			</div>
				<!--<div id="div1">
					<div id="div2">
				<?php //echo $this->Html->image('users/image/'. $user['User']['image']); ?>
					</div>​
				</div>
	-->
				<style>
				#awning1 {
					<?php echo $user['User']['awning_css']; ?>
				}
				</style>
	
				<img id="awning1" src="/img/users/awning/default.png" />
	
				<div class="row" id="awning-text-wrapper">
	
					<div id="awning-text"><?php echo $user['User']['shop_quote']; ?></div>
	
				</div>
	
			<div class="top-product-block">
	
			
				<div class="section-subheading vendor-category">
	
				<!--Breadcrumbs -->
				<?php if(!empty($subsubcat_crumb)) : ?>
					<?php echo ($subsubcat_crumb); ?>
	
				<?php elseif (!empty($subcat_crumb)) : ?>
					<?php echo ($subcat_crumb); ?>
	
				<?php elseif (!empty($cat_crumb)) : ?>
					<?php echo ($cat_crumb); ?>
				<?php endif; ?>
	
	
				</div>
				
				<?php $product = 0 ?>
	
				<!-- Include Products element -->
				<?php echo $this->element('products'); ?>
	
	
				<?php $more = ($product['User']['more']); ?>
	
				<?php if($more == 1) : ?>
				<div class="more btn-gb">More products to come!</div>
				<?php endif; ?>
	
				<div style="clear:both" id="vendor-unit"></div>
	
				<div class="row">
					<div class="col-md-12 pagination-block">
	
						<!--<span class="pagination-counter"<?php //echo $this->element('pagination-counter'); ?></span>-->
						<?php echo $this->element('pagination'); ?>
	
					</div>
				</div>
	
			</div>
	
		</div>
	
		</div>
		
		</div>
	
	</div>