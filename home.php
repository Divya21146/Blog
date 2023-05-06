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
	<style>
		.card {
  width: 250px;
  border-radius: 0.5rem;
  background-color: #fff;
  display: inline-block;
   margin: 20px;
}
a{
  text-decoration: none;
}

.content {
  padding: 1.1rem;
}

.image {
  object-fit: cover;
  width: 100%;
  height: 150px;
  background-color: rgb(239, 205, 255);
  display: flex;
}

.title {
  color: #111827;
  font-size: 1.125rem;
  line-height: 1.75rem;
  font-weight: 600;
}

.desc {
  margin-top: 0.5rem;
  color: #6B7280;
  font-size: 0.875rem;
  line-height: 1.25rem;
}

.action {
  display: inline-flex;
  margin-top: 1rem;
  color: #ffffff;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 500;
  align-items: center;
  gap: 0.25rem;
  background-color: #2563EB;
  padding: 4px 8px;
  border-radius: 4px;
}

.action span {
  transition: .3s ease;
}

.action:hover span {
  transform: translateX(4px);
}
		</style>
</head>
<body>
	<header>
		<h1>Welcome <?php echo $user_row['name']; ?> !</h1>
		<a href="home.php">Home</a>
		<a href="profile.php">Profile</a>
		<form method="get">
		<a><button type="submit" name="logout">logout</button></a>
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
	</header>


 <?php
$folder="upload/";
$qry=mysqli_query($conn,"select * from post ORDER BY id DESC");
while($row1=mysqli_fetch_array($qry)){
?>

<div class="card" style="margin-left: 40px; margin-right: 30px;">
 <div class="image"><img src="<?php echo "$folder".$row1['image']; ?>">

</div>
  <div class="content">
      <span class="title">
        <?php echo $row1['title']; ?>
      </span>

    <p class="desc">
      <?php echo $row1['description']; ?>
    </p>
    <p class="desc">
      <?php echo $row1['status']; ?>
    </p>
    <p class="desc">
      <?php echo $row1['reg_date']; ?>
    </p>

    <a href="detail.php?id=<?php echo $row1['id']?>" class="action">
      Detailed view
      <span aria-hidden="true">
        →
      </span>
    </a>
    <?php
    $mail1=$row1['mail'];
    $fetch=mysqli_query($conn,"select * from registration where mail='$mail1'");
    while ($use=mysqli_fetch_array($fetch)) {
    ?>
    <p class="desc">
      Created by <i> <?php echo $use['name']; ?></i>
    </p>
    <?php
  }
    ?>
  </div>
</div>
<?php 
}
?>

</body>
</html>