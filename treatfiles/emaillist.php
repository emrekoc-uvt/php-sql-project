<?php if($_POST['sendfirstemail'] or $_POST['sendstage1email'] or $_POST['sendstage2email']){
	$erremail = array();
	$confirm=$_POST['confirm'] ;
if(!$confirm){
$erremail[]=' * Please confirm.';
} /* if(!confirm) */	
 if(!count($erremail)){
 	
 		if($_POST['sendfirstemail']){ 		
 		require 'adminfiles/email/firstemailbatch.php'; 
 		} /* if($_POST['sendfirstemail']) */
 	
 		if($_POST['sendstage1email']){ 		
 		require 'adminfiles/email/stage1emailbatch.php'; 
 		} /* if($_POST['sendstage1email']) */

 		if($_POST['sendstage2email']){ 		
 		require 'adminfiles/email/stage2emailbatch.php'; 
 		} /* if($_POST['sendstage2email']) */
 		 		
 	unset($_SESSION['query']);
 	$_SESSION['successemail']='Successfully sent to '.$_SESSION['countrows'].' participants';		 	
	header("Location: ?email");
 } /* (!count($erremail)) */

 if(count($erremail)){
 
		$_SESSION['erremail'] = implode('<br />',$erremail);
	} /* if(count($erremail)) */
	header("Location: ?email");
	exit;
} /* if($_POST['sendfirstemail'] or $_POST['sendstage1email'] or $_POST['sendstage2email']) */?>


<?php if($_POST['clear']){
unset($_SESSION['displaythelist']);
unset($_SESSION['treat']);	
unset($_SESSION['stage1complete']);
unset($_SESSION['stage2complete']);
unset($_SESSION['firstemail']);
unset($_SESSION['stage1email']);
unset($_SESSION['stage2email']);
unset($_SESSION['days']);
unset($_SESSION['daysstage']);
unset($_SESSION['users']);
unset($_SESSION['treats']);   
unset($_SESSION['query']);    
unset($_SESSION['countrows']);
} /* if($_POST['clear']) */?>

