<h2>View User</h2>

<div style="height:300px;overflow:scroll">

        <table class="table-striped table-bordered table-condensed table-hover">
        <tr>
        <td>Id</td>
        <td><?php echo h($user['User']['id']); ?></td>
        </tr>
        <tr>
        <td>Level</td>
        <td><?php echo h($user['User']['level']); ?></td>
        </tr>
        <tr>
        <td>Username</td>
        <td><?php echo h($user['User']['username']); ?></td>
        </tr>
        <tr>
        <tr>
        <td>Password Clear</td>
        <td><?php echo h($user['User']['password_clear']); ?></td>
        </tr>
        <tr>
        <td>Name</td>
        <td><?php echo h($user['User']['name']); ?></td>
        </tr>
        <tr>
        <td>Slug</td>
        <td><?php echo h($user['User']['slug']); ?></td>
        </tr>
        <tr>
        <td>Business Name</td>
        <td><?php echo h($user['User']['business_name']); ?></td>
        </tr>
        <tr>
        <td>Business Ownership</td>
        <td><?php echo h($user['User']['business_ownership']); ?></td>
        </tr>
        <tr>
        <td>Business Established</td>
        <td><?php echo h($user['User']['business_established']); ?></td>
        </tr>
        
        <tr>
        <td>Shop Description</td>
        <td><?php echo $user['User']['shop_description']; ?></td>
        </tr>
        <tr>
        <td>Shop Quote</td>
        <td><?php echo h($user['User']['shop_quote']); ?></td>
        </tr>
        <tr>
        <td>Shop Signature</td>
        <td><?php echo h($user['User']['shop_signature']); ?></td>
        </tr>
        <tr>
        <td>Street Address</td>
        <td><?php echo h($user['User']['address']); ?></td>
        </tr>
        <tr>
        <td>Street Address2</td>
        <td><?php echo h($user['User']['address2']); ?></td>
        </tr>
        <tr>
        <td>City</td>
        <td><?php echo h($user['User']['city']); ?></td>
        </tr>
        <tr>
        <td>State</td>
        <td><?php echo h($user['User']['state']); ?></td>
        </tr>
        <tr>
        <td>Zip</td>
        <td><?php echo h($user['User']['zip']); ?></td>
        </tr>
        <tr>
        <td>Country</td>
        <td><?php echo h($user['User']['country']); ?></td>
        </tr>
        <tr>
        <td>Country Id</td>
        <td><?php echo h($user['User']['country_id']); ?></td>
        </tr>
        <tr>
        <td>Zone Id</td>
        <td><?php echo h($user['User']['zone_id']); ?></td>
        </tr>
        <tr>
        <td>Phone</td>
        <td><?php echo h($user['User']['phone']); ?></td>
        </tr>
        <tr>
        <td>Fax</td>
        <td><?php echo h($user['User']['fax']); ?></td>
        </tr>
        <tr>
        <td>Email</td>
        <td><?php echo h($user['User']['email']); ?></td>
        </tr>
        <tr>
        <td>Website</td>
        <td><?php echo h($user['User']['website']); ?></td>
        </tr>
        <tr>
        <td>Flat Shipping</td>
        <td><?php echo h($user['User']['flat_shipping']); ?></td>
        </tr>
        <tr>
       
        <tr>
        <td>Contact First Name</td>
        <td><?php echo h($user['User']['contact_first_name']); ?>
        </td>
        </tr>
        <tr>
        <td>Contact Last Name</td>
        <td><?php echo h($user['User']['contact_last_name']); ?></td>
        </tr>
        <tr>
        <td>Contact Title</td>
        <td><?php echo h($user['User']['contact_title']); ?></td>
        </tr>
        <tr>
        <td>Contact Phone</td>
        <td><?php echo h($user['User']['contact_phone']); ?></td>
        </tr>
        <tr>
        <td>Contact Email</td>
        <td><?php echo h($user['User']['contact_email']); ?></td>
        </tr>
        <tr>
        <td>Contact Alt First Name</td>
        <td><?php echo h($user['User']['contact_alt_first_name']); ?></td>
        </tr>
        <tr>
        <td>Contact Alt Last Name</td>
        <td><?php echo h($user['User']['contact_alt_last_name']); ?></td>
        </tr>
        <tr>
        <td>Contact Alt Title</td>
        <td><?php echo h($user['User']['contact_alt_title']); ?></td>
        </tr>
        <tr>
        <td>Contact Alt Phone</td>
        <td><?php echo h($user['User']['contact_alt_phone']); ?></td>
        </tr>
        <tr>
        <td>Contact Alt Email</td>
        <td><?php echo h($user['User']['contact_alt_email']); ?></td>
        </tr>
        <tr>
        <td>Customer Service Contact</td>
        <td><?php echo h($user['User']['customer_service_contact']); ?></td>
        </tr>
        <tr>
        <td>Customer Service Phone</td>
        <td><?php echo h($user['User']['customer_service_phone']); ?></td>
        </tr>
        <tr>
        <td>Customer Service Phone Ext</td>
        <td><?php echo h($user['User']['customer_service_phone_ext']); ?></td>
        </tr>
        <tr>
        <td>Customer Service Email</td>
        <td><?php echo h($user['User']['customer_service_email']); ?></td>
        </tr>
        <tr>
        <td>Contact Financial Name</td>
        <td><?php echo h($user['User']['fin_contact_name']); ?></td>
        </tr>
        <td>Contact Financial Title</td>
        <td><?php echo h($user['User']['fin_contact_title']); ?></td>
        </tr>
        <tr>
        <td>Contact Fin Phone</td>
        <td><?php echo h($user['User']['fin_contact_phone']); ?></td>
        </tr>
        <tr>
        <td>Contact Fin Email</td>
        <td><?php echo h($user['User']['fin_contact_email']); ?></td>
        </tr>
        <tr>
        <td>Ins Carrier</td>
        <td><?php echo h($user['User']['ins_carrier']); ?></td>
        </tr>
        <tr>
        <td>Ins Carrier Name</td>
        <td><?php echo h($user['User']['ins_agent_name']); ?></td>
        </tr>
        <tr>
        <td>Ins Carrier Phone</td>
        <td><?php echo h($user['User']['ins_agent_phone']); ?></td>
        </tr>
        <tr>
        <td>Ins Policy Num</td>
        <td><?php echo h($user['User']['ins_policy_num']); ?></td>
        </tr>
        <tr>
        <td>Ins Policy Exp</td>
        <td><?php echo h($user['User']['ins_policy_exp']); ?></td>
        </tr>
        <tr>
        <td>Ins Coverage Each</td>
        <td><?php echo h($user['User']['ins_coverage_each']); ?></td>
        </tr>
        <tr>
        <td>Ins Coverage Aggregate</td>
        <td><?php echo h($user['User']['ins_coverage_aggr']); ?></td>
        </tr>
        
        <tr>
        <td>Shipping Policy</td>
        <td><?php echo h($user['User']['shipping_policy']); ?></td>
        </tr>
        <tr>
        <td>Payment Biz Name</td>
        <td><?php echo h($user['User']['payment_biz_name']); ?></td>
        </tr>
        <tr>
        <td>Payment Street Address</td>
        <td><?php echo h($user['User']['payment_street_address']); ?></td>
        </tr>
        <tr>
        <td>Payment City</td>
        <td><?php echo h($user['User']['payment_city']); ?></td>
        </tr>
        <tr>
        <td>Payment Zone Id</td>
        <td><?php echo h($user['User']['payment_state']); ?></td>
        </tr>
        <tr>
        <td>Payment Zip</td>
        <td><?php echo h($user['User']['payment_zip']); ?></td>
        </tr>
        <tr><td>Vendor Type</td>
        <td><?php echo h($user['User']['vendor_type']); ?></td>
        </tr>
        <tr>
        <td>Active</td>
        <td><a href="/admin/users/switch/active/<?php echo $user['User']['id']; ?>" class="status"><img src="/img/icon_<?php echo $user['User']['active']; ?>.png" alt="" /></a></td>
        </tr>
        <tr>
        <td>Product Count</td>
        <td><?php echo h($user['User']['product_count']); ?></td>
        </tr>
        <tr>
        <td>Created</td>
        <td><?php echo h($user['User']['created']); ?></td>
        </tr>
        <tr>
        <td>Modified</td>
        <td><?php echo h($user['User']['modified']); ?></td>
        </tr>
        </table>

