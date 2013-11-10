g<style>

body, p, table {
	font-family: "Lucida Grande", Tahoma, Verdana, Arial, sans-serif;	
	font-size:12px;
	text-align:left;
}

h2 {
	font-size:17px;	
}
</style>
<body>
    <div style="margin-left:30px">
        <h2>VENDOR COPY</h2>
        
        Shop Order Id: <?php echo $order['Order']['id'];?>
        <br />
        Created: <?php echo $order['Order']['created'];?>
        <br />
        <br />
        
        <h2>Customer</h2>
        
        Name: <?php echo $order['Order']['first_name'];?>&nbsp;<?php echo $order['Order']['last_name'];?>
        <br />
        Email: <?php echo $order['Order']['email'];?>
        <br />
        Phone: <?php echo $order['Order']['phone'];?>
        <br />
        <br />
        
       Please ship to:
          <p><?php echo $order['Order']['shipping_address'];?></p>
	<?php if(!empty($order['Order']['shipping_address2']))  : ?>
		<p> <?php echo $order['Order']['shipping_address2'];?></td></p>
    <?php endif; ?>       
		 <p><?php echo $order['Order']['shipping_city'];?>,&nbsp;<?php echo $order['Order']['shipping_state'];?>&nbsp;&nbsp;<?php echo $order['Order']['shipping_zip'];?></p>
         
        
        <br />
        <br />
        
        
        <h2>Order Items</h2>
        
        <table>
        <tr>
        <th>Vendor</th>
        <th>Product</th>
        <th>Weight</th>
        <th>Weight Total</th>
        <th>Product Price</th>
        <th>Quantity</th>
        <th>Product Subtotal</th>
        </tr>
        <?php foreach ($vendoritems as $orderitem): ?>
        <tr>
        <td><?php echo $orderitem['User']['name']; ?></td>
        <td><?php echo $orderitem['name']; ?></td>
        <td><?php echo $orderitem['weight']; ?></td>
        <td><?php echo $orderitem['weight_total']; ?></td>
        <td>$<?php echo $orderitem['price']; ?></td>
        <td><?php echo $orderitem['quantity']; ?></td>
        <td>$<?php echo $orderitem['subtotal']; ?></td>
        </tr>
        <?php endforeach; ?>
        </table>
        
        <br />
        <br />
        
        Total Quantity: <?php echo $vendor['quantity'];?>
        <br />
        Weight Total: <?php echo $vendor['weight'];?>
        <br />
        
        <br />
        <br />
        Subtotal: $<?php echo $vendor['subtotal'];?>
        <br />
        Shipping: $<?php echo $vendor['shipping'];?>
        <br />
        Total: $<?php echo $vendor['total'];?>
        <br />
        <br />
        
        <br />
        <br />
        
        Shipping Service Chosen:$<?php echo $vendor['shipping_service'];?>
        
        <br />
        <br />
        <br />
        <br />
        <br />
        
        <!--////////////////////////////////////////////////////////////-->
        <br />
        <?php //print_r($order); ?>
        <br />
        <!--////////////////////////////////////////////////////////////-->
        <br />
        <?php //print_r($vendor); ?>
        <br />
        <!--////////////////////////////////////////////////////////////-->
        <br />
        <?php //print_r($paypal); ?>
        <br />
        <!--////////////////////////////////////////////////////////////-->
        <br />
        
    </div>
</body>