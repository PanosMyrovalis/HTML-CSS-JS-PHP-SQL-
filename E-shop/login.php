<?php 



include ('myeshop.html');


if (!empty($errors)) {
	echo '<h1 class = "lg">Error!</h1>
	<p class="lg">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p class = "lg">Please try again.</p>';
}


?>
<div class = "lg">
<h1 >Login</h1>

<form action="login1.php" method="post">
	<p>Email Address: <input type="text" name="email" size="20" maxlength="80" /> </p>
	<p>Password: <input type="password" name="pass" size="20" maxlength="20" /></p>
	<p><input class = "button" type="submit" name="submit" value="Login" /></p>
	<input  type="hidden" name="submitted" value="TRUE" />
</form>
</div>


<?php // Include the footer:
include ('footer.html');
?>
