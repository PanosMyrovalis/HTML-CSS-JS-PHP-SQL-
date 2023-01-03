<!DOCTYPE html>
<html>
<head>
<title>Products</title>
</head>
<body>

<?php
session_start();
include ('myeshop.html');

require_once ('mysqli_connect.php');
 

$q = "SELECT brands.brand_id, CONCAT_WS(' ', brand_name) AS brand, smartphone_name, price, description, smartphone_id FROM brands, smartphones WHERE brands.brand_id = smartphones.brand_id ORDER BY brands.brand_name ASC, smartphones.smartphone_name ASC";


if (isset($_GET['aid']) && is_numeric($_GET['aid']) ) {
	$aid = (int) $_GET['aid'];
	if ($aid > 0) { // Overwrite the query:
		$q = "SELECT brands.brand_id, CONCAT_WS(' ', brand_name) AS brand, smartphone_name, price, description, smartphone_id FROM brands, smartphones WHERE brands.brand_id = smartphones.brand_id  AND smartphones.brand_id = $aid ORDER BY smartphones.smartphone_name";
	}
}


echo '<table border="0" width="90%" cellspacing="3" cellpadding="3" align="center">
	<tr>
		<td align="left" width="20%"><b>Brand </b></td>
		<td align="left" width="20%"><b>Smartphone name</b></td>
		<td align="left" width="20%"><b>Description</b></td>
		<td align="left" width="20%"><b>Price</b></td>
	</tr>';


$r = mysqli_query ($dbc, $q);
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

	
	echo "\t<tr>
		<td align=\"left\"><a href=\"products.php?aid={$row['brand_id']}\">{$row['brand']}</a></td>
		<td align=\"left\"><a href=\"view_smartphone.php?pid={$row['smartphone_id']}\">{$row['smartphone_name']}</td>
		<td align=\"left\">{$row['description']}</td>
		<td align=\"left\">\${$row['price']}</td>
	</tr>\n";
	
	

} 


echo '</table>';
mysqli_close($dbc);

echo " <ul><br> <br> <br> <br> <li> <b>Tip </b> : Click on the brand name of your desire, to filter the products according to your preference! </li> </ul>";
echo " <ul> <li> <b>Tip </b> : Click on the smartphone name of your desire, to read more infomation about it, and to add it to your cart! </li> </ul>";



include ('footer.html');
?>
</body>
</html>