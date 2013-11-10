<style>

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
        <h2>STORE ADMIN COPY</h2>
        
        
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
        
        
        
        <table width="600">
            <tr>
                
                <th scope="col">BILLING ADDRESS</th>
                <th scope="col">SHIPPING ADDRESS</th>
               
            </tr>
            <tr>
                <td><?php echo $order['Order']['billing_address'];?></td>
                <td><?php echo $order['Order']['shipping_address'];?></td>
            </tr>
            <?php if(!empty($order['Order']['billing_address2'])) :?>
            <tr>
                <td><?php echo $order['Order']['billing_address2'];?></td>
                <td><?php echo $order['Order']['shipping_address2'];?></td>
            </tr>
            
            <?php elseif(!empty($order['Order']['shipping_address2']))  : ?>
            <tr>
                <td><?php echo $order['Order']['billing_address2'];?></td>
                <td><?php echo $order['Order']['shipping_address2'];?></td>
            </tr>
        
            <?php endif; ?>
            <tr>
                <td><?php echo $order['Order']['billing_city'];?>,&nbsp;<?php echo $order['Order']['billing_state'];?>&nbsp;&nbsp;<?php echo $order['Order']['billing_zip'];?></td>
                <td><?php echo $order['Order']['shipping_city'];?>,&nbsp;<?php echo $order['Order']['shipping_state'];?>&nbsp;&nbsp;<?php echo $order['Order']['shipping_zip'];?></td>
            </tr>
        </table>
        
        <br />
        <br />
        Order IP Address: <?php echo $order['Order']['ip_address'];?>
        <br />
        Remote Host: <?php echo $order['Order']['remotehost'];?>
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
        <?php foreach ($order['OrderItem'] as $orderitem): ?>
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
        Subtotal: $<?php echo $order['Order']['subtotal'];?>
        <br />
        Shipping: $<?php echo $order['Order']['shipping'];?>
        <br />
        <strong>Total: $<?php echo $order['Order']['total'];?></strong>
        <br />
        <br />
        
        <h2>Order by Vendor</h2>
        
        <table>
        <tr>
        <th>Vendor</th>
        <th>Shipping Method</th>
        <th>Weight</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Shipping</th>
        <th>Total</th>
        </tr>
        <?php foreach ($order['OrderUser'] as $vendor): ?>
        <tr>
        <td><?php echo $vendor['User']['name']; ?></td>
        <td><?php echo $vendor['shipping_method']; ?></td>
        <td><?php echo $vendor['weight']; ?></td>
        <td><?php echo $vendor['quantity']; ?></td>
        <td>$<?php echo $vendor['subtotal']; ?></td>
        <td><?php echo $vendor['shipping']; ?></td>
        <td>$<?php echo $vendor['total']; ?></td>
        </tr>
        <?php endforeach; ?>
        </table>
        
        <br />
        <br />
        <br />
        <br />
	</div>
</body>