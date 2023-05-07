<?php
include("dbconnect.php");
session_start();

$mail =  $_SESSION['mail']; 
$user = mysqli_query($conn,"select * from registration where mail = '$mail'");
$user_row = mysqli_fetch_array($user);
  if(isset($_POST['btn']))
{
  extract($_POST);
  $id=$_GET['id'];
    $filename=$_FILES['image']['name'];
    $fileloc=$_FILES['image']['tmp_name'];
    $folder="upload/";
    $details = htmlspecialchars($_POST['details'], ENT_QUOTES, 'UTF-8');
  define('search', '(,),@,$,#,%,&,*,!,",\' ');
  define('replace', ' ');
  $details = str_replace(search, replace, $details);

    $path=move_uploaded_file($fileloc,$folder.$filename);

if ($filename == '') {
  // file was uploaded successfully, update the post
  $qry1 = mysqli_query($conn, "UPDATE post SET title='$title', description='$description', status='$status', details='$details' WHERE id='$id'");
  if($qry1) {
    echo '<script>window.location.href="profile.php"</script>';
  } else {
    echo '<script>alert(" updated was not completed there is an error please try again ")</script>';
  }
} 
else {
  // file upload failed
  $qry3 = mysqli_query($conn, "UPDATE post SET image='$filename', title='$title', description='$description', status='$status', details='$details' WHERE id='$id'");
  if($qry3) {
    echo '<script>window.location.href="profile.php"</script>';
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

  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="form.css">

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

    <?php
  $folder="upload/";
   $id=$_GET['id'];
  $show=mysqli_query($conn,"select * from post where id='$id'");
  while($row1=mysqli_fetch_array($show)){
  ?>
  <div class="bg">
  <form class="form" method="post" enctype="multipart/form-data" autocomplete="off">
    <!-- <input type="file" name="image"> -->
    <label><b>Banner:</b></label><br><br>
      <img width="350px" height="350px" src="upload/<?php echo $row1['image']; ?>"><br><br> 
      <?php
      $folder="upload/";
      $pull=mysqli_query($conn,"select * from post where id='$id'");
      $array=mysqli_fetch_array($pull);
      $image=$array['image'];
      ?>   
<input type="file" name="image" accept="image/*" value="<?php echo $image; ?>"><br>
    <label><b>Post Title:</b></label>
    <input type="text" name="title" value="<?php echo $row1['title']; ?>" required><br>
    <label><b>Post Description:</b></label>
    <input type="text" name="description" value="<?php echo $row1['description']; ?>" required><br>
    <label><b>Status:</b></label>
    <input type="text" name="status" value="<?php echo $row1['status']; ?>" required><br>
    <label for="details"><b>Details:</b></label>
    <textarea style="background-color: #E6F2F2;" class="textarea" name="details" id="details" rows="7" cols="61" required><?php echo $row1['details']; ?></textarea><br><br>
    <button type="submit" name="btn" class="upload" onclick="return msg()">update</button>
  </form>

<?php
}
?>


<script type="text/javascript">function msg(){alert("updated successfully");
return true;}</script>

</body>
</html>