<?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>

<?php if (  $_SESSION['outoftime1']==1 or $_SESSION['outoftime2']==1 or $_SESSION['outoftime3']==1 or $_SESSION['outoftime4']==1){} else{?>
        

    <?php 
    $subjectid= $_SESSION['id']; 
    unset ($row7);
    $row7=mysql_fetch_assoc(mysql_query("SELECT remainingtimer1 , remainingtimer2, remainingtimer3 , remainingtimer4 FROM tut_users WHERE id='$subjectid' "));		   
$remainingtimer1=$row7['remainingtimer1'];  
$remainingtimer2=$row7['remainingtimer2'];  
$remainingtimer3=$row7['remainingtimer3'];  
$remainingtimer4=$row7['remainingtimer4'];      
 if($remainingtimer1==0){$_SESSION['outoftime1']=1;}
if($remainingtimer2==0){$_SESSION['outoftime2']=1;}
if($remainingtimer3==0){$_SESSION['outoftime3']=1;}
if($remainingtimer4==0){$_SESSION['outoftime4']=1;}
?>

<?php } /* else (  $_SESSION['outoftime1']==1 or $_SESSION['outoftime2']==1 or $_SESSION['outoftime3']==1 or $_SESSION['outoftime4']==1)*/ ?>    
    
    
    <?php if (  $_SESSION['outoftime1']==1 or $_SESSION['outoftime2']==1 or $_SESSION['outoftime3']==1 or $_SESSION['outoftime4']==1){?>
    
       <div class="member">
            <h1>Welcome <?php echo $_SESSION['username'];?>.</h1>
            
            <p class="big">You have not responded in time and therefore your experiment is over.  
  			 <?php if($_SESSION['stage']=='2'){}else{?>You are also excluded from future stages.  <?php }/*else ($_SESSION['stage']='2'*/?></p>
  			  	 <?php if($_SESSION['id']){?>
  			 <br><p class="big"> You can see the experiment rules and the schedule <a href="schedule.php">here</a>.</p>
			<?php } /* if($_SESSION['id'])*/ ?>
  			  <br><p class="big">Thank you for your participation.  </p>
           <br />
            <a href="login.php?logoff">Log out here</a>            
            </div>
            
            <?php 
            /* echo "outoftime1 : ".$_SESSION['outoftime1']."<br>"."outoftime2 : ".$_SESSION['outoftime2']."<br>"."outoftime3 : ".$_SESSION['outoftime3']."<br>"."outoftime4 : ".$_SESSION['outoftime4']."<br>"."stage : ".$_SESSION['stage']."<br>";   */         
            ?>
    <?php } /* if (  $_SESSION['outoftime1']==1 or $_SESSION['outoftime2']==1 or $_SESSION['outoftime3']==1 or $_SESSION['outoftime4']==1)*/ ?>