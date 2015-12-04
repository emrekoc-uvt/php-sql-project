<?php
error_reporting(0);
set_include_path('/home/wwwppl/s948083/html/');
require 'include/connect.php';
session_start(); ?>		

<?php   $query17="UPDATE payments SET currenttime= NOW() ";
		$result17 = mysql_query($query17) or die(mysql_error()); ?>
		
<?php $result = mysql_query("SELECT payid FROM payments");
$storeArray = Array();
while ($rowz = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray[] =  $rowz['payid'];  
} 
/* echo "storearray0 :".$storeArray[0] ;
echo "storearray1 :".$storeArray[1] ;
echo "storearray2 :".$storeArray[2] ; */
?>
		
<?php $query6a ="SELECT max(payid) FROM payments";
$result6a = mysql_query($query6a) or die (mysql_error());
$row6a = mysql_fetch_row($result6a);
$paymax=$row6a[0]; 
/* echo "paymax : ".$paymax;?> */

$i=0;
$datediff=array();
while($i<$paymax){
if($storeArray[$i]){
$query6b="SELECT DATEDIFF(currenttime, updatetime5) FROM payments WHERE payid='$storeArray[$i]'"; 
$result6b = mysql_query($query6b) or die (mysql_error());
$row6b = mysql_fetch_row($result6b);
$datediff[$storeArray[$i]]=$row6b[0];
} /* if($storeArray[$i]) */
$i=$i+1;
} /* while($i<$paymax) */
/* echo "datediff0 :".$datediff[0] ;
echo "datediff1 :".$datediff[1] ;
echo "datediff2 :".$datediff[2] ; */
?>

<?php 
$i=0;
while($i<$paymax){
if($storeArray[$i]){
$dayssince=$datediff[$storeArray[$i]];	
$query6b="UPDATE payments SET dayssince='$dayssince' WHERE payid='$storeArray[$i]';"; 
$result6b = mysql_query($query6b) or die (mysql_error());
} /* if($storeArray[$i]) */
$i=$i+1;
} /* while($i<$paymax) */
?>

<?php $viewresultsrow = mysql_query("SELECT payid, id, paymentstatus, 
banknum, updatetime5, paymenttime, dayssince, paymentamount, 
playrow FROM payments WHERE paymentstatus='not completed' AND ( ( dayssince>='0' AND paymenttime='now')
OR ( dayssince>='60' AND paymenttime='2 months from now')
OR ( dayssince>='120' AND paymenttime='4 months from now') )
");
?>

<?php if(mysql_num_rows($viewresultsrow)>0){?>
<?php 
require 'class.phpmailer.php';


$from=$myemail;
$mail = new PHPMailer;
$mail->IsSMTP();  
$mail->Priority = 1; 
$mail->Host = $mysmtp;  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $mailusr;                            // SMTP username
$mail->Password = $mailpass;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->From = $from;
$mail->FromName = 'Emre Koc';
$mail->AddAddress($myemail);               // Name is optional
$mail->AddBCC($elineemail);
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Urgent! Pending payments!';
$mail->Body = ' <p>Dear experimenter,</p> 
<p>Our mysql query has detected the following pending payments : </p>
<p><a href="https://stuwww.uvt.nl/~s948083/adminfiles/email/remindpaymentslist.php" target="_blank">https://stuwww.uvt.nl/~s948083/adminfiles/email/remindpaymentslist.php</a></p> 
<p>We only check immediate payments and payments with 2 months and 4 months delay. If there are other payments with different payment horizons, they will be excluded from this list. </p>
<p>Best regards,</p>
<p>Emre Koc</p>';

$mail->AltBody = ' You need an html enabled e-mail service to see this message !';


if(!$mail->Send()) {
header("Location: error.php");
exit;
} /* if(!$mail->Send()) */ 
?>

<?php } /* if(mysql_num_rows($viewresultsrow)>0)*/ ?>
