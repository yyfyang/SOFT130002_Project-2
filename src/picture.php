<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的照片</title>
    <style type="text/css">
        body,li,ul,a{
            padding: 0;
            margin: 0;
        }
        body{
            overflow-y: scroll;
        }
        .menu{
            font-size: 0;
            height: 50px;
            padding-left: 5%;
            background-color: #00a2ca;
            position: absolute;
            width: 100%;
            z-index: 77;
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
            background-color: #0095bb;
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
        .move {
            display: none;
        }
        .jump li{
            float: left;
            width: 6%;
            height: 100px;
            overflow: hidden;
            position: relative;
            top: 10px;
            margin-right: 10px;

        }
        .jump a{
            text-decoration: none;
        }
        .kk{
            color: #0095bb;
            background-color: bisque;
        }
        .k{
            color: #3030a9;
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
            background-color: cornflowerblue;
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
        .picture li{
            float: left;
            width: 70%;
            height: 340px;
            overflow: hidden;
            position: relative;
            top: 120px;
            left: 170px;
            margin-right: 50px;

        }
        .picture li img{
            position: relative;
            float: left;
            width: 30%;
            height: 270px;
        }
    </style>
</head>
<body>
<div class="menu">
    <ul class="menubar">
        <li class="" ><a href="../Index.php">首页</a></li>
        <li class="" ><a href="browser.php">浏览页</a></li>
        <li class="" ><a href="search.php">搜索页</a></li>
        <li class="list" ><a id="aa" href=" <?php if (empty($_SESSION['user'])){echo 'login.html';}?>">登录</a>
            <ul class="move" id="out">
                <?php
                session_start();
                $_SESSION['c2']=0;
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
    <ul class="picture">
        <?php
        $servername ="localhost";
        $db_username="root";
        $db_password="";
        $db_name="travel";
        $conn=new mysqli($servername,$db_username,$db_password,$db_name);
        $user=$_SESSION["user"];
        $sql="SELECT * From upload WHERE username='$user'";
        $query=mysqli_query($conn,$sql);
        $value = $conn->query($sql)->num_rows;
        if (!isset($_GET['page'])){
            $_GET['page']=1;
        }
        if ($value==0){
            echo '<p style="position: absolute;top: 300px;left: 620px">你还没有上传，快去上传吧！</p>';
        }else{
            if ($_GET['page']==1){
                $l=1;
                if ($value<=4){
                    $m=$value;
                }else {
                    $m=4;
                }
            }else{
                if ($_GET['page']==2){
                    $l=5;
                    if ($value<=8){
                        if ($row['total']>4){
                            $m=$value-4;
                        }else{
                            $m=0;
                            echo '<p style="position: absolute;top: 300px;left: 620px">此页面还未有图片</p>';
                        }
                    }else {
                        $m=4;
                    }
                }else{
                    if ($_GET['page']==3){
                        $l=9;
                        if ($value<=12){
                            if ($value>8){
                                $m=$value-8;
                            }else{
                                $m=0;
                                echo '<p style="position: absolute;top: 300px;left: 620px">此页面还未有图片</p>';
                            }
                        }else {
                            $m=4;
                        }
                    }else{
                        if ($_GET['page']==4){
                            $l=13;
                            if ($value<=16){
                                if ($value>12){
                                    $m=$value-12;
                                }else{
                                    $m=0;
                                    echo '<p style="position: absolute;top: 300px;left: 620px">此页面还未有图片</p>';
                                }
                            }else {
                                $m=4;
                            }
                        }else{
                            if ($_GET['page']==5){
                                $l=17;
                                if ($value<=20){
                                    if ($value>16){
                                        $m=$value-16;
                                    }else{
                                        $m=0;
                                        echo '<p style="position: absolute;top: 300px;left: 620px">此页面还未有图片</p>';
                                    }
                                }else {
                                    $m=4;
                                }
                            }
                        }
                    }
                }
            }
            for ($i=0;$i<$m;$i++){
                $sql2="SELECT * FROM upload WHERE username='$user' limit $i,1";
                $query2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($query2);
                $title=$row2['title'];
                $d=$row2['description'];
                $h=$row2['ImageSrc'];
                $coun=$row2['country'];
                $style=$row2['picturetype'];
                $city=$row2['city'];
                $sc='../upload/'.$h;
                echo '<li><a href="helppicture.php?title='.$title.'&des='.$d.'&country='.$coun.'&city='.$city.'&src='.$sc.'&style='.$style.'"><img src="'.$sc.'" alt="图片" ></a>
    <p style="overflow:hidden;text-overflow:ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp:12">图片标题：<br>'.$title.'<br><br>图片描述：<br>'.$d.'</p>
    <a href="delete.php?img='.$h.'&user='.$user.'" style="position: absolute;top: 270px ;display:block;width:90px;height:20px;text-align:center;text-decoration: none;border: 1px solid;background-color: #e7daff">删除</a>
    <a href="alter.php?city='.$city.'&h='.$h.'&src='.$sc.'&title='.$title.'&des='.$d.'&country='.$coun.'&style='.$style.'" style="position: absolute;left: 125px ; top:270px;display:block;width:90px;height:20px;text-align:center;text-decoration: none;border: 1px solid;background-color: #e7daff">修改</a></li>';
            }
        }
        ?>
    </ul>
    <div style="position: absolute;top: 1500px;left: 660px">
        <ul class="jump">
            <?php
            if (!isset($_GET['page'])){
                $_GET['page']=1;
            }
             if ($value<=4){
                echo '<li><a href="?page=1" class="k"><<</a></li>
           <li><a href="?page=1" class="kk">1</a></li>
           <li><a href="?page=1" class="k">>></a></li>';
            }else{
                if ($value<=8&&$value>4){
                    if ($_GET['page']==1){
                        echo '<li><a href="?page=1" class="k"><<</a></li>
               <li><a href="?page=1" class="kk">1</a></li>
               <li><a href="?page=2" class="k">2</a></li>
               <li><a href="?page=2" class="k">>></a></li>';
                    }else{
                        echo '<li><a href="?page=1" class="k"><<</a></li>
               <li><a href="?page=1" class="k">1</a></li>
               <li><a href="?page=2" class="kk">2</a></li>
               <li><a href="?page=2" class="k">>></a></li>';
                    }
                }else{
                    if ($value<=12&&$value>8){
                        if ($_GET['page']==1){
                            echo '<li><a href="?page=1" class="k"><<</a></li>
           <li><a href="?page=1" class="kk">1</a></li>
           <li><a href="?page=2" class="k">2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
           <li><a href="?page=2" class="k">>></a></li>';
                        }else{
                            if ($_GET['page']==2){
                                echo '<li><a href="?page=1" class="k"><<</a></li>
           <li><a href="?page=1" class="k">1</a></li>
           <li><a href="?page=2" class="kk">2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
           <li><a href="?page=3" class="k">>></a></li>';
                            }else{
                                if ($_GET['page']==3){
                                    echo '<li><a href="?page=2" class="k"><<</a></li>
           <li><a href="?page=1" class="k">1</a></li>
           <li><a href="?page=2" class="k" >2</a></li>
           <li><a href="?page=3" class="kk">3</a></li>
           <li><a href="?page=3" class="k">>></a></li>';
                                }
                            }
                        }
                    }else{
                        if ($value<=16&&$value>12){
                            if ($_GET['page']==1){
                                echo '<li><a href="?page=1" class="k"><<</a></li>
           <li><a href="?page=1" class="kk">1</a></li>
           <li><a href="?page=2" class="k">2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
           <li><a href="?page=4" class="k">4</a></li>
           <li><a href="?page=2" class="k">>></a></li>';
                            }else{
                                if ($_GET['page']==2){
                                    echo '<li><a href="?page=1" class="k"><<</a></li>
           <li><a href="?page=1" class="k">1</a></li>
           <li><a href="?page=2" class="kk">2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
           <li><a href="?page=4" class="k">4</a></li>
           <li><a href="?page=3" class="k">>></a></li>';
                                }else{
                                    if ($_GET['page']==3){
                                        echo '<li><a href="?page=2" class="k"><<</a></li>
           <li><a href="?page=1" class="k">1</a></li>
           <li><a href="?page=2" class="k" >2</a></li>
           <li><a href="?page=3" class="kk">3</a></li>
           <li><a href="?page=4" class="k">4</a></li>
           <li><a href="?page=4" class="k">>></a></li>';
                                    }else{
                                        if ($_GET['page']==4){
                                            echo '<li><a href="?page=3" class="k"><<</a></li>
           <li><a href="?page=1" class="k">1</a></li>
           <li><a href="?page=2" class="k">2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
           <li><a href="?page=4" class="kk">4</a></li>
           <li><a href="?page=4" class="k">>></a></li>';
                                        }
                                    }
                                }
                            }
                        }else{
                            if ($_GET['page']==1){
                                echo '<li><a href="?page=1" class="k"><<</a></li>
           <li><a href="?page=1" class="kk">1</a></li>
           <li><a href="?page=2" class="k">2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
           <li><a href="?page=4" class="k">4</a></li>
           <li><a href="?page=5" class="k">5</a></li>
           <li><a href="?page=2" class="k">>></a></li>';
                            }else{
                                if ($_GET['page']==2){
                                    echo '<li><a href="?page=1" class="k"><<</a></li>
           <li><a href="?page=1" class="k">1</a></li>
           <li><a href="?page=2" class="kk">2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
           <li><a href="?page=4" class="k">4</a></li>
           <li><a href="?page=5" class="k">5</a></li>
           <li><a href="?page=3" class="k">>></a></li>';
                                }else{
                                    if ($_GET['page']==3){
                                        echo '<li><a href="?page=2" class="k"><<</a></li>
           <li><a href="?page=1" class="k">1</a></li>
           <li><a href="?page=2" class="k" >2</a></li>
           <li><a href="?page=3" class="kk">3</a></li>
           <li><a href="?page=4" class="k">4</a></li>
           <li><a href="?page=5" class="k">5</a></li>
           <li><a href="?page=4" class="k">>></a></li>';
                                    }else{
                                        if ($_GET['page']==4){
                                            echo '<li><a href="?page=3" class="k"><<</a></li>
           <li><a href="?page=1" class="k">1</a></li>
           <li><a href="?page=2" class="k">2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
           <li><a href="?page=4" class="kk">4</a></li>
           <li><a href="?page=5" class="k">5</a></li>
           <li><a href="?page=5" class="k">>></a></li>';
                                        }else{
                                            if ($_GET['page']==5){
                                                echo '<li><a href="?page=4" class="k"><<</a></li>
           <li><a href="?page=1" class="k">1</a></li>
           <li><a href="?page=2" class="k">2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
           <li><a href="?page=4" class="k">4</a></li>
           <li><a href="?page=5" class="kk">5</a></li>
           <li><a href="?page=5" class="k">>></a></li>';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            ?>

        </ul>
    </div>
</div>
<footer  style="position: absolute;left: 650px;top:1440px; color: darkslategray "  >
    <p>备案号：19302010071</p>
</footer>
</body>
</html>
