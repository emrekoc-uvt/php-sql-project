<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Results Page | Uvt Experiment</title>
	<meta name="description" content="Results Page | Uvt Experiment" />
    <meta name="keywords" content="economic, experiment"/>
<?php require 'css/header.php';?>
</head>
<?php
error_reporting(0);
require 'include/connect.php';
session_start(); ?>		
<body> 

<?php if($_SESSION['admin']==0){?>
<?php require 'adminfiles/noadmin.php'?>
<?php } /* if($_SESSION['admin'])==0*/ ?>

<?php if($_SESSION['admin']==1){?>

<div class="member3">            
<h1> Stage 1: Time preferences, Early - Table A</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Q1</b></p></td>
<td><p ><b>Q2</b></p></td>
<td><p ><b>Q3</b></p></td>
<td><p ><b>Q4</b></p></td>
<td><p ><b>Q5</b></p></td>
<td><p ><b>Q6</b></p></td>
<td><p ><b>Q7</b></p></td>
</tr>
            
        <?php  $viewresultsrow = mysql_query("SELECT treat, id, choicet1aq1, choicet1aq2, choicet1aq3, choicet1aq4, choicet1aq5, choicet1aq6, choicet1aq7 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1aq1"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1aq2"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1aq3"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1aq4"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1aq5"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1aq6"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1aq7"] ; ?></p></td>
</tr>
	
<?php }?> 
</table>
</div>


<div class="member3">            
<h1> Stage 1: Time preferences, Early - Table B</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Q1</b></p></td>
<td><p ><b>Q2</b></p></td>
<td><p ><b>Q3</b></p></td>
<td><p ><b>Q4</b></p></td>
<td><p ><b>Q5</b></p></td>
<td><p ><b>Q6</b></p></td>
<td><p ><b>Q7</b></p></td>
</tr>
            
        <?php  $viewresultsrow = mysql_query("SELECT treat, id, choicet1bq1, choicet1bq2, choicet1bq3, choicet1bq4, choicet1bq5, choicet1bq6, choicet1bq7 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1bq1"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1bq2"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1bq3"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1bq4"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1bq5"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1bq6"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1bq7"] ; ?></p></td>
</tr>
	
<?php }?> 
</table>
</div>

<div class="member3">            
<h1> Stage 1: Time preferences, Early - Table C</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Q1</b></p></td>
<td><p ><b>Q2</b></p></td>
<td><p ><b>Q3</b></p></td>
<td><p ><b>Q4</b></p></td>
<td><p ><b>Q5</b></p></td>
<td><p ><b>Q6</b></p></td>
<td><p ><b>Q7</b></p></td>
</tr>
            
        <?php  $viewresultsrow = mysql_query("SELECT treat, id, choicet1cq1, choicet1cq2, choicet1cq3, choicet1cq4, choicet1cq5, choicet1cq6, choicet1cq7 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1cq1"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1cq2"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1cq3"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1cq4"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1cq5"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1cq6"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet1cq7"] ; ?></p></td>
</tr>	
<?php }?> 
</table>
</div>

<div class="member3">            
<h1> Stage 1: Time preferences, Late - Table A</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Q1</b></p></td>
<td><p ><b>Q2</b></p></td>
<td><p ><b>Q3</b></p></td>
<td><p ><b>Q4</b></p></td>
<td><p ><b>Q5</b></p></td>
<td><p ><b>Q6</b></p></td>
<td><p ><b>Q7</b></p></td>
</tr>
            
        <?php  $viewresultsrow = mysql_query("SELECT treat, id, choicet2aq1, choicet2aq2, choicet2aq3, choicet2aq4, choicet2aq5, choicet2aq6, choicet2aq7 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2aq1"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2aq2"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2aq3"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2aq4"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2aq5"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2aq6"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2aq7"] ; ?></p></td>
</tr>
	
<?php }?> 
</table>
</div>


