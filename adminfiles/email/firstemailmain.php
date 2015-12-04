<?php 
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
$mail->AddAddress($email);               // Name is optional
$mail->AddBCC($from);
$mail->AddBCC($elineemail);
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'UvT experiment - User name and password';
$mail->Body    = '<p>Dear participant,</p><br> 
		  <p>You have stated that you would like to participate in our experiment. Your user name and password are indicated below:</p>
		  <p><strong>User name: </strong>' .$usr. '</p> 
		  <p><strong>Password: </strong>' .$password. '</p> 
		  <p>Please do not share this information with anyone. You can use your user name and password to log in to the experiment website:</p>
		  <p><a href="https://stuwww.uvt.nl/~s948083/" target="_blank">https://stuwww.uvt.nl/~s948083/</a></p> 
		  <p>If the link is inactive you can copy the link and paste it to the adress bar of your internet browser.</p> <br>
		  <p>The experiment consists of two stages. At each stage you have to log in to the experiment website and complete the tasks that will be given to you. Once you start a stage you have to complete it within the given amount of time. Otherwise you will be excluded from all payments.</p><br> 
		  <p>The first stage begins on '.$sintv1start.' and is accessible until '.$sintv1end.'. The second stage is accessible from '.$sintv2start.' to '.$sintv2end.'. Please make a note of these dates. Also please be aware that our e-mails may end up in your spam mail folder.</p><br> 
		  <p>Best regards,</p>
		  <p>Emre Koc</p>
		  <br/>';

$mail->AltBody = 'Dear participant,\n\n 
		  You have stated that you would like to participate in our experiment. Your user name and password are indicated below:\n
		  User name: ' .$usr. '\n 
		  Password: ' .$password. '\n 
		  Please do not share this information with anyone. You can use your user name and password to log in to the experiment website:\n
		  https://stuwww.uvt.nl/~s948083/ \n 
		  If the link is inactive you can copy the link and paste it to the adress bar of your internet browser.\n \n
		  The experiment consists of two stages. At each stage you have to log in to the experiment website and complete the tasks that will be given to you. Once you start a stage you have to complete it within the given amount of time. Otherwise you will be excluded from all payments.\n\n  
		  The first stage begins on '.$sintv1start.' and is accessible until '.$sintv1end.'. The second stage is accessible from '.$sintv2start.' to '.$sintv2end.'. Please make a note of these dates. Also please be aware that our e-mails may end up in your spam mail folder.\n\n 
		  Best regards, \n
		  Emre Koc \n';

?>