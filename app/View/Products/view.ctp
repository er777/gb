<?php echo $this->Html->script(array('jquery.flexslider-min.js', 'product_view.js'), array('inline' => false)); ?>
<script>
$(document).ready(function() {

	$('.popup-marker').popover({
		html: true,
	});

	$('#pop-trigger').click(function (e) {
		e.stopPropagation();
	});

	$(document).click(function (e) {
		if (($('.popup-marker').has(e.target).length == 0) || $(e.target).is('.close')) {
			$('#pop-trigger').popover('hide');
		}
	});

	$('.modselector').change(function(){
		$('#productprice').html($(this).find(':selected').data('price'));
	});

});
</script>

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

<?php endif ; ?>

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
         <h1 class="vendor-title"><?php echo $user['User']['name']; ?></h1>
         </a>
         <div class="white"><?php echo $user['User']['city']; ?>, <?php echo $user['User']['state']; ?></div>
         <?php endif; ?>
      </div>
      <div id="left-sidebar">
         
         <h3>FOOD TYPES</h3>
         
            <?php if (($user['User']['id']) == 11) : ?>
			
			<div style="overflow-y:scroll;height:300px">
			
			<?php endif ; ?>



         <?php if(!empty($category)) : ?>
         <br />
         <span class="gb-nav"><img src="/img/global/dash-2.png"></span> <?php echo $this->Html->link($category['Category']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'])); ?>
         <?php $cat_crumb = $category['Category']['name']?>
         <?php endif; ?>
         <?php if(!empty($subcategory)) : ?>
         <br />
         <span class="gb-nav"><img src="/img/global/dash-4.png"></span><?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'])); ?>
         <?php $subcat_crumb = $subcategory['Subcategory']['name']?>
         <?php endif; ?>
         <?php if(!empty($subsubcategory)) : ?>
         <br />
         <span class="gb-nav"><img src="/img/global/dash-7.png"></span><?php echo $this->Html->link($subsubcategory['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'], $subsubcategory['Subsubcategory']['slug'])); ?>
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
            <span class="gb-nav"><img src="/img/global/dash-2.png"></span> <?php echo $this->Html->link($usercategory['Category']['name'], array('controller' => 'products', 'action' => 'category', $usercategory['Category']['slug'])); ?><br />
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
			
			<?php endif ; ?>
       

       
         
         </div>
         
         <h3>RELATED FOODS</h3>
		  <?php foreach ($auxcategories as $auxcategory): ?>
	  <span class="gb-nav"><img src="/img/global/dash-2.png"></span> <?php echo $this->Html->link($auxcategory['Category']['name'], array('controller' => 'categories', 'action' => 'view', $auxcategory['Category']['slug'])); ?><br />
		  <?php endforeach; ?>
          

			<?php if(!empty($brands)) : ?>
			
			<?php 
			//print_r($brands);
			//die;
			?>
			
            <?php if (($user['User']['id']) == 11) { ?>
            
			<a class="gb-nav" href="/">All Our Brands</a><br />
			
					
				<div style="overflow-y:scroll;height:300px">
					
			
	
			


			

				<?php foreach ($brands as $brnd): ?> 
			
					<span class="gb-nav"><img src="/img/global/dash-2.png"></span>
					<?php echo $this->Html->link($brnd['Brand']['name'], array('controller' => 'products', 'action' => 'brand', $brnd['Brand']['slug'])); ?><br />

				<?php endforeach; ?>

			<?php if (($user['User']['id']) == 11) { ?>
				</div>
			<?php	}; ?>
            
            <?php	}; ?>


			<?php endif; ?>
			
				
				
		<div style="clear:both"></div>





         <hr />
         <a class="btn btn-gb" href="#" id="story">Our Story</a> 
         
         <!-- Vendor Story -->
         <div id="story_content" style="display:none;color:#000;width:960px;background-color:#fff;padding:20px;"> <span class="b-close btn-gb"><span>X</span></span>
            <div class="row">
               <div class="col-md-4 left-corner-air"> <?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' =>'frame vendor-article-logo')); ?> </div>
               <div class="col-md-6 quote-air">
                  <div class="vendor-special vendor-css">
                     <blockquote> <?php echo $user['User']['shop_quote'] ?>
                        <div class="signature"><?php echo $user['User']['shop_signature'] ?></div>
                     </blockquote>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-8 vendor-block">
                  <div id="vendor-group">
                     <div id="vendor-article"> <?php echo $user['User']['shop_description'] ?> </div>
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
         <div class="btn btn-gb"> <a class="vendor-css" href="/recipes">Our Recipes</a> </div>
         
         <!--<ul class="navList">
						<li><a href="#vendor-unit">Our Regions</a></li>
			</ul>--> 
         
      </div>
      <div>
         <?php $vendor_policy = $user['User']['shipping_policy']; ?>
         <br />
         <a href="#" id="policies" class="btn btn-gb">SHIPPING & CUSTOMER SERVICE</a> </div>
      
      <!-- Element to pop up -->
      <div id="policy_content">
         <div class="policy-heading ">Customer Satisfaction, Shipping and Return Policy</div>
         <hr />
         <div class="pad"> <?php echo ($vendor_policy); ?> </div>
      </div>
      <br />
   </div>
   
   <!-- Main Content -->
   <div class="col-md-9 col-sm-9"> 
      <!-- Banner -->
      <div class="awning">
         <div class="vendor-logo"> <?php echo $this->Html->image('users/image/' . $user['User']['image'], array( 'width' =>'226px')); ?> </div>
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
         <img id="awning1" src="/img/users/awning/half-world-40.png" />
        
      </div>
      
      <div class="row">
      	<div class="top-product-block">
        
            <div class="span9">
               <ul class="breadcrumb btn-gb">
                  <li class="read"><?php echo $this->Html->link($user['User']['name'], '/'); ?> <span class="divider">/</span></li>
                  <li class="read"><a href="http://<?php echo $user['User']['slug'] . '.' . Configure::read('Settings.DOMAIN').'/category/'. $product['Category']['slug']; ?>"><?php echo $product['Category']['name']; ?></a><span class="divider">/</span></li>
                  <li class="read"><a href="http://<?php echo $user['User']['slug'] . '.' . Configure::read('Settings.DOMAIN').'/category/'. $product['Category']['slug'] .'/'. $product['Subcategory']['slug']; ?>"><?php echo $product['Subcategory']['name']; ?></a><span class="divider">/</span></li>
                  <?php if(!empty($subsubcategories)) : ?>
                  <li class="read"><?php echo $this->Html->link($product['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'subsubcategory', 'slug' => $product['Subsubcategory']['id'])); ?> <span class="divider">/</span></li>
                  <?php endif; ?>
                  <li class="read active"><?php echo $product['Product']['name']; ?></li>
               </ul>
            </div>
         </div>
         
         
 <div class="row products">
			 <div class="col-md-5 col-sm-5">
				<div id="slider" class="flexslider">
				<ul class="slides">
					  <?php if(!empty($product['Product']['image'])) : ?>
					  <li><?php echo $this->Html->image('products/image/' .$product['Product']['image']); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_1'])) : ?>
					  <li><?php echo $this->Html->image('products/image_1/' .$product['Product']['image_1']); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_2'])) : ?>
					  <li><?php echo $this->Html->image('products/image_2/' .$product['Product']['image_2']); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_3'])) : ?>
					  <li><?php echo $this->Html->image('products/image_3/' .$product['Product']['image_3']); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_4'])) : ?>
					  <li><?php echo $this->Html->image('products/image_4/' .$product['Product']['image_4']); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_5'])) : ?>
					  <li><?php echo $this->Html->image('products/image_5/' .$product['Product']['image_5']); ?></li>
					  <?php endif ; ?>
				</ul>
				</div>
				<div id="carousel" class="flexslider">
				<ul class="slides">
					  <?php if(!empty($product['Product']['image'])) : ?>
					  <li><?php echo $this->Html->image('products/image/' .$product['Product']['image'], array('class' => 'pic-thumbnail')); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_1'])) : ?>
					  <li><?php echo $this->Html->image('products/image_1/' .$product['Product']['image_1'], array('class' => 'pic-thumbnail')); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_2'])) : ?>
					  <li><?php echo $this->Html->image('products/image_2/' .$product['Product']['image_2'], array('class' => 'pic-thumbnail')); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_3'])) : ?>
					  <li><?php echo $this->Html->image('products/image_3/' .$product['Product']['image_3'], array('class' => 'pic-thumbnail')); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_4'])) : ?>
					  <li><?php echo $this->Html->image('products/image_4/' .$product['Product']['image_4'], array('class' => 'pic-thumbnail')); ?></li>
					  <?php endif ; ?>
	 <?php if(!empty($product['Product']['image_5'])) : ?>
					  <li><?php echo $this->Html->image('products/image_5/' .$product['Product']['image_5'], array('class' => 'pic-thumbnail')); ?></li>
					  <?php endif ; ?>
				</ul>
				</div>
				<?php
						$ingredients = 'unloaded';
						$description = 'unloaded';
						$serv = 'unloaded';
						$recipes = 'unloaded';
						$nutrition = 'unloaded';


						if(!empty($product['Product']['generic_description'])) :
							$description = 'loaded';
						endif;

						if(!empty($product['Product']['serving_suggestions'])) :
							$serv = 'loaded';
						endif;

						if(!empty($product['Product']['recipes'])) :
							$recipes = 'loaded';
						endif;

						if ($nuts) :
							$nutrition = 'loaded';
						endif;

					?>
				<ul class="nav <?php if (($description == 'loaded') || ($serv == 'loaded') || ($recipes == 'loaded') ) : ?>nav-tabs"<?php endif; ?> id="myTab">
				<?php if(!empty($product['Product']['ingredients'])) : ?>
				<li class="active"><a href="#ingredients" data-toggle="tab">Ingredients</a></li>
				<?php $ingredients = 'loaded';
						endif;?>
	 <?php if(!empty($product['Product']['generic_description'])) :
								if ($ingredients == 'loaded') : ?>
				<li><a href="#more" data-toggle="tab">More...</a></li>
				<?php else : ?>
				<li><a href="#more" data-toggle="tab">More...</a></li>
				<?php endif;?>
	 <?php $description = 'loaded';
						endif;?>
	 <?php if(!empty($product['Product']['serving_suggestions'])) :
								if ($description == 'loaded') : ?>
				<li><a href="#serving" data-toggle="tab">Serving Ideas</a></li>
				<?php else : ?>
				<li><a href="#serving" data-toggle="tab">Serving Ideas</a></li>
				<?php endif;?>
	 <?php $serv = 'loaded';
						endif;?>
	 <?php if(!empty($product['Product']['recipes'])) :
								if ($serv == 'loaded' || $description == 'loaded') : ?>
				<li><a href="#recipes" data-toggle="tab">Recipes</a></li>
				<?php else : ?>
				<li><a href="#recipes" data-toggle="tab">Recipes</a></li>
				<?php endif;?>
	 <?php $recipes = 'loaded';
						endif;?>
	 <?php /*?>
	 <?php if(!empty($nuts)) :
							if ($serv == 'loaded' || $description == 'loaded' || $recipes == 'loaded') : ?>
						<li><a href="#nutrition" data-toggle="tab">Nutrition</a></li>
								<?php else : ?>
						<li class="active"><a href="#nutrition" data-toggle="tab">Nutrition</a></li>
								<?php endif;?>
	 <?php $nutrition = 'loaded';
						endif;?>
	 <?php */?>
				</ul>
				<?php
						$value = '';
						$value2 = '';
						$value3 = '';
						$value4 = '';
					?>
				<div class="tab-content">
				<?php if(!empty($product['Product']['ingredients'])) : ?>
				<div class="tab-pane active" id="ingredients">
					  <?php	echo ($product['Product']['ingredients']); ?>
				</div>
				<?php endif; ?>
	 <?php $value = 'active';
									?>
	 <?php if(!empty($product['Product']['generic_description'])) : ?>
				<div class="tab-pane" id="more">
					  <?php	echo ($product['Product']['generic_description']); ?>
				</div>
				<?php endif; ?>
	 <?php //if (($description == 'unloaded') && ($serv == 'loaded')) :
											//$value = 'active';
									//endif; ?>
	 <?php if(!empty($product['Product']['serving_suggestions'])) : ?>
				<div class="tab-pane <?php //echo $value; ?>" id="serving"> <?php echo ($product['Product']['serving_suggestions']) ; ?> </div>
				<?php endif; ?>
	 <?php //if (($description == 'unloaded') && ($serv == 'unloaded') && ($recipes == 'loaded')) :
											//$value2 = 'active';
									//endif; ?>
	 <?php if(!empty($product['Product']['recipes'])) : ?>
				<div class="tab-pane <?php //echo $value2; ?>" id="recipes"> <?php echo $product['Product']['recipes']; ?> </div>
				<?php endif; ?>
	 <?php //if (($description == 'unloaded') && ($serv == 'unloaded') && ($recipes == 'unloaded') &&  ($recipes == 'unloaded') && ($nutrition == 'loaded')) :
										//$value3 = 'active';
									//endif; ?>
	 <?php //if ( !empty($nuts) //&& $product['Product']['vitamin_a_p'] !== ''
						//&& $product['Product']['vitamin_c_p'] !== ''
						//&& $product['Product']['calcium_p'] !== ''
						//&& $product['Product']['iron_p'] !== ''
						//) : ?>
	 <?php //debug($nuts); ?>
				<div class="tab-pane <?php //echo $value3; ?>" id="nutrition" style="display:none">
					  <table class="NutritionFacts">
						 <tr>
							<td><table class="" cellpadding="0" cellspacing="0" width="100%" style="float:left">
								  <tr>
									 <td class="nf_Center nf_PaddingB5 nf_Header" colspan="2">Nutrition Facts</td>
								  </tr>
								  <tr>
									 <td class="nf_BorderT10" colspan="2"><b class="nf_TextSmall nf_Bold">Amount Per Serving</b></td>
								  </tr>
								  <tr>
									 <td class="nf_Right nf_PaddingT5 nf_BorderT5" colspan="2"><b class="nf_TextSmall nf_Bold">% Daily Value*</b></td>
								  </tr>
								  <?php foreach($nuts as $nkey => $nvalue): ?>
	 <?php $nkey = str_replace('_p', '_%', $nkey); ?>
								  <tr>
									 <td class="nf_Cell nf_Text"><?php echo (str_replace('_', ' ', $nkey)); ?> |
										<?php
														if (($nkey == 'vitamin_a'  || $nkey == 'vitamin_c' || $nkey == 'calcium' || $nkey == 'iron' )) {
															echo ('');

															?>
										<div style="display:inline;float:right;">
										<?php

															if ($nkey == 'vitamin_a') {
																echo $product['Product']['vitamin_a_p'];
															}

															if ($nkey == 'vitamin_c') {
																echo $product['Product']['vitamin_c_p'];
															}

															if ($nkey == 'calcium') {
																echo $product['Product']['calcium_p'];
															}

															if ($nkey == 'iron') {
																echo $product['Product']['iron_p'];
															}
														}
														else {
																echo $nvalue . 'g'; ?>
										<div style="display:inline;float:right;">
										<?php } ?>
	 <?php
															//print_r ($nkey);
															//echo 'yes';

															if ($nkey == 'calories') {
																echo $product['Product']['total_fat_p'];
															}

															if ($nkey == 'saturated_fat') {
																echo $product['Product']['saturated_fat_p'];
															}

															if ($nkey == 'sodium') {
																echo $product['Product']['sodium_p'];
															}

															if ($nkey == 'carbs') {
																echo $product['Product']['carbs_p'];
															}

															if ($nkey == 'fiber') {
																echo $product['Product']['fiber_p'];
															}

															if ($nkey == 'sugar') {
																echo $product['Product']['sugar_p'];
															}

															if ($nkey == 'protein') {
																echo $product['Product']['protein_p'];
															}


															?>
										%</div></td>
									 <!--<td class="nf_Cell nf_Right nf_Text">%</td>-->
								  </tr>
								  <?php endforeach;?>
							</table></td>
						 </tr>
					  </table>
				</div>
				<?php //endif; ?>
				</div>
				<?php if(!empty($product['Product']['attribution'])) : ?>
				<h4>Sources:</h4>
				<p><?php echo $product['Product']['attribution']; ?></p>
				<?php endif ?>
			 </div>

			<div class="col-md-6 col-sm-6">

				<div class="purchase-block">
					<div class="product-price">Price: $<span id="productprice"><?php echo $product['Product']['price']; ?></span>
						<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shops', 'action' => 'add'))); ?>
						<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>

						<?php if($product['Product']['stock'] > 0 || $product['Product']['user_id'] != 11): ?>Qty:
							<?php echo $this->Form->input('quantity', array('div' => false, 'class' => 'numeric span1', 'label' => false, 'size' => 2, 'maxlength' => 2, 'value' => 1)); ?>
							<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart',
								array('class' => 'btn btn-inverse', 'escape' => false));?>
						<?php else: ?>
						<?php echo '<span class="btn btn-warning"><i class="icon-exclamation-sign icon-white"></i>Out of Stock</span>';?>
						<?php endif; ?>


					</div>
				</div>

				<div class="product-description">
				<script>
							var load = '<img class="brand" src="/img/brands/image/ ';
						</script>
				<?php if(!empty($product['Brand']['image'])) : ?>
					<?php $load_image = $product['Brand']['image'] ;?>
					<?php else : $load_image = 'default-brand.jpg'; ?>
				<?php endif ;?>
					
				<?php if(!empty($product['Brand']['description'])) : ?>
				<a href="#" id="pop-trigger" class="popup-marker btn btn-gb" rel="pop_brand" data-placement="bottom" data-html="true" data-content="<img class='brand' src='/img/brands/image/<?php echo $load_image;?>'>

					<?php echo ($product['Brand']['description']);?>"><?php echo $product['Brand']['name'];?></a> <span><img class="hand" src="/img/global/hand.png"/></span>
				<?php elseif(empty($product['Brand']['name'])) : ?>
						<a class="btn btn-gb"><?php echo $user['User']['name']; ?></a>
				<?php else : ?>
						<a class="btn btn-gb"><?php echo $product['Brand']['name']; ?></a>
				<?php endif; ?>

				<h2 class="product-name"><?php echo $product['Product']['name']; ?></h2>
				<span class="description"><?php echo $product['Product']['description']; ?></span>
				<?php if(!empty($productmodshtml)):?>
					<div id="productmods">
						<span style="font-weight:bold">Product Options:&nbsp;</span> <?php echo $productmodshtml;?>
						<?php endif;?>
					</div>

				 <?php echo $this->Form->end(); ?>

				<hr style="margin:10px 0;clear:both" />
				<p><?php echo $product['Product']['long_description']; ?></p>

				


				<?php if($product['Product']['user_id'] != 11) : ?>
					<span class="product-label">Shipping Weight: </span><?php echo $product['Product']['shipping_weight']; ?> oz.</span>
				<?php endif; ?>
				<br />
				<br />

				<?php if(!empty($product['Product']['country'])) : ?>
					Origin:&nbsp;<span class="gb-green"><?php echo $product['Product']['country']; ?></span>
				<?php endif; ?>
				<br />
                
                <?php if(!empty($product['Ustradition']['name'])) : ?>
					Food tradition:&nbsp;<span class="gb-green"><?php echo $product['Ustradition']['name']; ?></span>
				<?php endif; ?>
				<br />

				<?php if(!empty($product['Product']['country_manufacture'])) : ?>
				Comes from:&nbsp;<span class="gb-green"><?php echo $product['Product']['country_manufacture']; ?></span>
				<?php endif; ?>
				<br />

				<div class="social-aux" style="margin-top:10px;margin-bottom:5px">
					  <div class="fb-like" data-href="http://gourmetworldmarket.com" data-send="false" data-width="450" data-show-faces="false" data-font="trebuchet ms"></div>
					  <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
					  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					  <a href="https://twitter.com/GourmetWorldMkt" class="twitter-follow-button" data-show-count="false">Follow @GourmetWorldMkt</a>
					  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>

				<?php if(!empty($product['Product']['stock'])) : ?>
					Stock: <?php echo $product['Product']['stock']; ?> <br />
				<br />
				<?php endif; ?>

				<?php if(!empty($user['User']['min_purchase'])) : ?>
				<div class="minimum">Minimum Order from <?php echo $user['User']['name']; ?>: $ <?php echo ($user['User']['min_purchase']); ?></div>
				<?php endif; ?>

				<?php if(!empty($user['User']['mini_shipping_policy'])) : ?>
				<div class="mini-shipping-policy box-gb "><?php echo ($user['User']['mini_shipping_policy']); ?></div>
				<br />
				<?php endif; ?>

				</div>
			 </div>

		  
			 <div class="span9"> <br />
				<div>
				<?php if(!empty($attributes)) : ?>
					<?php foreach($attributes as $akey => $avalue): ?>
						<div class="attr-icon-set">
						<div class="attr-icons"><img src="/img/attributes/<?php echo $akey;?>.jpg" width="50" height="50" /></div>
						<div class="attr-icon-caption"><?php echo str_replace('_', ' ', $akey); ?></div>
					</div>
					<?php endforeach;?>
				<?php endif; ?>
				<br />
				<br />
				<br />

				<?php if(!empty($related_products)) : ?>
					<h2>PAIRINGS & RELATED PRODUCTS</h2>
					<div id="carousel-image-and-text" class="touchcarousel grey-blue">
						<ul class="touchcarousel-container">
							<?php foreach($related_products as $rproduct): ?>
								<?php echo $rproduct['Product']['name']; ?> <br />
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
				

				<img src="http://www.positivessl.com/images-new/PossitiveSSL_tl_trans.gif" alt="SSL Cerficate" title="SSL Certificate" border="0" style="float:right; padding:20px;"/>
				<hr />
				<div class="disclaimer"> Disclaimer: Every effort has been made to ensure the data presented on this page is accurate. It is provided to you for reference only. We assume no liability for inaccuracies,  typographical errors, misinformation, or omission stated or implied or packaging changes. Warning: Please read the actual package before consuming its contents.</div>
				<br />
                </div>

			 </div>
		  </div>
	</div>        
         
         
         
         
      </div>
   </div>
</div>

