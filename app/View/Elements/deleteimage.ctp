<?php if(!empty($file)) : ?>
<?php echo $this->Form->create($model, array('action' => 'deleteimage')); ?>
<?php echo $this->Form->input('model', array('type' => 'hidden', 'value' => $model)); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $id)); ?>
<?php echo $this->Form->input('field', array('type' => 'hidden', 'value' => $field)); ?>
<?php echo $this->Form->input('path', array('type' => 'hidden', 'value' => $path)); ?>
<?php echo $this->Form->input('file', array('type' => 'hidden', 'value' => $file)); ?>
<?php //echo $this->Form->button('Delete ' . $model . ' ' . $id . ' ' . $field . ' ' . $path . ' ' . $file, array('class' => 'btn btn-mini btn-danger')); ?>
<?php echo $this->Form->button('Delete ' . $model . ' ' . $field , array('class' => 'btn btn-mini btn-danger')); ?>
<?php echo $this->Form->end(); ?>
<?php endif; ?>