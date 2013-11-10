<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>

<?php echo $this->Html->script(array('bootstrap-editable.js'), array('inline' => false)); ?>

<script>
$(document).ready(function() {

	$('pic_title_1').editable({
		type: 'textarea',
		name: 'pic_title_1',
		url: '/admin/users/editable',
		title: 'Pic Title 1',
		placement: 'top',
	});

	$('.attr_1').editable({
		type: 'textarea',
		name: 'attr_1',
		url: '/admin/users/editable',
		title: 'Attribution 1',
		placement: 'top',
	});

	
});
</script>



<style>
	table {
		background-color: #fff;
		border: 0px solid #AAA;
		clear: both;
		color: #333;
		border-collapse:collapse;
		padding:0px;
		border-spacing: 0px;
	}
	td {
		border: 1px #999 solid;
		font-size:12px;
	}

	td img {
		width:300px;
	}
	
	td input {
		width:240px;
	}
	.vendor-pic-info {
		margin-bottom:5px;
	}
</style>

<h2>Vendor Image Edit</h2>

	<?php echo $this->Form->create('User'); ?>
	<?php echo $this->Form->input('id'); ?>


<table>

	<?php foreach ($users as $user): ?>
	<tr>
		<td>
			<?php echo $user['User']['id']; ?>
			<br />
			<?php echo h($user['User']['username']); ?>
			<br />
			<?php echo h($user['User']['name']); ?>
			<br />
			<?php echo $this->Html->link('View', array('action' => 'view', $user['User']['id'])); ?>
		</td>
		<td>
		
		<?php if(!empty($user['User']['image'])) : ?>		
			<?php echo $this->Html->image('users/image/'. $user['User']['image'] . '?date=' . time()); ?>
        <?php endif ; ?>
        </td>
		<td>
        
        
        
		<?php if(!empty($user['User']['image_1'])) : ?>		
			<?php echo $this->Html->image('users/image_1/'. $user['User']['image_1'] . '?date=' . time()); ?>	
            
                 
            	
				<span class="pic_title_1" data-value="<?php echo $user['User']['pic_title_1']; ?>" data-pk="<?php echo $user['User']['id']; ?>">
                <p><?php echo $user['User']['pic_title_1']; ?></p>
                </span>
                
				<span class="attr_1" data-value="<?php echo $user['User']['attr_1']; ?>" data-pk="<?php echo $user['User']['id']; ?>">
                <p><?php echo $user['User']['attr_1']; ?></p>
                </span>
                
   
   
   
   
                

                </span>       
		<?php endif; ?>

		</td>
        		<td>
		<?php if(!empty($user['User']['image_2'])) : ?>		
			<?php echo $this->Html->image('users/image_2/'. $user['User']['image_2'] . '?date=' . time()); ?>		
				<div class="vendor-pic-info"><?php echo $this->Form->input('pic_title_2', array('label' => 'Tit 2')); ?></div>
				<div class="vendor-pic-info"><?php echo $this->Form->input('attr_2', array('label' => 'Att 2')); ?></div>       
		<?php endif; ?>

		</td>

		<td>
		<?php if(!empty($user['User']['image_3'])) : ?>		
			<?php echo $this->Html->image('users/image_3/'. $user['User']['image_3'] . '?date=' . time()); ?>		
				<div class="vendor-pic-info"><?php echo $this->Form->input('pic_title_3', array('label' => 'Tit 3')); ?></div>
				<div class="vendor-pic-info"><?php echo $this->Form->input('attr_3', array('label' => 'Att 3')); ?></div>       
		<?php endif; ?>

		</td>

		<td>
		<?php if(!empty($user['User']['image_3'])) : ?>		
			<?php echo $this->Html->image('users/image_4/'. $user['User']['image_4'] . '?date=' . time()); ?>		
				<div class="vendor-pic-info"><?php echo $this->Form->input('pic_title_4', array('label' => 'Tit 4')); ?></div>
				<div class="vendor-pic-info"><?php echo $this->Form->input('attr_4', array('label' => 'Att 4')); ?></div>       
		<?php endif; ?>

		</td>

		<td>
		<?php if(!empty($user['User']['image_4'])) : ?>		
			<?php echo $this->Html->image('users/image_4/'. $user['User']['image_4'] . '?date=' . time()); ?>		
				<div class="vendor-pic-info"><?php echo $this->Form->input('pic_title_4', array('label' => 'Tit 4')); ?></div>
				<div class="vendor-pic-info"><?php echo $this->Form->input('attr_4', array('label' => 'Att 4')); ?></div>       
		<?php endif; ?>

		</td>

		<td>
		<?php if(!empty($user['User']['image_5'])) : ?>		
			<?php echo $this->Html->image('users/image_5/'. $user['User']['image_5'] . '?date=' . time()); ?>		
				<div class="vendor-pic-info"><?php echo $this->Form->input('pic_title_5', array('label' => 'Tit 5')); ?></div>
				<div class="vendor-pic-info"><?php echo $this->Form->input('attr_5', array('label' => 'Att 5')); ?></div>       
		<?php endif; ?>

		</td>
        
        		<td>
		<?php if(!empty($user['User']['image_6'])) : ?>		
			<?php echo $this->Html->image('users/image_6/'. $user['User']['image_6'] . '?date=' . time()); ?>		
				<div class="vendor-pic-info"><?php echo $this->Form->input('pic_title_6', array('label' => 'Tit 6')); ?></div>
				<div class="vendor-pic-info"><?php echo $this->Form->input('attr_6', array('label' => 'Att 6')); ?></div>       
		<?php endif; ?>

		</td>


	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />


<div class="row">


	<?php if($this->Form->value('User.image_1') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_1/<?php echo $this->Form->value('User.image_1'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_1'); ?>
            <?php echo $this->Form->input('attr_1'); ?>
        </div>  
	<?php endif; ?>
                  
        
	<?php if($this->Form->value('User.image_2') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_2/<?php echo $this->Form->value('User.image_2'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_2'); ?>
            <?php echo $this->Form->input('attr_2'); ?>
         </div>       
	<?php endif; ?>
        
        
	<?php if($this->Form->value('User.image_3') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_3/<?php echo $this->Form->value('User.image_3'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_3'); ?>
            <?php echo $this->Form->input('attr_3'); ?>
          </div>               
	<?php endif; ?>
       

	<?php if($this->Form->value('User.image_4') !== '') : ?>
        <div class="span4">xxxx
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_4/<?php echo $this->Form->value('User.image_4'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_4'); ?>
            <?php echo $this->Form->input('attr_4'); ?>                
          </div>         
	<?php endif; ?>
        
        
	<?php if($this->Form->value('User.image_5') !== '') : ?>
        <div class="span4">dfgdfgdfg
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_5/<?php echo $this->Form->value('User.image_5'); ?>" />
             </div>   
                <?php echo $this->Form->input('pic_title_5'); ?>
                <?php echo $this->Form->input('attr_5'); ?>
			</div>            
         </div>
	<?php endif; ?>
        
        
	<?php if($this->Form->value('User.image_6') !== '') : ?>
        <div class="span4">
            <div style="height:245px">       
                <img class="article-img" src="/img/articles/image_6/<?php echo $this->Form->value('User.image_6'); ?>" />
             </div>   
            <?php echo $this->Form->input('pic_title_6'); ?>
            <?php echo $this->Form->input('attr_6'); ?>
        </div>        
	<?php endif; ?>
        
        
</div>





