<?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>

<?php 
$id= $_SESSION['id'];
$row=mysql_fetch_assoc(mysql_query("SELECT finished1, finished0 FROM tut_users WHERE id='$id' "));			
$finished1=$row['finished1'];
$finished0=$row['finished0'];
$_SESSION['finished1']=$finished1 ;
$_SESSION['finished0']=$finished0 ;
?>

<?php if($_SESSION['stage']=='1' and $finished0==1 and $finished1==0 ){ ?>

<?php


$subjectid= $_SESSION['id'];
$query6= "UPDATE tut_users SET updatetime1=NOW() WHERE id='$subjectid' ";
mysql_query($query6) or die(mysql_error());

$row7=mysql_fetch_assoc(mysql_query("SELECT lasttimer3 , updatetime1, remainingtimer3 FROM tut_users WHERE id='$subjectid' "));		
$lasttimer3=$row7['lasttimer3'];   
$remainingtimer3=$row7['remainingtimer3'];  
$updatetime1=$row7['updatetime1'];
$updatetime1 = date("Y-m-d H:i:s",strtotime($updatetime1));
$lasttimer3 = date("Y-m-d H:i:s",strtotime($lasttimer3));
unset($row7);

/* echo $lasttimer3; */

if($lasttimer3 != "1980-01-01 01:00:00"){

$updatetime1 = strtotime($updatetime1) ;
$lasttimer3 = strtotime($lasttimer3) ;
	
$sincelastvisit=  $updatetime1 - $lasttimer3 ;

/* echo "updatetime1 : "."$updatetime1"."   " ;
echo "lasttimer3 : "."$lasttimer3"."    ";
echo "sincelastvisit : "."$sincelastvisit"."   "; */

$sincelastvisit = $sincelastvisit / 60 ;

/* echo "sincelastvisit : "."$sincelastvisit"."   "; */ 

$remainingtimer3= $remainingtimer3 - $sincelastvisit ;

/* echo "remainingtimer3 : "."$remainingtimer3"."   "; */

if ($remainingtimer3<0){$remainingtimer3=0;} /*  if ($remainingtimer3<0) */

$query4= "UPDATE tut_users SET remainingtimer3='$remainingtimer3' , lasttimer3=NOW() WHERE id='$subjectid' ";
mysql_query($query4) or die(mysql_error());	

} /* if($lasttimer3) */

else{
$query9= "UPDATE tut_users SET lasttimer3=NOW() WHERE id='$subjectid' ";
mysql_query($query9) or die(mysql_error());	

}
$remainingtimer3=$remainingtimer3 * 60 ;
$_SESSION['remainingtimer3']=$remainingtimer3;
 /* echo $remainingtimer3; */
?>

<?php } /* if($_SESSION['stage']=='1')*/ ?>