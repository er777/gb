<div class="contents form">
<?php echo $this->Form->create('Content'); ?>
	<fieldset>
		<legend><?php echo __('Add Content'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('body');
		echo $this->Form->input('image');
		echo $this->Form->input('link');
		echo $this->Form->input('type');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contents'), array('action' => 'index')); ?></li>
	</ul>
</div>
