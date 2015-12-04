<html>
<?php
error_reporting(0);
set_include_path('/home/wwwppl/s948083/html/');
require 'include/connect.php';
session_start(); ?>		
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payments Page | Uvt Experiment</title>
	<meta name="description" content="Results Page | Uvt Experiment" />
    <meta name="keywords" content="economic, experiment"/>

<link rel="stylesheet" type="text/css" href="../../css/demo.css" />	
<?php 
$agent = getenv("HTTP_USER_AGENT");

if (preg_match("/MSIE/i", $agent)) {?>
<link REL="stylesheet" TYPE="text/css" href="../../css/ie.css" />
<?php } /* if (preg_match("/MSIE/i", $agent)) { */?>
<link rel="shortcut icon" href="../../uvt.ico" type="image/x-icon" />
	
</head>
<body> 
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


<div class="member3">            

<p class="big">Dear experimenter,</p> 
<p class="big">Our mysql query has detected the following pending payments : </p>
<div class="member3">            
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Payment id</b></p></td>
<td><p ><b>Subject id</b></p></td>
<td><p ><b>Status</b></p></td>
<td><p ><b>Account num.</b></p></td>
<td><p ><b>Order time</b></p></td>
<td><p ><b>Payment time</b></p></td>
<td><p ><b>Days since order</b></p></td>
<td><p ><b>Amount</b></p></td>
<td><p ><b>Played Row</b></p></td>
</tr>
<?php while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["payid"] ;?></p></td>
<td><p ><?php echo $rowt["id"] ; ?></p></td>
<td><p ><?php echo $rowt["paymentstatus"] ; ?></p></td>
<td><p ><?php echo $rowt["banknum"] ; ?></p></td>
<td><p ><?php echo $rowt["updatetime5"] ; ?></p></td>
<td><p ><?php echo $rowt["paymenttime"] ; ?></p></td>
<td><p ><?php echo $rowt["dayssince"] ; ?></p></td>
<td><p ><?php echo $rowt["paymentamount"] ; ?></p></td>
<td><p ><?php echo $rowt["playrow"] ; ?></p></td>
</tr>
	
<?php } /* while ($rowt = mysql_fetch_assoc($viewresultsrow))*/ ?> 
</table>
</div>

<p class="big">We only check immediate payments and payments with 2 months and 4 months delay. If there are other payments with different payment horizons, they will be excluded from this list. Experiment homepage :</p>
<p class="big"><a href="https://stuwww.uvt.nl/~s948083/" target="_blank">https://stuwww.uvt.nl/~s948083/</a></p> 
<p class="big">Best regards,</p>
<p class="big">Emre Koc</p>
		 
</div>
		 
</body>
</html>

