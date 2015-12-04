<?php 
error_reporting(E_ALL ^ E_NOTICE);
/* delete this setup php file after you are done. This is a huge security risk */

require 'include/connect.php';


$query1="CREATE TABLE  IF NOT EXISTS tut_users (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `treat` int(11) NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updatetime1` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `lasttimer1` timestamp NOT NULL DEFAULT '1980-01-01 01:00:00' ,
  `lasttimer2` timestamp NOT NULL DEFAULT '1980-01-01 01:00:00' ,
  `lasttimer3` timestamp NOT NULL DEFAULT '1980-01-01 01:00:00' ,
  `lasttimer4` timestamp NOT NULL DEFAULT '1980-01-01 01:00:00' ,
  `remainingtimer1` float NOT NULL DEFAULT '30' , 
  `remainingtimer2` float NOT NULL DEFAULT '30' ,
  `remainingtimer3` float NOT NULL DEFAULT '30' ,
  `remainingtimer4` float NOT NULL DEFAULT '30' ,  
  `modifytime1` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin` int(11) DEFAULT '0' NOT NULL,
  `finished1` int(11) DEFAULT '0' NOT NULL,
  `finished2` int(11) DEFAULT '0' NOT NULL,
  `finished0` int(11) DEFAULT '0' NOT NULL, 
  `finishedt` int(11) DEFAULT '0' NOT NULL,   
  `firstemail` int(11) DEFAULT '0' NOT NULL,
  `stage1email` int(11) DEFAULT '0' NOT NULL,
  `stage2email` int(11) DEFAULT '0' NOT NULL,
  `bank` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `usr` (`usr`),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;


$result1 = mysql_query($query1) or die(mysql_error());

$query2= "CREATE TABLE IF NOT EXISTS `treatments` (
  `treat` int(11) NOT NULL,
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
  `intv1start` timestamp DEFAULT '0000-00-00 00:00:00',
  `intv1end` timestamp DEFAULT '0000-00-00 00:00:00',
  `intv2start` timestamp DEFAULT '0000-00-00 00:00:00',
  `intv2end` timestamp DEFAULT '0000-00-00 00:00:00',
  `updatetime2` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `total` int(11) DEFAULT '0' NOT NULL,
  `stage1` int(11) DEFAULT '0' NOT NULL,
  `stage2` int(11) DEFAULT '0' NOT NULL,
  `stage0` int(11) DEFAULT '0' NOT NULL,
  PRIMARY KEY (`treat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 " ; 


$result2 = mysql_query($query2) or die(mysql_error());

$query2b= "CREATE TABLE IF NOT EXISTS `payments` (
  `payid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
   `playrow` int(11) NOT NULL,
  `updatetime5` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ,
 `currenttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,  
  `ip5` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paymentamount` float DEFAULT '-1' NOT NULL,  
  `paymenttime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
