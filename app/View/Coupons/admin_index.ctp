<h2>Coupons</h2>
<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('code'); ?></th>
		<th><?php echo $this->Paginator->sort('threshold'); ?></th>
		<th><?php echo $this->Paginator->sort('type'); ?></th>
		<th><?php echo $this->Paginator->sort('discount'); ?></th>
		<th><?php echo $this->Paginator->sort('date_start'); ?></th>
		<th><?php echo $this->Paginator->sort('date_finish'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($coupons as $coupon): ?>
	<tr>
		<td><?php echo h($coupon['Coupon']['id']); ?></td>
		<td><?php echo h($coupon['Coupon']['name']); ?></td>
		<td><?php echo h($coupon['Coupon']['description']); ?></td>
		<td><?php echo h($coupon['Coupon']['code']); ?></td>
		<td><?php echo h($coupon['Coupon']['threshold']); ?></td>
		<td><?php echo h($coupon['Coupon']['type']); ?></td>
		<td><?php echo h($coupon['Coupon']['discount']); ?></td>
		<td><?php echo h($coupon['Coupon']['date_start']); ?></td>
		<td><?php echo h($coupon['Coupon']['date_finish']); ?></td>
		<td><?php echo h($coupon['Coupon']['created']); ?></td>
		<td><?php echo h($coupon['Coupon']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $coupon['Coupon']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $coupon['Coupon']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $coupon['Coupon']['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />


<h3>Actions</h3>

<?php echo $this->Html->link('New Coupon', array('action' => 'add'), array('class' => 'btn')); ?>