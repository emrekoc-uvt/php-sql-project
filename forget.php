<?php require 'include/connect.php';
session_start();
error_reporting(0);
?>
<?php if($_SESSION['username']){ ?>
<?php header("Location: error.php");?>
<?php } /* if($_SESSION['username']){ */ ?>
<?php if(!$_SESSION['username']){ ?>
<?php require 'adminfiles/email/generatepass.php';?>
<?php if(isset($_POST['submitforget'])){ 
$errforget= array();
$emailforget = mysql_real_escape_string($_POST['emailforget']);

if(!$emailforget){
$errforget[] = 'All the fields must be filled in!';	
}/* !$emailforget */

if(!preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/",$_POST['emailforget']))
	{
$errforget[]=' * Email is not valid!';
	} /* if preg match*/

	$rowforget = mysql_fetch_assoc(mysql_query("SELECT id FROM tut_users WHERE email='$emailforget' "));
    $id=$rowforget['id']; 
    $rowforget2 = mysql_fetch_assoc(mysql_query("SELECT email FROM tut_users WHERE id='$id' "));
    $emailispresent=$rowforget2['email']; 
     	
if(!$emailispresent){
$errforget[]=' * Email is not present in our database!';	
}/* (!$emailispresent) */

$datediffnow = mysql_fetch_row(mysql_query("SELECT TIMESTAMPDIFF(minute,modifytime1,NOW()) FROM tut_users WHERE id='$id' "));
$datediffnow2=$datediffnow[0];
$benchmarkminutes=30; 
$datediffnow=$datediffnow2;
	
if(isset($datediffnow) and $datediffnow<$benchmarkminutes){
$remaining=$benchmarkminutes-$datediffnow;	
$errforget[]=' * Your login information has just been changed. Please try again in '.$remaining.' minute(s)!';	
}

if(!count($errforget))
	{
/* update ip */
mysql_query("UPDATE tut_users SET ip='".$_SERVER['REMOTE_ADDR']."' WHERE id='$id' AND admin<>1 "); 		
		
		/* get the ip */
		$rowforget3 = mysql_fetch_assoc(mysql_query("SELECT ip, usr FROM tut_users WHERE id='$id' AND admin<>1 "));
    $ip=$rowforget3['ip'];
	$usr=$rowforget3['usr'];
	if(!$ip){$ip="not reported"; $ipbroken=1;}
    if(!$usr){$usr="not reported";}
		
		
    	/* update new password */
		mysql_query("UPDATE tut_users SET pass='".md5($password)."' , ip='".$_SERVER['REMOTE_ADDR']."', modifytime1= NOW() WHERE id='$id' AND admin<>1 "); 
    	
	/*  send the e-mail. also one copy to yourself */
require 'class.phpmailer.php';
$from=$myemail;
$mail = new PHPMailer;
$mail->IsSMTP();  
$mail->Host = $mysmtp;  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $mailusr;                            // SMTP username
$mail->Password = $mailpass;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->From = $from;
$mail->FromName = 'Emre Koc';
$mail->AddAddress($emailforget);               // Name is optional
$mail->AddBCC($from);
$mail->AddBCC($elineemail);
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'UvT experiment - New Password';
$mail->Body    = '<p>Dear participant, </p><br>
		  <p>You or someone else has requested a new password using your email ' .$emailforget. ' . Here is your new password and user name:</p> 
		  <p><strong>User name: </strong>' .$usr. '</p> 
		  <p><strong>Password: </strong>' .$password. '</p> 
		  <p>( IP : ' .$ip. ' )</p><br>
		  <p>Click on the following link to go to the experiment homepage:</p> 
		  <p><a href="https://stuwww.uvt.nl/~s948083/" target="_blank">https://stuwww.uvt.nl/~s948083/</a></p> 
		  <p>If the link is inactive you can copy the link and paste it to the adress bar of your internet browser.</p> 
		  <br/> <p>Best regards, </p>
		  <p>Emre Koc </p>';

$mail->AltBody = 'Dear participant, \n\n
		  You or someone else has requested a new password using your email ' .$emailforget. ' . Here is your new password and user name:\n 
		  User name: ' .$usr. ' \n
		  Password: ' .$password. ' \n
		  ( IP : ' .$ip. ' )\n\n
		  Click on the following link to go to the experiment homepage:\n 
		  https://stuwww.uvt.nl/~s948083/ \n 
		  If the link is inactive you can copy the link and paste it to the adress bar of your internet browser. \n\n
		  Best regards, \n
		  Emre Koc ';

if(!$mail->Send()) {
header("Location: error.php");
exit;
} /* if(!$mail->Send()) */

	$_SESSION['successforget']='An e-mail is sent to the given adress. Please check your inbox and your spam mail folder.';		
	} /* if(!count($errforget)) */	

 if(count($errforget))
	{
		$_SESSION['errforget'] = implode('<br />',$errforget);
	} /*  if(count($errforget)) */
	header("Location: forget.php");
	exit;

} /* if(isSet($_POST['submitforget'])){ */?>

<!DOCTYPE html>
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot password | Uvt Experiment </title>
	<meta name="description" content="Login for the economic experiment" />
    <meta name="keywords" content="economic, experiment "/>
	<?php require 'css/header.php';?>
</head>
<body>
<form id="login2" method="post" action=""> 
            
            <h1>Retrieve username and password</h1>
						<?php
						if($_SESSION['errforget'])
						{
							echo '<div class="err">'.$_SESSION['errforget'].'</div>';
							unset($_SESSION['errforget']);
						}
						
						if($_SESSION['successforget'])
						{
							echo '<div class="success">'.$_SESSION['successforget'].'</div>';
							unset($_SESSION['successforget']);
					
						}
						?>
     <p class= "big"> Your user name and new password will be sent to your e-mail adress.</p>
    <div>
    	<label for="login_email">Email</label>
    	<input type="text" name="emailforget" class="field"  title="Please provide an e-mail" />
    </div>	
  
   
    <div class="submit">
     <input type="submit" id="submit" name="submitforget" value="Submit" />            
    </div>	
    

<p class= "big"> You can go back to the main page by clicking <a href="login.php">this</a>.</p>
  			
		<?php if($_SESSION['id']){ ?>   		 <br><p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
  	      <?php } ?>          

  	      <?php  if($_SESSION['username']) {?> <br /> You can logout <a href="login.php?logoff">here</a>.<?php } ?>
           
</form>           
</body>
</html>
<?php } /* if(!$_SESSION['username'])*/ ?>