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

<h2>Admin Edit Page</h2>

<?php echo $this->Form->create('Page'); ?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('name'); ?>

<?php echo $this->Form->input('slug'); ?>
<?php echo $this->Form->input('author'); ?>

<?php echo $this->Form->input('body', array('rows' => 20, 'class' => 'input-xxlarge')); ?>
<br />
<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>





<div class="row">


	<?php if($this->Form->value('Page.image_1') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/pages/image_1/<?php echo $this->Form->value('Page.image_1'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_1'); ?>
            <?php echo $this->Form->input('attribution_1'); ?>
            <?php echo $this->Form->input('product_link_1'); ?>
            <?php echo $this->Form->input('recipe_link_1'); ?>

        </div>  
	<?php endif; ?>
                  
        
	<?php if($this->Form->value('Page.image_2') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/pages/image_2/<?php echo $this->Form->value('Page.image_2'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_2'); ?>
            <?php echo $this->Form->input('attribution_2'); ?>
            <?php echo $this->Form->input('product_link_2'); ?>
            <?php echo $this->Form->input('recipe_link_2'); ?>

         </div>       
	<?php endif; ?>
        
       
        
        
</div>

<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>




<br />
<br />








<h3>Actions</h3>

<?php echo $this->Html->link('View', array('action' => 'view', $this->Form->value('Page.id')), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Page.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Page.id'))); ?>

<br />
<br />

<br />
<br />

