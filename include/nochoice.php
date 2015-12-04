<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject Page</title>
<?php require 'css/header.php';?>
<?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>
</head>
<?php if($_SESSION['stage']=='nochoice' or $_SESSION['stage']=='notstarted' or $_SESSION['stage']=='btw1and2') {?>
<body> 
              <div class="member">
            <h1>Welcome <?php echo $_SESSION['username'];?>.</h1>
            
            <p class="big">You are not supposed to make a choice now. Please check the experiment schedule <a href="schedule.php">here</a>. </p>
  			 
           <br />
           <?php if($_SESSION['id']){ ?>   You can logout <a href="login.php?logoff">here</a>.      <?php } ?>          
        <?php if(!$_SESSION['id']) { ?>   You can login <a href="login.php">here</a>.  <?php } ?> 
          
             </div>
            
<?php } /* if($_SESSION['stage']=='notstarted' or $_SESSION['stage']=='notstarted')  */ else {?>



 <div class="member">
            <h1>Welcome <?php if($_SESSION['id']){ echo $_SESSION['username'];} else{ echo 'guest';} ?>. </h1>
            
            <p class="big">You are not authorized to view this page. </p>
  			 <?php /* echo "nochoice php"; */?>
           <br />
       <?php if($_SESSION['id']){ ?>   You can logout <a href="login.php?logoff">here</a>.      <?php } ?>          
        <?php if(!$_SESSION['id']) { ?>   You can login <a href="login.php">here</a>.  <?php } ?> 
              </div>
            
<?php } /*  else ($_SESSION['stage']!='notstarted' or $_SESSION['stage']=='notstarted') */  ?>
<?php /* echo 'stage:'.$_SESSION["stage"]; */ ?>
</body>

</html>