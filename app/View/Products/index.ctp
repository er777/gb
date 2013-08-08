<style type="text/css">
	.navList li a {
		<?php //echo $user['User']['awning_css']; ?>
	}
	.navList li ul.listTab li a, .navList li ul.listTab li {
		background-color:#fff;
	}
</style>

<?php if(!empty($user)) : ?>

<style type="text/css">
	.vendor-css {
		<?php echo $user['User']['awning_css']; ?>
	}
</style>

<?php
	$cat_crumb ="";
	$subcat_crumb ="";
	$subsubcat_crumb ="";
?>

<div class="row">

	<div class="span3" style="width:270px">

		<div class="gb-nav-container">

		<?php /*?><?php if(!empty($user)) : ?><?php */?>

			<div class="vendor-logo">
				<a href="/">
				<?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' => 'img-polaroid', 'width' =>'226')); ?>
				</a>

				<div class="name"><?php echo $user['User']['name']; ?></div>
				<div class="plain"><?php echo $user['User']['city']; ?>, <?php echo $user['User']['state']; ?></div>

				<div class="quote"><?php echo $user['User']['shop_quote']; ?></div>
			</div>

<hr />

			<a class="gb-nav" href="/">All Our Products</a>


			<?php if(!empty($category)) : ?><br /><span class="gb-nav"><img src="/img/global/dash-2.png"></span>

				<?php echo $this->Html->link($category['Category']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'])); ?>

				<?php $cat_crumb = $category['Category']['name']?>


			<?php endif; ?>

			<?php if(!empty($subcategory)) : ?>
				<br /><span class="gb-nav"><img src="/img/global/dash-4.png"></span><?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'])); ?>

				<?php $subcat_crumb = $subcategory['Subcategory']['name']?>

			<?php endif; ?>

			<?php if(!empty($subsubcategory)) : ?>
				<br /><span class="gb-nav"><img src="/img/global/dash-7.png"></span><?php echo $this->Html->link($subsubcategory['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'], $subsubcategory['Subsubcategory']['slug'])); ?>

				<?php $subsubcat_crumb = $subsubcategory['Subsubcategory']['name']?>

			<?php endif; ?>


			<div style="clear:both">

				<!-- Sub Sub Category Loop -->

				<?php if(!empty($subsubcategories)) : ?>

				<?php foreach ($subsubcategories as $subsubcategory): ?>

					<?php if ($subsubcat_crumb !== $subsubcategory['Subsubcategory']['name']) : ?>


						<span class="gb-nav"><img src="/img/global/dash-7.png"></span><?php echo $this->Html->link($subsubcategory['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'category', $subsubcategory['Category']['slug'], $subsubcategory['Subcategory']['slug'], $subsubcategory['Subsubcategory']['slug'])); ?><br />

				   <?php endif ; ?>

				<?php endforeach; ?>
			<?php endif; ?>



				<!-- Sub Category Loop -->

			<?php if(!empty($subcategories)) : ?>

				<?php foreach ($subcategories as $subcategory): ?>

					<?php //echo 'subcat_crumb:' . ($subcat_crumb)  .  '----subcategory:' . ($subcategory['Subcategory']['name']) .'<br />';?>

						<?php //if(!empty($subcat_crumb)) : ?>
							<?php if ($subcat_crumb !== $subcategory['Subcategory']['name']) : ?>
						<?php //endif; ?>

							<span class="gb-nav"><img src="/img/global/dash-4.png"></span><?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'category', $category['Category']['slug'], $subcategory['Subcategory']['slug'])); ?><br />

						<?php //if(!empty($subcat_crumb)) : ?>
							<?php endif; ?>
						<?php //endif; ?>


				<?php endforeach; ?>

			<?php endif; ?>


				<!-- Category Loop -->

				<?php if(!empty($usercategories)) : ?>

					<?php foreach ($usercategories as $usercategory): ?>
					<span class="gb-nav"><img src="/img/global/dash-2.png"></span>


					<?php echo $this->Html->link($usercategory['Category']['name'], array('controller' => 'products', 'action' => 'category', $usercategory['Category']['slug'])); ?><br />

					<?php endforeach; ?>

				<?php endif; ?>

				<?php /*?><?php
					$count = 1;
					foreach ($brands as $brand):
						echo $product['Brands']['name'];
						echo($count) . '<br />';
						$count++;
					endforeach; ?>
<?php */?>
			</div>





			<div style="clear:both">




		</div>

		<div style="clear:both">





		</div>
