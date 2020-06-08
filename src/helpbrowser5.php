<?php
session_start();
$_SESSION['hot3']=$_GET['hot'];
$_SESSION['choosetype']=3;
$_SESSION['choosetype2']=3;
header("location:browser.php");