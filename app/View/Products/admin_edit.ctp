<?php echo $this->Html->script(array('jquery.chained.js'), array('inline' => false)); ?>

<?php echo $this->Html->script('/ckeditor/ckeditor.js', array('inline' => false)); ?>

<script type="text/javascript">
//	tinyMCE.init({
//		selector: "textarea",
//		 plugins: [
//        "advlist autolink lists link preview anchor",
//        "visualblocks code fullscreen",
//        "contextmenu paste spellchecker"
//    	],
//    	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
//});


CKEDITOR.replace( 'textarea', {
    toolbar: 'Basic',
    uiColor: '#9AB8F3',
});


</script>

<script type="text/javascript">

$(document).ready(function(){

	$("#ProductSubcategoryId").chained("#ProductCategoryId");
	$("#ProductSubsubcategoryId").chained("#ProductSubcategoryId");

});

</script>

<script>
	$(function() {

		$('#monthpicker').monthpicker();

	});


		//$(function() {
	//		$( "#datepicker" ).datepicker();
	//		$( "#datepicker" ).datepicker({ changeMonth: true,
	//        	changeYear: true,
	//        	showButtonPanel: true,
	//        	dateFormat: 'MM yy' });
	//
	//		// getter
	////var changeYear = $( ".selector" ).datepicker( "option", "changeYear" );
	//		// setter
	//		$( "#datepicker" ).datepicker( "option", "changeYear", true );
	//		$( "#datepicker" ).datepicker({ gotoCurrent: true });
	//		// getter
	//		var gotoCurrent = $( ".selector" ).datepicker( "option", "gotoCurrent" );
	//		// setter
	//		$( "#datepicker" ).datepicker( "option", "gotoCurrent", true );
	//	});
	//


  </script>



<h2>Admin Edit Product</h2>

<?php echo $this->Form->create('Product'); ?>
<?php echo $this->Form->input('id'); ?>


<div class="row">

	<div class="span3">
		<?php echo $this->Form->input('user_id'); ?>
	</div>

    <div class="span3 offset3">
			<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?><br />
            <?php echo $this->Form->input('show', array('type' => 'checkbox', 'label' => 'Show')); ?><br />

		</div>

	<div class="span3 offset6 ">

		<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>

	</div>


</div>

<div class="row">

		<div class="span3">
			<?php echo $this->Form->input('name'); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('category_id', array('empty' => '-')); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('subcategory_id', array('empty' => '-')); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('subsubcategory_id', array('empty' => '-')); ?>
		</div>

</div>

<div class="row">

		<div class="span3">
			<?php echo $this->Form->input('auxcategory_1', array('label' => 'Aux Category 1', 'options' => $categories, 'empty' => '')); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('auxcategory_2', array('empty' => 'Aux Category 2', 'options' => $categories, 'empty' => '')); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('auxcategory_3', array('empty' => 'Aux Category 3', 'options' => $categories, 'empty' => '')); ?>
		</div>

</div>

<div class="row">

	<div class="span3">
		<?php echo $this->Form->input('slug'); ?>
	</div>

	<div class="span3">
		<?php echo $this->Form->input('brand_id', array('empty' => '--')); ?>
	</div>

	<div class="span3">
		<?php echo $this->Form->input('upc'); ?>
	</div>

	<div class="span3">
		<?php echo $this->Form->input('vendor_sku'); ?>
	</div>

</div>

<br />
<br />

<div class="row">

	<div class="span2">
		<?php echo $this->Form->input('displaygroup', array('label' => 'Display Group Priority','empty' => '--')); ?>
	</div>

</div>

<br />
<br />

<div class="row">

	<div class="span5">
		<?php echo $this->Form->input('description', array('rows' => 10, 'class' => 'field span5 ckeditor')); ?>
	</div>

	<div class="span4">
		<?php // echo $this->Form->input('brand_description', array('rows' => 10, 'cols' => 10)); ?>
	</div>

	<div class="span3">
		<?php echo $this->Form->input('tags', array('class' => '4span')); ?>
		<br />
		<?php echo $this->Form->input('featured', array('type' => 'checkbox', 'label' => 'Featured Product'));?>
		<?php echo $this->Form->input('gift', array('type' => 'checkbox', 'label' => 'Gift Product'));?>

	</div>
