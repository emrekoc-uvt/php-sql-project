<?php require 'include/connect.php'; ?>
<?php 
$stage1treatment=1111;
$stage2treatment=2222;
?>

<?php $row14="SELECT type FROM treatments WHERE treat=$stage1treatment "; 
$result14 = mysql_query($row14) or die (mysql_error());
$row14 = mysql_fetch_row($result14);
$stage1treatmentpresent=$row14[0]; 
/* echo "stage1treatmentpresent : ".$stage1treatmentpresent; */
if(!$stage1treatmentpresent){
$row15="INSERT INTO treatments (`treat`, `type`, `type2`, `intv1start`, `intv1end`, `intv2start`, `intv2end`, `updatetime2`, `total`, `stage1`, `stage2`, `stage0`) VALUES
($stage1treatment, 'noframe', 'remind', '2010-03-28 00:00:00', '2029-03-31 23:59:30', '2030-04-06 00:00:00', '2031-04-08 23:59:30', '2010-04-07 14:44:57', 0, 0, 0, 0)";	
$result14 = mysql_query($row15) or die (mysql_error());
} /* if(!$stage1treatmentpresent) */
?>

<?php $row14="SELECT type FROM treatments WHERE treat=$stage2treatment "; 
$result14 = mysql_query($row14) or die (mysql_error());
$row14 = mysql_fetch_row($result14);
$stage2treatmentpresent=$row14[0]; 
if(!$stage2treatmentpresent){
$row15="INSERT INTO treatments (`treat`, `type`, `type2`, `intv1start`, `intv1end`, `intv2start`, `intv2end`, `updatetime2`, `total`, `stage1`, `stage2`, `stage0`) VALUES
($stage2treatment, 'noframe', 'remind', '2010-03-28 00:00:00', '2011-03-31 23:59:30', '2012-04-06 00:00:00', '2031-04-08 23:59:30', '2010-04-07 14:44:57', 0, 0, 0, 0)";	
$result14 = mysql_query($row15) or die (mysql_error());
}/* if($stage2treatmentpresent) */
?>

<?php if(isset($_GET["beginner"]) or isset($_GET["timedone"]) or isset($_GET["cognitivedone"]) ){?>
<?php 
$randomnumber=rand(1,9999);
/* echo "random number : ".$randomnumber; */
$username="emre".$randomnumber;
$pass=emre ;
$email= "tester".$randomnumber."@tester.com";
$addthistreat=$stage1treatment ;
$timer1=9999 ;
$timer2=9999 ;
$timer3=9999 ;
$timer4=9999 ;

$query9 = "INSERT INTO tut_users(id,usr,admin,pass,email,ip, modifytime1 ,treat, remainingtimer1, remainingtimer2, remainingtimer3, remainingtimer4) VALUES('".$randomnumber."','".$username."',0,'".md5($pass)."','".$email."','".$_SERVER['REMOTE_ADDR']."',NOW(),'$addthistreat','$timer1','$timer2','$timer3','$timer4' )" ;
		mysql_query($query9) or die(mysql_error()); ?>

<?php } /* if(isset($_GET["beginner"]) or isset($_GET["timedone"]) or isset($_GET["cognitivedone"]) ) */?>

<?php if(isset($_GET["stage2"])){
$randomnumber=rand(1,9999);
/* echo "random number : ".$randomnumber; */
$username="emre".$randomnumber;
$pass=emre ;
$email= "tester".$randomnumber."@tester.com";
$addthistreat=$stage2treatment ;
$timer1=9999 ;
$timer2=9999 ;
$timer3=9999 ;
$timer4=9999 ;

$query9 = "INSERT INTO tut_users(id,usr,admin,pass,email,ip, modifytime1 ,treat, remainingtimer1, remainingtimer2, remainingtimer3, remainingtimer4) VALUES('".$randomnumber."','".$username."',0,'".md5($pass)."','".$email."','".$_SERVER['REMOTE_ADDR']."',NOW(),'$addthistreat','$timer1','$timer2','$timer3','$timer4' )" ;
		mysql_query($query9) or die(mysql_error()); 		
} /* or isset($_GET["stage2"]) */ ?>

