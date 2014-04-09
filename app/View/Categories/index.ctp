 <div class="well-stocked-pantry">The Well Stocked Pantry</div>

<div id="pantry-container-2">

  
   
      <div class="row">
      
      <h3 class="cat-title">Welcome to our Well Stocked Pantry, filled with the finest culinary treasures from far and wide. Click to start exploring.</h3>
		<?php
			foreach ($categories as $category):
		?>
         <div class="col-md-2 col-sm-3 col-xs-6 pantry-item"> <!--style="width:22.5%;" -->
            
            <div class="item"> <!--content-product -->
               
               <div class="upper-item pantry"> 
                  
                  <!-- Item image -->
                  <div class="item-image">
                     <?php echo $this->Html->image('categories/image/' . $category['Category']['image'], array('class' => 'img-responsive category', 'url' => array('controller' => 'categories', 'action' => 'view', $category['Category']['slug']))); ?>
                     
                  </div>
                  
               </div>
               
               <div class="card pantry"> <?php echo $this->Html->link($category['Category']['name'], array('action' => 'view', $category['Category']['slug'])); ?>
               
               </div>
               
            </div>
  </div>           
         <?php endforeach; ?>
   </div>
   
   </div>

