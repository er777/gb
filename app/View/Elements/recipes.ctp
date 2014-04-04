<?php
	$i = 0;
	foreach ($recipes as $recipe):


	   //if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
?>
   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"> <!--style="width:22.5%;" -->
      
      <div class="item-recipe"> <!--content-product --> 
         
            <!--<a href="single-item.html"><img src="img/photos/2.png" alt="" class="img-responsive" /></a>--> 
         
            
            <div class="recipe-category"><?php echo $recipe['Recipescategory']['name']; ?>
            </div>
            
         <!-- Item image -->
         <div class="item-recipe-image"><!--product-pic--> 
         
         	<?php $recipeLink = 'http://' . $recipe['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/recipe/' . $recipe['Recipe']['slug'] .'">'; ?>
            
             <?php echo ' <a href=" ' . $recipeLink ; ?> 
            
                <?php echo $this->Html->image('/img/recipes/image_1/' . $recipe['Recipe']['image_1'] , array('width' => 200, 'height' => 200, 'alt' => $recipe['Recipe']['name'])); ?>
               
            <?php echo '</a>';?>
           </div>
           
           
            <div class="recipe-card">
				<div class="recipe-name">
				<?php echo '<a href=" ' .$recipeLink ;?>
					<?php echo $this->Text->truncate($recipe['Recipe']['name'], 47, array('ellipsis' => '...', 'exact' => 'false')); ?>
                <?php echo '</a>';?>
                
                
            	</div>
            </div>
            
            
         </div>
         <div class="vendor">
         <?php echo $recipe['User']['name']; ?>
         </div>
      
   </div>
<?php
					
					endforeach;
?>