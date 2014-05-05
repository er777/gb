
 <div class="row">
 
 <!--Sidebar -->
     <div class="col-md-3 col-sm-3 ">
         
         
          <div id="sidebar-title" class="region">
         <!--<div style="margin-bottom:20px;margin-top:30px;">
             <img style="width:235px" src="/img/us-traditions/labels/<?php //echo ($ustradition['Ustradition']['logo_image']); ?>" />
         </div>-->
         
            <div id="subcat-menu">
                   <div class="region-title">			
                       INT'L REGIONS:
                       <h4><?php echo $tradition['Tradition']['name']; ?></h4>
                   </div>
                
            </div>
         </div>	
         <div id="left-sidebar">
                 <div class="summary"> <?php echo $tradition['Tradition']['summary']; ?> </div>
                 <a style="font-style:italic" href="/articles/excellent-food-advenures/<?php echo $tradition['Tradition']['slug']; ?>">Read more</a>
                 
             
             
             
                 <div class="nav-style-heading large">Other Intl Traditions</div><?php echo ($tradition['Tradition']['banner']); ?>
                 <div class="list">
                 <?php foreach ($traditions as $region): ?> -
                     <?php echo $this->Html->link($region['Tradition']['name'], array('controller' => 'traditions', 'action' => 'view', 'slug' => $region['Tradition']['slug'])); ?><br />
                 <?php endforeach; ?>
                 </div>
                 
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