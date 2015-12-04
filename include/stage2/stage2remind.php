<?php if($_SESSION['treattype2']==='remind' and $thetype==='stage2decision'){?>
<?php 	     $id=$_SESSION['id'];
             $rowvars=mysql_fetch_assoc(mysql_query("SELECT stage2d, stage2y, stage2k, stage2r1, stage2r2, stage1chosentype FROM results WHERE id=$id ")); 
             $k=$rowvars['stage2k'];
             $y=$rowvars['stage2y'];
             $r1=$rowvars['stage2r1'];
             $r2=$rowvars['stage2r2'];
			 $decision=$rowvars['stage2d'];
			 $types=$rowvars['stage1chosentype']; ?>

<?php 
$soonpay1=$k; 
$soonpay2=$k + $y;
$laterpay1=$k*(1+$r1); 
$laterpay2=$k*(1+$r2);
$soontime1='that day';
$latertime1='2 months after that day';
$soontime2='that day';
$latertime2='2 months after that day';
/* echo "k : ".$k; 
echo "y : ".$y; 
echo "r1 : ".$r1;
echo "r2 : ".$r2;
echo "types : ".$types; */

$soonpay1=round($soonpay1, 2);
$soonpay2=round($soonpay2, 2);
$laterpay1=round($laterpay1, 2);
$laterpay2=round($laterpay2, 2);
?>

<table id="login3">

<tr>
<td><p class="big">In stage 1, you were given the following question and choose the option on the 
 <?php if($decision==='option1'){echo "left:";}?>
 <?php if($decision==='option2'){echo "right:";}?>
</p></td>
</tr>

<tr><td>
<table class="old">
<tr><td align="right"></td><td> <p  class="big"><b>Choice set A</b></p></td>  <td width=5%></td> <td><p  class="big"><b>Choice set B</b></p></td> <td></td> </tr>
<tr> <td> <input type="radio" name="choice" value="option1"  title="Choose one of the two options in each row" disabled <?php if($decision==='option1'){echo " checked";}?>/> </td> 

<?php if($types==='onlylate'){?>
<td><p class="big">When I log in to stage 2 of the experiment, I would like to make a choice between:<br> receiving <?php echo "$soonpay1"." Euro"; ?> <?php echo "$soontime1"; ?><br> and  <br>receiving <?php echo "$laterpay1"." Euro"; ?> <?php echo "$latertime1"; ?></p> </td>
<td> </td> 
<td><p class="big">When I log in to stage 2 of the experiment, I would like to receive <?php echo "$laterpay2"." Euro"; ?> <?php echo "$latertime2"; ?></p>  </td>
<?php } /* if($types==='onlylate') */?>

<?php if($types==='onlyearly'){?>
<td><p class="big">When I log in to stage 2 of the experiment, I would like to make a choice between:<br> receiving <?php echo "$soonpay1"." Euro"; ?> <?php echo "$soontime1"; ?><br> and  <br>receiving <?php echo "$laterpay1"." Euro"; ?> <?php echo "$latertime1"; ?></p> </td>
<td> </td> 
<td><p class="big">When I log in to stage 2 of the experiment, I would like to receive <?php echo "$soonpay2"." Euro"; ?> <?php echo "$soontime2"; ?></p>  </td>
<?php } /* if($types==='onlyearly') */?>

<?php if($types==='both'){?>
<td><p class="big">When I log in to stage 2 of the experiment, I would like to make a choice between:<br> receiving <?php echo "$soonpay1"." Euro"; ?> <?php echo "$soontime1"; ?><br> and  <br>receiving <?php echo "$laterpay1"." Euro"; ?> <?php echo "$latertime1"; ?></p> </td>
<td> </td> 
<td><p class="big">When I log in to stage 2 of the experiment, I would like to make a choice between:<br> receiving <?php echo "$soonpay2"." Euro"; ?> <?php echo "$soontime2"; ?><br> and  <br>receiving <?php echo "$laterpay2"." Euro"; ?> <?php echo "$latertime2"; ?></p>  </td>
<?php } /* if($types==='both') */?>

<td> <input type="radio" name="choice" value="option2"  title="Choose one of the two options in each row" disabled <?php if($decision==='option2'){echo " checked";}?>/> </td> </tr>       
</table>
</td></tr>

<tr>
<td><p class="big">Therefore, 
<?php if($types==='both'){echo " you now need to make the following choice : ";}?>
<?php if($types==='onlylate' and $decision==='option1' ){echo " you now need to make the following choice : ";}?>
<?php if($types==='onlyearly' and $decision==='option1' ){echo " you now need to make the following choice : ";}?>
<?php if($types==='onlylate' and $decision==='option2' ){echo " you now need to confirm the payment below : ";}?>
<?php if($types==='onlyearly' and $decision==='option2' ){echo " you now need to confirm the payment below : ";}?>

<?php  /* echo "types : ".$types;
echo "decision : ".$decision; */ ?>
</p></td>
</tr>

</table>


<?php unset($k); unset($y); unset($r1); unset($r2); unset($decision); unset($typeq); unset($soonpay1); unset($soonpay2); unset($laterpay1); unset($laterpay2); unset($soontime1); unset($soontime2); unset($latertime1); unset($latertime2);?>
<?php } /* if($_SESSION['treattype2']==='remind' and $thetype==='stage2decision') */ ?>