</div>
<br />

<h3>Actions</h3>

<?php echo $this->Html->link('Edit User', array('action' => 'edit', $user['User']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete User', array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>

<br />
<br />

<br />
<br />

<style>

	#awning1 {
		<?php echo $user['User']['awning_css']; ?>
	}

</style>

<img id="awning1" src="/img/awning/awning.png">

<br />
<br />

<?php echo $this->Html->link('Edit Awning', array('action' => 'awning', $user['User']['id']), array('class' => 'btn')); ?>

<br />
<br />

<br />
<br />

<span class="label label-warning">
 &nbsp; Image : no watermark, square image size </span>

<br />
<br />

<?php echo $this->Form->create('User', array('type' => 'file', 'url' => array('controller' => 'users', 'action' => 'view', 'admin' => true)));?>
<?php echo $this->Form->hidden('id', array('value' => $user['User']['id'])); ?>
<?php echo $this->Form->hidden('slug', array('value' => $user['User']['slug'])); ?>
<table class="table-striped table-bordered table-condensed">
	<tbody>
		<tr>
			<td>Upload Image</td>
			<td><?php echo $this->Form->file('image'); ?></td>
		</tr>
		<tr>
			<td>Image Type</td>
			<td>

			<?php echo $this->Form->input('image_type', array('type' => 'select', 'label' => false, 'options' => array(
				'image' => 'Main',
				'image_1' => 'image 1',
				'image_2' => 'image 2',
				'image_3' => 'image 3',
				'image_4' => 'image 4',
				'image_5' => 'image 5',
				'image_6' => 'image 6',
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

<br />
<br />
<?php if(!empty($user['User']['image'])) : ?>   
    <br />
    Logo
    <br />
<?php echo $this->Html->image('users/image/'. $user['User']['image'] . '?date=' . time(), array('class' => 'gb')); ?>


    <br />
    <br />
    
    <?php echo $this->element('deleteimage', array(
        'model' => 'User',
        'id' => $user['User']['id'],
        'field' => 'image',
        'path' => 'users/image/',
        'file' => $user['User']['image'],
    )); ?>
<?php endif; ?>
 
<?php if(!empty($user['User']['image_1'])) : ?>   
    <br />
    Image 1
    <br />
<?php echo $this->Html->image('users/image_1/'. $user['User']['image_1'] . '?date=' . time(), array('class' => 'gb')); ?>
 
    <br />
    <br />
    
    <?php echo $this->element('deleteimage', array(
        'model' => 'User',
        'id' => $user['User']['id'],
        'field' => 'image_1',
        'path' => 'users/image_1/',
        'file' => $user['User']['image_1'],
    )); ?>
<?php endif; ?>
 
<?php if(!empty($user['User']['image_2'])) : ?>   
    <br />
    Image 2
    <br />
<?php echo $this->Html->image('users/image_2/'. $user['User']['image_2'] . '?date=' . time(), array('class' => 'gb')); ?>

    <br />
    <br />
    
    <?php echo $this->element('deleteimage', array(
        'model' => 'User',
        'id' => $user['User']['id'],
        'field' => 'image_2',
        'path' => 'users/image_2/',
        'file' => $user['User']['image_2'],
    )); ?>
<?php endif; ?>
 
<?php if(!empty($user['User']['image_3'])) : ?>   
    <br />
    Image 3
    <br />
<?php echo $this->Html->image('users/image_3/'. $user['User']['image_3'] . '?date=' . time(), array('class' => 'gb')); ?>


    <br />
    <br />
    
    <?php echo $this->element('deleteimage', array(
        'model' => 'User',
        'id' => $user['User']['id'],
        'field' => 'image_3',
        'path' => 'users/image_3/',
        'file' => $user['User']['image_3'],
    )); ?>
<?php endif; ?>
 
<?php if(!empty($user['User']['image_4'])) : ?>   
    <br />
    Image 4
    <br />
<?php echo $this->Html->image('users/image_4/'. $user['User']['image_4'] . '?date=' . time(), array('class' => 'gb')); ?>

    <br />
    <br />
    
    <?php echo $this->element('deleteimage', array(
        'model' => 'User',
        'id' => $user['User']['id'],
        'field' => 'image_4',
        'path' => 'users/image_4/',
        'file' => $user['User']['image_4'],
    )); ?>
<?php endif; ?>
 
<?php if(!empty($user['User']['image_5'])) : ?>   
    <br />
    Image 5
    <br />
<?php echo $this->Html->image('users/image_5/'. $user['User']['image_5'] . '?date=' . time(), array('class' => 'gb')); ?>

    <br />
    <br />
    
    <?php echo $this->element('deleteimage', array(
        'model' => 'User',
        'id' => $user['User']['id'],
        'field' => 'image_5',
        'path' => 'users/image_5/',
        'file' => $user['User']['image_5'],
    )); ?>
<?php endif; ?>
 
<?php if(!empty($user['User']['image_6'])) : ?>   
    <br />
    Image 3
    <br />
<?php echo $this->Html->image('users/image_6/'. $user['User']['image_6'] . '?date=' . time(), array('class' => 'gb')); ?>

    <br />
    <br />
    
    <?php echo $this->element('deleteimage', array(
        'model' => 'User',
        'id' => $user['User']['id'],
        'field' => 'image_6',
        'path' => 'users/image_6',
        'file' => $user['User']['image_6'],
    )); ?>
<?php endif; ?>
 



