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
	<title>Add post</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.bg{
			position: absolute;
			width: 450px;
			height: 450px;
			padding: 30px 50px 0 50px;
			border: 1px solid black;
			border-radius: 10px;
			margin: 60px 370px;
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
		.bg input{
			width: 100%;
			margin-bottom: 20px;
		}
		.bg input[type=fle],
		.bg input[type=text]{
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
  font-size: 14px;
  border-radius: 10px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
  position: relative;
  overflow: hidden;
  float: right;
  margin-right: 0;
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
<nav class="nav">
  	<a style="font-size: 23px;" onclick="return false;">Welcome <?php echo $user_row['name']; ?> !</a>
    <a style="padding-left: 40px; padding-right: 40px;" href="home.php">Home</a>
    <a style="padding-left: 40px; padding-right: 40px;" href="profile.php"></i>Profile</a>
    <form style="float: right;" method="get">
		<button type="submit" name="logout" class="my-button">logout</button>
		<?php
	if(isset($_GET['logout'])){
		
		session_destroy();
		
    unset($_SESSION['mail']);
		echo '<script>window.location.href="login.php"</script>';

	}
	if ($_SESSION['mail'] == null) {
		echo '<script>window.location.href="login.php"</script>';	
	}
	?>
	</form>
  </nav>

  <div>
	<!-- <img src="#" alt="profile"> -->
	<?php
	extract($_POST);
	$mail=$_SESSION['mail'];
	$qry=mysqli_query($conn,"select * from registration where mail='$mail'");
	$row=mysqli_fetch_array($qry);
	?>		

	<?php
	if (isset($_POST['post'])) {
		if (isset($_FILES['image'])) {
		$mail=$_SESSION['mail'];
		$reg_date=date('Y-m-d');
	extract($_POST);
	$filename=uniqid().'-'.$_FILES['image']['name'];
	$fileloc=$_FILES['image']['tmp_name'];
	$folder="upload/";
	$path=move_uploaded_file($fileloc,$folder.$filename);
	$store=mysqli_query($conn,"insert into post values ('','$mail','$filename','$title', '$description', '$status', '$details','$reg_date') ");
	if ($store) {
		echo '<script>alert("upload successfully")</script>';	
	}
}
else{
	echo '<script>alert("can\'t upload")</script>';
}
}
	?>
	<div class="bg">
	<form class="form" method="post" enctype="multipart/form-data" action="profile.php">
		<!-- <input type="file" name="image"> -->
		<label>Banner:</label>
		<input type="file" name="image" accept="image/*" required><br>
		<label>Post Title:</label>
		<input type="text" name="title" required><br>
		<label>Post Description:</label>
		<input type="text" name="description" required><br>
		<label>Status:</label>
		<input type="text" name="status" required><br>
		<label>Post Details:</label>
		<input type="text" name="details" required><br><br>
		<button type="submit" name="post" class="my-button" value="upload">Upload</button>
	</form>
</div>

</body>
</html>