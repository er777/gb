<div class="row">
	<div class="span3">
 <div class="vendor-logo">
    <a href="/">
    	<?php echo $this->Html->image('users/image/' . $user['User']['image'], array('width' =>'210px')); ?>
    </a>
</div>
  
  
    <h3 class="gb-heading center">
    <?php echo $user['User']['name']; ?></h3>
    
    <div class="section-subheading">Our Recipes</div>
    
    <hr class="recipe-divider" />
 
		<?php
			
			foreach($recipelist as $recipekey)
			{
				echo '<div class="recipe-button ">-&nbsp;';
				echo '<a class="" href="http://' . $recipekey['User']['slug'] . '.' . Configure::read('Settings.DOMAIN') . '/recipe/' . $recipekey['Recipe']['slug'] . '">';
				echo $recipekey['Recipe']['name'];
				echo '</a>';
				echo "</div>";
			}
		?>
	</div>

	<div class="span6">
		<h2 class="gb-heading recipes-heading"><?php echo $recipe['Recipe']['name']; ?></h2>
        <hr class="recipe-divider" />
		<? //echo $recipe['Recipe']['slug']?>
		<p><?php echo $recipe['Recipe']['description']; ?> </p>
		<p class="section-subheading recipes-heading">Ingredients</p>
		
			<?php echo $recipe['Recipe']['ingredients']; ?>
		
		<p class="section-subheading recipes-heading">Directions</p>
		<p><?php echo $recipe['Recipe']['preparation']; ?></p>
		
        
        <?php if(!empty($recipe['Recipe']['comment'])) : ?>
			<p class="section-subheading recipes-heading">Comments</p>
        	<p><?php echo $recipe['Recipe']['comment']; ?></p>
			
        <?php endif ; ?>
        
         <?php /*?><?php if(!empty($recipe['Recipe']['tags'])) : ?>
        	<p class="section-subheading recipes-heading">Tags</p>
         	<p><?php echo $recipe['Recipe']['tags']; ?></p>
        	<br />
         <?php endif ; ?>  <?php */?>
            
         <?php if(!empty($recipe['Recipe']['attribution'])) : ?>
			<p class="section-subheading recipes-heading">Acknowledgements</p>
			<p><?php echo $recipe['Recipe']['attribution']; ?></p>
          <?php endif ; ?>    
            
	</div>

	<div class="span3 recipe-pic-block">
		<img class="recipe-pic" src="/img/recipes/image_1/<?php echo $recipe['Recipe']['image_1']?>"  />
        
        <?php if(!empty($recipe['Recipe']['attr_1'])) : ?>
        	<div class="photo-attr">
				<span><?php echo $recipe['Recipe']['attr_1']?></span>
			</div>
        <?php endif ; ?>
		<br /><br />
        
		<?php if(!empty($recipe['Recipe']['image_2'])) : ?>
			<img class="recipe-pic border" src="/img/recipes/image_2/<?php echo $recipe['Recipe']['image_2'] ?>" />
            <?php if(!empty($recipe['Recipe']['attr_2'])) : ?>
            <div class="photo-attr">
				<span><?php echo $recipe['Recipe']['attr_2']?></span>
			</div>
             <?php endif ; ?>
		<?php endif ; ?>
		<br /><br />
		
		<?php if(!empty($recipe['Recipe']['image_3'])) : ?>
			<img class="recipe-pic border" src="/img/recipes/image_3/<?php echo $recipe['Recipe']['image_3'] ?>" />
            <?php if(!empty($recipe['Recipe']['attr_3'])) : ?>
            <div class="photo-attr">
				<span><?php echo $recipe['Recipe']['attr_3']?></span>
			</div>
             <?php endif ; ?>
		<?php endif ; ?>
		<br />

		<?php if(!empty($recipe['Recipe']['image_4'])) : ?>
			<img class="recipe-pic border" src="/img/recipes/image_4/<?php echo $recipe['Recipe']['image_4'] ?>" />
            <?php if(!empty($recipe['Recipe']['attr_4'])) : ?>
            <div class="photo-attr">
				<span><?php echo $recipe['Recipe']['attr_4']?></span>
			</div>
             <?php endif ; ?>
		<?php endif ; ?>
		<br />

		<?php if(!empty($recipe['Recipe']['image_5'])) : ?>
			<img class="recipe-pic border" src="/img/recipes/image_5/<?php echo $recipe['Recipe']['image_5'] ?>" />
            <?php if(!empty($recipe['Recipe']['attr_5'])) : ?>
            <div class="photo-attr">
				<span><?php echo $recipe['Recipe']['attr_5']?></span>
			</div>
             <?php endif ; ?>
		<?php endif ; ?>
		<br />

	
		
	</div>

</div>