<div class="member3">            
<h1> Stage 1: Time preferences, Late - Table B</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Q1</b></p></td>
<td><p ><b>Q2</b></p></td>
<td><p ><b>Q3</b></p></td>
<td><p ><b>Q4</b></p></td>
<td><p ><b>Q5</b></p></td>
<td><p ><b>Q6</b></p></td>
<td><p ><b>Q7</b></p></td>
</tr>
            
        <?php  $viewresultsrow = mysql_query("SELECT treat, id, choicet2bq1, choicet2bq2, choicet2bq3, choicet2bq4, choicet2bq5, choicet2bq6, choicet2bq7 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2bq1"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2bq2"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2bq3"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2bq4"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2bq5"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2bq6"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2bq7"] ; ?></p></td>
</tr>
	
<?php }?> 
</table>
</div>

<div class="member3">            
<h1> Stage 1: Time preferences, Late - Table C</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Q1</b></p></td>
<td><p ><b>Q2</b></p></td>
<td><p ><b>Q3</b></p></td>
<td><p ><b>Q4</b></p></td>
<td><p ><b>Q5</b></p></td>
<td><p ><b>Q6</b></p></td>
<td><p ><b>Q7</b></p></td>
</tr>
            
        <?php  $viewresultsrow = mysql_query("SELECT treat, id, choicet2cq1, choicet2cq2, choicet2cq3, choicet2cq4, choicet2cq5, choicet2cq6, choicet2cq7 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2cq1"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2cq2"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2cq3"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2cq4"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2cq5"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2cq6"] ; ?></p></td>
<td><p ><?php echo $rowt["choicet2cq7"] ; ?></p></td>
</tr>
	
<?php }?> 
</table>
</div>


<div class="member3">
            
<h1> Stage 1: Risk preferences - Table 1</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td class="dark"><p ><b>Q1</b></p></td>
<td class="dark"><p ><b>Q2</b></p></td>
<td class="dark"><p ><b>Q3</b></p></td>
<td class="dark"><p ><b>Q4</b></p></td>
<td class="dark"><p ><b>Q5</b></p></td>
<td class="dark"><p ><b>Q6</b></p></td>
<td class="dark"><p ><b>Q7</b></p></td>
<td class="dark"><p ><b>Q8</b></p></td>
<td class="dark"><p ><b>Q9</b></p></td>
</tr>
            
<?php  $viewresultsrow = mysql_query("SELECT treat, id, choicerq1, choicerq2, choicerq3, choicerq4, choicerq5, choicerq6, choicerq7, choicerq8, choicerq9 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq1"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq2"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq3"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq4"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq5"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq6"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq7"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq8"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq9"] ; ?></p></td>
</tr>	
<?php }?> 
</table>
</div>

<div class="member3">
            
<h1> Stage 1: Risk preferences - Table 2</h1>
<table width="100%" cellpadding="3">
<tr>
<td class="dark"><p > <b>Id</b></p></td>
<td class="dark"><p ><b>Treatment</b></p></td>
<td class="dark"><p ><b>Q10</b></p></td>
<td class="dark"><p ><b>Q11</b></p></td>
<td><p ><b>Q12</b></p></td>
<td><p ><b>Q13</b></p></td>
<td><p ><b>Q14</b></p></td>
<td><p ><b>Q15</b></p></td>
<td><p ><b>Q16</b></p></td>

</tr>
            
<?php  $viewresultsrow = mysql_query("SELECT treat, id, choicerq10, choicerq11, choicerq12, choicerq13, choicerq14, choicerq15, choicerq16 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td class="dark"><p ><?php echo $rowt["id"] ;?></p></td>
<td class="dark"><p ><?php echo $rowt["treat"] ; ?></p></td>
<td  class="dark"><p ><?php echo $rowt["choicerq10"] ; ?></p></td>
<td  class="dark"><p ><?php echo $rowt["choicerq11"] ; ?></p></td>
<td><p ><?php echo $rowt["choicerq12"] ; ?></p></td>
<td><p ><?php echo $rowt["choicerq13"] ; ?></p></td>
<td><p ><?php echo $rowt["choicerq14"] ; ?></p></td>
<td><p ><?php echo $rowt["choicerq15"] ; ?></p></td>
<td><p ><?php echo $rowt["choicerq16"] ; ?></p></td>
</tr>	
<?php }?> 
</table>
</div>



