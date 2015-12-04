<?php if(!isset($_SESSION['sopinstructions'])){?>
<?php /* echo "I am in instructions";*/ ?>
<?php $row18="SELECT k, y FROM stagequestions WHERE id5='1' "; 
$result18 = mysql_query($row18) or die (mysql_error());
$row18 = mysql_fetch_assoc($result18);
$k=$row18['k'];
$y=$row18['y'];
$r1=0.7;
$r2=0.3;
$soonpay1=$k;
$laterpay1=$k*(1+$r1);
$soonpay2=$k+$y;
$laterpay2=$k*(1+$r2);
$soontime1='that day';
$latertime1='2 months after that day';
$soontime2='that day';
$latertime2='2 months after that day';

$latertime1r='2 months from now';
$soontime1r='now';

?>
<?php $trid=$_SESSION['treatment']; ?>
<?php $query6b="SELECT DATEDIFF(intv2start, NOW()) FROM treatments WHERE treat='$trid'"; 
$result6b = mysql_query($query6b) or die (mysql_error());
$row6b = mysql_fetch_row($result6b);
$days1=$row6b[0];
unset($row6b);?>
<?php $query6b="SELECT DATEDIFF(intv2end, NOW()) FROM treatments WHERE treat='$trid'"; 
$result6b = mysql_query($query6b) or die (mysql_error());
$row6b = mysql_fetch_row($result6b);
$days2=$row6b[0];
?>

<form id="login3" method="post" action="">
<A NAME="mistake"></A>
 
<h1>Instructions</h1>
<table ><tr><td> </td></tr>
<tr><td>
<?php
						
						if($_SESSION['errs1'])
						{
							echo '<div class="err">'.$_SESSION['errs1'].'</div>';
							unset($_SESSION['errs1']);
							
						}
						
						/* if($_SESSION['successs1'])
						{
							echo '<div class="success">'.$_SESSION['successs1'].'</div>';
							unset($_SESSION['successs1']);
					
						}*/						
					?> 
</td></tr>
<tr><td>
 <p class="big">In this part of the experiment, you answer 3 types of questions. The first type looks like this: 
 </p>
 
 </td></tr>

<tr><td>
<table  >
<tr><td align="right"></td><td> <p  class="big"><b>Choice set A</b></p></td>  <td width=1%></td> <td><p  class="big"><b>Choice set B</b></p></td> <td></td> </tr>
<tr> <td> <input type="radio" name="example" value="option1"  title="Choose one of the two options in each row" /> </td> 
<td><p class="big">When I log in to stage 2 of the experiment, I would like to make a choice between:<br> receiving <?php echo "$soonpay1"." Euro"; ?> <?php echo "$soontime1"; ?><br> and  <br>receiving <?php echo "$laterpay1"." Euro"; ?> <?php echo "$latertime1"; ?></p> </td>
<td> </td> 
<td><p class="big">When I log in to stage 2 of the experiment, I would like to receive <?php echo "$laterpay2"." Euro"; ?> <?php echo "$latertime2"; ?></p>  </td>
<td> <input type="radio" name="example" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
</table>
</td></tr>

<tr><td>
<p class="big">The second type looks like this:</p>
</td></tr>
 
<tr><td>
<table  >
<tr><td align="right"></td><td> <p  class="big"><b>Choice set A</b></p></td>  <td width=1%></td> <td><p  class="big"><b>Choice set B</b></p></td> <td></td> </tr>
<tr> <td> <input type="radio" name="example" value="option1"  title="Choose one of the two options in each row" /> </td> 
<td><p class="big">When I log in to stage 2 of the experiment, I would like to make a choice between:<br> receiving <?php echo "$soonpay1"." Euro"; ?> <?php echo "$soontime1"; ?><br> and  <br>receiving <?php echo "$laterpay1"." Euro"; ?> <?php echo "$latertime1"; ?></p> </td>
<td> </td> 
<td><p class="big">When I log in to stage 2 of the experiment, I would like to receive <?php echo "$soonpay2"." Euro"; ?> <?php echo "$soontime2"; ?></p>  </td>
<td> <input type="radio" name="example" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
</table>
</td></tr>
 
<tr><td>
<p class="big">The third type looks like this:</p>
</td></tr>
 
<tr><td>
<table  >
<tr><td align="right"></td><td> <p  class="big"><b>Choice set A</b></p></td>  <td width=1%></td> <td><p  class="big"><b>Choice set B</b></p></td> <td></td> </tr>
<tr> <td> <input type="radio" name="example" value="option1"  title="Choose one of the two options in each row" /> </td> 
<td><p class="big">When I log in to stage 2 of the experiment, I would like to make a choice between:<br> receiving <?php echo "$soonpay1"." Euro"; ?> <?php echo "$soontime1"; ?><br> and  <br>receiving <?php echo "$laterpay1"." Euro"; ?> <?php echo "$latertime1"; ?></p> </td>
<td> </td> 
<td><p class="big">When I log in to stage 2 of the experiment, I would like to make a choice between:<br> receiving <?php echo "$soonpay2"." Euro"; ?> <?php echo "$soontime2"; ?><br> and  <br>receiving <?php echo "$laterpay2"." Euro"; ?> <?php echo "$latertime2"; ?></p>  </td>
<td> <input type="radio" name="example" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
</table>
</td></tr>

<tr><td>
<p class="big">After you have answered to all questions the computer will pick a question randomly and play this question out in the second stage of the experiment. Note that the second stage of the experiment takes place
  <?php if($_SESSION['sintv2start']===$_SESSION['sintv2end'])
  {$echothis=$_SESSION['sintv2start']; echo 'on '.$echothis;}
  else{$echothis1=$_SESSION['sintv2start'];$echothis2=$_SESSION['sintv2end']; 
  echo 'from '.$echothis1.' to '.$echothis2;}?>. Let us assume that the computer randomly picks the type-1 question above and you chose the option on the left in this question. If this is the case, when you log in for the second stage you will see the following question:</p>
</td></tr>
 
<tr><td>
<table  >
<tr><td align="right"></td><td width="40%"> <p  class="big"><b>Option A</b></p></td>  <td width=5%></td> <td width="40%"><p  class="big"><b>Option B</b></p></td> <td></td> </tr>
<tr> <td> <input type="radio" name="example" value="option1"  title="Choose one of the two options in each row" /> </td> 
<td><p  class="big">Receive <?php echo "$soonpay1"." Euro"; ?> <?php echo "$soontime1r"; ?> </p>  </td>
<td> </td> 
<td><p  class="big">Receive <?php echo "$laterpay1"." Euro"; ?> <?php echo "$latertime1r"; ?> </p>  </td>
<td> <input type="radio" name="example" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
</table>
</td></tr>

<tr><td>
<p class="big">In the second stage, you will make a choice between these two options and you will receive the chosen amount in the chosen time.</p>
<p class="big">Let us assume that the computer randomly picked the type-2 question above and you chose the option on the right in this question. When you log in for the second stage, you will not make a choice since you chose the option on the right. The money will be sent to your bank account in the given time. Of course, if you do not log in for the second stage the payment will be cancelled.
</td></tr>


<tr><td> <p class="big"> Note that stage 2 starts on <?php echo $_SESSION['sintv2start'];?> and is accessible until <?php echo $_SESSION['sintv2end'];?>. Therefore, you have to login once again <?php if($days1==$days2){echo $days1;}else{echo $days1." to ".$days2;}?> days later.</p>
</td></tr>

</table>

<br>
<p class="big"><input type="checkbox" name="read" id=" read" value="1" /> I have read the instructions. </p>
  			      
<?php require 'include/browserchecker.php';?>
  			      
<table><tr>
<td width="<?php if($browser==='ie'){ echo '32%'; }else{ echo '41%'; }?>">
</td>
<td width="<?php if($browser==='ie'){ echo '33%'; }else{ echo '33%'; }?>"> 	
 <div class="submit2" > 
     <input type="submit" id="submit2" name="submitinstruct" value="Next" />
	 </div>
	 </td>
<td width="<?php if($browser==='ie'){ echo '35%'; }else{ echo '26%'; }?>">
</td></tr></table>

</form>
<?php } /*if(!isset($_SESSION['sopinstructions']))*/ ?>