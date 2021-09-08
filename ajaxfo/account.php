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




# Account 



// echo $POSTMAILLER->ChangPassword($myID,'123','123');



$SettingsLoadAllMyData = $_POST['SettingsLoadAllMyData'];
if(!empty($SettingsLoadAllMyData)){
$arry[0] = $POSTMAILLER->GetClientInfo($myID);
$arry[1] = $POSTMAILLER->sumTimeLimtedForAccountDays($myID);
echo json_encode($arry);	
}







// echo $POSTMAILLER->HashPassword('123');

// echo $POSTMAILLER->login('semoo@dr.com','123')['s'];
// echo $POSTMAILLER->logout($sessionID);

// echo $POSTMAILLER->SecLogOfLoginInsert($myID);


// echo $POSTMAILLER->RestPasswordStep1('semoo@dr.com');
// echo $POSTMAILLER->RestPasswordStep2('e17aadaba1e45d0b698fa4ddec8c004c','123');





?>