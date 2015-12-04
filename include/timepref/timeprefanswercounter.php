 <?php if(!$_SESSION['id']){ ?>
<?php header("Location: ../error.php");?>
<?php } /* not if($_SESSION['id']) */?>
 <?php if($_SESSION['id']){ ?>
<?php

$query5 ="SELECT max(id4) FROM timequestions";
$result5 = mysql_query($query5) or die ("Error in query: $query5. " .
mysql_error());
$row5 = mysql_fetch_row($result5);
$notime=$row5[0];

$query6 ="SELECT max(id3) FROM riskquestions";
$result6 = mysql_query($query6) or die ("Error in query: $query6. " .
mysql_error());
$row6 = mysql_fetch_row($result6);
$norisk=$row6[0];

$noquestions=$notime+$norisk;

$id=$_SESSION['id'];



/* erase this code $query = "DELETE FROM results WHERE id=$id " ;
		mysql_query($query) or die(mysql_error());

		
 $query = "INSERT INTO results (choicerq1, id,choicet1aq1, 
choicet1aq2, 
choicet1aq3, 
choicet1aq4, 
choicet1aq5, 
choicet1aq6, 
choicet1aq7 
) VALUES (1,$id,2,3,4,5,6,7,2) " ;
		mysql_query($query) or die(mysql_error()); */

$variables= array(choicet1aq1, 
choicet1aq2, 
choicet1aq3, 
choicet1aq4, 
choicet1aq5, 
choicet1aq6, 
choicet1aq7, 
choicet1bq1, 
choicet1bq2, 
choicet1bq3, 
choicet1bq4, 
choicet1bq5, 
choicet1bq6, 
choicet1bq7, 
choicet1cq1, 
choicet1cq2, 
choicet1cq3, 
choicet1cq4, 
choicet1cq5, 
choicet1cq6, 
choicet1cq7, 
choicet2aq1, 
choicet2aq2, 
choicet2aq3, 
choicet2aq4, 
choicet2aq5, 
choicet2aq6, 
choicet2aq7, 
choicet2bq1, 
choicet2bq2, 
choicet2bq3, 
choicet2bq4, 
choicet2bq5, 
choicet2bq6, 
choicet2bq7, 
choicet2cq1, 
choicet2cq2, 
choicet2cq3, 
choicet2cq4, 
choicet2cq5, 
choicet2cq6, 
choicet2cq7, 
choicerq1, 
choicerq2, 
choicerq3, 
choicerq4, 
choicerq5, 
choicerq6, 
choicerq7, 
choicerq8, 
choicerq9, 
choicerq10, 
choicerq11, 
choicerq12, 
choicerq13, 
choicerq14, 
choicerq15, 
choicerq16, 
choicerq17, 
choicerq18, 
choicerq19, 
choicerq20, 
choicerq21, 
choicerq22, 
choicerq23, 
choicerq24, 
choicerq25, 
choicerq26, 
choicerq27, 
choicerq28, 
choicerq29, 
choicerq30, 
choicerq31, 
choicerq32, 
choicerq33);

/* echo $variables[0]; */ 
$i=0;
$string=" ";
while($i<=$noquestions-1){

if($i>=$noquestions-1){$string=$string."$variables[$i]";}
else{$string=$string."$variables[$i]".", ";}
$i=$i +1;	
}

$row14="SELECT $string FROM results WHERE id=$id "; 
$result14 = mysql_query($row14) or die (mysql_error());
$row14 = mysql_fetch_row($result14);

$i=0;
$numanswers=0;
while($i<=$noquestions){
if($row14[$i]){$numanswers=$numanswers +1;}
$i=$i + 1;
}

/*  echo $numanswers; */
?>

 <?php } /*if(!$_SESSION['id']){*/ ?>
