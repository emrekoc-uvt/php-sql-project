<?php 
require 'include/connect.php';?>

<?php
unset($_SESSION['query']);
$_SESSION['query']="SELECT u.usr, u.email, u.id, u.treat, u.finished1, u.finished2, u.firstemail, u.stage1email, u.stage2email, t.intv1start, t.intv2start, t.intv1end, t.intv2end FROM tut_users u, treatments t WHERE admin<>1 AND finished1=1 AND finished2=0 AND stage2email=0 AND DATEDIFF(NOW(),intv2start)>=0 AND DATEDIFF(NOW(),intv2start)<=0 AND u.treat=t.treat" ;
?>
<?php require 'adminfiles/email/stage2emailbatch.php';?>