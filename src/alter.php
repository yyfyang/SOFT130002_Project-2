<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的上传</title>
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
        .back1{
            background-image:url("../img/上传.jpg") ;
            background-repeat: no-repeat;
            background-size:18px 18px;
            background-color: cornflowerblue;
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
        .image2{
            position: absolute;
            top: 155px;
            left: 170px;
            height: 400px;
            width: 550px;
        }
    </style>
</head>
<body>
<div class="menu">
    <ul class="menubar">
        <li class="" ><a href="../Index.php">首页</a></li>
        <li class="" ><a href="browser.php">浏览页</a></li>
        <li class="" ><a href="search.php">搜索页</a></li>
        <li class="list" ><a id="aa" href=" <?php if (empty($_SESSION['user'])){echo 'src/login.html';}?>">登录</a>
            <ul class="move" id="out">
                <?php
                session_start();
                $_SESSION['c2']=0;
                $_SESSION['hh']=$_GET['h'];
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
<form action="helpalter.php" enctype="multipart/form-data" method="post">
    <input style="position: relative;top: 100px;left: 230px" type="file" id="file" name="file" accept="image/*"  onchange="readFile(this.files[0])">
    <?php
    $src=$_GET['src'];
    echo '<img  id="img" class="image2" src="'.$src.'">';
    ?>
    <div id="preview" style="position:relative;top: 130px;left: 180px">
        <label style="position:absolute;top: 0;left: 590px">图片标题：
            <?php
            $title=$_GET['title'];
            echo '<input type="text" name="title" value="'.$title.'" required>';
            ?>
        </label>
        <label style="position:absolute;top:20px;left: 590px">图片描述：<br>
            <?php
            $d=$_GET['des'];
            echo '<textarea style="resize: none;width:440px;height:180px;" name="des"  required>'.$d.'</textarea>';
            ?>
        </label >
        <label style="position:absolute;top:230px;left: 590px">拍摄地点：
            <select id="country" name="country" onchange="nextChange()" required>
                <?php
                $type2=array("中国","日本","意大利","美国");
                for ($i=0;$i<4;$i++){
                    if ($type2[$i]==$_GET['country']){
                        echo '<option selected="selected">'.$type2[$i].'</option>';
                    }else{
                        echo '<option>'.$type2[$i].'</option>';
                    }
                }
                ?>
            </select>
            <select id="city" name="city" required>
                <?php
                if ($_GET['country']=='中国'){
                    $type3=array("上海","北京","昆明","湖北");
                    for ($i=0;$i<4;$i++){
                        if ($type3[$i]==$_GET['city']){
                            echo '<option selected="selected">'.$type3[$i].'</option>';
                        }else{
                            echo '<option>'.$type3[$i].'</option>';
                        }
                    }
                }else if ($_GET['country']=='日本'){
                    $type3=array("横滨","东京","冲绳","大阪");
                    for ($i=0;$i<4;$i++){
                        if ($type3[$i]==$_GET['city']){
                            echo '<option selected="selected">'.$type3[$i].'</option>';
                        }else{
                            echo '<option>'.$type3[$i].'</option>';
                        }
                    }
                }else if ($_GET['country']=='意大利'){
                    $type3=array("罗马","威尼斯","热那亚","维罗纳");
                    for ($i=0;$i<4;$i++){
                        if ($type3[$i]==$_GET['city']){
                            echo '<option selected="selected">'.$type3[$i].'</option>';
                        }else{
                            echo '<option>'.$type3[$i].'</option>';
                        }
                    }
                }else if ($_GET['country']=='美国'){
                    $type3=array("奥兰多","奥卡拉","诺卡第","诺兰德");
                    for ($i=0;$i<4;$i++){
                        if ($type3[$i]==$_GET['city']){
                            echo '<option selected="selected">'.$type3[$i].'</option>';
                        }else{
                            echo '<option>'.$type3[$i].'</option>';
                        }
                    }
                }
                ?>
                <option>城市</option>
            </select>
        </label>

        <label style="position:absolute;top:255px;left: 590px">主题：
            <select name="type" required>
                <?php
                $type=array("风景","建筑","动物","城市","人文","奇观","其他");
                for ($i=0;$i<7;$i++){
                 if ($type[$i]==$_GET['style']){
                     echo '<option selected="selected">'.$type[$i].'</option>';
                 }else{
                     echo '<option>'.$type[$i].'</option>';
                 }
                }
                ?>
            </select>
        </label><div id="span" ></div>
        <input type="submit" id="submit" value="提交" style="position:absolute;top: 290px;left: 620px">
    </div>
</form>



<script type="text/javascript">
    file=[];
    function readFile(f){
        var reader = new FileReader();
            reader.readAsDataURL(f);
            reader.onload = function(){
                var preview = document.querySelector('#preview');
                var img = document.getElementById("img");
                file[0]=reader.result;
                img.src = file[0];
                img.style.top="0px";
                img.style.left="0px";
                preview.appendChild(img);

            };
            reader.onerror = function(e){
                console.log("Error"+e);
            }
    }
</script>

<footer style="position: relative;text-align: center;top: 800px; color: darkslategray " >
    <p>备案号：19302010071</p>
</footer>
</body>
</html>
<script>

    function nextChange() {
        var country=document.getElementById("country");
        var city=document.getElementById("city");
        city.options.length=0;
        if (country.selectedIndex===0){
            city.options.add(new Option("上海","上海",false,true));
            city.options.add(new Option("北京","北京"));
            city.options.add(new Option("昆明","昆明"));
            city.options.add(new Option("湖北","湖北"));
        }
        if (country.selectedIndex===1){
            city.options.add(new Option("东京","东京",false,true));
            city.options.add(new Option("横滨","横滨"));
            city.options.add(new Option("大阪","大阪"));
            city.options.add(new Option("冲绳","冲绳"));
        }
        if (country.selectedIndex===2){
            city.options.add(new Option("维罗纳","维罗纳",false,true));
            city.options.add(new Option("威尼斯","威尼斯"));
            city.options.add(new Option("罗马","罗马"));
            city.options.add(new Option("热那亚","热那亚"));
        }
        if (country.selectedIndex===3){
            city.options.add(new Option("奥兰多","奥兰多",false,true));
            city.options.add(new Option("诺兰德","诺兰德"));
            city.options.add(new Option("诺卡第","诺卡第"));
            city.options.add(new Option("奥卡拉","奥卡拉"));
        }
    }
</script>
