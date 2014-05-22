<div class="details index">
	<h2><?php echo __('Details'); ?></h2>
	
<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($details as $detail): ?>
	<tr>
		<td><?php echo h($detail['Detail']['id']); ?>&nbsp;</td>
		<td><?php echo h($detail['Detail']['name']); ?>&nbsp;</td>
		<td><div class="limit"><?php echo ($detail['Detail']['body']); ?></div></td>
		<td><?php echo h($detail['Detail']['image']); ?>&nbsp;</td>
		<td><?php echo h($detail['Detail']['link']); ?>&nbsp;</td>
		<td><?php echo h($detail['Detail']['type']); ?>&nbsp;</td>
		<td><?php echo h($detail['Detail']['active']); ?>&nbsp;</td>
		<td><?php echo h($detail['Detail']['created']); ?>&nbsp;</td>
		<td><?php echo h($detail['Detail']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $detail['Detail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $detail['Detail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $detail['Detail']['id']), null, __('Are you sure you want to delete # %s?', $detail['Detail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Detail'), array('action' => 'add')); ?></li>
	</ul>
</div>
