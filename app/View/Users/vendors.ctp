

 <h2 class="gb-heading">Our Vendors</h2>
 <?php foreach($users as $user) : ?>

<div class="row">

   
    
    
    
    <div class="span3">
    	<?php echo $this->Html->image('users/image/' . $user['User']['image'], array('class' => 'vendor-pic','url' => array('subdomain' => $user['User']['slug'], 'controller' => 'products', 'action' => 'index'), 'alt' => $user['User']['name'])); ?>
		<br />
		<?php echo $this->Html->link($user['User']['name'], array('subdomain' => $user['User']['slug'], 'controller' => 'products', 'action' => 'index')); ?>
    </div>
    
    <div class="span8 offset1">
		<div class="gb-heading vendors"><?php echo $user['User']['shop_quote']; ?></div>
    </div>
    
    
   
    
</div>
<hr>
 <?php endforeach; ?>