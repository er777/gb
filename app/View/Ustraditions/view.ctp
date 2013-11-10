<div class="row">

    <div class="span3" style="width:270px">
        
        
        <div style="margin-bottom:20px;margin-left:0px;">
			<img style="width:235px" src="/img/us-traditions/labels/<?php echo ($ustradition['Ustradition']['logo_image']); ?>" />
		</div>
        
        
        
        <div id="subcat-menu">
            <div> <?php echo $ustradition['Ustradition']['summary']; ?> </div>
			<a style="font-style:italic" href="/articles/excellent-food-advenures/<?php echo $ustradition['Ustradition']['slug']; ?>">Read more</a>
            
        </div>
        
        <div class="gb-heading">Other US Traditions: </div>
        <div class="gb-heading red list" style="font-size:120%;">
        <?php foreach ($ustraditions as $tradition): ?>
            <?php echo $this->Html->link($tradition['Ustradition']['name'], array('controller' => 'ustraditions', 'action' => 'view', 'slug' => $tradition['Ustradition']['slug'])); ?><br />
        <?php endforeach; ?>
        </div>
    </div>

<div class="span8" style="width:690px;margin-left:0px;">
    
        <div class="awning"> 
           
            <?php if (($ustradition['Ustradition']['awning_image'])) :
					echo $this->Html->image('/img/us-traditions/awning_image/'. $ustradition['Ustradition']['awning_image']);
				else :
					echo ' <img src="/img/us-traditions/awning_image/far-west.jpg" /> ';
				endif;
			?>
        </div>
        
        <br />
        
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


					<?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'])); ?>
                        <div class="product-name"> <a href="/product/<?php echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>"> <?php echo $this->Text->truncate($product['Product']['name'], 40, array('ellipsis' => '...', 'exact' => 'false')); ?></a>
                        </div>
                        
                    </div>
                    
                    <div class="price">$<?php echo $product['Product']['price']; ?></div>
                    
                    <div class="brand"><?php echo $this->Html->link($product['User']['name'], array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'index')); ?> </div>
                    
                </div>
                
                
            </div>
            
            <?php
				if (($i % 4) == 0) { echo "</div>\n\n\t\t<div class=\"row product\">\n\n";}
				endforeach;
			?>
        
        </div>
        
        
        
        
        
        <?php echo $this->element('pagination-counter'); ?> <?php echo $this->element('pagination'); ?> <br />
        
        <br />
        <br />
        
    </div> 
</div>
