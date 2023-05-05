<?php
include("dbconnect.php");
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>posts</title>
</head>
<body>
	<header>
		<a href="home.php">Home</a>
		<a href="profile.php">Profile</a>
		<a href="posts.php">Posts</a>
		<a href="login.php">logout</a>
	</header>
	<div>
	<?php
	$mail=$_SESSION['mail'];
	$qry1=mysqli_query($conn,"select * from registration where mail='$mail'");
	$row=mysqli_fetch_array($qry1);
	?>
	<img src="#" alt="profile">
	<p><?php echo $row['name'] ?></p>
<?php
$folder="upload/";
$qry=mysqli_query($conn,"select image from post");
while($row1=mysqli_fetch_array($qry)){
?>
<img src="<?php echo "$folder".$row1['image']; ?>" width="300px" height="300px">
<?php 
}
?>
</div>
</body>
</html>