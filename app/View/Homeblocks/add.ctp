<div class="homeblocks form">
<?php echo $this->Form->create('Homeblock'); ?>
	<fieldset>
		<legend><?php echo __('Add Homeblock'); ?></legend>
	<?php
		echo $this->Form->input('message');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Homeblocks'), array('action' => 'index')); ?></li>
	</ul>
</div>
