<?php
session_start();
$servername ="localhost";
$db_username="root";
$db_password="";
$db_name="travel";
$conn=new mysqli($servername,$db_username,$db_password,$db_name);
$user=$_SESSION["user"];
$sql="SELECT * From traveluser WHERE UserName='$user'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);
$favor="Favor".$_GET['list'];
if ($_GET['favor']=='no'){
    mysqli_query($conn,"UPDATE traveluser SET $favor='yes'WHERE UserName='$user'" );
    header("location:like.php");
}else{
    if ($_GET['favor']=='yes'){
        mysqli_query($conn,"UPDATE traveluser SET $favor='no'WHERE UserName='$user'" );
        header("location:like.php");
    }
}