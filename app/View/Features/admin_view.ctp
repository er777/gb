<h2>Feature</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>ID</td>
		<td><?php echo h($feature['Feature']['id']); ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo h($feature['Feature']['name']); ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo h($feature['Feature']['slug']); ?></td>
	</tr>
    <tr>
		<td>Product ID</td>
		<td><?php echo h($feature['Feature']['gwm_product']); ?></td>
	</tr>
    <tr>
		<td>Type</td>
		<td><?php echo h($feature['Feature']['type']); ?></td>
	</tr>

	<tr>
		<td>Link</td>
		<td><?php echo h($feature['Feature']['recipe_link']); ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($feature['Feature']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($feature['Feature']['modified']); ?></td>
	</tr>
	<tr>
</table>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('Edit Feature', array('action' => 'edit', $feature['Feature']['id']), array('class' => 'btn')); ?> </li>

<br />
<br />

<?php echo $this->Form->postLink('Delete Feature', array('action' => 'delete', $feature['Feature']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $feature['Feature']['id'])); ?>

<br />
<br />

<?php echo $this->Html->image('features/image/' . $feature['Feature']['image']); ?>

<br />

<span class="label label-warning"> &nbsp; Image : no watermark, square image size </span>

<br />
<br />

<?php echo $this->Form->create('Feature', array('type' => 'file', 'url' => array('controller' => 'features', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $feature['Feature']['id'])); ?>
<?php echo $this->Form->hidden('slug', array('value' => $feature['Feature']['slug'])); ?>
<table class="table-striped table-bordered table-condensed">
	<tbody>
		<tr>
			<td>Upload Image</td>
			<td><?php echo $this->Form->file('image'); ?></td>
		</tr>
		<tr>
			<td>Image Type</td>
			<td><?php echo $this->Form->input('image_type', array('type' => 'select', 'label' => false, 'options' => array(
				'image' => 'image',
			))); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo $this->Form->button('Submit', array('class' => 'btn'));?></td>
		</tr>
	</tbody>
</table>
<?php echo $this->Form->end(); ?>

<br />
<br />
