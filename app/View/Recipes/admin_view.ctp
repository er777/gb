<h2>Recipe</h2>
<div class="row">
    <div class="span12">
        <table class="table-striped table-bordered table-condensed">
            <tr>
                <td>Id</td>
                <td><?php echo h($recipe['Recipe']['id']); ?></td>
            </tr>
            <tr>
                <td>User</td>
                <td><?php echo $this->Html->link($recipe['User']['name'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?></td>
            </tr>
            <tr>
                <td>Recipescategory</td>
                <td><?php echo $this->Html->link($recipe['Recipescategory']['name'], array('controller' => 'recipescategories', 'action' => 'view', $recipe['Recipescategory']['id'])); ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $recipe['Recipe']['name']; ?></td>
            </tr>
            <tr>
                <td>Slug</td>
                <td><?php echo $recipe['Recipe']['slug']; ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo $recipe['Recipe']['description']; ?></td>
            </tr>
<?php /*?>            <tr>
                <td>Tags</td>
                <td><?php echo $recipe['Recipe']['tags']; ?></td>
            </tr>
<?php */?>            <tr>
                <td>Ingredients</td>
                <td><?php echo $recipe['Recipe']['ingredients']; ?></td>
            </tr>
            <tr>
                <td>Preparation</td>
                <td><?php echo $recipe['Recipe']['preparation']; ?></td>
            </tr>
            <tr>
                <td>Comment</td>
                <td><?php echo $recipe['Recipe']['comment']; ?></td>
            </tr>
            <tr>
                <td>Active</td>
                <td><?php echo h($recipe['Recipe']['active']); ?></td>
            </tr>
            <tr>
                <td>Created</td>
                <td><?php echo h($recipe['Recipe']['created']); ?></td>
            </tr>
            <tr>
                <td>Modified</td>
                <td><?php echo h($recipe['Recipe']['modified']); ?></td>
            </tr>
        </table>
    </div>
    
    <div class="span12">
        <br />
        <br />
        <?php echo $this->Form->create('Recipe', array('type' => 'file', 'url' => array('controller' => 'recipes', 'action' => 'view', 'admin' => true)));?> <?php echo $this->Form->hidden('id', array('value' => $recipe['Recipe']['id'])); ?> <?php echo $this->Form->hidden('slug', array('value' => $recipe['Recipe']['slug'])); ?>
        <table class="table-striped table-bordered table-condensed">
            <tr>
                <td>Upload Image</td>
                <td><?php echo $this->Form->file('image'); ?></td>
            </tr>
            <tr>
                <td>Image Type</td>
                <td><?php echo $this->Form->input('image_type', array('type' => 'select', 'label' => false, 'options' => array(
                'image_1' => 'image 1',
                'image_2' => 'image 2',
                'image_3' => 'image 3',
                'image_4' => 'image 4',
                'image_5' => 'image 5',
            ))); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $this->Form->button('Submit', array('class' => 'btn'));?></td>
            </tr>
        </table>
        
        <?php if(!empty($recipe['Recipe']['image_1'])) : ?>
        <br />
        Image 1 <br />
        <?php echo $this->Html->image('recipes/image_1/' . $recipe['Recipe']['image_1']); ?> <br />
        <br />
        <?php echo $this->element('deleteimage', array(
			'model' => 'Recipe',
			'id' => $recipe['Recipe']['id'],
			'field' => 'image_1',
			'path' => 'recipes/image_1/',
			'file' => $recipe['Recipe']['image_1'],
		)); ?>
        <?php endif; ?>
        
        <?php if(!empty($recipe['Recipe']['image_2'])) : ?>
        <br />
        Image 2 <br />
        <?php echo $this->Html->image('recipes/image_2/' . $recipe['Recipe']['image_2']); ?> <br />
        <br />
        <?php echo $this->element('deleteimage', array(
			'model' => 'Recipe',
			'id' => $recipe['Recipe']['id'],
			'field' => 'image_2',
			'path' => 'recipes/image_2/',
			'file' => $recipe['Recipe']['image_2'],
		)); ?>
        <?php endif; ?>
        
        <?php if(!empty($recipe['Recipe']['image_3'])) : ?>
        <br />
        Image 3 <br />
        <?php echo $this->Html->image('recipes/image_3/' . $recipe['Recipe']['image_3']); ?> <br />
        <br />
        <?php echo $this->element('deleteimage', array(
			'model' => 'Recipe',
			'id' => $recipe['Recipe']['id'],
			'field' => 'image_3',
			'path' => 'recipes/image_3/',
			'file' => $recipe['Recipe']['image_3'],
		)); ?>
        <?php endif; ?>
        
        <?php if(!empty($recipe['Recipe']['image_4'])) : ?>
        <br />
        Image 4 <br />
        <?php echo $this->Html->image('recipes/image_4/' . $recipe['Recipe']['image_4']); ?> <br />
        <br />
        <?php echo $this->element('deleteimage', array(
			'model' => 'Recipe',
			'id' => $recipe['Recipe']['id'],
			'field' => 'image_4',
			'path' => 'recipes/image_4/',
			'file' => $recipe['Recipe']['image_4'],
		)); ?>
        <?php endif; ?>
        
        <?php if(!empty($recipe['Recipe']['image_5'])) : ?>
        <br />
        Image 5 <br />
        <?php echo $this->Html->image('recipes/image_5/' . $recipe['Recipe']['image_5']); ?> <br />
        <br />
        <?php echo $this->element('deleteimage', array(
			'model' => 'Recipe',
			'id' => $recipe['Recipe']['id'],
			'field' => 'image_5',
			'path' => 'recipes/image_5/',
			'file' => $recipe['Recipe']['image_5'],
		)); ?>
        <?php endif; ?>
        <br />
        <br />
        <?php echo $this->Form->end(); ?> <br />
        <br />
        <h3>Other Actions</h3>
        <?php echo $this->Html->link('Edit Recipe', array('action' => 'edit', $recipe['Recipe']['id']), array('class' => 'btn')); ?> <br />
        <br />
        <?php echo $this->Form->postLink('Delete Recipe', array('action' => 'delete', $recipe['Recipe']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?> <br />
        <br />
    
	</div>
    
    
</div>

</div>