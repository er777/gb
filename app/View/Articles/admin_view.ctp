<h2>Article</h2>

<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <td>Id</td>
        <td><?php echo $article['Article']['id']; ?></td>
    </tr>
    <tr>
	<td>Parent Block</td>

	<td><?php echo $article['Article']['block_id']; ?></td>

    </tr>
    <tr>
        <td>Name</td>
        <td><?php echo $article['Article']['name']; ?></td>
    </tr>
    <tr>
        <td>Slug</td>
        <td><?php echo $article['Article']['slug']; ?></td>
    </tr>
    <tr>
        <td>Body</td>
        <td><div class="limit"><?php echo $article['Article']['body']; ?></div></td>
    </tr>
    <tr>
        <td>Active</td>
        <td><?php echo $article['Article']['active']; ?></td>
    </tr>
    <tr>
        <td>Created</td>
        <td><?php echo $article['Article']['created']; ?></td>
    </tr>
    <tr>
        <td>Modified</td>
        <td><?php echo $article['Article']['modified']; ?></td>
    </tr>
</table>

<br />


<span class="label label-warning">
 &nbsp; Image : no watermark </span>

<br />
<br />

<?php echo $this->Form->create('Article', array('type' => 'file', 'url' => array('controller' => 'articles', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $article['Article']['id'])); ?>
<?php echo $this->Form->hidden('slug', array('value' => $article['Article']['slug'])); ?>
<table class="table-striped table-bordered table-condensed">
	<tbody>
		<tr>
			<td>Upload Image</td>
			<td><?php echo $this->Form->file('image'); ?></td>
		</tr>
		<tr>
			<td>Image Type</td>
			<td>

			<?php echo $this->Form->input('image_type', array('type' => 'select', 'label' => false, 'options' => array(
				'image_1' => 'image 1',
				'image_2' => 'image 2',
				'image_3' => 'image 3',
				'image_4' => 'image 4',
				'image_5' => 'image 5',
				'image_6' => 'image 6',
			))); ?>

			</td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo $this->Form->button('Submit', array('class' => 'btn'));?></td>
		</tr>
	</tbody>
</table>
<?php echo $this->Form->end(); ?>

<br />
<br />

<h3>Edit and Submit Picture Details</h3>
<?php echo $this->Form->create('Article'); ?>

<?php echo $this->Form->hidden('id', array('value' => $article['Article']['id'])); ?>





<div class="row">

        <?php if(!empty($article['Article']['image_1'])) : ?>
        <div class="span4">
            <div style="height:245px">       
    
            	<?php echo $this->Html->image('articles/image_1/'. $article['Article']['image_1'] . '?date=' . time(), array('class' => 'gb')); ?>
                <br /><br />
                <a href="/admin/images/crop?src_dir=products/image_1&src_file=<?php echo $article['Article']['image_1']; ?>&dst_dir=products/image_1&dst_file=<?php echo $article['Article']['image_1']; ?>&width=300" class="btn">crop 300 x 300</a>
             </div>   
            <?php echo $this->Form->input('pic_title_1'); ?>
            <?php echo $this->Form->input('attrribution_1'); ?>
            <?php echo $this->Form->input('product_link_1'); ?>
            <?php echo $this->Form->input('recipe_link_1'); ?>

         </div>    
        <?php endif; ?>
        
       

		<?php if(!empty($article['Article']['image_2'])) : ?>
        <div class="span4">
 			<div style="height:245px">       
                <?php echo $this->Html->image('articles/image_2/'. $article['Article']['image_2'] . '?date=' . time(), array('class' => 'gb')); ?>
                <br /><br />
                <a href="/admin/images/crop?src_dir=products/image_1&src_file=<?php echo $article['Article']['image_2']; ?>&dst_dir=products/image_1&dst_file=<?php echo $article['Article']['image_2']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
            </div>    
            <?php echo $this->Form->input('pic_title_2'); ?>
            <?php echo $this->Form->input('attrribution_3'); ?>
            <?php echo $this->Form->input('product_link_2'); ?>
            <?php echo $this->Form->input('recipe_link_2'); ?>

         </div>       
        <?php endif; ?>
        
        
		<?php if(!empty($article['Article']['image_3'])) : ?>
        <div class="span4">  
 			<div style="height:245px">       
                <?php echo $this->Html->image('articles/image_3/'. $article['Article']['image_3'] . '?date=' . time(), array('class' => 'gb')); ?>
                <br /><br />
                <a href="/admin/images/crop?src_dir=products/image_1&src_file=<?php echo $article['Article']['image_3']; ?>&dst_dir=products/image_1&dst_file=<?php echo $article['Article']['image_3']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
             </div>   
            <?php echo $this->Form->input('pic_title_3'); ?>
            <?php echo $this->Form->input('attrribution_3'); ?>
            <?php echo $this->Form->input('product_link_3'); ?>
            <?php echo $this->Form->input('recipe_link_3'); ?>

          </div>               
        <?php endif; ?>
       

		<?php if(!empty($article['Article']['image_4'])) : ?>
        <div class="span4">
 			<div style="height:245px">       
                <?php echo $this->Html->image('articles/image_4/'. $article['Article']['image_4'] . '?date=' . time(), array('class' => 'gb')); ?>
                <br /><br />
                <a href="/admin/images/crop?src_dir=products/image_1&src_file=<?php echo $article['Article']['image_4']; ?>&dst_dir=products/image_1&dst_file=<?php echo $article['Article']['image_4']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
             </div>  
            <?php echo $this->Form->input('pic_title_4'); ?>
            <?php echo $this->Form->input('attrribution_4'); ?>
            <?php echo $this->Form->input('product_link_4'); ?>
            <?php echo $this->Form->input('recipe_link_4'); ?>
                
          </div>         
        <?php endif; ?>
        
        
		<?php if(!empty($article['Article']['image_5'])) : ?>
        
        <div class="span4"> 
        	<div style="height:245px">       
				<?php echo $this->Html->image('articles/image_5/'. $article['Article']['image_5'] . '?date=' . time(), array('class' => 'gb')); ?>
                <br /><br />
                <a href="/admin/images/crop?src_dir=products/image_1&src_file=<?php echo $article['Article']['image_5']; ?>&dst_dir=products/image_1&dst_file=<?php echo $article['Article']['image_5']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
                    
                <?php echo $this->Form->input('pic_title_5'); ?>
                <?php echo $this->Form->input('attrribution_5'); ?>
                <?php echo $this->Form->input('product_link_5'); ?>
                <?php echo $this->Form->input('recipe_link_5'); ?>
			</div>
            
         </div>
        <?php endif; ?>
        
        
		<?php if(!empty($article['Article']['image_6'])) : ?>
        <div class="span4">
			<div style="height:245px">       
				<?php echo $this->Html->image('articles/image_6/'. $article['Article']['image_6'] . '?date=' . time(), array('class' => 'gb')); ?>
                <br /><br />
                <a href="/admin/images/crop?src_dir=products/image_1&src_file=<?php echo $article['Article']['image_4']; ?>&dst_dir=products/image_1&dst_file=<?php echo $article['Article']['image_4']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
           	</div>    
            <?php echo $this->Form->input('pic_title_6'); ?>
            <?php echo $this->Form->input('attrribution_6'); ?>
            <?php echo $this->Form->input('product_link_61'); ?>
            <?php echo $this->Form->input('recipe_link_6'); ?>

            
        </div>        
        <?php endif; ?>
        
        
</div>  
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>

<h3>Other Actions</h3>

<br />

<?php echo $this->Html->link('Edit Article', array('action' => 'edit', $article['Article']['id']), array('class' => 'btn')); ?>






<br />
<br />

<?php echo $this->Form->postLink('Delete Article', array('action' => 'delete', $article['Article']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?>

<br />
<br />
