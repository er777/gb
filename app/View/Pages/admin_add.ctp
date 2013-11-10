<?php echo $this->Html->script('/tiny_mce/tiny_mce.js'); ?>

<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		skin: "thebigreason",
		plugins : "inlinepopups",
		plugins : "paste",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,|,link,unlink,|,bullist,numlist,|,pastetext,pasteword,selectall,|,cleanup,removeformat,code",
		theme_advanced_resizing : true,
	});
</script>


<div class="pages form">

<?php echo $this->Form->create('Page'); ?>

<h2>Add Page</h2>



<?php echo $this->Form->input('name',array( 'class' => 'input-gb-large')); ?>
<?php echo $this->Form->input('slug'); ?>
<?php echo $this->Form->input('body', array('rows' => 30, 'class' => 'input-gb-large')); ?>


	
<?php echo $this->Form->end(__('Submit')); ?>
</div>
