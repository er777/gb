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

<?php  $here = $this->params['controller'];
 
 //echo($here);

?>
<div class="row">

<!--Sidebar -->
<div class="col-md-3 col-sm-3 ">
   <div id="sidebar-title" class="recipe">
      <h1 class="category-title">
      All Recipes
      </h14>
      <!--<div style="margin-bottom:20px;margin-top:30px;">
             <img style="width:235px" src="/img/us-traditions/labels/<?php //echo ($ustradition['Ustradition']['logo_image']); ?>" />
         </div>--> 
      
   </div>
   <div id="left-sidebar">
      <h3>Recipe Categories</h3>
      <?php /*?><?php foreach ($recipescategories as $recipescategory): ?> -  
                
           
                <?php echo $this->Html->link($recipescategory['Recipescategory']['name'], array('controller' => 'recipes', 'action' => 'all', 'slug' => $recipescategory['Recipescategory']['slug'])); ?><br />
                 <?php endforeach; ?><?php */?>
      <?php echo $this->Form->input('recipescategories', array('class' => 'selectpicker inline form-control','data-style'=>'btn-primary','options' => $recipescategories, 'label' => false,'empty' => array('all' => 'All Recipes'), 'default' => $recipescategory_selected)); ?>
      <h3>Recipe Vendors</h3>
      <?php echo $this->Form->input('vendors', array('label' => false, 'class' =>'form-control' ,'options' => $vendors, 'empty' => array('all' => 'All Vendors'), 'default' => $vendor_selected)); ?> </div>

	

</div>

<!-- Items -->



<div class="col-md-9">
   <?php /*?><table cellpadding="5" cellspacing="5">
	<tr>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('user_id');?></th>
		<th><?php echo $this->Paginator->sort('recipescategory_name');?></th>
	</tr>
<?php foreach ($recipes as $recipe): ?>
	<tr>
		<td><?php echo $this->Html->link($recipe['Recipe']['name'], array('action' => 'view', 'short_name' => $recipe['User']['slug'], 'slug' => $recipe['Recipe']['slug'])); ?></td>
		<td><?php echo $recipe['User']['name']; ?></td>
		<td><?php echo $recipe['Category']['name']; ?></td>
	</tr>
<?php endforeach; ?>
</table>
<?php */?>


<?php //echo ($vendor_selected); ?>
<?php 
	//debug($vendors);

?>
   
   <!-- Include Recipes element --> 
<?php echo $this->element('recipes'); ?> 

<div class="clearfix">
<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
<?php echo $this->element('pagination-counter'); ?> <?php echo $this->element('pagination'); ?>
</div>


</div>
