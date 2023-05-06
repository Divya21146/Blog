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
  width: 250px;
  height: 300px;
  background-color: #fff;
  display: flex;
  overflow: hidden;
}
.image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
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
/*for more details*/
.detail {
 display: inline-block;
 border-radius: 7px;
 border: none;
 background: #1875FF;
 color: white;
 font-family: inherit;
 text-align: center;
 font-size: 13px;
 width: 10em;
 padding: .5em;
 margin-left: 18%;
 transition: all 0.4s;
 cursor: pointer;
}

.detail span {
 cursor: pointer;
 display: inline-block;
 position: relative;
 transition: 0.4s;
}

.detail span:after {
 content: 'for more';
 position: absolute;
 opacity: 0;
 top: 0;
 right: -20px;
 transition: 0.7s;
}

.detail:hover span {
 padding-right: 3.75em;
}

.detail:hover span:after {
 opacity: 4;
 right: 0;
}
		</style>
</head>
<body>
	<nav>
    <a style="font-size: 23px;" onclick="return false;">Welcome <?php echo $user_row['name']; ?> !</a>
    <a style="padding-left: 30px; padding-right: 30px;" href="home.php">Home</a>
    <a style="padding-left: 30px; padding-right: 30px;" href="profile.php"></i>Profile</a>
    <form style="float: right; margin: 5px;" method="get">
    <a><button type="submit" name="logout">logout</button></a>
    
  </form>
  </nav><br>


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

    <a href="detail.php?id=<?php echo $row1['id']?>">
      <button class="detail" style="vertical-align:middle"><span>Click</span></button>
    </a><br>
    <hr>
    
    <?php
    $mail1=$row1['mail'];
    $fetch=mysqli_query($conn,"select * from registration where mail='$mail1'");
    while ($use=mysqli_fetch_array($fetch)) {
    ?>
    <p class="desc">
      <?php echo $row1['reg_date']; ?> | Created by <i> <?php echo $use['name']; ?></i>
    </p>
    <?php
  }
    ?>
  </div>
</div>
<?php 
}
?>

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