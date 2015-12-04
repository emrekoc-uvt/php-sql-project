<?php if($_SESSION['finished0']==1 and $_SESSION['finishedt']==1 and $_SESSION['finished1']==0){?>

<?php require 'include/sophistication/sophisticationanswercounter.php';
$randomnumb=rand(1,$noquestions);
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
$id=$_SESSION['id'];
$rowvars=mysql_fetch_row(mysql_query("SELECT $var, $vark, $vary, $varr1, $varr2 FROM results WHERE id=$id ")); 
$decision=$rowvars[0];
$k=$rowvars[1];
$y=$rowvars[2];
$r1=$rowvars[3];
$r2=$rowvars[4];

/* select type of question */
$findid=$randomnumb -1;
$row14="SELECT types FROM stagequestions WHERE id5=$findid "; 
$result14 = mysql_query($row14) or die (mysql_error());
$row14 = mysql_fetch_row($result14);
$types2=$row14[0];
		
/* Update stage1chosen */
$queryu = "UPDATE results SET stage1chosen='$randomnumb' , stage1chosentype='$types2', updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' WHERE id=$id" ;
mysql_query($queryu) or die(mysql_error());
unset($queryu);

$queryu = "UPDATE results SET stage2d='$decision', stage2y='$y' , stage2k='$k' , stage2r1='$r1' , stage2r2='$r2'
	 WHERE id=$id" ;
		mysql_query($queryu) or die(mysql_error());
		unset($queryu);
?>
<?php } /* <?php if($_SESSION['finished0']==1 and $_SESSION['finishedt']==1 and $_SESSION['finished1']==0)?>
 */?>