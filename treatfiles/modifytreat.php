	<?php 
if(isSet($_POST['modify1']))
{
    
	
	$modifythistreat = mysql_real_escape_string($_POST['treatid']);	
	$treatid= $modifythistreat;
	$modifythistreat = mysql_fetch_assoc(mysql_query("SELECT treat FROM treatments WHERE treat=$modifythistreat "));
	
		
	$errm1 = array();
	
	
		$type = mysql_real_escape_string($_POST['type']); 
		$type2 = mysql_real_escape_string($_POST['type2']); 
		
	if(!$modifythistreat){
	$errm1[]=' * Invalid entry!';

	} /* if(!$modifythistreat) */
	unset($modifythistreat);
				
	if( !$type or !$type2 ){
	$errm1[]='* You should choose a treatment type!';	
	}
	
if(ctype_digit($treatid) ){} else{
	$errm1[]='* Treatment id should be an integer! ';	
	
}
	
	if(!count($errm1))
	{ 	
	
		
		$querym1= "UPDATE treatments SET type='".$type."', type2='".$type2."' WHERE treat=$treatid";
		 
		echo $querym1;
		$resultm1 = mysql_query($querym1) or die(mysql_error());
		unset($querym1);
		$_SESSION['successm1']='Successfully modified';		
	}	

 if(count($errm1))
	{
		$_SESSION['errm1'] = implode('<br />',$errm1);
	}
	header("Location: treatments.php?modifyt");
	exit;
}/* if(isSet($_POST['modify1'])) */
	?>
<?php 
if(isSet($_POST['modify2']))
{
    
	$modifythistreat = mysql_real_escape_string($_POST['treatid']);	
	$treatid= $modifythistreat;
	$modifythistreat = mysql_fetch_assoc(mysql_query("SELECT treat FROM treatments WHERE treat=$modifythistreat "));
	
	$errm2 = array();
	
	$intv1start =  $_POST['intv1start']; 
    $intv2start =  $_POST['intv2start'];
 
	$intv1end =  $_POST['intv1end']; 
	$intv2end =  $_POST['intv2end'];	
	
			
if(isSet($_POST['precision'])){
	$intv1start = date("Y-m-d H:i:s",strtotime($intv1start)); 
    $intv2start = date("Y-m-d H:i:s",strtotime($intv2start));

	$intv1end = date("Y-m-d H:i:s",strtotime($intv1end)); 
	$intv2end = date("Y-m-d H:i:s",strtotime($intv2end));
		
	
	$intv1starta = strtotime($intv1start); 
    $intv2starta = strtotime($intv2start);
  
	$intv1enda = strtotime($intv1end); 
	$intv2enda = strtotime($intv2end);
	
	
if( $intv1starta <= $intv1enda and $intv1enda <= $intv2starta and $intv2starta <= $intv2enda ){
	
} else {$errm2[]='* Invalid ordering of dates!';	
	}
			
} /* if(isSet($_POST['precision'])) */

else{ /* not if(isSet($_POST['precision'])) */
		
	$intv1start = date("Y-m-d",strtotime($intv1start)); 
    $intv2start = date("Y-m-d",strtotime($intv2start));
 
	$intv1end = date("Y-m-d" ,strtotime($intv1end)); 
	$intv2end = date("Y-m-d",strtotime($intv2end));
		
	$intv1start = "$intv1start 00:00:00"; 
    $intv2start = "$intv2start 00:00:00";
	$intv1end = "$intv1end 23:59:30"; 
	$intv2end = "$intv2end 23:59:30";
	
	$intv1start = date("Y-m-d H:i:s",strtotime($intv1start)); 
    $intv2start = date("Y-m-d H:i:s",strtotime($intv2start));
	$intv1end = date("Y-m-d H:i:s" ,strtotime($intv1end)); 
	$intv2end = date("Y-m-d H:i:s",strtotime($intv2end));
	
	$intv1starta = strtotime($intv1start); 
    $intv2starta = strtotime($intv2start);
	$intv1enda = strtotime($intv1end); 
	$intv2enda = strtotime($intv2end);
	
if(  $intv1starta <= $intv1enda and $intv1enda <= $intv2starta and $intv2starta <= $intv2enda ){

} else {$errm2[]='* Invalid ordering of dates!';	
	}
	
	} /* not if(isSet($_POST['precision'])) */
	
	if(!$modifythistreat){
	
	$errm2[]=' * Id does not exist!';

	} /* if(!$modifythistreat) */
	unset($modifythistreat);
		
	if( !$intv1start or !$intv2start  or !$intv2end or !$intv1end){
	$errm2[]='* Invalid date!';	
	}
	
if(ctype_digit($treatid) ){ } else{
	$errm2[]='* Invalid treatment id!';	
	}
	
	if(!count($errm2))
	{ 	
		 $intv1start= mysql_real_escape_string($intv1start);
		$intv2start= mysql_real_escape_string($intv2start);
	
		$intv1end= mysql_real_escape_string($intv1end);
		$intv2end= mysql_real_escape_string($intv2end);
		

		$querym2= "UPDATE treatments SET 
		intv1start='".$intv1start."' , 
		intv2start='".$intv2start."' , 
		
		intv1end='".$intv1end."' , 
		intv2end='".$intv2end."'  
		
		WHERE treat=$treatid";
 
		$resultm2 = mysql_query($querym2) or die(mysql_error());
		unset($querym2);
		
		
		$_SESSION['successm2']='Successfully modified';		
	}	

 if(count($errm2))
	{
		$_SESSION['errm2'] = implode('<br />',$errm2);
	}
	header("Location: treatments.php?modifyt");
	exit;
}/* if(isSet($_POST['modify2'])) */
	?>
	
	<form id="login" method="post" action=""> 

    <h1>Modify a new treatment</h1>
