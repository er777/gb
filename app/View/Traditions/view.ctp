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

		<br />

		<div class="row product">

			<?php
			$i = 0;
			foreach ($products as $product):
			$i++;
			//if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
			?>

			<div class="span2">

				<div class="content-product">

					<div class="content-img">
                    
                    <div class="displaygroup"><?php echo $product['Product']['displaygroup']; ?></div>
                    
					<?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'class' => 'img-polaroid img180')); ?>

						<div class="product-name">
							<?php echo $this->Html->link($this->Text->truncate($product['Product']['name'], 40, array('ellipsis' => '...', 'exact' => 'false')), array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug'])); ?>
						</div>

					</div>

				<div class="price">$<?php echo $product['Product']['price']; ?></div>

				<div class="brand"><?php  echo $this->Html->link($product['User']['name'], array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'index')); ?></div>

				</div>
			</div>

			<?php
			if (($i % 4) == 0) { echo "</div>\n\n\t\t<div class=\"row product\">\n\n";}
			endforeach;
			?>

		</div>

		<?php echo $this->element('pagination-counter'); ?>

		<?php echo $this->element('pagination'); ?>

		<br />
		<br />

	</div>
</div>

