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
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

    </style>
</head>

<body>
    <nav class="nav">
        <a style="font-size: 23px;" onclick="return false;">Welcome <?php echo $user_row['name']; ?> !</a>
        <a style="padding-left: 40px; padding-right: 40px;" href="home.php">Home</a>
        <a style="padding-left: 40px; padding-right: 40px;" href="profile.php"></i>Profile</a>
        <form style="float: right;" method="get">
            <a><button type="submit" name="logout" class="my-button">logout</button></a>

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
            </a><br>
            <hr>

            <?php
    $mail1=$row1['mail'];
    $fetch=mysqli_query($conn,"select * from registration where mail='$mail1'");
    while ($use=mysqli_fetch_array($fetch)) {
    ?>
            <p class="desc2">
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