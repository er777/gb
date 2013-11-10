view

<div class="row">

	<div class="span3">
		<h3><?php echo $brand['Brand']['name']; ?></h3>

		<?php
		if(is_file(IMAGES . '/brands/image/' . $brand['Brand']['image'])) {
			echo $this->Html->image('brands/image/' . $brand['Brand']['image']);
		}
		?>

	</div>
	<div class="span9">
		<?php echo $this->element('products'); ?>

		<?php echo $this->element('pagination-counter'); ?>

		<?php echo $this->element('pagination'); ?>
	</div>

</div>

