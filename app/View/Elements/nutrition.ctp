	 <?php //if (($description == 'unloaded') && ($serv == 'unloaded') && ($recipes == 'unloaded') &&  ($recipes == 'unloaded') && ($nutrition == 'loaded')) :
										//$value3 = 'active';
									//endif; ?>
	 <?php //if ( !empty($nuts) //&& $product['Product']['vitamin_a_p'] !== ''
						//&& $product['Product']['vitamin_c_p'] !== ''
						//&& $product['Product']['calcium_p'] !== ''
						//&& $product['Product']['iron_p'] !== ''
						//) : ?>
	 <?php //debug($nuts); ?>
				<div class="tab-pane <?php //echo $value3; ?>" id="nutrition" style="display:none">
					  <table class="NutritionFacts">
						 <tr>
							<td><table class="" cellpadding="0" cellspacing="0" width="100%" style="float:left">
								  <tr>
									 <td class="nf_Center nf_PaddingB5 nf_Header" colspan="2">Nutrition Facts</td>
								  </tr>
								  <tr>
									 <td class="nf_BorderT10" colspan="2"><b class="nf_TextSmall nf_Bold">Amount Per Serving</b></td>
								  </tr>
								  <tr>
									 <td class="nf_Right nf_PaddingT5 nf_BorderT5" colspan="2"><b class="nf_TextSmall nf_Bold">% Daily Value*</b></td>
								  </tr>
								  <?php foreach($nuts as $nkey => $nvalue): ?>
	 <?php $nkey = str_replace('_p', '_%', $nkey); ?>
								  <tr>
									 <td class="nf_Cell nf_Text"><?php echo (str_replace('_', ' ', $nkey)); ?> |
										<?php
														if (($nkey == 'vitamin_a'  || $nkey == 'vitamin_c' || $nkey == 'calcium' || $nkey == 'iron' )) {
															echo ('');

															?>
										<div style="display:inline;float:right;">
										<?php

															if ($nkey == 'vitamin_a') {
																echo $product['Product']['vitamin_a_p'];
															}

															if ($nkey == 'vitamin_c') {
																echo $product['Product']['vitamin_c_p'];
															}

															if ($nkey == 'calcium') {
																echo $product['Product']['calcium_p'];
															}

															if ($nkey == 'iron') {
																echo $product['Product']['iron_p'];
															}
														}
														else {
																echo $nvalue . 'g'; ?>
										<div style="display:inline;float:right;">
										<?php } ?>
	 <?php
															//print_r ($nkey);
															//echo 'yes';

															if ($nkey == 'calories') {
																echo $product['Product']['total_fat_p'];
															}

															if ($nkey == 'saturated_fat') {
																echo $product['Product']['saturated_fat_p'];
															}

															if ($nkey == 'sodium') {
																echo $product['Product']['sodium_p'];
															}

															if ($nkey == 'carbs') {
																echo $product['Product']['carbs_p'];
															}

															if ($nkey == 'fiber') {
																echo $product['Product']['fiber_p'];
															}

															if ($nkey == 'sugar') {
																echo $product['Product']['sugar_p'];
															}

															if ($nkey == 'protein') {
																echo $product['Product']['protein_p'];
															}


															?>
										%</div></td>
									 <!--<td class="nf_Cell nf_Right nf_Text">%</td>-->
								  </tr>
								  <?php endforeach;?>
							</table></td>
						 </tr>
					  </table>
				</div>
				<?php //endif; ?>
				</div>
