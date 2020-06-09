<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜索</title>
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
        .picture li{
            float: left;
            width: 70%;
            height: 330px;
            overflow: hidden;
            position: relative;
            top: 190px;
            left: 170px;
            margin-right: 50px;

        }
        .picture li img{
            position: relative;
            float: left;
            width: 30%;
            height: 270px;
        }
        .kk{
            color: #0095bb;
            background-color: bisque;
        }
        .k{
            color: #3030a9;
        }
    </style>
</head>
<body>
<div class="menu">
    <ul class="menubar">
        <li class="" ><a href="../Index.php">首页</a></li>
        <li class="" ><a href="browser.php">浏览页</a></li>
        <li class="menu-value" ><a href="search.php">搜索页</a></li>
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
    <form action="helpsearch.php" method="post" style="position: relative;top: 130px;left: 380px">
    <label >
        <input type="radio" checked value="Title" name="search">标题筛选
    </label>
    <label >
        <input name="search"  value="Description" type="radio">描述筛选
    </label>
        <label>
            <input type="text" name="thing" required>
        </label>
        <input type="submit" value="搜索">
    </form>
    <ul class="picture">
        <?php
        $servername ="localhost";
        $db_username="root";
        $db_password="";
        $db_name="travel";
        $conn=new mysqli($servername,$db_username,$db_password,$db_name);
        if (!isset($_GET['page'])){
            $_GET['page']=1;
        }
        if (!isset($_SESSION['c2'])||$_SESSION['c2']==0) {
            echo '<p style="position: absolute;top: 300px;left: 620px">请搜索想要的图片</p>';
        }else{
            $search=$_SESSION['search'];
            $thing=$_SESSION['thing'];
            $sql2 = "SELECT * FROM travelimage WHERE ".$search." LIKE '%".$thing."%'";
            $value = $conn->query($sql2)->num_rows;
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
                        if ($value>4){
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
                $j=$i+$l-1;
                $sql0 = "SELECT * FROM travelimage WHERE ".$search." LIKE '%".$thing."%' limit  $j,1";
                $query0=mysqli_query($conn,$sql0);
                $row0=mysqli_fetch_assoc($query0);
                $I=$row0['PATH'];
                $src='travel-images/small/'.$I;
                $sc='../travel-images/small/'.$I;
                $sql2="SELECT * From travelimage WHERE PATH='$I'";
                $query2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($query2);
                $t=$row2['Title'];
                $d=$row2["Description"];
                $n=$row2["UID"]-1;
                $country=$row2["CountryCodeISO"];
                $cc=$row2["CityCode"];
                $sql3="SELECT CountryName,Continent From geocountries WHERE (ISO='$country')";
                $sql5="SELECT UserName FROM traveluser order by UID limit $n,1";
                $query5=mysqli_query($conn,$sql5);
                $row5=mysqli_fetch_assoc($query5);
                $query3=mysqli_query($conn,$sql3);
                $row3=mysqli_fetch_assoc($query3);
                $continent=$row3["Continent"];
                $sql4="SELECT ContinentName From geocontinents WHERE (ContinentCode='$continent')";
                $query4=mysqli_query($conn,$sql4);
                $row4=mysqli_fetch_assoc($query4);
                $continentname=$row4["ContinentName"];
                if (!empty($cc)){
                    $sql0="SELECT AsciiName From geocities WHERE (GeoNameID='$cc')";
                    $query0=mysqli_query($conn,$sql0);
                    $row0=mysqli_fetch_assoc($query0);
                    $ccn=$row0["AsciiName"];
                }else{
                    $ccn='';
                }
                $Country=$row3["CountryName"];
                $nam=$row5["UserName"];
                if ($I=='8730408907.jpg'){
                    $d='Official name is "Church of the Blessed Virgin in Buda". Central part of church built around 1400, with additions by Turks, and then Baroque-era modifications, finally redone in late 19th Century in neo-Gothic revival. Very much a masterpiece of European eclecticism, though some say it is an over-decorated piece of stage scenery.';
                }
                echo '<li><a href="detaiL.php?imageSrc='.$I.'&src='.$src.'&name='.$t.'&des='.$d.'&author='.$nam.'&countryname='.$Country.'&cn='.$continentname.'&cc1='.$ccn.'"><img src="'.$sc.'" alt="图片" ></a>
    <p style="overflow:hidden;text-overflow:ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp:12">图片标题：<br>'.$t.'<br><br>图片描述：<br>'.$d.'</p></li>';
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
            ?>

        </ul>
    </div>
</div>
<footer style="position: relative;text-align: center;top: -900px; color: darkslategray " >
    <p>备案号：19302010071</p>
</footer>
</body>
</html>
