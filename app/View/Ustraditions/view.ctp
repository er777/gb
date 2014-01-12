
	<div class="row">
	
	<!--Sidebar -->
		<div class="col-md-3 col-sm-3 hidden-xs">
			
			<!--<div style="margin-bottom:20px;margin-top:30px;">
				<img style="width:235px" src="/img/us-traditions/labels/<?php //echo ($ustradition['Ustradition']['logo_image']); ?>" />
			</div>-->
			
			
			
			<div id="subcat-menu">
				<div class="region-title">			
					<div>U.S. REGIONS:</div>
					<h4><?php echo $ustradition['Ustradition']['name']; ?></h4>
				</div>
			
				<div class="summary"> <?php echo $ustradition['Ustradition']['summary']; ?> </div>
				<a style="font-style:italic" href="/articles/excellent-food-advenures/<?php echo $ustradition['Ustradition']['slug']; ?>">Read more</a>
				
			</div>
			
			<div class="nav-style-heading large">Other US Traditions</div>
			<div class="list">
			<?php foreach ($ustraditions as $tradition): ?> -
				<?php echo $this->Html->link($tradition['Ustradition']['name'], array('controller' => 'ustraditions', 'action' => 'view', 'slug' => $tradition['Ustradition']['slug'])); ?><br />
			<?php endforeach; ?>
			</div>
		</div>
	
	<!-- Main Content -->
	<div class="col-md-9 col-sm-9">
		<!-- Banner -->
		<div class="awning"> 
		   
			<?php if (($ustradition['Ustradition']['awning_image'])) :
					echo $this->Html->image('/img/us-traditions/awning_image/'. $ustradition['Ustradition']['awning_image']);
				else :
					echo ' <img src="/img/us-traditions/awning_image/far-west.jpg" /> ';
				endif;
			?>
		</div>
		
		<!-- Breadcrumb -->
		<ul class="breadcrumb"></ul>
		
		<div class="clearfix"></div>
		
		<div class="row product">
			
			<?php
				$i = 0;
				foreach ($products as $product):
				$i++;
				//if (($i % 15) == 0) { echo "\n<div class=\"row\">\n\n";}
			?>
			
			<div class="col-md-3 col-sm-6"> <!--style="width:22.5%;" -->
			
			
				<div class="item"> <!--content-product -->
				
					<div class="displaygroup"><?php echo $product['Product']['displaygroup']; ?></div>
					<!-- Item image -->
					<div class="item-image"><!--product-pic-->
					  <!--<a href="single-item.html"><img src="img/photos/2.png" alt="" class="img-responsive" /></a>-->
				
					<?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('class' => 'img-responsive','url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'])); ?>
						<div class="product-name">
							<a href="/product/<?php echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>"> <?php echo $this->Text->truncate($product['Product']['name'], 40, array('ellipsis' => '...', 'exact' => 'false')); ?></a>
						</div>
						
					</div>
						
						<!-- Item details -->
                    	<div class="item-details">
                      		<!-- Name -->
                      		<!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
							<!--<div class="blurb"><?php //echo $this->Text->truncate($product['Product']['description'], 55, array('ellipsis' => '...', 'exact' => 'false')); ?>
							<!--<span class="ico"></span>-->
							<!--</div>-->
							
							<div class="clearfix"></div>
							
							<hr />
							
							<!-- Paragraph. Note more than 2 lines. -->
							<div class="vendor"><?php echo $this->Html->link($product['User']['name'], array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'index')); ?>	</div>
							
							<!-- Price -->
							 <div class="price pull-left"><?php echo $product['Product']['price']; ?></div>
							 <!-- Add to cart -->
							 <div class="button pull-right"><a href="#">Add to Cart</a></div>
									
							<!--<div class="price"></div>-->
						
						</div>
						
						
						
					</div>
					
					
				</div>
				
				<?php
					if (($i % 4) == 0) { echo "</div>\n\n\t\t<div class=\"row product\">\n\n";}
					endforeach;
				?>
			
		
			
			
			
			<div class="col-md-9 col-sm-9">
				<?php echo $this->element('pagination-counter'); ?> <?php echo $this->element('pagination'); ?> <br />
			</div>
			
			<br />
			<br />
			
		</div> 
	</div>

</div>