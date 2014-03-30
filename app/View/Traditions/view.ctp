<div class="row">

	<!--Sidebar -->
		<div class="col-md-3 col-sm-3 hidden-xs regions">

		<?php /*?><div style="height:38px;">
			<ul class="navList gb-">
				<li><a href="#">About Each Region</a>
					<!-- This is the sub nav -->
					<ul class="listTab">
					<?php foreach ($countries_list as $key => $value): ?>
						<?php //foreach ($traditions as $trad): ?>
							<li><?php echo $this->Html->link($value, '#' . $value); ?></li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div>
<?php */?>

           <div class="tradition-summary">
           <span class="gb-nav"><?php echo h($tradition['Tradition']['name']); ?>: </span>
               <?php echo ($tradition['Tradition']['summary']); ?>
               <a style="font-style:italic" href="/articles/excellent-food-advenures/<?php echo $tradition['Tradition']['slug']; ?>">Read more</a>
   
           </div>
           <div class="gb-heading">Brands: </div>
           <div class="gb-nav" style="font-size:120%;">
           <?php foreach ($brands as $brandslink): ?>
               <img src="/img/global/dash-2.png">
           <?php echo $this->Html->link($brandslink['Brand']['name'], array('controller' => 'traditions', 'action' => 'view',$fst,'brand',$brandslink['Brand']['slug'])); ?>
            <br />
           <?php endforeach; ?>
           </div>
       </div>
       

<!-- Main Content -->
	<div class="col-md-9 col-sm-9">
		<!-- Banner -->
		<div class="awning tradition">
			<?php if (($tradition['Tradition']['banner'])) :
					echo $this->Html->image('/img/traditions/banner/'. $tradition['Tradition']['banner']);
				else :
					echo ' <img src="/img/traditions/banner/default.png" /> ';
				endif;
			?>

		</div>
		
		<!-- Breadcrumb -->
		<!--<ul class="breadcrumb"></ul>-->
		
		<div class="clearfix"></div>
		
			<?php $product = 0 ?>

			<!-- Include Products element -->
			<?php echo $this->element('products'); ?>


			<?php $more = ($product['User']['more']); ?>

			<?php if($more == 1) : ?>
			<div class="more btn-gb">More products to come!</div>
			<?php endif; ?>
            
			<?php echo $this->element('pagination-counter'); ?>

			<?php echo $this->element('pagination'); ?>


	</div>

</div>