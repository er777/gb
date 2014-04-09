<?php if($ajax != 1): ?>

	<h1>Your search returned the following items:</h1>
	<br />
	<br />
	<div style="float:right;"> <?php echo $this->Form->create('Product', array('type' => 'GET',)); ?> </div>
	
	<div class="row">
						<div class="col-md-3"> <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'col-md-3', 'autocomplete' => 'off', 'value' => $search)); ?> </div>
						<div class="col-md-2"> <?php echo $this->Form->button('Search', array('div' => false, 'class' => 'btn btn-primary')); ?> </div>
	</div>
	
						<?php echo $this->Form->end(); ?>
	<br />
<?php endif; ?>


	<?php // echo $this->Html->script('search.js', array('inline' => false)); ?>
	
	<?php if(!empty($search)) : ?>
		<?php if(!empty($products)) : ?>
						
			<div class="row">
				<?php foreach ($products as $product): ?>
	
				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 search-result-frame">
				
					<div class="wrap">
						<div class="search-image"> <?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'],  'class' => 'search-result')); ?>
						</div>
														
						<div class="product-name">
							<a href="/product/<?php echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>"> <?php echo $this->Text->truncate(																															$product['Product']['name'],23, array('ellipsis' => '...','exact' => 'false')); ?></a>
						</div>
																																			
						<div class="brand-search"><?php echo $product['User']['name']; ?></div>
														
						<div class="search-price"> $<?php echo $product['Product']['price']; ?> </div>
														
						<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shops', 'action' => 'add'))); ?> <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?> <?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-success', 'escape' => false));?>
					</div>	
				</div>
				<?php endforeach; ?>
				<?php echo $this->Form->end();?>
												

				
				

			</div>
			
			<br />
			<br />
			<br />
		
		<?php else: ?>
<h3>No Results</h3>

<?php endif; ?>
<?php endif; ?>
