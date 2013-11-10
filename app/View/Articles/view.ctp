<script>
	$(document).ready(function() {
		$('.article').columnize({ columns: 2 });
	});
</script>

<h1><?php echo $article['Article']['name']; ?></h1>

<div class="row">
	<div class="span9">


<div class="article">
	<?php echo $article['Article']['body']; ?>
</div>

<br />

<p>
	<?php echo date('m/d/Y', strtotime($article['Article']['created'])); ?>
</p>


<?php if(!empty($article['Article']['image_1'])) : ?>
	<?php echo $this->Html->image('articles/image_1/' .$article['Article']['image_1']); ?>
<?php endif ; ?>

<?php if(!empty($article['Article']['pic_title_1'])) : ?>
	<?php echo $article['Article']['image_1']; ?>
<?php endif ; ?>

<?php if(!empty($article['Article']['attribution_1'])) : ?>
	<?php echo $article['Article']['image_1']; ?>
<?php endif ; ?>

<?php if(!empty($article['Article']['product_link_1'])) : ?>
	<?php echo $this->Html->link('articles/image_1/' .$article['Article']['image_1']); ?>
<?php endif ; ?>

<?php if(!empty($article['Article']['recipe_link_1'])) : ?>
	<?php echo $this->Html->image('articles/image_1/' .$article['Article']['image_1']); ?>
<?php endif ; ?>


<br />
<br />


<?php if(!empty($article['Article']['image_2'])) : ?>
	<?php echo $this->Html->image('articles/image_2/' .$article['Article']['image_2']); ?>
<?php endif ; ?>
<br />
<br />
<?php if(!empty($article['Article']['image_3'])) : ?>
	<?php echo $this->Html->image('articles/image_3/' .$article['Article']['image_3']); ?>
<?php endif ; ?>
<br />
<br />
<?php if(!empty($article['Article']['image_4'])) : ?>
	<?php echo $this->Html->image('articles/image_4/' .$article['Article']['image_4']); ?>
<?php endif ; ?>
<br />
<br />
<?php if(!empty($article['Article']['image_5'])) : ?>
	<?php echo $this->Html->image('articles/image_5/' .$article['Article']['image_5']); ?>
<?php endif ; ?>
<br />
<br />
<?php if(!empty($article['Article']['image_6'])) : ?>
	<?php echo $this->Html->image('articles/image_6/' .$article['Article']['image_6']); ?>
<?php endif ; ?>

</div>
</div>