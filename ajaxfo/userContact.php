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




# user Contact

$POSTMAILLER->CreateUserContact($myID);


	$ContatctUsLoadData = $_POST['contatcusloaddata'];
		if(!empty($ContatctUsLoadData)){
			echo $POSTMAILLER->ShowUserContact($myID);	
		}




$ContatctUsEnumberphone = $_POST['ContatctUsEnumberphone'];
$ContatctUsEemail = $_POST['ContatctUsEemail'];
$ContatctUsEaddress = $_POST['ContatctUsEaddress'];
$ContatctUsEfacebook = $_POST['ContatctUsEfacebook'];
$ContatctUsEtwitter = $_POST['ContatctUsEtwitter'];
$ContatctUsEinsta = $_POST['ContatctUsEinsta'];

if(!empty($ContatctUsEnumberphone) && !empty($ContatctUsEemail) && !empty($ContatctUsEaddress)){
	echo $POSTMAILLER->EditUserContact($myID,$ContatctUsEnumberphone,$ContatctUsEaddress,$ContatctUsEfacebook,$ContatctUsEtwitter,$ContatctUsEinsta,$ContatctUsEemail);	
}






?>