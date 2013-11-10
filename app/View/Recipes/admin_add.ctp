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
		theme_advanced_resizing : true,	});
</script>


<div class= "row">
	<div class= "span4">
		<h2>Admin Add Recipe</h2>
	</div>
</div>

<div class= "row">
	<div class= "span4">

		<?php echo $this->Form->create('Recipe'); ?>
        <br />
		<br />

        <?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
        <br />
		<br />


		<?php echo $this->Form->input('user_id', array('label' => 'Vendor')); ?>
		<?php echo $this->Form->input('recipescategory_id',array('label' => 'Recipe Category')); ?>
		<?php echo $this->Form->input('name'); ?>
		<?php echo $this->Form->input('slug'); ?>
		<?php echo $this->Form->input('attribution',array('class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('description', array('rows' => 20, 'class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('ingredients', array('rows' => 30, 'class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('preparation', array('rows' => 30, 'class' => 'input-gb-large')); ?>
		<?php echo $this->Form->input('comment', array('rows' => 20, 'class' => 'input-gb-large')); ?>

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
		<?php echo $this->Form->input('featured', array('type' => 'checkbox', 'label' => 'Featured')); ?>
		<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>
		<br />
		
		<?php echo $this->Form->end(); ?>



		</div>
</div>


