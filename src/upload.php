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
<form action="../helpupload.php" enctype="multipart/form-data" method="post">
    <input style="position: relative;top: 100px;left: 230px" type="file" id="file" name="file" accept="image/*"  onchange="readFile(this.files[0])">
    <div id="preview" style="position:relative;top: 130px;left: 180px">
        <label style="position:absolute;top: 0;left: 590px">图片标题：
            <input type="text" name="title" required>
        </label>
        <label style="position:absolute;top:20px;left: 590px">图片描述：<br>
            <textarea style="resize: none;width:440px;height:180px;" name="des" required></textarea>
        </label >
        <label style="position:absolute;top:230px;left: 590px">拍摄地点：
            <select id="country" name="country" onchange="nextChange()" required>
                <option selected="selected">国家</option>
                <option>中国</option>
                <option>日本</option>
                <option>意大利</option>
                <option>美国</option>
            </select>
            <select id="city" name="city" required>
                <option>城市</option>
            </select>
        </label>

        <label style="position:absolute;top:255px;left: 590px">主题：
            <select name="type" required>
                <option>风景</option>
                <option>建筑</option>
                <option>动物</option>
                <option>城市</option>
                <option>人文</option>
                <option>奇观</option>
                <option>其他</option>
            </select>
        </label><div id="span" ></div>
        <input type="submit" id="submit" value="提交" style="position:absolute;top: 290px;left: 620px">
    </div>
</form>



<script type="text/javascript">
    file=[];
    function readFile(f){
        var reader = new FileReader();
        if (file.length===0){
            reader.readAsDataURL(f);
            reader.onload = function(){
                var preview = document.querySelector('#preview');
                var img = document.createElement("img");
                img.src = reader.result;
                img.width=550;
                img.height=400;
                preview.appendChild(img);
                file[0]=reader.result;

            };
            reader.onerror = function(e){
                console.log("Error"+e);
            }
        }else {
            document.getElementsByTagName("img")[0].remove();
            reader.readAsDataURL(f);
            reader.onload = function(){
                var preview = document.querySelector('#preview');
                var img = document.createElement("img");
                file[0]=reader.result;
                img.src = file[0];
                img.width=550;
                img.height=400;
                preview.appendChild(img);

            };
            reader.onerror = function(e){
                console.log("Error"+e);
            }
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
            city.options.add(new Option("城市","0",false,true));

        }
        if (country.selectedIndex===1){
            city.options.add(new Option("上海","上海",false,true));
            city.options.add(new Option("北京","北京"));
            city.options.add(new Option("昆明","昆明"));
            city.options.add(new Option("湖北","湖北"));
        }
        if (country.selectedIndex===2){
            city.options.add(new Option("东京","东京",false,true));
            city.options.add(new Option("横滨","横滨"));
            city.options.add(new Option("大阪","大阪"));
            city.options.add(new Option("冲绳","冲绳"));
        }
        if (country.selectedIndex===3){
            city.options.add(new Option("维罗纳","维罗纳",false,true));
            city.options.add(new Option("威尼斯","威尼斯"));
            city.options.add(new Option("罗马","罗马"));
            city.options.add(new Option("热那亚","热那亚"));
        }
        if (country.selectedIndex===4){
            city.options.add(new Option("奥兰多","奥兰多",false,true));
            city.options.add(new Option("诺兰德","诺兰德"));
            city.options.add(new Option("诺卡第","诺卡第"));
            city.options.add(new Option("奥卡拉","奥卡拉"));
        }
    }
</script>