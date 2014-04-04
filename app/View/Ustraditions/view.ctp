
 <div class="row">
 
 <!--Sidebar -->
     <div class="col-md-3 col-sm-3 ">
         
         
          <div id="sidebar-title" class="region">
         <!--<div style="margin-bottom:20px;margin-top:30px;">
             <img style="width:235px" src="/img/us-traditions/labels/<?php //echo ($ustradition['Ustradition']['logo_image']); ?>" />
         </div>-->
         
            <div id="subcat-menu">
                   <div class="region-title">			
                       U.S. REGIONS:
                       <h4><?php echo $ustradition['Ustradition']['name']; ?></h4>
                   </div>
                
            </div>
         </div>	
         <div id="left-sidebar">
                 <div class="summary"> <?php echo $ustradition['Ustradition']['summary']; ?> </div>
                 <a style="font-style:italic" href="/articles/excellent-food-adventures/<?php echo $ustradition['Ustradition']['slug']; ?>">Read more</a>
                 
             
             
             
                 <div class="nav-style-heading large">Other US Traditions</div>
                 <div class="list">
                 <?php foreach ($ustraditions as $ustradition): ?> -
                     <?php echo $this->Html->link($ustradition['Ustradition']['name'], array('controller' => 'ustraditions', 'action' => 'view', 'slug' => $ustradition['Ustradition']['slug'])); ?><br />
                 <?php endforeach; ?>
                 </div>
                 
             </div>
         </div>
         
     
     
   
 
 <!-- Main Content -->
 <div class="col-md-9 col-sm-9">
     <!-- Banner -->
     <div class="awning us-tradition"> 
        
         <?php if (($ustradition['Ustradition']['banner'])) :
                 echo $this->Html->image('/img/us-traditions/banner/'. $ustradition['Ustradition']['banner']);
             else :
                 echo ' <img src="/img/us-traditions/banner/default.png" /> ';
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