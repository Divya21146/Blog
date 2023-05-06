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
 /*for add button*/
.icon-btn {
  width: 50px;
  height: 50px;
  border: 1px solid #cdcdcd;
  background: white;
  border-radius: 25px;
  overflow: hidden;
  position: relative;
  transition: width 0.2s ease-in-out;
  font-weight: 500;
  font-family: inherit;
  margin-left: 30px;
}

.add-btn:hover {
  width: 120px;
}

.add-btn::before,
.add-btn::after {
  transition: width 0.2s ease-in-out, border-radius 0.2s ease-in-out;
  content: "";
  position: absolute;
  height: 4px;
  width: 10px;
  top: calc(50% - 2px);
  background: seagreen;
}

.add-btn::after {
  right: 14px;
  overflow: hidden;
  border-top-right-radius: 2px;
  border-bottom-right-radius: 2px;
}

.add-btn::before {
  left: 14px;
  border-top-left-radius: 2px;
  border-bottom-left-radius: 2px;
}

.icon-btn:focus {
  outline: none;
}

.btn-txt {
  opacity: 0;
  transition: opacity 0.2s;
}

.add-btn:hover::before,
.add-btn:hover::after {
  width: 4px;
  border-radius: 2px;
}

.add-btn:hover .btn-txt {
  opacity: 1;
}

.add-icon::after,
.add-icon::before {
  transition: all 0.2s ease-in-out;
  content: "";
  position: absolute;
  height: 20px;
  width: 2px;
  top: calc(50% - 10px);
  background: seagreen;
  overflow: hidden;
}

.add-icon::before {
  left: 22px;
  border-top-left-radius: 2px;
  border-bottom-left-radius: 2px;
}

.add-icon::after {
  right: 22px;
  border-top-right-radius: 2px;
  border-bottom-right-radius: 2px;
}

.add-btn:hover .add-icon::before {
  left: 15px;
  height: 4px;
  top: calc(50% - 2px);
}

.add-btn:hover .add-icon::after {
  right: 15px;
  height: 4px;
  top: calc(50% - 2px);
}
/*for delete*/
.btn {
  cursor: pointer;
  width: 40px;
  height: 40px;
  border: none;
  position: relative;
  border-radius: 10px;/*
  -webkit-box-shadow: 1px 1px 5px .2px #00000035;
  box-shadow: 1px 1px 5px .2px #00000035;*/
  -webkit-transition: .2s linear;
  transition: .2s linear;
  transition-delay: .2s;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: space-between;
}

.btn:hover {
  width: 100px;
  padding-left: 0;
  transition-delay: .2s;
}

.btn:hover > .paragraph {
  visibility: visible;
  opacity: 1;
  -webkit-transition-delay: .4s;
  transition-delay: .4s;
}

.btn:hover > .icon-wrapper .icon {
  transform: scale(0.8);
}

.bnt:hover > .icon-wrapper .icon path {
  stroke: black;
}

.paragraph {
  color: black;
  visibility: hidden;
  opacity: 0;
  font-size: 14px;
  margin-right: 20px;
  padding-left: 20px;
  -webkit-transition: .2s linear;
  transition: .2s linear;
  font-weight: bold;
  /*text-transform: uppercase;*/
}

.icon-wrapper {
  width: 40px;
  height: 40px;
  position: absolute;
  top: 0;
  right: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

.icon {
  transform: scale(.7);
  transition: .2s linear;
}

.icon path {
  stroke: #000;
  stroke-width: 2px;
  -webkit-transition: .2s linear;
  transition: .2s linear;
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
/*for editing the post*/
.edit {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 8px 12px;
  gap: 2px;
  height: 40px;
  width: 85px;
  border: none;
  border-radius: 10px;
  cursor: pointer;
}

.lable {
  line-height: 22px;
  font-size: 14px;
  color: black;
  font-weight: bold;
}

.edit:hover .svg-icon {
  animation: lr 1s linear infinite;
}

@keyframes lr {
  0% {
    transform: translateX(0);
  }

  25% {
    transform: translateX(-1px);
  }

  75% {
    transform: translateX(1px);
  }

  100% {
    transform: translateX(0);
  }
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