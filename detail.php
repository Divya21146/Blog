<?php
include("dbconnect.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    html {
            overflow-x: hidden;
            scroll-behavior: smooth;
        }
    * {
  box-sizing: border-box;
}
h2{
  text-transform: uppercase;
}
body{
  background-color: #E6F2F2;
}
.header {
  text-align: center;
}
.menu {
  float: left;
  width: 20%;
}
.menuitem {
  padding: 8px;
  margin-top: 7px;
  border-bottom: 1px solid #d3d3d3;
}
.main {
  padding: 0 20px;
  overflow: hidden;
}

  </style>
  </head>
  <body>
    <div class="header" style="background-color:#000;padding:15px; color: #fff">
  <?php  
  $id=$_GET['id'];
  $folder="upload/";
  
  $qry=mysqli_query($conn,"select * from post where id='$id'");
  
  $row=mysqli_fetch_array($qry);

    $mail1=$row['mail'];
    $fetch=mysqli_query($conn,"select * from registration where mail='$mail1'");
    $use=mysqli_fetch_array($fetch);
      ?>
      <h2 style="padding-bottom: 20px;"><?php echo $row['title']; ?> </h2>
    <p><?php echo $row['reg_date']; ?> | Created by <i> <?php echo $use['name']; ?></i> | <?php echo $row['title']; ?></p>
  </div>
  <div style="overflow:auto">
  <div class="menu">
    <div class="menuitem"><a style="text-decoration: none" href="#section1">Banner</a></div>
    <div class="menuitem"><a style="text-decoration: none" href="#section2">Details</a></div>
    <div class="menuitem"><a style="text-decoration: none" href="home.php">back</a></div>
  </div>

<div class="main">
  <div class="main1" id="section1">
    <h2>Banner</h2><br>
     <img style="width:500px; height: 500px;" src="upload/<?php echo $row['image']; ?>"><br><br>
   </div>
   <div class="main2" id="section2">
     <h2>Details</h2>
    <p><?php echo $row['details']; ?></p>
  </div>
  </div>

</form>
	</div>
	
<?php
        if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['mail']);
       echo '<script>window.location.href="login.php"</script>';
}
if ($_SESSION['mail'] == "") {
  echo '<script>window.location.href="login.php"</script>';
}
?>
     
</body>
</html>