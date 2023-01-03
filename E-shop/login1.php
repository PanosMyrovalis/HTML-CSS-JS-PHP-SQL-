<?php 

if (isset($_POST['submitted'])) {

	require_once ('login_functions.inc.php');
	require_once ('mysqli_connect.php');
	list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
	
	if ($check) { 
			
		
		session_start();
		$_SESSION['customer_id'] = $data['customer_id'];
		$_SESSION['first_name'] = $data['first_name'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['pass'] = $_POST['pass'];
		
		
		$url = absolute_url ('loggedin.php');
		header("Location: $url");
		exit();
			
	} else { 
		$errors = $data;
	}
		
	mysqli_close($dbc);

} 

include ('login.php');
?>
