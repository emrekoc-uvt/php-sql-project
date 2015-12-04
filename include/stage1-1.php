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


<?php if($_SESSION['id'] ){ ?>
<script type="text/javascript">
function display_c(start){
window.start = parseFloat(start);
var end = 0 // change this to stop the counter at a higher value
var refresh=1000; // Refresh rate in milli seconds
if(window.start >= end ){
mytime=setTimeout('display_ct()',refresh)
}
else { if(<?php echo $_SESSION['finished1'];?>==0){alert("Time Over ");}}

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
<?php /* require 'include/timerscript.php'; */ ?>

</head>
<?php require 'include/checkfinished.php';?>

<?php if($_SESSION['stage']=='1') {?>
<?php require 'include/timer3.php'; ?>

<body onload=display_c(<?php echo $remainingtimer3 ;?>);>
 
<?php if($_SESSION['finished1']==1) {?>

              <div class="member">
            <h1>Welcome <?php echo $_SESSION['username'];?>.</h1>
            
            <p class="big">You have finished the first stage of the experiment. </p>
  			 <br>
  			 <p class="big">You will receive a reminder e-mail before the second stage. Please be aware that the e-mail may end up in your spam mail folder. Please do not forget to come back for the second stage. </p>
  			 <br>
  			 <p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
			
           <br />
            You can logout <a href="login.php?logoff">here</a>.                </div>
<?php } /* if($_SESSION['finished1']==1) */  ?> 
           
<?php if($_SESSION['finished1']==0 and $_SESSION['finished0']==1 ) {?>
 
 
 
 
 
 
 
 			<?php 
 
  			
  	/* */
  	if(isSet($_POST['submitstage1'])){

	$errs1 = array();

	$read=  mysql_real_escape_string($_POST['read']) ;
	$stage1decision=  mysql_real_escape_string($_POST['stage1decision']) ;
	$_SESSION['stage1decision']=$stage1decision;

	if(!$read)
	{
		$errs1[]='* Please read the statement and check the box!';
	} /* if(!$read)*/
	
if(!$stage1decision){
$errs1[]='* Please choose one of the alternatives!';
	} /* if(!$stage1decision) */
	
  	require 'include/timer3.php';
		      if($remainingtimer3<=0){
    $errs1[]='* You are out of time!';
    $_SESSION['outoftime3']=1;
		      }
		      
	if(!count($errs1))
	{
		 
$id=$_SESSION['id'];					
	$query = "UPDATE results SET updatetime4=NOW() , ip4='".$_SERVER['REMOTE_ADDR']."'  , stage1decision='".$stage1decision."', stage2decision='', payment='' WHERE id='".$id."' " ;
		mysql_query($query) or die(mysql_error());
		unset($query);

	$query2="UPDATE tut_users SET updatetime1=NOW() , ip='".$_SERVER['REMOTE_ADDR']."'  ,finished1=1 WHERE id='$id' ";			
mysql_query($query2) or die(mysql_error());
unset($query2);	
$finished1=1;
$_SESSION['finished1']=1;

		$_SESSION['successs1']='Successfully sent';		
	require 'include/payment/paystage1.php'; 
	}	

 if(count($errs1))
	{
		$_SESSION['errs1'] = implode('<br />',$errs1);
	}
	header("Location: subject.php#mistake3");
	
	exit;
  				
  			} /* if(isset($_POST['submitstage1'])) */
  			?>

             
<?php require 'include/timer3.php';?>
<?php if($_SESSION['remainingtimer3']>0){ ?>
			  <A NAME="instructions"></A>
			
			<div class="member">
            <h1>Part 3</h1>
			
			
			<?php require 'include/timer3.php';?>
			
			
			 <p class="big">You have completed part 2 and you are now in part 3 of the experiment. You have 	<span id='ct' class="datetime"></span> to complete this part. If you do not submit your response before the time runs out, you will be excluded from payments and you cannot participate in the future stages of the experiment.</p>
					<br>
			 <p class="big">Note that once you submit your choices, you cannot go back and change them.</p>
			<br>
			<p class="big"> Please read the following statement and make a choice.</p>
			<br>
			<p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
	
          <br>
          You can log out <a href="login.php?logoff">here</a>. 
            </div>
  
  <?php require 'include/sophistication/sophistication.php';?>
        

          
<?php } /* if($_SESSION['remainingtimer3']>0)*/ ?>

<?php if($_SESSION['remainingtimer3']==0){ ?>
<?php require 'include/timeover.php';
unset($_SESSION['errs1']);
unset($_SESSION['successs1']);
?>
<?php } /* if($_SESSION['remainingtimer3']==0)*/  ?> 
   
            
            
            <?php } /* if($_SESSION['finished1']==0) & if($_SESSION['finished0']==1) */  ?> 

<?php if($_SESSION['finished1']==0 and $_SESSION['finished0']==0){   ?> 
<div class="member">
            <h1>Welcome <?php if($_SESSION['id']){ echo $_SESSION['username'];} else{ echo 'guest';} ?>. </h1>
            
            <p class="big">Since you have not finished the previous stage in time, your experiment is over. You are also excluded from future stages. </p>
  			 <br><p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
	
           <br />
        <?php if($_SESSION['id']){ ?>   You can logout <a href="login.php?logoff">here</a>.      <?php } ?>          
        <?php if(!$_SESSION['id']) { ?>   You can login <a href="login.php">here</a>.  <?php } ?> 
            </div>

<?php } /* if($_SESSION['finished1']==0) & if($_SESSION['finished0']==0) */ ?>


<?php } /* if($_SESSION['stage']=='1')  */ ?>

<?php if($_SESSION['stage']!='1') {?>
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
 
<?php } /*  if($_SESSION['stage']!='1') */  ?>

</body>           

</html>