</div>
<br />
<br />

<div class="row">

	<div class="span5">
		<div><?php echo $this->Form->input('long_description', array('rows' => 20, 'class' => '4span ckeditor')); ?></div>
		<div><?php echo $this->Form->input('generic_description', array('rows' => 10, 'class' => '3span ckeditor')); ?></div>
	</div>

	<div class="span3 offset1">
    <h3>Traditions</h3>
		<?php echo $this->Form->input('traditions', array('type' => 'select', 'multiple' => 'checkbox', 'options' => $traditions, 'selected' => $traditionsselected, 'label' => 'International Traditions')); ?>
		<br />
		<br />
		<?php echo $this->Form->input('ustradition_id', array('label' => 'US Traditions','empty' => '--')); ?>
		<?php echo $this->Form->input('country'); ?>
		<?php echo $this->Form->input('country_manufacture', array('label' => 'Country of Manufacture','options' => $countries, 'empty' => '--')); ?>
		<?php echo $this->Form->input('creation'); ?>
	</div>

	<div class="span2">
    <h3>Attributes</h3>
	<?php
		echo $this->Form->input('attr_allergen_free', array('type' => 'checkbox','label' => 'Allergen Free'));
		echo $this->Form->input('attr_gluten_free', array('type' => 'checkbox','label' => 'Gluten Free'));
		echo $this->Form->input('attr_vegetarian', array('type' => 'checkbox','label' => 'Vegetarian'));
		echo $this->Form->input('attr_low_fat', array('type' => 'checkbox','label' => 'Low Fat'));
		echo $this->Form->input('attr_sugar_free', array('type' => 'checkbox','label' => 'Sugar Free'));
		echo $this->Form->input('attr_no_sugar_added', array('type' => 'checkbox','label' => 'No Sugar Added'));
		echo $this->Form->input('attr_no_msg', array('type' => 'checkbox','label' => 'No MSG'));
		echo $this->Form->input('attr_lactose_free', array('type' => 'checkbox','label' => 'Lactose Free'));
		//echo $this->Form->input('attr_low_carb', array('type' => 'checkbox','label' => 'Low Carb'));
		echo $this->Form->input('attr_nut_free', array('type' => 'checkbox','label' => 'Nut Free'));
		echo $this->Form->input('attr_heart_smart', array('type' => 'checkbox','label' => 'Heart Smart'));
		echo $this->Form->input('attr_no_preservatives', array('type' => 'checkbox','label' => 'No Artificial Preservatives'));
		echo $this->Form->input('attr_non_gmo', array('type' => 'checkbox','label' => 'No GMO'));
		echo $this->Form->input('attr_organic', array('type' => 'checkbox','label' => 'Organic'));
		echo $this->Form->input('attr_kosher', array('type' => 'checkbox','label' => 'Kosher'));
		echo $this->Form->input('attr_halal', array('type' => 'checkbox','label' => 'Halal'));
		echo $this->Form->input('attr_fair_traded', array('type' => 'checkbox','label' => 'Fair Traded'));
		echo $this->Form->input('attr_give_back', array('type' => 'checkbox','label' => 'Give Back'));
		//echo $this->Form->input('attr_heat_sensitivity', array('type' => 'checkbox','label' => 'Not Heat Sensitive'));
		echo $this->Form->input('attr_all_natural', array('type' => 'checkbox','label' => 'All Natural'));
		echo $this->Form->input('attr_award_winning', array('type' => 'checkbox','label' => 'Award Winning'));
	?>
	</div>

</div>

<br />
<br />

