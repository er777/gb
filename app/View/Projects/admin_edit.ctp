<h2>Edit Client</h2>

<div class="row">
	<div class="span4">

		<?php echo $this->Form->create('Project');?>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('projectcategory_id', array('label' => 'Status'));
		echo $this->Form->input('source', array('label' => 'Source'));
		echo $this->Form->input('business_name');
		echo $this->Form->input('client_firstname', array('label' => 'Client First Name')); 
		echo $this->Form->input('client_lastname', array('label' => 'Client Last Name')); 
		echo $this->Form->input('client_title', array('label' => 'Client Title'));  
		?>

		<br />
		<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>
		
		
		<br />
		<br />
		

	</div>
	
	<div class="span3">
		<?php
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('phone', array('label' => 'Business Phone')); 
		echo $this->Form->input('fax');
		echo $this->Form->input('website');
		echo $this->Form->input('contact_1', array('label' => 'Main Contact')); 
		echo $this->Form->input('title_1', array('label' => 'Main Contact Title'));
		echo $this->Form->input('email_1', array('label' => 'Main Contact eMail')); 
		echo $this->Form->input('phone_1', array('label' => 'Main Contact Phone'));
		echo $this->Form->input('cell_1', array('label' => 'Main Contact Cell'));
		?>
	</div>
	
	<div class="span5">	
		<?php echo $this->Form->input('body', array('rows' => 10, 'class' => 'field span6')); ?>
		<br />
		<?php echo $this->Form->input('contact_2', array('label' => 'Second Contact')); 
		echo $this->Form->input('title_2', array('label' => 'Second Contact Title'));
		echo $this->Form->input('email_2', array('label' => 'Second Contact eMail')); 
		echo $this->Form->input('phone_2', array('label' => 'Second Contact Phone'));
		echo $this->Form->input('cell_2', array('label' => 'Second Contact Cell'));
		?>
		<br />
		
	</div>

</div>

		<br />	
		
		<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
		
		<br />	
		<?php echo $this->Form->end(); ?>
		
		<h3>Actions</h3>
				
		<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Project.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Project.id'))); ?>