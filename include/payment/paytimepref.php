		<?php require 'include/timepref/timeprefanswercounter.php'; ?>			
		<?php require 'include/checkfinished.php';?>
		<?php if($_SESSION['id'] and $numanswers>=$noquestions and $noquestions>0 and $_SESSION['finishedt']==0){?>
<?php /* echo "in the payment file"; */?>
		<?php 
		$subjectid=$_SESSION['id'];
		$row14=mysql_fetch_assoc(mysql_query("SELECT bank FROM tut_users WHERE id='$subjectid' "));		
		$banknum=$row14['bank'];  
		unset($row14); 
		?>
		
		<?php 
			$playrow=rand(1,$noquestions);
			/* echo "playrow:".$playrow; */
			if($playrow<=$notime){
		$rowtimelist=mysql_fetch_assoc(mysql_query("SELECT soonpay, laterpay, soontime, latertime FROM timequestions WHERE id4=$playrow ")); 
					$soonpay=$rowtimelist['soonpay'];
					$laterpay=$rowtimelist['laterpay'];
					$soontime=$rowtimelist['soontime'];
					$latertime=$rowtimelist['latertime'];
		$playrowminusone=$playrow-1;
		$retreivethis=$variables[$playrowminusone];
		/* echo "retreivethis: ".$retreivethis; */		
		$rowanswer=mysql_fetch_assoc(mysql_query("SELECT $retreivethis FROM results WHERE id='$subjectid' ")); 
		$answer = implode('<br />',$rowanswer);	
		/* echo "answer: ".$answer; */
		if($answer==='option1')	{		
			$paymentamount=$soonpay;
			$paymenttime=$soontime;	 
		} elseif($answer==='option2'){
			$paymentamount=$laterpay;
			$paymenttime=$latertime;			
		}else{echo "Unexpected error! #1a";}/*if(answer==option1 or option2) */
		
		
			}elseif($playrow>$notime){
		$playriskrow=$playrow-$notime;
		$rowrisklist=mysql_fetch_assoc(mysql_query("SELECT highpay, lowpay, highprob, lowprob, risklesspay FROM riskquestions WHERE id3=$playriskrow ")); 
					$highpay=$rowrisklist['highpay'];
					$lowpay=$rowrisklist['lowpay'];
					$highprob=$rowrisklist['highprob'];
					$lowprob=$rowrisklist['lowprob'];
					$risklesspay=$rowrisklist['risklesspay'];
		$playrowminusone=$playrow-1;
		$retreivethis=$variables[$playrowminusone];
		/* echo "retreivethis: ".$retreivethis; */
		$rowanswer=mysql_fetch_assoc(mysql_query("SELECT $retreivethis FROM results WHERE id='$subjectid' ")); 
		$answer = implode('<br />',$rowanswer);	
		/* echo "answer: ".$answer; */
					
		if($answer==='option1')	{		
			$playlottery=rand(0,10000);
			$playlottery=$playlottery/10000;
			/* echo "playlottery:".$playlottery ;*/
			if($playlottery<$highprob){
			$paymentamount=$highpay;
			$paymenttime="now";				
			}/* if($playlottery<$highprob)*/else{
			$paymentamount=$lowpay;
			$paymenttime="now";			
			}/*if($playlottery<$highprob)*/
		} elseif($answer==='option2'){
			$paymentamount=$risklesspay;
			$paymenttime="now";			
		}else{echo "Unexpected error! #1b "; /* echo "answer: ".$answer ;*/ }/*if(answer==option1 or option2) */
				
			}else{echo "Unexpected error! #2";}/* elseif($playrow<=$notime or >){*/
			
			
			$id=$_SESSION['id'];
			$paymentstatus="not completed";
			?>
			
			<?php 
			

$queryc = "INSERT INTO payments(id, playrow, updatetime5, ip5, 
paymentamount, paymenttime, paymentstatus, dayssince, banknum) 	
	VALUES( '".$id."', '".$playrow."', NOW(), '".$_SERVER['REMOTE_ADDR']."', 
	'".$paymentamount."', '".$paymenttime."', '".$paymentstatus."', 0, '".$banknum."' )" ;
		$resultqueryc = mysql_query($queryc) or die (mysql_error());
		unset($queryc);
		
$queryu = "UPDATE tut_users SET finishedt=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id" ;
		mysql_query($queryu) or die(mysql_error());
		unset($queryu);
		
		/* $_SESSION['successc']="Part 1 is completed."; */
		header( 'Location: include/subjectredirect.php?instructions');		
			exit;		?>
			
			<?php } /*  if($_SESSION['id'] and $numanswers>=$noquestions and $noquestions>0){ */?>