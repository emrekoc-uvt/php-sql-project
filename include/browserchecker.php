<?php 
$agent = getenv("HTTP_USER_AGENT");

if (preg_match("/MSIE/i", $agent)) {?>
<?php $browser='ie';
/* echo 'browser :'.$browser; */?>
<?php } /* if (preg_match("/MSIE/i", $agent)) { */?>
