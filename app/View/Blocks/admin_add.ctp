<h2>Admin Add Blocks</h2>

<?php echo $this->Form->create('Block'); ?>
<?php
echo $this->Form->input('id');
echo $this->Form->input('name');
echo $this->Form->input('slug');
echo $this->Form->input('subtitle');
echo $this->Form->input('description', array('class' =>'span5'));
echo $this->Form->input('writeup', array('class' =>'span5'));
echo $this->Form->input('link');
echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active'));
?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>

<br />
<br />

