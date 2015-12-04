<?php if($_SESSION['sopinstructionsstory']==1){?>

<form id="login3" method="post" action="">
<A NAME="mistake"></A>
 
<h1>Please read the story and answer the question</h1>
<table ><tr><td> </td></tr>
<tr><td>
<?php
						
						if($_SESSION['erris'])
						{
							echo '<div class="err">'.$_SESSION['erris'].'</div>';
							unset($_SESSION['erris']);
							
						}
						
						/* if($_SESSION['successis'])
						{
							echo '<div class="success">'.$_SESSION['successis'].'</div>';
							unset($_SESSION['successis']);
					
						}*/						
					?> 
</td></tr>
<tr><td>
<?php require 'include/sophistication/sophisticationstory.php';?>
<p class="big">What might be the moral of this story ?</p> 
 </td></tr>
<tr><td>
		<table>
		<tr>
		<td><input type="radio" name="choice" value="option1"  title="option 1" ></td>
		<td><p class="big">Some people work more carefully when the weather is rainy, while others are more productive on sunny days.</p></td>
		</tr>

		<tr>
		<td><input type="radio" name="choice" value="option2"  title="option 2" ></td>
		<td><p class="big">Some people take a lot of risk when they are encouraged.</p></td>
		</tr>

		<tr>
		<td><input type="radio" name="choice" value="option3"  title="option 3" ></td>
		<td><p class="big">Some people enjoy to help others while others are inherently selfish.</p></td>
		</tr>
		
		<?php if($_SESSION['treattype']==='noframe'){?>
		<tr>
		<td><input type="radio" name="choice" value="option4"  title="option 4" ></td>
		<td><p class="big">Some people spend more effort when they work as a part of a group.</p></td>
		</tr>
		<?php } /* if($_SESSION['treattype']==='frame') */ ?>
		<?php if($_SESSION['treattype']==='frame'){?>		
		<tr>
		<td><input type="radio" name="choice" value="option4"  title="option 4" ></td>
		<td><p class="big">Some people take future consequences of their actions into account when they make decisions.</p></td>
		</tr>
		<?php } /* if($_SESSION['treattype']==='noframe') */ ?>
		
		<tr>
		<td><input type="radio" name="choice" value="option5"  title="option 5" ></td>
		<td><p class="big">Some people are inclined to buy a product when the product is more expensive.</p></td>
		</tr>
		</table>
</td></tr>

</table>

<br>
<p class="big"><input type="checkbox" name="read" id=" read" value="1" /> I have read the story. </p>
  			      
<?php require 'include/browserchecker.php';?>
  			      
<table><tr>
<td width="<?php if($browser==='ie'){ echo '32%'; }else{ echo '41%'; }?>">
</td>
<td width="<?php if($browser==='ie'){ echo '33%'; }else{ echo '33%'; }?>"> 	
 <div class="submit2" > 
     <input type="submit" id="submit2" name="submitinstructstory" value="Next" />
	 </div>
	 </td>
<td width="<?php if($browser==='ie'){ echo '35%'; }else{ echo '26%'; }?>">
</td></tr></table>

</form>
<?php } /*if(!isset($_SESSION['sopinstructionsstory']))*/ ?>