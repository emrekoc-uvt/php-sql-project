<?php 		
if($_POST['submitsoph']){
	unset($_SESSION['sopinstructions']);
	unset($_SESSION['sopinstructionsstory']);
}/* if($_POST['submitsoph']) */

if($_POST['submitinstructstory']){
	$erris = array();
	
	$read=  mysql_real_escape_string($_POST['read']) ;
	$choice=  mysql_real_escape_string($_POST['choice']) ;
	
	if(!$read)
	{
		$erris[]='* Please read the story and check the box!';
	} /* if(!$read)*/

		if(!$choice)
	{
		$erris[]='* Please answer the question!';
	} /* if(!$choice)*/
	
	if(!count($erris))
	{	
	$_SESSION['id']=$id;
	$row14="SELECT story FROM results WHERE id=$id "; 
	$result14 = mysql_query($row14) or die (mysql_error());
	$row14 = mysql_fetch_assoc($result14);
	$story=$row14['story'];
		
		if(!$story){
		$query = "UPDATE results SET story='".$choice."', updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' 
	 	WHERE id=$id" ;
		mysql_query($query) or die(mysql_error());
		unset($query);			
		} /* if(!$story) */
		
	$_SESSION['successis']='Successfully submitted';	
	unset($_SESSION['erris']);
	$_SESSION['sopinstructions']=1;	
	unset($_SESSION['sopinstructionsstory']);
	header( 'Location: include/subjectredirect.php');			
	}	
	 if(count($erris))
	{
		$_SESSION['erris'] = implode('<br />',$erris);
		header( 'Location: include/subjectredirect.php?mistake');				
	}
		
	exit;
	
} /* if($_POST['submitinstructstory']) */

if($_POST['submitinstruct']){
	$errs1 = array();
	
	$read=  mysql_real_escape_string($_POST['read']) ;

	if(!$read)
	{
		$errs1[]='* Please read the statement and check the box!';
	} /* if(!$read)*/
	
	require 'include/timer3.php';
	if($remainingtimer3<=0){
    $errs1[]='* You are out of time!';
    $_SESSION['outoftime3']=1;
	}
	
	if(!count($errs1))
	{	$_SESSION['successs1']='Successfully submitted';
		unset($_SESSION['errs1']);
	$_SESSION['sopinstructions']=1;	
	$_SESSION['sopinstructionsstory']=1;
	header( 'Location: include/subjectredirect.php');			
	}
	
	 if(count($errs1))
	{
		$_SESSION['errs1'] = implode('<br />',$errs1);
		header( 'Location: include/subjectredirect.php?mistake');				
	}
		
	exit;
	} /* if($_POST['submitinstruct']){ */

	
	if($_SESSION['sopinstructions']==1){	
if($_POST['submits1'] ){
	$choice=  mysql_real_escape_string($_POST['choice']);	
	$errs1 = array();
			
	if (!$choice){
	$errs1[]='* Please answer all questions!';
	}

	require 'include/timer3.php';
	if($remainingtimer3<=0){
    $errs1[]='* You are out of time!';
    $_SESSION['outoftime3']=1;
	}
		      
	if(!count($errs1))
	{
		$id=$_SESSION['id']; 
		$rowid="SELECT id FROM results WHERE id=$id "; 
		$treatment=$_SESSION['treatment'];					

		$thisvariable= $variables[$numanswers]	;
require 'include/sophistication/sophisticationkycheck.php';
$thisvariabley=$thisvariable.'y';
$thisvariablek=$thisvariable.'k';
$thisvariabler1=$thisvariable.'r1';
$thisvariabler2=$thisvariable.'r2';

$query = "UPDATE results SET $thisvariable='".$choice."' , $thisvariabley='".$y."'  , $thisvariablek='".$k."', $thisvariabler1='".$r1."',   $thisvariabler2='".$r2."', updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id" ;
		mysql_query($query) or die(mysql_error());
		unset($query);
	require 'include/sophistication/sophisticationanswercounter.php';		
  if($numanswers>=$noquestions){ 
    require 'include/sophistication/sophisticationrandomq.php';	
  	$queryu = "UPDATE tut_users SET finished1=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id" ;
		mysql_query($queryu) or die(mysql_error());
		unset($queryu);	  	
  	header( 'Location: subjectredirect.php?mistake');		
  	    		}else{ /*  if( numanswers>=$noquestions){ */        
		$_SESSION['successs1']='Successfully submitted';
    	header( 'Location: subjectredirect.php?mistake');		
    		}
		
		unset($_SESSION['errs1']);
		 		
	
	}	/* if no count*/

 if(count($errs1))
	{
		$_SESSION['errs1'] = implode('<br />',$errs1);
	}
			header( 'Location: include/subjectredirect.php?mistake');		
			
	exit;
  				
  			
			} /* if($_POST['submits1']) */ 
} /* if($_SESSION['submitexample']==1) */ ?>