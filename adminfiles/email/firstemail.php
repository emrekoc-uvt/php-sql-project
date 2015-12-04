<?php

/* usr, password and treat are taken as given */

$row4=mysql_fetch_assoc(mysql_query("SELECT intv1start, intv2start, intv1end, intv2end FROM treatments WHERE treat='$treat' "));		
  			$intv1start= $row4['intv1start'];
  			$intv2start= $row4['intv2start']; 
  		
  			$intv1end= $row4['intv1end'];
  			$intv2end= $row4['intv2end'];
  			
  			unset($row4);
  			
  	$sintv1start = date("d-m-Y",strtotime($intv1start)); 
    $sintv2start = date("d-m-Y",strtotime($intv2start));
    
	$sintv1end= date("d-m-Y" ,strtotime($intv1end)); 
	$sintv2end = date("d-m-Y",strtotime($intv2end));
?>

<?php $viewrow = mysql_fetch_assoc(mysql_query("SELECT id, email FROM tut_users WHERE usr='$usr' AND admin<>1"));
$id=$viewrow['id']; 
$email=$viewrow['email'];  
?>
<?php if(isset($sintv1start) and isset($sintv2start) and isset($sintv1end) and isset($sintv2end) and isset($usr) and isset($password) and isset($treat)){	?>

<?php 
require 'class.phpmailer.php';
require 'adminfiles/email/firstemailmain.php';

if(!$mail->Send()) {
header("Location: error.php");
exit;
} /* if(!$mail->Send()) */ 
?>

<?php $queryu = "UPDATE tut_users SET firstemail=1 , pass='".md5($password)."', updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id AND admin<>1" ;
		
mysql_query($queryu) or die(mysql_error());
		unset($queryu);
?>

<?php } /* if(isset($sintv1start) and isset($sintv2start) and isset($sintv1end) and isset($sintv2end) and isset($usr) and isset($password)){	*/?>