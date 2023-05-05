<?php
include("dbconnect.php");

if(isset($_POST['submit'])){
	extract($_POST);
	$query=mysqli_query($conn,"select * from registration where mail='$mail'");
	$count=mysqli_num_rows($query);
	if ($count != 0) {
		echo '<script>alert("mail id already exist,use different mail id!")</script>';
	}
	elseif ($password != $confirm_password) {
		echo '<script>alert("password and confirm password does not match!")</script>';
	}
	else{
	$reg_date=date('Y-m-d H:i:s');
	$qry=mysqli_query($conn,"insert into registration values ('', '$name','$mail','$password','$confirm_password','$number','$address','$reg_date')");
	if ($qry) {
		echo '<script>alert("registration successfull")
		window.location.href="login.php"</script>';	
	}
	else{
		echo '<script>alert("something went wrong! Please try again")</script>';
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registration</title>
</head>
<body>
	<div>
	<form method="post" action="registration.php">
		<h1>Registration form</h1>
		<label>Name</label>
		<input type="text" name="name" placeholder="Enter your name" required><br><br>
		<label>Email</label>
		<input type="email" name="mail" placeholder="Enter your email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required><br><br>
		<label>Password</label>
		<input type="password" name="password" placeholder="Enter your password" required><br><br>
		<label>Confirm password</label>
		<input type="password" name="confirm_password" placeholder="Enter your confirm password" required><br><br>
		<label>Mobile</label>
		<input type="number" name="number" pattern="[0-9]{10}$s" placeholder="Enter your mobile number" required><br><br>
		<label>Address</label>
		<input type="textarea" name="address" placeholder="Enter your address" required><br><br>
        <p>Already registered?<a href="login.php">login</a></p>
		<button type="submit" name="submit">submit</button>
	</form>
</div>

</body>
</html>