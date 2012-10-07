<div class="ustraditions view">
<h2><?php  echo __('Ustradition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('States'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['states']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Summary'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['summary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Article'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['article']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Main Image'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['main_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image 1'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['image_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image 2'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['image_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image 3'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['image_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image 4'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['image_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image 5'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['image_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image 6'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['image_6']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ustradition['Ustradition']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ustradition'), array('action' => 'edit', $ustradition['Ustradition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ustradition'), array('action' => 'delete', $ustradition['Ustradition']['id']), null, __('Are you sure you want to delete # %s?', $ustradition['Ustradition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ustraditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ustradition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($ustradition['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Category Name'); ?></th>
		<th><?php echo __('Subcategory Id'); ?></th>
		<th><?php echo __('Subcategory Name'); ?></th>
		<th><?php echo __('Subsubcategory Id'); ?></th>
		<th><?php echo __('Subsubcategory Name'); ?></th>
		<th><?php echo __('Upc'); ?></th>
		<th><?php echo __('Vendor Sku'); ?></th>
		<th><?php echo __('Brand'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Long Description'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Image Original'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Imageold'); ?></th>
		<th><?php echo __('Image 1'); ?></th>
		<th><?php echo __('Image 2'); ?></th>
		<th><?php echo __('Image 3'); ?></th>
		<th><?php echo __('Image 4'); ?></th>
		<th><?php echo __('Image 5'); ?></th>
		<th><?php echo __('Featured Product'); ?></th>
		<th><?php echo __('Gift Product'); ?></th>
		<th><?php echo __('Cost'); ?></th>
		<th><?php echo __('List Price'); ?></th>
		<th><?php echo __('Selling Price'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Taxable'); ?></th>
		<th><?php echo __('Traditions'); ?></th>
		<th><?php echo __('Ustradition Id'); ?></th>
		<th><?php echo __('Measurement'); ?></th>
		<th><?php echo __('Weight Unit'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Shipping Weight'); ?></th>
		<th><?php echo __('Volume'); ?></th>
		<th><?php echo __('Volume Unit'); ?></th>
		<th><?php echo __('Dimension Unit'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Length'); ?></th>
		<th><?php echo __('Width'); ?></th>
		<th><?php echo __('Ingredients'); ?></th>
		<th><?php echo __('Nutrition'); ?></th>
		<th><?php echo __('Recipes'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Creation'); ?></th>
		<th><?php echo __('Allergen Free'); ?></th>
		<th><?php echo __('Gluten Free'); ?></th>
		<th><?php echo __('Vegetarian'); ?></th>
		<th><?php echo __('Fat Free'); ?></th>
		<th><?php echo __('Sugar Free'); ?></th>
		<th><?php echo __('No Msg'); ?></th>
		<th><?php echo __('Lactose Free'); ?></th>
		<th><?php echo __('Low Carb'); ?></th>
		<th><?php echo __('Nut Free'); ?></th>
		<th><?php echo __('Heart Smart'); ?></th>
		<th><?php echo __('No Preservatives'); ?></th>
		<th><?php echo __('Organic'); ?></th>
		<th><?php echo __('Kosher'); ?></th>
		<th><?php echo __('Halal'); ?></th>
		<th><?php echo __('Fair Traded'); ?></th>
		<th><?php echo __('Give Back'); ?></th>
		<th><?php echo __('Heat Sensitivity'); ?></th>
		<th><?php echo __('All Natural'); ?></th>
		<th><?php echo __('Award Winning'); ?></th>
		<th><?php echo __('Related Products'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ustradition['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['user_id']; ?></td>
			<td><?php echo $product['category_id']; ?></td>
			<td><?php echo $product['category_name']; ?></td>
			<td><?php echo $product['subcategory_id']; ?></td>
			<td><?php echo $product['subcategory_name']; ?></td>
			<td><?php echo $product['subsubcategory_id']; ?></td>
			<td><?php echo $product['subsubcategory_name']; ?></td>
			<td><?php echo $product['upc']; ?></td>
			<td><?php echo $product['vendor_sku']; ?></td>
			<td><?php echo $product['brand']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['slug']; ?></td>
			<td><?php echo $product['description']; ?></td>
			<td><?php echo $product['long_description']; ?></td>
			<td><?php echo $product['tags']; ?></td>
			<td><?php echo $product['image_original']; ?></td>
			<td><?php echo $product['image']; ?></td>
			<td><?php echo $product['imageold']; ?></td>
			<td><?php echo $product['image_1']; ?></td>
			<td><?php echo $product['image_2']; ?></td>
			<td><?php echo $product['image_3']; ?></td>
			<td><?php echo $product['image_4']; ?></td>
			<td><?php echo $product['image_5']; ?></td>
			<td><?php echo $product['featured_product']; ?></td>
			<td><?php echo $product['gift_product']; ?></td>
			<td><?php echo $product['cost']; ?></td>
			<td><?php echo $product['list_price']; ?></td>
			<td><?php echo $product['selling_price']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td><?php echo $product['taxable']; ?></td>
			<td><?php echo $product['traditions']; ?></td>
			<td><?php echo $product['ustradition_id']; ?></td>
			<td><?php echo $product['measurement']; ?></td>
			<td><?php echo $product['weight_unit']; ?></td>
			<td><?php echo $product['weight']; ?></td>
			<td><?php echo $product['shipping_weight']; ?></td>
			<td><?php echo $product['volume']; ?></td>
			<td><?php echo $product['volume_unit']; ?></td>
			<td><?php echo $product['dimension_unit']; ?></td>
			<td><?php echo $product['height']; ?></td>
			<td><?php echo $product['length']; ?></td>
			<td><?php echo $product['width']; ?></td>
			<td><?php echo $product['ingredients']; ?></td>
			<td><?php echo $product['nutrition']; ?></td>
			<td><?php echo $product['recipes']; ?></td>
			<td><?php echo $product['country']; ?></td>
			<td><?php echo $product['creation']; ?></td>
			<td><?php echo $product['allergen_free']; ?></td>
			<td><?php echo $product['gluten_free']; ?></td>
			<td><?php echo $product['vegetarian']; ?></td>
			<td><?php echo $product['fat_free']; ?></td>
			<td><?php echo $product['sugar_free']; ?></td>
			<td><?php echo $product['no_msg']; ?></td>
			<td><?php echo $product['lactose_free']; ?></td>
			<td><?php echo $product['low_carb']; ?></td>
			<td><?php echo $product['nut_free']; ?></td>
			<td><?php echo $product['heart_smart']; ?></td>
			<td><?php echo $product['no_preservatives']; ?></td>
			<td><?php echo $product['organic']; ?></td>
			<td><?php echo $product['kosher']; ?></td>
			<td><?php echo $product['halal']; ?></td>
			<td><?php echo $product['fair_traded']; ?></td>
			<td><?php echo $product['give_back']; ?></td>
			<td><?php echo $product['heat_sensitivity']; ?></td>
			<td><?php echo $product['all_natural']; ?></td>
			<td><?php echo $product['award_winning']; ?></td>
			<td><?php echo $product['related_products']; ?></td>
			<td><?php echo $product['active']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>