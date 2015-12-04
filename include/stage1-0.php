<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject Page</title>

<?php require 'css/header.php';?>

<?php
error_reporting(0);
require 'include/connect.php';
session_start(); ?>	
<?php require "include/checkfinished.php"?>
<?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>
<?php if($_SESSION['id'] ){ ?>

<?php require 'include/checkfinished.php'; ?>

<?php if ($_SESSION['finishedt']==0){?>
<script type="text/javascript">
function display_c(start){
window.start = parseFloat(start);
var end = 0 // change this to stop the counter at a higher value
var refresh=1000; // Refresh rate in milli seconds
if(window.start >= end ){
mytime=setTimeout('display_ct()',refresh)
}
else { if(<?php echo $_SESSION['finishedt'];?>==0 ){alert("Time Over ");}}

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
<?php } /* finishedt=0*/?>

<?php if ($_SESSION['finishedt']==1){?>
<script type="text/javascript">
function display_c(start){
window.start = parseFloat(start);
var end = 0 // change this to stop the counter at a higher value
var refresh=1000; // Refresh rate in milli seconds
if(window.start >= end ){
mytime=setTimeout('display_ct()',refresh)
}
else { if(<?php echo $_SESSION['finished0'];?>==0 ){alert("Time Over ");}}

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
<?php } /* finishedt=1*/?>

</head>
<?php if ($_SESSION['stage']==1){?>


<?php if($_SESSION['finishedt']==0){require 'include/timer1.php';} if($_SESSION['finishedt']==1){require 'include/timer2.php';}?>

<body onload=display_c(<?php if($_SESSION['finishedt']==0){echo $remainingtimer1 ;} else{echo $remainingtimer2 ;}?>); >

 
<?php if($_SESSION['finished0']==1) {?>
              <div class="member">
            <h1>Welcome <?php echo $_SESSION['username'];?>.</h1>
            
         
  			<p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
	
           <br />
            You can logout <a href="login.php?logoff">here</a>.            
            </div>
<?php } /* if($_SESSION['finished0']==1) */  ?> 

<?php if($_SESSION['finished0']==0 and $_SESSION['finishedt']==0) {?>
<?php require 'include/timer1.php';?>

<?php if($_SESSION['remainingtimer1']>0){ ?>


<div class="member">
<h1>Part 1</h1>
					
<p class="big">You have <span id='ct' class="datetime"></span> to complete this part. If you do not submit your response before the time runs out, you will be excluded from payments and you cannot participate in the future stages of the experiment.</p>
<br>
<p class="big">Note that once you submit your choices you cannot go back and change them.</p>
<br>
<p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
<br />
You can logout <a href="login.php?logoff">here</a>.            
</div>

<?php require 'include/timepref/timepref.php';?>

<?php } /* if($_SESSION['remainingtimer1']>0)*/ ?>

<?php if($_SESSION['remainingtimer1']==0){ ?>
<?php require 'include/timeover.php';
unset($_SESSION['errs0']);
unset($_SESSION['successs0']);?>
<?php } /* if($_SESSION['remainingtimer1']<=0)*/  ?>

<?php } /* if($_SESSION['finished0']==0 and $_SESSION['finishedt']=0) */  ?> 

<?php if($_SESSION['finished0']==0 and $_SESSION['finishedt']==1) {  ?> 
<?php require 'include/timer2.php';?>

<?php if($_SESSION['remainingtimer2']>0){ ?>

<?php require 'include/cognitive/cognitiveanswercounter.php'; 	
$thisvariable= $variables[$numanswers]	;
$firstletters = substr($thisvariable, 0, 7); ?>			 

 <A NAME="instructions"></A>

<div class="member">
            <h1>Part 2</h1>
					
<p class="big">You have completed part 1 and you are now in part 2 of the experiment. You have <span id='ct' class="datetime"></span> to complete this part. If you do not submit your response before the time runs out, you will be excluded from payments and you cannot participate in the future stages of the experiment.  </p>
<br>
<p class="big">
<?php if($firstletters==='choicec'){?> 
Please try to give the right answer to the following questions. All fields should be filled in.</p> 
<br> <p class="big"> Please make a guess even if you cannot find the exact answer to the following questions. You can use pen and paper for calculations.
<?php } /* $firstletters==='choicec' */?>
Note that once you submit your answers you cannot go back and change them.</p>
<p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>	
<br />
You can logout <a href="login.php?logoff">here</a>.            	
</div>
 

<?php require 'include/cognitive/cognitive.php';?>


<?php } /* if($_SESSION['remainingtimer2']>0)*/ ?>


<?php if($_SESSION['remainingtimer2']==0){ ?>
<?php require 'include/timeover.php';
unset($_SESSION['errs0c']);
unset($_SESSION['successs0c']);
?>
<?php } /* if($_SESSION['remainingtimer2']==0)*/  ?>


<?php } /* if($_SESSION['finished0']==0 and $_SESSION['finishedt']==1) */  ?> 

<?php } /* if($_SESSION['stage']=='1') */  ?> 

<?php } /* if($_SESSION['id'] */ ?>
</body>
</html>
