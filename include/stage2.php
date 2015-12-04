<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject Page</title>
<?php require 'css/header.php';?>	
<?php
error_reporting(0);
require 'include/connect.php';
session_start(); ?>	
<?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>
<?php require 'include/checkfinished.php';?>
<?php if($_SESSION['id'] ){ ?>
<script type="text/javascript">
function display_c(start){
window.start = parseFloat(start);
var end = 0 // change this to stop the counter at a higher value
var refresh=1000; // Refresh rate in milli seconds
if(window.start >= end ){
mytime=setTimeout('display_ct()',refresh)
}
else { if(<?php echo $_SESSION['finished2'];?>==0){alert("Time Over");}}
}

function display_ct() {
// Calculate the number of days left
var days=Math.floor(window.start / 86400);
// After deducting the days calculate the number of hours left
var hours = Math.floor((window.start - (days * 86400 ))/3600)
// After days and hours , how many minutes are left
var minutes = Math.floor((window.start - (days * 86400 ) - (hours *3600 ))/60)
// Finally how many seconds left after removing days, hours and minutes.
var secs = Math.floor((window.start - (days * 86400 ) - (hours *3600 ) - (minutes*60)))

var x =  hours + " Hours " + minutes + " Minutes and " + secs + " Seconds " ;


document.getElementById('ct').innerHTML = x;
window.start= window.start- 1;

tt=display_c(window.start);
}
</script>
<?php } /* if($_SESSION['id'] & */ ?>
<?php /* require 'include/timerscript.php';*/ ?>
</head>
<?php 
require 'include/checkfinished.php';
?>
<?php if($_SESSION['stage']=='2'){ ?>
<?php require 'include/timer4.php'; ?>
<body onload=display_c(<?php echo $remainingtimer4 ;?>);>


<?php if ($_SESSION['finished2']!=1){?>
		<?php if($_SESSION['finished1']=='0'){ ?>
<div class="member">
            <h1>Welcome <?php if($_SESSION['id']){ echo $_SESSION['username'];} else{ echo 'guest';} ?>. </h1>
            
            <p class="big">You have not completed stage 1. Hence, you cannot move on to stage 2.</p>
  			 <br> <p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
			
           <br />
       <?php if($_SESSION['id']){ ?>   You can logout <a href="login.php?logoff">here</a>.      <?php } ?>          
        <?php if(!$_SESSION['id']) { ?>   You can login <a href="login.php">here</a>.  <?php } ?> 
            </div>


		<?php } /* if($_SESSION['finished1']=='0') */ ?>	
		
		<?php if($_SESSION['finished1']=='1'){ ?>	
		            	
	<?php require 'include/timer4.php';?>
	<?php if($_SESSION['remainingtimer4']>0) {?>
			
	<div class="member">
            
    <h1>Welcome <?php if($_SESSION['id']){ echo $_SESSION['username'];} else{ echo 'guest';} ?>. </h1>       
    <p class="big">You have 			
    <span id='ct' class="datetime"></span>            			       
    <span id='ct' class="datetime"></span>
    to complete and submit this form. If you do not submit your response before the time runs out, you will be excluded from payments. </p>
    <br><p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
			
    <br><p class="big">Please make a choice below.</p>
           <br /> <center>
        <?php if($_SESSION['id']){ ?>   You can logout <a href="login.php?logoff">here</a>.      <?php } ?>          
           </center></div>			   
<?php require 'include/stage2/stage2main.php';?>		
		<?php } /* if($_SESSION['finished1']=='1') */ ?>
<?php } /* if($_SESSION['remainingtimer4']>0) { */?>

<?php if($_SESSION['remainingtimer4']==0){ ?>
<?php require 'include/timeover.php';
unset($_SESSION['errs2']);
unset($_SESSION['successs2']);?>
<?php } /* if($_SESSION['remainingtimer4']==0)*/  ?> 

<?php } /* if($_SESSION['stage']=='2' */ ?>

<?php if($_SESSION['stage']!='2'){ ?>
			<div class="member">
            <h1>Welcome <?php if($_SESSION['id']){ echo $_SESSION['username'];} else{ echo 'guest';} ?>. </h1>
            
            <p class="big">You are not authorized to view this page. </p>
  			 
  			 <?php if($_SESSION['id']){?>
  			<br> <p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
  			 <?php } /* if($_SESSION['id'])*/ ?>
           <br />
         <?php if($_SESSION['id']){ ?>   You can logout <a href="login.php?logoff">here</a>.      <?php } ?>          
        <?php if(!$_SESSION['id']) { ?>   You can login <a href="login.php">here</a>.  <?php } ?> 
             </div>
            
<?php } /* if ($_SESSION['finished2']!=1)*/ ?>

<?php if ($_SESSION['finished2']==1){ ?>
<?php unset($_SESSION['successs2']);?>
<div class="member">
            <h1>Welcome <?php echo $_SESSION['username'];?>.</h1>
           
            <p class="big">You have finished the second stage of the experiment. Thank you for your participation.</p>
            <br><p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
  			
  			
           <br />
     <?php if($_SESSION['id']){ ?>   You can logout <a href="login.php?logoff">here</a>.      <?php } ?>          
            </div>

<?php } /* if ($_SESSION['finished2']==1)*/ ?>


<?php } /* if($_SESSION['stage']=='2' */ ?>

<?php if($_SESSION['stage']!='2') {?>

 <div class="member">
            <h1>Welcome <?php if($_SESSION['id']){ echo $_SESSION['username'];} else{ echo 'guest';} ?>. </h1>
            
            <p class="big">You are not authorized to view this page. </p>
  			 		 <?php if($_SESSION['id']){?>
  			 <br><p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
			<?php } /* if($_SESSION['id'])*/ ?>
           <br />
        <?php if($_SESSION['id']){ ?>   You can logout <a href="login.php?logoff">here</a>.      <?php } ?>          
        <?php if(!$_SESSION['id']) { ?>   You can login <a href="login.php">here</a>.  <?php } ?> 
            </div>
            
<?php } /*  if($_SESSION['stage']!='2') */  ?>


</body>

</html>