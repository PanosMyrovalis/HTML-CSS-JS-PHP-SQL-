<!DOCTYPE html>
<html>
<head>
<title>My account</title>
</head>
<body>

<?php 
session_start();
include ('myeshop.html');


echo "<div align='center'><h1>Welcome to your account, {$_SESSION['first_name']}!</h1> <br>";
echo "<div align='center'><h2>If you wish, you can change your password by pressing the button below!</h2> <br>";
echo "<div align='center'><p>(If you press the button below,<b> you will automatically be logged out when you leave the change your password page </b>,even if you didnt change your password, due to safety reasons)</p> <br>";
?>

<form action="changepassword.php" method="post">

	<p><input class = "button" type="submit" name="submit" value="Change your password" /></p>
	<input  type="hidden" name="submitted" value="TRUE" />
</form>
</div>


<?php 
include ('footer.html');
?>
</body>
</html>