<?php
						
						if($_SESSION['errm1'])
						{
							echo '<div class="err">'.$_SESSION['errm1'].'</div>';
							unset($_SESSION['errm1']);
						}
						
						if($_SESSION['successm1'])
						{
							echo '<div class="success">'.$_SESSION['successm1'].'</div>';
							unset($_SESSION['successm1']);
						}
					?>
 <div class="field">
    	   
        <div class="field">
    	<label for="treatid" >Treatment id:</label> 
    	<input type="text" name="treatid" id="treatid"  title="Please enter an integer" />
    </div>			
 <div class="field">
    	Treatment type
    
    </div>
    <div class="field">	
    	<p class="tiny"><label for="type" >No framing </label>
    	<input type="radio" name="type" value="noframe"  title="Subject chooses whether or not to buy the commitment device" />
    </p></div>

	<div class="field">    	
    	<p class="tiny"><label for="type" >Framing </label>
    	<input type="radio" name="type" value="frame"  title="Commitment device is given by the experimenter" />    
    </p></div>
    
       <div class="field">
    Treatment type - 2    
    </div>
    <div class="field">	
    	<p class="tiny"><label for="type2" >Do not remind old choices</label>
    	<input type="radio" name="type2" value="noremind"  title="Do not remind old choices" />
    </p></div>

	<div class="field">    	
    	<p class="tiny"><label for="type2" >Remind old choices </label>
    	<input type="radio" name="type2" value="remind"  title="Remind old choices" />    
    </p></div>
    
     <div class="submit">
     <input type="submit" id="submit" name="modify1" value="Modify" />               
    </div></div>
    </form>	  
    
    <form id="login" method="post" action="">   
   <?php
						if($_SESSION['errm2'])
						{
							echo '<div class="err">'.$_SESSION['errm2'].'</div>';
							unset($_SESSION['errm2']);
						}
						
						if($_SESSION['successm2'])
						{
							echo '<div class="success">'.$_SESSION['successm2'].'</div>';
							unset($_SESSION['successm2']);
						}
					?>
   <div class="field">
    <div class="field">
    	<label for="treatid" >Treatment id:</label> 
    	<input type="text" name="treatid" id="treatid"  title="Please enter an integer" />
    </div>	
    
     <?php if($displaymodifytprecise != 1){?>
    
    <div class="field">
    	<p class="tiny">Dates should be in 01-Jan-2010 format </p>
    
    </div>
       <div class="field">
    	<p class="tiny"><a href="?modifytprecise&modifyt">Click here for a more precise format </a> </p>
    
    </div>
    <?php } /*if($displaymodifytprecise != 1)*/?>
    <?php if($displaymodifytprecise == 1){?>
    
    <div class="field">
    	<p>Example: 2010-12-30 03:36:00  </p>
    
    </div>
       <div class="field">
    	<p><a href="?addt">Click here for a less precise format </a> </p>
    
    </div>
    <?php } /*if($displaymodifytprecise != 1)*/?>
    
    
    	
    <div class="field">
    	<label for="intv1start">Interval 1 start:</label>
    	<input type="text" name="intv1start" id="intv1start"  title="Please provide a date" />
    </div>	
    <div class="field">
    	<label for="intv1end">Interval 1 end:</label>
    	<input type="text" name="intv1end" id="intv1end"  title="Please provide a date" />
    </div>	     
    <div class="field">
    	<label for="intv2start">Interval 2 start:</label>
    	<input type="text" name="intv2start" id="intv2start"  title="Please provide a date" />
    </div>
    <div class="field">
    	<label for="intv2end">Interval 2 end:</label>
    	<input type="text" name="intv2end" id="intv2end"  title="Please provide a date" />
    </div>	


    
    <?php if($displaymodifytprecise == 1){?>
    <input type="hidden" name="precision" value="1">
     <?php } /*if($displayaddtprecise == 1)*/ ?>
    
     <div class="submit">
     <input type="submit" id="submit" name="modify2" value="Modify" />               
    </div></div>
    </form>	  
    
   