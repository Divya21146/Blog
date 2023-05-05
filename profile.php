<?php
include("dbconnect.php");
session_start();
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
	<div>
	<img src="#" alt="profile">
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
	extract($_POST);
	$filename=uniqid().'-'.$_FILES['image']['name'];
	$fileloc=$_FILES['image']['tmp_name'];
	$folder="upload/";
	$path=move_uploaded_file($fileloc,$folder.$filename);
	$store=mysqli_query($conn,"insert into post values ('','$mail','$filename') ");
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

		<p><?php echo $row['name'] ?></p>
		<input type="file" name="image">
		<input type="submit" name="post" value="upload">
	</form>
	<?php
	$folder="upload/";
	$show=mysqli_query($conn,"select * from post where mail='$mail'");
	while($row1=mysqli_fetch_array($show)){
	?>
	<p style="display: inline;"><img src="<?php echo "$folder".$row1['image']; ?>" width="300px" height="300px"> </p>
	<a href="?id=<?php echo $row1['id']; ?>" >delete</a>
	<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$del=mysqli_query($conn,"delete from post where id='$id'");
		if ($del) {
			    header("location:profile.php");
		}
		else{
			echo '<script>alert("can\'t delete")</script>';
		}
	}
	?>
	<?php
}
?>
</div>
</body>
</html>