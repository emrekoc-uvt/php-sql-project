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

$row7=mysql_fetch_assoc(mysql_query("SELECT lasttimer2 , updatetime1, remainingtimer2 FROM tut_users WHERE id='$subjectid' "));		
$lasttimer2=$row7['lasttimer2'];   
$remainingtimer2=$row7['remainingtimer2'];  
$updatetime1=$row7['updatetime1'];
$updatetime1 = date("Y-m-d H:i:s",strtotime($updatetime1));
$lasttimer2 = date("Y-m-d H:i:s",strtotime($lasttimer2));
unset($row7);

/* echo $lasttimer2; */

if($lasttimer2 != "1980-01-01 01:00:00"){

$updatetime1 = strtotime($updatetime1) ;
$lasttimer2 = strtotime($lasttimer2) ;
	
$sincelastvisit=  $updatetime1 - $lasttimer2 ;

/* echo "updatetime1 : "."$updatetime1"."   " ;
echo "lasttimer2 : "."$lasttimer2"."    ";
echo "sincelastvisit : "."$sincelastvisit"."   "; */

$sincelastvisit = $sincelastvisit / 60 ;

/* echo "sincelastvisit : "."$sincelastvisit"."   "; */ 

$remainingtimer2= $remainingtimer2 - $sincelastvisit ;

/* echo "remainingtimer2 : "."$remainingtimer2"."   "; */

if ($remainingtimer2<0){$remainingtimer2=0;} /*  if ($remainingtimer2<0) */

$query4= "UPDATE tut_users SET remainingtimer2='$remainingtimer2' , lasttimer2=NOW() WHERE id='$subjectid' ";
mysql_query($query4) or die(mysql_error());	

} /* if($lasttimer2) */

else{
$query9= "UPDATE tut_users SET lasttimer2=NOW() WHERE id='$subjectid' ";
mysql_query($query9) or die(mysql_error());	

}
$remainingtimer2=$remainingtimer2 * 60 ;
$_SESSION['remainingtimer2']=$remainingtimer2;
 /* echo $remainingtimer2; */
?>

<?php } /* if($_SESSION['stage']=='0')*/ ?>