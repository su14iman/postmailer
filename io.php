<?php 
/***

			TEST Application :)) "
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


include('./session.php');

header('Content-Type: application/json');
ob_end_clean();

$DirFolderAjaxFiles = './ajaxfo/';

	// include ajax files .. 
	include($DirFolderAjaxFiles.'account'.'.php');
	include($DirFolderAjaxFiles.'MailList'.'.php');
	include($DirFolderAjaxFiles.'TemplateDesign'.'.php');
	include($DirFolderAjaxFiles.'ContaentEmail'.'.php');
	include($DirFolderAjaxFiles.'userContact'.'.php');
	include($DirFolderAjaxFiles.'Logfile'.'.php');
	include($DirFolderAjaxFiles.'session'.'.php');




?>