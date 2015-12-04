<?php require 'include/connect.php';  ?> 

<?php require 'include/checkfinished.php'; ?>

<?php if($_SESSION['finished0']==0 and $_SESSION['finishedt']==0){?>
<?php require 'include/timepref/timeprefanswercounter.php'; ?>
<?php require 'include/timepref/timeprefsubmitted.php';  ?>
<?php require 'include/checkfinished.php'; ?>
<?php require 'include/timepref/timeprefbody.php';  ?>
<?php }else{?>
<?php header("Location: ../error.php");?>
<?php } /* else($_SESSION['finished0']==0 and $_SESSION['finishedt']==0) */?>

