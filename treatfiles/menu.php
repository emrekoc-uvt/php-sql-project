			<form id="list" method="get" action=""> 
<h1>What would you like to do <?php $_SESSION['username']?> ?</h1>
<div class="deneme"> 
<p><a href="?addt" >Add a treatment</a> </p> 

<p><a href="?dropt" >Delete a treatment</a> </p>

<p>   <a href="?viewt" >View treatments</a> </p>
    
   <p> <a href="?modifyt" >Modify a treatment</a> </p> <br> 
    
    <p> <a href="?email" >View  and send e-mails</a> </p> <br>
    
    <p> <a href="?timer" >Set the timers</a> </p> <br>
    
    <p> <a href="admin.php" > Subject operations </a> </p>  <br> 
              
     <p> <a href="results.php" target="_new"> Results (new tab) </a> </p>  <br> 
        <p> <a href="payments.php" target="_new"> Payments (new tab) </a> </p>  <br>               
     <br><p> <a href="login.php?logoff" >Log out</a> </p>
       
      
        </div>

 			</form>	
