<form id="login" method="post" action=""> 

    <h1>View a subject</h1>
   
        <div class="field">
    	<label for="subjid" >Subject id</label> 
    	<input type="text" name="subjid" id="subjid"  title="Enter the id of the subject" />
    </div>			

         			
    <div class="submit">
     <input type="submit" id="submit" name="viewsubj" value="View" />
               
    </div>
    
</form>

<?php if(isSet($_POST['viewsubj']))
{
	
	
$viewthissubj=$_POST['subjid'] ;
$viewthissubj = mysql_real_escape_string($viewthissubj);	
$viewrow = mysql_fetch_assoc(mysql_query("SELECT id,usr,email,treat, finished1, finished2, finished0, firstemail, stage1email, stage2email FROM tut_users WHERE id='$viewthissubj' AND admin<>1"));

?> 


<div class="member2">
            
            <h1>Subject id <?php if($viewrow) {echo $viewthissubj ;} if(!$viewrow) {echo "not found" ;} ?>. </h1>
            
            <p><?php if(!$viewrow){?> There are no subjects with this id. <?php }?> </p>
           
           <?php if($viewrow){?> <table width="90%" class="field" cellspacing=10> <tr>
<td>Username:</td> <td> <?php echo $viewrow['usr']; ?></td> </tr>
<tr><td>E-Mail:</td><td> <?php echo $viewrow['email'] ; ?></td></tr>
<tr><td>Treatment:</td><td> <?php echo $viewrow['treat'] ; ?></td></tr>
<tr><td>Finished stage 0:</td><td> <?php if( $viewrow['finished0'] ==1){echo "Yes";} else{ echo "No"; } ?></td></tr>
<tr><td>Finished stage 1:</td><td> <?php if( $viewrow['finished1'] ==1){echo "Yes";} else{ echo "No"; } ?></td></tr>
<tr><td>Finished stage 2:</td><td> <?php if( $viewrow['finished2'] ==1){echo "Yes";} else{ echo "No"; } ?></td></tr>
<tr><td>First e-mail:</td><td> <?php if( $viewrow['firstemail'] ==1){echo "Yes";} else{ echo "No"; } ?></td></tr>
<tr><td>Stage 1 e-mail:</td><td> <?php if( $viewrow['stage1email'] ==1){echo "Yes";} else{ echo "No"; } ?></td></tr>
<tr><td>Stage 2 e-mail:</td><td> <?php if( $viewrow['stage2email'] ==1){echo "Yes";} else{ echo "No"; } ?></td></tr>
</table>
        <?php } /* if($viewrow)*/ ?>
  			           
            </div>


		 
<?php } /* if(isSet($_POST['viewsubj'])) */?>
