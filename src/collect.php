<?php
session_start();
$servername ="localhost";
$db_username="root";
$db_password="";
$db_name="travel";
$conn=new mysqli($servername,$db_username,$db_password,$db_name);
$user=$_SESSION["user"];
$sql="SELECT total From traveluser WHERE UserName='$user'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);
$tot=$row['total']+1;
$Image="ImageSrc".$tot;
$Total="Favor".$tot;
$sql2="SELECT *  From traveluser WHERE UserName='$user'";
$query2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($query2);
$src=$_SESSION["src"];
if ($row["total"]!=20){
    if ($row["total"]==0){
        mysqli_query($conn,"UPDATE traveluser SET ImageSrc1='$src'  WHERE UserName='$user'" );
        mysqli_query($conn,"UPDATE traveluser SET total='1' WHERE UserName='$user'" );
        mysqli_query($conn,"UPDATE traveluser SET Favor1='yes'WHERE UserName='$user'" );
        header("location:like.php");
    }else{
        for ($i=0;$i<$row['total'];$i++){
            $j=$i+1;
            $I="ImageSrc".$j;
            $T="Favor".$j;
            $sql3="SELECT * From traveluser WHERE UserName='$user'";
            $query3=mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_assoc($query3);
            if ($row3[$I]==$src){
                $k=$j;
                $t=$T;
                break;
            }else{
                $k=0;
            }
        }
        if ($k==0){
            mysqli_query($conn,"UPDATE traveluser SET total='$tot'WHERE UserName='$user'" );
            mysqli_query($conn,"UPDATE traveluser SET $Total='yes'WHERE UserName='$user'" );
            mysqli_query($conn,"UPDATE traveluser SET $Image='$src'WHERE UserName='$user'" );
            header('location:like.php');
        }else{
            $sql4="SELECT *  From traveluser WHERE (UserName='$user')";
            $query4=mysqli_query($conn,$sql4);
            $row4=mysqli_fetch_assoc($query4);
            if ($row4[$t]=='no'){
                mysqli_query($conn,"UPDATE traveluser SET $t='yes'WHERE UserName='$user' " );
                header('location:like.php');
            }else{
                mysqli_query($conn,"UPDATE traveluser SET $t='no'WHERE UserName='$user'" );
                header('location:like.php');
            }
        }
    }
}else{
    for ($i=0;$i<20;$i++){
        $j=$i+1;
        $I="ImageSrc".$j;
        $T="Favor".$j;
        $sql3="SELECT * From traveluser WHERE (UserName='$user')";
        $query3=mysqli_query($conn,$sql3);
        $row3=mysqli_fetch_assoc($query3);
        if ($row3[$I]==$src){
            $k=$j;
            $t=$T;
            break;
        }else{
            $k=0;
        }
    }
    if ($k==0){
        exit('收藏失败！张数已经到达最多！点击此处 <a href="detaiL.php">返回</a> ');
    }else{
        $sql4="SELECT * From traveluser WHERE (UserName='$user')";
        $query4=mysqli_query($conn,$sql4);
        $row4=mysqli_fetch_assoc($query4);

        if ($row4[$t]=='no'){
            mysqli_query($conn,"UPDATE traveluser SET $t='yes'WHERE UserName='$user' " );
            header('location:like.php');
        }else{
            mysqli_query($conn,"UPDATE traveluser SET $t='no'WHERE UserName='$user'" );
            header('location:like.php');
        }
    }
}
