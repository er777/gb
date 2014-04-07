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


<script>
	$('#story_content').bPopup({
            modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed' //'fixed' or 'absolute'
        });
                </script>



<?php
	$cat_crumb ="";
	$subcat_crumb ="";
	$subsubcat_crumb ="";
?>

<div class="row">

	<!--Sidebar -->
	<div class="col-md-3 col-sm-3" >
    
       <div id="sidebar-title" class="vendor-css">
   
              <?php if(!empty($user)) : ?>
             <a href="/"> 
   
               <h1 class="vendor-title"><?php echo $user['User']['name']; ?></h1></a>
               <div class="white"><?php echo $user['User']['city']; ?>, <?php echo $user['User']['state']; ?></div>
   
              
           <?php endif; ?>
       </div>
 
    	<div id="left-sidebar">   
        

       
           <a class="gwm-nav" href="/">ALL OUR PRODUCTS</a>
           
			<?php if (($user['User']['id']) == 11) : ?>
			
			<div style="overflow-y:scroll;height:300px">
			
			<?php endif; ?>


   
   
           <?php if(!empty($category)) : ?><br /><span class="gwm-nav"><img src="/img/global/dash-2.png"></span>
   
               <?php echo $this->Html->link($category['Category']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'])); ?>
   
               <?php $cat_crumb = $category['Category']['name']?>
   
   
           <?php endif; ?>
   
           <?php if(!empty($subcategory)) : ?>
               <br /><span class="gwm-nav"><img src="/img/global/dash-4.png"></span><?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'])); ?>
   
               <?php $subcat_crumb = $subcategory['Subcategory']['name']?>
   
           <?php endif; ?>
   
           <?php if(!empty($subsubcategory)) : ?>
               <br /><span class="gwm-nav"><img src="/img/global/dash-7.png"></span><?php echo $this->Html->link($subsubcategory['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'], $subsubcategory['Subsubcategory']['slug'])); ?>
   
               <?php $subsubcat_crumb = $subsubcategory['Subsubcategory']['name']?>
   
           <?php endif; ?>
   
   
           <div style="clear:both">
   
               <!-- Sub Sub Category Loop -->
   
               <?php if(!empty($subsubcategories)) : ?>
   
               <?php foreach ($subsubcategories as $subsubcategory): ?>
   
                   <?php if ($subsubcat_crumb !== $subsubcategory['Subsubcategory']['name']) : ?>
   
   
                       <span class="gwm-nav"><img src="/img/global/dash-7.png"></span><?php echo $this->Html->link($subsubcategory['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'category', $subsubcategory['Category']['slug'], $subsubcategory['Subcategory']['slug'], $subsubcategory['Subsubcategory']['slug'])); ?><br />
   
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
   
                           <span class="gwm-nav"><img src="/img/global/dash-4.png"></span><?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'])); ?><br />
   
                       <?php //if(!empty($subcat_crumb)) : ?>
                           <?php endif; ?>
                       <?php //endif; ?>
   
   
               <?php endforeach; ?>
   
           <?php endif; ?>
   
   
               <!-- Category Loop -->
   
               <?php if(!empty($usercategories)) : ?>
   
                   <?php foreach ($usercategories as $usercategory): ?>
                   <span class="gwm-nav"><img src="/img/global/dash-2.png"></span>
   
   
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
			//debug($brands);
			//die;
			?>
            
            
            <?php
          //  debug ($brands['Brand'][3])
            ?>
            
            <?php if(isset($brands['brand'][1]))
        {
        //Code here
		?><?php
        }
           ?> 
            
    
			<?php if (($user['User']['id']) == 11) : ?>



			<a class="gwm-nav" href="/">All Our Brands</a>			
					
				<div style="overflow-y:scroll;height:150px">
					
			

				<?php foreach ($brands as $brnd): ?> 
			
					<span class="gwm-nav"><img src="/img/global/dash-2.png"></span>
					<?php echo $this->Html->link($brnd['Brand']['name'], array('controller' => 'products', 'action' => 'brand', $brnd['Brand']['slug'])); ?><br />

				<?php endforeach; ?>

				</div>
                
                <hr />

			<?php endif; ?>
			
				
				
		<div style="clear:both"></div>
    
    

    
 	 
    
			<a class="btn btn-gb" href="#" id="story">Our Story</a>
			

			<!-- Vendor Story -->
   <!-- Include Vendor Story element --> 
	<?php echo $this->element('vendor-story'); ?>
   
	
			

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
							echo $this->Html->image('users/image_1/' . $user['User']['image_1'], array('class' => 'img-border'));
						endif ?>

				<?php if(!empty($user['User']['image_2'])) :
							echo $this->Html->image('users/image_2/' . $user['User']['image_2'], array('class' => 'img-border'));
						endif ?>
	
	
	
				<?php endif; ?>
			</div>
	
</div>


	
	
		<!-- Main Content -->
	<div class="col-md-9 col-sm-9">
		<div class="row">
	
		<!-- Banner -->
		<div class="awning">
			<div class="vendor-logo">
				<?php echo $this->Html->image('users/image/' . $user['User']['image'], array( 'width' =>'100%','class='=>'img-responsive')); ?>
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
			</div>	
	
			
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
					<div class="col-md-9 pagination-block">
	
						<!--<span class="pagination-counter"<?php //echo $this->element('pagination-counter'); ?></span>-->
						<?php echo $this->element('pagination'); ?>
	
					</div>
				</div>
	
			
	
	
		
		</div>
	
		</div>
		
		</div>
	
	</div>