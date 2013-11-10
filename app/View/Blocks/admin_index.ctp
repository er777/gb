<h2>Blocks</h2>

<div class="row">

	<?php echo $this->Form->create('Block', array()); ?>
	<?php echo $this->Form->hidden('search', array('value' => 1)); ?>

	<div class="span2">
		<?php echo $this->Form->input('filter', array(
			'label' => false,
			'class' => 'span2',
			'options' => array(
				'name' => 'Name',
				'description' => 'Description',
				'summary' => 'Summary',
			),
			'selected' => $all['filter']
		)); ?>

	</div>

	<div class="span2">
		<?php echo $this->Form->input('name', array('label' => false, 'id' => false, 'class' => 'span2', 'value' => $all['name'])); ?>

	</div>

	<div class="span4">
		<?php echo $this->Form->button('Search', array('class' => 'btn')); ?>
		&nbsp; &nbsp;
		<?php echo $this->Html->link('Reset Search', array('controller' => 'blocks', 'action' => 'reset', 'admin' => true), array('class' => 'btn')); ?>

	</div>

	<?php echo $this->Form->end(); ?>

</div>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('subtitle'); ?></th>
		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('writeup'); ?></th>
		<th><?php echo $this->Paginator->sort('link'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions"><Actions</th>
	</tr>
	<?php foreach ($blocks as $block): ?>
	<tr>
		<td><?php echo h($block['Block']['id']); ?>&nbsp;</td>
		<td><?php echo h($block['Block']['name']); ?>&nbsp;</td>
		<td><?php echo h($block['Block']['slug']); ?>&nbsp;</td>
		<td><?php echo ($block['Block']['subtitle']); ?>&nbsp;</td>
        <td><div class="limit"><?php echo ($block['Block']['description']); ?></div></td>
		<td><div class="limit"><?php echo ($block['Block']['writeup']); ?></div></td>
		<td><?php echo h($block['Block']['link']); ?>&nbsp;</td>
		<td><?php echo h($block['Block']['created']); ?>&nbsp;</td>
		<td><?php echo h($block['Block']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $block['Block']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $block['Block']['id']), array('class' => 'btn btn-mini')); ?>
			<?php //echo $this->Form->postLink('Delete', array('action' => 'delete', $block['Block']['id']), null, __('Are you sure you want to delete # %s?', $block['Block']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />