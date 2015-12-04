
<?php 
$row17="SELECT highpay, lowpay, highprob, lowprob, risklesspay FROM riskquestions WHERE id3=1 "; 
$result17 = mysql_query($row17) or die (mysql_error());
$row17 = mysql_fetch_assoc($result17);
$highpay=$row17['highpay'];
$lowpay=$row17['lowpay'];
$highprob=$row17['highprob']*100;
$lowprob=$row17['lowprob']*100;
$risklesspay=$row17['risklesspay'];
?>
<?php $row18="SELECT soonpay, laterpay, soontime, latertime FROM timequestions WHERE id4=1 "; 
$result18 = mysql_query($row18) or die (mysql_error());
$row18 = mysql_fetch_assoc($result18);
$soonpay=$row18['soonpay'];
$laterpay=$row18['laterpay'];
$soontime=$row18['soontime'];
$latertime=$row18['latertime'];
?>

<form id="login2" method="post" action="">
<A NAME="mistake2"></A>
 
<h1>Instructions</h1>
<table>
<tr><td>
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
					
						}*/						
					?> 
</td></tr>
<tr><td>
 <p class="big">This session consists of 3 parts. In this part you need to answer <?php echo $noquestions; ?> questions within the given amount of time. One of the questions will be chosen randomly by the computer and you will receive some payment depending on the answer that you gave for the chosen questions.</p>
 <p class="big">There are two different types of questions. The first type involves a choice between receiving a monetary payment sooner (Option A) or receiving a different amount later (Option B). These questions are similar to the following example:</p>
 </td></tr>

<tr><td>
<table  >
<tr><td align="right"></td><td> <p  class="big"><b>Option A</b></p></td>  <td width=5%></td> <td><p  class="big"><b>Option B</b></p></td> <td></td> </tr>
<tr> <td> <input type="radio" name="example" value="option1"  title="Choose one of the two options in each row" /> </td> 
<td><p  class="big">Receive <?php echo "$soonpay"." Euro"; ?> <?php echo "$soontime"; ?> </p>  </td>
<td> </td> 
<td><p  class="big">Receive <?php echo "$laterpay"." Euro"; ?> <?php echo "$latertime"; ?> </p>  </td>
<td> <input type="radio" name="example" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
</table>
</td></tr>

<tr><td>
 <p class="big">If this question is chosen randomly by the computer, depending on the option that you chose, you will either receive <?php echo "$soonpay"." Euro"; ?> <?php if($soontime==='now'){echo "immediately";}else{echo $soontime;}?> or <?php echo "$laterpay"." Euro"; ?> <?php if($latertime==='now'){echo "immediately";}else{echo $latertime;}?>. The second type of questions involves a choice between two payment options. These questions are similar to the following example:</p>
 </td></tr>
<tr><td>
<table  >
<tr> <td align="right"></td><td> <p  class="big"><b>Option A</b></p></td> <td width=5%></td> <td><p  class="big"><b>Option B</b></p></td> <td></td> </tr>
<tr> <td > <input type="radio" name="example" value="option1"  title="Choose one of the two options in each row" /> </td> 
<td><p  class="big">Receive <?php echo "$highpay"." Euro"; ?> with <?php echo "$highprob"." %"; ?> chance</p>  
<p class="big">Receive <?php echo "$lowpay"." Euro"; ?> with <?php echo "$lowprob"." %"; ?> chance</p></td>
<td> </td> 
<td> <p class="big">Receive <?php echo "$risklesspay"." Euro"; ?> </p> </td> 
<td> <input type="radio" name="example" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
</table>
</td></tr>

<tr><td>
<p class="big">Let us assume that the computer picked up this question and you chose option B as an answer. In this case you will receive <?php echo $risklesspay." Euro";?> immediately. If you chose option A instead, the computer would make another random draw. With <?php echo $highprob." %";?> chance you would receive <?php echo "$highpay"." Euro"; ?> and with <?php echo "$lowprob"." %"; ?> chance you would receive  <?php echo "$lowpay"." Euro"; ?> immediately. Please think carefully before you make a choice. All payments will be sent to the bank account number that you specified at the beginning of the experiment. </p>
</td></tr>


</table>
<p class="big"><input type="checkbox" name="read" id=" read" value="1" /> I have read the instructions. </p>
<?php require 'include/browserchecker.php';?>
  			      
<table><tr>
<td width="<?php if($browser==='ie'){ echo '28%'; }else{ echo '38%'; }?>">
</td>
<td width="<?php if($browser==='ie'){ echo '33%'; }else{ echo '33%'; }?>"> 	
 <div class="submit2" > 
     <input type="submit" id="submit2" name="submitexample" value="Next" />
	 </div>
	 </td>
<td width="<?php if($browser==='ie'){ echo '39%'; }else{ echo '29%'; }?>">
</td></tr></table>
</form>
