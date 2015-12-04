<?php function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    } /* for */
    return implode($pass); //turn the array into a string
} /* function randomPassword() */
?>

<?php
$viewemailrow = mysql_query($_SESSION['query']);
require 'class.phpmailer.php';
while ($rowt7 = mysql_fetch_assoc($viewemailrow)) { 

$sintv1start=date("d-m-Y",strtotime($rowt7['intv1start']));
$sintv1end=date("d-m-Y",strtotime($rowt7['intv1end']));
$sintv2start=date("d-m-Y",strtotime($rowt7['intv2start']));
$sintv2end=date("d-m-Y",strtotime($rowt7['intv2end']));
	
$password=randomPassword();
$email=$rowt7['email'];
$usr=$rowt7['usr'];
require 'adminfiles/email/firstemailmain.php';

if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
$id=$rowt7['id'];
$queryu = "UPDATE tut_users SET firstemail=1 , pass='".md5($password)."',  updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id AND admin<>1" ;
		
mysql_query($queryu) or die(mysql_error());
		unset($queryu);
} /* else (!$mail->Send()) */
} /* while ($rowt = mysql_fetch_assoc($viewemailrow)) { */

?>
