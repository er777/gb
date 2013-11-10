<td colspan="3"><table>
                      <tr>
                        <td>
                          <?php echo $this->Form->input('price', array('class' => 'span1'));?></td>
                        <td>
                          <?php echo $this->Form->input('price_wholesale', array('class' => 'span1'));?></td>
   
                    </table>
                    <h2>Product Modifications</h2>
                    <p style ="color:red";>IN DEVELOPMENT - DON'T USE YET</p>
                    <p>If this product has variations that effect the price, you can create that logic here. For example: If you are selling teas, you may have different options that your customers can choose from. Like package size, ounces, flavor, et cetera. To create the modifications simply follow the instructions in the fields below.</p>
                    <p><a href="#" class="mod_add_remove add_mod">Add new mod<span class="icons"></span></a></p>
                    <div id="mod_section">
                    <?php if (isset($x)) :?>
                    <?php	foreach($x as $product_mod):?>
										<div class="single_modifier clearfix ">
                      <div class="mod_menu"><a href="#" class="mod_add_remove remove_mod">Remove mod <span class="icons"></span></a>
                        <div class="mod_number">SKU: <?php echo $product_mod['sku'];?></div>
                        </div>
                        <div class="float_left">
                          <label for="modifier_<?php echo $product_mod['sku'];?>_label">Display Label:</label>
                          <input 
                             type="text"
                             name="modifier_<?php echo $product_mod['sku'];?>_label" 
                             id="modifier_<?php echo $product_mod['sku'];?>_label" 
                             value="<?php echo $product_mod['label'];?>" 
                           />
                          <div class="description">
                            <p>The name of this modification that is presented to  users. Eg.:</p>
                            <ul>
                              <li>Example: "Color"</li>
                              <li>Example: "Size"</li>
                            </ul>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left -->
                        <div class="float_left">
                          <label for="modifier_<?php echo $product_mod['sku']; ?>_name">Mod &quot;Value&quot;:</label>
                          <input 
                              type="text" 
                              name="modifier_<?php echo $product_mod['sku'];?>_name" 
                              id="modifier_<?php echo $product_mod['sku'];?>_name"
                              value="<?php echo $product_mod['name'];?>" 
                           />
                          <div class="description">
                            <p>If a mod has multiple available values, just use the same label.</p>
                            <ul>
                              <li>Example: "Red"</li>
                              <li>Example: "XXL"</li>
                              <li>Example: "16 oz. bag"</li>
                            </ul>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left -->
                        <div class="float_left">
                          <label for="modifier_<?php echo $product_mod['sku'];?>_direction">Price mod:</label>
                          <select name="modifier_<?php echo $product_mod['sku'];?>_direction" id="modifier_<?php echo $product_mod['sku'];?>_direction" >
                             <option value="xx"<?php echo ($product_mod['direction'] == 'xx' ? ' selected' :''); ?>>No effect.</option>
                             <option value="+"<?php echo ($product_mod['direction'] == '+' ? ' selected' :''); ?>>+ (Add to the price)</option>
                             <option value="-"<?php echo ($product_mod['direction'] == '-' ? ' selected' :''); ?>>- (Subtract from the price)</option>
                          </select>
                          <div class="description">
                            <p>How should this option effect the price? 
                              Your answer here will change the way the price of this item is calculated.</p>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left -->
                        <div class="float_left">
                          <label for="modifier_<?php echo $product_mod['sku'];?>_retail_deviation">Retail Impact</label>
                          <input 
                          	type="text" 
                            name="modifier_<?php echo $product_mod['sku'];?>_retail_deviation" 
                            id="modifier_<?php echo $product_mod['sku'];?>_retail_deviation" 
                            value="<?php echo $product_mod['retail_deviation'];?>" 
                          />
                          <div class="description">
                            <p>The &quot;impact&quot; of this mod, is the deviation from the base price.</p>
                            <ul>
                              <li>Example: "2.50"</li>
                              <li>Example: "0.10"</li>
                            </ul>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left -->
                        <div class="float_left last">
                        <label for="modifier_<?php echo $product_mod['sku'];?>_wholesale_deviation">Wholesale Impact</label>
                          <input type="text" 
                          name="modifier_<?php echo $product_mod['sku'];?>_wholesale_deviation" 
                          id="modifier_<?php echo $product_mod['sku'];?>_wholesale_deviation" 
                           value="<?php echo $product_mod['wholesale_deviation'];?>" 
                          />
                          <div class="description">
                            <p>The &quot;impact&quot; of this mod, is the deviation from the base price.</p>
                            <ul>
                              <li>Example: "2.50"</li>
                              <li>Example: "0.10"</li>
                            </ul>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left --> 
                      </div>
                      <!-- end single_modifier --> 
										<?php endforeach; ?>
                    <?php endif; ?>
                      <div class="single_modifier clearfix first template" style="display:none;">
                      <div class="mod_menu"><a href="#" class="mod_add_remove"><!-- replace with Javascript --></a>
                        <div class="mod_number"><!-- Replace with Javascript --></div>
                        </div>
                        <div class="float_left">
                          <label for="modifier_0_label">Display Label:</label>
                          <input type="text" name="modifier_0_label" id="modifier_0_label" />
                          <div class="description">
                            <p>The name of this mod. that is presented to the users. Eg.:</p>
                            <ul>
                              <li>Example: "Color"</li>
                              <li>Example: "Size"</li>
                            </ul>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left -->
                        <div class="float_left">
                          <label for="modifier_0_name">Mod &quot;Value&quot;:</label>
                          <input type="text" name="modifier_0_name" id="modifier_0_name" />
                          <div class="description">
                            <p>If a mod has multiple available values, just use the same label.</p>
                            <ul>
                              <li>Example: "Red"</li>
                              <li>Example: "XXL"</li>
                              <li>Example: "16 oz. bag"</li>
                            </ul>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left -->
                        <div class="float_left">
                          <label for="modifier_0_direction">Price mod:</label>
                          <select name="modifier_0_direction" id="modifier_0_direction" >
                            <option value="+">+ (Add to the price)</option>
                            <option value="-">- (Subtract from the price)</option>
                            <option value="xx">No effect.</option>
                          </select>
                          <div class="description">
                            <p>How should this option effect the price? 
                              Your answer here will change the way the price of this item is calculated.</p>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left -->
                        <div class="float_left">
                          <label for="modifier_0_retail_deviation">Retail Impact</label>
                          <input type="text" name="modifier_0_retail_deviation" id="modifier_0_retail_deviation" />
                          <div class="description">
                            <p>The &quot;impact&quot; of this mod, is the deviation from the base price.</p>
                            <ul>
                              <li>Example: "2.50"</li>
                              <li>Example: "0.10"</li>
                            </ul>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left -->
                        <div class="float_left last">
                        <label for="modifier_0_wholesale_deviation">Wholesale Impact</label>
                          <input type="text" name="modifier_0_wholesale_deviation" id="modifier_0_wholesale_deviation" />
                          <div class="description">
                            <p>The &quot;impact&quot; of this mod, is the deviation from the base price.</p>
                            <ul>
                              <li>Example: "2.50"</li>
                              <li>Example: "0.10"</li>
                            </ul>
                          </div>
                          <!-- end description --> 
                        </div>
                        <!-- end float_left --> 
                      </div>
                      <!-- end single_modifier --> 
                      
                    </div>
                    <!-- end mod_section --></td>
                    
