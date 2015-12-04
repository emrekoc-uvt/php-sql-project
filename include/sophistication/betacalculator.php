<?php 
/*
$betaarray[0]='option2';
$betaarray[1]='option2';
$betaarray[2]='option1';
$betaarray[3]='option2';
$betaarray[4]='option2';
$betaarray[5]='option1';
$betaarray[6]='option1';

$arraysoonpay[0]='4';
$arraysoonpay[1]='4';
$arraysoonpay[2]='4';
$arraysoonpay[3]='4';
$arraysoonpay[4]='4';
$arraysoonpay[5]='4';
$arraysoonpay[6]='4';

$arraylaterpay[0]='5';
$arraylaterpay[1]='5.5';
$arraylaterpay[2]='6';
$arraylaterpay[3]='6.5';
$arraylaterpay[4]='7';
$arraylaterpay[5]='7.5';
$arraylaterpay[6]='8';
*/
?>


<?php 
/* after all necessary data is loaded */
$lengthbeta=count($betaarray);
$arrayratio=array();

$i=0;
while($i<=$lengthbeta-1){
$arrayratio[$i]=$arraysoonpay[$i]/$arraylaterpay[$i];	
/* echo "array ratio ".$i." : ".$arrayratio[$i]; */
$i=$i+1;
}
?>

<?php


$i=0;
$fromtopswitch=0;
while($i<=$lengthbeta-1){
if($fromtopswitch==0 & $betaarray[$i]==='option2'){
$fromtopswitch=$i+1; 
}	/*if($fromtopswitch==0 & $betaarray[$i]==='option2') */
$i=$i +1 ;	
} /* while($i<=$lengthbeta-1) */

$i=$lengthbeta;
$frombottomswitch=$lengthbeta+1;
while($i>=1){
$x=$i-1;	
if($frombottomswitch==$lengthbeta+1 & $betaarray[$x]==='option1'){
$frombottomswitch=$i; 
}	/*if ($frombottomswitch==0 & $betaarray[$i]==='option1')*/
$i=$i -1 ;	
} /* while($i<=$lengthbeta-1) */

?>

<?php
/*
$arrayratio[$lengthbeta]=$arrayratio[$lengthbeta-1]; 
$arrayratio[-1]=$arrayratio[0];
*/

/* fill in extreme values in arrayratio*/
$arrayratio[$lengthbeta]=(($arrayratio[$lengthbeta-1]*$arrayratio[$lengthbeta-2])/(2*$arrayratio[$lengthbeta-2]-$arrayratio[$lengthbeta-1]));
$arrayratio[-1]=1;

if($fromtopswitch==0){$beta=($arrayratio[$lengthbeta-1]+$arrayratio[$lengthbeta])/2;}
elseif($frombottomswitch==$lengthbeta+1){$beta=($arrayratio[0]+$arrayratio[-1])/2;}
else{$betax=($arrayratio[$fromtopswitch-1]+$arrayratio[$fromtopswitch-2])/2;
$betay=($arrayratio[$frombottomswitch-1]+$arrayratio[$frombottomswitch])/2;
$beta=($betax+$betay)/2;}
?>

<?php /* echo "frombottomswitch : ".$frombottomswitch." fromtopswitch : ".$fromtopswitch." beta : ".$beta ;  */  ?>

