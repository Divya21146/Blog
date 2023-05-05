<?php
include("dbconnect.php");
error_reporting(0);
session_start();
if (isset($_POST['log'])) {
	extract($_POST);
	//$_SESSION['mail']=$mail;
	$qry=mysqli_query($conn,"select name from registration where mail='$mail' and password='$password'");
	$row=mysqli_fetch_array($qry);
	$name=$row['name'];
	if ($name != null) {
		$_SESSION['mail']=$mail;
		echo '<script>alert("login successfull")
		window.location.href="home.php"</script>';
	}
	else{
		echo '<script>alert("mail id or password is wrong")</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
</head>
<body>
	<form method="post" action="login.php">
	<label>Email</label>
		<input type="email" name="mail" placeholder="Enter your email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required><br><br>
		<label>Password</label>
		<input type="password" name="password" placeholder="Enter your password" required><br>
        <p>Not registered yet? <a href="registration.php">register</a></p>
		<button type="submit" name="log">login</button>
	</form>
	

</body>
</html>