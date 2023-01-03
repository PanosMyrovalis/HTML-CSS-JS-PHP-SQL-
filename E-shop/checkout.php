<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
</head>
<body>
<?php 
error_reporting(0);
session_start();
include ('myeshop.html');

$customer = $_SESSION['customer_id'];


$total = 178.93;

require_once ('mysqli_connect.php'); 


mysqli_autocommit($dbc, FALSE);


$q = "INSERT INTO orders (customer_id, total) VALUES ($customer, $total)";
$r = mysqli_query($dbc, $q);
if (mysqli_affected_rows($dbc) == 1) {

	
	$oid = mysqli_insert_id($dbc);
	
	
	
	
	$q = "INSERT INTO order_contents (order_id, smartphone_id, quantity, price) VALUES (?, ?, ?, ?)";
	$stmt = mysqli_prepare($dbc, $q);
	mysqli_stmt_bind_param($stmt, 'iiid', $oid, $pid, $qty, $price);
	
	
	$affected = 0;
	foreach ($_SESSION['cart'] as $pid => $item) {
		$qty = $item['quantity'];
		$price = $item['price'];
		mysqli_stmt_execute($stmt);
		$affected += mysqli_stmt_affected_rows($stmt);
	}

	
	mysqli_stmt_close($stmt);

	
	if ($affected == count($_SESSION['cart'])) { 
	
		
		mysqli_commit($dbc);
		
		
		unset($_SESSION['cart']);
		
		
		echo '<div align = "center"><p><b>Thank you for your order. You will be notified when the items will be shipped!</b></p></div>';
		echo '<div align = "center"><img src="https://d1yn1kh78jj1rr.cloudfront.net/image/preview/rDtN98Qoishumwih/thank-you-message-as-thanks-sent-on-mobile_fksQMMDd_SB_PM.jpg"  width="600" height="400"/> ';
		
	
	} else { 
	
		mysqli_rollback($dbc);
		
		echo '<div align = "center"><p><b>Your order could not be processed due to a system error. You will be contacted in order to have the problem fixed. We apologize for the inconvenience.</b></p></div>';
		
		
	}

} else { 

	mysqli_rollback($dbc);

	echo '<br><br><div align = "center"><p><b>You have to log in to be able to complete your order!</b></p></div>';
	echo '<p class = "thanks"> <a href = "login.php">log in!</a></p><p><br /></p>';
	
	
}

mysqli_close($dbc);

include ('footer.html');
?>


</body>
</html>