<?php
ob_start();
session_start();

/***

			Session Application :)) "
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


#Include !! 
include ("./pack/configAppPostMailler.php");
include ("./pack/class.action.php");
include("./pack/class.upload.php");

# Varbile !! 
$POSTMAILLER = new POSTMAILLER();
$myID = de($_SESSION['ID']);

########################################
# Start Code ...
########################################


// echo "<pre>";
// var_dump($_SESSION);

	if ($_SESSION['username'] == NULL || $_SESSION['ID'] == NULL) {
		echo "plz login frist :)) ";
		header('Location: ./login');
		exit();
	} // End if .. 



// try {
// 	 @$POSTMAILLER->SecLogOfLoginInsert($myID);

// } catch (Exception $e) {
	
// }




?>

