<?php
$internet=1;
/* Database config */

if($internet==0){
$db_host		= 'localhost';
$db_user		= 'emre';
$db_pass		= 'bil01bo3';
$db_database	= 'timeexperiment'; 
}



if($internet==1){
$db_host		= 'localhost';
$db_user		= 's948083';
$db_pass		= 'bil01bo0';
$db_database	= 's948083'; 
}

/* End config */

$link = @mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection. Please try again in a moment. ');

mysql_query("SET NAMES 'utf8'");
mysql_select_db($db_database,$link);

?>

<?php $myemail='e.koc@uvt.nl';
$elineemail='tornavida@hotmail.com';
$mysmtp = 'mailhost.uvt.nl; smailhost.uvt.nl';  
$mailusr = 's948083';                            // SMTP username
$mailpass = 'Bil01bo1';                           // SMTP password
$experimentid="(Experiment 784)"
?>