<?php if(isset($_GET["timedone"]) or isset($_GET["cognitivedone"]) or isset($_GET["stage2"])){?>
<?php $query5 ="SELECT max(id4) FROM timequestions";
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

?>
	
<?php $values=array();
$i=0;
while($i<=$noquestions-1){
$randnum=rand(0,1);
if($randnum==0){$values[$i]=option1;}
else{$values[$i]=option2;;}
$i=$i +1;	
}

$i=0;
$string2=" ";
while($i<=$noquestions-1){
if($i>=$noquestions-1){$string2=$string2."\""."$values[$i]"."\"";}
else{$string2=$string2."\""."$values[$i]"."\"".", ";}
$i=$i +1;	
}

?>

		<?php 		$query19 = "INSERT INTO results(id, treat, $string) VALUES('".$randomnumber."','".$stage1treatment."', $string2 )" ;
		mysql_query($query19) or die(mysql_error()); ?> 
	
	<?php $queryl = "UPDATE tut_users SET finishedt=1 , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' WHERE id='$randomnumber' " ;
		mysql_query($queryl) or die(mysql_error());
		unset($queryl); ?>
<?php } /* <?php if( isset($_GET["timedone"]) or isset($_GET["cognitivedone"]) ){?>*/?>		
<?php if(isset($_GET["cognitivedone"])  or isset($_GET["stage2"])){?>
		
<?php 
$variables= array(choicec1q,  	
choicec2q, 
choicec3q,
choicec4q,
choicec5q, 
smoke, 
consume, 
internet);

$noquestions=count($variables); /* size of array*/

/* echo "noquestions : ".$noquestions ; */

		$i=0;
		while($i<=$noquestions-1){
		$thevar=$variables[$i];	
		/* echo "thevar : ".$thevar; */
		$query19 = "UPDATE results SET $thevar=1 WHERE id='$randomnumber'" ;
		mysql_query($query19) or die(mysql_error()); 
		unset($query19);
		$i=$i+1;
		}
  
		$queryl = "UPDATE tut_users SET finished0='1' , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' WHERE id='$randomnumber' " ;
		mysql_query($queryl) or die(mysql_error());
		unset($queryl); ?>

<?php } /* if(isset($_GET["cognitivedone"]) ) */?>

