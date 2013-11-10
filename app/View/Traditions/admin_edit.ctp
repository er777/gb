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
<div class="row gb">
	<div class="span12">

		<h2>Admin Edit Tradition</h2>
		
		<br />
		
		<?php echo $this->Form->create('Tradition'); ?>

		<?php echo $this->Form->input('id'); ?>
		<?php echo $this->Form->input('name'); ?>
		<?php echo $this->Form->input('slug'); ?>
		<?php echo $this->Form->input('countries'); ?>
		<?php echo $this->Form->input('summary', array('rows' => 20, 'class' => 'input-xxlarge')); ?>
		<?php echo $this->Form->input('article', array('rows' => 20, 'class' => 'input-xxlarge')); ?>
		
<br />
<br />

<div class="row">

   <?php if($this->Form->value('Tradition.image_1') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/traditions/image_1/<?php echo $this->Form->value('Tradition.image_1'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_1'); ?>
            <?php echo $this->Form->input('attr_1'); ?>

        </div>  
	<?php endif; ?>
                  
        
   <?php if($this->Form->value('Tradition.image_2') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/traditions/image_2/<?php echo $this->Form->value('Tradition.image_2'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_2'); ?>
            <?php echo $this->Form->input('attr_2'); ?>

         </div>       
	<?php endif; ?>
        
        
   <?php if($this->Form->value('Tradition.image_3') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/traditions/image_3/<?php echo $this->Form->value('Tradition.image_3'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_3'); ?>
            <?php echo $this->Form->input('attr_3'); ?>

          </div>               
	<?php endif; ?>

</div>       

<div class="row">
   <?php if($this->Form->value('Tradition.image_4') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/traditions/image_4/<?php echo $this->Form->value('Tradition.image_4'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_4'); ?>
            <?php echo $this->Form->input('attr_4'); ?>
            </div>         
	<?php endif; ?>
        
        
   <?php if($this->Form->value('Tradition.image_5') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/traditions/image_5/<?php echo $this->Form->value('Tradition.image_5'); ?>" />
             </div>   
                <?php echo $this->Form->input('pic_title_5'); ?>
                <?php echo $this->Form->input('attr_5'); ?>
			</div>
            
        
	<?php endif; ?>
        
        
   <?php if($this->Form->value('Tradition.image_6') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/traditions/image_6/<?php echo $this->Form->value('Tradition.image_6'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_6'); ?>
            <?php echo $this->Form->input('attr_6'); ?>
            
        </div>        
	<?php endif; ?>
 
 </div>       
        

		
		
		<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
		<?php echo $this->Form->end(); ?>
		
		<br />
		<br />
		
		<h3>Actions</h3>
		
		<br />
		<br />
		
		<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Tradition.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Tradition.id'))); ?>
		
		<br />
		<br />
	</div>		
</div>	

</div>	