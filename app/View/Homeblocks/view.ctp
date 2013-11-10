<div class="homeblocks view">
<h2><?php  echo __('Homeblock'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($homeblock['Homeblock']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($homeblock['Homeblock']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($homeblock['Homeblock']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($homeblock['Homeblock']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Homeblock'), array('action' => 'edit', $homeblock['Homeblock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Homeblock'), array('action' => 'delete', $homeblock['Homeblock']['id']), null, __('Are you sure you want to delete # %s?', $homeblock['Homeblock']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Homeblocks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Homeblock'), array('action' => 'add')); ?> </li>
	</ul>
</div>
