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
session_start();		

			if($_SESSION['admin']!= 1){ ?>
<?php require 'adminfiles/noadmin.php'; ?>

	
			<?php } /* if($_SESSION['admin']!= 1){ */ ?>


			<?php if($_SESSION['admin']== 1){ 
				
				require 'adminfiles/displayconditions.php'; 
				?>
			  
<table width="100%">

<tr><td width="55%">			
				<?php require 'adminfiles/menu.php'; ?>

		</td><td width="45%">

			  <?php if($displayadd==1){ ?>
			<?php require 'adminfiles/addsubj.php'; ?>
		<?php }/* if displayadd=1 */ ?>
		
<?php if($displayview==1){?>			
<?php require 'adminfiles/viewsubj.php';?>
<?php } /* if displayview=1 */?> 	

 <?php if($displaymodify==1){ ?>			
<?php require 'adminfiles/modifysubj.php'; ?>
 <?php } /* if displaymodify=1 */ ?>

<?php if($displaydrop==1){?>			
<?php require 'adminfiles/dropsubj.php'; ?>
<?php } /* if($displaydrop==1)*/?>

<?php } /* if admin=1 */ ?>

</td></tr></table>					
</body>
</html>
