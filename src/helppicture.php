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
                <li ><div class='back4'><a href='login.html'>登出</a></div> </li>";
                    echo '<script type="text/javascript">document.getElementById("aa").innerText="个人中心"</script>';
                }
                ?>
            </ul>
        </li>
    </ul>
</div>
<div>
    <h1 style="position:absolute;top: 100px;left: 650px ">图片详情</h1>
    <h2 style="position: absolute;top: 150px;left: 695px"><?php echo $_GET["title"]?></h2>
    <p style="position: absolute;left: 180px;top: 250px"><img src="<?php  echo $_GET['src']?>" style="float: left;width: 460px;height: 390px" alt="图片"></p>
    <p style="width: 600px;overflow:hidden;text-overflow:ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp:10;position: absolute;left: 700px;top: 250px">&emsp;主题：<?php echo $_GET['style']?><br>&emsp;地理位置：<?php if ($_GET['country']=='日本'||$_GET['country']=='中国'){echo '亚洲';}else{if ($_GET['country']=='意大利'){echo '欧洲';}else{echo '北美洲';}}?><br>&emsp;国家：<?php  echo $_GET['country'];?><br>&emsp;城市：<?php echo $_GET["city"]?><br>&emsp;&emsp;&emsp;<?php echo $_GET["des"]?></p>
</div>
<footer style="position: absolute;left: 700px;top: 800px; color: darkslategray " >
    <p>联系电话：15002116228<br>备案号：19302010071</p>
</footer>
</body>
</html>