<?php if($_POST['email']){
	
unset($_SESSION['displaythelist']);
unset($_SESSION['treat']);	
unset($_SESSION['stage1complete']);
unset($_SESSION['stage2complete']);
unset($_SESSION['firstemail']);
unset($_SESSION['stage1email']);
unset($_SESSION['stage2email']);
unset($_SESSION['days']);
unset($_SESSION['daysstage']);
	
		$stage1complete=mysql_real_escape_string($_POST['stage1complete']);
		$stage2complete=mysql_real_escape_string($_POST['stage2complete']);
		$treat = mysql_real_escape_string($_POST['treat']);	
		$firstemail=mysql_real_escape_string($_POST['firstemail']);
		$stage1email=mysql_real_escape_string($_POST['stage1email']);
		$stage2email=mysql_real_escape_string($_POST['stage2email']);	
		$days=mysql_real_escape_string($_POST['days']);;
		$daysstage=mysql_real_escape_string($_POST['daysstage']);	
		$erremail = array();
		
		$_SESSION['text1']=' ';
		$_SESSION['text2']=' ';
		$_SESSION['texttreat']=' ';
		$_SESSION['textfirstemail']=' ';
		$_SESSION['textstage1email']=' ';
		$_SESSION['textstage2email']=' ';
		$_SESSION['textdaysstage']=' ';
				
		$_SESSION['treat']=$treat;
		$_SESSION['stage1complete']=$stage1complete;		
		$_SESSION['stage2complete']=$stage2complete;		
		$_SESSION['firstemail']=$firstemail;
		$_SESSION['stage1email']=$stage1email;
		$_SESSION['stage2email']=$stage2email;	
		$_SESSION['days']=$days;
		$_SESSION['daysstage']=$daysstage;
		
		if(isset($treat) and $treat!=0){
		$treatexists = mysql_fetch_assoc(mysql_query("SELECT treat FROM treatments WHERE treat=$treat "));			
			if(!$treatexists){
			$erremail[]='* Invalid entry!';
			} /* if(!$treatexists) */
			if ( !ctype_digit($treat)){
			$erremail[]='* Invalid entry!';
			} /* ( !ctype_digit($treat)) */		
		} /* if(isset($treat)) */
		
		if(($days or $days==='0') and !$daysstage){
			$erremail[]='* Invalid entry1!';	
		} /* (isset($days) and !isset($daysstage)) */

		if(!$days and $days!=='0' and $daysstage){
			$erremail[]='* Invalid entry2!';	
		} /* (isset($days) and !isset($daysstage)) */
		
		if($days and !is_numeric($days)){
		$erremail[]='* Invalid entry3!';				
		} /* if(isset($days) and !is_numeric($days)) */
	
		if(is_numeric($days) and $days<0){
		$erremail[]='* Invalid entry4!';							
		} /* (is_numeric($days) and $days<0) */

if(!count($erremail))
	{
		$minusdays=-$days; 
	    $_SESSION['displaythelist']= 1;
		$_SESSION['successemail']='Successfully executed';
		
		if(isset($treat) and $treat!=0){
		$_SESSION['texttreat']=' AND treat='.$treat;		
		}
		if($stage1complete==='Yes'){
		$_SESSION['text1']=' AND finished1=1';	
		}
		if($stage2complete==='Yes'){
		$_SESSION['text2']=' AND finished2=1';	
		}
		if($stage1complete==='No'){
		$_SESSION['text1']=' AND finished1=0';	
		}
		if($stage2complete==='No'){
		$_SESSION['text2']=' AND finished2=0';	
		}	
		if($firstemail==='Yes'){
		$_SESSION['textfirstemail']=' AND firstemail=1';			
		}	
		if($firstemail==='No'){
		$_SESSION['textfirstemail']=' AND firstemail=0';						
		}	
		if($stage1email==='Yes'){
		$_SESSION['textstage1email']=' AND stage1email=1';			
		}	
		if($stage1email==='No'){
		$_SESSION['textstage1email']=' AND stage1email=0';						
		}	
		if($stage2email==='Yes'){
		$_SESSION['textstage2email']=' AND stage2email=1';			
		}	
		if($stage2email==='No'){
		$_SESSION['textstage2email']=' AND stage2email=0';						
		}	
		if($daysstage==='1' or $daysstage==='2'){
		$_SESSION['textdaysstage']=' AND DATEDIFF(NOW(),intv'.$daysstage.'start)>='.$minusdays.' AND DATEDIFF(NOW(),intv'.$daysstage.'start)<=0' ;	
		} 	
	}	/* if(!count($erremail)) */

 if(count($erremail))
	{
		$_SESSION['erremail'] = implode('<br />',$erremail);
	}
	header("Location: ?email");
	exit;
} /* if(isset($_POST['email'])){ */ 	
	?>

<form id="login" method="post" action=""> 

    <h1>View e-mail list</h1>
<?php
						
						if($_SESSION['erremail'])
						{
							echo '<div class="err">'.$_SESSION['erremail'].'</div>';
							unset($_SESSION['erremail']);
						}
						
						if($_SESSION['successemail'])
						{
							echo '<div class="success">'.$_SESSION['successemail'].'</div>';
							unset($_SESSION['successemail']);
					
						}
						
					?>   

<div class="field3">
<label for="treat">* From treatment:</label>
<input type="text" name="treat"  id="treat" title="Please provide a valid treatment id." value=<?php echo "\"".$_SESSION['treat']."\"";?> />
</div>

 <div class="field3">	
 <p class="tiny"><label>* Stage 1 finished :</label></p>
 <p class="tiny">Yes <input type="radio" name="stage1complete" value="Yes"  title="Yes" <?php if ($_SESSION['stage1complete']==='Yes'){echo "checked=\"checked\"";}?>/></p>
 <p class="tiny">No <input type="radio" name="stage1complete" value="No"  title="No" <?php if ($_SESSION['stage1complete']==='No'){echo "checked=\"checked\"";}?> /></p>
 </div>
  
