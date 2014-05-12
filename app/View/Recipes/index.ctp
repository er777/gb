<script>
$(document).ready(function() {
	$('#recipescategories').change(function() {
		location.href = 'http://<?php echo Configure::read('Settings.DOMAIN'); ?>/recipes/all/category:' + $(this).val();
	});
	$('#vendors').change(function() {
		location.href = 'http://<?php echo Configure::read('Settings.DOMAIN'); ?>/recipes/all/vendor:' + $(this).val();
	});
});
</script>

<div class="row">

<!--Sidebar -->
<div class="col-md-3 col-sm-3 ">
	 <div id="sidebar-title" class="recipe">
			<h1 class="category-title">Recipes</h1><br />
            
			<!--<div style="margin-bottom:20px;margin-top:30px;">
						 <img style="width:235px" src="/img/us-traditions/labels/<?php //echo ($ustradition['Ustradition']['logo_image']); ?>" />
				 </div>--> 
			
	 </div>
	 
	<div id="left-sidebar">
    
    <?php echo $this->Html->image('users/image/' . $user['User']['image'], array( 'width' =>'100%')); ?>
            <h1 class="category-title"><?php echo $user['User']['name']; ?></h1>
    
    <h3>Recipe Categories</h3>
      <?php /*?><?php foreach ($recipescategories as $recipescategory): ?> -  
                
           
                <?php echo $this->Html->link($recipescategory['Recipescategory']['name'], array('controller' => 'recipes', 'action' => 'all', 'slug' => $recipescategory['Recipescategory']['slug'])); ?><br />
                 <?php endforeach; ?><?php */?>
      <?php echo $this->Form->input('recipescategories', array('class' => 'selectpicker inline form-control','data-style'=>'btn-primary','options' => $recipescategories, 'label' => false,'empty' => array('all' => 'All Recipes'), 'default' => $recipescategory_selected)); ?>
      <h3>Recipe Vendors</h3>
      <?php echo $this->Form->input('vendors', array('label' => false,'class' => 'form-control','options' => $vendors, 'empty' => array('all' => 'All Vendors'), 'default' => $vendor_selected)); ?> 

	</div>

</div>	 
	 <div class="col-md-9"> 
			
			<!-- Banner -->
			<div class="awning">
				 <div class="vendor-logo view"> <?php echo $this->Html->image('users/image/' . $user['User']['image'], array( 'width' =>'226px')); ?> </div>
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
				 <div class="row" id="awning-text-wrapper"> </div>
			</div>
			

	

		 
			<!-- Include Recipes element --> 
			<?php echo $this->element('recipes'); ?> </div>
</div>
<br />
<br />
<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
<?php echo $this->element('pagination-counter'); ?>
<?php echo $this->element('pagination'); ?> <br />
