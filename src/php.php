<?php
session_start();
header("content-type:text/html;charset=utf8");
$_SESSION['fresh']='';
$_SESSION['collect']='';
$_SESSION['freshD']=1;
$servername ="localhost";
$db_username="root";
$db_password="";
$db_name="travel";
$conn=new mysqli($servername,$db_username,$db_password,$db_name);
$name=$_POST['Name'];
$pass=$_POST['Password'];
$sql="SELECT UserName,Pass From traveluser WHERE (UserName='$name')AND (Pass='$pass')";
$query=mysqli_query($conn,$sql);
$result = $conn->query($sql);
if ($result->num_rows > 0){
    $_SESSION['user'] = $name;
    header('location:../Index.php');
}else{
    exit('登录失败！点击此处 <a href="login.html">返回</a> 重试');
}





