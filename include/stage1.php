<?php
error_reporting(E_ALL ^ E_NOTICE);
require 'include/connect.php';
session_start(); ?>	

<?php 
$id= $_SESSION['id'];
?>

<?php require "include/checkfinished.php"?>
<?php if($finished0==0){require 'include/stage1-0.php';}
elseif($finished0==1){ require 'include/stage1-1.php'; }
else{header("Location: ../error.php");}
?>

<?php /* echo "this is stage 1"; */?>
