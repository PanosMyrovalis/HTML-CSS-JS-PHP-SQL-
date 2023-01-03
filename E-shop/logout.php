<?php 


session_start(); 


if (!isset($_SESSION['customer_id'])) {

	require_once ('login_functions.inc.php');
	$url = absolute_url();
	header("Location: $url");
	exit();

} else { 

	$_SESSION = array(); 
	session_destroy(); 
}



include ('myeshop.html');


echo "<div align='center'><h1>Logged Out!</h1>
<p>You are now logged out!</p> </div>";


include ('footer.html');
?>
