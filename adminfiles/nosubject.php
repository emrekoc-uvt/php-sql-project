			<?php if($_SESSION['admin']!=0){ ?>
			<div class="member">
            
            <h1>Welcome <?php if($_SESSION['username']) { echo $_SESSION['username'] ;} if(!$_SESSION['username']) { echo "visitor" ;}?>. </h1>
            
          <p class="big"> You need to be a subject view this page. You can go back to the main page by clicking <a href="login.php">this</a> .</p>
  			 
            <br /> 
           <?php  if($_SESSION['username']) {?><br> You are already logged in. You can logout <a href="login.php?logoff">here</a>.<?php } ?>
           
           </div>
           
           <?php } /* if($_SESSION['admin']!=0)*/ ?>