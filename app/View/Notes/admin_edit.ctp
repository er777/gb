<h2>Admin Edit Note</h2>

<?php echo $this->Form->create('Note');?>
<?php
echo $this->Form->input('id');
echo $this->Form->input('name');
echo $this->Form->input('note');
echo $this->Form->checkbox('active');
?>
<br />
<?php echo $this->Form->end('Submit');?>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Note.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Note.id'))); ?><br />

<br />
<br />

