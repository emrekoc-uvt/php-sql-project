<?php /* echo "in beta counter"; */ ?>


<?php $rowid4="SELECT max(id4) FROM timequestions  WHERE type='beta1a'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$maxbeta1a = mysql_fetch_row($resultid4);
		$maxbeta1a = $maxbeta1a[0];
		/* echo "maxbeta1 : ".$maxbeta1[0]; */ 
		 ?>
		
<?php $rowid4="SELECT min(id4) FROM timequestions  WHERE type='beta1a'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$minbeta1a = mysql_fetch_row($resultid4);
		$minbeta1a=$minbeta1a[0];
		/* echo "maxbeta1 : ".$maxbeta1[0]; */ 
		?>

<?php $rowid4="SELECT max(id4) FROM timequestions  WHERE type='beta1b'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$maxbeta1b = mysql_fetch_row($resultid4);
		$maxbeta1b = $maxbeta1b[0];
		/* echo "maxbeta1 : ".$maxbeta1[0]; */ 
		 ?>
		
<?php $rowid4="SELECT min(id4) FROM timequestions  WHERE type='beta1b'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$minbeta1b = mysql_fetch_row($resultid4);
		$minbeta1b=$minbeta1b[0];
		/* echo "maxbeta1 : ".$maxbeta1[0]; */ 
		?>		
		
		
<?php $rowid4="SELECT max(id4) FROM timequestions  WHERE type='beta2a'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$maxbeta2a = mysql_fetch_row($resultid4);
		/* echo "maxbeta2 : ".$maxbeta2[0]; */ 
		$maxbeta2a=$maxbeta2a[0];
		 ?>
		
<?php $rowid4="SELECT min(id4) FROM timequestions  WHERE type='beta2a'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$minbeta2a = mysql_fetch_row($resultid4);
		/* echo "maxbeta2 : ".$maxbeta2[0]; */ 
		$minbeta2a=$minbeta2a[0];
		?>

<?php $rowid4="SELECT max(id4) FROM timequestions  WHERE type='beta2b'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$maxbeta2b = mysql_fetch_row($resultid4);
		/* echo "maxbeta2 : ".$maxbeta2[0]; */ 
		$maxbeta2b=$maxbeta2b[0]; 
		?>
		
<?php $rowid4="SELECT min(id4) FROM timequestions  WHERE type='beta2b'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$minbeta2b = mysql_fetch_row($resultid4);
		/* echo "maxbeta2 : ".$maxbeta2[0]; */ 
		$minbeta2b=$minbeta2b[0];
		?>		

<?php $rowid4="SELECT max(id4) FROM timequestions  WHERE type='beta1c'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$maxbeta1c = mysql_fetch_row($resultid4);
		/* echo "maxbeta2 : ".$maxbeta2[0]; */ 
		$maxbeta1c=$maxbeta1c[0];
		 ?>
		
<?php $rowid4="SELECT min(id4) FROM timequestions  WHERE type='beta1c'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$minbeta1c = mysql_fetch_row($resultid4);
		/* echo "maxbeta2 : ".$maxbeta2[0]; */ 
		$minbeta1c=$minbeta1c[0];
		 ?>

<?php $rowid4="SELECT max(id4) FROM timequestions  WHERE type='beta2c'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$maxbeta2c = mysql_fetch_row($resultid4);
		/* echo "maxbeta2 : ".$maxbeta2[0]; */ 
		$maxbeta2c=$maxbeta2c[0];
		 ?>
		
<?php $rowid4="SELECT min(id4) FROM timequestions  WHERE type='beta2c'"; 
		$resultid4 = mysql_query($rowid4) or die (mysql_error());
		$minbeta2c = mysql_fetch_row($resultid4);
		/* echo "maxbeta2 : ".$maxbeta2[0]; */ 
		$minbeta2c=$minbeta2c[0];
		 ?>
		
<?php 	/*	echo "maxbeta1a : ".$maxbeta1a."<br>";
			echo "minbeta1a : ".$minbeta1a."<br>";
			echo "maxbeta1b : ".$maxbeta1b."<br>";
			echo "minbeta1b : ".$minbeta1b."<br>";
			echo "maxbeta2a : ".$maxbeta2a."<br>";
			echo "minbeta2a : ".$minbeta2a."<br>";
			echo "maxbeta2b : ".$maxbeta2b."<br>";
			echo "minbeta2b : ".$minbeta2b."<br>";
			echo "maxbeta1c : ".$maxbeta1c."<br>";
			echo "minbeta1c : ".$minbeta1c."<br>";
			echo "maxbeta2c : ".$maxbeta2c."<br>";
			echo "minbeta2c : ".$minbeta2c."<br>"; */

?>