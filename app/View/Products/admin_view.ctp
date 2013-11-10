        <h2>Admin Product View</h2>
        
        <h3><?php echo h($product['Product']['name']); ?></h3>
        
        <br />
        <br />
        
        <?php echo $this->Html->image('products/image/' . $product['Product']['image'] . '?date=' . time()); ?>
        
        <br />
        <br />
        
        <a href="/admin/images/crop?src_dir=products/image/&src_file=<?php echo $product['Product']['image']; ?>&dst_dir=products/image/&dst_file=<?php echo $product['Product']['image']; ?>&width=300&height=300" class="btn">crop 300 x 300 image</a>
        
        
        
        <br />
        <br />
        
        <?php echo $this->Form->create('Product', array('type' => 'file', 'url' => array('controller' => 'products', 'action' => 'view', 'admin' => true)));?>
        <?php echo $this->Form->hidden('id', array('value' => $product['Product']['id'])); ?>
        
        <table class="table-striped table-bordered table-condensed table-hover">
            <tbody>
                <tr>
                    <td>Upload Image</td>
                    <td><?php echo $this->Form->file('image'); ?></td>
                </tr>
                <tr>
                    <td>Image Type</td>
                    <td>
        
                    <?php echo $this->Form->input('image_type', array('type' => 'select', 'label' => false, 'options' => array(
                        'image' => 'Main Image',
                        'image_1' => 'image 1',
                        'image_2' => 'image 2',
                        'image_3' => 'image 3',
                        'image_4' => 'image 4',
                        'image_5' => 'image 5',
                    ))); ?>
        
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $this->Form->button('Submit', array('class' => 'btn'));?></td>
                </tr>
            </tbody>
        </table>
        <?php echo $this->Form->end(); ?>
        
        
	<?php if(!empty($product['Product']['image'])) : ?>   
        <br />
        Main Image
        <br />
        
        <?php echo $this->Html->image('products/image/'. $product['Product']['image'] . '?date=' . time(), array('class' => 'gb')); ?>
        <br />
        <a href="/admin/images/crop?src_dir=products/image&src_file=<?php echo $product['Product']['image']; ?>&dst_dir=products/image&dst_file=<?php echo $product['Product']['image']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
        
        <br />
        <br />
        
        <?php echo $this->element('deleteimage', array(
            'model' => 'Product',
            'id' => $product['Product']['id'],
            'field' => 'image',
            'path' => 'products/image/',
            'file' => $product['Product']['image'],
        )); ?>
    <?php endif; ?>  
      
    
    <?php if(!empty($product['Product']['image_1'])) : ?>  
    	<br />
        Image 1
        <br />
        <?php echo $this->Html->image('products/image_1/'. $product['Product']['image_1'] . '?date=' . time(), array('class' => 'gb')); ?>
        <br />
        <a href="/admin/images/crop?src_dir=products/image_1&src_file=<?php echo $product['Product']['image_1']; ?>&dst_dir=products/image_1&dst_file=<?php echo $product['Product']['image_1']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
        
        <br />
        <br />
        
        <?php echo $this->element('deleteimage', array(
            'model' => 'Product',
            'id' => $product['Product']['id'],
            'field' => 'image_1',
            'path' => 'products/image_1/',
            'file' => $product['Product']['image_1'],
        )); ?>
        
        <br />
        <br />
        
    <?php endif; ?>  
      
    
    <?php if(!empty($product['Product']['image_2'])) : ?>  
        <br />
        Image 2
        <br />
        <?php echo $this->Html->image('products/image_2/'. $product['Product']['image_2'] . '?date=' . time(), array('class' => 'gb')); ?>
        <br />
        <a href="/admin/images/crop?src_dir=products/image_2&src_file=<?php echo $product['Product']['image_2']; ?>&dst_dir=products/image_2&dst_file=<?php echo $product['Product']['image_2']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
        
        <br />
        <br />
        
        <?php echo $this->element('deleteimage', array(
            'model' => 'Product',
            'id' => $product['Product']['id'],
            'field' => 'image_2',
            'path' => 'products/image_2/',
            'file' => $product['Product']['image_2'],
        )); ?>
    <?php endif; ?>  
      
    
    <?php if(!empty($product['Product']['image_3'])) : ?>  
        <br />
        Image 3
        <br />
        <?php echo $this->Html->image('products/image_3/'. $product['Product']['image_3'] . '?date=' . time(), array('class' => 'gb')); ?>
        <br />
        <a href="/admin/images/crop?src_dir=products/image_3&src_file=<?php echo $product['Product']['image_3']; ?>&dst_dir=products/image_3&dst_file=<?php echo $product['Product']['image_3']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
        
        <br />
        <br />
        
        <?php echo $this->element('deleteimage', array(
            'model' => 'Product',
            'id' => $product['Product']['id'],
            'field' => 'image_3',
            'path' => 'products/image_3/',
            'file' => $product['Product']['image_3'],
        )); ?>
    <?php endif; ?>  
      
    
    <?php if(!empty($product['Product']['image_4'])) : ?>  
        <br />
        Image 4
        <br />
        <?php echo $this->Html->image('products/image_4/'. $product['Product']['image_4'] . '?date=' . time(), array('class' => 'gb')); ?>
        <br />
        <a href="/admin/images/crop?src_dir=products/image_4&src_file=<?php echo $product['Product']['image_4']; ?>&dst_dir=products/image_4&dst_file=<?php echo $product['Product']['image_4']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
        
        <br />
        <br />
        
        <?php echo $this->element('deleteimage', array(
            'model' => 'Product',
            'id' => $product['Product']['id'],
            'field' => 'image_4',
            'path' => 'products/image_4/',
            'file' => $product['Product']['image_4'],
        )); ?>
    <?php endif; ?>  
      
    
    <?php if(!empty($product['Product']['image_5'])) : ?>  
        <br />
        Image 5
        <br />
        <?php echo $this->Html->image('products/image_5/'. $product['Product']['image_5'] . '?date=' . time(), array('class' => 'gb')); ?>
        <br />
        <a href="/admin/images/crop?src_dir=products/image_5&src_file=<?php echo $product['Product']['image_5']; ?>&dst_dir=products/image_5&dst_file=<?php echo $product['Product']['image_5']; ?>&width=300&height=300" class="btn">crop 300 x 300</a>
        
        <br />
        <br />
        
        <?php echo $this->element('deleteimage', array(
            'model' => 'Product',
            'id' => $product['Product']['id'],
            'field' => 'image_5',
            'path' => 'products/image_5/',
            'file' => $product['Product']['image_5'],
        )); ?>
        
        
        <br />
        <br />
    <?php endif; ?> 
    
     
        <?php echo $this->Form->end(); ?>
        
        <br />
        <br />
        
        <table class="table table-striped table-bordered table-condensed table-hover">
            <tr>
            <td><?php echo __('Id'); ?></td>
            <td><?php echo h($product['Product']['id']); ?></td>
            </tr>
            <tr>
            <td><?php echo __('User'); ?></td>
            <td><?php echo $this->Html->link($product['User']['name'], array('controller' => 'users', 'action' => 'view', $product['User']['id'])); ?></td>
            </tr>
            <tr>
            <td><?php echo __('Category'); ?></td>
            <td><?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?></td>
            </tr>
            <tr>
            <td><?php echo __('Subcategory'); ?></td>
            <td><?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'subcategories', 'action' => 'view', $product['Subcategory']['id'])); ?>
            </td>
            </tr>
            <tr>
            <td><?php echo __('Subsubcategory'); ?></td>
            <td><?php echo $this->Html->link($product['Subsubcategory']['name'], array('controller' => 'subsubcategories', 'action' => 'view', $product['Subsubcategory']['id'])); ?>
            </td>
            </tr>
            <tr>
            <td><?php echo __('Upc'); ?></td>
            <td><?php echo h($product['Product']['upc']); ?></td>
            </tr>
            <tr>
            <td><?php echo __('Vendor Sku'); ?></td>
            <td><?php echo h($product['Product']['vendor_sku']); ?></td>
            </tr>
            <tr>
            <td><?php echo __('Brand'); ?></td>
            <td><?php echo h($product['Brand']['name']); ?></td>
            </tr>
            <tr>
            <td>Slug</td>
            <td><?php echo h($product['Product']['slug']); ?></td>
            </tr>
            <tr>
            <td><?php echo __('Description'); ?></td>
            <td><?php echo h($product['Product']['description']); ?></td>
            </tr>
            <tr>
            <td><?php echo __('Long Description'); ?></td>
            <td><?php echo h($product['Product']['long_description']); ?></td>
            </tr>
            <tr>
            <td><?php echo __('Tags'); ?></td>
            <td><?php echo h($product['Product']['tags']); ?></td>
            </tr>
        </table>
        
        <br />
        <br />
        
        <h3>Actions</h3>
        <?php echo $this->Html->link('Edit Product', array('action' => 'edit', $product['Product']['id']), array('class' => 'btn')); ?>
        <br />
        <br />
        <?php echo $this->Form->postLink('Delete Product', array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
        <br />
        
        <br />
        <br />
        
        <div class="related">
            <h3><?php echo __('Related Tags'); ?></h3>
            <?php if (!empty($product['Tag'])): ?>
            <table class="table-striped table-bordered table-condensed table-hover">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th>Name</th>
                <th>Created</th>
                <th>Modified</th>
                <th class="actions">Actions</th>
            </tr>
            <?php
                $i = 0;
                foreach ($product['Tag'] as $tag): ?>
                <tr>
                    <td><?php echo $tag['id']; ?></td>
                    <td><?php echo $tag['name']; ?></td>
                    <td><?php echo $tag['created']; ?></td>
                    <td><?php echo $tag['modified']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('View', array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?>
                        <?php echo $this->Html->link('Edit', array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
                        <?php echo $this->Form->postLink('Delete', array('controller' => 'tags', 'action' => 'delete', $tag['id']), null, __('Are you sure you want to delete # %s?', $tag['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>
        </div>
        
        <br />
        <br />
        
        <?php //echo $this->Html->link('New Tag', array('controller' => 'tags', 'action' => 'add')); ?>
        
        <br />
        <br />
        
