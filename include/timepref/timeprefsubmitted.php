<?php if($_POST['submitins']){ 
unset($_SESSION['submitexample']);	
}?>

<?php 		
			
if($_POST['submitexample']){
	$errs0 = array();
	
	$read=  mysql_real_escape_string($_POST['read']) ;

	if(!$read)
	{
		$errs0[]='* Please read the statement and check the box!';
	} /* if(!$read)*/
	
	require 'include/timer1.php';
	if($remainingtimer1<=0){
    $errs0[]='* You are out of time!';
    $_SESSION['outoftime1']=1;
	}
	
	if(!count($errs0))
	{	$_SESSION['successs0']='Successfully submitted';
		unset($_SESSION['errs0']);
	$_SESSION['submitexample']=1;	
	header( 'Location: include/subjectredirect.php');		
	
	}
	
	 if(count($errs0))
	{
		$_SESSION['errs0'] = implode('<br />',$errs0);
		header( 'Location: include/subjectredirect.php?mistake');				
	}
		
	exit;
	} /* if($_POST['submitexample']){ */


if($_SESSION['submitexample']==1){	
if($_POST['submitt'] ){
	$choice=  mysql_real_escape_string($_POST['choice']);	
	$errs0 = array();
			
	if (!$choice){
	$errs0[]='* Please answer all questions!';
	}

	require 'include/timer1.php';
	if($remainingtimer1<=0){
    $errs0[]='* You are out of time!';
    $_SESSION['outoftime1']=1;
	}
		      
	if(!count($errs0))
	{
		$id=$_SESSION['id']; 
		$rowid="SELECT id FROM results WHERE id=$id "; 
		$resultid = mysql_query($rowid) or die (mysql_error());
		$rowidlist = mysql_fetch_row($resultid);

		
		$treatment=$_SESSION['treatment'];					

	$thisvariable= $variables[$numanswers]	;

			if (!$rowidlist[0]){
	$query = "INSERT INTO results( $thisvariable , updatetime4, ip4, id, treat) 
	VALUES( '".$choice."', NOW(),'".$_SERVER['REMOTE_ADDR']."','".$id."', '".$treatment."')" ;
		mysql_query($query) or die(mysql_error());
		unset($query);
			} /* if (!$rowidlist[0]) */
			
			if ($rowidlist[0]){
	$query = "UPDATE results SET $thisvariable='".$choice."' , updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id" ;
		mysql_query($query) or die(mysql_error());
		unset($query);
			} /* if (!$rowidlist[0]) */
	require 'include/timepref/timeprefanswercounter.php';		
  if($numanswers>=$noquestions){ 
   require 'include/payment/paytimepref.php';
    		}else{ /*  if( numanswers>=$noquestions){ */        
		$_SESSION['successs0']='Successfully submitted';
    	header( 'Location: subjectredirect.php?mistake');		
    		}
		
		unset($_SESSION['errs0']);
		 		
	
	}	

 if(count($errs0))
	{
		$_SESSION['errs0'] = implode('<br />',$errs0);
	}
			header( 'Location: include/subjectredirect.php?mistake');		
			
	exit;
  				
  			
			} /* if($_POST['submitt']) */ 
} /* if($_SESSION['submitexample']==1) */ ?>