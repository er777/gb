<h2>Features</h2>

<div class="row">

	<?php echo $this->Form->create('Feature', array()); ?>
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
		<?php echo $this->Html->link('Reset Search', array('controller' => 'features', 'action' => 'reset', 'admin' => true), array('class' => 'btn')); ?>

	</div>

	<?php echo $this->Form->end(); ?>

</div>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />

<?php
$types = array(		
				'1' => 'Seasonal',
				'2' => 'US',
				'3' => 'International',
				'4' => 'Recipes',	
				
				);		
				
				?>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('type'); ?></th>
		<th><?php echo $this->Paginator->sort('gwm_product'); ?></th>
		<th><?php echo $this->Paginator->sort('gwm_full_url'); ?></th>
		<th><?php echo $this->Paginator->sort('recipe_link'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions"><Actions</th>
	</tr>
	<?php foreach ($features as $feature): ?>
	<tr>
		<td><?php echo h($feature['Feature']['id']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['name']); ?>&nbsp;</td>
        <td><?php echo $types[$feature['Feature']['type']]; ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['gwm_product']); ?>&nbsp;</td>
		<td><a href="<?php echo h($feature['Feature']['gwm_full_url']); ?>"><?php echo h($feature['Feature']['gwm_full_url']); ?></a></td>
		<td><?php echo h($feature['Feature']['recipe_link']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['created']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $feature['Feature']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $feature['Feature']['id']), array('class' => 'btn btn-mini')); ?>
			<?php //echo $this->Form->postLink('Delete', array('action' => 'delete', $feature['Feature']['id']), null, __('Are you sure you want to delete # %s?', $feature['Feature']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />