<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Page | Uvt Experiment</title>
	<meta name="description" content="Admin Page | Uvt Experiment" />
    <meta name="keywords" content="economic, experiment"/>
	<?php require 'css/header.php';?>
</head>

<body> 

<?php
error_reporting(0);
require 'include/connect.php';
session_start(); ?>		

<?php 	if($_SESSION['admin']!= 1){ ?>

		<?php 	require 'adminfiles/noadmin.php'; ?>
	
			<?php } ?>
	



<?php 		if($_SESSION['admin']== 1){ ?>
			<?php 	require 'treatfiles/displayconditions.php'; ?>

<table width="100%"><tr><td width="55%">			
			<?php 	require 'treatfiles/menu.php'; ?>
		</td><td width="45%">
	
	<?php if($displayviewt==1){ ?> 
	<?php require 'treatfiles/viewtreat.php';?> 
	<?php } /* if if($displayviewt==1) */ ?>

<?php if($displayaddt==1){ ?>
<?php require 'treatfiles/addtreat.php';?> 
<?php } /* if if($displayaddt==1) */ ?>

<?php if($displayemail==1){ ?>			
<?php require 'treatfiles/emaillist.php';?> 
<?php } /* if displayemail=1 */ ?>


<?php if($displaymodifyt==1){ ?>
<?php require 'treatfiles/modifytreat.php';?> 
<?php } /* if if($displaymodifyt==1) */ ?>

<?php if($displaydropt==1){ ?>
<?php require 'treatfiles/droptreat.php';?> 
<?php } /* if if($displaydropt==1) */ ?>

 <?php if($displayttest==1){ ?>
<?php require 'treatfiles/timetest.php';?>			
<?php }/* if displayttest=1 */ ?>

 <?php if($displaytimer==1){ ?>
<?php require 'treatfiles/settimer.php';?>			
<?php }/* if displaytimer=1 */ ?>

<?php } /* if($_SESSION['admin']!= 1) */ ?>
</td></tr></table>					
</body>
</html>

	