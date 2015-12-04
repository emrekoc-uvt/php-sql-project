<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Schedule  | Uvt Experiment </title>
	<meta name="description" content="Login for the economic experiment" />
    <meta name="keywords" content="economic, experiment "/>
	<?php require 'css/header.php';?>
		</head>
<body>
<?php require 'include/connect.php';
session_start(); 
error_reporting(0);?>

<?php 
$id= $_SESSION['id'];
$row=mysql_fetch_assoc(mysql_query("SELECT finished1, finished0, finished2 FROM tut_users WHERE id='$id' "));			
$finished2=$row['finished2'];
$finished1=$row['finished1'];
$finished0=$row['finished0'];
$_SESSION['finished2']=$finished2 ;
$_SESSION['finished1']=$finished1 ;
$_SESSION['finished0']=$finished0 ;
?>

<?php if(!$_SESSION['id']){ /* not if($_SESSION['id']) */?>
<?php header("Location: error.php");?>
<?php } /* not if($_SESSION['id']) */?>

<?php if($_SESSION['admin']==1){?>
<?php require 'adminfiles/nosubject.php'?>
<?php } /* if($_SESSION['admin'])==1*/ ?>

<?php
if($_SESSION['admin']==0){ ?>
<?php $_SESSION['schedulevisited']=1;?>
<?php 
$subjectid=$_SESSION['id'];
$row4=mysql_fetch_assoc(mysql_query("SELECT lasttimer1 FROM tut_users WHERE id='$subjectid' "));		
$lasttimer1=$row4['lasttimer1'];   


if($lasttimer1 != "1980-01-01 01:00:00"){
$_SESSION['firsttimer']=0;} else{$_SESSION['firsttimer']=1;} 

?>
<?php if($_SESSION['stage']=='2'){
$_SESSION['firsttimer2']=1;	
}?>

<?php 		

	if($_POST['submitft']){
						
	$errft = array();

	$readft=  mysql_real_escape_string($_POST['readft']) ;
	$bank=  mysql_real_escape_string($_POST['bank']) ;
	
	$bank = preg_replace('/[^A-Za-z0-9]/', '', $bank);
	
	$_SESSION['bank']=$bank;
	
	if(!$readft)
	{
		$errft[]='* Please read the statement and check the box!';
	} /* if(!$readft)*/
	
	if(!$bank)
	{
		$errft[]='* Please enter a bank account number!';
	} /* if(!bank)*/ 
	
	if(is_numeric($bank)){
	if($bank==0 or $bank==='0000.00.000'){
	$errft[]='* Please enter a valid bank account number!';	
	}/* if($bank==0)*/	
	}else{ /* is_numeric($bank) */		
	$errft[]='* Please enter a valid bank account number!';	
	}
		      
	if(!count($errft))
	{

		$_SESSION['successft']='Successfully submitted';
				
	$_SESSION['firsttimer']=0;
	$subjectid= $_SESSION['id'];
	$query9= "UPDATE tut_users SET lasttimer1=NOW() , bank=$bank, ip='".$_SERVER['REMOTE_ADDR']."' WHERE id='$subjectid' ";
mysql_query($query9) or die(mysql_error());	
		 header("Location: include/subjectredirect.php"); 
		exit; 
	}	

 if(count($errft))
	{
		$_SESSION['errft'] = implode('<br />',$errft);
	
	 header("Location: schedule.php"); 
	exit;
	}
	
  				
  			
			} /* if($_POST['submitft']  */
?>
			<div class="member">
            
            <h1>Experiment schedule for <?php if($_SESSION['username']) { echo $_SESSION['username'] ;} if(!$_SESSION['username']) { echo "visitor" ;}?>. <?php echo " ".$experimentid;?></h1>
            
            <?php
						
						if($_SESSION['errft'])
						{
							echo '<div class="err">'.$_SESSION['errft'].'</div>';
							unset($_SESSION['errft']);
						}
						
						if($_SESSION['successft'])
						{
							unset($_SESSION['successft']);	
							echo '<div class="success">'.$_SESSION['successft'].'</div>';
						
			
						}
						
					?> 
            <p class="big">The experiment consists of 2 stages</p>
            <table>
            
            <?php 
			$query6= "UPDATE tut_users SET updatetime1=NOW() WHERE id='$subjectid' ";
			mysql_query($query6) or die(mysql_error());
			unset($query6);
			$row2=mysql_fetch_assoc(mysql_query("SELECT updatetime1 FROM tut_users WHERE id='$subjectid' "));			
  			$_SESSION['currentdate']= $row2['updatetime1'];  			
  			unset($row2); ?>
  			
  			<?php if ( $_SESSION['intv1start'] and $_SESSION['intv2start'] and $_SESSION['intv1end'] and $_SESSION['intv2end'] ) {
 
 	if($_SESSION['currentdate']< $_SESSION['intv1start']){ $_SESSION['stage']='notstarted'; $status1="Not started"; ; $status2="Not started";} 	
  elseif ($_SESSION['currentdate'] >= $_SESSION['intv1start'] and $_SESSION['currentdate']<=$_SESSION['intv1end']) 	{$status1="Ongoing"; ; $status2="Not started";}
 elseif ($_SESSION['currentdate'] > $_SESSION['intv1end'] and $_SESSION['currentdate'] < $_SESSION['intv2start']) 	{$status1="Completed"; ; $status2="Not started";} 	
 elseif ($_SESSION['currentdate'] >= $_SESSION['intv2start'] and $_SESSION['currentdate']<=$_SESSION['intv2end']) 	{$status1="Completed"; ; $status2="Ongoing";}
 elseif ($_SESSION['currentdate'] > $_SESSION['intv2end'] ) 	{$status1="Completed"; ; $status2="Completed";} 				
 } /* if ( $_SESSION['intv1start'] and $_SESSION['intv2start'] and $_SESSION['intv0start'] and $_SESSION['intv1end'] and $_SESSION['intv2end'] and $_SESSION['intv0end']) {*/ 			
else{ $_SESSION['stage']='error'; header( 'refresh: 0; url=error.php' ) ; 	}
	 		 
  			 ?>
<?php $row=mysql_fetch_assoc(mysql_query("SELECT finished1, finished2, finished0 FROM tut_users WHERE id='$subjectid' "));			
$finished1=$row['finished1'];
$finished2=$row['finished2']; 
$finished0=$row['finished0']; 
?>
<?php if ($status2=="Completed" and $finished2==0 ) {$status2="Not Completed"; /* echo "I am here 1";*/ }?>  
<?php if ($status1=="Completed" and $finished1==0 ) {$status1="Not Completed"; $status2="Cancelled"; /*echo "I am here 2";*/ }?>  
<?php if ($status1=="Completed" and $finished0==0 ) {$status1="Not Completed"; $status2="Cancelled"; /* echo "I am here 3";*/ }?>  			 

<?php if ($status2=="Ongoing" and $finished2==1 ) {$status2="Completed";}?>  
<?php if ($status1=="Ongoing" and $finished1==1 ) {$status1="Completed"; }?>  
	  			 
<?php $row7=mysql_fetch_assoc(mysql_query("SELECT remainingtimer1 , remainingtimer2 , remainingtimer3 , remainingtimer4 FROM tut_users WHERE id='$subjectid' "));		
$remainingtimer1=$row7['remainingtimer1'];  
$remainingtimer2=$row7['remainingtimer2'];  
$remainingtimer3=$row7['remainingtimer3'];  
$remainingtimer4=$row7['remainingtimer4'];  
?>  			

<?php if ($remainingtimer4==0 and $finished2==0 ) {$status2="Not Completed"; /* echo "I am here 4";*/ }?>  
<?php if ($remainingtimer3==0 and $finished1==0 ) {$status1="Not Completed"; $status2="Cancelled"; /* echo "I am here 5";*/ }?>  
<?php if ( $remainingtimer2==0 and $finished1==0 ) {$status1="Not Completed"; $status2="Cancelled"; /* echo "I am here 6";*/ }?>  			 
<?php if ( $remainingtimer1==0 and $finished1==0 ) { $status1="Not Completed"; $status2="Cancelled"; /* echo "I am here 7";*/ }?>

<?php $row17=mysql_fetch_assoc(mysql_query("SELECT timer1 , timer2 , timer3 , timer4 FROM timers WHERE id15='1' "));		
$defaulttimer1=$row17['timer1'];  
$defaulttimer2=$row17['timer2'];  
$defaulttimer3=$row17['timer3'];  
$timerstage2=$row17['timer4'];  
$timerstage1=$defaulttimer1 + $defaulttimer2 + $defaulttimer3 ;
$estimatestage2=$timerstage2 * 1/2;
$estimatestage1=$timerstage1 * 1/2;
$estimatestage2=round($estimatestage2);
$estimatestage1=round($estimatestage1);
?>  			

            <tr><td><p class="big"><b>Stage</b></p></td>	<td><p class="big"><b>Accessible from</b></p></td>	<td><p class="big"> <b>Accessible until</b></p></td>	<td><p class="big"><b>Status</b></p></td>	<td><p class="big"></p></td>	</tr>
            <tr><td><p class="big">1</p></td>	<td><p class="big"><?php echo $_SESSION['sintv1start'] ; ?></p></td>	<td><p class="big"><?php echo $_SESSION['sintv1end'] ; ?></p></td>	<td><p class="big"><?php echo $status1 ; ?></p></td>	<td><p class="big"></p></td>	</tr>
            <tr><td><p class="big">2</p></td>	<td><p class="big"><?php echo $_SESSION['sintv2start'] ; ?></p></td>	<td><p class="big"><?php echo $_SESSION['sintv2end'] ; ?></p></td>	<td><p class="big"><?php echo $status2 ; ?></p></td>	<td><p class="big"></p></td>	</tr>
            <tr><td><p class="big"></p></td>	<td><p class="big"></p></td>	<td><p class="big"></p></td>	<td><p class="big"></p></td>	<td><p class="big"></p></td>	</tr>
            <?php /* not started, ongoing, completed, not completed, cancelled*/?>
            </table>
            <br /> 
            <br /> <p class="big"><b>Rules:</b></p>
          <p class="big">1) All future stages will be cancelled if the participant cannot complete a stage successfully in time. In this case you will be excluded from all payments. It takes approximately <?php echo $estimatestage1;?> minutes to complete stage 1 and <?php echo $estimatestage2;?> minutes to complete stage 2. </p>
           <br /> <p class="big">2) After you start a stage a timer starts runnning. You have to complete and submit a form before the timer runs out. Otherwise all future stages will be cancelled and you will be excluded from all payments. The timer cannot be paused once it starts running.</p>
             <br /> <p class="big">3) If you have any questions you can contact the experimenter by e-mail: <img src="img/948083.gif"></p>
             
             <br /> 
            
            
            
            <?php if ($_SESSION['firsttimer']!=1 or ($_SESSION['stage']!=1) ){?>
            <?php  if($_SESSION['username']) {?> <p class="big"><?php if($status1=="Ongoing" or $status2=="Ongoing"){?>The timer is running. <?php }?>You can go to the experiment <a href="subject.php">here</a>. <?php } ?> </p>
           
            <?php  if($_SESSION['username']) {?> <p class="big">You can logout <a href="login.php?logoff">here</a>. <?php } ?></p>
           <?php } /* if ($_SESSION['firsttimer']!=1)*/?>
           
 <?php if ($_SESSION['firsttimer']==1 and $_SESSION['stage']==1){?>
<form method="post" action="">
<p class="big"> Please enter below a bank account number. Your earnings will be sent to this number. 
		</p>
		
		<p class="close"><input type="text" name="bank"   <?php if($_SESSION['bank']){ echo "value=".$_SESSION['bank'];} else{ echo "value= '0000.00.000' ";}?>  class="field2long" title="Answer" /></p>

<br> <p class="big"> Payments will be sent to your bank account on the specified dates. If a payment is made on a holiday, you will receive the money on the next working day.</p>
<?php  if($_SESSION['username']) {?> <p class="big">You can logout <a href="login.php?logoff">here</a>. <?php } ?></p>

<br> <br>
           
           
           <br> <p class="big"><input type="checkbox" name="readft" id=" read" value="1" /> I have read and understood the rules.
		</p><br>
  			      <div class="submit">
     <input type="submit" id="submit" name="submitft" value="Proceed" />
	 </div>
           
           </form>
           <?php } /* if ($_SESSION['firsttimer']==1 and $_SESSION['stage']==1)*/?>
           
           </div>
<?php } /* if($_SESSION['admin'])==0{*/?>

<?php /* echo 'stage:'.$_SESSION['stage']. '  ';
echo 'finished0:'.$_SESSION['finished0']. '  ';
echo 'finished1:'.$_SESSION['finished1']. '  ';
echo 'finished2:'.$_SESSION['finished2']. '  '; */ ?>

</body>