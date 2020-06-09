<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
</head>
<style type="text/css">
    body,li,ul,a{
        padding: 0;
        margin: 0;
    }
    body{
        color: white;
        background-image: url("img/header.jpg");
        background-repeat: no-repeat;
        background-position: 300px 50px;
        background-size: 800px 500px;
        overflow-y: scroll;
        background-color: gray;
        overflow-x: hidden;
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
    .move{
        display: none;
    }
    .picture li{
        float: left;
        width: 28%;
        height: 500px;
        overflow: hidden;
        position: relative;
        top: 600px;
        left: 140px;

    }
    .picture li img{
        position: center;
        width: 90%;
        height: 300px;
    }
    .back1{
        background-image:url("img/上传.jpg") ;
        background-repeat: no-repeat;
        background-size:18px 18px;
    }
    .back2{
        background-image: url("img/照片.jpg") ;
        background-repeat: no-repeat;
        background-size:18px 18px;
    }
    .back3{
        background-image: url("img/收藏.jpg") ;
        background-repeat: no-repeat;
        background-size:18px 18px;
    }
    .back4{
        background-image: url("img/登入.jpg") ;
        background-repeat: no-repeat;
        background-size:18px 18px;
    }

</style>
<body>
<div class="menu">
    <ul class="menubar">
        <li class="menu-value" ><a href="Index.php" >首页</a></li>
        <li class="" ><a href="src/browser.php">浏览页</a></li>
        <li class="" ><a href="src/search.php">搜索页</a></li>
        <li class="list" ><a id="aa" href=" <?php if (empty($_SESSION['user'])){echo 'src/login.html';}?>">登录</a>
            <ul class="move" id="out">
               <?php
               session_start();
               $_SESSION['c2']=0;
               if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                   echo "<li><div class='back1' ><a href='src/upload.php'>上传</a></div></li>
                <li><div class='back2'><a href='src/picture.php'>我的照片</a></div></li>
                <li><div class='back3'><a href='src/like.php'>我的收藏</a></div></li>
                <li ><div class='back4'><a href='src/loginout.php'>登出</a></div> </li>";
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
        header("content-type:text/html;charset=utf8");
        $servername ="localhost";
        $db_username="root";
        $db_password="";
        $db_name="travel";
        $conn=new mysqli($servername,$db_username,$db_password,$db_name);
        $sql1="SELECT ImageID FROM travelimagefavor";
        $query1=mysqli_query($conn,$sql1);
        $i=0;
        if (empty($_SESSION['fresh'])){
            for ($x=0;$x<6;$x++){
                $row1=mysqli_fetch_assoc($query1);
                $r=$row1["ImageID"]-1;
                $sql="SELECT Title,Description,PATH,UID,CountryCodeISO,CityCode FROM travelimage order by ImageID limit $r,1";
                $query=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($query);
                $h="travel-images/small/".$row["PATH"];
                $t=$row["Title"];
                $d=$row["Description"];
                $n=$row["UID"]-1;
                $country=$row["CountryCodeISO"];
                $cc=$row["CityCode"];
                $sql3="SELECT CountryName,Continent From geocountries WHERE (ISO='$country')";
                $sql2="SELECT UserName FROM traveluser order by UID limit $n,1";
                $query2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($query2);
                $query3=mysqli_query($conn,$sql3);
                $row3=mysqli_fetch_assoc($query3);
                $continent=$row3["Continent"];
                $sql4="SELECT ContinentName From geocontinents WHERE (ContinentCode='$continent')";
                $query4=mysqli_query($conn,$sql4);
                $row4=mysqli_fetch_assoc($query4);
                $continentname=$row4["ContinentName"];
                if (!empty("$cc")){
                    $sql0="SELECT AsciiName From geocities WHERE (GeoNameID='$cc')";
                    $query0=mysqli_query($conn,$sql0);
                    $row0=mysqli_fetch_assoc($query0);
                    $ccn=$row0["AsciiName"];
                }else{
                 $ccn='';
                }
                $Country=$row3["CountryName"];
                $nam=$row2["UserName"];
                echo '<li><a  href="src/detaiL.php?imageSrc='.$row["PATH"].'&src='.$h.'&name='.$t.'&des='.$d.'&author='.$nam.'&countryname='.$Country.'&cn='.$continentname.'&cc1='.$ccn.'"><img  name="a" src="'.$h.'" alt="图片"></a><p  style="overflow:hidden;text-overflow:ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp:7" name="tit">图片标题：&emsp;'.$t.'<br>图片描述：<br>'.$d.'<br></p></li>';
            }
        }else{
                for ($j=0;$j<6;$j++){
                    $sql="SELECT Description,Title,PATH,UID,CountryCodeISO,CityCode FROM travelimage  ORDER BY  RAND() LIMIT 1";
                    $query=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($query);
                    $h="travel-images/small/".$row["PATH"];
                    $t=$row["Title"];
                    $d=$row["Description"];
                    $n=$row["UID"]-1;
                    $country=$row["CountryCodeISO"];
                    $cc=$row["CityCode"];
                    $sql3="SELECT CountryName,Continent From geocountries WHERE (ISO='$country')";
                    $sql2="SELECT UserName FROM traveluser order by UID limit $n,1";
                    $query2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($query2);
                    $query3=mysqli_query($conn,$sql3);
                    $row3=mysqli_fetch_assoc($query3);
                    $continent=$row3["Continent"];
                    $sql4="SELECT ContinentName From geocontinents WHERE (ContinentCode='$continent')";
                    $query4=mysqli_query($conn,$sql4);
                    $row4=mysqli_fetch_assoc($query4);
                    $continentname=$row4["ContinentName"];
                    if (!empty("$cc")){
                        $sql0="SELECT AsciiName From geocities WHERE (GeoNameID='$cc')";
                        $query0=mysqli_query($conn,$sql0);
                        $row0=mysqli_fetch_assoc($query0);
                        $ccn=$row0["AsciiName"];
                    }else{
                        $ccn='';
                    }
                    $Country=$row3["CountryName"];
                    $nam=$row2["UserName"];
                    echo '<li><a  href="src/detaiL.php?imageSrc='.$row["PATH"].'&src='.$h.'&name='.$t.'&des='.$d.'&author='.$nam.'&countryname='.$Country.'&cn='.$continentname.'&cc1='.$ccn.'"><img  name="a" src="'.$h.'" alt="图片"></a><p style="overflow:hidden;text-overflow:ellipsis;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp:7" name="tit">图片标题：&emsp;'.$t.'<br>图片描述：<br>'.$d.'<br></p></li>';
                }
        }
        ?>
    </ul>
</div>
<div style="position: fixed;top: 700px;left: 1350px;width: 80px;height: 80px" >
    <form action="detail.php" method="post">
        <input id="fresh" type="submit"  style="background-image: url('img/刷新.jpg');width: 54px;height: 49px" alt="图片">
    </form>
    <a href="#top"><input type="image" src="img/置顶.jpg"  alt="图片"></a>
</div>
<footer style="position: relative;right: 560px;top: 1600px; color: darkslategray " >
    <p>联系电话：15002116228<br>备案号：19302010071</p>
</footer>
</body>
</html>




