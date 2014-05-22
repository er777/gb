<h2>Brands Index</h2>

<div class="row">

	<div class="span3">
		<?php foreach($brands as $brand): ?>
		<?php echo $this->Html->link($brand['Brand']['name'], array('action' => 'view', $brand['Brand']['slug'])); ?><br />
		<?php endforeach; ?>
	</div>
	<div class="span9">
		<?php echo $this->element('products'); ?>

		<?php echo $this->element('pagination-counter'); ?>

		<?php echo $this->element('pagination'); ?>
	</div>

</div>

<br />