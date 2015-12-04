<table class="member2"><tr><td><h1>Treatments</h1></td></tr>
	
	<tr><td>
<?php 
$viewtreatrow = mysql_query("SELECT treat, type, type2, intv1start, intv1end, intv2start, intv2end, total, stage1, stage2, stage0 FROM treatments ");
while ($rowt = mysql_fetch_assoc($viewtreatrow)) {    
$nowtreat=$rowt["treat"] ;
$query1="SELECT * FROM tut_users WHERE treat=$nowtreat ";
$result1 = mysql_query($query1) or die(mysql_error());
$totalrows = mysql_num_rows($result1); 
$query2= "UPDATE treatments SET total=$totalrows WHERE treat=$nowtreat " ;
$result2 = mysql_query($query2) or die(mysql_error()); 
mysql_query($query2);

$querya1="SELECT * FROM tut_users WHERE treat=$nowtreat and finished1=1";
$resulta1 = mysql_query($querya1) or die(mysql_error());
$totalrowsa = mysql_num_rows($resulta1); 
$querya2= "UPDATE treatments SET stage1=$totalrowsa WHERE treat=$nowtreat " ;
$resulta2 = mysql_query($querya2) or die(mysql_error()); 
mysql_query($querya2);

$queryb1="SELECT * FROM tut_users WHERE treat=$nowtreat and finished2=1";
$resultb1 = mysql_query($queryb1) or die(mysql_error());
$totalrowsb = mysql_num_rows($resultb1); 
$queryb2= "UPDATE treatments SET stage2=$totalrowsb WHERE treat=$nowtreat " ;
$resultb2 = mysql_query($queryb2) or die(mysql_error()); 
mysql_query($queryb2);

$queryc1="SELECT * FROM tut_users WHERE treat=$nowtreat and finished0=1";
$resultc1 = mysql_query($queryc1) or die(mysql_error());
$totalrowsc = mysql_num_rows($resultc1); 
$queryc2= "UPDATE treatments SET stage0=$totalrowsc WHERE treat=$nowtreat " ;
$resultc2 = mysql_query($queryc2) or die(mysql_error()); 
mysql_query($queryc2);

$queryc1="SELECT * FROM tut_users WHERE treat=$nowtreat and firstemail=1";
$resultc1 = mysql_query($queryc1) or die(mysql_error());
$firstemail = mysql_num_rows($resultc1); 

$queryc1="SELECT * FROM tut_users WHERE treat=$nowtreat and stage1email=1";
$resultc1 = mysql_query($queryc1) or die(mysql_error());
$stage1email = mysql_num_rows($resultc1); 

$queryc1="SELECT * FROM tut_users WHERE treat=$nowtreat and stage2email=1";
$resultc1 = mysql_query($queryc1) or die(mysql_error());
$stage2email = mysql_num_rows($resultc1); 

	echo "<table class=field cellspacing=10>" ;
	echo "<tr><td>Treatment id:</td><td>";
	echo $rowt["treat"] ;   
    echo "</tr></td> <tr><td>Type:</td><td>";
	echo $rowt["type"]; 
	echo "</tr></td> <tr><td>Type 2:</td><td>";
	echo $rowt["type2"];    
     echo "</tr></td> <tr><td>Stage 1 begins:</td><td>";
    echo $rowt["intv1start"];   
    echo "</tr></td> <tr><td>Stage 1 ends:</td><td>";
	echo $rowt["intv1end"];	
    echo "</tr></td> <tr><td>Stage 2 begins:</td><td>";
	echo $rowt["intv2start"];   
    echo "</tr></td> <tr><td>Stage 2 ends:</td><td>";
	echo $rowt["intv2end"];   
    	echo "</tr></td> <tr><td>Total subjects:</td><td>";
	echo $totalrows;
	
	echo "</tr></td> <tr><td>Finished cognitive:</td><td>";
	echo $totalrowsc;	
	echo "</tr></td> <tr><td>Finished stage 1:</td><td>";
	echo $totalrowsa;
	echo "</tr></td> <tr><td>Finished stage 2:</td><td>";
	echo $totalrowsb;
	echo "</tr></td> <tr><td>First e-mail:</td><td>";
	echo $firstemail;	
	echo "</tr></td> <tr><td>Stage 1 e-mail:</td><td>";
	echo $stage1email;	
	echo "</tr></td> <tr><td>Stage 2 e-mail:</td><td>";
	echo $stage2email;	
	echo "</tr></td> </div><tr><td> <br></td><td> <br></td></tr></table>";
}
?></td></tr></table>
