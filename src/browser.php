<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>浏览</title>
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
        .sidebar{
            margin-top: 50px;
            float: left;
            width: 190px;
            background: lightblue;
            position: relative;
            height: 100%;
        }
        .country li{
            list-style-type: none;
            cursor: pointer;
        }
        .country li:hover{
            background: lightcyan;
            background-size: 100px;
        }
        .country a{
            text-decoration: none;
            color: darkblue;
        }
        .country{
            position: relative;
            left: 25px;
        }
        .picture li{
            float: left;
            width:390px;
            height: 360px;
            overflow: hidden;
            position: relative;
            top: 130px;
            left: 80px;

        }
        .picture li img{
            position: center;
            width: 80%;
            height: 320px;
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
        <li class="menu-value" ><a href="browser.php">浏览页</a></li>
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
<div class="sidebar">
    <h3 style="position: relative;left: 15px">标题浏览：<br>
        <form action="helpbrowser2.php" method="post">
            <input name="Bthing" type="text" >
            <input type="submit" value="搜索">
        </form>
    </h3>
    <h3 style="position: relative;left: 15px">热门国家快速浏览：</h3>
    <ul class="country" >
        <li><a href="helpbrowser3.php?hot=DE" >德国</a></li>
        <li><a href="helpbrowser3.php?hot=US" >美国</a></li>
        <li><a href="helpbrowser3.php?hot=CA">加拿大</a></li>
        <li><a href="helpbrowser3.php?hot=BS" >英国</a></li>
        <li><a href="helpbrowser3.php?hot=IT" >意大利</a></li>
    </ul>
    <h3 style="position: relative;left: 15px">热门城市快速浏览：</h3>
    <ul class="country">
        <li><a href="helpbrowser4.php?hot=3164603" >威尼斯</a></li>
        <li><a href="helpbrowser4.php?hot=3164527" >维罗纳</a></li>
        <li><a href="helpbrowser4.php?hot=4167147" >奥兰多</a></li>
        <li><a href="helpbrowser4.php?hot=3169070" >罗马</a></li>
        <li><a href="helpbrowser4.php?hot=264371" >雅典</a></li>
    </ul>
    <h3 style="position: relative;left: 15px">热门主题快速浏览：</h3>
    <ul class="country" >
        <li><a href="helpbrowser5.php?hot=yes" >风景</a></li>
        <li><a href="helpbrowser5.php?hot=no" >城市</a></li>
        <li><a href="helpbrowser5.php?hot=no">人文</a></li>
        <li><a href="helpbrowser5.php?hot=no" >动物</a></li>
        <li><a href="helpbrowser5.php?hot=no">建筑</a></li>
    </ul>
    <br>
    <form method="post" action="helpbrowser.php">
        <label for="country"></label><select id="country" name="country" onchange="nextChange()" style="position: absolute;top: 30px;left: 280px;width: 100px">
            <option selected="selected">国家</option>
            <option>中国</option>
            <option>日本</option>
            <option>意大利</option>
            <option>美国</option>
        </select>
        <label for="city"></label><select id="city" name="city" style="position: absolute;top: 30px;left: 400px;width: 100px">
            <option>城市</option>
        </select>
        <label>
            <select name="type" style="position: absolute;top: 30px;left: 520px;width: 100px">
                <option>风景</option>
                <option>建筑</option>
                <option>动物</option>
                <option>生活</option>
            </select>
            <br><br><br><br><br><br><br>
        </label>
        <input type="submit" value="筛选" width="80" style="position: absolute;top: 30px;left: 650px">
    </form>
   </div>
<div>
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
        if (isset($_SESSION['choosetype'])){
            if ($_SESSION['choosetype']==1){
            if ($_SESSION['Bcountry']=='国家'||$_SESSION['Bcity']=='城市'){
                echo '<p style="position: absolute;top: 300px;left: 620px">请正确选择条件</p>';
            }else{
                $Bcitycode=$_SESSION['Bcitycode'];
                $sql2 = "SELECT * FROM travelimage WHERE CityCode='$Bcitycode'";
                $value = $conn->query($sql2)->num_rows;
                if ($value>0&&$_SESSION['Btype']=='风景'){
                    if ($_GET['page']==1){
                    $l=1;
                    if ($value<=9){
                        $m=$value;
                    }else {
                        $m=9;
                    }
                }else{
                    if ($_GET['page']==2){
                        $l=10;
                        if ($value<=18){
                            if ($value>9){
                                $m=$value-9;
                            }else{
                                $m=0;
                                echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                            }
                        }else {
                            $m=9;
                        }
                    }else{
                        if ($_GET['page']==3){
                            $l=19;
                            if ($value<=27){
                                if ($value>18){
                                    $m=$value-18;
                                }else{
                                    $m=0;
                                    echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                }
                            }else {
                                $m=9;
                            }
                        }else{
                            if ($_GET['page']==4){
                                $l=28;
                                if ($value<=36){
                                    if ($value>27){
                                        $m=$value-27;
                                    }else{
                                        $m=0;
                                        echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                    }
                                }else {
                                    $m=9;
                                }
                            }else{
                                if ($_GET['page']==5){
                                    $l=37;
                                    if ($value<=45){
                                        if ($value>36){
                                            $m=$value-36;
                                        }else{
                                            $m=0;
                                            echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                        }
                                    }else {
                                        $m=9;
                                    }
                                }
                            }
                        }
                    }
                }
                     for ($i=0;$i<$m;$i++){
                    $j=$i+$l-1;
                    $sql0 = "SELECT * FROM travelimage WHERE CityCode='$Bcitycode' limit  $j,1";
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
                    echo '<li><a href="detaiL.php?imageSrc='.$I.'&src='.$src.'&name='.$t.'&des='.$d.'&author='.$nam.'&countryname='.$Country.'&cn='.$continentname.'&cc1='.$ccn.'"><img src="'.$sc.'" alt="图片" ></a></li>';
                }

                }else{
                    echo '<p style="position: absolute;top: 300px;left: 620px">没有查询到相应图片</p>';
                }
            }
        }else{
            if ($_SESSION['choosetype']==2){
            $Bthing=$_SESSION['Bthing'];
            $sql2 = "SELECT * FROM travelimage WHERE Title LIKE '%".$Bthing."%'";
            $value = $conn->query($sql2)->num_rows;
            if ($value>0){
                    if ($_GET['page']==1){
                    $l=1;
                    if ($value<=9){
                        $m=$value;
                    }else {
                        $m=9;
                    }
                }else{
                    if ($_GET['page']==2){
                        $l=10;
                        if ($value<=18){
                            if ($value>9){
                                $m=$value-9;
                            }else{
                                $m=0;
                                echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                            }
                        }else {
                            $m=9;
                        }
                    }else{
                        if ($_GET['page']==3){
                            $l=19;
                            if ($value<=27){
                                if ($value>18){
                                    $m=$value-18;
                                }else{
                                    $m=0;
                                    echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                }
                            }else {
                                $m=9;
                            }
                        }else{
                            if ($_GET['page']==4){
                                $l=28;
                                if ($value<=36){
                                    if ($value>27){
                                        $m=$value-27;
                                    }else{
                                        $m=0;
                                        echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                    }
                                }else {
                                    $m=9;
                                }
                            }else{
                                if ($_GET['page']==5){
                                    $l=37;
                                    if ($value<=45){
                                        if ($value>36){
                                            $m=$value-36;
                                        }else{
                                            $m=0;
                                            echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                        }
                                    }else {
                                        $m=9;
                                    }
                                }
                            }
                        }
                    }
                }
                    for ($i=0;$i<$m;$i++){
                $j=$i+$l-1;
                $sql0 = "SELECT * FROM travelimage WHERE Title LIKE '%".$Bthing."%' limit  $j,1";
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
                echo '<li><a href="detaiL.php?imageSrc='.$I.'&src='.$src.'&name='.$t.'&des='.$d.'&author='.$nam.'&countryname='.$Country.'&cn='.$continentname.'&cc1='.$ccn.'"><img src="'.$sc.'" alt="图片" ></a></li>';
            }
            }else{
                echo '<p style="position: absolute;top: 300px;left: 620px">没有查询到相应图片</p>';
            }
            }else{
                if ($_SESSION['choosetype']==3){
                    if ($_SESSION['choosetype2']==1){
                        $hot=$_SESSION['hot'];
                        $sql2 = "SELECT * FROM travelimage WHERE CountryCodeISO='$hot'";
            $value = $conn->query($sql2)->num_rows;
            if ($value>0){
                    if ($_GET['page']==1){
                    $l=1;
                    if ($value<=9){
                        $m=$value;
                    }else {
                        $m=9;
                    }
                }else{
                    if ($_GET['page']==2){
                        $l=10;
                        if ($value<=18){
                            if ($value>9){
                                $m=$value-9;
                            }else{
                                $m=0;
                                echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                            }
                        }else {
                            $m=9;
                        }
                    }else{
                        if ($_GET['page']==3){
                            $l=19;
                            if ($value<=27){
                                if ($value>18){
                                    $m=$value-18;
                                }else{
                                    $m=0;
                                    echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                }
                            }else {
                                $m=9;
                            }
                        }else{
                            if ($_GET['page']==4){
                                $l=28;
                                if ($value<=36){
                                    if ($value>27){
                                        $m=$value-27;
                                    }else{
                                        $m=0;
                                        echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                    }
                                }else {
                                    $m=9;
                                }
                            }else{
                                if ($_GET['page']==5){
                                    $l=37;
                                    if ($value<=45){
                                        if ($value>36){
                                            $m=$value-36;
                                        }else{
                                            $m=0;
                                            echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                        }
                                    }else {
                                        $m=9;
                                    }
                                }
                            }
                        }
                    }
                }
                    for ($i=0;$i<$m;$i++){
                $j=$i+$l-1;
                $sql0 = "SELECT * FROM travelimage WHERE CountryCodeISO='$hot' limit  $j,1";
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
                echo '<li><a href="detaiL.php?imageSrc='.$I.'&src='.$src.'&name='.$t.'&des='.$d.'&author='.$nam.'&countryname='.$Country.'&cn='.$continentname.'&cc1='.$ccn.'"><img src="'.$sc.'" alt="图片" ></a></li>';
            }
            }else{
                echo '<p style="position: absolute;top: 300px;left: 620px">没有查询到相应图片</p>';
            }
                    }else{
                         if ($_SESSION['choosetype2']==2){
                             $hot2=$_SESSION['hot2'];
                $sql2 = "SELECT * FROM travelimage WHERE CityCode='$hot2'";
                $value = $conn->query($sql2)->num_rows;
                if ($value>0){
                    if ($_GET['page']==1){
                    $l=1;
                    if ($value<=9){
                        $m=$value;
                    }else {
                        $m=9;
                    }
                }else{
                    if ($_GET['page']==2){
                        $l=10;
                        if ($value<=18){
                            if ($value>9){
                                $m=$value-9;
                            }else{
                                $m=0;
                                echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                            }
                        }else {
                            $m=9;
                        }
                    }else{
                        if ($_GET['page']==3){
                            $l=19;
                            if ($value<=27){
                                if ($value>18){
                                    $m=$value-18;
                                }else{
                                    $m=0;
                                    echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                }
                            }else {
                                $m=9;
                            }
                        }else{
                            if ($_GET['page']==4){
                                $l=28;
                                if ($value<=36){
                                    if ($value>27){
                                        $m=$value-27;
                                    }else{
                                        $m=0;
                                        echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                    }
                                }else {
                                    $m=9;
                                }
                            }else{
                                if ($_GET['page']==5){
                                    $l=37;
                                    if ($value<=45){
                                        if ($value>36){
                                            $m=$value-36;
                                        }else{
                                            $m=0;
                                            echo '<p style="position: absolute;top: 300px;left: 620px">此页面未有图片</p>';
                                        }
                                    }else {
                                        $m=9;
                                    }
                                }
                            }
                        }
                    }
                }
                     for ($i=0;$i<$m;$i++){
                    $j=$i+$l-1;
                    $sql0 = "SELECT * FROM travelimage WHERE CityCode='$hot2' limit  $j,1";
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
                    echo '<li><a href="detaiL.php?imageSrc='.$I.'&src='.$src.'&name='.$t.'&des='.$d.'&author='.$nam.'&countryname='.$Country.'&cn='.$continentname.'&cc1='.$ccn.'"><img src="'.$sc.'" alt="图片" ></a></li>';
                }

                }else{
                    echo '<p style="position: absolute;top: 300px;left: 620px">没有查询到相应图片</p>';
                }
                         }else{
                             if ($_SESSION['choosetype2']==3){
                                 $hot3=$_SESSION['hot3'];
                                 $value=45;
                if ($hot3=='yes'){
                    if ($_GET['page']==1){
                    $l=1;
                }else{
                    if ($_GET['page']==2){
                        $l=10;
                    }else{
                        if ($_GET['page']==3){
                            $l=19;
                        }else{
                            if ($_GET['page']==4){
                                $l=28;
                            }else{
                                if ($_GET['page']==5){
                                    $l=37;
                                }
                            }
                        }
                    }
                }
                     for ($i=0;$i<9;$i++){
                    $j=$i+$l-1;
                    $sql0 = "SELECT * FROM travelimage order by ImageID limit  $j,1";
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
                    echo '<li><a href="detaiL.php?imageSrc='.$I.'&src='.$src.'&name='.$t.'&des='.$d.'&author='.$nam.'&countryname='.$Country.'&cn='.$continentname.'&cc1='.$ccn.'"><img src="'.$sc.'" alt="图片" ></a></li>';
                }

                }else{
                    echo '<p style="position: absolute;top: 300px;left: 620px">没有查询到相应图片</p>';
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
<script>
    function nextChange() {
        var country=document.getElementById("country");
        var city=document.getElementById("city");
        city.options.length=0;
        if (country.selectedIndex===0){
            city.options.add(new Option("城市","0",false,true));

        }
        if (country.selectedIndex===1){
            city.options.add(new Option("上海","0",false,true));
            city.options.add(new Option("北京","1"));
            city.options.add(new Option("昆明","2"));
            city.options.add(new Option("湖北","3"));
        }
        if (country.selectedIndex===2){
            city.options.add(new Option("东京","0",false,true));
            city.options.add(new Option("横滨","1"));
            city.options.add(new Option("大阪","2"));
            city.options.add(new Option("冲绳","3"));
        }
        if (country.selectedIndex===3){
            city.options.add(new Option("维罗纳","0",false,true));
            city.options.add(new Option("威尼斯","1"));
            city.options.add(new Option("罗马","2"));
            city.options.add(new Option("热那亚","3"));
        }
        if (country.selectedIndex===4){
            city.options.add(new Option("奥兰多","0",false,true));
            city.options.add(new Option("诺兰德","1"));
            city.options.add(new Option("诺卡第","2"));
            city.options.add(new Option("奥卡拉","3"));
        }
    }
</script>
<div style="position: absolute;left:660px;top: 1300px;text-align: center">
    <ul class="jump">
        <?php
        if (!isset($_GET['page'])){
            $_GET['page']=1;
        }
        if ($value<=9){
            echo '<li><a href="?page=1" class="k"><<</a></li>
           <li><a href="?page=1" class="kk">1</a></li>
           <li><a href="?page=1" class="k">>></a></li>';
        }else{
            if ($value<=18&&$value>9){
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
                if ($value<=27&&$value>18){
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
                    if ($value<=36&&$value>27){
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
    <footer style="position: absolute;top: 40px; color: darkslategray " >
        <p>备案号：19302010071</p>
    </footer>
</div>

</body>
</html>
