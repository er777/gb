<?php echo $this->Html->script('/ckeditor/ckeditor.js'); ?>

<script type="text/javascript">
//	tinyMCE.init({
//		selector: "textarea",
//		 plugins: [
//        "advlist autolink lists link preview anchor",
//        "visualblocks code fullscreen",
//        "contextmenu paste spellchecker"
//    	],
//    	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
//});


CKEDITOR.replace( 'textarea', {
    toolbar: 'Basic',
    uiColor: '#9AB8F3',
});
</script>


<div class= "row">
	<div class= "span4">
		<h2>Admin Edit Recipe</h2>
	</div>
</div>

<div class= "row">
	<div class= "span8">

		<?php echo $this->Form->create('Recipe'); ?>
        <br />
		<br />

        <?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
        <br />
		<br />

		<?php echo $this->Form->input('id',array(
			'readonly' => 'readonly')); ?>


		<?php echo $this->Form->input('user_id', array('label' => 'Vendor')); ?>
		<?php echo $this->Form->input('recipescategory_id',array('label' => 'Recipe Category')); ?>
		<?php echo $this->Form->input('name'); ?>
		<?php echo $this->Form->input('slug'); ?>
		<?php echo $this->Form->input('attribution',array('class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('description', array('rows' => 60, 'class' => 'ckeditor')); ?>
		<?php echo $this->Form->input('ingredients', array('rows' => 30, 'class' => 'input-gb-large ckeditor')); ?>
		<?php echo $this->Form->input('preparation', array('rows' => 30, 'class' => 'input-gb-large ckeditor')); ?>
		<?php echo $this->Form->input('comment', array('rows' => 20, 'class' => 'input-gb-large ckeditor')); ?>

		<?php echo $this->Form->input('tradition_id', array('empty' => '--')); ?>
		<?php echo $this->Form->input('ustradition_id', array('empty' => '--')); ?>
        
        <br />
        <br />
        
        <?php //echo $this->Form->input('Recipe.Tag',array('label'=>'Add a tag', 'type'=>'text'));
  ?>

        
                
        <?php echo $this->Form->input('tags', array('type' => 'text')); ?>
		
        <?php /*?><ul id="tagcloud">
			<?php echo $this->TagCloud->display($tags, array(
				'before' => '<li class="fs%size% tag">',
				'after' => '</li>',
				'maxSize' => 50,
				'minSize' => 1));
			?>
		</ul><?php */?>

        
        
<div class="row">


	<?php if($this->Form->value('Recipe.image_1') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/recipes/image_1/<?php echo $this->Form->value('Recipe.image_1'); ?>" />
             </div>   
            <?php echo $this->Form->input('attr_1'); ?>
        </div>  
	<?php endif; ?>
                  
        
	<?php if($this->Form->value('Recipe.image_2') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/recipes/image_2/<?php echo $this->Form->value('Recipe.image_2'); ?>" />
             </div>   
            <?php echo $this->Form->input('attr_2'); ?>
         </div>       
	<?php endif; ?>
        
        
	<?php if($this->Form->value('Recipe.image_3') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/recipes/image_3/<?php echo $this->Form->value('Recipe.image_3'); ?>" />
             </div>   
            <?php echo $this->Form->input('attr_3'); ?>
          </div>               
	<?php endif; ?>   
    
    	<?php if($this->Form->value('Recipe.image_4') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/recipes/image_2/<?php echo $this->Form->value('Recipe.image_4'); ?>" />
             </div>   
            <?php echo $this->Form->input('attr_4'); ?>
         </div>       
	<?php endif; ?>
        
        
	<?php if($this->Form->value('Recipe.image_5') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/recipes/image_3/<?php echo $this->Form->value('Recipe.image_5'); ?>" />
             </div>   
            <?php echo $this->Form->input('attr_5'); ?>
          </div>               
	<?php endif; ?>        
    
        
</div>
        
        
        
        
        
        
		<br />
		<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>
		<?php echo $this->Form->input('featured', array('type' => 'checkbox', 'label' => 'Featured')); ?>
		<br />
		
		<?php echo $this->Form->end(); ?>


		<br />
		<br />

		<h3>Actions</h3>

		<?php echo $this->Html->link('View', array('action' => 'view', $this->Form->value('Recipe.id')), array('class' => 'btn')); ?>

		<br />
		<br />

		<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Recipe.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Recipe.id'))); ?>


		<br />
		<br />

		</div>
</div>


