<div class="row">

	<div class="span3">
        <span class="vendor-logo">
                <a href="/">
                    <?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' => 'img-polaroid','width' =>'210px')); ?>
                </a>
        </span>
    </div>
        
    <div class="span6 center">  
		<h2 class="gb-heading"><?php echo $user['User']['name']; ?> Recipes</h3>
    </div>
    
</div>



<br />


<div class="row" style="margin-left:25px">

<div class="recipescontainer">
	<?php foreach ($recipes as $recipe): ?>

    
<div class="span3" style="margin-left:10px;">
        
            <div class="content-recipe">
    
               
                
				<?php echo '<a href="http://' . $recipe['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/recipe/' . $recipe['Recipe']['slug'] . '">'; ?>
					<div class="small"><?php echo $recipe['Recipescategory']['name']; ?>
					</div>
                    
                    <div class="content-img">
                        <?php echo $this->Html->image('/img/recipes/image_1/' . $recipe['Recipe']['image_1'] , array('width' => 200, 'height' => 200, 'alt' => $recipe['Recipe']['name'], 'class' => 'img-polaroid')); ?>
                    
                    
						<?php /*?><?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'class' => 'img-polaroid img180')); ?><?php */?>
                    
                        <div class="recipe-name">
                            <?php //echo $recipe['Recipe']['name']; ?>
                        
                        
                            <?php /*?><!--<a href="/product/<?php echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>"> <?php echo $this->Text->truncate($product['Product']['name'], 40, array('ellipsis' => '...', 'exact' => 'false')); ?>
                            </a>--><?php */?>
                        </div>
                        
                    </div>
                    
                   </a> 
                
                  
            </div>
    
        </div>

            <?php endforeach; ?>
    
        </div>

</div>



<br />
<br />

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

SHOW ALL

<br />

