<h2 class="gb-heading">All Gourmet World Recipes</h2>


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



<!-- Items -->

<div class="items">
   <div class="container">
   
      <div class="row">
         <div class="col-md-12">
        	<h3>Recipe Categories</h3>
         	<?php echo $this->Form->input('recipescategories', array('class' => 'selectpicker inline','data-style'=>'btn-primary','options' => $recipescategories, 'label' => false,'empty' => array('all' => 'All Recipes'), 'default' => $recipescategory_selected)); ?>
         
         
         	<h3>Recipe Vendors</h3>
         	<?php echo $this->Form->input('vendors', array('label' => false,'options' => $vendors, 'empty' => array('all' => 'All Vendors'), 'default' => $vendor_selected)); ?>
         </div>
       </div>
   
 
   
</div>



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


<br />



<div class="row product">

	   <!-- Include Recipes element --> 
   <?php echo $this->element('recipes'); ?>

    
    
</div>

<br />
<br />

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

SHOW ALL

<br />
