<h2>Block</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>ID</td>
		<td><?php echo h($block['Block']['id']); ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo h($block['Block']['name']); ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo h($block['Block']['slug']); ?></td>
	</tr>
	<tr>
		<td>Subtitle</td>
		<td><?php echo h($block['Block']['subtitle']); ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo h($block['Block']['description']); ?></td>
	</tr>
	<tr>
		<td>Writeup</td>
		<td><?php echo h($block['Block']['writeup']); ?></td>
	</tr>
	<tr>
		<td>Link</td>
		<td><?php echo h($block['Block']['link']); ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($block['Block']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($block['Block']['modified']); ?></td>
	</tr>
	<tr>
</table>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('Edit Block', array('action' => 'edit', $block['Block']['id']), array('class' => 'btn')); ?> </li>

<br />
<br />

<?php echo $this->Form->postLink('Delete Block', array('action' => 'delete', $block['Block']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $block['Block']['id'])); ?>

<br />
<br />

<?php echo $this->Html->image('blocks/image/' . $block['Block']['image']); ?>

<br />

<span class="label label-warning"> &nbsp; Image : no watermark, square image size </span>

<br />
<br />

<?php echo $this->Form->create('Block', array('type' => 'file', 'url' => array('controller' => 'blocks', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $block['Block']['id'])); ?>
<?php echo $this->Form->hidden('slug', array('value' => $block['Block']['slug'])); ?>
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