<hr />

		<ul class="navList">
					<li><a class="vendor-css" href="#" id="story">Our Story</a></li>

		</ul>


		<!-- Vendor Story -->
		<div id="story_content" style="display:none;color:#000;width:960px;background-color:#fff;padding:20px;">
			<span class="b-close btn-gb"><span>X</span></span>

			<div class="row">
				<div class="span4 left-corner-air">
					<?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' =>'frame vendor-article-logo')); ?>
				</div>

				<div class="span6 quote-air">

						<div class="vendor-special vendor-css">
							<blockquote>
								<?php echo $user['User']['shop_quote'] ?>

								<div class="signature"><?php echo $user['User']['shop_signature'] ?></div>
							</blockquote>
						</div>

				</div>
			</div>

			<div class="row">

				<div class="span8 vendor-block">

					<div id="vendor-group">

						<div id="vendor-article">
							<?php echo $user['User']['shop_description'] ?>
						</div>


					</div>

				</div>



		<!-- Vendor Story Pics -->
				<div class="span4">

					<div class="span4 air">
					<?php if(!empty($user['User']['image_1'])) : echo $this->Html->image('users/image_1/' . $user['User']['image_1'], array('class' =>'vendor-pic')); ?>
                    <div class="attr"><?php echo $user['User']['attr_1']; ?></div>
					<div class="title"><?php echo $user['User']['pic_title_1']; ?></div>
					<?php endif ?>
					</div>

					<div class="span4 air">
					<?php if(!empty($user['User']['image_2'])) : echo $this->Html->image('users/image_2/' . $user['User']['image_2'], array('class' =>'vendor-pic')); ?>
					<div class="attr"><?php echo $user['User']['attr_2']; ?></div>
                    <div class="title"><?php echo $user['User']['pic_title_2']; ?></div>
					<?php endif ?>
					</div>

					<div class="span4 air">
					<?php if(!empty($user['User']['image_3'])) : echo $this->Html->image('users/image_3/' . $user['User']['image_3'], array('class' =>'vendor-pic')); ?>
					<div class="attr"><?php echo $user['User']['attr_3']; ?></div>
					<div class="title"><?php echo $user['User']['pic_title_3']; ?></div>
					<?php endif ?>
					</div>

					<div class="span4 air">
					<?php if(!empty($user['User']['image_4'])) : echo $this->Html->image('users/image_4/' . $user['User']['image_4'], array('class' =>'vendor-pic')); ?>
					<div class="attr"><?php echo $user['User']['attr_4']; ?></div>
					<div class="title"><?php echo $user['User']['pic_title_4']; ?></div>
					<?php endif ?>
					</div>

					<div class="span4 air">
					<?php if(!empty($user['User']['image_5'])) : echo $this->Html->image('users/image_5/' . $user['User']['image_5'], array('class' =>'vendor-pic'));  ?>
					<div class="attr"><?php echo $user['User']['attr_5']; ?></div>
					<div class="title"><?php echo $user['User']['pic_title_5']; ?></div>
    				<?php endif ?>
					</div>

					<div class="span4 air">
					<?php if(!empty($user['User']['image_6'])) : echo $this->Html->image('users/image_6/' . $user['User']['image_6'], array('class' =>'vendor-pic')); ?>
					<div class="attr"><?php echo $user['User']['attr_6']; ?></div>
					<div class="title"><?php echo $user['User']['pic_title_6']; ?></div>
    				<?php endif ?>
					</div>

				</div>

			</div>

		</div>

		<ul class="navList">
			<li><a class="vendor-css" href="/recipes">Our Recipes</a></li>
		</ul>

		<!--<ul class="navList">
					<li><a href="#vendor-unit">Our Regions</a></li>
		</ul>-->

		</div>

		<div>
			<?php $vendor_policy = $user['User']['shipping_policy']; ?>
			<br />

			<a href="#" id="policies" class="btn btn-gb">SHIPPING & CUSTOMER SERVICE</a>

		<!--<span><img class="hand" src="/img/global/hand.png" width="40px"/></span>-->
		</div>



			<!-- Element to pop up -->
			<div id="policy_content">
			<div class="policy-heading ">Customer Satisfaction, Shipping and Return Policy</div>
			 <hr />
				<div class="pad"><?php echo ($vendor_policy); ?>
				</div>
			</div>
			<br />


		<!-- Vendor Sidebar Pics -->

		<div class="vendor-sidebar-pics">


			<?php if(!empty($user['User']['image_1'])) :
						echo $this->Html->image('users/image_1/' . $user['User']['image_1'], array('class' => 'img-polaroid'));
					endif ?>

			<?php if(!empty($user['User']['image_2'])) :
						echo $this->Html->image('users/image_2/' . $user['User']['image_2'], array('class' => 'img-polaroid'));
					endif ?>



			<?php endif; ?>
		</div>

