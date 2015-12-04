<?php 

$id=$_SESSION['id'];
$row=mysql_fetch_assoc(mysql_query("SELECT finished0, finishedt, finished1, finished2 FROM tut_users WHERE id='$id' "));			
$finished0=$row['finished0'];
$_SESSION['finished0']=$finished0 ;
$finishedt=$row['finishedt'];
$_SESSION['finishedt']=$finishedt ;
$finished1=$row['finished1'];
$_SESSION['finished1']=$finished1 ;
$finished2=$row['finished2'];
$_SESSION['finished2']=$finished2 ;

?>