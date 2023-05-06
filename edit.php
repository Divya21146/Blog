<?php
include("dbconnect.php");
session_start();

$mail =  $_SESSION['mail']; 
  if(isset($_POST['btn']))
{
  extract($_POST);
  $id=$_GET['id'];
    $filename=$_FILES['image']['name'];
    $fileloc=$_FILES['image']['tmp_name'];
    $folder="upload/";

    $path=move_uploaded_file($fileloc,$folder.$filename);

if ($filename == '') {
  // file was uploaded successfully, update the post
  $qry1 = mysqli_query($conn, "UPDATE post SET title='$title', description='$description', status='$status', details='$details' WHERE id='$id'");
  if($qry1) {
    header("location:profile.php");
  } else {
    echo '<script>alert(" updated was not completed there is an error please try again ")</script>';
  }
} 
else {
  // file upload failed
  $qry3 = mysqli_query($conn, "UPDATE post SET image='$filename', title='$title', description='$description', status='$status', details='$details' WHERE id='$id'");
  if($qry3) {
    header("location:profile.php");
  } else {
    echo '<script>alert(" updated was not completed there is an error please try again ")</script>';
  }
}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>edit complaint</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
  <body>


    <?php
  $folder="upload/";
   $id=$_GET['id'];
  $show=mysqli_query($conn,"select * from post where id='$id'");
  while($row1=mysqli_fetch_array($show)){
  ?>

    <form method="post" enctype="multipart/form-data">
    <!-- <input type="file" name="image"> -->
    <label>Banner:</label><br>
      <img width="350px" height="350px" src="upload/<?php echo $row1['image']; ?>"><br><br> 
      <?php
      $folder="upload/";
      $pull=mysqli_query($conn,"select * from post where id='$id'");
      $array=mysqli_fetch_array($pull);
      $image=$array['image'];
      ?>   
<input type="file" name="image" accept="image/*" value="<?php echo $image; ?>"><br>
    <label>Post Title:</label>
    <input type="text" name="title" value="<?php echo $row1['title']; ?>" required><br>
    <label>Post Description:</label>
    <input type="text" name="description" value="<?php echo $row1['description']; ?>" required><br>
    <label>Status:</label>
    <input type="text" name="status" value="<?php echo $row1['status']; ?>" required><br>
    <label>Details:</label>
    <input type="text" name="details" value="<?php echo $row1['details']; ?>" required><br>
    <button type="submit" name="btn">update</button>
  </form>

<?php
}
?>
</body>
</html>