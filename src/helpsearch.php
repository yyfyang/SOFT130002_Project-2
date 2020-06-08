<?php
session_start();
$_SESSION['search']=$_POST['search'];
$_SESSION['thing']=$_POST['thing'];
$_SESSION['c2']=1;
header("location:search.php");