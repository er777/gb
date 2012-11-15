<?php echo $this->Html->script(array('jquery.chained.js'), array('inline' => false)); ?>

<?php echo $this->Html->script('/tiny_mce/tiny_mce.js', array('inline' => false)); ?>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		skin: "thebigreason",
		plugins : "inlinepopups",
		plugins : "paste",
		// Theme options
			theme_advanced_buttons1 : "bold,italic,underline,|,link,unlink,|,bullist,numlist,|,pastetext,pasteword,selectall,|,cleanup,removeformat,code",
			theme_advanced_resizing : true,

	});
</script>

<script type="text/javascript">

$(document).ready(function(){

	$("#ProductSubcategoryId").chained("#ProductCategoryId");
	$("#ProductSubsubcategoryId").chained("#ProductSubcategoryId");

});

</script>


<h2>Admin Add Product</h2>

<?php echo $this->Form->create('Product'); ?>
<?php
echo $this->Form->input('user_id');
echo $this->Form->input('category_id', array('empty' => '---choose--'));
//echo $this->Form->input('category_name');
echo $this->Form->input('subcategory_id', array('empty' => '---choose--'));
//echo $this->Form->input('subcategory_name');
echo $this->Form->input('subsubcategory_id', array('empty' => '---choose ( not required )'));
//echo $this->Form->input('subsubcategory_name');
echo $this->Form->input('upc');
echo $this->Form->input('vendor_sku');
echo $this->Form->input('brand');
echo $this->Form->input('name');
echo $this->Form->input('slug');
echo $this->Form->input('description');
echo $this->Form->input('long_description', array('rows' => 20, 'class' => 'input-xxlarge'));
echo $this->Form->input('tags');
echo $this->Form->input('featured_product', array('type' => 'checkbox', 'label' => 'Featured Product'));
echo $this->Form->input('gift_product', array('type' => 'checkbox', 'label' => 'Gift Product'));
echo $this->Form->input('price_wholesale');
echo $this->Form->input('price_list');
echo $this->Form->input('price');
echo $this->Form->input('taxable', array('type' => 'checkbox'));
echo $this->Form->input('traditions');
echo $this->Form->input('ustradition_id', array('empty' => ''));
echo $this->Form->input('measurement');
echo $this->Form->input('weight_unit');
echo $this->Form->input('weight');
echo $this->Form->input('shipping_weight');
echo $this->Form->input('volume');
echo $this->Form->input('volume_unit');
echo $this->Form->input('dimension_unit');
echo $this->Form->input('height');
echo $this->Form->input('length');
echo $this->Form->input('width');
echo $this->Form->input('ingredients');
echo $this->Form->input('nutrition', array('rows' => 10, 'class' => '4span','value' => '<table class="NutritionFacts">
	<tr>
		<td><table class="" cellpadding="0" cellspacing="0" width="100%" style="">
				<tr>
					<td class="nf_Center nf_PaddingB5 nf_Header" colspan="2">Nutrition Facts</td>
				</tr>
				<tr>
					<td class="nf_BorderT10" colspan="2"><b class="nf_TextSmall nf_Bold">Amount Per Serving</b></td>
				</tr>
				<tr>
					<td class="nf_Right nf_PaddingT5 nf_BorderT5" colspan="2"><b class="nf_TextSmall nf_Bold">% Daily Value*</b></td>
				</tr>
								<tr>
					<td class="nf_Cell nf_Text">Calories&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Calories From Fat&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Total Fat&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Saturated Fat&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Cholesterol&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Sodium&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Total Carbohydrate&nbsp;|&nbsp; </td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Dietary Fiber&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Sugar&nbsp;|&nbsp; </td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Protein&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Vitamin A&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Vitamin C&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Calcium&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
									<tr>
					<td class="nf_Cell nf_Text"> Iron&nbsp;|&nbsp; 0g</td>
					<td class="nf_Cell nf_Right nf_Text"> 0%</td>
				<tr>
								</table></td>
	</tr>
</table>
</table>')); 
echo $this->Form->input('recipes');
echo $this->Form->input('serving_suggestions', array('rows' => 20, 'class' => 'input-xlarge'));
echo $this->Form->input('country');
echo $this->Form->input('creation');
?>
<br />
<?php
echo $this->Form->input('attr_allergen_free', array('type' => 'checkbox'));
echo $this->Form->input('attr_gluten_free', array('type' => 'checkbox'));
echo $this->Form->input('attr_vegetarian', array('type' => 'checkbox'));
echo $this->Form->input('attr_fat_free', array('type' => 'checkbox'));
echo $this->Form->input('attr_sugar_free', array('type' => 'checkbox'));
echo $this->Form->input('attr_no_msg', array('type' => 'checkbox'));
echo $this->Form->input('attr_lactose_free', array('type' => 'checkbox'));
echo $this->Form->input('attr_low_carb', array('type' => 'checkbox'));
echo $this->Form->input('attr_nut_free', array('type' => 'checkbox'));
echo $this->Form->input('attr_heart_smart', array('type' => 'checkbox'));
echo $this->Form->input('attr_no_preservatives', array('type' => 'checkbox'));
echo $this->Form->input('attr_organic', array('type' => 'checkbox'));
echo $this->Form->input('attr_kosher', array('type' => 'checkbox'));
echo $this->Form->input('attr_halal', array('type' => 'checkbox'));
echo $this->Form->input('attr_fair_traded', array('type' => 'checkbox'));
echo $this->Form->input('attr_give_back', array('type' => 'checkbox'));
echo $this->Form->input('attr_heat_sensitivity', array('type' => 'checkbox'));
echo $this->Form->input('attr_all_natural', array('type' => 'checkbox'));
echo $this->Form->input('attr_award_winning', array('type' => 'checkbox'));
?>
<br />
<?php
echo $this->Form->input('related_products');
echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active'));
?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>

