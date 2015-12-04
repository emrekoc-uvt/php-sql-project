<?php 
	/* add smoke consume and internet and change the error and success variables*/
	if($_POST['submits2'] ){
	$choice=  mysql_real_escape_string($_POST['choice']);	
	$errs2 = array();
	$otherchoice=mysql_real_escape_string($_POST['otherchoice']);		
	if(!$choice){
	$errs2[]='* Please answer all questions!';
	} /* (!$choice) */

	if($choice==='Other'){
	$choice=$otherchoice;	
	if( !is_numeric($choice) and strlen($choice)<=3 ){
	$errs2[]='* Invalid answer! ';	
	} /* !is_numeric($choice) and strlen($choice)<=3 */
	if(!preg_match("/^[A-Za-z0-9\s]*$/", $choice)){
	$errs2[]='* Special characters such as *,/,- cannot be used! ';	
	} /* !preg_match("/^[A-Za-z0-9]*$/", $choice) */
	
	if(!$choice){
	$errs2[]='* Please specify your answer!';
	} /* (!$choice) */	
	} /* ($choice==='Other') */
	
	require 'include/timer4.php';
	if($remainingtimer4<=0){
    $errs2[]='* You are out of time!';
    $_SESSION['outoftime4']=1;
	} /* ($remainingtimer4<=0) */
		      
	$treatment=$_SESSION['treatment'];					
	$thisvariable= $variables[$numanswers]	;
	
	/* echo "thisvariable : ".$thisvariable; */
	
	if ($thisvariable==='byear' or $thisvariable==='estimateinterest' or $thisvariable==='height' or $thisvariable==='weight'){
	if(!is_numeric($choice)){
	$errs2[]='* Invalid answer!';		
	} /* (!is_numeric($choice)) */
	} /* ($thisvariable==='byear' or $thisvariable==='estimateinterest') */
	
	if($thisvariable==='height' and is_numeric($choice)){
	if($choice>290 or $choice<50){
	$errs2[]='* Invalid answer!';
	} /* choice limits*/	
	} /* if($thisvariable==='height' and is_numeric($choice))*/
	
	if($thisvariable==='weight' and is_numeric($choice)){
	if($choice>290 or $choice<30){
	$errs2[]='* Invalid answer!';
	} /* choice limits*/	
	} /* if($thisvariable==='weight' and is_numeric($choice))*/
	
	if ($thisvariable==='byear' and is_numeric($choice)){
	if($choice>2012 or $choice<1900){
	$errs2[]='* Invalid answer!';
	} /*if($choice>2012 or $choice<1900) */			
	} /* ($thisvariable==='byear') */
	
	if($thisvariable==='nationality' and ( !preg_match("/^[A-Za-z0-9\s]*$/", $choice) or strlen($choice)<=3)){
	$errs2[]='* Invalid answer!';	
	} /* ($thisvariable==='nationality') */
	
	if (isset($choice) and $choice===0){
	$choice='zero'	;
	}
	
	if(!count($errs2)){

		if($thisvariable==='stage2decision'){
		$_SESSION['choice']=$choice;	
		require 'include/payment/paystage2.php';		
		} /* ($thisvariable==='stage2decision') */
	
		$query = "UPDATE results SET $thisvariable='".$choice."' , updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' 
		WHERE id=$id" ;
		mysql_query($query) or die(mysql_error());
		unset($query);

		if($thisvariable==='useinterest' and $choice==='No'){
		$query = "UPDATE results SET estimateinterest='Not applicable' , updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' 
		WHERE id=$id" ;
		mysql_query($query) or die(mysql_error());
		unset($query);
		} /* ($thisvariable==='useinterest' and $choice==='Yes') */
	
		$_SESSION['successs2']='Successfully submitted';	
		unset($_SESSION['errs2']);
		
require 'include/stage2/stage2answercounter.php';
		

if($numanswers>=$noquestions){

		$queryu = "UPDATE tut_users SET finished2=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id" ;
		mysql_query($queryu) or die(mysql_error());
		unset($queryu);
			header( 'Location: include/subjectredirect.php');		
		} /* if($numanswers>=$noquestions) */
	
	} /* if(!count($errs2)){*/
	
 if(count($errs2))
	{
 $_SESSION['errs2'] = implode('<br />',$errs2);
	}
 header( 'Location: include/subjectredirect.php?mistake');		
	
	exit;
  			
			} /* if($_POST['submits2']) */ ?>