<h2>Our Vendor Brands</h2>

<!--<div class="vendor-logo">
	<a href="/">
	<?php //echo $this->Html->image('users/image/' . $user['User']['image'], array('class' => 'img-polaroid', 'width' =>'226')); ?>
	</a>

	<div class="name"><?php //echo $user['User']['name']; ?></div>
				
</div>
-->
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