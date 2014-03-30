<div class="row">

   <div class="span3">
		<span class="vendor-logo">
			<a href="/"> <?php echo $this->Html->image('users/image/' . $user['User']['image'], array('width' =>'210px')); ?></a>
        </span>
	</div>
</div>

<div class="row" style="margin-top:25px">
   <div class="col-md-6">
      <h2 class="gb-heading">
      <?php echo $user['User']['name']; ?> Recipes
      </h3>
   </div>
   
</div>

<br />

<div class="row product" > 
   
   <!-- Include Recipes element --> 
   <?php echo $this->element('recipes'); ?>
   
</div>
   
<br />
<br />

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
<?php echo $this->element('pagination-counter'); ?> <?php echo $this->element('pagination'); ?> SHOW ALL <br />
