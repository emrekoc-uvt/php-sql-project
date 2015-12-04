<?php
error_reporting(0);
require 'include/connect.php';


session_start();


if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: login.php");
	exit;
}

if(isSet($_POST['submit']))
{
		
	$err = array();
		
	if(!$_POST['username'] || !$_POST['password'])
		$err[] = 'All the fields must be filled in!';
		
		
	if($_POST['username']){
	if (!preg_match("/^[A-Za-z0-9]*$/", $_POST['username'])) {
    $err[]='* Please enter a valid user name! ';
}/* if !pregamtch */} /* if $_POST['username']*/

if($_POST['password']){
	if (!preg_match("/^[A-Za-z0-9]*$/", $_POST['password'])) {
    $err[]='* Please enter a valid user name! ';
}/* if !pregamtch */} /* if $_POST['password']*/

if (mysql_ping($link)!=True) {
$err[]='* Lost connection to the database! Please try again in a moment.';	
}
	if(!count($err))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		/* $remember = (int)$_POST['remember']; */
		
		
		$row = mysql_fetch_assoc(mysql_query("SELECT id,usr,admin FROM tut_users WHERE usr='$username' AND pass='".md5($password)."'"));

		if($row)
		{
						
			$_SESSION['username']=$row['usr'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['remember'] = $_POST['remember'];
			$_SESSION['admin'] = $row['admin'];
			$_SESSION['schedulevisited']=0;
			setcookie('remember',$_POST['remember']);
		
		
		$id=$_SESSION['id'];
		$querytime="UPDATE tut_users SET updatetime1= NOW() WHERE id='".$id."' ";
		$resulttime = mysql_query($querytime) or die(mysql_error());
		
		$rowtime = mysql_fetch_assoc(mysql_query("SELECT updatetime1 FROM tut_users WHERE usr='$username' AND pass='" .md5($password). "'"));
	
		}
		else $err[]='Wrong username and/or password!';
	}
	
	if($err)
	$_SESSION['err'] = implode('<br />',$err);
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login  | Uvt Experiment </title>
	<meta name="description" content="Login for the economic experiment" />
    <meta name="keywords" content="economic, experiment "/>
	<?php require 'css/header.php';?>
</head>
<body>
  <?php	if(!$_SESSION['id']): ?>

<form id="login2"  method="post" action=""> 
    <h1>Log in to your account!</h1>
   
     <?php				
						if($_SESSION['err'])
						{
							echo '<div class="err">'.$_SESSION['err'].'</div>';
							unset($_SESSION['err']);
						}
					?>
    <div>
    	<label for="username">Username</label> 
    	<input type="text" name="username"  id="username" class="field" title="Username" />
    </div>			

    <div>
    	<label for="password">Password</label>
    	<input type="password" name="password" id="password" class="field" title="Password is required" />
    </div>			
    
    <p class="forgot"><a href="forget.php" >Forgot your password?</a></p>
    			
    <div class="submit">
    <input type="submit" id="submit" name="submit" value="Log in" />
              
        <label>
        	<input type="checkbox" name="remember" id="remember" value="1" />
            Remember my login on this computer
        </label>   
    </div>
    
     
</form>	
  <?php	else: ?>
  		
			<?php	if($_SESSION['admin']!= 1){  ?> 
			
			<?php 
			$subjectid=$_SESSION['id'];
			$query6= "UPDATE tut_users SET updatetime1=NOW() WHERE id='$subjectid' ";
			mysql_query($query6) or die(mysql_error());
			$row2=mysql_fetch_assoc(mysql_query("SELECT updatetime1 FROM tut_users WHERE id='$subjectid' "));			
  			$_SESSION['currentdate']= $row2['updatetime1'];  			
  			unset($row2);
  			
			$row3=mysql_fetch_assoc(mysql_query("SELECT treat FROM tut_users WHERE id='$subjectid' "));		
  			$treatment=$row3['treat'];  
  			$_SESSION['treatment']= $treatment ;			
  			unset($row3);
  			
			$row3=mysql_fetch_assoc(mysql_query("SELECT type, type2 FROM treatments WHERE treat='$treatment' "));		
  			$treattype=$row3['type'];  
  			$treattype2=$row3['type2'];    			
  			$_SESSION['treattype']= $treattype ;			
  			$_SESSION['treattype2']= $treattype2 ;			
  			unset($row3);
  
	

			$row4=mysql_fetch_assoc(mysql_query("SELECT intv1start, intv2start, intv1end, intv2end FROM treatments WHERE treat='$treatment' "));		
  			$_SESSION['intv1start']= $row4['intv1start'];
  			$_SESSION['intv2start']= $row4['intv2start']; 
  		
  			$_SESSION['intv1end']= $row4['intv1end'];
  			$_SESSION['intv2end']= $row4['intv2end'];
  			 	
  			
  			unset($row4);
  			
  	$_SESSION['sintv1start'] = date("d-m-Y",strtotime($_SESSION['intv1start'])); 
    $_SESSION['sintv2start'] = date("d-m-Y",strtotime($_SESSION['intv2start']));
    
	$_SESSION['sintv1end'] = date("d-m-Y" ,strtotime($_SESSION['intv1end'])); 
	$_SESSION['sintv2end'] = date("d-m-Y",strtotime($_SESSION['intv2end']));
	 

			
 if ( $_SESSION['intv1start'] and $_SESSION['intv2start'] and $_SESSION['intv1end'] and $_SESSION['intv2end'] ) {
 
 	if($_SESSION['currentdate']< $_SESSION['intv1start']){ $_SESSION['stage']='notstarted'; } 	
 
 elseif ($_SESSION['currentdate'] >= $_SESSION['intv1start'] and $_SESSION['currentdate']<=$_SESSION['intv1end']) 	{$_SESSION['stage']='1';}
 elseif ($_SESSION['currentdate'] > $_SESSION['intv1end'] and $_SESSION['currentdate'] < $_SESSION['intv2start']) 	{$_SESSION['stage']='btw1and2';} 	
 elseif ($_SESSION['currentdate'] >= $_SESSION['intv2start'] and $_SESSION['currentdate']<=$_SESSION['intv2end']) 	{$_SESSION['stage']='2';}
 elseif ($_SESSION['currentdate'] > $_SESSION['intv2end'] ) 	{$_SESSION['stage']='over';} 				
 } /* if ( $_SESSION['intv1start'] and $_SESSION['intv2start'] and  $_SESSION['intv1end'] and $_SESSION['intv2end'] ) {*/ 			
else{ $_SESSION['stage']='error'; }
	 header( 'refresh: 3; url=subject.php' ) ; 			 
 
 
 ?>   
  			  
            <div class="member">
         
            
            <h1>Welcome <?php echo $_SESSION['username'];?>. <?php echo " ".$experimentid;?></h1>
      <?php /* echo 'stage:'.$_SESSION["stage"]."<br>";
       echo 'id:'.$_SESSION["id"]."<br>"; */?>
            <?php if($_SESSION['id']){?>
            <p>You will be redirected to another page in a few seconds. If you are not redirected please click <a href="subject.php">here</a>. </p>
  			 <?php } else{?>
  			 <p>You are not a part of this experiment. Please contact the administrators . </p>
  			 <?php }?>
           <br>
           You can log out <a href="login.php?logoff">here</a>.
            
            </div>
            <?php } /* if not admin*/ ?>

			<?php	if($_SESSION['admin']== 1){  ?> 		
  			<?php header( 'refresh: 3; url=admin.php' ) ; ?>   
  			  
            <div class="member">
            
            <h1>Welcome <?php echo $_SESSION['username'];?></h1>
            
            <p>You will be redirected to another page in a few seconds. If you are not redirected please click <a href="admin.php">here</a>. </p>
  			 
           <br />
            You can log out <a href="login.php?logoff">here</a>.
            
            </div>
            <?php } /* if($_SESSION['admin']== 1){ */ ?>
            
  <?php	endif;	?>
          

</body>
</html>
