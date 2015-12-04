<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payments Page | Uvt Experiment</title>
	<meta name="description" content="Results Page | Uvt Experiment" />
    <meta name="keywords" content="economic, experiment"/>
	<?php require 'css/header.php';?>
	
</head>
<?php
error_reporting(0);
require 'include/connect.php';
session_start(); ?>		
<body> 
<?php if($_SESSION['admin']==0){?>
<?php require 'adminfiles/noadmin.php'?>
<?php } /* if($_SESSION['admin'])==0*/ ?>

<?php if($_SESSION['admin']==1){?>
		
<?php $_SESSION['whichpayments']='pending'?>
<?php if(isSet($_POST['all'])){
$_SESSION['whichpayments']='all';
}?>

<?php if(isSet($_POST['pending'])){
$_SESSION['whichpayments']='pending';
}?>
<?php if(isSet($_POST['all'])){
$_SESSION['whichpayments']='all';
}?>

<?php if(isSet($_POST['clearcanceled'])){ 
		$query6="DELETE FROM payments WHERE paymentstatus='canceled' ";
		$result6 = mysql_query($query6) or die(mysql_error());
		unset($query6);	
} /* if(isSet($_POST['clearcanceled'])) */
?>

<?php 
		if(isSet($_POST['payment'])){
		
			
	    $query12="SELECT MAX(payid) FROM payments";
		$result12= mysql_fetch_assoc(mysql_query($query12));
		$imax=$result12['MAX(payid)'];
		unset($query12);
		/* echo "imax : ".$imax ; */
		


	$i=0;
while ($i<=$imax){ 
		
	if($_POST[$i]){
		$query17="SELECT id FROM payments WHERE payid=$i";
		$result17= mysql_fetch_assoc(mysql_query($query17));
		
		
		if($result17['id']){
			
		$dummy=$_POST[$i];
		
		/* echo "dummy :".$dummy;
		echo "i :".$i; */
			
		$query6="UPDATE payments SET paymentstatus='".$dummy."' WHERE payid=$i";
		$result6 = mysql_query($query6) or die(mysql_error());
		unset($query6);
		}  
} /* post [i] */
		$i=$i+1;} /* while */

?>           

<?php } /* if(isSet($_POST['payment'])) */ ?>
			
			<div class="member3">
            
            <h1>Modify <?php if($_SESSION['whichpayments']=='pending'){echo "pending";}if($_SESSION['whichpayments']=='all'){echo "all";} ?> payments</h1>
            <form method="post" action="payments.php">
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Payment id</b></p></td>
<td><p ><b>Subject id</b></p></td>
<td><p ><b>Status</b></p></td>
<td><p ><b>Set status</b></p></td>
<td><p ><b>Account num.</b></p></td>
<td><p ><b>Order time</b></p></td>
<td><p ><b>Payment time</b></p></td>
<td><p ><b>Days since order</b></p></td>
<td><p ><b>Amount</b></p></td>
<td><p ><b>Played Row</b></p></td>
</tr>
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

            
<?php  
if($_SESSION['whichpayments']==='all'){
$viewresultsrow = mysql_query("SELECT payid, id, paymentstatus, 
banknum, updatetime5, paymenttime, dayssince, paymentamount, 
playrow FROM payments ");
}/* if($_SESSION['whichpayments']='all') */

if($_SESSION['whichpayments']==='pending'){
$viewresultsrow = mysql_query("SELECT payid, id, paymentstatus, 
banknum, updatetime5, paymenttime, dayssince, paymentamount, 
playrow FROM payments WHERE paymentstatus='not completed' AND ( ( dayssince>='0' AND paymenttime='now')
OR ( dayssince>='60' AND paymenttime='2 months from now')
OR ( dayssince>='120' AND paymenttime='4 months from now') )
");
}/* if($_SESSION['whichpayments']='pending') */

while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["payid"] ;?></p></td>
<td><p ><?php echo $rowt["id"] ; ?></p></td>
<td><p ><?php echo $rowt["paymentstatus"] ; ?></p></td>
<td><p> <?php if($rowt["paymentstatus"]){?> 

<select name="<?php echo $rowt["payid"];?>">
<?php if($rowt["paymentstatus"]==completed){?>
<option value="completed">Completed</option>
<?php }?>
<?php if($rowt["paymentstatus"]=="not completed"){?>
<option value="not completed">Not completed</option>
<?php }?>

<?php if($rowt["paymentstatus"]=="canceled"){?>
<option value="canceled">Canceled</option>
<?php }?>


<option value="not completed">Not completed</option>
<option value="completed">Completed</option>
<option value="canceled">Canceled</option>
</select>

<?php } /* if($rowt["paymentstatus"])*/?></p></td>
<td><p ><?php echo $rowt["banknum"] ; ?></p></td>
<td><p ><?php echo $rowt["updatetime5"] ; ?></p></td>
<td><p ><?php echo $rowt["paymenttime"] ; ?></p></td>
<td><p ><?php echo $rowt["dayssince"] ; ?></p></td>
<td><p ><?php echo $rowt["paymentamount"] ; ?></p></td>
<td><p ><?php echo $rowt["playrow"] ; ?></p></td>
</tr>
	
<?php } /* while ($rowt = mysql_fetch_assoc($viewresultsrow))*/ ?> 
</table>
  <br><br>
<table width="100%"><tr>
	<td width="25%">
	</td>
	<td width="25%">
    <div class="submit">
     <input type="submit" id="submit" name="payment" value="Modify" />               
    </div>
    </td>
    <td width="25%">
    <?php if($_SESSION['whichpayments']==='all'){ ?>
    <div class="submit">
     <input type="submit" id="submit" name="pending" value="View only pending payments" />               
    </div>
    <?php } /* if($_SESSION['whichpayments']==='all') */ ?>
    <?php if($_SESSION['whichpayments']==='pending'){ ?>
    <div class="submit">
     <input type="submit" id="submit" name="all" value="View all payments" />               
    </div>
    <?php } /* if($_SESSION['whichpayments']==='pending') */ ?>
    </td>
	<td width="25%">
  <?php if($_SESSION['whichpayments']==='all'){ ?>
    <div class="submit">
     <input type="submit" id="submit" name="clearcanceled" value="Clear all canceled payments" />               
    </div>
    <?php } /* if($_SESSION['whichpayments']==='all') */ ?>
 	</td>
  </tr>
</table>
  
</form>
           </div>


			<div class="member3">
            
            <h1>Future payments</h1>
            <form method="post" action="payments.php">
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
<?php             	

		$query17="UPDATE payments SET currenttime= NOW() ";
		$result17 = mysql_query($query17) or die(mysql_error());
		
		
$query28="SELECT currenttime, updatetime5, DATEDIFF(currenttime, updatetime5) AS dayssince FROM payments;";
  				$result= mysql_fetch_assoc(mysql_query($query28));  
  				unset($query28);
  				
?>            
        <?php  $viewresultsrow = mysql_query("SELECT payid, id, paymentstatus, 
        banknum, updatetime5, paymenttime, dayssince, paymentamount, 
        playrow FROM payments WHERE paymentstatus='not completed' ");
$totaltodo=0;
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
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
<?php $totaltodo= $totaltodo + $rowt["paymentamount"]; ?>	
<?php } /* while ($rowt = mysql_fetch_assoc($viewresultsrow))*/ ?> 
<tr>
<td></td> <td></td>
<td><p>Total</p></td>
<td></td> <td></td><td></td> <td></td>
<td><p><?php echo $totaltodo; ?></p></td><td></td>
</tr>
</table>
    
</form>
           </div>


			<div class="member3">
            
            <h1> Completed payments</h1>
            <form method="post" action="payments.php">
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
<?php             	

		$query17="UPDATE payments SET currenttime= NOW() ";
		$result17 = mysql_query($query17) or die(mysql_error());
		
		
$query28="SELECT currenttime, updatetime5, DATEDIFF(currenttime, updatetime5) AS dayssince FROM payments;";
  				$result= mysql_fetch_assoc(mysql_query($query28));  
  				unset($query28);
  				
?>            
        <?php  $viewresultsrow = mysql_query("SELECT payid, id, paymentstatus, 
        banknum, updatetime5, paymenttime, dayssince, paymentamount, 
        playrow FROM payments WHERE paymentstatus='completed' ");
$totalcompleted=0;
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
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
<?php $totalcompleted= $totalcompleted + $rowt["paymentamount"]; ?>	
<?php } /* while ($rowt = mysql_fetch_assoc($viewresultsrow))*/ ?> 
<tr>
<td></td> <td></td>
<td><p>Total</p></td>
<td></td> <td></td><td></td> <td></td>
<td><p><?php echo $totalcompleted; ?></p></td><td></td>
</tr>
</table>
    
</form>
           </div>

<?php } /* if($_SESSION['admin'])==1*/ ?>
<?php unset($viewresultsrow);
unset($rowt);?>
<?php if(!$_SESSION['id']){ ?>
<?php header("Location: error.php");?>
<?php } /* not if($_SESSION['id']) */?>


</body>
</html>