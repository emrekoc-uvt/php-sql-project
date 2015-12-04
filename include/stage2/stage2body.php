<?php if($_SESSION['finished1']==1 and $_SESSION['finished2']==0){?>
<?php unset($choice);?>

<?php require 'include/stage2/stage2answercounter.php'; ?>			

<?php if($numanswers>=$noquestions and $noquestions>0){
$id=$_SESSION['id'];
$queryu = "UPDATE tut_users SET finished2=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' WHERE id=$id" ;
mysql_query($queryu) or die(mysql_error());
unset($queryu);
header( 'Location: include/subjectredirect.php');			
} /* if($numanswers=$noquestions) */
?>

<?php require 'include/stage2/stage2remind.php'; ?>

<form id="login2" method="post" action="">
 <A NAME="mistake"></A>
 <?php
						
						if($_SESSION['errs2'])
						{
							echo '<div class="err">'.$_SESSION['errs2'].'</div>';
							unset($_SESSION['errs2']);
							
						}
						
						/* if($_SESSION['successs2'])
						{
							echo '<div class="success">'.$_SESSION['successs2'].'</div>';
							unset($_SESSION['successs2']);
					
						} */
						
					?> 
<table><tr><td>			
<?php if($thetype==='stage2decision'){?>
             
             <?php 
             $id=$_SESSION['id'];
             $rowvars=mysql_fetch_assoc(mysql_query("SELECT stage2d, stage2y, stage2k, stage2r1, stage2r2, stage1chosentype FROM results WHERE id=$id ")); 
             $k=$rowvars['stage2k'];
             $y=$rowvars['stage2y'];
             $r1=$rowvars['stage2r1'];
             $r2=$rowvars['stage2r2'];
			 $decision=$rowvars['stage2d'];
			 $typeq=$rowvars['stage1chosentype'];
             /*  echo "k :".$k."<br>"."y :".$y."<br>"."r1 :".$r1."<br>"."r2 :".$r2."<br>"."decision :".$decision."<br>";*/ 
             ?>
             
             <?php 
					if($decision==='option1'){ 
					$soonpay=$k;
					$laterpay=$k*(1+$r1);
					} /* ($decision==='option1') */
					if($decision==='option2'){ 
					$soonpay=$k+$y;
					$laterpay=$k*(1+$r2);
					} /* ($decision==='option2') */
					$soontime='now';
					$latertime='2 months from now';
					$soonpay=round($soonpay, 2);
					$laterpay=round($laterpay, 2);
					$_SESSION['typeq']=$typeq; $_SESSION['decision']=$decision; $_SESSION['soonpay']=$soonpay; $_SESSION['laterpay']=$laterpay; $_SESSION['soontime']=$soontime; $_SESSION['latertime']=$latertime;
				?>




<table >

	<?php if($_SESSION['typeq']==='both'){?>
	<tr><td width="4%"> </td> <td width="44%"><p class="big"><b>Option A</b></p> </td>  <td width="4%"> </td><td width="44%"> <p><b>Option B</b></p> </td> <td width="4%"> </td> </tr>				
	<tr><td> <input type="radio" name="choice" value="option1"  title="Choose one of the two options in each row" /> </td> 
 	<td><p  class="big">Receive <?php echo "$soonpay"." Euro"; ?> <?php echo "$soontime"; ?> </p>  </td>
	<td> </td> 
	<td><p  class="big">Receive <?php echo "$laterpay"." Euro"; ?> <?php echo "$latertime"; ?> </p>  </td>
	<td> <input type="radio" name="choice" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
	<?php } /* if($_SESSION['typeq']==='both') */ ?>



	<?php if($_SESSION['typeq']==='onlylate'){?>

	<?php if($decision==='option1'){ ?>
	<tr><td width="4%"> </td> <td width="44%"><p class="big"><b>Option A</b></p> </td>  <td width="4%"> </td><td width="44%"> <p><b>Option B</b></p> </td> <td width="4%"> </td> </tr>				
	<tr><td> <input type="radio" name="choice" value="option1"  title="Choose one of the two options in each row" /> </td> 
 	<td><p  class="big">Receive <?php echo "$soonpay"." Euro"; ?> <?php echo "$soontime"; ?> </p>  </td>
	<td> </td> 
	<td><p  class="big">Receive <?php echo "$laterpay"." Euro"; ?> <?php echo "$latertime"; ?> </p>  </td>
	<td> <input type="radio" name="choice" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       
	<?php } /* if($decision==='option1') */ ?>

	<?php if($decision==='option2'){ ?>
	<tr>
	<td> <input type="radio" name="choice" value="confirmlate"  title="Confirm your choice" /> </td>        
	<td><p  class="big">Receive <?php echo "$laterpay"." Euro"; ?> <?php echo "$latertime"; ?> </p>  </td>
	</tr>
	<?php } /* if($decision==='option2') */ ?>
	<?php } /* if($_SESSION['typeq']==='onlylate') */?>



	<?php if($_SESSION['typeq']==='onlyearly'){?>

	<?php if($decision==='option1'){ ?>
	<tr><td width="4%"> </td> <td width="44%"><p class="big"><b>Option A</b></p> </td>  <td width="4%"> </td><td width="44%"> <p><b>Option B</b></p> </td> <td width="4%"> </td> </tr>				
	<tr><td> <input type="radio" name="choice" value="option1"  title="Choose one of the two options in each row" /> </td> 
 	<td><p  class="big">Receive <?php echo "$soonpay"." Euro"; ?> <?php echo "$soontime"; ?> </p>  </td>
	<td> </td> 
	<td><p  class="big">Receive <?php echo "$laterpay"." Euro"; ?> <?php echo "$latertime"; ?> </p>  </td>
	<td> <input type="radio" name="choice" value="option2"  title="Choose one of the two options in each row" /> </td> </tr>       	
	<?php } /* if($decision==='option1') */ ?>


	<?php if($decision==='option2'){ ?>
	<tr>
	<td> <input type="radio" name="choice" value="confirmsoon"  title="Confirm your choice" /> </td>        
	<td><p  class="big">Receive <?php echo "$soonpay"." Euro"; ?> <?php echo "$soontime"; ?> </p>  </td>
	</tr>
	<?php } /* if($decision==='option2') */ ?>
	<?php } /* if($_SESSION['typeq']==='onlyearly') */?>

</table>
<?php } /* ($thisvariable==='stage2decision') */ ?>             

<?php if($thetype==='field'){?>
<p class="big"><?php echo $thequestion;?></p>		
		</td></tr>
		<tr><td>
		<table>
		<tr>
		<td width="188"><label for="choice"><p class="close">Your answer: </p></label> <input type="text" name="choice" class="field2" title="Answer" /></td>
		<td align="left"><p class="close"><?php echo " ".$theunit;?></p></td>		
		</tr>
		</table> 
<?php } /* if($thetype==='field'){ */ ?>

<?php if($thetype==='radio'){ ?>
			</td></tr>
			<tr><td>
			<p class="big"><?php echo $thequestion;?></p>					
			</td></tr>
			<tr><td>
			<table> 						
			<?php $i=0; while($i < $sizeradio){?>
			<?php echo "<tr height=\"40\"> " ;?>
			<?php if($radiooptions[$i]==='Other'){?>			
			<?php echo "<td align=\"right\" width=\"7%\"> <input type=\"radio\" name=\"choice\" value=\"".$radiooptions[$i]."\"  title=\"".$radiooptions[$i]."\" >  </td> <td align=\"left\"> <table class=\"normal\"><tr><td> <p class=\"big\"> ".$radiooptions[$i]." : </p></td></tr><tr><td> <p class=\"big\"><input type=\"text\" name=\"otherchoice\" class=\"field2\" title=\"Answer\" value=\"\" ></p> </td></tr></table></td>" ;?>
			<?php } else{ /* $radiooptions[$i]==='Other' */?>
			<?php echo "<td align=\"right\" width=\"7%\"> <input type=\"radio\" name=\"choice\" value=\"".$radiooptions[$i]."\"  title=\"".$radiooptions[$i]."\" > </td> <td align=\"left\"> <p class=\"big\"> ".$radiooptions[$i]."</p></td> " ;?>
			<?php } /* else $radiooptions[$i]==='Other'*/?>
			<?php echo "</tr>";?> 
			<?php $i=$i + 1 ; } /* while($i<=$sizeradio) */?>
			</table>
<?php } /* if($thetype==='radiopic') */ ?>

</td></tr>
<tr><td>
<?php require 'include/stage2/stage2submitmenu.php';?>
</td></tr>
</table>    
</form> 
            <?php /*  echo "numanswers:".$numanswers. " "; echo "notime:".$notime. " "; echo "noquestions:".$noquestions. " "; */ ?>
<?php } /* if($_SESSION['finished1']==1 and $_SESSION['finished2']==0)*/?>
        