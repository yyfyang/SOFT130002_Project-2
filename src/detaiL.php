<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图片详情</title>
</head>
<style type="text/css">
    body,li,ul,a{
        padding: 0;
        margin: 0;
    }
    body{
        overflow-y: scroll;
        overflow-x: hidden;
    }
    .menu{
        font-size: 0;
        height: 50px;
        padding-left: 5%;
        background-color: #00a2ca;
        position: absolute;
        z-index: 77;
        width: 100%;
    }
    .menubar{
        margin: 0 auto;
        list-style-type: none;
        width: 100%;
        float: left;
    }
    .menubar li{
        padding:0 5px;
        display:inline-block;
        cursor: pointer;
        line-height: 50px;
        float: left;
    }
    .menubar li:hover{
        background-color:dodgerblue;
    }
    .menubar li.menu-value
    {
        background-color: #0095bb;
    }
    .menubar a	{
        display: block;
        height: 50px;
        font-family: "微软雅黑","Microsoft Yahei","Hiragino Sans GB",tahoma,arial,"宋体",serif ;
        font-size: 15px;
        text-align: center;
        text-decoration: none;
        color: #fff;
    }
    .list{
        position: relative;
    }

    .menubar li:hover .move li:hover{
        background-color: lightskyblue;
        width: 80px;
    }
    .move{
        width: 80px;
    }
    .list:hover .move{
        display: block;
    }
    .move{
        display: none;
    }
    .back1{
        background-image:url("../img/上传.jpg") ;
        background-repeat: no-repeat;
        background-size:18px 18px;
    }
    .back2{
        background-image: url("../img/照片.jpg") ;
        background-repeat: no-repeat;
        background-size:18px 18px;
    }
    .back3{
        background-image: url("../img/收藏.jpg") ;
        background-repeat: no-repeat;
        background-size:18px 18px;
    }
    .back4{
        background-image: url("../img/登入.jpg") ;
        background-repeat: no-repeat;
        background-size:18px 18px;
    }

</style>
<body>
<div class="menu">
    <ul class="menubar">
        <li class="menu-value" ><a href="../Index.php" >首页</a></li>
        <li class="" ><a href="browser.php">浏览页</a></li>
        <li class="" ><a href="search.php">搜索页</a></li>
        <li class="list" ><a id="aa" href=" <?php if (empty($_SESSION['user'])){echo 'login.html';}?>">登录</a>
            <ul class="move" id="out">
                <?php
               session_start();
               if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                   echo "<li><div class='back1' ><a href='upload.php'>上传</a></div></li>
                <li><div class='back2'><a href='picture.php'>我的照片</a></div></li>
                <li><div class='back3'><a href='like.php'>我的收藏</a></div></li>
                <li ><div class='back4'><a href='loginout.php'>登出</a></div> </li>";
                echo '<script type="text/javascript">document.getElementById("aa").innerText="个人中心"</script>';
                }
                ?>
            </ul>
        </li>
    </ul>
</div>
<div>
    <?php
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $_SESSION['src']=$_GET['imageSrc'];
        $servername ="localhost";
        $db_username="root";
        $db_password="";
        $db_name="travel";
        $conn=new mysqli($servername,$db_username,$db_password,$db_name);
        $user=$_SESSION["user"];
        $sql="SELECT total From traveluser WHERE UserName='$user'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($query);
        if ($row['total']==0){
            $_SESSION['collect']='';
        }else{
            for ($i=0;$i<$row['total'];$i++){
                $j=$i+1;
                $I="ImageSrc".$j;
                $T="Favor".$j;
                $sql3="SELECT * From traveluser WHERE UserName='$user'";
                $query3=mysqli_query($conn,$sql3);
                $row3=mysqli_fetch_assoc($query3);
                if ($row3[$I]==$_GET['imageSrc']){
                    $k=$j;
                    $t=$T;
                    break;
                }else{
                    $k=0;
                }
            }
            if ($k==0){
                $_SESSION['collect']='';
            }else{
                $sql4="SELECT * From traveluser WHERE UserName='$user'";
                $query4=mysqli_query($conn,$sql4);
                $row4=mysqli_fetch_assoc($query4);
                if ($row4[$t]=='no'){
                    $_SESSION['collect']='';
                }else{
                    $_SESSION['collect']=1;
                }
            }
        }
    }

    ?>
    <form method="post" action="collect.php">
    <h1 style="position:absolute;top: 100px;left: 650px ">图片详情</h1>
    <h2 style="position: absolute;top: 150px;left: 625px"><?php if (empty($_GET["name"])){echo 'none';}else{echo $_GET["name"];}?></h2>
    <h3 style="position: absolute;top: 200px;left: 750px">——<?php if (empty($_GET["author"])){echo 'none';}else{echo $_GET["author"];}?></h3>
    <p style="position: absolute;left: 180px;top: 250px"><img src="../<?php    echo $_GET['src']?>" style="float: left;width: 460px;height: 390px" alt="图片"></p>
    <p style="width: 600px;overflow:hidden;text-overflow:ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp:10;position: absolute;left: 700px;top: 250px">&emsp;主题：scenery<br>&emsp;地理位置：<?php if (empty($_GET["cn"])){echo 'none';}else{echo $_GET["cn"];}?><br>&emsp;国家：<?php if (empty($_GET["countryname"])){echo 'none';}else{echo $_GET["countryname"];}?><br>&emsp;城市：<?php if (empty($_GET["cc1"])){echo 'none';}else{echo $_GET["cc1"];}?><br>&emsp;&emsp;&emsp;<?php if ($_GET['src']=='travel-images/small/8730408907.jpg'){echo "Official name is \"Church of the Blessed Virgin in Buda\". Central part of church built around 1400, with additions by Turks, and then Baroque-era modifications, finally redone in late 19th Century in neo-Gothic revival. Very much a masterpiece of European eclecticism, though some say it is an over-decorated piece of stage scenery.";}else{echo $_GET["des"];}?></p>
    <p  style="position: absolute ;left: 800px;top: 500px">已收藏&emsp;1,234&emsp;<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])){if ($_SESSION['collect']==''){echo '<input type="submit" id="like" value="未收藏" style="width: 300px;color: red"  >';}else{if ($_SESSION['collect']==1){echo '<input type="submit" id="like" value="已收藏" style="width: 300px;color: red"  >';}};}?> </p>
    </form>
</div>
<footer style="position: absolute;left: 700px;top: 800px; color: darkslategray " >
    <p>联系电话：15002116228<br>备案号：19302010071</p>
</footer>
</body>
</html>
