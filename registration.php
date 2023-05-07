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
	elseif (strlen($number) != 10) {
	echo '<script>alert("Phone number must contain 10 digits")</script>';
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
	<style>
		*{
			font-family: sans-serif;
		}
		.container {
			margin: 130px 360px;
		}
		.left{
			margin: -110px -180px 20px;
			float: left;
			background-color: #fff;
			display: flex;
			overflow: hidden;
			width: 500px;
			height: 650px;
		}
		.left img {
			  width: 100%;
			  height: 100%;
			  object-fit: cover;
			}
		.bg{
			float: right;
			margin: -110px 320px 20px;
			position: absolute;
			width: 400px;
			height: 638px;
			padding: 10px 50px 0 50px;
			border: 1px solid black;
		}
		.bg h1{
			margin: 0;
			color: black;
			padding-top: 10px;
			text-align: center;
			font-style: italic;
		}
		.bg label{
			margin: 0;
			padding: 0;
			color: #000;
		}
		p{
			color: #000;
		}
		a{
			color: purple;
			font-style: italic;
			font-weight: bold;
			text-decoration: none;

		}
		a:hover{
			color: royalblue;
		}
		.bg input{
			width: 100%;
			margin-bottom: 20px;
		}
		.bg input[type=email],
		.bg input[type=password],
		.bg input[type=text],
		.bg input[type=number],
		.bg input[type=textarea]{
			border: none;
			border-bottom: 1px solid #000;
			background: transparent;
			outline: none;
			height: 35px;
			color: #000;
			font-size: 15px;
		}
		.my-button {
  background-color: rgb(24,117,255);
  border: none;
  color: white;
  padding: 10px 30px;
  text-align: center;
  /*text-decoration: none;
  display: inline-block;*/
  font-size: 16px;
  border-radius: 10px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
  position: relative;
  overflow: hidden;
  float: right;
}

.my-button:after {
  content: "";
  background-color: rgba(150,200,255, 0.2);
  position: absolute;
  top: 50%;
  left: 50%;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
}

.my-button:hover:after {
  animation: ripple_401 1s ease-out;
}

@keyframes ripple_401 {
  0% {
    width: 5px;
    height: 5px;
    opacity: 1;
  }

  100% {
    width: 200px;
    height: 200px;
    opacity: 0;
  }
}

	</style>
</head>
<body>
	<div class="container">
		<div class="left"><img src="mount.jpg"></div>
		<div class="bg">
			<form method="post" action="registration.php" autocomplete="off">
		<h1>Registration form</h1><br>
		<label>Name</label>
		<input type="text" name="name" placeholder="Enter your name" required><br>
		<label>Email</label>
		<input type="email" name="mail" placeholder="Enter your email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required><br>
		<label>Password</label>
		<input type="password" name="password" placeholder="Enter your password" required><br>
		<label>Confirm password</label>
		<input type="password" name="confirm_password" placeholder="Enter your confirm password" required><br>
		<label>Mobile</label>
		<input type="number" name="number" pattern="[0-9]{10}$s" placeholder="Enter your mobile number" required><br>
		<label>Address</label>
		<input type="textarea" name="address" placeholder="Enter your address" required><br>
        <p>Already registered?<a href="login.php">login</a></p>
		<button type="submit" name="submit" class="my-button">register</button>
	</form>
</div>
</div>

</body>
</html>