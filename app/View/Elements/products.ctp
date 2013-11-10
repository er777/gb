<div class="row product">
	<?php
		$i = 0;
		foreach ($products as $product):
		$i++;
		//if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
	?>
	<div class="span2">

		<div class="content-product">
			<div class="displaygroup"><?php echo $product['Product']['displaygroup']; ?></div>
			<div class="product-pic">
				<?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('class' =>'show','url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'])); ?>
				<div class="product-name">
					<a href="/product/<?php echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>">
					<?php echo $this->Text->truncate($product['Product']['name'], 36, array('ellipsis' => '...', 'exact' => 'false')); ?>
					</a>
				</div>
			</div>
			<div class="price">$<?php echo $product['Product']['price']; ?></div>

			<?php if(!empty($product['Brand']['name'])) : ?>
				<div class="brand"><?php echo $product['Brand']['name']; ?></div>
			<?php else : ?>
				<div class="brand"><?php echo $product['User']['name']; ?></div>
			<?php endif; ?>
		</div>
	</div>
	<?php
	if (($i % 4) == 0) {
		echo "</div>\n\n\t\t<div class=\"row product\">\n\n";
	}
	endforeach;
	?>
</div>