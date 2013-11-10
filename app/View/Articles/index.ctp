<script>

$(".collapse").collapse()

</script>



	<?php if(!isset($article['Article'])){ ?>
	<!-- FOR EXCELLENT ADVENTURES BLOCKS LANDING PAGE -->

<div class="row">
	<div class="span3"> <br />
		<p class="gb-heading">Magazine Sections</p>

		<?php // NAVIGATION
				echo "<br>";
				foreach($blocks as $blockskey)
				{

					echo '<div class="gb-heading red list" style="font-size:120%;">';
					echo $this->Html->link($blockskey['Block']['name'], '/articles/'.$blockskey['Block']['slug'], array('class' => 'basic-info-'.$blockskey['Block']['id'], 'onmouseover' => 'overlay('.$blockskey['Block']['id'].')'));
					?>
	<div class="art-list" style="position: absolute; display: none;" id="populate-overlay-<?php echo $blockskey['Block']['id']?>"><br>
		<?php
						foreach($blockskey['Article'] as $articlekey) {
							if ($articlekey['active'] == 1) {
								echo "<p>";
								echo $this->Html->link( $articlekey['name'], '/articles/'.$blockskey['Block']['slug']."/".$articlekey['slug']);
								echo "</p>";
							}
						}
						echo "</div>";
					// Main div closing
					echo "</div>";
				}
				// END NAVIGATION
		?>

	</div>

	<div>

	<div class="span9">
		<?php if(!empty($article['Block']['image'])) : ?>
			<img class="article-pic img-polaroid index" style="float:right;" src="/img/blocks/image/<?php echo $article['Block']['image']?>"  />
		<?php endif ; ?>

		<h3 class="article-name"><?php echo $article['Block']['name']; ?></h3>
		<p class="article-description"> <?php echo $article['Block']['writeup']; ?> </p>


		<?php $trigger = $article['Block']['id']; ?>

		<p class="gb-heading air20">Articles in this Section:</p>

		<?php if ($trigger == 2) { ?>


	<ul class="nav nav-tabs" id="myTab">
		<li class="active"><a href="#intl" data-toggle="tab" class="section-subheading">International</a></li>
		<li><a href="#us" data-toggle="tab"class="section-subheading">US</a></li>
		<li><a href="#fusion" data-toggle="tab"class="section-subheading">Fusion Ideas</a></li>
		<li><a href="#trends" data-toggle="tab"class="section-subheading">Hot Food & Beverage Trends</a></li>

	</ul>

	<div class="tab-content article-tabs">

		<div class="tab-pane active" id="intl">

			<p class="gb-heading">INTERNATIONAL CULINARY TRADITIONS</strong></p>
       
			<?php 
				foreach($blocks as $blockskey) {
			?>
                <div>
                <?php
                if (($blockskey['Block']['id']) == 2) :
					foreach($blockskey['Article'] as $articlekey) {
						if (($articlekey['active'] == 1) && ($articlekey['group_id'] == 1)) {
							echo '<p><span class="prefix">';
							echo ($articlekey['prefix']) .': ';
							echo '</span>';
							echo $this->Html->link( $articlekey['name'], '/articles/'.$blockskey['Block']['slug']."/".$articlekey['slug'],array('class' => array('gb-heading','article')));
							echo "</p>";
						}
					}
                        
                    ?>
                </div>
                <?php endif;  ?>
         </div>       
            <?php
			}
		?>                
                
         




		<div class="tab-pane" id="us">

			<p class="gb-heading">US REGIONAL CULINARY TRADITIONS</p>

<?php 
				foreach($blocks as $blockskey) {
			?>
                <div>
                <?php
                if (($blockskey['Block']['id']) == 2) :
					foreach($blockskey['Article'] as $articlekey) {
						if (($articlekey['active'] == 1) && ($articlekey['group_id'] == 2)) {
							echo '<p><span class="prefix">';
							echo ($articlekey['prefix']) .': ';
							echo '</span>';
							echo $this->Html->link( $articlekey['name'], '/articles/'.$blockskey['Block']['slug']."/".$articlekey['slug'],array('class' => array('gb-heading','article')));
							echo "</p>";
						}
					}
                        
                    ?>
                </div>
                <?php endif;  ?>
         </div>       
            <?php
			}
		?>                
		

		<div class="tab-pane" id="fusion">
			Coming Soon!
		</div>

		<div class="tab-pane" id="trends">
			Coming Soon!
		</div>


	</div>

</div>
			<br />


			<?php }


	// FOR ALL OTHER BLOCKS LANDING PAGE -->


 else {

	foreach($blocks as $blockskey) {
			if ($trigger == ($blockskey['Block']['id'])) : ?>
		<?php
				foreach($blockskey['Article'] as $articlekey)
					if ($articlekey['active'] == 1) {
						{
							echo "<p>";
							
							echo $this->Html->link( $articlekey['name'], '/articles/'.$blockskey['Block']['slug']."/".$articlekey['slug'], array('class' => 'gb-heading article'));

							if (!empty($articlekey['prefix'])) {

								echo "<span class='prefix'>";
								echo $articlekey['prefix'] . ' : &nbsp;&nbsp;';
								echo "</span>";
							}

							
							echo "</p>";
						}
					}
				//echo "</div>";
				// Main div closing
				echo "</div>";

			endif;
			}

			?>
	</div>


<?php	}
		?>

<?php }else{ ?>

<!-- FOR ARTICLE CONTENT -->






<div class="row">


	<div class="span4">
		<br />
		<p class="gb-heading">Magazine Sections</p>
        <hr />


		<?php // NAVIGATION
				//echo "<br>";
				foreach($blocks as $blockskey)
				{

					echo '<div class="gb-heading red list" style="font-size:120%;">';
					echo $this->Html->link($blockskey['Block']['name'], '/articles/'.$blockskey['Block']['slug'], array('class' => 'basic-info-'.$blockskey['Block']['id'], 'onmouseover' => 'overlay('.$blockskey['Block']['id'].')'));
					?>
	<div class="art-list" style="position: absolute; display: none;" id="populate-overlay-<?php echo $blockskey['Block']['id']?>"> <a href="#" class="close-x">[ x ]</a> <br>
		<?php
						foreach($blockskey['Article'] as $articlekey) {
							if ($articlekey['active'] == 1) {
								echo "<p>";
								echo $this->Html->link( $articlekey['name'], '/articles/'.$blockskey['Block']['slug']."/".$articlekey['slug']);
								echo "</p>";
							}
						}
						echo "</div>";
					// Main div closing
					echo "</div>";
				}
				// END NAVIGATION
		?>


<div class="xtra-images">

	<!-- IMAGEs-->

	<?php $i = 2; ?>
	<?php $item = 2; ?>

		<?php while ($item < 6) { ?>

			<?php $image = 'image_' . $item; ?>
			<?php $attr = 'attribution_' . $item; ?>
			<?php $title = 'pic_title_' . $item; ?>
			<?php $linkp = 'product_link_' . $item; ?>
			<?php $linkr = 'recipe_link_' . $item; ?>

				<?php
				//echo ($image.'--'.$attr.'--'.$title.'--'.$linkp.'--'.$linkr );
				//die ; ?>

				<?php if(!empty($article['Article'][$image])) : ?>

					<?php if(!empty($article['Article'][$title]) ||  ($article['Article'][$linkp])	||  ($article['Article'][$linkr])) : ?>
						<div class="article-pic-container left fit">
					<?php else: ?>
						<div class="article-pics-container tight left">
					<?php endif; ?>

						<img class="article-pic img-polaroid" src="/img/articles/<?php echo $image ; ?>/<?php echo $article['Article'][$image]?>"  />

					

						<?php if(!empty($article['Article'][$attr])) : ?>
							<div class="photo-attr">
								<span>Photo:&nbsp;
									<?php echo $article['Article'][$attr]; ?>
								</span>
							</div>
						<?php endif ; ?>

						<?php if(!empty($article['Article'][$title])) : ?>
							<div class="pic-title">
								<?php echo $article['Article'][$title]; ?>
							</div>
						<?php endif ; ?>

						<?php if(!empty($article['Article'][$linkp])) : ?>
							<?php echo $this->Html->link('Product', $article['Article'][$linkp],array(
								'class' => 'btn gray-button btn-mini',
								'target' => '_self'
								)
							); ?>
						<?php endif ; ?>

						<?php if(!empty($article['Article'][$linkr])) : ?>
							<?php echo $this->Html->link('Recipe', $article['Article'][$linkr],array(
								'class' => 'btn gray-button btn-mini right',
								'target' => '_self'
								)
							); ?>
						<?php endif ; ?>
					</div>
				<?php endif ; ?>


				<?php $item++; ?>

				<?php } ?>


	</div>

</div>



<div class="span8 article">

	<h2 class="gb-heading">
	<?php echo $article['Article']['name']; ?> :
	<?php if (!empty($article['Article']['prefix'])) {
				echo $article['Article']['prefix']; ?>
	<?php } ?>

	</h2>
	<hr class="article-divide">

	<div class="article-body" style="float:right;">



	<?php if(!empty($article['Article']['attribution_1']) ||
		($article['Article']['pic_title_1'])	||
		($article['Article']['product_link_1'])		||
		($article['Article']['product_link_1'])) : ?>

		<div class="article-pic-container">

	<?php else: ?>

		<div class="article-pic-container tight">

	<?php endif; ?>


			<?php if(!empty($article['Article']['image_1'])) : ?>
				<img class="article-pic img-polaroid" src="/img/articles/image_1/<?php echo $article['Article']['image_1']?>"  /><br />
			<?php endif ; ?>

			<?php if(!empty($article['Article']['attribution_1'])) : ?>
				<div class="photo-attr">
					<span>Photo:&nbsp;
						<?php echo $article['Article']['attribution_1']; ?>
					</span>
				</div>
			<?php endif ; ?>


			<?php if(!empty($article['Article']['pic_title_1'])) : ?>
				<div class="pic-title">
					<?php echo $article['Article']['pic_title_1']; ?>
				</div>
			<?php endif ; ?>



			<?php if(!empty($article['Article']['product_link_1'])) : ?>
				<?php echo $this->Html->link('Product', $article['Article']['product_link_1'],array(
					'class' => 'btn gray-button btn-mini',
					'target' => '_self'
					)
				); ?>
			<?php endif ; ?>

			<?php if(!empty($article['Article']['recipe_link_1'])) : ?>
				<?php echo $this->Html->link('Recipe', $article['Article']['recipe_link_1'],array(
					'class' => 'btn gray-button btn-mini right',
					'target' => '_self'
					)
				); ?><br />
			<?php endif ; ?>

		</div>


		<?php echo $article['Article']['body']; ?>
        
        
        <?php if(!empty($article['Article']['source'])) : ?>
        
        <div class="section-subheading">Want to learn more? Go the <button type="button" class="btn btn-danger source" data-toggle="collapse" data-target="#demo-last"><span class="source-title ">Source</span></button>
        </div>
        
         
        <div id="demo-last" class="collapse">
        	<div class="weblinks">Web Links:</div>
        	<?php echo $article['Article']['source']; ?>
    	</div>
        
        <?php endif; ?>
        
	</div>


	<br />
	<?php
			}
		?>


	<?php //echo $pagination->paginateContent($content_for_layout); ?> 


</div>

<div class="row">






	</div>
</div>


