<style>
body, p, table {
	font-family: "Lucida Grande", Tahoma, Verdana, Arial, sans-serif;
	font-size:12px;
	text-align:left;
}
h2 {
	font-size:17px;
}
th {
	background-color:#E4F5D2;
}
</style>
<body>
<div style="margin-left:30px">
    <h2 align="center">Gourmet World Market PURCHASE ORDER</h2>
    <p> </p>
    <table width="100%" border="0">
        <tr>
            <th width="50%" scope="col">Vendor:</th>
            <td width="5%" bgcolor="#FFFFFF" scope="col">&nbsp;</td>
            <th width="8%" scope="col">Date</th>
            <td width="22%" scope="col"><?php echo $order['Order']['created'];?></td>
        </tr>
        <tr>
        <tr>
            <td><?php echo $orderitem['User']['name']; ?></td>
        </tr>
        <tr>
            <td><?php echo $orderitem['User']['address']; ?></td>
        </tr>
        <tr>
            <td><?php echo $orderitem['User']['city']; ?>,&nbsp;<?php echo $orderitem['User']['state'] . $orderitem['User']['zip']; ?></td>
        </tr>
        <tr>
            <td><?php echo $orderitem['User']['email']; ?></td>
        </tr>
        <tr>
            <td><?php echo $orderitem['User']['phone']; ?></td>
        </tr>
        <tr> </tr>
    </table>
    <br />
    <br />
    <table width="100%" border="0">
        <tr>
            <th width="265" scope="col"> Bill to:</th>
            <td width="19" bgcolor="#FFFFFF" scope="col"></td>
            <th width="262" scope="col">Ship to:</th>
        </tr>
        <tr>
            <td>Gourmet World Market</td>
            <td>&nbsp;</td>
            <td><?php echo $order['Order']['first_name'];?>&nbsp;<?php echo $order['Order']['last_name'];?></td>
        </tr>
        <tr>
            <td>4066 West 7th St.</td>
            <td>&nbsp;</td>
            <td><?php echo $order['Order']['shipping_address'];?>
                <?php if(!empty($order['Order']['shipping_address2']))  : ?>
                <?php endif; ?></td>
        </tr>
        <tr>
            <td>Los Angeles, CA 90005-3503</td>
            <td>&nbsp;</td>
            <td><?php echo $order['Order']['shipping_city'];?>,&nbsp;<?php echo $order['Order']['shipping_state'];?>&nbsp;&nbsp;<?php echo $order['Order']['shipping_zip'];?></td>
        </tr>
        <tr>
            <td>info@gourmetworldmarket.com</td>
            <td>&nbsp;</td>
            <td><?php echo $order['Order']['email'];?></td>
        </tr>
        <tr>
            <td>212-568-3030</td>
            <td>&nbsp;</td>
            <td><?php echo $order['Order']['phone'];?></td>
        </tr>
    </table>
    <br />
    <br />
    <table width="100%" border="0">
        <tr>
            <th width="112" scope="col">PO Number</th>
            <th width="91" scope="col">Terms</th>
            <th width="40" scope="col">Rep</th>
            <th width="78" scope="col">Ship Date</th>
            <th width="117" scope="col">Shipped By</th>
            <th width="111" scope="col">FOB</th>
        </tr>
        <tr>
            <td><?php echo $order['Order']['id'];?></td>
            <td>Net 30</td>
            <td>GWM</td>
            <td>ASAP</td>
            <td><?php echo $vendor['shipping_service'];?></td>
            <td><?php echo $order['Order']['shipping_city'];?></td>
        </tr>
    </table>
    <br />
    <br />
    <table width="100%">
        <tr>
            <th width="18%">Quantity</th>
            <th width="28%">Item Number</th>
            <th width="28%">Description</th>
            <th width="11%">Price</th>
            <th width="15%">Total</th>
        </tr>
        <?php foreach ($vendoritems as $orderitem): ?>
        <tr>
            <td><?php echo $orderitem['quantity']; ?></td>
            <td><?php echo $orderitem['id']; ?></td>
            <td><?php echo $orderitem['name']; ?></td>
            <td>$<?php echo $orderitem['price']; ?></td>
            <td>$<?php echo $orderitem['subtotal']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />
    <br />
    <table width="100%" border="0">
        <tr>
            <th width="85%"><div align="right">Order Total</div></th>
            <td width="15%"> $<?php echo $vendor['subtotal'];?></td>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <th width="30%"><div align="right">GWM Calculated Weight</div></th>
            <td width="11%"><?php echo $vendor['weight'];?></td>
            <th width="44%"><div align="right">Shipping Charges Collected</div></th>
            <td width="15%">$<?php echo $vendor['shipping'];?></td>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <th width="85%"><div align="right">Taxes</div></th>
            <td width="15%"></td>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <th width="85%"><div align="right">Grand Total</div></th>
            <td width="15%">$<?php echo $vendor['total'];?></td>
        </tr>
    </table>
    
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
