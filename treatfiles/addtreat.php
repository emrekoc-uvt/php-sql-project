<?php 
if(isSet($_POST['createt']))
{    
	$errct = array();
	$modifythistreat = mysql_real_escape_string($_POST['treatid']);	
	$treatid= $modifythistreat;
	$modifythistreat = mysql_fetch_assoc(mysql_query("SELECT treat FROM treatments WHERE treat=$modifythistreat "));

	$type = mysql_real_escape_string($_POST['type']); 				
	$type2 = mysql_real_escape_string($_POST['type2']); 
	
	$treatid = mysql_real_escape_string($_POST['treatid']);
		
	$intv1start =  $_POST['intv1start']; 
    $intv2start =  $_POST['intv2start'];

	$intv1end =  $_POST['intv1end']; 
	$intv2end =  $_POST['intv2end'];
		
	if(isSet($_POST['precision'])) {

	$intv1start = date("Y-m-d H:i:s",strtotime($intv1start)); 
    $intv2start = date("Y-m-d H:i:s",strtotime($intv2start));
 
	$intv1end = date("Y-m-d H:i:s" ,strtotime($intv1end)); 
	$intv2end = date("Y-m-d H:i:s",strtotime($intv2end));
	 
	
	$intv1starta = strtotime($intv1start); 
    $intv2starta = strtotime($intv2start);
  
	$intv1enda = strtotime($intv1end); 
	$intv2enda = strtotime($intv2end);

	if( $intv1starta <= $intv1enda and $intv1enda <= $intv2starta and $intv2starta <= $intv2enda ){
	} else {$errct[]='* Invalid ordering of dates!';	
	} /* ordering*/
	
	} /* if(isSet($_POST['precision'])) */
	
	
	else{ /* if not(isSet($_POST['precision'])) */

	$intv1start = date("Y-m-d",strtotime($intv1start)); 
    $intv2start = date("Y-m-d",strtotime($intv2start));
 
	$intv1end = date("Y-m-d" ,strtotime($intv1end)); 
	$intv2end = date("Y-m-d",strtotime($intv2end));
	 
	
	$intv1starta = strtotime($intv1start); 
    $intv2starta = strtotime($intv2start);
  
	$intv1enda = strtotime($intv1end); 
	$intv2enda = strtotime($intv2end);

	if( $intv1starta <= $intv1enda and $intv1enda <= $intv2starta and $intv2starta <= $intv2enda ){
	} else {$errct[]='* Invalid ordering of dates!';	
	} /* ordering*/
	
	
	}/* if not(isSet($_POST['precision'])) */

	
	
	if($modifythistreat){
	$errct[]='* Invalid entry!';		
	}
	unset($modifythistreat)	;
	if( !$intv1start or !$intv2start or !$intv1end or !$intv2end ){
	$errct[]='* At least one of the dates is invalid!';	
	}
	if( !$type or !$type2){
	$errct[]='* You should choose a treatment type!';	
	}
	
if(ctype_digit($treatid)){} else{
	$errct[]='* Treatment id should be an integer!';	
	}
	
	if(!count($errct))
	{ 	
			
if(isSet($_POST['precision'])){
	$intv1start = date("Y-m-d H:i:s",strtotime($intv1start)); 
    $intv2start = date("Y-m-d H:i:s",strtotime($intv2start));
    
	$intv1end = date("Y-m-d H:i:s" ,strtotime($intv1end)); 
	$intv2end = date("Y-m-d H:i:s",strtotime($intv2end));
		
	}
	else{
		
	$intv1start = "$intv1start 00:00:00"; 
    $intv2start = "$intv2start 00:00:00";
    
	$intv1end = "$intv1end 23:59:30"; 
	$intv2end = "$intv2end 23:59:30";
	
	
	$intv1start = date("Y-m-d H:i:s",strtotime($intv1start)); 
    $intv2start = date("Y-m-d H:i:s",strtotime($intv2start));
    
	$intv1end = date("Y-m-d H:i:s" ,strtotime($intv1end)); 
	$intv2end = date("Y-m-d H:i:s",strtotime($intv2end));
	 }
	
		 $intv1start= mysql_real_escape_string($intv1start);
		$intv2start= mysql_real_escape_string($intv2start);
	
		$intv1end= mysql_real_escape_string($intv1end);
		$intv2end= mysql_real_escape_string($intv2end);
		

		
		$queryct= "INSERT INTO treatments(treat ,  type , type2 , intv1start , intv2start ,intv1end , intv2end ) VALUES($treatid , 
		'".$type."' ,
		'".$type2."' , 
		'".$intv1start."' , 
		'".$intv2start."' , 
		'".$intv1end."' , 
		'".$intv2end."' 
		) "; 
		echo $queryct;
		$resultct = mysql_query($queryct) or die(mysql_error());
		
		$_SESSION['successct']='Successfully created';		
	}	

 if(count($errct))
	{
		$_SESSION['errct'] = implode('<br />',$errct);
	}
	header("Location: treatments.php?addt");
	exit;
}/* if(isSet($_POST['createt'])) */
	?>
	
							<form id="login" method="post" action=""> 

    <h1>Create a new treatment</h1>
<?php
						
						if($_SESSION['errct'])
						{
							echo '<div class="err">'.$_SESSION['errct'].'</div>';
							unset($_SESSION['errct']);
						}
						
						if($_SESSION['successct'])
						{
							echo '<div class="success">'.$_SESSION['successct'].'</div>';
							unset($_SESSION['successct']);
						}
					?>
       <div class="field">
        <div class="field">
    	<label for="treatid" >Treatment id:</label> 
    	<input type="text" name="treatid" id="treatid"  title="Please enter an integer" />
    </div>			
 <div class="field">
    	Treatment type - 1   
    </div>
    <div class="field">	
    	<p class="tiny"><label for="type" >No framing</label>
    	<input type="radio" name="type" value="noframe"  title="Subject sees a neutral text" />
    </p></div>

<div class="field">
    	
    <p class="tiny"><label for="type" >Framing </label>
    <input type="radio" name="type" value="frame"  title="Subject sees a text with framing" />    
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
    
    
    </div>
<br>    
      
    <?php if($displayaddtprecise != 1){?>
    
    <div class="field">
    	<p class="tiny">Dates should be in 01-Jan-2010 format </p>
    
  
       <div class="field">
    	<p class="tiny"><a href="?addtprecise&addt">Click here for a more precise format </a> </p>
    
    </div>
    <?php } /*if($displayaddtprecise != 1)*/?>
    <?php if($displayaddtprecise == 1){?>
    <div class="field">
    <div class="field">
    	<p class="tiny">Example: 2010-12-30 03:36:00  </p>
    
    </div>
       <div class="field">
    	<p class="tiny"><a href="?addt">Click here for a less precise format </a> </p>
    
    </div>
    <?php } /*if($displayaddtprecise != 1)*/?>
    
    
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
    </div>
       <br>
           
    <?php if($displayaddtprecise == 1){?>
    <input type="hidden" name="precision" value="1">
     <?php } /*if($displayaddtprecise == 1)*/ ?>
     <div class="submit">
     <input type="submit" id="submit" name="createt" value="Create" />
	 </div>
    	
   
</form>	
			
	
