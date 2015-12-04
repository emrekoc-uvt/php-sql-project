<?php 
	unset($_SESSION['genpass']);

if(isset($_POST['generatepass'])){
	require 'adminfiles/email/generatepass.php';	
	$_SESSION['genpass']=$password;
}/* if(isset($_POST['generatepass'])) */

if(isSet($_POST['submit']) or isSet($_POST['submitemail']) )
{
	unset($_SESSION['genpass']);
	$addthisname=$_POST['username'] ;
		$addthisname = mysql_real_escape_string($addthisname);	
		$addsubjrow1 = mysql_fetch_assoc(mysql_query("SELECT id FROM tut_users WHERE usr='$addthisname' "));
	
		$addthismail=$_POST['email'] ;
		$addthismail = mysql_real_escape_string($addthismail);	
		$addsubjrow2 = mysql_fetch_assoc(mysql_query("SELECT id FROM tut_users WHERE email='$addthismail' "));	
	
		$addthistreat=$_POST['treat'] ;
		$addthistreat = mysql_real_escape_string($addthistreat);
		$treatexists = mysql_fetch_assoc(mysql_query("SELECT treat FROM treatments WHERE treat='$addthistreat' "));
		
		$err = array();
	if (ctype_digit($addthistreat)){}else{
		$err[]='* Invalid entry!';			
	}
	if(!$treatexists){
	$err[]='* Invalid entry!';			
	}
if($addsubjrow1 || $addsubjrow2)
	{
		$err[]='* Invalid entry. Already exists!';
	}
	
	
	if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
	{
		$err[]='* Username must be between 3 and 32 characters!';
	}
	
	if(!preg_match("/^[A-Za-z0-9]*$/",$_POST['username']))
	{
		$err[]='* Username contains invalid characters!';
	}

	if(!preg_match("/^[A-Za-z0-9]*$/",$_POST['password']))
	{
		$err[]='* Password contains invalid characters!';
	}
	
	
	if(!preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/",$_POST['email']))
	{
		$err[]=' * Email is not valid!';
	}
	
	if(!count($err))
	{
		$email = mysql_real_escape_string($_POST['email']);
		$username = mysql_real_escape_string($_POST['username']);
		$pass = mysql_real_escape_string($_POST['password']);
		
		$timers = mysql_fetch_assoc(mysql_query("SELECT timer1,timer2,timer3, timer4 FROM timers WHERE id15=1 "));
		$timer1=$timers['timer1'];
		$timer2=$timers['timer2'];
		$timer3=$timers['timer3'];
		$timer4=$timers['timer4'];
		$query9 = "INSERT INTO tut_users(usr,admin,pass,email,ip, modifytime1 ,treat, remainingtimer1, remainingtimer2, remainingtimer3, remainingtimer4) VALUES('".$username."',0,'".md5($pass)."','".$email."','".$_SERVER['REMOTE_ADDR']."',NOW(),'$addthistreat','$timer1','$timer2','$timer3','$timer4' )" ;
		mysql_query($query9) or die(mysql_error());
		
		$_SESSION['success']='Successfully added';		
		
		if(isSet($_POST['submitemail'])){
		$usr=$addthisname;	
		$email=$addthismail;
		$treat=$addthistreat;
		$password = mysql_real_escape_string($_POST['password']);
		
			require 'adminfiles/email/firstemail.php';	
		} /* if(isSet($_POST['submitemail'])) */
		
	}	

 if(count($err))
	{
		$_SESSION['err'] = implode('<br />',$err);
	}
	header("Location: admin.php?add");
	exit;
} /* post submit*/	 	 			
			  
		
?>
			  
						<form id="login" method="post" action=""> 

    <h1>Add a subject</h1>
<?php
						
						if($_SESSION['err'])
						{
							echo '<div class="err">'.$_SESSION['err'].'</div>';
							unset($_SESSION['err']);
						}
						
						if($_SESSION['success'])
						{
							echo '<div class="success">'.$_SESSION['success'].'</div>';
							unset($_SESSION['success']);
					
						}
					?>

<?php $result = mysql_query("SHOW TABLE STATUS LIKE 'tut_users'");
$row = mysql_fetch_array($result);
$nextId = $row['Auto_increment'];
mysql_free_result($result); ?>
   
        <div class="field">
    	<label for="username" >Username</label> 
    	<input type="text" name="username" class="field2"  title="Please provide a username" value=<?php echo "\"subject".$nextId."\""?>/>
    </div>			

    <div class="field">
    	<label for="password" >Password</label> 
    	<input type="text" name="password" class="field2"  title="Please provide a password" value=<?php echo "\"".$_SESSION['genpass']."\"";?>/>
    </div>
    <div class="submit">
     <input type="submit" id="submit" name="generatepass" value="Generate password" />               
    </div>	    
    <div class="field">
    	<label for="email">Email</label>
    	<input type="text" name="email" class="field2"  title="Please provide an e-mail" />
    </div>	         			
    <div class="field">
    	<label for="treat">Treatment</label>
    	<input type="text" name="treat" class="field2"  title="Enter a valid treatment number" />
    </div>	         			
    
    <table><tr><td>
    <div class="submit">
     <input type="submit" id="submit" name="submit" value="Add" />               
    </div>	
    </td><td>
    <div class="submit">
     <input type="submit" id="submit" name="submitemail" value="Add and E-mail" />               
    </div>	
    </td></tr></table>
</form>	
			
			  