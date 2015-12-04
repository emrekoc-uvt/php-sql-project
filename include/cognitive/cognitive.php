<?php require 'include/connect.php';  ?> 

<?php require 'include/checkfinished.php'; ?>

<?php if($_SESSION['finished0']==0 and $_SESSION['finishedt']==1){?>
<?php /* echo "Cognitive ability test"; */ ?>
<?php require 'include/cognitive/cognitiveanswercounter.php'; ?>
<?php  require 'include/cognitive/cognitivesubmitted.php';  ?>
<?php  require 'include/cognitive/cognitivequestions.php';  ?>
<?php require 'include/checkfinished.php'; ?>
<?php  require 'include/cognitive/cognitivebody.php';   ?>
<?php }else{ /* if($_SESSION['finished0']==0 and $_SESSION['finishedt']==1) */?>
<?php header("Location: ../error.php");?>
<?php } /* else($_SESSION['finished0']==0 and $_SESSION['finishedt']==0) */?>

