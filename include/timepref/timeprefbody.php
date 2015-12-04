<?php if($_SESSION['finished0']==0 and $_SESSION['finishedt']==0){?>
<?php unset($choice);?>

<?php require 'include/timepref/timeprefanswercounter.php'; ?>			

<?php if(!$_SESSION['submitexample'] and $_SESSION['finished0']==0 and $_SESSION['finishedt']==0){?>
<?php require 'include/timepref/timeprefinstructions.php';  ?>
<?php } /* if(!$_SESSION['submitexample'] and $_SESSION['finished0']==0 and $_SESSION['finishedt']==0)*/?>
<?php if($_SESSION['submitexample']==1){ ?>

<?php if($numanswers>=$noquestions and $noquestions>0){
$id=$_SESSION['id'];
$queryu = "UPDATE tut_users SET finishedt=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' WHERE id=$id" ;
mysql_query($queryu) or die(mysql_error());
unset($queryu);
header( 'Location: include/subjectredirect.php?instructions');			
} /* if($numanswers=$noquestions) */
?>


 <form id="login2" method="post" action="">
 <A NAME="mistake"></A>
 <?php
						
						if($_SESSION['errs0'])
						{
							echo '<div class="err">'.$_SESSION['errs0'].'</div>';
							unset($_SESSION['errs0']);
							
						}
						
						/* if($_SESSION['successs0'])
						{
							echo '<div class="success">'.$_SESSION['successs0'].'</div>';
							unset($_SESSION['successs0']);
					
						} */
						
					?> 
<table >
             <?php if($notime>$numanswers and $numanswers<$noquestions){?>
             <?php 
             		$numanswersplusone=$numanswers+1;
             		$row18="SELECT soonpay, laterpay, soontime, latertime FROM timequestions WHERE id4=$numanswersplusone "; 
					$result18 = mysql_query($row18) or die (mysql_error());
					$row18 = mysql_fetch_assoc($result18);
					$soonpay=$row18['soonpay'];
					$laterpay=$row18['laterpay'];
					$soontime=$row18['soontime'];
					$latertime=$row18['latertime'];
				?>
<tr><td width="0%"> </td> <td width="50%"><p class="big"><b>Option A</b></p> </td>  <td width="0%"> </td><td width="50%"> <p><b>Option B</b></p> </td> <td width="0%"> </td> </tr>
<tr><td> <input type="radio" name="choice" value="option1"  title="Choose one of the two options in each row" /> </td> 
 <td><p  class="big">Receive <?php echo "$soonpay"." Euro"; ?> <?php echo "$soontime"; ?></p></td>
<td> </td> 
<td><p  class="big">Receive <?php echo "$laterpay"." Euro"; ?> <?php echo "$latertime"; ?></p></td>
<td> <input type="radio" name="choice" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
             
             <?php } elseif($notime<=$numanswers and $numanswers<$noquestions){  ?>
             <?php  $numanswersplusone=$numanswers+1;
             		$lookforid=$numanswersplusone-$notime;
             		$row17="SELECT highpay, lowpay, highprob, lowprob, risklesspay FROM riskquestions WHERE id3=$lookforid "; 
					$result17 = mysql_query($row17) or die (mysql_error());
					$row17 = mysql_fetch_assoc($result17);
					$highpay=$row17['highpay'];
					$lowpay=$row17['lowpay'];
					$highprob=$row17['highprob']*100;
					$lowprob=$row17['lowprob']*100;
					$risklesspay=$row17['risklesspay'];
				?>
            <tr><td width="4%"> </td> <td width="54%"><p class="big"><b>Option A</b></p> </td>  <td width="4%"> </td><td width="34%"> <p><b>Option B</b></p> </td> <td width="4%"> </td> </tr>				
<tr><td> <input type="radio" name="choice" value="option1"  title="Choose one of the two options in each row" /> </td> 
 <td><p  class="big">Receive <?php echo "$highpay"." Euro"; ?> with <?php echo "$highprob"." %"; ?> chance</p>  
<p class="big">Receive <?php echo "$lowpay"." Euro"; ?> with <?php echo "$lowprob"." %"; ?> chance </p></td>
<td> </td> 
<td> <p class="big">Receive <?php echo "$risklesspay"." Euro"; ?> </p> </td> 
<td> <input type="radio" name="choice" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
             
             <?php } /* elseif($notime<=$numanswers & numanswers<$noquestions){ */?>            
            
</table>
<?php require 'include/timepref/timeprefsubmitmenu.php';?>
    
    </form> 
            <?php /*  echo "numanswers:".$numanswers. " "; echo "notime:".$notime. " "; echo "noquestions:".$noquestions. " "; */ ?>
<?php } /* if($_SESSION['submitexample']==1)*/ ?>
<?php } /* if($_SESSION['finished0']==0 and $_SESSION['finishedt']==0)*/?>
        