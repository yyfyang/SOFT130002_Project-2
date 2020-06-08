<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的收藏</title>
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
            background-color: cornflowerblue
        }
        .back4{
            background-image: url("../img/登入.jpg") ;
            background-repeat: no-repeat;
            background-size:18px 18px;
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
                <li ><div class='back4'><a href='login.html'>登出</a></div> </li>";
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
        $sql="SELECT * From traveluser WHERE UserName='$user'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($query);
        if (!isset($_GET['page'])){
            $_GET['page']=1;
        }
        if ($row['total']==0){
            echo '<p style="position: absolute;top: 300px;left: 620px">你还没有收藏，快去收藏吧！</p>';
        }else{
            if ($_GET['page']==1){
                $l=1;
                if ($row['total']<=4){
                    $m=$row['total'];
                }else {
                    $m=4;
                }
            }else{
                if ($_GET['page']==2){
                    $l=5;
                    if ($row['total']<=8){
                        if ($row['total']>4){
                            $m=$row['total']-4;
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
                        if ($row['total']<=12){
                            if ($row['total']>8){
                                $m=$row['total']-8;
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
                            if ($row['total']<=16){
                                if ($row['total']>12){
                                    $m=$row['total']-12;
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
                                if ($row['total']<=20){
                                    if ($row['total']>16){
                                        $m=$row['total']-16;
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
                $j=$i+$l;
                $I="ImageSrc".$j;
                $T="Favor".$j;
                $src='travel-images/small/'.$row[$I];
                $sc='../travel-images/small/'.$row[$I];
                $favor=$row[$T];
                $sql2="SELECT * From travelimage WHERE PATH='$row[$I]'";
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
                if ($row[$I]=='8730408907.jpg'){
                    $d='Official name is "Church of the Blessed Virgin in Buda". Central part of church built around 1400, with additions by Turks, and then Baroque-era modifications, finally redone in late 19th Century in neo-Gothic revival. Very much a masterpiece of European eclecticism, though some say it is an over-decorated piece of stage scenery.';
                }
                if ($favor=='no'){
                    $v='收藏';
                }else{
                    if ($favor=='yes'){
                        $v='取消收藏';
                    }
                }
                echo '<li><a href="detaiL.php?imageSrc='.$row[$I].'&src='.$src.'&name='.$t.'&des='.$d.'&author='.$nam.'&countryname='.$Country.'&cn='.$continentname.'&cc1='.$ccn.'"><img src="'.$sc.'" alt="图片" ></a>
    <p style="overflow:hidden;text-overflow:ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp:12">图片标题：<br>'.$t.'<br><br>图片描述：<br>'.$d.'</p>
    <a  href="favor.php?favor='.$row[$T].'&list='.$j.'" style="display:block;width:90px;height:20px;text-align:center;text-decoration: none;border: 1px solid;background-color: #e7daff">'.$v.'</a></li>';
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
           <li><a href="?page=2" class="kk" >2</a></li>
           <li><a href="?page=3" class="k">3</a></li>
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
<footer style="position: absolute;left: 650px;top:1440px; color: darkslategray " >
    <p>备案号：19302010071</p>
</footer>
</body>
</html>