</div>


	<div class="span8" style="width:690px;margin-left:0px;">




		<!--<ul class="breadcrumb vendor-index">


				<li><?php //echo $user['User']['name']; ?></li>

			<div style="float:right">

				<?php //echo $this->Html->link($category['Category']['name'], array('controller' => 'products', 'action' => 'category', 'slug' => $category['Category']['slug'])); ?>

				<?php /*?>	<?php if(!empty($subcategory)) : ?>&nbsp;/&nbsp;
				<?php echo $this->Html->link($subcategory['Subcategory']['name'], array('controller' => 'products', 'action' => 'subcategory', 'slug' => $subcategory['Subcategory']['id'])); ?>
				<?php endif; ?>&nbsp;
				<?php if(!empty($subsubcategory)) : ?>&nbsp;/&nbsp;
					<?php echo $this->Html->link($subsubcategory['Subsubcategory']['name'], array('controller' => 'products', 'action' => 'subsubcategory', 'slug' => $subsubcategory['Subsubcategory']['id'])); ?>
				<?php endif; ?><?php */?>
			</div>


		</ul>
-->

		<div class="awning">

			<!--<div id="div1">
				<div id="div2">
					<?php echo $this->Html->image('users/image/'. $user['User']['image']); ?>
				</div>​
			</div>
-->
			<style>
			#awning1 {
				<?php echo $user['User']['awning_css']; ?>
			}
			</style>

			<img id="awning1" src="/img/users/awning/default.png" />

			<div id="awning-text-wrapper">

				<div id="awning-text"><?php echo $user['User']['name']; ?></div>

			</div>

		<div class="top-product-block">


			<div class="section-subheading vendor-category">

				<!--Logic to show where we are -->

			<?php if(!empty($subsubcat_crumb)) : ?>
				<?php echo ($subsubcat_crumb); ?>

			<?php elseif (!empty($subcat_crumb)) : ?>
				<?php echo ($subcat_crumb); ?>

			<?php elseif (!empty($cat_crumb)) : ?>
				<?php echo ($cat_crumb); ?>
			<?php endif; ?>


			</div>

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

							<div class="brand"><?php echo $user['User']['name']; ?></div>

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

            <?php $more = ($product['User']['more']); ?>

            <?php if($more == 1) : ?>
			<div class="more btn-gb">More products to come!</div>
            <?php endif; ?>

			<div style="clear:both" id="vendor-unit"></div>

			<div class="row">
				<div class="span12 pagination-block">

					<!--<span class="pagination-counter"<?php //echo $this->element('pagination-counter'); ?></span>-->
					<?php echo $this->element('pagination'); ?>

				</div>
			</div>

		</div>

	</div>

	</div>

</div>