`paymentstatus` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
    `dayssince` float DEFAULT '-1' NOT NULL,
    `banknum` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
    PRIMARY KEY (`payid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;


$result2b = mysql_query($query2b) or die(mysql_error());




$query5= "CREATE TABLE IF NOT EXISTS `results` (
`treat` int(11) NOT NULL,
`choicet1aq1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1aq2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1aq3` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1aq4` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1aq5` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1aq6` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1aq7` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2aq1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2aq2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2aq3` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2aq4` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2aq5` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2aq6` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2aq7` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1bq1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1bq2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1bq3` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1bq4` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1bq5` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1bq6` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1bq7` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2bq1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2bq2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2bq3` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2bq4` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2bq5` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2bq6` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2bq7` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1cq1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1cq2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1cq3` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1cq4` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1cq5` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1cq6` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet1cq7` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2cq1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2cq2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2cq3` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2cq4` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2cq5` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2cq6` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicet2cq7` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq3` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq4` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq5` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq6` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq7` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq8` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq9` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq10` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq11` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq12` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq13` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq14` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq15` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq16` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq17` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq18` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq19` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq20` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq21` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq22` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq23` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq24` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq25` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq26` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq27` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq28` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq29` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq30` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq31` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq32` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicerq33` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`smoke` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`pastsmoke` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`trystopsmoke` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`exercise` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`exercisehours` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`consume` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`internet` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicec1q` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicec2q` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicec3q` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicec4q` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicec5q` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`t1beta` float  NOT NULL,
 `t2beta` float  NOT NULL,
`story` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq3` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq4` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq5` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicesq6` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicesq7` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicesq8` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq9` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq10` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq11` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq12` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicesq13` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicesq14` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicesq15` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq16` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq17` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq18` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
`choicesq19` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicesq20` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicesq21` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`choicesq1y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq1k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq1r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq1r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq2y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq2k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq2r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq2r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq3y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq3k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq3r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq3r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq4y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq4k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq4r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq4r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq5y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq5k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq5r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq5r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq6y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq6k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq6r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq6r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq7y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq7k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq7r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq7r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq8y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq8k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq8r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq8r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq9y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq9k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq9r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq9r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq10y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq10k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq10r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq10r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq11y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq11k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq11r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq11r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq12y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq12k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq12r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq12r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq13y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq13k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq13r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq13r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq14y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq14k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq14r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq14r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq15y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq15k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq15r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq15r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq16y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq16k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq16r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq16r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq17y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq17k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq17r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq17r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq18y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq18k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq18r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq18r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq19y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq19k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq19r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq19r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq20y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq20k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq20r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq20r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq21y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq21k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`choicesq21r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`choicesq21r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`stage1chosen` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`stage1chosentype` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`updatetime4` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
`ip4` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`stage2decision` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`stage2y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`stage2k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
`stage2r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`stage2r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`stage2d` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
`byear` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,   
`gender` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`nationality` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`school` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`mincome` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`fincome` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`height` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`weight` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`knowinterest` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`useinterest` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
`estimateinterest` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,  
`syear` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,    
`id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 " ;
 
$result5 = mysql_query($query5) or die(mysql_error());


$query9= "CREATE TABLE IF NOT EXISTS `timers` (
  `timer1` float NOT NULL,
  `timer2` float NOT NULL, 
  `timer3` float NOT NULL,
  `timer4` float NOT NULL, 
    `ip15` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updatetime15` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `id15` int(11) NOT NULL ,
  PRIMARY KEY (`id15`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 " ;

$result9 = mysql_query($query9) or die(mysql_error());
$query19 = "INSERT INTO timers(id15,ip15,updatetime15, timer1,timer2,timer3,timer4 ) VALUES(1,'".$_SERVER['REMOTE_ADDR']."',NOW(),30,30,30,30 )" ;
		mysql_query($query19) or die(mysql_error());


$query6= "CREATE TABLE IF NOT EXISTS `stagequestions` (
  `y` float NOT NULL,
  `k` float NOT NULL, 
  `types` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
  `id5` int(11) NOT NULL ,
  PRIMARY KEY (`id5`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 " ;

$result6 = mysql_query($query6) or die(mysql_error());
		

$query6= "CREATE TABLE IF NOT EXISTS `riskquestions` (
  `highpay` float NOT NULL,
  `lowpay` float NOT NULL, 
  `highprob` float NOT NULL,
  `lowprob` float NOT NULL, 
  `risklesspay` float NOT NULL,
  `id3` int(11) NOT NULL ,
  PRIMARY KEY (`id3`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 " ;

$result6 = mysql_query($query6) or die(mysql_error());

$riskless=1;
$counter=1;
$low=$riskless-0.5;
while($counter<=11){
$risk=" INSERT INTO riskquestions (id3, highpay, lowpay, risklesspay, highprob, lowprob) VALUES ('$counter', '6.5','$low','$riskless','0.5','0.5') "  ;
$runrisk = mysql_query($risk) or die(mysql_error());
unset($risk);
$riskless=$riskless+0.5;
$counter=$counter+1;
}
unset($riskless);

$riskless=1.5;
$low=$riskless-0.5;
while($counter<=18){
$risk=" INSERT INTO riskquestions (id3, highpay, lowpay, risklesspay, highprob, lowprob) VALUES ('$counter', '5','$low','$riskless','0.5','0.5') "  ;
$runrisk = mysql_query($risk) or die(mysql_error());
unset($risk);
$riskless=$riskless+0.5;
$counter=$counter+1;
}

unset($riskless);

$riskless=0.5;
$low=$riskless-0.5;
while($counter<=33){
$risk=" INSERT INTO riskquestions (id3, highpay, lowpay, risklesspay, highprob, lowprob) VALUES ('$counter', '8','$low','$riskless','0.5','0.5') "  ;
$runrisk = mysql_query($risk) or die(mysql_error());
unset($risk);
$riskless=$riskless+0.5;
$counter=$counter+1;
}


$query7= "CREATE TABLE IF NOT EXISTS `timequestions` (
  `soonpay` float NOT NULL,
  `laterpay` float NOT NULL, 
  `soontime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
  `latertime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,   
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,  
  `id4` int(11) NOT NULL ,
  PRIMARY KEY (`id4`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 " ;

$result7 = mysql_query($query7) or die(mysql_error());


$counter=1;
$future=11;
$now=$future-0.4;
while($counter<=7){
$time=" INSERT INTO timequestions (id4, soonpay, laterpay, soontime, latertime, type) VALUES ('$counter', '$now','$future','now','2 months from now','beta1a') "  ;
$runtime = mysql_query($time) or die(mysql_error());
unset($time);
$future=$future+1;
$counter=$counter+1;
}
unset($future);
unset($now);

$future=5.4;
$now=$future-0.2;
while($counter<=14){
$time=" INSERT INTO timequestions (id4, soonpay, laterpay, soontime, latertime, type) VALUES ('$counter', '$now','$future','now','2 months from now','beta1b') "  ;
$runtime = mysql_query($time) or die(mysql_error());
unset($time);
$future=$future+0.8;
$counter=$counter+1;
}
unset($future);
unset($now);

$future=7.6;
$now=$future-0.2;
while($counter<=21){
$time=" INSERT INTO timequestions (id4, soonpay, laterpay, soontime, latertime, type) VALUES ('$counter', '$now','$future','now','2 months from now','beta1c') "  ;
$runtime = mysql_query($time) or die(mysql_error());
unset($time);
$future=$future+0.9;
$counter=$counter+1;
}
unset($future);
unset($now);

/* type b (beta2) questions*/

$counter=22;
$future=11;
$now=$future-0.4;
while($counter<=28){
$time=" INSERT INTO timequestions (id4, soonpay, laterpay, soontime, latertime, type) VALUES ('$counter', '$now','$future','2 months from now','4 months from now','beta2a') "  ;
$runtime = mysql_query($time) or die(mysql_error());
unset($time);
$future=$future+1;
$counter=$counter+1;
}
unset($future);
unset($now);

$future=5.4;
$now=$future-0.2;
while($counter<=35){
$time=" INSERT INTO timequestions (id4, soonpay, laterpay, soontime, latertime, type) VALUES ('$counter', '$now','$future','2 months from now','4 months from now','beta2b') "  ;
$runtime = mysql_query($time) or die(mysql_error());
unset($time);
$future=$future+0.8;
$counter=$counter+1;
}
unset($future);
unset($now);

$future=7.6;
$now=$future-0.2;
while($counter<=42){
$time=" INSERT INTO timequestions (id4, soonpay, laterpay, soontime, latertime, type) VALUES ('$counter', '$now','$future','2 months from now','4 months from now','beta2c') "  ;
$runtime = mysql_query($time) or die(mysql_error());
unset($time);
$future=$future+0.9;
$counter=$counter+1;
}
unset($future);
unset($now);


$k=array();
$k[0]=6;
$k[1]=6;
$k[2]=6;
$k[3]=6;
$k[4]=6;
$k[5]=6;
$k[6]=6;
$y=array();
$y[0]=0.5;
$y[1]=1;
$y[2]=2;
$y[3]=3;
$y[4]=4;
$y[5]=5;
$y[6]=6;

$sizestage1=count($k);
$counterx=0;
$type=1;
while($type<=3){
while($counterx<=$sizestage1 * $type - 1){
if($type==1){$typetext='onlylate';}
elseif($type==2){$typetext='onlyearly';}
elseif($type==3){$typetext='both';}	
$countery = $counterx - $sizestage1 * ($type - 1 ) ;
$time=" INSERT INTO stagequestions (id5, k,y, types) VALUES ('$counterx', '$k[$countery]','$y[$countery]', '$typetext') "  ;
$runtime = mysql_query($time) or die(mysql_error());
unset($time);
$counterx=$counterx+1;
} /* while($counterx<=$sizestage1 * $type - 1) */
$type=$type + 1 ;
} /* while($type<=3) */

$adminname="experimenter";
$passadmin="behave";
$passadmin= md5($passadmin);
echo "Welcome  '$adminname',";
mysql_query( " INSERT INTO tut_users (usr, pass, email, admin, treat) VALUES ('$adminname', '$passadmin','email547@email245.net',1, -999) " ) ;
?>

<p> <?php echo "-  The setup file is executed. Do not forget to erase this file from the server. "; ?> </p>
<p> <?php echo "-  Do not forget to erase the code which reports sql query errors. "; ?> </p>
<p> <?php echo "-  You will be redirected to login.php in 1 seconds "; ?> </p>
<?php  header( 'refresh: 1; url=setupupdate.php' ) ;  ?>   
		
      