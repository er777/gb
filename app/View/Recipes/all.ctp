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



<div class="row">

	<?php
	$i = 0;
	foreach ($recipes as $recipe):
		
	?>
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
        
            <div class="item-recipe">
            
            	<div class="item-recipe-image">
                
				<?php echo '<a href="http://' . $recipe['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/recipe/' . $recipe['Recipe']['slug'] . '">'; ?>
					<span class="small"><?php echo $recipe['Recipescategory']['name']; ?></span>
                    
                    
                        <?php echo $this->Html->image('/img/recipes/image_1/' . $recipe['Recipe']['image_1'] , array('width' => 200, 'height' => 200, 'alt' => $recipe['Recipe']['name'], )); ?>
                    
                    
						<?php /*?><?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'class' => 'img-polaroid img180')); ?><?php */?>
                    
                        <div class="item-details">
                        
                         <!-- Name -->
            <!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
            <h5><?php echo $recipe['Recipe']['name']; ?></a><!--<span class="ico"><img src="img/hot.png" alt="" /></span>--></h5>
            
            <div class="clearfix"></div>
                        
                        
                            <?php /*?><!--<a href="/product/<?php echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>"> <?php echo $this->Text->truncate($product['Product']['name'], 40, array('ellipsis' => '...', 'exact' => 'false')); ?>
                            </a>--><?php */?>
                        </div>
                        
                    </div>
                    
                   </a> 
                
                  
            </div>
    
        </div>
        
	<?php
	
	endforeach;
	?>
</div>

<br />
<br />

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

SHOW ALL

<br />
