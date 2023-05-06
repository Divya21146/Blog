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
	<form method="post" enctype="multipart/form-data" action="profile.php">
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
		<input type="text" name="details" required><br>
		<input type="submit" name="post" value="upload">
	</form>

</body>
</html>