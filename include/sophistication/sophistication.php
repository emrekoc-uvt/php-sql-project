<?php require 'include/connect.php';  ?> 

<?php require 'include/checkfinished.php'; ?>

<?php if($_SESSION['finished0']==1 and $_SESSION['finishedt']==1 and $_SESSION['finished1']==0){?>

<?php require 'include/sophistication/betaloader.php'; ?>
<?php  require 'include/sophistication/sophisticationanswercounter.php';  ?>
<?php  require 'include/sophistication/sophisticationsubmitted.php';   ?>
<?php /* echo "sophistication test"; */ ?>
<?php  require 'include/checkfinished.php';   ?>
<?php  require 'include/sophistication/sophisticationbody.php';   ?>
<?php }else{ /* if($_SESSION['finished0']==0 and $_SESSION['finishedt']==1) */?>
<?php header("Location: ../error.php");?>
<?php } /* else ($_SESSION['finished0']==1 and $_SESSION['finishedt']==1 & $_SESSION['finished1']==0) */?>

