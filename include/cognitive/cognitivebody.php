<?php if($_SESSION['finished0']==0 and $_SESSION['finishedt']==1){?>
<?php unset($choice);?>
 <form id="login2" method="post" action="">
<?php require 'include/cognitive/cognitiveanswercounter.php';?>
<?php if($numanswers>=$noquestions and $noquestions>0){
$id=$_SESSION['id'];
$queryu = "UPDATE tut_users SET finished0=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' WHERE id=$id" ;
mysql_query($queryu) or die(mysql_error());
unset($queryu);
header( 'Location: include/subjectredirect.php?instructions');			
exit;
} /* if($numanswers=$noquestions) */
?>

 <A NAME="mistake"></A>
 <?php
						
						if($_SESSION['errc'])
						{
							echo '<div class="err">'.$_SESSION['errc'].'</div>';
							unset($_SESSION['errc']);
							
						}
						
						/* if($_SESSION['successc'])
						{
							echo '<div class="success">'.$_SESSION['successc'].'</div>';
							unset($_SESSION['successc']);
					
						} */
						
					?> 
			
<table width="90%" cellspacing="0" >
<tr><td align="justify" valign="top"><p class="big"><?php echo $thequestion; ?></p></td></tr>

<?php if($thetype==='field'){?>
<tr><td align="justify" valign="top"> 
		<table><tr>
		<td width="188"><label for="choice"><p class="close">Your answer: </p></label> <input type="text" name="choice" class="field2" title="Answer" /></td>
		<td align="left"><p class="close"><?php echo $theunit;?></p></td>		
		</tr></table> 
</td> </tr>
<?php } /* if($thetype==='field'){ */ ?>

<?php if($thetype==='radiopic'){ ?>
<tr><td align="justify" valign="top"> 
			<table> 
			<?php $i=1; while($i<=$sizeradio){?>
			<?php echo "<tr height=\"90\"> " ;?>
			<?php echo "<td> <input type=\"radio\" name=\"choice\" value=\"option".$i."\"  title=\"option ".$i."\" /> </td> " ;?>
			<?php echo "<td align=\"left\"><img src=\"img/option".$i.".jpg\"></td> ";?> 
			<?php echo "</tr>";?> 
			<?php $i=$i + 1 ; } /* while($i<=$sizeradio) */?>
			</table>
</td></tr>			
<?php } /* if($thetype==='radiopic') */ ?>

<?php if($thetype==='radio'){ ?>
<tr><td align="justify" valign="top"> 
			<table> 
			<?php $i=0; while($i < $sizeradio){?>
			<?php echo "<tr height=\"40\"> " ;?>
			<?php echo "<td align=\"right\" width=\"7%\"> <input type=\"radio\" name=\"choice\" value=\"".$radiooptions[$i]."\"  title=\"".$radiooptions[$i]."\" > </td> <td align=\"left\"> <p class=\"big\"> ".$radiooptions[$i]."</p></td> " ;?>
			<?php echo "</tr>";?> 
			<?php $i=$i + 1 ; } /* while($i<=$sizeradio) */?>
			</table>
</td></tr>			
<?php } /* if($thetype==='radiopic') */ ?>

</table>
<?php require 'include/cognitive/cognitivesubmitmenu.php';?>
</form> 
            <?php /*  echo "numanswers:".$numanswers. " ";  echo "noquestions:".$noquestions. " "; */  ?>
        <?php /* echo "thetype : ".$thetype; */ ?>
        <?php } /* if($_SESSION['finished0']==0 and $_SESSION['finishedt']==1)*/?>
        