<?php if(isset($_GET['mistake']) ) { ?>
<?php header( 'Location: ../subject.php#mistake'); ?>
<?php } /* if(isset($_GET['mistake']) ) */ elseif(isset($_GET['mistake2'])){?>
<?php header( 'Location: ../subject.php#mistake2'); ?>
<?php } /* if(isset($_GET['mistake']) ) */ elseif(isset($_GET['instructions'])){?>
<?php header( 'Location: ../subject.php#instructions'); ?>
<?php } else{?>
<?php header( 'Location: ../subject.php'); ?>
<?php } /* else */?>