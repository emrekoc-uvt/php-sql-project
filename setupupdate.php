<?php
error_reporting(E_ALL ^ E_NOTICE);
/* delete this setup php file after you are done. This is a huge security risk */

require 'include/connect.php';

$query1= "CREATE TABLE IF NOT EXISTS `payments` (
  `payid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `playrow` int(11) NOT NULL,
  `updatetime5` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `currenttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ip5` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paymentamount` float NOT NULL DEFAULT '-1',
  `paymenttime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paymentstatus` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dayssince` float NOT NULL DEFAULT '-1',
  `banknum` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26" ;
$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="INSERT INTO `payments` (`payid`, `id`, `playrow`, `updatetime5`, `currenttime`, `ip5`, `paymentamount`, `paymenttime`, `paymentstatus`, `dayssince`, `banknum`) VALUES
(1, 11, 19, '2013-03-28 13:03:59', '2013-04-13 16:16:01', '84.24.187.31', 10.6, '2 months from now', 'not completed', 16, '128096551'),
(2, 9, 5, '2013-03-28 14:17:29', '2013-04-13 16:16:01', '84.85.79.80', 15, '2 months from now', 'not completed', 16, '1361862'),
(4, 6, 20, '2013-03-28 16:57:15', '2013-04-13 16:16:01', '84.31.151.238', 16, '4 months from now', 'not completed', 16, '151271852'),
(5, 8, 35, '2013-03-29 09:53:52', '2013-04-13 16:16:01', '82.171.53.124', 4, 'now', 'completed', 15, '425194272'),
(17, 6, 0, '2013-04-07 20:05:44', '2013-04-13 16:16:01', '84.31.151.238', 6, 'now', 'completed', 6, '151271852'),
(6, 5, 26, '2013-03-29 15:24:16', '2013-04-13 16:16:01', '82.157.10.126', 7.8, '4 months from now', 'not completed', 15, '150460414'),
(7, 4, 38, '2013-03-30 18:00:01', '2013-04-13 16:16:01', '217.76.18.60', 5.5, 'now', 'completed', 14, '177862718'),
(8, 7, 21, '2013-03-31 15:40:23', '2013-04-13 16:16:01', '80.101.59.2', 17, '4 months from now', 'not completed', 13, '135581567'),
(9, 9, 0, '2013-04-06 21:17:26', '2013-04-13 16:16:01', '84.85.79.80', 6, 'now', 'completed', 7, '1361862'),
(18, 11, 0, '2013-04-07 20:28:30', '2013-04-13 16:16:01', '79.117.174.211', 9.43, '2 months from now', 'not completed', 6, '128096551'),
(12, 8, 0, '2013-04-07 12:28:12', '2013-04-13 16:16:01', '92.108.10.30', 9.96, '2 months from now', 'not completed', 6, '425194272'),
(13, 7, 0, '2013-04-07 12:36:44', '2013-04-13 16:16:01', '80.101.59.2', 6, 'now', 'completed', 6, '135581567'),
(19, 4, 0, '2013-04-08 11:25:46', '2013-04-13 16:16:01', '153.19.240.73', 6, 'now', 'completed', 5, '177862718'),
(20, 5, 0, '2013-04-08 15:25:37', '2013-04-13 16:16:01', '82.157.10.126', 6, 'now', 'completed', 5, '150460414')";

$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1= "CREATE TABLE IF NOT EXISTS `results` (
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
  `t1beta` float NOT NULL,
  `t2beta` float NOT NULL,
  `choicesq1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq3` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq4` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq5` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq6` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq7` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq1y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq1k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq1r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq1r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq2y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq2k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq2r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq2r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq3y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq3k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq3r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq3r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq4y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq4k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq4r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq4r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq5y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq5k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq5r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq5r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq6y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq6k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq6r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq6r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq7y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq7k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq7r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choicesq7r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stage1chosen` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updatetime4` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ip4` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stage2decision` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stage2y` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stage2k` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stage2r1` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stage2r2` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stage2d` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `byear` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mincome` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fincome` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `knowinterest` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `useinterest` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estimateinterest` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `syear` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="INSERT INTO `results` (`treat`, `choicet1aq1`, `choicet1aq2`, `choicet1aq3`, `choicet1aq4`, `choicet1aq5`, `choicet1aq6`, `choicet1aq7`, `choicet2aq1`, `choicet2aq2`, `choicet2aq3`, `choicet2aq4`, `choicet2aq5`, `choicet2aq6`, `choicet2aq7`, `choicet1bq1`, `choicet1bq2`, `choicet1bq3`, `choicet1bq4`, `choicet1bq5`, `choicet1bq6`, `choicet1bq7`, `choicet2bq1`, `choicet2bq2`, `choicet2bq3`, `choicet2bq4`, `choicet2bq5`, `choicet2bq6`, `choicet2bq7`, `choicerq1`, `choicerq2`, `choicerq3`, `choicerq4`, `choicerq5`, `choicerq6`, `choicerq7`, `choicerq8`, `choicerq9`, `choicerq10`, `choicerq11`, `choicerq12`, `choicerq13`, `choicerq14`, `choicerq15`, `choicerq16`, `choicerq17`, `choicerq18`, `choicerq19`, `choicerq20`, `choicerq21`, `choicerq22`, `choicerq23`, `choicerq24`, `choicerq25`, `choicerq26`, `choicerq27`, `choicerq28`, `choicerq29`, `choicerq30`, `choicerq31`, `choicerq32`, `choicerq33`, `smoke`, `pastsmoke`, `trystopsmoke`, `exercise`, `exercisehours`, `consume`, `internet`, `choicec1q`, `choicec2q`, `choicec3q`, `choicec4q`, `choicec5q`, `t1beta`, `t2beta`, `choicesq1`, `choicesq2`, `choicesq3`, `choicesq4`, `choicesq5`, `choicesq6`, `choicesq7`, `choicesq1y`, `choicesq1k`, `choicesq1r1`, `choicesq1r2`, `choicesq2y`, `choicesq2k`, `choicesq2r1`, `choicesq2r2`, `choicesq3y`, `choicesq3k`, `choicesq3r1`, `choicesq3r2`, `choicesq4y`, `choicesq4k`, `choicesq4r1`, `choicesq4r2`, `choicesq5y`, `choicesq5k`, `choicesq5r1`, `choicesq5r2`, `choicesq6y`, `choicesq6k`, `choicesq6r1`, `choicesq6r2`, `choicesq7y`, `choicesq7k`, `choicesq7r1`, `choicesq7r2`, `stage1chosen`, `updatetime4`, `ip4`, `stage2decision`, `stage2y`, `stage2k`, `stage2r1`, `stage2r2`, `stage2d`, `byear`, `gender`, `nationality`, `school`, `mincome`, `fincome`, `height`, `weight`, `knowinterest`, `useinterest`, `estimateinterest`, `syear`, `id`) VALUES
(2, 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'No', '', '', 'No', 'Not applicable', '900', '7', '0.05', '5', '24', 'zero', 'option3', 0.620714, 0.641498, 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option2', '0.5', '6', '0.71656358100092', '0.45907904385078', '1', '6', '0.84860693338561', '0.57131589337777', '2', '6', '1.112693638155', '0.79578959243173', '3', '6', '1.3767803429244', '1.0202632914857', '4', '6', '1.6408670476937', '1.2447369905397', '5', '6', '1.9049537524631', '1.4692106895936', '6', '6', '2.1690404572325', '1.6936843886476', '2', '2013-04-07 20:35:52', '137.56.80.74', 'option1', '1', '6', '0.84860693338561', '0.57131589337777', 'option2', '1989', 'Female', 'romanian', 'School of Economics and Manageme', '€ 10K - € 5K', '€ 10K - € 5K', '157', '45', 'Yes', 'No', 'Not applicable', 'Bachelor 3', 11),
(2, 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'No', '', '', 'Yes', '8', '150', '7', '0.05', '5', '47', 'zero', 'option1', 0.875379, 0.875379, 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', '0.5', '6', '0.23755949805279', '0.051925573344872', '1', '6', '0.33275638251839', '0.13284292514063', '2', '6', '0.52315015144959', '0.29467762873215', '3', '6', '0.71354392038079', '0.45651233232367', '4', '6', '0.90393768931199', '0.61834703591519', '5', '6', '1.0943314582432', '0.78018173950671', '6', '6', '1.2847252271744', '0.94201644309823', '1', '2013-04-06 21:18:45', '84.85.79.80', 'option1', '0.5', '6', '0.23755949805279', '0.051925573344872', 'option1', '1992', 'Male', 'Dutch', 'School of Economics and Manageme', '€ 60K - € 40K', '€ 60K - € 40K', '191', '80', 'Yes', 'No', 'Not applicable', 'Bachelor 3', 9),
(1, 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'No', '', '', 'Yes', '6', '700', '7', '0.05', '5', '47', '100', 'option4', 0.875379, 0.875379, 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', '0.5', '6', '0.23755949805279', '0.051925573344872', '1', '6', '0.33275638251839', '0.13284292514063', '2', '6', '0.52315015144959', '0.29467762873215', '3', '6', '0.71354392038079', '0.45651233232367', '4', '6', '0.90393768931199', '0.61834703591519', '5', '6', '1.0943314582432', '0.78018173950671', '6', '6', '1.2847252271744', '0.94201644309823', '4', '2013-04-07 20:08:14', '84.31.151.238', 'option2', '3', '6', '0.71354392038079', '0.45651233232367', 'option1', '1991', 'Male', 'dutch', 'School of Economics and Manageme', '€ 60K - € 40K', '+ € 100K', '183', '85', 'No', 'No', 'Not applicable', 'Bachelor 3', 6),
(2, 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'No', '', '', 'Yes', '5', '400', '7', '0.05', '5', '47', '22', 'option1', 0.939226, 0.939226, 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', '0.5', '6', '0.1534325147876', '-0.019582362430543', '1', '6', '0.24215809284818', '0.055834378920954', '2', '6', '0.41960924896935', '0.20666786162395', '3', '6', '0.59706040509052', '0.35750134432694', '4', '6', '0.77451156121169', '0.50833482702993', '5', '6', '0.95196271733286', '0.65916830973293', '6', '6', '1.129413873454', '0.81000179243592', '6', '2013-04-07 12:30:01', '92.108.10.30', 'option1', '5', '6', '0.95196271733286', '0.65916830973293', 'option2', '1990', 'Female', 'Dutch', 'Tilburg School of Humanities', '€ 60K - € 40K', '€ 80K - € 60K', '177', '67', 'No', 'No', 'Not applicable', 'Bachelor 2', 8),
(1, 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'No', '', '', 'Yes', '2', '750', '7', '0.05', '5', '47', '33', 'option4', 0.838316, 0.895455, 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', '0.5', '6', '0.24968488983749', '0.062232156361864', '1', '6', '0.34581449674806', '0.14394232223585', '2', '6', '0.53807371056921', '0.30736265398383', '3', '6', '0.73033292439037', '0.47078298573181', '4', '6', '0.92259213821152', '0.63420331747979', '5', '6', '1.1148513520327', '0.79762364922777', '6', '6', '1.3071105658538', '0.96104398097575', '1', '2013-04-08 15:27:25', '82.157.10.126', 'option2', '0.5', '6', '0.24968488983749', '0.062232156361864', 'option1', '1990', 'Female', 'Chinese', 'School of Economics and Manageme', '€ 40K - € 20K', '€ 80K - € 60K', '165', '52.5', 'Yes', 'No', 'Not applicable', 'Bachelor 4', 5),
(1, 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'Yes', '', '', 'Yes', '10', '1000', '3', '0.10', '5', '32', '10', 'option3', 0.633193, 0.642936, 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', '0.5', '6', '0.69784271358507', '0.44316630654731', '1', '6', '0.82844599924546', '0.55417909935864', '2', '6', '1.0896525705662', '0.77620468498131', '3', '6', '1.350859141887', '0.99823027060397', '4', '6', '1.6120657132078', '1.2202558562266', '5', '6', '1.8732722845286', '1.4422814418493', '6', '6', '2.1344788558494', '1.664307027472', '5', '2013-04-08 14:52:26', '153.19.240.76', 'option2', '4', '6', '1.6120657132078', '1.2202558562266', 'option1', '1991', 'Female', 'turkish', 'School of Economics and Manageme', 'Not applicable', 'Not applicable', '160', '48', 'Yes', 'Yes', '5', 'Bachelor 3', 4),
(1, 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'option2', 'No', '', '', 'Yes', '4', '150', '7', '0.10', '20', '47', '34', 'option3', 0.802205, 0.939226, 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', 'option1', '0.5', '6', '0.24418797046996', '0.057559774899469', '1', '6', '0.33989473742919', '0.13891052681481', '2', '6', '0.53130827134765', '0.3016120306455', '3', '6', '0.7227218052661', '0.46431353447619', '4', '6', '0.91413533918456', '0.62701503830688', '5', '6', '1.105548873103', '0.78971654213756', '6', '6', '1.2969624070215', '0.95241804596825', '2', '2013-04-07 12:39:10', '80.101.59.2', 'option2', '1', '6', '0.33989473742919', '0.13891052681481', 'option1', '1993', 'Female', 'dutch', 'School of Economics and Manageme', '€ 20K - € 10K', '€ 5K - € 0', '168', '58', 'No', 'No', 'Not applicable', 'Bachelor 2', 7)";
$result1 = mysql_query($query1) or die (mysql_error().$query1);

/* $query1="CREATE TABLE IF NOT EXISTS `riskquestions` (
  `highpay` float NOT NULL,
  `lowpay` float NOT NULL,
  `highprob` float NOT NULL,
  `lowprob` float NOT NULL,
  `risklesspay` float NOT NULL,
  `id3` int(11) NOT NULL,
  PRIMARY KEY (`id3`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
$result1 = mysql_query($query1) or die (mysql_error().$query1);


$query1="INSERT INTO `riskquestions` (`highpay`, `lowpay`, `highprob`, `lowprob`, `risklesspay`, `id3`) VALUES
(6.5, 0.5, 0.5, 0.5, 1, 1),
(6.5, 0.5, 0.5, 0.5, 1.5, 2),
(6.5, 0.5, 0.5, 0.5, 2, 3),
(6.5, 0.5, 0.5, 0.5, 2.5, 4),
(6.5, 0.5, 0.5, 0.5, 3, 5),
(6.5, 0.5, 0.5, 0.5, 3.5, 6),
(6.5, 0.5, 0.5, 0.5, 4, 7),
(6.5, 0.5, 0.5, 0.5, 4.5, 8),
(6.5, 0.5, 0.5, 0.5, 5, 9),
(6.5, 0.5, 0.5, 0.5, 5.5, 10),
(6.5, 0.5, 0.5, 0.5, 6, 11),
(5, 1, 0.5, 0.5, 1.5, 12),
(5, 1, 0.5, 0.5, 2, 13),
(5, 1, 0.5, 0.5, 2.5, 14),
(5, 1, 0.5, 0.5, 3, 15),
(5, 1, 0.5, 0.5, 3.5, 16),
(5, 1, 0.5, 0.5, 4, 17),
(5, 1, 0.5, 0.5, 4.5, 18),
(8, 0, 0.5, 0.5, 0.5, 19),
(8, 0, 0.5, 0.5, 1, 20),
(8, 0, 0.5, 0.5, 1.5, 21),
(8, 0, 0.5, 0.5, 2, 22),
(8, 0, 0.5, 0.5, 2.5, 23),
(8, 0, 0.5, 0.5, 3, 24),
(8, 0, 0.5, 0.5, 3.5, 25),
(8, 0, 0.5, 0.5, 4, 26),
(8, 0, 0.5, 0.5, 4.5, 27),
(8, 0, 0.5, 0.5, 5, 28),
(8, 0, 0.5, 0.5, 5.5, 29),
(8, 0, 0.5, 0.5, 6, 30),
(8, 0, 0.5, 0.5, 6.5, 31),
(8, 0, 0.5, 0.5, 7, 32),
(8, 0, 0.5, 0.5, 7.5, 33)";
$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="CREATE TABLE IF NOT EXISTS `stagequestions` (
  `y` float NOT NULL,
  `k` float NOT NULL,
  `id5` int(11) NOT NULL,
  PRIMARY KEY (`id5`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="INSERT INTO `stagequestions` (`y`, `k`, `id5`) VALUES
(0.5, 6, 0),
(1, 6, 1),
(2, 6, 2),
(3, 6, 3),
(4, 6, 4),
(5, 6, 5),
(6, 6, 6)";
$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="CREATE TABLE IF NOT EXISTS `timequestions` (
  `soonpay` float NOT NULL,
  `laterpay` float NOT NULL,
  `soontime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `latertime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id4` int(11) NOT NULL,
  PRIMARY KEY (`id4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="INSERT INTO `timequestions` (`soonpay`, `laterpay`, `soontime`, `latertime`, `type`, `id4`) VALUES
(10.6, 11, 'now', '2 months from now', 'beta1a', 1),
(10.6, 12, 'now', '2 months from now', 'beta1a', 2),
(10.6, 13, 'now', '2 months from now', 'beta1a', 3),
(10.6, 14, 'now', '2 months from now', 'beta1a', 4),
(10.6, 15, 'now', '2 months from now', 'beta1a', 5),
(10.6, 16, 'now', '2 months from now', 'beta1a', 6),
(10.6, 17, 'now', '2 months from now', 'beta1a', 7),
(5.2, 5.4, 'now', '2 months from now', 'beta1b', 8),
(5.2, 6, 'now', '2 months from now', 'beta1b', 9),
(5.2, 6.6, 'now', '2 months from now', 'beta1b', 10),
(5.2, 7.2, 'now', '2 months from now', 'beta1b', 11),
(5.2, 7.8, 'now', '2 months from now', 'beta1b', 12),
(5.2, 8.4, 'now', '2 months from now', 'beta1b', 13),
(5.2, 9, 'now', '2 months from now', 'beta1b', 14),
(10.6, 11, '2 months from now', '4 months from now', 'beta2a', 15),
(10.6, 12, '2 months from now', '4 months from now', 'beta2a', 16),
(10.6, 13, '2 months from now', '4 months from now', 'beta2a', 17),
(10.6, 14, '2 months from now', '4 months from now', 'beta2a', 18),
(10.6, 15, '2 months from now', '4 months from now', 'beta2a', 19),
(10.6, 16, '2 months from now', '4 months from now', 'beta2a', 20),
(10.6, 17, '2 months from now', '4 months from now', 'beta2a', 21),
(5.2, 5.4, '2 months from now', '4 months from now', 'beta2b', 22),
(5.2, 6, '2 months from now', '4 months from now', 'beta2b', 23),
(5.2, 6.6, '2 months from now', '4 months from now', 'beta2b', 24),
(5.2, 7.2, '2 months from now', '4 months from now', 'beta2b', 25),
(5.2, 7.8, '2 months from now', '4 months from now', 'beta2b', 26),
(5.2, 8.4, '2 months from now', '4 months from now', 'beta2b', 27),
(5.2, 9, '2 months from now', '4 months from now', 'beta2b', 28)";
$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="CREATE TABLE IF NOT EXISTS `timers` (
  `timer1` float NOT NULL,
  `timer2` float NOT NULL,
  `timer3` float NOT NULL,
  `timer4` float NOT NULL,
  `ip15` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updatetime15` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `id15` int(11) NOT NULL,
  PRIMARY KEY (`id15`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="INSERT INTO `timers` (`timer1`, `timer2`, `timer3`, `timer4`, `ip15`, `updatetime15`, `id15`) VALUES
(30, 30, 30, 20, '137.56.37.253', '2013-04-09 10:53:16', 1)";
$result1 = mysql_query($query1) or die (mysql_error().$query1);
*/ 

$query1="CREATE TABLE IF NOT EXISTS `treatments` (
  `treat` int(11) NOT NULL,
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `intv1start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `intv1end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `intv2start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `intv2end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatetime2` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `total` int(11) NOT NULL DEFAULT '0',
  `stage1` int(11) NOT NULL DEFAULT '0',
  `stage2` int(11) NOT NULL DEFAULT '0',
  `stage0` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`treat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="INSERT INTO `treatments` (`treat`, `type`, `intv1start`, `intv1end`, `intv2start`, `intv2end`, `updatetime2`, `total`, `stage1`, `stage2`, `stage0`) VALUES
(1, 'noframe', '2013-03-28 00:00:00', '2013-03-31 23:59:30', '2013-04-06 00:00:00', '2013-04-08 23:59:30', '2013-04-07 14:44:57', 6, 5, 1, 5),
(2, 'frame', '2013-03-28 00:00:00', '2013-03-31 23:59:30', '2013-04-06 00:00:00', '2013-04-08 23:59:30', '2013-04-07 14:44:57', 4, 3, 2, 3)";

$result1 = mysql_query($query1) or die (mysql_error().$query1);

$query1="CREATE TABLE IF NOT EXISTS `tut_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `treat` int(11) NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updatetime1` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `lasttimer1` timestamp NOT NULL DEFAULT '1980-01-01 01:00:00',
  `lasttimer2` timestamp NOT NULL DEFAULT '1980-01-01 01:00:00',
  `lasttimer3` timestamp NOT NULL DEFAULT '1980-01-01 01:00:00',
  `lasttimer4` timestamp NOT NULL DEFAULT '1980-01-01 01:00:00',
  `remainingtimer1` float NOT NULL DEFAULT '30',
  `remainingtimer2` float NOT NULL DEFAULT '30',
  `remainingtimer3` float NOT NULL DEFAULT '30',
  `remainingtimer4` float NOT NULL DEFAULT '30',
  `modifytime1` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin` int(11) NOT NULL DEFAULT '0',
  `finished1` int(11) NOT NULL DEFAULT '0',
  `finished2` int(11) NOT NULL DEFAULT '0',
  `finished0` int(11) NOT NULL DEFAULT '0',
  `finishedt` int(11) NOT NULL DEFAULT '0',
  `firstemail` int(11) NOT NULL DEFAULT '0',
  `stage1email` int(11) NOT NULL DEFAULT '0',
  `stage2email` int(11) NOT NULL DEFAULT '0',
  `bank` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `usr` (`usr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7103" ;

$result1 = mysql_query($query1) or die (mysql_error().$query1);


$query1="INSERT INTO `tut_users` (`id`, `usr`, `pass`, `email`, `treat`, `ip`, `updatetime1`, `lasttimer1`, `lasttimer2`, `lasttimer3`, `lasttimer4`, `remainingtimer1`, `remainingtimer2`, `remainingtimer3`, `remainingtimer4`, `modifytime1`, `admin`, `finished1`, `finished2`, `finished0`, `finishedt`, `firstemail`, `stage1email`, `stage2email`, `bank`) VALUES
(4, 'subject1a', '3a333225c5e94fbacfbb2ebf5f88ba7e', 'b.bulut@tilburguniversity.edu', 1, '153.19.240.76', '2013-04-08 14:53:09', '2013-03-30 18:00:01', '2013-03-30 18:08:12', '2013-03-30 18:12:06', '2013-04-08 14:52:26', 24.9832, 21.85, 26.1001, 20.9333, '2013-04-08 11:24:45', 0, 1, 1, 1, 1, 1, 1, 1, '177862718'),
(5, 'subject1b', '79bc7820e838abde20c9d4c102f40af2', 'y.rong@tilburguniversity.edu', 1, '82.157.10.126', '2013-04-08 17:02:16', '2013-03-29 15:24:16', '2013-03-29 15:30:39', '2013-03-29 15:33:07', '2013-04-08 15:27:25', 26.7001, 23.6166, 27.5331, 27.9834, '2013-03-27 15:37:37', 0, 1, 1, 1, 1, 1, 1, 1, '150460414'),
(6, 'subject1c', '57d44128a13a4c64d9e2cf31a4aceea3', 'j.h.arnoldus@tilburguniversity.edu', 1, '84.31.151.238', '2013-04-07 20:08:20', '2013-03-28 16:57:15', '2013-03-28 17:05:45', '2013-03-28 17:10:20', '2013-04-07 20:08:14', 25.3671, 21.5, 25.4166, 27.0834, '2013-03-27 15:38:41', 0, 1, 1, 1, 1, 1, 1, 1, '151271852'),
(7, 'subject1d', '0a9595fdc6edb036b049c6fa3af18822', 'nienkevrooijen@gmail.com', 1, '80.101.59.2', '2013-04-07 12:39:28', '2013-03-31 15:40:23', '2013-03-31 15:47:22', '2013-03-31 15:52:15', '2013-04-07 12:39:10', 23.083, 23.0165, 25.1333, 27.3167, '2013-03-27 15:39:28', 0, 1, 1, 1, 1, 1, 1, 1, '135581567'),
(8, 'subject2a', 'cf6e2ccd4faed52ae68338c6aaf0a392', 'jantsje@gmail.com', 2, '92.108.10.30', '2013-04-07 12:30:01', '2013-04-07 10:57:48', '2013-03-29 09:59:34', '2013-03-29 10:03:03', '2013-04-07 12:30:01', 25.5505, 24.3, 26.5166, 27.9, '2013-03-27 15:40:00', 0, 1, 1, 1, 1, 1, 1, 1, '425194272'),
(9, 'subject2b', '1e2029a07bbfb38d710cb477c2637e66', 't.brouwer@tilburguniversity.edu', 2, '84.85.79.80', '2013-04-06 21:18:50', '2013-03-28 14:17:29', '2013-03-28 14:22:21', '2013-03-28 14:25:45', '2013-04-06 21:18:45', 23.983, 25.1332, 26.6, 30, '2013-03-27 15:40:39', 0, 1, 1, 1, 1, 1, 1, 1, '1361862'),
(10, 'subject2c', '8f4a06372274eca6d123c4d41bda6d1c', 'xinwang333@yahoo.cn', 2, '82.171.127.174', '2013-04-09 10:53:16', '1980-01-01 01:00:00', '1980-01-01 01:00:00', '1980-01-01 01:00:00', '1980-01-01 01:00:00', 30, 30, 30, 20, '2013-04-09 10:53:16', 0, 0, 0, 0, 0, 1, 1, 0, ''),
(11, 'subject2d', '2fba69ff2bf87f16c2e1b92215a663d8', 'a.v.popescu@tilburguniversity.edu', 2, '137.56.80.74', '2013-04-07 20:35:57', '2013-03-28 13:03:59', '2013-03-28 13:11:05', '2013-03-28 13:15:39', '2013-04-07 20:35:52', 21.7167, 22.9, 25.4501, 22.5165, '2013-03-27 15:41:48', 0, 1, 1, 1, 1, 1, 1, 1, '128096551')";

$result1 = mysql_query($query1) or die (mysql_error().$query1);
?>

<p> <?php echo "-  The update file is executed. Do not forget to erase this file from the server. "; ?> </p>
<p> <?php echo "-  Do not forget to erase the code which reports sql query errors. "; ?> </p>
<p> <?php echo "-  You will be redirected to login.php in 1 seconds "; ?> </p>
<?php  header( 'refresh: 1; url=login.php' ) ;  ?>   
