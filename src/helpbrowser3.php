<?php
session_start();
$_SESSION['hot']=$_GET['hot'];
$_SESSION['choosetype']=3;
$_SESSION['choosetype2']=1;
header("location:browser.php");