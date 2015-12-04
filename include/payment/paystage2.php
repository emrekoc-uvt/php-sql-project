<?php require 'include/stage2/stage2answercounter.php';?>
<?php 	$thisvariable= $variables[$numanswers]	; ?>
<?php if(isset($_SESSION['id']) and $_SESSION['stage']==2 and $thisvariable==='stage2decision'){?>

<?php 
$id=$_SESSION['id'];
$row14=mysql_fetch_assoc(mysql_query("SELECT bank FROM tut_users WHERE id='$id' "));		
$banknum=$row14['bank'];  
unset($row14); 
?>
<?php $paymentstatus="not completed";
	$playrow=0;
?>
<?php 
if($_SESSION['typeq']==='both' or (($_SESSION['typeq']==='onlylate' or $_SESSION['typeq']==='onlyearly') and ($_SESSION['decision']==='option1') ) ){
	
if($_SESSION['choice']==='option1'){

	$paymentamount=$_SESSION['soonpay'];
	$paymenttime=$_SESSION['soontime'];
		
	$queryc = "INSERT INTO payments(id, playrow, updatetime5, ip5, 
	paymentamount, paymenttime, paymentstatus, dayssince, banknum) 
	
	VALUES( '".$id."', '".$playrow."', NOW(), '".$_SERVER['REMOTE_ADDR']."', 
	'".$paymentamount."', '".$paymenttime."', '".$paymentstatus."', 0 , '".$banknum."' )" ;
	mysql_query($queryc) or die(mysql_error());
	unset($queryc);
				
} /* if($_SESSION['choice']==='option1') */
elseif($_SESSION['choice']==='option2'){
	
	$paymentamount=$_SESSION['laterpay'];
	$paymenttime=$_SESSION['latertime'];

	$queryc = "INSERT INTO payments(id, playrow, updatetime5, ip5, 
	paymentamount, paymenttime, paymentstatus, dayssince, banknum) 
	
	VALUES( '".$id."', '".$playrow."', NOW(), '".$_SERVER['REMOTE_ADDR']."', 
	'".$paymentamount."', '".$paymenttime."', '".$paymentstatus."', 0 , '".$banknum."' )" ;
	mysql_query($queryc) or die(mysql_error());
	unset($queryc);
	
} /* $_SESSION['choice']=='option2' */
} /* if($_SESSION['typeq']==='both') */



if($_SESSION['typeq']==='onlyearly'){
if($_SESSION['decision']==='option2'){ 

	$paymentamount=$_SESSION['soonpay'];
	$paymenttime=$_SESSION['soontime'];
		
	$queryc = "INSERT INTO payments(id, playrow, updatetime5, ip5, 
	paymentamount, paymenttime, paymentstatus, dayssince, banknum) 
	
	VALUES( '".$id."', '".$playrow."', NOW(), '".$_SERVER['REMOTE_ADDR']."', 
	'".$paymentamount."', '".$paymenttime."', '".$paymentstatus."', 0 , '".$banknum."' )" ;
	mysql_query($queryc) or die(mysql_error());
	unset($queryc);
	
} /* if($decision==='option2') */
} /* if($_SESSION['typeq']==='onlyearly' ) */


if($_SESSION['typeq']==='onlylate'){
if($_SESSION['decision']==='option2'){ 
	
	$paymentamount=$_SESSION['laterpay'];
	$paymenttime=$_SESSION['latertime'];

	$queryc = "INSERT INTO payments(id, playrow, updatetime5, ip5, 
	paymentamount, paymenttime, paymentstatus, dayssince, banknum) 
	
	VALUES( '".$id."', '".$playrow."', NOW(), '".$_SERVER['REMOTE_ADDR']."', 
	'".$paymentamount."', '".$paymenttime."', '".$paymentstatus."', 0 , '".$banknum."' )" ;
	mysql_query($queryc) or die(mysql_error());
	unset($queryc);
	
} /* if($decision==='option2') */
} /* if($_SESSION['typeq']==='onlylate' ) */


unset($_SESSION['decision']);
unset($_SESSION['soonpay']);
unset($_SESSION['laterpay']);
unset($_SESSION['soontime']);
unset($_SESSION['latertime']);
unset($_SESSION['choice']);

?>

<?php } /* if(isset($_SESSION['id']) and $_SESSION['stage']==2) */ ?>