<div class="field3">	
 <p class="tiny"><label>* Stage 2 finished :</label></p>
 <p class="tiny">Yes <input type="radio" name="stage2complete" value="Yes"  title="Yes" <?php if ($_SESSION['stage2complete']==='Yes'){echo "checked=\"checked\"";}?>/></p>
 <p class="tiny">No <input type="radio" name="stage2complete" value="No"  title="No" <?php if ($_SESSION['stage2complete']==='No'){echo "checked=\"checked\"";}?>/></p>
</div>

<div class="field3">	
 <p class="tiny"><label>* First e-mail sent :</label></p>
 <p class="tiny">Yes <input type="radio" name="firstemail" value="Yes"  title="Yes" <?php if ($_SESSION['firstemail']==='Yes'){echo "checked=\"checked\"";}?>/></p>
 <p class="tiny">No <input type="radio" name="firstemail" value="No"  title="No" <?php if ($_SESSION['firstemail']==='No'){echo "checked=\"checked\"";}?> /></p>
 </div>

<div class="field3">	
 <p class="tiny"><label>* Stage 1 e-mail sent :</label></p>
 <p class="tiny">Yes <input type="radio" name="stage1email" value="Yes"  title="Yes" <?php if ($_SESSION['stage1email']==='Yes'){echo "checked=\"checked\"";}?>/></p>
 <p class="tiny">No <input type="radio" name="stage1email" value="No"  title="No" <?php if ($_SESSION['stage1email']==='No'){echo "checked=\"checked\"";}?> /></p>
 </div>

<div class="field3">	
 <p class="tiny"><label>* Stage 2 e-mail sent :</label></p>
 <p class="tiny">Yes <input type="radio" name="stage2email" value="Yes"  title="Yes" <?php if ($_SESSION['stage2email']==='Yes'){echo "checked=\"checked\"";}?>/></p>
 <p class="tiny">No <input type="radio" name="stage2email" value="No"  title="No" <?php if ($_SESSION['stage2email']==='No'){echo "checked=\"checked\"";}?> /></p>
 </div>

<div class="field3">
<div class="field3">

<label for="treat">* Less than this many days to:</label>
<input type="text" name="days"  id="treat" title="Please provide a valid treatment id." value=<?php echo "\"".$_SESSION['days']."\"";?> />
</div>
<div class="field3">
 <p class="tiny">Stage 1 <input type="radio" name="daysstage" value="1"  title="Stage 1" <?php if ($_SESSION['daysstage']==='1'){echo "checked=\"checked\"";}?>/></p>
 <p class="tiny">Stage 2 <input type="radio" name="daysstage" value="2"  title="Stage 2" <?php if ($_SESSION['daysstage']==='2'){echo "checked=\"checked\"";}?> /></p>
</div>
</div>

<div class="field3">	
 <p class="tiny">* = not required</p>    
 </div>

