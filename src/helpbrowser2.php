<?php
session_start();
$_SESSION['choosetype']=2;
$_SESSION['Bthing']=$_POST['Bthing'];
header("location: browser.php");