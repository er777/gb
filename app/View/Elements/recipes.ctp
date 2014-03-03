
   <?php
			 $i = 0;
			 foreach ($recipes as $recipe):

			 $i++;
			 //if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
			?>
   <div class="col-md-2 col-sm-6"> <!--style="width:22.5%;" -->
      
      <div class="item-recipe"> <!--content-product --> 
         
         <!-- Item image -->
         <div class="item-recipe-image"><!--product-pic--> 
            <!--<a href="single-item.html"><img src="img/photos/2.png" alt="" class="img-responsive" /></a>--> 
            
            <?php echo '<a href="http://' . $recipe['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/recipe/' . $recipe['Recipe']['slug'] . '">'; ?>
            
            <div class="small"><?php echo $recipe['Recipescategory']['name']; ?> </div>
            
            <div class="content-img"> <?php echo $this->Html->image('/img/recipes/image_1/' . $recipe['Recipe']['image_1'] , array('width' => 200, 'height' => 200, 'alt' => $recipe['Recipe']['name'], 'class' => 'img-polaroid')); ?>
            </div>
            
            <div class="recipe-name">
				<?php echo $recipe['Recipe']['name']; ?>
            </div>
            
            
         </div>
      </div>
   </div>
<?php
					if (($i % 6) == 0) { echo "</div>\n\n\t\t<div class=\"row product\">\n\n";}
					endforeach;
?>