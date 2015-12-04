<?php 
	unset($_SESSION['genpass']);
if(isset($_POST['generatepass'])){
	require 'adminfiles/email/generatepass.php';	
	$_SESSION['genpass']=$password;
}/* if(isset($_POST['generatepass'])) */
?>		

		<?php if(isSet($_POST['clear'] )  ){
		 header( 'Location: admin.php?modify');
	unset($_SESSION['genpass']);	 
		}?>	
			
			  <?php 
			if(isSet($_POST['modifysubj'] )  ){	
	unset($_SESSION['genpass']);
	$errm = array();
		$modifytheid=mysql_real_escape_string($_POST['subjid']);
		$emailm = mysql_real_escape_string($_POST['emailm']);
		$usernamem = mysql_real_escape_string($_POST['usernamem']);	
		$firstemail=mysql_real_escape_string($_POST['firstemail']);
		$stage1email=mysql_real_escape_string($_POST['stage1email']);
		$stage2email=mysql_real_escape_string($_POST['stage2email']);
		
		if(!$modifytheid){
	$errm[]='* Invalid entry';	
	}
	
	$modifysubjrow17 = mysql_fetch_assoc(mysql_query("SELECT id FROM tut_users WHERE id='$modifytheid' "));
	if(!$modifysubjrow17){
	$errm[]='* Invalid entry';	
	}
	
	if($_POST['usernamem']){
		
		$subjid=$_POST['subjid'] ;
		$modifythisname=$_POST['usernamem'] ;
		$modifythisname = mysql_real_escape_string($modifythisname);	
		$modifysubjrow1 = mysql_fetch_assoc(mysql_query("SELECT id FROM tut_users WHERE usr='$modifythisname' "));

		if($modifysubjrow1){
		$errm[]='* Invalid entry! ';
	}
		if(strlen($_POST['usernamem'])<4 || strlen($_POST['usernamem'])>32)
	{
		$errm[]='* Username must be between 3 and 32 characters!';
	}
	
	if(!preg_match("/^[A-Za-z0-9]*$/",$_POST['usernamem']))
	{
		$errm[]='* Username contains invalid characters!';
	}
	} /* if(isset($_POST['usernamem'])){ */
if($_POST['treat']){

		$treat=$_POST['treat'] ;
		$treat = mysql_real_escape_string($treat);	
		$treatexists = mysql_fetch_assoc(mysql_query("SELECT treat FROM treatments WHERE treat=$treat "));			
		
		if(!$treatexists)
	{
		$errm[]='* Invalid entry!';
	}
	
	if ( ctype_digit($treat)){}else{
		
		$errm[]='* Invalid entry!';
	}
	} /* if(isset($_POST['treat'])){ */
	
	if($_POST['passm']){

		$pass=$_POST['passm'] ;
		$pass = mysql_real_escape_string($pass);	
		
	if(!preg_match("/^[A-Za-z0-9]*$/",$pass))
	{
		$errm[]='* Password contains invalid characters!';
	}
	
	} /* if(isset($_POST['passm'])){ */
	
	if( $_POST['emailm']){
		$modifythismail=$_POST['emailm'] ;
		$modifythismail = mysql_real_escape_string($modifythismail);	
		$modifysubjrow2 = mysql_fetch_assoc(mysql_query("SELECT id FROM tut_users WHERE email='$modifythismail' "));	
		if(!preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/",$_POST['emailm']))
	{
		$errm[]=' * Email is not valid!';
	}
	} /* if(isset($_POST['emailm'])){ */ 
	if($modifysubjrow2){
		$errm[]='* Invalid entry! ';
	}
	if(!count($errm))
	{			
		if($_POST['usernamem']){
		mysql_query("UPDATE tut_users SET usr='".$usernamem."' , modifytime1= NOW() WHERE id='".$modifytheid."' "); }
		if($_POST['emailm']){
		mysql_query("UPDATE tut_users SET email='".$emailm."' , modifytime1= NOW() WHERE id='".$modifytheid."' "); }
		if($_POST['treat']){
		mysql_query("UPDATE tut_users SET treat=$treat , modifytime1= NOW() WHERE id='".$modifytheid."' "); }
		if($_POST['passm']){
		mysql_query("UPDATE tut_users SET pass='".md5($pass)."' , modifytime1= NOW() WHERE id='".$modifytheid."' "); }
		
		if( $firstemail==='0'){
		mysql_query("UPDATE tut_users SET firstemail=0 , modifytime1= NOW() WHERE id='".$modifytheid."' "); }
	
		if( $firstemail==='1'){
		mysql_query("UPDATE tut_users SET firstemail=1 , modifytime1= NOW() WHERE id='".$modifytheid."' "); }
		
		if( $stage1email==='0'){
		mysql_query("UPDATE tut_users SET stage1email=0 , modifytime1= NOW() WHERE id='".$modifytheid."' "); }

		if( $stage1email==='1'){
		mysql_query("UPDATE tut_users SET stage1email=1 , modifytime1= NOW() WHERE id='".$modifytheid."' "); }
		
		if( $stage2email==='0'){
		mysql_query("UPDATE tut_users SET stage2email=0 , modifytime1= NOW() WHERE id='".$modifytheid."' "); }

		if( $stage2email==='1'){
		mysql_query("UPDATE tut_users SET stage2email=1 , modifytime1= NOW() WHERE id='".$modifytheid."' "); }
		
		$_SESSION['successm']='Successfully modified';		
	
	}	
	

 if(count($errm))
	{
		$_SESSION['errm'] = implode('<br />',$errm);
	}
	header("Location: admin.php?modify");
	exit;
} /* if(isSet($_POST['modifysubj'] )  ) */	 	 			
		
?>
						<form id="login" method="post" action=""> 

    <h1>Modify a subject</h1>
<?php
						
						if($_SESSION['errm'])
						{
							echo '<div class="err">'.$_SESSION['errm'].'</div>';
							unset($_SESSION['errm']);
						}
						
						if($_SESSION['successm'])
						{
							echo '<div class="success">'.$_SESSION['successm'].'</div>';
							unset($_SESSION['successm']);
					
						}
						
					?>   
        <div class="field">
    	<label for="subjid">Subject id</label> 
    	<input type="text" name="subjid" title="Enter the id of the subject" />
    </div>			

    <div class="field">
    	<label for="usernamem">New Username</label> 
    	<input type="text" name="usernamem"   title="Please provide a username" />
    </div>			
    
    <div class="field">
    	<label for="emailm">New Email</label>
    	<input type="text" name="emailm"   title="Please provide an e-mail" />
    </div>	
        <div class="field">
    	<label for="passm">New Password</label>
    	<input type="text" name="passm"   title="Please provide a password" value=<?php echo "\"".$_SESSION['genpass']."\"";?> />
    </div>	
     <div class="submit">
     <input type="submit" id="submit" name="generatepass" value="Generate password" />               
    </div>
    <div class="field">
    	<label for="emailm">New Treatment id</label>
    	<input type="text" name="treat"   title="Please provide a valid treatment id." />
    </div>

    <div class="field">
		<table> 
		<tr><td width="50%"><label for="firstemail"><p class="tiny">First email</p></label></td><td width="25%"> <p class="tiny">Yes <input type="radio" name="firstemail" value="1"  title="Yes" /></p></td><td width="25%"><p class="tiny">No <input type="radio" name="firstemail" value="0"  title="No" /></p></td></tr>
		</table>
	</div>
    
    <div class="field">
		<table> 
		<tr><td width="50%"><label for="stage1email"><p class="tiny">Stage 1 email</p></label></td><td width="25%"> <p class="tiny">Yes <input type="radio" name="stage1email" value="1"  title="Yes" /></p></td><td width="25%"><p class="tiny">No <input type="radio" name="stage1email" value="0"  title="No" /></p></td></tr>
		</table>
	</div>

    <div class="field">
		<table> 
		<tr><td width="50%"><label for="stage2email"><p class="tiny">Stage 2 email</p></label></td><td width="25%"> <p class="tiny">Yes <input type="radio" name="stage2email" value="1"  title="Yes" /></p></td><td width="25%"><p class="tiny">No <input type="radio" name="stage2email" value="0"  title="No" /></p></td></tr>
		</table>
	</div>

	<table><tr><td>	         			
    <div class="submit">
     <input type="submit" id="submit" name="modifysubj" value="Modify" />               
    </div>
    </td><td>
    <div class="submit">
     <input type="submit" id="submit" name="clear" value="Clear" />               
    </div>
    </td></tr></table>
    
</form>


	

