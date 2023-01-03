<?php 



session_start(); 


if (!isset($_SESSION['customer_id'])) {
	require_once ('login_functions.inc.php');
	$url = absolute_url();
	header("Location: $url");
	exit();	
}

$page_title = 'Logged In!';
include ('myeshop.html');


echo "<div align='center'><h1>Logged In!</h1>
<p class  >You are now logged in, {$_SESSION['first_name']}! </p>
<p class ><a href=\"logout.php\">Logout</a></p></div>";

include ('footer.html');
?>
