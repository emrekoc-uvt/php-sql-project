<?php require 'include/connect.php';  ?> 

<?php require 'include/checkfinished.php'; ?>

<?php if($_SESSION['finished1']==1 and $_SESSION['finished2']==0){?>
<?php require 'include/stage2/stage2answercounter.php'; ?>
<?php require 'include/stage2/stage2submitted.php';  ?>
<?php  require 'include/stage2/stage2questions.php';  ?>
<?php  require 'include/stage2/stage2body.php';  ?>
<?php require 'include/checkfinished.php'; ?>
<?php /* require 'include/stage2/stage2body.php'; */ ?>
<?php }else{?>
<?php header("Location: ../error.php");?>
<?php } /* else($_SESSION['finished0']==0 and $_SESSION['finishedt']==0) */?>