<div class="row">

	<div class="span5">
		<?php echo $this->Form->input('ingredients', array('rows' => 10, 'class' => '4span ckeditor')); ?>
		<?php echo $this->Form->input('nutrition', array('rows' => 10, 'class' => '4span ckeditor')); ?>
		<?php echo $this->Form->input('recipes', array('rows' => 10, 'class' => '4span ckeditor')); ?>
		<div><?php echo $this->Form->input('serving_suggestions', array('rows' => 10, 'class' => '4span  ckeditor')); ?></div>
		<?php echo $this->Form->input('attribution', array('rows' => 4, 'class' => '4span ckeditor')); ?>
	</div>

	<div class="span5">
		<div class="emphasize">Commission: <?php echo h($product['User']['commission']); ?>%</div>
		<?php echo $this->Form->input('price_wholesale', array('class' => 'span1'));?>
		<?php //echo $this->Form->input('price_list', array('class' => 'span1'));?>
		<div class="emphasize">Markup: <?php echo h($product['Product']['markup']); ?>%</div>
		<?php echo $this->Form->input('price', array('class' => 'span1'));?>

        <hr />



		<?php echo $this->Form->input('taxable', array('type' => 'checkbox'));?><br />
		<?php //echo $this->Form->input('measurement');?>
		<?php //echo $this->Form->input('weight_unit');?>
		<?php //echo $this->Form->input('weight', array('class' => 'span1'));?>
		<?php echo $this->Form->input('shipping_weight', array('class' => 'span1'));?>
		<?php //echo $this->Form->input('volume', array('class' => 'span1'));?>
		<?php //echo $this->Form->input('volume_unit', array('class' => 'span1'));?>
		<?php //echo $this->Form->input('dimension_unit', array('class' => 'span1'));?>
		<?php echo $this->Form->input('height', array('class' => 'span1'));?>
        <?php echo $this->Form->input('width', array('class' => 'span1','label' => 'Width / Diameter'));?>
        <?php echo $this->Form->input('length', array('class' => 'span1','label' => 'Depth / Diameter'));?>
		<br />
		<br />
		<h4>Current Stock : <?php echo ($product['Product']['stock']); ?></h4>
		<?php echo $this->Form->input('seasonal_stock', array('type' => 'checkbox','label' => 'Temporarily Unavailable')); ?>
        <?php echo $this->Form->input('seasonal_stock_range', array('type' => 'select', 'label' => 'ETA', 'empty' => 'Choose','options' => array(
                '1' => 'Mid',
                '2' => 'Early',
                '3' => 'Late',
            ))); ?>

		<?php echo $this->Form->input('seasonal_stock_date', array('id' => 'monthpicker', 'label' => false,'class' => 'mceNoEditor')); ?>
        <?php echo $this->Form->input('seasonal_stock_note', array('rows' => 5, 'class' => '4span ckeditor')); ?>
 		<br />
		<br />
		<?php echo $this->Form->input('related_products'); ?>
	</div>

</div>

<br />
<br />

<div class="row">

	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_serv_size', array('class' => 'span1','label' => 'Serving Size')); ?>
	</div>
	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_serv_per_container', array('class' => 'span1','label' => 'Servings per Container')); ?>
	</div>

</div>

<div class="row">

	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_calories', array('class' => 'span1','label' => 'Calories')); ?>
	</div>
	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_calories_from_fat', array('class' => 'span1','label' => 'Cal from Fat')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_total_fat', array('class' => 'span1','label' => 'Total Fat')); ?>
	</div>
		<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_total_fat_p', array('class' => 'span1','label' => '% Total Fat')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_saturated_fat', array('class' => 'span1','label' => 'Sat Fat')); ?>
	</div>
	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_saturated_fat_p', array('class' => 'span1','label' => '% Sat Fat')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_cholesterol', array('class' => 'span1','label' => 'Cholesterol')); ?>
	</div>

</div>

