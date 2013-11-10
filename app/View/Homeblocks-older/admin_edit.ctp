<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker({ changeYear: true });
		// getter
		var changeYear = $( ".selector" ).datepicker( "option", "changeYear" );
		// setter
		$( "#datepicker" ).datepicker( "option", "changeYear", true );
		$( "#datepicker" ).datepicker({ gotoCurrent: true });
		// getter
		var gotoCurrent = $( ".selector" ).datepicker( "option", "gotoCurrent" );
		// setter
		$( "#datepicker" ).datepicker( "option", "gotoCurrent", true );
	});
  </script>


<h2>Vendor Tracking Edit </h2>

<div class="row">

	
	<div class="span5">
		
		
		<?php echo $this->Form->create('Homeblock');?>
        <?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
		<br />
        <br />
		<?php echo $this->Form->input('id');?>
		<?php echo $this->Form->input('message', array('label' => 'Home Page Message')); ?>
	
        
		<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>
		
	</div>
	
    
        
</div>


	
		<br />	
		
		<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
		
		<br />	
		<?php echo $this->Form->end(); ?>
		
		<h3>Actions</h3>
				
		<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Project.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Homeblock.id'))); ?>