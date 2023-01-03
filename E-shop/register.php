

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>
<?php 


include ('myeshop.html');


if (isset($_POST['submitted'])) {

	require_once ('mysqli_connect.php'); 
		
	$errors = array(); 
	
	
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}
	
	
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) { 
	
		
		
		
		$q = "INSERT INTO customers (first_name, last_name, email, pass) VALUES ('$fn', '$ln', '$e', SHA1('$p'))";		
		$r = @mysqli_query ($dbc, $q); 
		if ($r) { 
		
			
			echo '<h1 class = "thanks">Thank you!</h1>
		<p class = "thanks">You are now registered. You are now able to <a href = "login.php">log in!</a></p><p><br /></p>';	
		
		
		} else { 
			
			
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} 
		
		mysqli_close($dbc); 

		
		include ('footer.html'); 
		exit();
		
	} else { 
	
		echo '<h1 class = "error">Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p class = "error">Please try again.</p><p><br /></p>';
		
	} 
	
	mysqli_close($dbc); 

} 
?>
<h1 class = "rgs">Register</h1>
<form class = "registration" action="register.php" method="post">
	<p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Password: <input type="password" name="pass1" size="10" maxlength="20" /></p>
	<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" /></p>
	<p><input class = "button" type="submit" name="submit" value="Register" /></p>
	<input  type="hidden" name="submitted" value="TRUE" />
</form>
<?php
include ('footer.html');
?>



</body>
</html>
