<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>

<?php echo $this->Html->script(array('bootstrap-editable.js'), array('inline' => false)); ?>

<script>
$(document).ready(function() {

	$('.recipes_category').editable({
		type: 'textarea',
		name: 'recipes_category',
		url: '/admin/recipes/editable',
		title: 'Category',
		placement: 'bottom',
	});

	

});
</script>

<h2>Recipes</h2>

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('recipescategory_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('attribution'); ?></th>
		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('tags'); ?></th>
		<th><?php echo $this->Paginator->sort('ingredients'); ?></th>
		<th><?php echo $this->Paginator->sort('preparation'); ?></th>
		<th><?php echo $this->Paginator->sort('comment'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($recipes as $recipe): ?>
	<tr>
		<td><?php echo h($recipe['Recipe']['id']); ?></td>
		<td><?php echo $this->Html->link($recipe['User']['name'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?></td>
		<td><span class="recipes_category"<?php echo $this->Html->link($recipe['Recipescategory']['name'], array('controller' => 'recipescategories', 'action' => 'view', $recipe['Recipescategory']['id'])); ?></td>
		<td><?php echo h($recipe['Recipe']['name']); ?></td>
		<td><?php echo h($recipe['Recipe']['slug']); ?></td>
		<td><?php echo h($recipe['Recipe']['attribution']); ?></td>
		<td><div class="limit"><?php echo ($recipe['Recipe']['description']); ?></div></td>
		<td><?php echo  ($recipe['Recipe']['tags']); ?></td>
		<td><div class="limit"><?php echo  ($recipe['Recipe']['ingredients']); ?></div></td>
		<td><div class="limit"><?php echo  ($recipe['Recipe']['preparation']); ?></div></td>
		<td><div class="limit"><?php echo  ($recipe['Recipe']['comment']); ?></div></td>
		<td><a href="/admin/recipes/switch/active/<?php echo $recipe['Recipe']['id']; ?>" class="status"><img src="/img/icon_<?php echo $recipe['Recipe']['active']; ?>.png" alt="" /></a></td>
		<td><?php echo h($recipe['Recipe']['created']); ?></td>
		<td><?php echo h($recipe['Recipe']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $recipe['Recipe']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $recipe['Recipe']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

