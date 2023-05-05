<?php
include("dbconnect.php");
session_start();

extract($_POST);

$mail =  $_SESSION['mail']; 

$user = mysqli_query($conn,"select * from registration where mail = '$mail'");
$user_row = mysqli_fetch_array($user);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>profile</title>
</head>
<body>
	<header>
		<a href="home.php">Home</a>
		<a href="profile.php">Profile</a>
		<a href="posts.php">Posts</a>
		<a href="login.php">logout</a>
			</header>
	<h1>Welcome <?php echo $user_row['name']; ?> !</h1>
	<form method="get">
		<button type="submit" name="logout">logout</button>
		<?php
	if(isset($_GET['logout'])){
		
		session_destroy();
		
		header('location:login.php');
	}
	if ($_SESSION['mail'] == null) {
		header('location:login.php');	
	}
	?>
	</form>

</body>
</html>