<div class="member3">
            
<h1> Stage 1: Risk preferences - Table 3</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Q17</b></p></td>
<td><p ><b>Q18</b></p></td>
<td class="dark"><p ><b>Q19</b></p></td>
<td class="dark"><p ><b>Q20</b></p></td>
<td class="dark"><p ><b>Q21</b></p></td>
<td class="dark"><p ><b>Q22</b></p></td>
<td class="dark"><p ><b>Q23</b></p></td>
<td class="dark"><p ><b>Q24</b></p></td>
<td class="dark"><p ><b>Q25</b></p></td>
</tr>
            
<?php  $viewresultsrow = mysql_query("SELECT treat, id, choicerq17, choicerq18, choicerq19, choicerq20, choicerq21, choicerq22, choicerq23, choicerq24, choicerq25 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["choicerq17"] ; ?></p></td>
<td><p ><?php echo $rowt["choicerq18"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq19"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq20"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq21"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq22"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq23"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq24"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq25"] ; ?></p></td>
</tr>	
<?php }?> 
</table>
</div>

<div class="member3">
            
<h1> Stage 1: Risk preferences - Table 4</h1>
<table width="100%" cellpadding="3">
<tr>
<td class="dark"><p > <b>Id</b></p></td>
<td class="dark"><p ><b>Treatment</b></p></td>
<td class="dark"><p ><b>Q26</b></p></td>
<td class="dark"><p ><b>Q27</b></p></td>
<td class="dark"><p ><b>Q28</b></p></td>
<td class="dark"><p ><b>Q29</b></p></td>
<td class="dark"><p ><b>Q30</b></p></td>
<td class="dark"><p ><b>Q31</b></p></td>
<td class="dark"><p ><b>Q32</b></p></td>
<td class="dark"><p ><b>Q33</b></p></td>
</tr>
            
<?php  $viewresultsrow = mysql_query("SELECT treat, id, choicerq26, choicerq27, choicerq28, choicerq29, choicerq30, choicerq31, choicerq32, choicerq33 FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td class="dark"><p ><?php echo $rowt["id"] ;?></p></td>
<td class="dark"><p ><?php echo $rowt["treat"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq26"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq27"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq28"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq29"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq30"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq31"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq32"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicerq33"] ; ?></p></td>
</tr>	
<?php }?> 
</table>
</div>



<div class="member3">
<h1> Stage 1: IQ test</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Q1</b></p></td>
<td><p ><b>Q2</b></p></td>
<td><p ><b>Q3</b></p></td>
<td><p ><b>Q4</b></p></td>
<td><p ><b>Q5</b></p></td>

</tr>
            
        <?php  $viewresultsrow = mysql_query("SELECT treat, id, choicec1q, choicec2q, choicec3q, choicec4q, choicec5q FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["choicec1q"] ; ?></p></td>
<td><p ><?php echo $rowt["choicec2q"] ; ?></p></td>
<td><p ><?php echo $rowt["choicec3q"] ; ?></p></td>
<td><p ><?php echo $rowt["choicec4q"] ; ?></p></td>
<td><p ><?php echo $rowt["choicec5q"] ; ?></p></td>
</tr>
	
<?php }?> 
</table>
</div>

           
<div class="member3">
<h1> Stage 1: Demographics</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Smoking</b></p></td>
<td><p ><b>Past smoking</b></p></td>
<td><p ><b>Try to quit smoking</b></p></td>
<td><p ><b>Exercise</b></p></td>
<td><p ><b>Exercise hours</b></p></td>
<td><p ><b>Consumption</b></p></td>
<td><p ><b>Internet</b></p></td>
<td><p ><b>Story</b></p></td>
</tr>
            
        <?php  $viewresultsrow = mysql_query("SELECT treat, id, smoke, pastsmoke, trystopsmoke, consume, internet, exercise, exercisehours, story  FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["smoke"] ; ?></p></td>
<td><p ><?php echo $rowt["pastsmoke"] ; ?></p></td>
<td><p ><?php echo $rowt["trystopsmoke"] ; ?></p></td>
<td><p ><?php echo $rowt["exercise"] ; ?></p></td>
<td><p ><?php echo $rowt["exercisehours"] ; ?></p></td>
<td><p ><?php echo $rowt["consume"] ; ?></p></td>
<td><p ><?php echo $rowt["internet"] ; ?></p></td>
<td><p ><?php echo $rowt["story"] ; ?></p></td>
</tr>
	
<?php }?> 
</table>
</div>



<div class="member3">
<?php $rowid4="SELECT max(id5) FROM stagequestions "; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$maxc = mysql_fetch_row($resultid4);
		$maxc = $maxc[0];
?>
<?php 
	$counter=0;
	$qtype=array ();
	while($counter<=$maxc){
	$row14="SELECT types FROM stagequestions WHERE id5='$counter' "; 
	$result14 = mysql_query($row14) or die (mysql_error());
	$row14 = mysql_fetch_assoc($result14);
	$qtype[$counter+1]=$row14['types'];
	$counter=$counter+1;
	} /* while($counter<=21) */
	?>
            
            <h1> Stage 1 and 2: Decisions</h1>
<table width="100%" cellpadding="3">

<tr>
<td colspan="2"> </td>

<?php $counter=1;
	while($counter<=$maxc+1){
		if ($counter % 2 == 0) {
  		echo "<td colspan=\"5\"> <p class=\"centering\">Q".$counter." (".$qtype[$counter].") </p> </td>";
		} /* if ($counter % 2 == 0) */
		else{
  		echo "<td colspan=\"5\" class=\"dark\"> <p class=\"centering\">Q".$counter." (".$qtype[$counter].") </p> </td>";
		} /* else ($counter % 2 == 0) */
		
	$counter=$counter+1;
	} /* while($counter<=$maxc) */
?>

<td colspan="3"> <p class="centering">Choices</p></td>
</tr>

<tr>
<td ><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<?php $counter=1;
	while($counter<=$maxc+1){
		if ($counter % 2 == 0) {
  		echo "<td><p ><b>Stage 1</b></p></td>
<td><p ><b>K</b></p></td>
<td><p ><b>Y</b></p></td>
<td><p ><b>r1</b></p></td>
<td><p ><b>r2</b></p></td>";
		} /* if ($counter % 2 == 0) */
		else{
  		echo "<td class=\"dark\"><p ><b>Stage 1</b></p></td>
<td class=\"dark\"><p ><b>K</b></p></td>
<td class=\"dark\"><p ><b>Y</b></p></td>
<td class=\"dark\"><p ><b>r1</b></p></td>
<td class=\"dark\"><p ><b>r2</b></p></td>";
		} /* else ($counter % 2 == 0) */
		
	$counter=$counter+1;
	} /* while($counter<=$maxc) */
?>

<td><p ><b>Chosen Q</b></p></td>
<td><p ><b>Type Q</b></p></td>
<td><p ><b>Stage 2</b></p></td>
</tr>
            
        <?php  $viewresultsrow = mysql_query("SELECT treat, id, 
        choicesq1,choicesq1k,choicesq1y,choicesq1r1,choicesq1r2, 
        choicesq2,choicesq2k,choicesq2y,choicesq2r1,choicesq2r2,
        choicesq3,choicesq3k,choicesq3y,choicesq3r1,choicesq3r2,
        choicesq4,choicesq4k,choicesq4y,choicesq4r1,choicesq4r2,
        choicesq5,choicesq5k,choicesq5y,choicesq5r1,choicesq5r2,
        choicesq6,choicesq6k,choicesq6y,choicesq6r1,choicesq6r2,
        choicesq7,choicesq7k,choicesq7y,choicesq7r1,choicesq7r2,
        choicesq8,choicesq8k,choicesq8y,choicesq8r1,choicesq8r2,
        choicesq9,choicesq9k,choicesq9y,choicesq9r1,choicesq9r2,
        choicesq10,choicesq10k,choicesq10y,choicesq10r1,choicesq10r2,
		choicesq11,choicesq11k,choicesq11y,choicesq11r1,choicesq11r2, 
        choicesq12,choicesq12k,choicesq12y,choicesq12r1,choicesq12r2,
        choicesq13,choicesq13k,choicesq13y,choicesq13r1,choicesq13r2,
        choicesq14,choicesq14k,choicesq14y,choicesq14r1,choicesq14r2,
        choicesq15,choicesq15k,choicesq15y,choicesq15r1,choicesq15r2,
        choicesq16,choicesq16k,choicesq16y,choicesq16r1,choicesq16r2,
        choicesq17,choicesq17k,choicesq17y,choicesq17r1,choicesq17r2,
        choicesq18,choicesq18k,choicesq18y,choicesq18r1,choicesq18r2,
        choicesq19,choicesq19k,choicesq19y,choicesq19r1,choicesq19r2,
		choicesq20,choicesq20k,choicesq20y,choicesq20r1,choicesq20r2,
        choicesq21,choicesq21k,choicesq21y,choicesq21r1,choicesq21r2,                
        stage1chosen, stage1chosentype, stage2decision  FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 

<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq1"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq1k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq1y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq1r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq1r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq2"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq2k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq2y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq2r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq2r2"],3) ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq3"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq3k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq3y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq3r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq3r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq4"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq4k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq4y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq4r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq4r2"],3) ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq5"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq5k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq5y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq5r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq5r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq6"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq6k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq6y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq6r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq6r2"],3) ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq7"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq7k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq7y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq7r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq7r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq8"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq8k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq8y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq8r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq8r2"],3) ; ?></p></td>
<td  class="dark"><p ><?php echo $rowt["choicesq9"] ; ?></p></td>
<td  class="dark"><p ><?php echo $rowt["choicesq9k"] ; ?></p></td>
<td  class="dark"><p ><?php echo $rowt["choicesq9y"] ; ?></p></td>
<td  class="dark"><p ><?php echo round($rowt["choicesq9r1"],3) ; ?></p></td>
<td  class="dark"><p ><?php echo round($rowt["choicesq9r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq10"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq10k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq10y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq10r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq10r2"],3) ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq11"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq11k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq11y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq11r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq11r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq12"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq12k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq12y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq12r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq12r2"],3) ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq13"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq13k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq13y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq13r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq13r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq14"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq14k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq14y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq14r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq14r2"],3) ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq15"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq15k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq15y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq15r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq15r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq16"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq16k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq16y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq16r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq16r2"],3) ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq17"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq17k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq17y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq17r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq17r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq18"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq18k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq18y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq18r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq18r2"],3) ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq19"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq19k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq19y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq19r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq19r2"],3) ; ?></p></td>
<td><p ><?php echo $rowt["choicesq20"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq20k"] ; ?></p></td>
<td><p ><?php echo $rowt["choicesq20y"] ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq20r1"],3) ; ?></p></td>
<td><p ><?php echo round($rowt["choicesq20r2"],3) ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq21"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq21k"] ; ?></p></td>
<td class="dark"><p ><?php echo $rowt["choicesq21y"] ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq21r1"],3) ; ?></p></td>
<td class="dark"><p ><?php echo round($rowt["choicesq21r2"],3) ; ?></p></td>
<td><p ><?php if($rowt["stage1chosen"]){echo 'Q'.$rowt["stage1chosen"] ;} ?></p></td>
<td><p ><?php if($rowt["stage1chosentype"]){echo $rowt["stage1chosentype"] ;} ?></p></td>
<td><p ><?php echo $rowt["stage2decision"] ; ?></p></td>
</tr>	
<?php }?> 
</table>

           </div>

