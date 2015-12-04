<?php require "include/sophistication/betacounter.php"?>
<?php $betas=array() ; $minbeta=array(); $maxbeta=array(); $type=0; ?>
<?php $minbeta[0]=$minbeta1a; $minbeta[1]=$minbeta1b; $minbeta[3]=$minbeta2a; $minbeta[4]=$minbeta2b; $minbeta[2]=$minbeta1c; $minbeta[5]=$minbeta2c; ?>
<?php $maxbeta[0]=$maxbeta1a; $maxbeta[1]=$maxbeta1b; $maxbeta[3]=$maxbeta2a; $maxbeta[4]=$maxbeta2b; $maxbeta[2]=$maxbeta1c; $maxbeta[5]=$maxbeta2c; ?>
<?php /* echo "minbeta[0]: ".$minbeta[0]; */ ?>
<?php /* echo "minbeta1a : ".$minbeta1a; */ ?>
<?php while($type<=5){?>
<?php /* echo "in beta loader"; */ ?>
<?php
$betaarray=array();
$arraysoonpay=array();
$arraylaterpay=array();?>

<?php 
$j=0;
$i=$minbeta[$type];
/* echo "first i :".$i; */
while($i<=$maxbeta[$type]){
$row="SELECT soonpay, laterpay FROM timequestions  WHERE id4='$i' "; 
$result = mysql_query($row) or die (mysql_error());
$results = mysql_fetch_assoc($result);
$arraylaterpay[$j]=$results['laterpay'];
$arraysoonpay[$j]=$results['soonpay'];
/* echo "arraysoonpay".$j." : ".$arraysoonpay[$j]."<br>";
echo "arraylaterpay".$j." : ".$arraylaterpay[$j]."<br>"; 
echo "mysql :".$row; */
$j=$j+1;
unset($rowid4);
unset($result);
unset($results);
$i=$i+1;
} /* while ($i<=$maxbeta.$type) */
?>
<?php require "include/timepref/timeprefanswercounter.php"?>
<?php $id=$_SESSION['id'];?>

<?php 
$j=0;
$i=$minbeta[$type];
while($i<=$maxbeta[$type]){
$x=$i-1;	
$row="SELECT $variables[$x] FROM results  WHERE id='$id' "; 
$result = mysql_query($row) or die (mysql_error());
$results = mysql_fetch_row($result);
$betaarray[$j]=$results[0];
/* echo "beta array".$j." : ".$betaarray[$j]."<br>";
echo "mysql : ".$row."<br>"; */
$j=$j+1;
unset($rowid4);
unset($result);
unset($results);
$i=$i+1;
} /* while ($i<=$maxbeta.$type) */
?>

<?php require "include/sophistication/betacalculator.php"?>
<?php 
$betas[$type]=$beta;
/* echo "betas".$type." : ".$betas[$type]; */ ?>
<?php unset($betaarray);
unset($arraysoonpay);
unset($arraylaterpay);?>

<?php 
/*
$i=0;
$lengthbeta=count($betaarray);
while($i<=$lengthbeta-1){
echo "betaarray ".$i." : ".$betaarray[$i]."arraysoonpay ".$i." : ".$arraysoonpay[$i]."arraylaterpay ".$i." : ".$arraylaterpay[$i];
$i=$i+1;	
} */
?>

<?php $type=$type + 1 ;
} /* while type <3*/?>

<?php /* $i=0; 
$_SESSION['betas']=' ';
while($i<=3){
echo "betas".$i." : ".$betas[$i];
$_SESSION['betas']= $_SESSION['betas']."betas".$i." : ".$betas[$i]."<br>"; 
$i=$i+1; } */ ?>

<?php 
$beta1=($betas[0]+$betas[1]+$betas[2])/3;
$beta2=($betas[3]+$betas[4]+$betas[5])/3;
?>

<?php if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	$query = "UPDATE results SET t1beta='".$beta1."' , t2beta='".$beta2."'  , updatetime4=NOW(), ip4='".$_SERVER['REMOTE_ADDR']."' 
	 WHERE id=$id" ;
		mysql_query($query) or die(mysql_error());
		unset($query);
 }/* if(isset($_SESSION['id']))*/?>

<?php /* echo "beta1:".$beta1; */ ?>
<?php /* echo "beta2:".$beta2; */ ?>
