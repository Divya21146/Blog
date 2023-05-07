<?php
include("dbconnect.php");
// ob_start();
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
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<nav class="nav">
  	<a style="font-size: 23px;" onclick="return false;">Welcome <?php echo $user_row['name']; ?> !</a>
    <a style="padding-left: 40px; padding-right: 40px;" href="home.php">Home</a>
    <a style="padding-left: 40px; padding-right: 40px;" href="profile.php"></i>Profile</a>
    <form style="float: right;" method="get">
		<button type="submit" name="logout" class="my-button">logout</button>
		
	</form>
  </nav><br>
  <div><a href="addpost.php"> 
<button class="icon-btn add-btn">
    <div class="add-icon"></div>
    <div class="btn-txt">Add Post</div>
</button>
</a>
</div>
	
	<?php
	$folder="upload/";
	$show=mysqli_query($conn,"select * from post where mail='$mail' ORDER BY id DESC");
	while($row1=mysqli_fetch_array($show)){
	?>

    <div class="card" style="margin-left: 40px; margin-right: 30px;">
 <div class="image"><img src="<?php echo "$folder".$row1['image']; ?>">

</div>
  <div class="content">
      <span style="text-transform: uppercase;" class="title">
        <?php echo $row1['title']; ?>
      </span>
      <div class="scroll">
    <p class="desc1">
      <i><?php echo $row1['description']; ?></i>
    </p>
</div>
    <p class="desc">
      <?php echo $row1['status']; ?>
    </p>
    <a href="detail.php?id=<?php echo $row1['id']?>">
      <button class="detail" style="vertical-align:middle"><span>Click</span></button>
    </a><br><br>
    <a style="float: right;" href="edit.php?id=<?php echo $row1['id']; ?>">
<button class="edit">
  <svg class="svg-icon" fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><g stroke="#000" stroke-linecap="round" stroke-width="2"><path d="m20 20h-16"></path><path clip-rule="evenodd" d="m14.5858 4.41422c.781-.78105 2.0474-.78105 2.8284 0 .7811.78105.7811 2.04738 0 2.82843l-8.28322 8.28325-3.03046.202.20203-3.0304z" fill-rule="evenodd"></path></g></svg>
  <span class="lable">edit</span>
</button>
</a>

<a style="float: left; margin-left: 10px;" href="?id=<?php echo $row1['id']; ?>">
<button class="btn">
  <p class="paragraph"> delete </p>
  <span class="icon-wrapper">
    <svg class="icon" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
  </span>
</button>
</a><br><br><br>
    <hr>
    <p class="desc">
      <?php echo $row1['reg_date']; ?>
    </p>

  </div>
  </div>

	<?php
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$del=mysqli_query($conn,"delete from post where id='$id'");
		if ($del) {
			    echo '<script>window.location.href="profile.php"</script>';
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

</body>
</html>