
	<div class="row">
	
	<!--Sidebar -->
		<div class="col-md-3 col-sm-3 hidden-xs">
			
			<!--<div style="margin-bottom:20px;margin-top:30px;">
				<img style="width:235px" src="/img/us-traditions/labels/<?php //echo ($tradition['Tradition']['logo_image']); ?>" />
			</div>-->
			
			
			
			<div id="subcat-menu">
				<div class="region-title">			
					<div><p>INTERNATIONAL REGIONS:</p></div>
					<h4><?php echo $tradition['Tradition']['name']; ?></h4>
				</div>
			
				<div class="summary"> <?php echo $tradition['Tradition']['summary']; ?> </div>
				<a style="font-style:italic" href="/articles/excellent-food-advenures/<?php echo $tradition['Tradition']['slug']; ?>">Read more</a>
				
			</div>
			
			<div class="nav-style-heading large">Other US Traditions</div>
			<div class="list">
			<?php foreach ($traditions as $tradition): ?> -
				<?php echo $this->Html->link($tradition['Tradition']['name'], array('controller' => 'Traditions', 'action' => 'view', 'slug' => $tradition['Tradition']['slug'])); ?><br />
			<?php endforeach; ?>
			</div>
		</div>
	
	<!-- Main Content -->
	<div class="col-md-9 col-sm-9">
		<!-- Banner -->
		<div class="awning"> 
		   
			<?php if (($tradition['Tradition']['awning_image'])) :
					echo $this->Html->image('/img/traditions/awning_image/'. $tradition['Tradition']['awning_image']);
				else :
					echo ' <img src="/img/traditions/placeholder.jpg" /> ';
				endif;
			?>
		</div>
		
		<!-- Breadcrumb -->
		<ul class="breadcrumb"></ul>
		
		<div class="clearfix"></div>
		
			<?php $product = 0 ?>

			<!-- Include Products element -->
			<?php echo $this->element('products'); ?>


			<?php $more = ($product['User']['more']); ?>

			<?php if($more == 1) : ?>
			<div class="more btn-gb">More products to come!</div>
			<?php endif; ?>

	</div>

</div>