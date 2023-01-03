<!DOCTYPE html>
<html>
<head>
<title>Viewing Smartphones</title>
</head>
<body>
<?php 
session_start();
$row = FALSE; 

if (isset($_GET['pid']) && is_numeric($_GET['pid']) ) { // Make sure there's a print ID!

	$pid = (int) $_GET['pid'];
	

	require_once ('mysqli_connect.php'); 
	$q = "SELECT CONCAT_WS(' ', brand_name) AS brand, smartphone_name, price, description, image_name FROM brands, smartphones WHERE brands.brand_id = smartphones.brand_id AND smartphones.smartphone_id = $pid";
	$r = mysqli_query ($dbc, $q);
	if (mysqli_num_rows($r) == 1) 
	
		
		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
		
		
		$page_title = $row['smartphone_name'];
		include ('myeshop.html');
	
		
		echo "<div align=\"center\">
	<b>{$row['smartphone_name']}</b> by 
	{$row['brand']}<br />";
	
		
		

		echo "<br />\${$row['price']} 
	<a href=\"add_cart.php?pid=$pid\">Add to Cart</a>
	</div><br />";
	
		
		if ($image = @getimagesize ("gallery/$pid")) {
			echo "<div align=\"center\"><img src=\"show_image.php?image=$pid&name=" . urlencode($row['image_name']) . "\" $image[3] alt=\"{$row['smartphone_name']}\" /></div>\n";	
		} else {
			echo "<div align=\"center\">No image available.</div>\n"; 
		}
		
		
		echo '<p align="center">' . ((is_null($row['description'])) ? '(No description available)' : $row['description']) . '</p>';
	
	} 
	
	mysqli_close($dbc);



if (!$row) { 
	$page_title = 'Error';
	include ('myeshop.html');
	echo '<div align="center">This page has been accessed in error!</div>';
}


include ('footer.html');
?>

</body>
</html>