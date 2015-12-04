<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Error  | Uvt Experiment </title>
	<meta name="description" content="Login for the economic experiment" />
    <meta name="keywords" content="economic, experiment "/>
<?php require 'css/header.php';?>
</head>
<body>

<?php require 'include/connect.php';
session_start();
error_reporting(0);
?>


			<div class="member">
            
            <h1>Error</h1>
            
          <p class= "big">This page cannot be displayed. Please contact the website administrator. <img src="img/948083.gif"></p>
        <p class= "big"> You can go back to the main page by clicking <a href="login.php">this</a>.</p>
  			 
  			
  			
           
     <?php if($_SESSION['id']){ ?>   		 <br><p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
  	      <?php } ?>          
  
  
            
           <?php  if($_SESSION['username']) {?> <br /> You can logout <a href="login.php?logoff">here</a>.<?php } ?>
           
           </div>
<?php /* echo 'stage:'.$_SESSION["stage"]."<br>";  
echo 'current date:'.$_SESSION['currentdate']."<br>";
echo 'intv1start:'.$_SESSION['intv1start']."<br>";
echo 'intv1end:'.$_SESSION['intv1end']."<br>";
echo 'intv2start:'.$_SESSION['intv2start']."<br>";
echo 'intv2end:'.$_SESSION['intv2end']."<br>";
echo 'id:'.$_SESSION['id']."<br>";
echo 'finishedt:'.$_SESSION['finishedt']."<br>";
echo 'finished0:'.$_SESSION['finished0']."<br>";
echo 'finished1:'.$_SESSION['finished1']."<br>";
*/
?>           
</body>
</html>