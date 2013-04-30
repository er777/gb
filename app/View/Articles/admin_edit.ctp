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
				
		plugins : "AtD",
		/* the URL to the button image to display */
		atd_button_url : "atdbuttontr.gif",
		/* the URL of your proxy file */
		atd_rpc_url : "http://thegourmetbasket.net/tiny_mce/atd-tinymce/server/proxy.php?url=",   

		/* set your API key */
		atd_rpc_id : "gb-90066-2015",
		/* edit this file to customize how AtD shows errors */
		atd_css_url : "css/content.css",
		/* this list contains the categories of errors we want to show */
		atd_show_types : "Bias Language,Cliches,Complex Expression,Diacritical Marks,Double Negatives,Hidden Verbs,Jargon Language,Passive voice,Phrases to Avoid,Redundant Expression",
		/* strings this plugin should ignore */
		atd_ignore_strings : "AtD,rsmudge",
		/* enable "Ignore Always" menu item, uses cookies by default. Set atd_ignore_rpc_url to a URL AtD should send ignore requests to. */
		atd_ignore_enable : "false",
		/* add the AtD button to the first row of the advanced theme */
		theme_advanced_buttons1_add : "AtD",
		
		
		
		
		
		
		
	});
</script>

<h2>Admin Edit Article</h2>

<?php echo $this->Form->create('Article'); ?>
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>


<br /><br />

<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('prefix'); ?>
<?php echo $this->Form->input('name'); ?>
<?php 
// Add select box with blocks name
echo $this->Form->input('block_id'); 
?>
<?php echo $this->Form->input('group_id'); ?>
<?php echo $this->Form->input('slug'); ?>
<?php echo $this->Form->input('summary', array('rows' => 10, 'class' => 'input-xlarge')); ?>
<?php echo $this->Form->input('body', array('rows' => 20, 'class' => 'input-xxlarge')); ?>
<br />
<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>





<div class="row">


	<?php if($this->Form->value('Article.image_1') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_1/<?php echo $this->Form->value('Article.image_1'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_1'); ?>
            <?php echo $this->Form->input('attribution_1'); ?>
            <?php echo $this->Form->input('product_link_1'); ?>
            <?php echo $this->Form->input('recipe_link_1'); ?>

        </div>  
	<?php endif; ?>
                  
        
	<?php if($this->Form->value('Article.image_2') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_2/<?php echo $this->Form->value('Article.image_2'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_2'); ?>
            <?php echo $this->Form->input('attribution_2'); ?>
            <?php echo $this->Form->input('product_link_2'); ?>
            <?php echo $this->Form->input('recipe_link_2'); ?>

         </div>       
	<?php endif; ?>
        
        
	<?php if($this->Form->value('Article.image_3') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_3/<?php echo $this->Form->value('Article.image_3'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_3'); ?>
            <?php echo $this->Form->input('attribution_3'); ?>
            <?php echo $this->Form->input('product_link_3'); ?>
            <?php echo $this->Form->input('recipe_link_3'); ?>

          </div>               
	<?php endif; ?>
       

	<?php if($this->Form->value('Article.image_4') !== '') : ?>
        <div class="span4">xxxx
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_4/<?php echo $this->Form->value('Article.image_4'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_4'); ?>
            <?php echo $this->Form->input('attribution_4'); ?>
            <?php echo $this->Form->input('product_link_4'); ?>
            <?php echo $this->Form->input('recipe_link_4'); ?>
                
          </div>         
	<?php endif; ?>
        
        
	<?php if($this->Form->value('Article.image_5') !== '') : ?>
        <div class="span4">dfgdfgdfg
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_5/<?php echo $this->Form->value('Article.image_5'); ?>" />
             </div>   
                <?php echo $this->Form->input('pic_title_5'); ?>
                <?php echo $this->Form->input('attribution_5'); ?>
                <?php echo $this->Form->input('product_link_5'); ?>
                <?php echo $this->Form->input('recipe_link_5'); ?>
			</div>
            
         </div>
	<?php endif; ?>
        
        
	<?php if($this->Form->value('Article.image_6') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_6/<?php echo $this->Form->value('Article.image_6'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_6'); ?>
            <?php echo $this->Form->input('attribution_6'); ?>
            <?php echo $this->Form->input('product_link_6'); ?>
            <?php echo $this->Form->input('recipe_link_6'); ?>

            
        </div>        
	<?php endif; ?>
        
        
</div>


<?php echo $this->Form->end(); ?>




<br />
<br />








<h3>Actions</h3>

<?php echo $this->Html->link('View', array('action' => 'view', $this->Form->value('Article.id')), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Article.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Article.id'))); ?>

<br />
<br />

<br />
<br />

