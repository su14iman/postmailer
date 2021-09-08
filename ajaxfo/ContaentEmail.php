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






#Contaent Email

$POSTMAILLER->createContaentEmail($myID);


$EditContaentEmailSubject = $_POST['EmailSubject'];
$EditContaentEmailHTML = $_POST['EmailHTML'];
if(!empty($EditContaentEmailSubject) && !empty($EditContaentEmailHTML)){
	echo $POSTMAILLER->EditContaentEmail($myID,$EditContaentEmailSubject,$EditContaentEmailHTML);
}





// echo $POSTMAILLER->EditContaentEmail($myID,'subject test','<p>aa</p>');

// echo $POSTMAILLER->loadContaentEmail($myID);


?>