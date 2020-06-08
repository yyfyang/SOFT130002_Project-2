<?php
session_start();
$_SESSION['hot2']=$_GET['hot'];
$_SESSION['choosetype']=3;
$_SESSION['choosetype2']=2;
header("location:browser.php");