<div class="row">
	<div class="span3" style="width:270px">
		<div style="margin-bottom:20px;margin-left:0px;">
			<img style="width:235px" src="/img/traditions/image_logo/<?php echo ($tradition['Tradition']['logo_image']); ?>" />
		</div>



		<?php /*?><div style="height:38px;">
			<ul class="navList gb-">
				<li><a href="#">About Each Region</a>
					<!-- This is the sub nav -->
					<ul class="listTab">
					<?php foreach ($countries_list as $key => $value): ?>
						<?php //foreach ($traditions as $trad): ?>
							<li><?php echo $this->Html->link($value, '#' . $value); ?></li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div>
<?php */?>
		<div class="tradition-summary">
        <span class="gb-heading"><?php echo h($tradition['Tradition']['name']); ?>: </span>
			<?php echo ($tradition['Tradition']['summary']); ?>
			<a style="font-style:italic" href="/articles/excellent-food-advenures/<?php echo $tradition['Tradition']['slug']; ?>">Read more</a>

		</div>
		
		<div class="gb-heading">Other Intl Traditions: </div>
        <div class="gb-heading red list" style="font-size:120%;margin-left:28px">
        <?php foreach ($traditions as $tradition): ?>
                <?php echo $this->Html->link($tradition['Tradition']['name'], array('controller' => 'traditions', 'action' => 'view', $tradition['Tradition']['slug'])); ?><br />
        <?php endforeach; ?>
        </div>

		
		
		<div class="gb-heading">Brands: </div>
       
        <?php foreach ($brands as $brandslink): ?>
		 <span class="gb-nav"><img src="/img/global/dash-2.png"></span>
        <?php echo $this->Html->link($brandslink['Brand']['name'], array('controller' => 'traditions', 'action' => 'view',$fst,'brand',$brandslink['Brand']['slug'])); ?>
         <br />
        <?php endforeach; ?>
       
	</div>

	<div class="span8" style="width:690px;margin-left:0px;">

		<div class="awning">

			<?php if (($tradition['Tradition']['awning_image'])) :
					echo $this->Html->image('/img/traditions/awning_image/'. $tradition['Tradition']['awning_image']);
				else :
					echo ' <img src="/img/traditions/awning_image/default.jpg" /> ';
				endif;
			?>

		</div>

		<div class="section-subheading">
		<?php
			echo $this->here;
		?>
		</div>


		<?php echo $this->element('products'); ?>

		<?php // echo $this->element('pagination-counter'); ?>

		<?php echo $this->element('pagination'); ?>

		<br />
		<br />

	</div>
</div>

