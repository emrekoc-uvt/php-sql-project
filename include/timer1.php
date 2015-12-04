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

<?php if($_SESSION['stage']=='1' and $finished0==0 and $finished1==0 ){ ?>

<?php


$subjectid= $_SESSION['id'];
$query6= "UPDATE tut_users SET updatetime1=NOW() WHERE id='$subjectid' ";
mysql_query($query6) or die(mysql_error());

$row7=mysql_fetch_assoc(mysql_query("SELECT lasttimer1 , updatetime1, remainingtimer1 FROM tut_users WHERE id='$subjectid' "));		
$lasttimer1=$row7['lasttimer1'];   
$remainingtimer1=$row7['remainingtimer1'];  
$updatetime1=$row7['updatetime1'];
$updatetime1 = date("Y-m-d H:i:s",strtotime($updatetime1));
$lasttimer1 = date("Y-m-d H:i:s",strtotime($lasttimer1));
unset($row7);

/* echo $lasttimer1; */

if($lasttimer1 != "1980-01-01 01:00:00"){

$updatetime1 = strtotime($updatetime1) ;
$lasttimer1 = strtotime($lasttimer1) ;
	
$sincelastvisit=  $updatetime1 - $lasttimer1 ;

/* echo "updatetime1 : "."$updatetime1"."   " ;
echo "lasttimer1 : "."$lasttimer1"."    ";
echo "sincelastvisit : "."$sincelastvisit"."   "; */

$sincelastvisit = $sincelastvisit / 60 ;

/* echo "sincelastvisit : "."$sincelastvisit"."   "; */ 

$remainingtimer1= $remainingtimer1 - $sincelastvisit ;

/* echo "remainingtimer1 : "."$remainingtimer1"."   "; */

if ($remainingtimer1<0){$remainingtimer1=0;} /*  if ($remainingtimer1<0) */

$query4= "UPDATE tut_users SET remainingtimer1='$remainingtimer1' , lasttimer1=NOW() WHERE id='$subjectid' ";
mysql_query($query4) or die(mysql_error());	

} /* if($lasttimer1) */

else{
$query9= "UPDATE tut_users SET lasttimer1=NOW() WHERE id='$subjectid' ";
mysql_query($query9) or die(mysql_error());	

}
$remainingtimer1=$remainingtimer1 * 60  ;

$_SESSION['remainingtimer1']=$remainingtimer1;
/* echo $remainingtimer1; */
?>

<?php } /* if($_SESSION['stage']=='0' and $finished0==0 and $finished1==0)*/ ?>