<?php if(isset($_GET['stage2'])){?>
<?php $queryl = "UPDATE tut_users SET finished1='1' , updatetime1=NOW(), ip='".$_SERVER['REMOTE_ADDR']."' WHERE id='$randomnumber' " ;
		mysql_query($queryl) or die(mysql_error());
		unset($queryl); ?>

<?php 
$varz=array(
choicesq1,	
choicesq2,	
choicesq3,	
choicesq4,	
choicesq5,
choicesq6,
choicesq7,
choicesq8,
choicesq9,
choicesq10,
choicesq11,
choicesq12,
choicesq13,
choicesq14,	
choicesq15,
choicesq16,
choicesq17,
choicesq18,
choicesq19,
choicesq20,
choicesq21);
?>

<?php 
$noquestions=count($varz); /* size of array*/

/* echo "noquestions : ".$noquestions ; */

		$i=0;
		while($i<=$noquestions-1){
		$thevar=$varz[$i];
		$roll=rand(1,2);
		if($roll==1){$outcome='option1';}else{$outcome='option2';}	
		/* echo "thevar : ".$thevar; */
		$query19 = "UPDATE results SET $thevar='$outcome' WHERE id='$randomnumber'" ;
		mysql_query($query19) or die(mysql_error()); 
		unset($query19);
		$i=$i+1;
		}
?>

<?php 
$vark=array(
choicesq1k,	
choicesq2k,	
choicesq3k,	
choicesq4k,	
choicesq5k,
choicesq6k,
choicesq7k,
choicesq8k,
choicesq9k,
choicesq10k,
choicesq11k,
choicesq12k,
choicesq13k,
choicesq14k,	
choicesq15k,
choicesq16k,
choicesq17k,
choicesq18k,
choicesq19k,
choicesq20k,
choicesq21k);
?>

<?php 
$noquestions=count($vark); /* size of array*/

/* echo "noquestions : ".$noquestions ; */

		$i=0;
		while($i<=$noquestions-1){
		$thevar=$vark[$i];
		$query19 = "UPDATE results SET $thevar='7' WHERE id='$randomnumber'" ;
		mysql_query($query19) or die(mysql_error()); 
		unset($query19);
		$i=$i+1;
		}
?>

<?php 
$vary=array(
choicesq1y,	
choicesq2y,	
choicesq3y,	
choicesq4y,	
choicesq5y,
choicesq6y,
choicesq7y,
choicesq8y,
choicesq9y,
choicesq10y,
choicesq11y,
choicesq12y,
choicesq13y,
choicesq14y,	
choicesq15y,
choicesq16y,
choicesq17y,
choicesq18y,
choicesq19y,
choicesq20y,
choicesq21y);?>

<?php 
$noquestions=count($vary); /* size of array*/

/* echo "noquestions : ".$noquestions ; */

		$i=0;
		while($i<=$noquestions-1){
		$thevar=$vary[$i];
		$query19 = "UPDATE results SET $thevar='3' WHERE id='$randomnumber'" ;
		mysql_query($query19) or die(mysql_error()); 
		unset($query19);
		$i=$i+1;
		}
?>

<?php 
$varr1=array(
choicesq1r1,	
choicesq2r1,	
choicesq3r1,	
choicesq4r1,	
choicesq5r1,
choicesq6r1,
choicesq7r1,
choicesq8r1,
choicesq9r1,
choicesq10r1,
choicesq11r1,
choicesq12r1,
choicesq13r1,
choicesq14r1,	
choicesq15r1,
choicesq16r1,
choicesq17r1,
choicesq18r1,
choicesq19r1,
choicesq20r1,
choicesq21r1);?>

<?php 
$noquestions=count($varr1); /* size of array*/

/* echo "noquestions : ".$noquestions ; */

		$i=0;
		while($i<=$noquestions-1){
		$thevar=$varr1[$i];
		$query19 = "UPDATE results SET $thevar='0.6' WHERE id='$randomnumber'" ;
		mysql_query($query19) or die(mysql_error()); 
		unset($query19);
		$i=$i+1;
		}
?>

<?php 
$varr2=array(
choicesq1r2,	
choicesq2r2,	
choicesq3r2,	
choicesq4r2,	
choicesq5r2,
choicesq6r2,
choicesq7r2,
choicesq8r2,
choicesq9r2,
choicesq10r2,
choicesq11r2,
choicesq12r2,
choicesq13r2,
choicesq14r2,	
choicesq15r2,
choicesq16r2,
choicesq17r2,
choicesq18r2,
choicesq19r2,
choicesq20r2,
choicesq21r2);?>

<?php 
$noquestions=count($varr2); /* size of array*/

/* echo "noquestions : ".$noquestions ; */

		$i=0;
		while($i<=$noquestions-1){
		$thevar=$varr2[$i];
		$query19 = "UPDATE results SET $thevar='0.3' WHERE id='$randomnumber'" ;
		mysql_query($query19) or die(mysql_error()); 
		unset($query19);
		$i=$i+1;
		}
?>
<?php 
$randomnumb=rand(1,21);
/* echo "noquestions in soph: ".$noquestions; */
/* echo "randomnumb : ".$randomnumb."<br>";*/

$var='choicesq'.$randomnumb;
$vark='choicesq'.$randomnumb.'k';
$vary='choicesq'.$randomnumb.'y';
$varr1='choicesq'.$randomnumb.'r1';
$varr2='choicesq'.$randomnumb.'r2';

/* echo "var : ".$var."<br>";
echo "vark : ".$vark."<br>"; */

/* get variables */
$rowvars=mysql_fetch_row(mysql_query("SELECT $var, $vark, $vary, $varr1, $varr2 FROM results WHERE id=$randomnumber ")); 
$decision=$rowvars[0];
$k=$rowvars[1];
$y=$rowvars[2];
$r1=$rowvars[3];
$r2=$rowvars[4];

/* echo "var : ".$var."<br>"."decision : ".$decision."<br>"; */
/* Update stage1chosen */
if(1<=$randomnumb and $randomnumb<=7){$typeq='onlylate';}
elseif(8<=$randomnumb and $randomnumb<=14){$typeq='onlyearly';}
elseif(15<=$randomnumb and $randomnumb<=21){$typeq='both';}

$queryu = "UPDATE results SET stage1chosen='$randomnumb' , stage1chosentype='$typeq' , updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' WHERE id=$randomnumber" ;
mysql_query($queryu) or die(mysql_error());
unset($queryu);

$queryu = "UPDATE results SET stage2d='$decision', stage2y='$y' , stage2k='$k' , stage2r1='$r1' , stage2r2='$r2'
	 WHERE id=$randomnumber" ;
		mysql_query($queryu) or die(mysql_error());
		unset($queryu);
		?>
<?php } /* if(isset($_GET['stage2'])) */ ?>
		<?php echo $username."<br>".$pass;?>
		<?php /* echo "random number : ".$randomnumber; */?>
		<?php header( 'refresh: 5; url=login.php' ) ;?>