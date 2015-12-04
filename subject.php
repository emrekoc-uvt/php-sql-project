<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject Page | Uvt Experiment</title>
	<meta name="description" content="Subject Page | Uvt Experiment" />
    <meta name="keywords" content="economic, experiment"/>
	<?php require 'css/header.php';?>
</head>

<body> 

<?php
error_reporting(0);
require 'include/connect.php';
session_start(); ?>	

<?php 		
			$subjectid=$_SESSION['id'];
			$row3=mysql_fetch_assoc(mysql_query("SELECT treat FROM tut_users WHERE id='$subjectid' "));		
  			$treatment=$row3['treat'];  
  			$_SESSION['treatment']= $treatment ;			
  			unset($row3); 
?>
  			
<?php $treatment=$_SESSION['treatment'];
            	$query8="SELECT type FROM treatments WHERE treat=$treatment";
  				$result= mysql_fetch_assoc(mysql_query($query8));  
  				unset($query8);
  				$_SESSION['type']=$result['type'];
?>

<?php 
$row4=mysql_fetch_assoc(mysql_query("SELECT lasttimer1 FROM tut_users WHERE id='$subjectid' "));		
$lasttimer1=$row4['lasttimer1'];   

if($lasttimer1 != "1980-01-01 01:00:00"){
$_SESSION['firsttimer']=0;} else{$_SESSION['firsttimer']=1;}?>

<?php if($_SESSION['schedulevisited']==1){
	$subjectid= $_SESSION['id'];
	$query9= "UPDATE tut_users SET updatetime1=NOW() ,  ip='".$_SERVER['REMOTE_ADDR']."' WHERE id='$subjectid' ";
mysql_query($query9) or die(mysql_error());	
	
}?>

<?php 

if(!isset($_SESSION['firsttimer2']) or $_SESSION['firsttimer2']==0){
$row4=mysql_fetch_assoc(mysql_query("SELECT lasttimer4 FROM tut_users WHERE id='$subjectid' "));		
$lasttimer4=$row4['lasttimer4'];   

if($lasttimer4 == "1980-01-01 01:00:00"){
$_SESSION['firsttimer2']=0;} else{$_SESSION['firsttimer2']=1;}
} /* if(!isset($_SESSION['firsttimer2']) or $_SESSION['firsttimer2']==0) */
?>

<?php 
if($_SESSION['stage']=='notstarted'){require 'include/nochoice.php';}
elseif($_SESSION['stage']=='1' and $_SESSION['firsttimer']==1) { header( 'Location: schedule.php'); }
elseif($_SESSION['stage']=='1' and $_SESSION['firsttimer']==0) {require 'include/stage1.php'; }

elseif($_SESSION['stage']=='2' and ($_SESSION['firsttimer2']==0 or !isset($_SESSION['firsttimer2'])) ) {header( 'Location: schedule.php');}
elseif($_SESSION['stage']=='2' and $_SESSION['firsttimer2']==1 ) {require 'include/stage2.php';}

elseif($_SESSION['stage']=='btw1and2') {require 'include/nochoice.php';}

elseif($_SESSION['stage']=='over') {require 'include/over.php';}
elseif($_SESSION['stage']=='error') {require 'error.php';}
?>

</body>
</html>