<?php 
/***

			Account Section Ajax :)) "
 ____             _               ____       __  __
|  _ \  ___   ___| |_ ___  _ __  / ___|  ___|  \/  | ___
| | | |/ _ \ / __| __/ _ \| '__| \___ \ / _ \ |\/| |/ _ \
| |_| | (_) | (__| || (_) | |     ___) |  __/ |  | | (_) |
|____/ \___/ \___|\__\___/|_|    |____/ \___|_|  |_|\___/

		                   Semoo@dr.com
***/

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// error_reporting(0);
//  global $sqli;




# Log file .. 

$MailLogLoadAll = $_POST['MailLogLoadAll'];
if (!empty($MailLogLoadAll)) {
	echo $POSTMAILLER->ListMyLogs($myID);
}


$MailLogLoadID = $_POST['MailLogLoadID'];
if (!empty($MailLogLoadID)) {
	echo $POSTMAILLER->ReadOnLogfile($myID,$MailLogLoadID);
}




// echo $POSTMAILLER->CreatLogFile($myID);
// echo $POSTMAILLER->WriteOnLogfile($myID);




// 



?>