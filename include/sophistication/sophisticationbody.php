<?php /* echo "somewhere in the body"; */ ?>
<?php if(!isset($_SESSION['sopinstructions'])){?>
<?php /* echo "to instructions"; */ ?>
<?php  require 'include/sophistication/sophisticationinstructions.php';  ?>
<?php } /* if(!isset($_SESSION['sopinstructions'])) */?>
<?php if($_SESSION['sopinstructionsstory']==1){?>
<?php /* echo "to instructions"; */ ?>
<?php  require 'include/sophistication/sophisticationstoryquestion.php';  ?>
<?php } /* if($_SESSION['sopinstructionsstory']==1) */?>
<?php if($_SESSION['sopinstructions']==1 and !isset($_SESSION['sopinstructionsstory']) and $_SESSION['finished0']==1 and $_SESSION['finishedt']==1 and $_SESSION['finished1']==0){ ?>
<?php /* echo "to body";*/ ?>
<?php require 'include/sophistication/sophisticationanswercounter.php';?>
<?php require 'include/sophistication/sophisticationkycheck.php';?>



<?php 
$soonpay1=$k; 
$soonpay2=$k+$y;
$laterpay1=$k*(1+$r1); 
$laterpay2=$k*(1+$r2);
$soontime1='that day'; 
$soontime2='that day';
$latertime1='2 months after that day'; 
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

<?php if($numanswers>=$noquestions and $noquestions>0){
$id=$_SESSION['id'];
$queryu = "UPDATE tut_users SET finished1=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' WHERE id=$id" ;
mysql_query($queryu) or die(mysql_error());
unset($queryu);
header( 'Location: include/subjectredirect.php');			
} /* if($numanswers=$noquestions) */
?>

<A NAME="mistake"></A>

<?php if(isset($_SESSION['treattype'])){?>
<table id="login3">
<tr><td>
<h1>Please read the story before you answer to the questions below</h1>
</td></tr>
<tr><td>
<?php require 'include/sophistication/sophisticationstory.php';?>
</td></tr></table>
<?php } /* if(isset($_SESSION['treattype'])) */ ?>


<form id="login3" method="post" action="">
 
<table>
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
<table  >
<tr><td align="right"></td><td> <p  class="big"><b>Choice set A</b></p></td>  <td width=5%></td> <td><p  class="big"><b>Choice set B</b></p></td> <td></td> </tr>
<tr> <td> <input type="radio" name="choice" value="option1"  title="Choose one of the two options in each row" /> </td> 

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

<td> <input type="radio" name="choice" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
</table>
</td></tr>

<tr><td>
<p class="big">Note that stage 2 starts on <?php echo $_SESSION['sintv2start'];?> and is accessible until <?php echo $_SESSION['sintv2end'];?>. Therefore, you have to login once again <?php if($days1==$days2){echo $days1;}else{echo $days1." to ".$days2;}?> days later.</p>
</td></tr>
<tr><td>
<?php require 'include/sophistication/sophisticationsubmitmenu.php';?>
</td></tr>
</table>
</form>

<?php } /* if($_SESSION['sopinstructions']==1 and $_SESSION['finished0']==1 and $_SESSION['finishedt']==1 and $_SESSION['finished1']==0) */ ?>
