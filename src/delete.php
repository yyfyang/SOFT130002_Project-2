<?php
session_start();
$servername ="localhost";
$db_username="root";
$db_password="";
$db_name="travel";
$conn=new mysqli($servername,$db_username,$db_password,$db_name);
$user=$_GET['user'];
$img=$_GET['img'];
mysqli_query($conn,"DELETE FROM upload WHERE (username='$user')AND(ImageSrc='$img') ");
header("location:picture.php");
