<?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>

<?php 
$id= $_SESSION['id'];
$row=mysql_fetch_assoc(mysql_query("SELECT finished1, finished0, finished2 FROM tut_users WHERE id='$id' "));			
$finished2=$row['finished2'];
$finished1=$row['finished1'];
$finished0=$row['finished0'];
$_SESSION['finished2']=$finished2 ;
$_SESSION['finished1']=$finished1 ;
$_SESSION['finished0']=$finished0 ;
?>

<?php if($_SESSION['stage']=='2' and $finished0==1 and $finished1==1 and $finished2==0 ){ ?>

<?php


$subjectid= $_SESSION['id'];
$query6= "UPDATE tut_users SET updatetime1=NOW() WHERE id='$subjectid' ";
mysql_query($query6) or die(mysql_error());

$row7=mysql_fetch_assoc(mysql_query("SELECT lasttimer4 , updatetime1, remainingtimer4 FROM tut_users WHERE id='$subjectid' "));		
$lasttimer4=$row7['lasttimer4'];   
$remainingtimer4=$row7['remainingtimer4'];  
$updatetime1=$row7['updatetime1'];
$updatetime1 = date("Y-m-d H:i:s",strtotime($updatetime1));
$lasttimer4 = date("Y-m-d H:i:s",strtotime($lasttimer4));
unset($row7);

/* echo $lasttimer4; */

if($lasttimer4 != "1980-01-01 01:00:00"){

$updatetime1 = strtotime($updatetime1) ;
$lasttimer4 = strtotime($lasttimer4) ;
	
$sincelastvisit=  $updatetime1 - $lasttimer4 ;

/* echo "updatetime1 : "."$updatetime1"."   " ;
echo "lasttimer4 : "."$lasttimer4"."    ";
echo "sincelastvisit : "."$sincelastvisit"."   "; */

$sincelastvisit = $sincelastvisit / 60 ;

/* echo "sincelastvisit : "."$sincelastvisit"."   "; */ 

$remainingtimer4= $remainingtimer4 - $sincelastvisit ;

/* echo "remainingtimer4 : "."$remainingtimer4"."   "; */

if ($remainingtimer4<0){$remainingtimer4=0;} /*  if ($remainingtimer4<0) */

$query4= "UPDATE tut_users SET remainingtimer4='$remainingtimer4' , lasttimer4=NOW() WHERE id='$subjectid' ";
mysql_query($query4) or die(mysql_error());	

} /* if($lasttimer4) */

else{
$query9= "UPDATE tut_users SET lasttimer4=NOW() WHERE id='$subjectid' ";
mysql_query($query9) or die(mysql_error());	

}

$remainingtimer4=$remainingtimer4 * 60 ;
$_SESSION['remainingtimer4']=$remainingtimer4;
/*echo $remainingtimer4;*/
?>

<?php } /* if($_SESSION['stage']=='2')*/ ?>