<div class="member3">
            
            <h1> Stage 2: Demographics</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Birth Year</b></p></td>
<td><p ><b>Gender</b></p></td>
<td><p ><b>Nationality</b></p></td>
<td><p ><b>Year of Study</b></p></td>
<td><p ><b>School</b></p></td>
<td><p ><b>Mother's net annual income</b></p></td>
<td><p ><b>Father's net annual income</b></p></td>
<td><p ><b>Height</b></p></td>
<td><p ><b>Weight</b></p></td>
<td><p ><b>Know interest</b></p></td>
<td><p ><b>Use interest</b></p></td>
<td><p ><b>Prediction</b></p></td>

</tr>
            
        <?php                  
$viewresultsrow = mysql_query("SELECT treat, id, byear, syear, gender, nationality, school, mincome, fincome, height, weight, knowinterest, useinterest, estimateinterest FROM results ");
while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php if($rowt["byear"]!=-1){ echo $rowt["byear"] ;} ?></p></td>
<td><p ><?php echo $rowt["gender"] ; ?></p></td>
<td><p ><?php echo $rowt["nationality"] ; ?></p></td>
<td><p ><?php echo $rowt["syear"] ; ?></p></td>
<td><p ><?php echo $rowt["school"] ; ?></p></td>
<td><p ><?php echo $rowt["mincome"] ; ?></p></td>
<td><p ><?php echo $rowt["fincome"] ; ?></p></td>
<td><p ><?php echo $rowt["height"] ; ?></p></td>
<td><p ><?php echo $rowt["weight"] ; ?></p></td>
<td><p ><?php echo $rowt["knowinterest"] ; ?></p></td>
<td><p ><?php echo $rowt["useinterest"] ; ?></p></td>
<td><p ><?php if($rowt["estimateinterest"]!=-1) { echo $rowt["estimateinterest"] ;} ?></p></td>

