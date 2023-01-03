<!DOCTYPE html>
<html>
<head>
<title>Add to cart</title>
</head>
<body>

<?php 


session_start();

include ('myeshop.html');

if (isset ($_GET['pid']) && is_numeric($_GET['pid']) ) { 

	$pid = (int) $_GET['pid'];

	
	if (isset($_SESSION['cart'][$pid])) {
	
		$_SESSION['cart'][$pid]['quantity']++; 

		
		echo '<div align="center"><p><b>Another device of the smartphone has been added to your shopping cart!</b></p> </div>';
		
	} else { 

		
		require_once ('mysqli_connect.php');
		$q = "SELECT price FROM smartphones WHERE smartphones.smartphone_id = $pid";
		$r = mysqli_query ($dbc, $q);		
		if (mysqli_num_rows($r) == 1) { 
		
			
			list($price) = mysqli_fetch_array ($r, MYSQLI_NUM);
			
			
			$_SESSION['cart'][$pid] = array ('quantity' => 1, 'price' => $price);

			
			echo '<div align="center"><p > <b>The smartphone has been added to your shopping cart! </b></p> </div>';

		} else { 
			echo '<div align="center">This page has been accessed in error!</div>';
		}
		
		mysqli_close($dbc);

	} 

} else { 
	echo '<div align="center">This page has been accessed in error!</div>';
}

include ('footer.html');
?>
</body>
</html>