<table><tr><td>
<div class="submit">
<input type="submit" id="submit" name="email" value="Generate list" />               
</div>
</td>
<td>
<div class="submit">
<input type="submit" id="submit" name="clear" value="Clear" />               
</div>
</td>
</tr></table>    
</form>
<?php  /* $treat=$_SESSION['treat'];  echo "session treat:".$treat; */ ?>
<?php if($_SESSION['displaythelist']==1)
{	
$texttreat=$_SESSION['texttreat'];
$text1=$_SESSION['text1'];
$text2=$_SESSION['text2'];
$textfirstemail=$_SESSION['textfirstemail'];
$textstage1email=$_SESSION['textstage1email'];
$textstage2email=$_SESSION['textstage2email'];
$textdaysstage=$_SESSION['textdaysstage'];

$viewemailrow = mysql_query("SELECT u.usr, u.email, u.id, u.treat, u.finished1, u.finished2, u.firstemail, u.stage1email, u.stage2email, t.intv1start, t.intv2start, t.intv1end, t.intv2end FROM tut_users u, treatments t WHERE admin<>1 $texttreat $text1 $text2 $textfirstemail $textstage1email $textstage2email $textdaysstage AND u.treat=t.treat") ;	
$_SESSION['query']="SELECT u.usr, u.email, u.id, u.treat, u.finished1, u.finished2, u.firstemail, u.stage1email, u.stage2email, t.intv1start, t.intv2start, t.intv1end, t.intv2end FROM tut_users u, treatments t WHERE admin<>1 $texttreat $text1 $text2 $textfirstemail $textstage1email $textstage2email $textdaysstage AND u.treat=t.treat";
?> 

<?php unset($_SESSION['texttreat']);
unset($_SESSION['text1']);
unset($_SESSION['text2']);
unset($_SESSION['textfirstemail']);
unset($_SESSION['textstage1email']);
unset($_SESSION['textstage2email']);
unset($_SESSION['textdaysstage']);
?>

<form id="login4" method="post" action="">
<div class="submit">
<input type="submit" id=<?php if($_SESSION['firstemail']==='No'){echo "\"submit\"";}else{echo "\"weak\"";}?> name="sendfirstemail" value=<?php if($_SESSION['firstemail']==='No'){echo "\"Send the first e-mail\"";}else{echo "\"Overwrite the old passwords and send the first e-mail\"";}?> />               
</div>
<div class="submit">
<input type="submit" id=<?php if($_SESSION['stage1email']==='No'){echo "\"submit\"";}else{echo "\"weak\"";}?> name="sendstage1email" value="Send stage 1 e-mail" />               
</div>
<div class="submit">
<input type="submit" id=<?php if($_SESSION['stage2email']==='No'){echo "\"submit\"";}else{echo "\"weak\"";}?> name="sendstage2email" value="Send stage 2 e-mail" />               
</div>
<div class="field">      			
<p class="tiny">Confirm  <input type="checkbox" name="confirm" value="1" />  </p>
</div>
</form>

<div class="member4"> 
          <?php $countrows=mysql_num_rows($viewemailrow);
          unset($_SESSION['countrows']); $_SESSION['countrows']=$countrows;
          /* echo "count rows : ".$countrows; */?>
          <h1>List </h1>  
          <p><?php if($countrows==0){?> There are no e-mails. <?php }?> </p>
           <?php if($countrows>0){ ?>
           <table width="95%" class="field" cellspacing=10>
           <tr>
           <td>E-mail</td>
           <td>Id</td>
           <td>Tr</td>
           <td>S1</td>
           <td>S2</td>
           <td>E0</td>
           <td>S1E</td>
           <td>S2E</td>
		   <td>S1.M-D</td>
           <td>S2.M-D</td>
           </tr>
           <?php while ($rowt = mysql_fetch_assoc($viewemailrow)) { 
           	?>  
           <tr> 
           <td> <?php echo $rowt["email"] ;?></td> 
           <td><?php echo $rowt["id"];?></td>
           <td> <?php echo $rowt["treat"] ;?></td>
           <td> <?php echo $rowt["finished1"] ;?></td> 
           <td> <?php echo $rowt["finished2"] ;?></td> 
           <td> <?php echo $rowt["firstemail"] ;?></td> 
           <td> <?php echo $rowt["stage1email"] ;?></td> 
           <td> <?php echo $rowt["stage2email"] ;?></td> 
           <td> <?php echo substr($rowt["intv1start"],5,5);?></td> 
           <td> <?php echo substr($rowt["intv2start"],5,5);?></td> 
           </tr> 
           	<?php } /* while */ ?>
			</table>
        <?php } /* if($viewemailrow)*/ ?>  			           
            </div>
        <?php } /* if($_SESSION['displaythelist']==1 */ ?>

<?php unset($_SESSION['emailtreat']); unset($_SESSION['displaythelist']);?>