<div class="row">

	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_sodium', array('class' => 'span1','label' => 'Sodium')); ?>
	</div>
	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_sodium_p', array('class' => 'span1','label' => 'Daily %')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_carbs', array('class' => 'span1','label' => 'Total Carb')); ?>
	</div>
	<div class="span2 nutrition">
		<?php echo $this->Form->input('nut_carbs_p', array('class' => 'span1','label' => 'Daily %')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_fiber', array('class' => 'span1','label' => 'Fiber')); ?>
	</div>
		<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_fiber_p', array('class' => 'span1','label' => 'Daily %')); ?>
	</div>

</div>

<div class="row">

	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_sugar', array('class' => 'span1','label' => 'Sugar')); ?>
	</div>
	<div class="span1 nutrition">
		<?php echo $this->Form->input('nut_protein', array('class' => 'span1','label' => 'Protein')); ?>
	</div>


</div>

<div class="row">
	<!--<div class="span1 nutrition">
		<?php //echo $this->Form->input('nut_vitamin_a', array('class' => 'span1','label' => 'Vit A')); ?>
	</div>-->
    <div class="span1 nutrition">
		<?php echo $this->Form->input('vitamin_a_p', array('class' => 'span1','label' => '% Vit A')); ?>
	</div>

<!--    <div class="span1 nutrition">
		<?php //echo $this->Form->input('nut_vitamin_c', array('class' => 'span1','label' => 'Vit C')); ?>
	</div>
-->    <div class="span1 nutrition">
		<?php echo $this->Form->input('vitamin_c_p', array('class' => 'span1','label' => '% Vit C')); ?>
	</div>

<!--	<div class="span1 nutrition">
		<?php //echo $this->Form->input('nut_calcium', array('class' => 'span1','label' => 'Calc')); ?>
	</div>
-->	<div class="span1 nutrition">
		<?php echo $this->Form->input('calcium_p', array('class' => 'span1','label' => '% Calc')); ?>
	</div>

<!--	<div class="span1 nutrition">
		<?php //echo $this->Form->input('nut_iron', array('class' => 'span1','label' => 'Iron')); ?>
	</div>
-->	<div class="span1 nutrition">
		<?php echo $this->Form->input('iron_p', array('class' => 'span1','label' => '% Iron')); ?>
	</div>
</div>




<br />
<br />

<div class="row">

	<div class="span4">

		<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Form->end(); ?>

	</div>

</div>

<br />
<br />

<h4>Product Modification:</h4>

<?php echo $this->Html->link('Add new Productmods', array('controller' => 'productmods', 'action' => 'add', $product['Product']['id']), array('class' => 'btn')); ?>

<?php if(!empty($productmods)): ?>

<table cellpadding="0" cellspacing="0">
	<tr>
		<th>id</th>
		<th>product_id</th>
		<th>sku</th>
		<th>name</th>
		<th>change</th>
		<th>active</th>
		<th>created</th>
		<th>modified</th>
		<th>action</th>
	</tr>
	<?php foreach ($productmods as $productmod): ?>
	<tr>
		<td><?php echo h($productmod['Productmod']['id']); ?></td>
		<td><?php echo h($productmod['Productmod']['product_id']); ?></td>
		<td><?php echo h($productmod['Productmod']['sku']); ?></td>
		<td><?php echo h($productmod['Productmod']['name']); ?></td>
		<td><?php echo h($productmod['Productmod']['change']); ?></td>
		<td><?php echo h($productmod['Productmod']['active']); ?></td>
		<td><?php echo h($productmod['Productmod']['created']); ?></td>
		<td><?php echo h($productmod['Productmod']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('controller' => 'productmods', 'action' => 'view', $productmod['Productmod']['id'])); ?>
			<?php echo $this->Html->link('Edit', array('controller' => 'productmods', 'action' => 'edit', $productmod['Productmod']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'productmods', 'action' => 'delete', $productmod['Productmod']['id']), null, __('Are you sure you want to delete # %s?', $productmod['Productmod']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php endif; ?>

<br />
<br />

<h3>Actions</h3>

<br />

<?php echo $this->Html->link('View', array('action' => 'view', $product['Product']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Product.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Product.id'))); ?>

<br />
<br />
