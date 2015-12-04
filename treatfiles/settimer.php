<?php 		
			if($_POST['submittimer']){
	$remainingtimer1=  mysql_real_escape_string($_POST['remainingtimer1']);	
	$remainingtimer2=  mysql_real_escape_string($_POST['remainingtimer2']);	
	$remainingtimer3=  mysql_real_escape_string($_POST['remainingtimer3']);	
	$remainingtimer4=  mysql_real_escape_string($_POST['remainingtimer4']);	
						
	$errstimer = array();

	if($remainingtimer1){	
	if (is_numeric($remainingtimer1) ){ 
		
		if ($remainingtimer1>0) { 
	 } else{ $errstimer[]='* The number should be positive!';	}
		
	 } else{ $errstimer[]='* You should enter a number!';	}
	} /* if($remainingtimer1) */	
	
	if($remainingtimer2){	
	if (is_numeric($remainingtimer2) ){ 
		
		if ($remainingtimer2>0) { 
	 } else{ $errstimer[]='* The number should be positive!';	}
		
		
	 } else{ $errstimer[]='* You should enter a number!';	}
	} /* if($remainingtimer2) */	
	
	if($remainingtimer3){	
	if (is_numeric($remainingtimer3) ){ 
		
		if ($remainingtimer3>0) { 
	 } else{ $errstimer[]='* The number should be positive!';	}
		
	 } else{ $errstimer[]='* You should enter a number!';	}
	} /* if($remainingtimer3) */	
	
	if($remainingtimer4){	
	if (is_numeric($remainingtimer4) ){ 
		
		if ($remainingtimer4>0) { 
	 } else{ $errstimer[]='* The number should be positive!';	}
		
	 } else{ $errstimer[]='* You should enter a number!';	}
	} /* if($remainingtimer4) */	
	
	
			      
	if(!count($errstimer))
	{
	
	if($remainingtimer1){
	$query1 = "UPDATE tut_users SET remainingtimer1='".$remainingtimer1."', modifytime1=NOW()  WHERE lasttimer1 = '1980-01-01 01:00:00' AND remainingtimer1>'0' ";	
	mysql_query($query1) or die(mysql_error());
		unset($query1);	
	
	$query1a = "UPDATE timers SET timer1='".$remainingtimer1."' , updatetime15=NOW() WHERE id15 = '1' ";	
	mysql_query($query1a) or die(mysql_error());
		unset($query1a);
	}	 
	
	if($remainingtimer2){
	$query2 = "UPDATE tut_users SET remainingtimer2='".$remainingtimer2."', modifytime1=NOW() WHERE lasttimer2 = '1980-01-01 01:00:00' AND remainingtimer2>'0' ";	
	mysql_query($query2) or die(mysql_error());
		unset($query2);	

		$query2a = "UPDATE timers SET timer2='".$remainingtimer2."' , updatetime15=NOW() WHERE id15 = '1' ";	
	mysql_query($query2a) or die(mysql_error());
		unset($query2a);
	}
	
	if($remainingtimer3){
	$query3 = "UPDATE tut_users SET remainingtimer3='".$remainingtimer3."', modifytime1=NOW() WHERE lasttimer3 = '1980-01-01 01:00:00' AND remainingtimer3>'0' ";	
	mysql_query($query3) or die(mysql_error());
		unset($query3);

			$query3a = "UPDATE timers SET timer3='".$remainingtimer3."' , updatetime15=NOW() WHERE id15 = '1' ";	
	mysql_query($query3a) or die(mysql_error());
		unset($query3a);
	}
	
	if($remainingtimer4){
	$query4 = "UPDATE tut_users SET remainingtimer4='".$remainingtimer4."', modifytime1=NOW() WHERE lasttimer4 = '1980-01-01 01:00:00' AND remainingtimer4>'0' ";	
	mysql_query($query4) or die(mysql_error());
		unset($query4);	

			$query4a = "UPDATE timers SET timer4='".$remainingtimer4."' , updatetime15=NOW() WHERE id15 = '1' ";	
	mysql_query($query4a) or die(mysql_error());
		unset($query4a);
	}
	
		$_SESSION['successstimer']='Successfully submitted';		
	
	}	

 if(count($errstimer))
	{
		$_SESSION['errstimer'] = implode('<br />',$errstimer);
	}
	header("Location: treatments.php?timer");
	
	exit;
  				
  			
			} /* if($_POST['submittimer']) */ ?>


<form id="login" method="post" action=""> 

<h1>Set the timers</h1>
<?php
						
						if($_SESSION['errstimer'])
						{
							echo '<div class="err">'.$_SESSION['errstimer'].'</div>';
							unset($_SESSION['errstimer']);
						}
						
						if($_SESSION['successstimer'])
						{
							echo '<div class="success">'.$_SESSION['successstimer'].'</div>';
							unset($_SESSION['successstimer']);
					
						}
						
					?> 

       <div class="field">

       <div class="field">
    	<p class="tiny">The timers that have already been initiated will not be reset! </p>
    
    </div>
    
       <div class="field">
    	<p class="tiny">Measured in minutes.</p>
    
    </div>
    
   <div class="field">
    	<label for="remainingtimer1">Stage 0 (time pref.):</label>
    	<input type="text" name="remainingtimer1" id="remainingtimer1"  title="Please provide a number" />
    </div>
   <div class="field">
    	<label for="remainingtimer2">Stage 0 (iq):</label>
    	<input type="text" name="remainingtimer2" id="remainingtimer2"  title="Please provide a number" />
    </div>
   <div class="field">
    	<label for="remainingtimer3">Stage 1:</label>
    	<input type="text" name="remainingtimer3" id="remainingtimer3"  title="Please provide a number" />
    </div>
   <div class="field">
    	<label for="remainingtimer4">Stage 2:</label>
    	<input type="text" name="remainingtimer4" id="remainingtimer4"  title="Please provide a number" />
    </div>
     <div class="submit">
     <input type="submit" id="submit" name="submittimer" value="Reset" />
	 </div>
</div>
</form>