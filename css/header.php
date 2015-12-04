<link rel="stylesheet" type="text/css" href="css/demo.css" />	
<?php 
$agent = getenv("HTTP_USER_AGENT");

if (preg_match("/MSIE/i", $agent)) {?>
<link REL="stylesheet" TYPE="text/css" href="css/ie.css" />
<?php } /* if (preg_match("/MSIE/i", $agent)) { */?>
<link rel="shortcut icon" href="/uvt.ico" type="image/x-icon" />
