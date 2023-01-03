<!DOCTYPE html>
<html>
<head>
<title>My cart</title>
</head>
<body>

<?php 



session_start();
include ('myeshop.html');


if (isset($_POST['submitted'])) {

	
	foreach ($_POST['qty'] as $k => $v) {

		
		$pid = (int) $k;
		$qty = (int) $v;
		
		if ( $qty == 0 ) { 
			unset ($_SESSION['cart'][$pid]);
		} elseif ( $qty > 0 ) { 
			$_SESSION['cart'][$pid]['quantity'] = $qty;
		}
		
	} 
} 


if (!empty($_SESSION['cart'])) {

	
	require_once ('mysqli_connect.php');
	$q = "SELECT smartphone_id, CONCAT_WS(' ', brand_name) AS brand, smartphone_name FROM brands, smartphones WHERE brands.brand_id = smartphones.brand_id AND smartphones.smartphone_id IN (";
	foreach ($_SESSION['cart'] as $pid => $value) {
		$q .= $pid . ',';
	}
	$q = substr($q, 0, -1) . ') ORDER BY brands.brand_name ASC';
	$r = mysqli_query ($dbc, $q);
	
	
	echo '<form action="mycart.php" method="post">
<table border="0" width="90%" cellspacing="3" cellpadding="3" align="center">
	<tr>
		<td align="left" width="30%"><b>Brand</b></td>
		<td align="left" width="30%"><b>Smartphone Name</b></td>
		<td align="right" width="10%"><b>Price</b></td>
		<td align="center" width="10%"><b>Qty</b></td>
		<td align="right" width="10%"><b>Total Price</b></td>
	</tr>
';

	
	$total = 0; 
	while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
		
		
		$subtotal = $_SESSION['cart'][$row['smartphone_id']]['quantity'] * $_SESSION['cart'][$row['smartphone_id']]['price'];
		$total += $subtotal;
		
		
		echo "\t<tr>
		<td align=\"left\">{$row['brand']}</td>
		<td align=\"left\">{$row['smartphone_name']}</td>
		<td align=\"right\">\${$_SESSION['cart'][$row['smartphone_id']]['price']}</td>
		<td align=\"center\"><input type=\"text\" size=\"3\" name=\"qty[{$row['smartphone_id']}]\" value=\"{$_SESSION['cart'][$row['smartphone_id']]['quantity']}\" /></td>
		<td align=\"right\">$" . number_format ($subtotal, 2) . "</td>
	</tr>\n";
	
	} 
	
	mysqli_close($dbc); 

	
	echo '<tr>
		<td colspan="4" align="right"><b>Total:</b></td>
		<td align="right">$' . number_format ($total, 2) . '</td>
	</tr>
	</table>
	<div align="center"><input type="submit" name="submit" value="Update My Cart" /></div>
	<input type="hidden" name="submitted" value="TRUE" />
	</form><p align="center">Enter a quantity of 0 to remove an item.
	<br /><br /><a href="checkout.php">Checkout</a></p>';

} else {
	echo '<br><br><div align="center"><p><b>Your cart is currently empty.</b></p> </div>';
	echo '<br><p class = "thanks">Explore all our new smartphones in  <a href = "products.php">products!</a></p><p><br /></p>';
}

include ('footer.html');

?>
</body>
</html>