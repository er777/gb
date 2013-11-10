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

<div id="pantry-container-2">
	<!--<div id="left-door-inside"></div>
	<div id="left-door-outside"></div>


	<div id="right-door-inside"></div>
	<div id="right-door-outside"></div>-->

	<div class="well-stocked-pantry">All Recipes</div>

	<div class="row pantry-row">

	<?php
	$i = 0;
	foreach ($categories as $category):
	$i++;
	?>
		<div class="span2 category-product ">
			<?php echo $this->Html->image('categories/image/' . $category['Category']['image'], array('class' => 'img-pantry', 'url' => array('controller' => 'categories', 'action' => 'view', $category['Category']['slug']))); ?><br />
			<div class="cat-name"><?php echo $this->Html->link($category['Category']['name'], array('action' => 'view', $category['Category']['slug'])); ?></div>
			<br />
		</div>

	<?php if (($i % 6) == 0) : ?>
	</div>
	<div class="row pantry-row">
	<?php endif; ?>

	<?php endforeach; ?>
    
    
    
    
    
    
    
    
<?php echo $this->Form->input('recipescategories', array( $recipescategory_selected)); ?>    
    
    
    
    
    
    

	</div>


	<br />
	<br />
    

</div>
