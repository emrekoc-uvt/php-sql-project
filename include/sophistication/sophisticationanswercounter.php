 <?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>
 <?php if($_SESSION['id']){ ?>

 <?php

$id=$_SESSION['id'];

$query5 ="SELECT max(id5) FROM stagequestions";
$result5 = mysql_query($query5) or die ("Error in query: " .
mysql_error());
$row5 = mysql_fetch_row($result5);
$maxsoph=$row5[0];

$variables= array();

$i=0;
while($i<=$maxsoph){
$x=$i+1;	
$variables[$i]='choicesq'.$x;
$i=$i+1;  	
}
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

$row14="SELECT types FROM stagequestions WHERE id5=$numanswers "; 
$result14 = mysql_query($row14) or die (mysql_error());
$row14 = mysql_fetch_row($result14);
$types=$row14[0];

/* echo "numanswers soph: ".$numanswers;  
echo "noquestions soph: ".$noquestions; */
/* echo "string : ".$string; */

?>
<?php /* echo "somewhere in the answer counter"; */?>

 <?php } /*if(!$_SESSION['id']){*/ ?>
