<div class="coupons view">
<h2><?php echo __('Coupon'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threshold'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['threshold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount Numeric'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['discount_numeric']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount Percentage'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['discount_percentage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Start'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['date_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Finish'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['date_finish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coupon'), array('action' => 'edit', $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coupon'), array('action' => 'delete', $coupon['Coupon']['id']), null, __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?> </li>
	</ul>
</div>
