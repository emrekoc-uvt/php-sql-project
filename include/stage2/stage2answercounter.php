 <?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>
 <?php if($_SESSION['id']){ ?>

 <?php

$id=$_SESSION['id'];

$variables= array(stage2decision,  	
byear, 
gender,
nationality,
school, 
syear, 
mincome, 
fincome,
height,
weight,
knowinterest,
useinterest,
estimateinterest);

$noquestions=count($variables); /* size of array*/

/* echo $variables[0]; */ 
$i=0;
$string=" ";
while($i<=$noquestions-1){

if($i>=$noquestions-1){$string=$string."$variables[$i]";}
else{$string=$string."$variables[$i]".", ";}
$i=$i +1;	
}

/* echo "string :".$string; */

$row14="SELECT $string FROM results WHERE id=$id "; 
$result14 = mysql_query($row14) or die (mysql_error());
$row14 = mysql_fetch_row($result14);

$i=0;
$numanswers=0;
while($i<=$noquestions){
if($row14[$i]){$numanswers=$numanswers +1;
}
/* echo "row14[".$i."] : ".$row14[$i]; */
$i=$i + 1;
}

/* echo "numanswers : ".$numanswers; 
 echo "noquestions : ".$noquestions;  */
/* echo "thisvariable : ".$thisvariable; */
/* echo "string : ".$string; */
/* echo "reporting from stage2 answercounter"; */
?>

 <?php } /*if(!$_SESSION['id']){*/ ?>
