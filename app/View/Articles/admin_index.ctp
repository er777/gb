<h2>Articles</h2>

<div class="row">

	<?php echo $this->Form->create('Article', array()); ?>
	<?php echo $this->Form->hidden('search', array('value' => 1)); ?>

	<div class="span3">
		<?php echo $this->Form->input('block_id', array(
			'label' => false,
			'empty' => '',
			'selected' => $all['block_id']
		)); ?>
	</div>

	<div class="span2">
		<?php echo $this->Form->input('filter', array(
			'label' => false,
			'class' => 'span2',
			'options' => array(
				'name' => 'Name',
			),
			'selected' => $all['filter']
		)); ?>

	</div>

	<div class="span2">
		<?php echo $this->Form->input('name', array(
		'label' => false,
		'id' => false,
		'class' => 'span2',
		'required'=> false,
		'value' => $all['name'])); ?>

	</div>

	<div class="span4">
		<?php echo $this->Form->button('Search', array('class' => 'btn')); ?>
		&nbsp; &nbsp;
		<?php echo $this->Html->link('Reset Search', array('controller' => 'articles', 'action' => 'reset', 'admin' => true), array('class' => 'btn')); ?>

	</div>

	<?php echo $this->Form->end(); ?>

</div>

<br />

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
        <th><?php echo $this->Paginator->sort('block_id'); ?></th>
		<th><?php echo $this->Paginator->sort('body'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($articles as $article): ?>
	<tr>
		<td><div class="limit"><?php echo ($article['Article']['id']); ?></div></td>
		<td><?php echo ($article['Article']['name']); ?></td>
		<td><?php echo ($article['Article']['slug']); ?></td>
		<td><?php echo $blocks[$article['Article']['block_id']]; ?></td>
		<td><div class="limit"><?php echo ($article['Article']['body']); ?></div></td>
		<td><a href="/admin/articles/switch/active/<?php echo $article['Article']['id']; ?>" class="status"><img src="/img/icon_<?php echo $article['Article']['active']; ?>.png" alt="" /></a></td>
		<td><?php echo ($article['Article']['created']); ?></td>
		<td><?php echo ($article['Article']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $article['Article']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $article['Article']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $article['Article']['id']), array('class' => 'btn btn-mini btn-danger') , __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />
