<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject Page</title>
<?php require 'css/header.php';?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
require 'include/connect.php';
session_start(); ?>	

<?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>
</head>
<?php if($_SESSION['stage']=='notstarted') {?>
<body> 
              <div class="member">
            <h1>Welcome <?php echo $_SESSION['username'];?>.</h1>
            
            <p>Your experiment has not started yet. Please check the experiment schedule below</p>
  			 <?php /* make two more php files. one for schedule and one for missed*/ ?>
           <br />
            <a href="login.php?logoff">Log out here</a>            
            </div>
            
<?php } /* if($_SESSION['stage']=='notstarted')  */ ?>

<?php if($_SESSION['stage']!='notstarted') {?>

 <div class="member">
            <h1>Welcome <?php if($_SESSION['id']){ echo $_SESSION['username'];} else{ echo 'guest';} ?>. </h1>
            
            <p>You are not authorized to view this page. </p>
  			 
           <br />
        <?php if($_SESSION['id']){ ?>   <a href="login.php?logoff">Log out here</a>  <<?php } ?>          
        <?php if(!$_SESSION['id']) { ?>   <a href="login.php">Log in here</a>  <?php } ?> 
            </div>
            
<?php } /*  if($_SESSION['stage']!='notstarted') */  ?>

</body>

</html>