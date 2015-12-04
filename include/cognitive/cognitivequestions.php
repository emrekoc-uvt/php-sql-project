<?php require 'include/cognitive/cognitiveanswercounter.php'; ?>

<?php $thisvariable= $variables[$numanswers] ;?>

<?php 
if($thisvariable==='choicec1q'){
$thequestion='A bat and a ball cost 1.10 Euro in total. The bat costs 1.00 Euro more than the ball. How much does the ball cost?';
$theunit='Euro';	
$thetype='field';
} 
if($thisvariable==='choicec2q'){
$thequestion='If it takes 5 machines 5 minutes to make 5 widgets, how long would it take 100 machines to make 100 widgets?';
$theunit='minutes';
$thetype='field';	
} 
if($thisvariable==='choicec3q'){
$thequestion='In a lake, there is a pitch of lily pads. Every day, the patch doubles in size. If it takes 48 days for the patch to cover the entire lake, how long would it take for the patch to cover half of the lake?';
$theunit='days';	
$thetype='field';
} 
if($thisvariable==='choicec4q'){
$thequestion='You play a guessing game with a computer. The computer makes rational choices and aims to win the game. Furthermore, he assumes that he is playing with a rational person. He also assumes that you assume that you are playing with a rational computer which aims to win the game and so on. <br> <br> The rules of the guessing game are as follows: On a piece of paper, both players (you and the computer) write a number between 0 and 100. After the players have finished, a referee collects the papers. Players cannot see each other\'s numbers and they are not allowed to communicate with each other. The referee takes the average of these two numbers and multiplies the average with 2/3. The player with the number closest to this amount (average of the two numbers times 2/3) wins the game.  What is the number that you would choose to win the game or at least not to lose it?';
$theunit='';	
$thetype='field';
} 
if($thisvariable==='choicec5q'){
$thequestion='Two identical newspaper stands will be opened on a street. Both vendors are rational and aim to maximize their individual sales. Furthermore, this information is common knowledge. This means that, both vendors know the fact that both vendors are rational and aim to maximize their individual sales; both vendors know the fact that both vendors know that both vendors are rational and aim to maximize their individual profits and so on. <br> <br>Houses are spread uniformly along the street between points A and B. Each household is willing to buy one newspaper every day. Since two newspaper stands are identical, households will buy their newspapers from the closest vendor. The first stand is going to be opened by vendor X. One week after that vendor Y is going to open another newspaper stand on the street. Where will the two stands be located?';
$thetype='radiopic';
$sizeradio=4;
} 

/* echo "thisvariable : ".$thisvariable; */

if($thisvariable==='smoke'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='Do you smoke tobacco?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='Yes';
$radiooptions[1]='No';
$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 

if($thisvariable==='pastsmoke'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='Have you smoked tobacco regularly in the past?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='Yes';
$radiooptions[1]='No';
$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 

if($thisvariable==='trystopsmoke'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='Have you ever tried to quit smoking?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='Yes';
$radiooptions[1]='No';
$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 

if($thisvariable==='exercise'){
 /* echo "thisvariable : ".$thisvariable ; */
$thequestion='Do you exercise ?';
$thetype='radio';
/* echo "thetype : ".$thetype ; */
$radiooptions=array();
$radiooptions[0]='Yes';
$radiooptions[1]='No';
$sizeradio=count($radiooptions);
/* echo "sizeradio : ".$sizeradio ; */
} 

if($thisvariable==='exercisehours'){
$thequestion='How many hours per week do you exercise?';
$theunit='hour(s)';	
$thetype='field';
} 

if($thisvariable==='internet'){
$thequestion='How many days per week do you use the internet?';
$theunit='day(s)';	
$thetype='field';
} 
if($thisvariable==='consume'){
$thequestion='How much money on average do you spend each month on consumption of goods and services, including entertainment, rent, food, furniture, gas, electricity, water, transportation, vacation expenses? (Please exclude your tuition.)';
$theunit='Euro';	
$thetype='field';
} 

?>