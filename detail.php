<?php
include("dbconnect.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Complaint details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  </style>
  </head>
  <body>
	<div>
  <h2>POST DETAILS</h2>
  <?php  
  $id=$_GET['id'];
  $folder="upload/";
  
  $qry=mysqli_query($conn,"select * from post where id='$id'");
  
  $row=mysqli_fetch_array($qry);
  ?>
  <p><b>Banner:</b></p>
     <img width="350px" height="350px" src="upload/<?php echo $row['image']; ?>"><br><br>
    <p><b>Post Title: </b><?php echo $row['title']; ?></p><br>
    <p><b>Post Description: </b><?php echo $row['description']; ?></p><br>
    <p><b>Status: </b><?php echo $row['status']; ?></p><br>
    <p><b>Post Details: </b><?php echo $row['details']; ?></p><br>

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