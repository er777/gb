<style>

body, p, table {
	font-family: "Lucida Grande", Tahoma, Verdana, Arial, sans-serif;	
	font-size:12px;
	text-align:left;
}

h2 {
	font-size:17px;	
}

table.list td {
	font-size:10px;
}
</style>
<body>
    <div style="margin-left:30px">


        <h2>CUSTOMER COPY</h2>
        
        
        Gourmet Basket Order ID:#<?php echo $order['Order']['id'];?>
        <br />
        Date of Purchase: <?php echo $order['Order']['created'];?>
        <br />
        <br />
        
        For:&nbsp;<?php echo $order['Order']['first_name'];?>&nbsp;<?php echo $order['Order']['last_name'];?>
                <br />
                Email: <?php echo $order['Order']['email'];?>
                <br />
                Phone: <?php echo $order['Order']['phone'];?>
        <br />
               
        <br />
               For shipment to:<br />
                <?php echo $order['Order']['shipping_address'];?><br />
            <?php if(!empty($order['Order']['shipping_address2']))  : ?>
                <?php echo $order['Order']['shipping_address2'];?><br />
            <?php endif; ?>       
                 <?php echo $order['Order']['shipping_city'];?>,&nbsp;<?php echo $order['Order']['shipping_state'];?>&nbsp;&nbsp;<?php echo $order['Order']['shipping_zip'];?><br />
                 
        
        <br />
        
        <h2>Your Order Items</h2>
        
        <table class="list">
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
        Subtotal: $<?php echo $order['Order']['subtotal'];?>
        <br />
        Shipping: $<?php echo $order['Order']['shipping'];?>
        <br />
        <br />
        Total: $<?php echo $order['Order']['total'];?>
        <br />        
        <br />
        <br />
        <br />
   </div>    
</body>