<?php
header("content-type:text/html;charset=utf8");
$servername ="localhost";
$db_username="root";
$db_password="";
$db_name="travel";
$conn=new mysqli($servername,$db_username,$db_password,$db_name);
$name=$_POST['user'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$sql="SELECT UserName From traveluser WHERE (UserName='$name')";
$query=mysqli_query($conn,$sql);
$result = $conn->query($sql);
if ($result->num_rows > 0){
    echo '错误：用户名 ',$name,' 已存在。<a href="register.html">返回</a>';
}else{
    $sql1="INSERT INTO traveluser(Email,UserName,Pass) VALUES ('$email','$name','$pass')";
    if(mysqli_query($conn,$sql1)){
            exit('用户注册成功！点击此处 <a href="login.html">登录</a>');
 } else {
           echo '抱歉！添加数据失败：',mysqli_error(),'<br />';
    echo '点击此处 <a href="register.html">返回</a> 重试';
 }
}
