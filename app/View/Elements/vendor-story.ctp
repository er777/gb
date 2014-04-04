   <!-- Vendor Story -->
         <div id="story_content" style="display:none;color:#000;background-color:#fff;padding:20px;"> <span class="b-close btn-gb"><span>X</span></span>
            <div class="row">
               <div class="col-md-4 left-corner-air"> <?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' =>'frame vendor-article-logo')); ?> </div>
               <div class="col-md-6 quote-air">
                  <div class="vendor-special vendor-css">
                     <blockquote> <?php echo $user['User']['shop_quote'] ?>
                        <div class="signature"><?php echo $user['User']['shop_signature'] ?></div>
                     </blockquote>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-8 vendor-block">
                  <div id="vendor-group">
                     <div id="vendor-article"> <?php echo $user['User']['shop_description'] ?> </div>
                  </div>
               </div>
               
               <!-- Vendor Story Pics -->
               <div class="col-md-4">
                  <div class="air">
                     <?php if(!empty($user['User']['image_1'])) : echo $this->Html->image('users/image_1/' . $user['User']['image_1'], array('class' =>'vendor-pic')); ?>
                     <div class="attr"><?php echo $user['User']['attr_1']; ?></div>
                     <div class="title"><?php echo $user['User']['pic_title_1']; ?></div>
                     <?php endif ?>
                  </div>
                  <div class="air">
                     <?php if(!empty($user['User']['image_2'])) : echo $this->Html->image('users/image_2/' . $user['User']['image_2'], array('class' =>'vendor-pic')); ?>
                     <div class="attr"><?php echo $user['User']['attr_2']; ?></div>
                     <div class="title"><?php echo $user['User']['pic_title_2']; ?></div>
                     <?php endif ?>
                  </div>
                  <div class="air">
                     <?php if(!empty($user['User']['image_3'])) : echo $this->Html->image('users/image_3/' . $user['User']['image_3'], array('class' =>'vendor-pic')); ?>
                     <div class="attr"><?php echo $user['User']['attr_3']; ?></div>
                     <div class="title"><?php echo $user['User']['pic_title_3']; ?></div>
                     <?php endif ?>
                  </div>
                  <div class="air">
                     <?php if(!empty($user['User']['image_4'])) : echo $this->Html->image('users/image_4/' . $user['User']['image_4'], array('class' =>'vendor-pic')); ?>
                     <div class="attr"><?php echo $user['User']['attr_4']; ?></div>
                     <div class="title"><?php echo $user['User']['pic_title_4']; ?></div>
                     <?php endif ?>
                  </div>
                  <div class="air">
                     <?php if(!empty($user['User']['image_5'])) : echo $this->Html->image('users/image_5/' . $user['User']['image_5'], array('class' =>'vendor-pic'));  ?>
                     <div class="attr"><?php echo $user['User']['attr_5']; ?></div>
                     <div class="title"><?php echo $user['User']['pic_title_5']; ?></div>
                     <?php endif ?>
                  </div>
                  <div class="air">
                     <?php if(!empty($user['User']['image_6'])) : echo $this->Html->image('users/image_6/' . $user['User']['image_6'], array('class' =>'vendor-pic')); ?>
                     <div class="attr"><?php echo $user['User']['attr_6']; ?></div>
                     <div class="title"><?php echo $user['User']['pic_title_6']; ?></div>
                     <?php endif ?>
                  </div>
               </div>
            </div>
         </div>