<script type="text/javascript">
jQuery(function($) {
	
	// Refresh the numbers to the left of each mod to remain consecutive.
	/*function refreshNumbers(){
			var  $allMods = $('#mod_section .single_modifier'),
							count = $allMods.size();
			$allMods.each(function(){
				$(this).find('.mod_number').html(count);
				count--;
				});
		}*/
	
	//EVENT BINDING
	
	// Remove Function
	$('#mod_section .remove_mod').click(function(e){
			e.preventDefault(); // onclick return false;
			var $this = $(this);
			var answer = confirm("Are you sure that you want to remove this modification?");
			if(answer == true){
				// remove this mod
				$this.parents('.single_modifier').slideUp(function(){
							$(this).remove();
					//refreshNumbers();
				});
			}
			return false;
		});
		
		
		// Add Function.
		$('.add_mod').click(function(e){
			e.preventDefault();
			var count = $('#mod_section .single_modifier').not(':hidden').size();
			
			//create clone
			$clone = $('.single_modifier.template').clone();
			// add classes, and text needed for this mod
			$clone.find('.mod_menu > a.mod_add_remove')
				.addClass('remove_mod')
				.html('Remove mod <span class="icons"></span>');
			
			// Prompt user for new sku number.
				var input_sku=prompt("Please enter an SKU number for this product modification. (NOTE: Any spaces and underscores will be removed.):","SKU#");
				if(input_sku == false) return false; // die if user clicks cancel.
				 
				var cleaned_input_sku = input_sku.replace(/(\s|_)/g, ""); // remove all spaces andunderscores, just like we said we would.
				
				// Check to see if a mod with that sku already exists.
				if($('[name^="modifier_' + cleaned_input_sku+'_"]').size() > 0){
					alert('A modification already exists with that SKU number. Please remove the existing modification '+cleaned_input_sku+' and try again.');
					$('[name^="modifier_' + cleaned_input_sku+'"]').eq(0).focus(); // show the user the offending modification.
					return false; // die if sku already exists.
				}
				
				$clone.find('.mod_number').html('SKU: ' + cleaned_input_sku); // add the sku number to the left side for easy reading.
				var $result = $clone.html().replace(/modifier_0/g, "modifier_"+cleaned_input_sku); // create unique names for all input fields based on SKU numbers.
    	
			
			$('<div class="single_modifier clearfix" style="display:none;">' + $result + '</div>').prependTo('#mod_section');// add the new clone to the dom.
	
			// Bind the "remove" button on the new element. It will be the top most single_modifier, so we can use eq(0) to target it.
			$('.single_modifier').eq(0).find('.remove_mod').click(function(e){
					e.preventDefault(); 
					var $this = $(this);
					var answer = confirm("Are you sure that you want to remove this modification?");
					if(answer == true){
						// remove this mod
						$this.parents('.single_modifier').slideUp(function(){
									$(this).remove();
							//refreshNumbers();
						});
					}
				return false; // onclick = return false. Kill default action. Good habit.
			});
			
			// Display the new element onscreen.
			$('.single_modifier').eq(0).slideDown();
			return false;// onclick = return false. Kill default action. Good habit.
		});
	});</script>