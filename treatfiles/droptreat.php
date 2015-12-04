<?php 
if(isSet($_POST['dropt']))
{
    
	$errdt = array();
	$modifythistreat1 = mysql_real_escape_string($_POST['treatd']);	
	$treatd= $modifythistreat1;
	$modifythistreat1 = mysql_fetch_assoc(mysql_query("SELECT treat FROM treatments WHERE treat=$modifythistreat1 "));

	$modifythistreat2 = mysql_real_escape_string($_POST['treatm']);	
	$treatm= $modifythistreat2;
	$modifythistreat2 = mysql_fetch_assoc(mysql_query("SELECT treat FROM treatments WHERE treat=$modifythistreat2 "));
	
	$confirm = mysql_real_escape_string($_POST['confirm']);	
	
	if(!$modifythistreat1){
	$errdt[]='* Invalid entry for delete!';		
	}
	if(!$modifythistreat2){
	$errdt[]='* Invalid entry for move!';		
	}
	if($confirm!=confirm){
	$errdt[]='* Please confirm!';		
	}
	 if (ctype_digit($treatd) and ctype_digit($treatm) ){ 
	 } else{
		
	$errdt[]='* Invalid format!';	
	}	
	if(!count($errdt))
	{ 	
		if ($_POST['deletefinished']){}else{
		$querymove="UPDATE tut_users SET treat=$treatm WHERE treat=$treatd ";
		$resultmove = mysql_query($querymove) or die(mysql_error());

		
		$querymove2="UPDATE results SET treat=$treatm WHERE treat=$treatd ";
		$resultmove2 = mysql_query($querymove2) or die(mysql_error());
		
		$querydt= "DELETE FROM treatments WHERE treat=$treatd"; 
		$resultdt = mysql_query($querydt) or die(mysql_error());
		} /* else ($_POST['deletefinished'])*/
		
		
		
		if ($_POST['deletefinished'] ==1){
		 $querydresults= "DELETE FROM results WHERE treat=$treatd"; 
		$resultdresults = mysql_query($querydresults) or die(mysql_error());	
		
		$querymove3="UPDATE tut_users SET finished0=0, finished1=0, finished2=0, treat=$treatm, firstemail=0, stage1email=0, stage2email=0 WHERE treat=$treatd ";
		$resultmove3 = mysql_query($querymove3) or die(mysql_error());
		
		$querydt= "DELETE FROM treatments WHERE treat=$treatd"; 
		$resultdt = mysql_query($querydt) or die(mysql_error());
		} /* if ($_POST['deletefinished'] ==1) */
		
		$_SESSION['successdt']='Successfully deleted.';		
	}	

 if(count($errdt))
	{
		$_SESSION['errdt'] = implode('<br />',$errdt);
	}
	header("Location: treatments.php?dropt");
	exit;
}/* if(isSet($_POST['dropt'])) */
	?>
<form id="login" method="post" action=""> 

    <h1>Delete a treatment</h1>
<?php
						if($_SESSION['errdt'])
						{
							echo '<div class="err">'.$_SESSION['errdt'].'</div>';
							unset($_SESSION['errdt']);
						}
						
						if($_SESSION['successdt'])
						{
							echo '<div class="success">'.$_SESSION['successdt'].'</div>';
							unset($_SESSION['successdt']);
						}
					?>
   
   <div class="field">
    	Warning: Confirmation is required ! 
    </div>	
    
        <div class="field">
    	<label for="subjidr" >Delete treatment:</label> 
    	<input type="text" name="treatd"  title="Please provide a valid treatment id." />
    </div>
    <div class="field">
    	<label for="subjidr" >Move subjects to:</label> 
    	<input type="text" name="treatm"  title="Please provide a valid treatment id." />
    </div>		         			
    <div class="field">
    	<label for="subjidr" >Write confirm:</label> 
    	<input type="text" name="confirm"  title="Are you sure?" />
    </div>		         			
    <div class="field">
     <p class="tiny"><input type="checkbox" name="deletefinished" id=" deletefinished" value="1" /> Subjects should start from the beginning.
		</p>
	</div>	
    <div class="submit">
     <input type="submit" id="submit" name="dropt" value="Delete and Move" />
               
    </div>
    
</form>
	