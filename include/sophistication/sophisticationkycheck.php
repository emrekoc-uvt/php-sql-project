<?php 
$row14="SELECT k,y FROM stagequestions WHERE id5=$numanswers "; 
/* echo "mysql : ".$row14; */
$result14 = mysql_query($row14) or die (mysql_error());
$row14 = mysql_fetch_assoc($result14);
$k=$row14['k'];
$y=$row14['y'];
$r1=(($k+$y)*2)/($k*($beta1+$beta2))-1;
$r2= (( 0.5 * ( $k + $y ) + 0.5 * ($k * (1 + $r1))) / $k)-1 ;

?>