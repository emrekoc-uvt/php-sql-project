<?php
$viewemailrow = mysql_query($_SESSION['query']);
require 'class.phpmailer.php';
while ($rowt7 = mysql_fetch_assoc($viewemailrow)) { 

$sintv1start=date("d-m-Y",strtotime($rowt7['intv1start']));
$sintv1end=date("d-m-Y",strtotime($rowt7['intv1end']));
$sintv2start=date("d-m-Y",strtotime($rowt7['intv2start']));
$sintv2end=date("d-m-Y",strtotime($rowt7['intv2end']));

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
$mail->AddAddress($rowt7['email']);               // Name is optional
$mail->AddBCC($from);
$mail->AddBCC($elineemail);
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'UvT experiment - Reminder';
$mail->Body    = '<p>Dear participant,</p><br> 
		  <p>This e-mail is sent to remind you that the second stage of the experiment begins on '.$sintv2start.' and is accessible until '.$sintv2end.'. You can use your user name and password to log in to the experiment website:</p>
		  <p><a href="https://stuwww.uvt.nl/~s948083/" target="_blank">https://stuwww.uvt.nl/~s948083/</a></p> 
		  <p>If the link is inactive you can copy the link and paste it to the adress bar of your internet browser. Please note that once you start a stage you have to complete it within the given amount of time. Otherwise you will be excluded from all payments.</p> <br> 
		  <p>Best regards,</p>
		  <p>Emre Koc</p>
		  <br/>';

$mail->AltBody = 'Dear participant,\n \n 
		  This e-mail is sent to remind you that the second stage of the experiment begins on '.$sintv2start.' and is accessible until '.$sintv2end.'. You can use your user name and password to log in to the experiment website:\n
		  https://stuwww.uvt.nl/~s948083/ \n 
		  If the link is inactive you can copy the link and paste it to the adress bar of your internet browser. Please note that once you start a stage you have to complete it within the given amount of time. Otherwise you will be excluded from all payments.\n \n 
		  Best regards, \n
		  Emre Koc \n';

if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
$id=$rowt7['id'];
$queryu = "UPDATE tut_users SET stage2email=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id AND admin<>1" ;
		
mysql_query($queryu) or die(mysql_error());
		unset($queryu);
} /* else (!$mail->Send()) */
?>

<?php } /* while mysql	*/?>