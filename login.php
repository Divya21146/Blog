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
		echo '<script>window.location.href="loader.php"</script>';
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
	<style>
		*{
			font-family: sans-serif;
		}
		.container {
			margin: 130px 360px;
		}
		.left{
			margin: -60px -130px;
			float: left;
			background-color: #fff;
			display: flex;
			overflow: hidden;
			width: 500px;
			height: 600px;
		}
		.left img {
			  width: 100%;
			  height: 100%;
			  object-fit: cover;
			}
		.bg{
			float: right;
			margin: -60px 370px;
			position: absolute;
			width: 400px;
			height: 568px;
			padding: 30px 50px 0 50px;
			border: 1px solid black;
		}
		.bg h1{
			margin: 0;
			padding: 0 0 20px;
			color: black;
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
		.bg input[type=password]{
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
			<form method="post" action="login.php"><br><br><br><br><br>
				<h1>Login</h1><br>
				<label>Email</label>
				<input type="email" name="mail" placeholder="Enter your email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required><br><br>
				<label>Password</label>
				<input type="password" name="password" placeholder="Enter your password" required><br>
		        <p>Not registered yet? <a href="registration.php">register</a></p><br>
				<button type="submit" name="log" class="my-button">login</button>
			</form>
		</div>
	</div>

	

</body>
</html>