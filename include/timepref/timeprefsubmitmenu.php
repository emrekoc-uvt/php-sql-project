<?php require 'include/browserchecker.php';?>

	<table <?php if($browser==='ie'){ echo 'class=left'; }?> >
	<tr>
	<td width="<?php if($browser==='ie'){ echo '33%'; }else{ echo '33%'; }?>">
	<div class="submit2">
     <input type="submit" id="submit2" name="submitins" value="Instructions" />
	 </div>
	 </td>
	<td width="<?php if($browser==='ie'){ echo '33%'; }else{ echo '33%'; }?>" <?php if($browser==='ie'){ echo 'class=lefty'; }?> >  	 
	<div class="submit2">
     <input type="submit" id="submit2" name="submitt" value="Submit" />
	 </div>
    </td> 
    <td width="<?php if($browser==='ie'){ echo '33%'; }else{ echo '33%'; }?>"><?php $progresspercent=($numanswers / $noquestions) * 100 ;?> 
	
	<?php if($browser==='ie'){?> 
    <div class='iesubmit'>
    <div class='iesubmittd' style="width:<?php echo $progresspercent."%";?>">
    </div>
    <div class='iesubmittd2' style="width:<?php $progresspercentinverse= 100 - $progresspercent; echo $progresspercentinverse."%";?>">
    </div>
    </div>
        <?php } else{/* if($browser==='ie') */?>
    <div class="meter orange">
	<span style="width:<?php echo $progresspercent."%";?>"> </span>
	</div>
    
    <?php } /* else($browser==='ie') */?>
    
    </td>
    </tr> 
    </table>