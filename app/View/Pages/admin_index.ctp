<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>

<h1>Pages</h1>
<p><?php echo $this->Html->link('Add Page', array('action' => 'add')); ?></p>
<table class="table table-striped table-bordered table-condensed table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Author</th>
        <th>Body</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($pages as $page): ?>
    <tr>
        <td><?php echo $page['Page']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($page['Page']['name'], array('action' => 'view', $page['Page']['id'])); ?>
        </td>
        <td><?php echo $page['Page']['slug']; ?></td>
        <td><?php echo $page['Page']['author']; ?></td>
       <td><div class="limit"><?php echo $page['Page']['body']; ?></div></td>
        
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $page['Page']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
       
            <?php echo $this->Html->link('View', array('action' => 'view', $page['Page']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $page['Page']['id']), array('class' => 'btn btn-mini')); ?>
            
            
        </td>
        <td>
            <?php echo $page['Page']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>