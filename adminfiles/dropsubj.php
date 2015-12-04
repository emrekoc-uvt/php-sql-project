<?php
if(isSet($_POST['dropsubj'] )  )
{
$deletethissubj=$_POST['subjidr'] ;
$confirm=$_POST['confirm'] ;
$deletethissubj = mysql_real_escape_string($deletethissubj);	
$deleterow = mysql_fetch_assoc(mysql_query("SELECT id FROM tut_users WHERE id='$deletethissubj' AND admin<>1"));
	$errdr = array();
	
	if(!$deleterow){
	$errdr[]=' * Id does not exist.';

	} /* if(!$deleterow) */

	if(!$confirm){
	$errdr[]=' * Please confirm.';
	} /* if(!confirm) */
	
		if(!count($errdr))
	{
		mysql_query("DELETE FROM tut_users WHERE id='".$deletethissubj."' AND admin<>1");
		mysql_query("DELETE FROM results WHERE id='".$deletethissubj."' ");
		
$_SESSION['successdr']='Successfully deleted';		
unset($deletethissubj);
unset($deleterow);
unset($confirm);	
	}	

 if(count($errdr))
	{
		$_SESSION['errdr'] = implode('<br />',$errdr);
	}
	header("Location: admin.php?drop");
	exit;
} /* if(isSet($_POST['dropsubj'] )  ) */	?>

<form id="login" method="post" action=""> 

    <h1>Delete a subject</h1>
<?php
						
						if($_SESSION['errdr'])
						{
							echo '<div class="err">'.$_SESSION['errdr'].'</div>';
							unset($_SESSION['errdr']);
						}
						
						if($_SESSION['successdr'])
						{
							echo '<div class="success">'.$_SESSION['successdr'].'</div>';
							unset($_SESSION['successdr']);
						}
					?>
   
   <div class="field">
     Confirmation is required ! 
    </div>	
    
        <div class="field">
    	<label for="subjidr" >Subject id</label> 
    	<input type="text" name="subjidr"  title="Enter the id of the subject" />
    </div>		   
    
        <div class="field">      			
    <p class="tiny">Confirm  <input type="checkbox" name="confirm" value="1" />  </p>
    </div>
    
    <div class="submit">
     <input type="submit" id="submit" name="dropsubj" value="Delete" />
               
    </div>
    
</form>