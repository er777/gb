	<?php echo $this->Html->script('/tiny_mce/tiny_mce.js'); ?>

<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		skin: "thebigreason",
		plugins : "inlinepopups",
		plugins : "paste",
		// Theme options
		theme_advanced_buttons1 : "styleselect,bold,italic,underline,hr,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,bullist,numlist,|,pastetext,pasteword,selectall,|,removeformat,code",
		theme_advanced_resizing : true,
				

	});
</script>
<div class="row gb">
	<div class="span12">

		<h2>Admin Edit Detail</h2>
		
		<br />
		
		<?php echo $this->Form->create('Detail'); ?>

	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('body');
		echo $this->Form->input('image');
		echo $this->Form->input('link');
		echo $this->Form->input('type');
		echo $this->Form->input('active');
	?>
	</div>	


</div>

<div class="row gb">
	<div class="span12">

	
<?php echo $this->Form->end(__('Submit')); ?>

    <div class="actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
    
            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Detail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Detail.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Details'), array('action' => 'index')); ?></li>
        </ul>
        
    </div>
</div>