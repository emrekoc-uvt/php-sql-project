<?php 
	/* add smoke consume and internet and change the error and success variables*/
	if($_POST['submitc'] ){
		
	$choice=  mysql_real_escape_string($_POST['choice']);	
	
	$errc = array();
			
	if (!isset($choice) ){
	$errc[]='* Please answer all questions!';
	}
	
		
	require 'include/timer2.php';
	if($remainingtimer2<=0){
    $errc[]='* You are out of time!';
    $_SESSION['outoftime2']=1;
	}
		      
		$id=$_SESSION['id']; 
		$rowid="SELECT id FROM results WHERE id='$id' "; 
		$resultid = mysql_query($rowid) or die (mysql_error());
		$rowidlist = mysql_fetch_row($resultid);

		
	$treatment=$_SESSION['treatment'];					

	$thisvariable= $variables[$numanswers]	;
	
	/* echo "thisvariable : ".$thisvariable; */
	
	if($thisvariable==='choicec1q' or $thisvariable==='choicec2q' or $thisvariable==='choicec3q' or $thisvariable==='choicec4q' or $thisvariable==='consume' or $thisvariable==='internet' or $thisvariable==='exercisehours'){

	if(!is_numeric($choice)){
	$errc[]='* Invalid answer!';
	} /* !is_numeric($choice) */

	if(is_numeric($choice) and $choice<0){
	$errc[]='* Invalid answer!';
	} /* is_numeric($choice) */
	
	
	}/* 	if($thisvariable==='choicec1q' or $thisvariable==='choicec2q' or $thisvariable==='choicec3q' or $thisvariable==='choicec4q' or $thisvariable==='consume' or $thisvariable==='internet') */

	if($thisvariable==='exercisehours'and is_numeric($choice) and $choice>140){
	$errc[]='* Invalid answer!';
	} /* ($thisvariable==='exercisehours'>140 and is_numeric(choice)) */
	
	if(($thisvariable==='consume' or $thisvariable==='exercisehours') and $choice<=0 and is_numeric($choice)){ 	
		$errc[]='* Invalid answer!'; 
	} /* if($thisvariable==='consume' and $choice<=0 and is_numeric($choice)) */

		if($thisvariable==='internet' and is_numeric($choice) and $choice>7){ 	
		$errc[]='* Invalid answer!'; 
	} /* if($thisvariable==='consume' and $choice<=0 and is_numeric($choice)) */
	
	if (isset($choice) and $choice==='0'){
	$choice='zero'	;
	}
	
	if(!count($errc)){
	
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
			
		if($thisvariable==='exercise' and $choice==='No'){
		$query = "UPDATE results SET exercisehours='Not applicable' , updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' 
		WHERE id=$id" ;
		mysql_query($query) or die(mysql_error());
		unset($query);
		} /* ($thisvariable==='exercise' and $choice==='No') */
				
		
		
  		if($thisvariable==='smoke' and $choice==='Yes'){
		$query = "UPDATE results SET pastsmoke='Not applicable' , updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' 
		WHERE id=$id" ;
		mysql_query($query) or die(mysql_error());
		unset($query);
		} /* ($thisvariable==='smoke' and $choice==='Yes') */

		
		if($thisvariable==='pastsmoke'){
		
		$row14="SELECT smoke FROM results WHERE id=$id "; 
		$result14 = mysql_query($row14) or die (mysql_error());
		$row14 = mysql_fetch_assoc($result14);
			if($row14['smoke']==='No'){
			$query = "UPDATE results SET trystopsmoke='Not applicable' , updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' 
			WHERE id=$id" ;
			mysql_query($query) or die(mysql_error());
			unset($query);
			} /* ($row14['smoke']==='No') */
		} /* ($thisvariable==='pastsmoke'  */
		
		$_SESSION['successc']='Successfully submitted';
		
		
		unset($_SESSION['errc']);
		
require 'include/cognitive/cognitiveanswercounter.php';
		
	if($numanswers>=$noquestions and $noquestions>0){
		$queryu = "UPDATE tut_users SET finished0=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id" ;
		mysql_query($queryu) or die(mysql_error());
		unset($queryu);
			header( 'Location: include/subjectredirect.php?instructions');	
			exit;				
		} /* if($numanswers>=$noquestions) */
	
	} /* if(!count($errc)){*/
	
 if(count($errc))
	{
		$_SESSION['errc'] = implode('<br />',$errc);
		header( 'Location: include/subjectredirect.php?mistake');
	}
		header( 'Location: include/subjectredirect.php?mistake');
	exit;
	
	} /* if($_POST['submitc']) */ ?>