</tr>
	
<?php }?> 
</table>
</div>


<div class="member3">
<h1> Remaining timers</h1>
<table width="100%" cellpadding="3">
<tr>
<td><p > <b>Id</b></p></td>
<td><p ><b>Treatment</b></p></td>
<td><p ><b>Time/risk</b></p></td>
<td><p ><b>Cognitive</b></p></td>
<td><p ><b>Sophistication</b></p></td>
<td><p ><b>Stage 2</b></p></td>
</tr>
            
<?php  
$viewresultsrow = mysql_query("SELECT t.timer1, t.timer2, t.timer3, t.timer4, u.treat, u.id, u.remainingtimer1, u.remainingtimer2, u.remainingtimer3, u.remainingtimer4 FROM tut_users u, timers t WHERE u.admin<>1 AND u.remainingtimer1<t.timer1") ;	

while ($rowt = mysql_fetch_assoc($viewresultsrow)) { 
?> 
<tr>
<td><p ><?php echo $rowt["id"] ;?></p></td>
<td><p ><?php echo $rowt["treat"] ; ?></p></td>
<td><p ><?php echo $rowt["remainingtimer1"] ; ?></p></td>
<td><p ><?php echo $rowt["remainingtimer2"] ; ?></p></td>
<td><p ><?php echo $rowt["remainingtimer3"] ; ?></p></td>
<td><p ><?php echo $rowt["remainingtimer4"] ; ?></p></td>
</tr>
	
<?php }?> 
<?php 
$viewresultsrow2 = mysql_query("SELECT timer1, timer2, timer3, timer4 FROM timers") ;	
$rowti = mysql_fetch_assoc($viewresultsrow2); ?>
<tr>
<td><p>Max</p></td>
<td></td>
<td><p ><?php echo $rowti["timer1"] ; ?></p></td>
<td><p ><?php echo $rowti["timer2"] ; ?></p></td>
<td><p ><?php echo $rowti["timer3"] ; ?></p></td>
<td><p ><?php echo $rowti["timer4"] ; ?></p></td>
</tr>
</table>
</div>

<?php } /* if($_SESSION['admin'])==1*/ ?>

<?php if(!$_SESSION['id']){ ?>
<?php header("Location: error.php");?>
<?php } /* not if($_SESSION['id']) */?>


</body>
</html>
