<!DOCTYPE html>
<html>
<head>
<title>Change your password</title>
</head>
<body>
<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();


include ('myeshop.html');

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {
	

	require_once ('mysqli_connect.php'); // Connect to the db.
	
	$errors = array(); // Initialize an error array.
	
	if (!isset($_SESSION['customer_id']))
	{
		// Check for an email address:
		if (empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email address.';
		} else {
			$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
		}
	
		// Check for the current password:
		if (empty($_POST['pass'])) {
			$errors[] = 'You forgot to enter your current password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
		}
	}
	else
	{
		$e = $_SESSION['email'];
		$p = $_SESSION['pass'];
	}

	// Check for a new password and match 
	// against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your new password did not match the confirmed password.';
		} else {
			$np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$errors[] = 'You forgot to enter your new password.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Check that they've entered the right email address/password combination:
		$q = "SELECT customer_id FROM customers WHERE (email='$e' AND pass=SHA1('$p') )";
		$r = @mysqli_query($dbc, $q);
		$num = @mysqli_num_rows($r);
		if ($num == 1) { // Match was made.
		
			// Get the user_id:
			$row = mysqli_fetch_array($r, MYSQLI_NUM);

			// Make the UPDATE query:
			$q = "UPDATE customers SET pass=SHA1('$np') WHERE customer_id=$row[0]";		
			$r = @mysqli_query($dbc, $q);
			
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
			
				
				if (isset($_SESSION['customer_id']))
				{
					$_SESSION = array(); // Clear the variables.
					session_destroy(); // Destroy the session itself.
					// Print a message.
					echo '<h1>Thank you!</h1>
					<p>Your password has been updated. You must log in with the new password!</p><p><br /></p>';
     				echo'<form action="login1.php" method="post">
					<p>Email Address: <input type="text" name="email" size="20" maxlength="80" /> </p>
					<p>Password: <input type="password" name="pass" size="20" maxlength="20" /></p>
					<p><input type="submit" name="submit" value="Login" /></p>
					<input type="hidden" name="submitted" value="TRUE" />
					</form>';
				}
				else
				{
					// Print a message.
					echo '<h1 class = "error">Thank you!</h1>
					<p  class = "error">Your password has been updated. You are now able to log in with the new password!</p><p><br /></p>';
					echo '<p class = "thanks"> <a href = "login.php">log in!</a></p><p><br /></p>';
				}

			} else { // If it did not run OK.
			
				// Public message:
				echo '<h1 class = "error">System Error</h1>
				<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience. Please log in again.</p>'; 
				echo '<p class = "thanks"> <a href = "login.php">log in!</a></p><p><br /></p>';
				
				
				
			}

			// Include the footer and quit the script (to not show the form).
			include ('footer.html'); 
			exit();
				
		} else { // Invalid email address/password combination.
			echo '<h1 class = "error">Error!</h1>
			<p class="error">The email address and password do not match those on file. Please try again</p>';
		}
		
	} else { // Report the errors.
	
		echo '
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p class="error">Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

	mysqli_close($dbc); // Close the database connection.
		
} // End of the main Submit conditional.
?>
<div align='center'>
<h1>Change Your Password</h1>
<form action="changepassword.php" method="post">
	
	<p>Email Address: <input type="text" name="email" size="20" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Current Password: <input type="password" name="pass" size="10" maxlength="20" /></p>
	<p>New Password: <input type="password" name="pass1" size="10" maxlength="20" /></p>
	<p>Confirm New Password: <input type="password" name="pass2" size="10" maxlength="20" /></p>
	<p><input type="submit" name="submit" value="Change Password" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
</div>
<?php
session_destroy();
include ('footer.html');
?>

</body>
</html>