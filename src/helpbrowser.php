<?php
session_start();
$_SESSION['Bcountry']=$_POST['country'];
$_SESSION['Bcity']=$_POST['city'];
$_SESSION['Btype']=$_POST['type'];
$_SESSION['choosetype']=1;
$_SESSION['Bcitycode']=1;
if ($_SESSION['Bcountry']=='中国'){
    if ($_SESSION['Bcity']=='1'){
        $_SESSION['Bcitycode']='1816670';
    }
    if ($_SESSION['Bcity']=='2'){
        $_SESSION['Bcitycode']='1804651';
    }
    if ($_SESSION['Bcity']=='3'){
        $_SESSION['Bcitycode']='1806951';
    }
    if ($_SESSION['Bcity']=='0'){
        $_SESSION['Bcitycode']='1796236';
    }
}
if ($_SESSION['Bcountry']=='日本') {
    if ($_SESSION['Bcity']=='3'){
        $_SESSION['Bcitycode']='1894616';
    }
    if ($_SESSION['Bcity']=='2'){
        $_SESSION['Bcitycode']='1853909';
    }
    if ($_SESSION['Bcity']=='0'){
        $_SESSION['Bcitycode']='1850147';
    }
    if ($_SESSION['Bcity']=='1'){
        $_SESSION['Bcitycode']='1848354';
    }
}
if ($_SESSION['Bcountry']=='意大利') {
    if ($_SESSION['Bcity']=='1'){
        $_SESSION['Bcitycode']='3164603';
    }
    if ($_SESSION['Bcity']=='0'){
        $_SESSION['Bcitycode']='3164527';
    }
    if ($_SESSION['Bcity']=='3'){
        $_SESSION['Bcitycode']='1496153';
    }
    if ($_SESSION['Bcity']=='2'){
        $_SESSION['Bcitycode']='3169070';
    }
}
if ($_SESSION['Bcountry']=='美国'){
    if ($_SESSION['Bcity']=='0'){
        $_SESSION['Bcitycode']='4167147';
    }
    if ($_SESSION['Bcity']=='1'){
        $_SESSION['Bcitycode']='4166066';
    }
    if ($_SESSION['Bcity']=='3'){
        $_SESSION['Bcitycode']='4166673';
    }if ($_SESSION['Bcity']=='2') {
        $_SESSION['Bcitycode'] = '4166047';
    }
}

header("location: browser.php");