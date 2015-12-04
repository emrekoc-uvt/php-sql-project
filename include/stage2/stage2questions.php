<?php require 'include/stage2/stage2answercounter.php'; ?>
<?php $thisvariable= $variables[$numanswers] ;?>
<?php /* echo "thisvariable : $thisvariable"; */?>
<?php /*  echo "numanswers : $numanswers"; */ ?>

<?php 
if($thisvariable==='stage2decision'){
$thetype='stage2decision';
}  /* ($thisvariable==='stage2decision') */ ?>

<?php 
if($thisvariable==='byear'){
$thequestion='What is your year of birth (yyyy) ?';
$theunit='';
$thetype='field';	
} 
?>

<?php 
if($thisvariable==='gender'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='What is your gender ?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='Male';
$radiooptions[1]='Female';
$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 
?>

<?php 
if($thisvariable==='nationality'){
$thequestion='What is your nationality ?';
$theunit='';
$thetype='field';	
} 
?>

<?php 
if($thisvariable==='school'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='Which faculty are you from ?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='School of Economics and Management';
$radiooptions[1]='Law School';
$radiooptions[2]='Other';
$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 
?>

<?php 
if($thisvariable==='syear'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='What is your year of study ?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='Bachelor 1';
$radiooptions[1]='Bachelor 2';
$radiooptions[2]='Bachelor 3';
$radiooptions[3]='Bachelor 4';
$radiooptions[4]='Master';
$radiooptions[5]='Other';
$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 
?>

<?php 
if($thisvariable==='mincome'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='What is the yearly net income of your mother ?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='+ &#8364 100K';
$radiooptions[1]='&#8364 100K - &#8364 80K';
$radiooptions[2]='&#8364 80K - &#8364 60K';
$radiooptions[3]='&#8364 60K - &#8364 40K';
$radiooptions[4]='&#8364 40K - &#8364 20K';
$radiooptions[5]='&#8364 20K - &#8364 10K';
$radiooptions[6]='&#8364 10K - &#8364 5K';
$radiooptions[7]='&#8364 5K - &#8364 0';
$radiooptions[8]='Not applicable';

$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 
?>

<?php 
if($thisvariable==='fincome'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='What is the yearly net income of your father ?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='+ &#8364 100K';
$radiooptions[1]='&#8364 100K - &#8364 80K';
$radiooptions[2]='&#8364 80K - &#8364 60K';
$radiooptions[3]='&#8364 60K - &#8364 40K';
$radiooptions[4]='&#8364 40K - &#8364 20K';
$radiooptions[5]='&#8364 20K - &#8364 10K';
$radiooptions[6]='&#8364 10K - &#8364 5K';
$radiooptions[7]='&#8364 5K - &#8364 0';
$radiooptions[8]='Not applicable';

$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 
?>

<?php 
if($thisvariable==='height'){
$thequestion='What is your height ?';
$theunit='cm';
$thetype='field';	
} 
?>

<?php 
if($thisvariable==='weight'){
$thequestion='What is your weight ?';
$theunit='kg';
$thetype='field';	
} 
?>

<?php 
if($thisvariable==='knowinterest'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='Do you know the current market interest rates ?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='Yes';
$radiooptions[1]='No';

$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 
?>
<?php 
if($thisvariable==='useinterest'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='Have you taken market interest rates into account in this experiment ?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='Yes';
$radiooptions[1]='No';

$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 
?>

<?php 
if($thisvariable==='estimateinterest'){
$thequestion='If so what is your estimate for the annual risk-free market interest rate ?';
$theunit='&#37;';
$thetype='field';	
} 
?>
