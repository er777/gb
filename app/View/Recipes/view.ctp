<div class="row">
	<div class="span3">
 <div class="vendor-logo">
    <a href="/">
    	<?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' => 'img-polaroid','width' =>'210px')); ?>
    </a>
</div>
   
  
    <h3 class="gb-heading">Our Recipes</h3>
    <hr class="recipe-divider" />
 
		
		<?php
			
			foreach($recipelist as $recipekey)
			{
				echo '<div class="recipe-button ">';
				echo '<a class="" href="http://' . $recipekey['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/recipe/' . $recipekey['Recipe']['slug'] . '">';
				echo $recipekey['Recipe']['name'];
				echo '</a>';
				echo "</div>";
			}
		?>
	</div>

	<div class="span6">
		<h2 class="gb-heading"><?php echo $recipe['Recipe']['name']; ?></h2>
        <hr class="recipe-divider" />
		<!-- <? //echo $recipe['Recipe']['slug']?>-1.jpg"  /> -->
		<span class="recipe-description"> <?php echo $recipe['Recipe']['description']; ?> </span>
		<p class="gb-heading">Ingredients</p>
		
			<?php echo $recipe['Recipe']['ingredients']; ?>
		<br />
		<p class="gb-heading">Directions</p>
		<p><?php echo $recipe['Recipe']['preparation']; ?></p>
		<br />
        
        <?php if(!empty($recipe['Recipe']['comment'])) : ?>
			<p class="gb-heading">Comments</p>
        	<p><?php echo $recipe['Recipe']['comment']; ?></p>
			<br />
        <?php endif ; ?>
        
         <?php if(!empty($recipe['Recipe']['tags'])) : ?>
        	<p class="gb-heading">Tags</p>
         	<p><?php echo $recipe['Recipe']['tags']; ?></p>
        	<br />
         <?php endif ; ?>  
            
         <?php if(!empty($recipe['Recipe']['attribution'])) : ?>
			<p class="gb-heading">Acknowledgements</p>
			<p><?php echo $recipe['Recipe']['attribution']; ?></p>
          <?php endif ; ?>    
            
	</div>

	<div class="span3">
		<img class="recipe-pic" src="/img/recipes/image_1/<? echo $recipe['Recipe']['image_1']?>"  />
		<br />
		<br />
		<?php if(!empty($recipe['Recipe']['image_2'])) : ?>
			<img class="recipe-pic border" src="/img/recipes/image_2/<? echo $recipe['Recipe']['image_2'] ?>" />
		<?php endif ; ?>
		<!--<?php //echo $this->Html->image('/img/recipes/thumb-' . $recipe['Recipe']['slug'] . '-2.jpg'); ?>-->
		<br />
		<?php if(!empty($recipe['Recipe']['image_3'])) : ?>
			<img class="recipe-pic border" src="/img/recipes/image_3/<? echo $recipe['Recipe']['image_3']?>"  />
		<?php endif ; ?>
		<br />
		
	</div>

</div>

