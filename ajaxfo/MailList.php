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




$MaillistLoadAllMyEmail = $_POST['maillistloadall'];
if(!empty($MaillistLoadAllMyEmail)){
	echo $POSTMAILLER->GetAllMyMailList($myID);
}




$MailListAddNewName = $_POST['maillistaddnewname'];
$MailListAddNewEmail = $_POST['maillistaddnewemail'];
	if (!empty($MailListAddNewEmail)) {
		echo $POSTMAILLER->AddEmailToMailList($myID,$MailListAddNewEmail,$MailListAddNewName);	
	}



$MailListRemoveId = $_POST['maillistremoveid'];
if(!empty($MailListRemoveId)){
	echo $POSTMAILLER->RemoveEmailToMailList($myID,$MailListRemoveId);
}



# Mail List

// echo $POSTMAILLER->AddEmailToMailList(1,'semoo@dr.com','ahmad');

// echo $POSTMAILLER->RemoveEmailToMailList($myID,3);

// echo $POSTMAILLER->RemoveAllEmailToMailList($myID);


// echo $POSTMAILLER->GetAllMyMailList($myID);

?>