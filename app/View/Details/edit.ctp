<div class="details form">
<?php echo $this->Form->create('Detail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Detail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Detail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Details'), array('action' => 'index')); ?></li>
	</ul>
</div>
