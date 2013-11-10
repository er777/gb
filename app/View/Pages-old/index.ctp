<h2>Pages</h2>

<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('author'); ?></th>
		<th><?php echo $this->Paginator->sort('body'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($pages as $page): ?>
	<tr>
		<td><?php echo h($page['Page']['id']); ?></td>
		<td><?php echo h($page['Page']['name']); ?></td>
		<td><?php echo h($page['Page']['slug']); ?></td>
		<td><?php echo ($page['Page']['author']); ?></td>
		<td><?php echo ($page['Page']['body']); ?></td>
		<td><?php echo h($page['Page']['created']); ?></td>
		<td><?php echo h($page['Page']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $page['Page']['id'])); ?>
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

