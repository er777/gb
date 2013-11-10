<!-- File: /app/View/Pages/index.ctp -->

<h1>Pages</h1>
<p><?php echo $this->Html->link('Add Page', array('action' => 'add')); ?></p>
<table>
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
        
        
        <td>
            <?php echo $this->Form->pageLink(
                'Delete',
                array('action' => 'delete', $page['Page']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $page['Page']['id'])); ?>
        </td>
        <td>
            <?php echo $page['Page']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>