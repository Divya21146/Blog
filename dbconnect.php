<?php
$servername="localhost";
$username="root";
$password="";
$db="task";
$conn=mysqli_connect($servername,$username,$password,$db);
if (!$conn) {
	die("cannot reach server".mysqli_connect_error());
}
?>