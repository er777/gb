<div id="upper magazine">

	<div id="welcome_content">
           
            <hr />
            <div style="text-align:center">
				
            </div>
           
        </div>


	<div id="magazine-landing">

 <?php echo $magazine_landing['Content']['body']; ?>
 
	</div>

</div>

<div id="lower">

	<div class="center explain gb-heading">MAGAZINE ARTICLES & BLOGS</div>

	<div class="row-fluid">
  

		<?php
		$i = 0;
		foreach($blocks as $block) :
		$i++;
		//if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
		?>

		<div class="span4 gb-box-front">

		<a href="<?php echo $block['Block']['link'];?>">				
			<div class="img-box">
				<?php echo $this->Html->image('article-categories/' . $block['Block']['image']); ?>
				
				<p class="gb-heading blocks"><?php echo $block['Block']['name']; ?></p>
				
				<?php echo $block['Block']['subtitle']; ?>
			</div>
		</a>

		</div>

		<?php if (($i % 3) == 0) { echo "</div>\n\n\t\t<div class=\"row-fluid\">\n\n";} ?>

		<?php endforeach; ?>

	</div>

</div>
