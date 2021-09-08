<?php 
/***

			Config Application :)) "
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

$db_host = "localhost";
$db_username = "root";
$db_password = "root";
$db_table = "PostMailer";
$keyCrypt = "Se3/mo!!74@7"; // Key For enCrypt And deCrypt
$HomePageSession = "main"; // Home Page Started Session !!

// $SessionCrypt['ID'] = 'IdLOgin';
// $SessionCrypt['username'] = 'UserName';
// $SessionCrypt['time'] = 'U2SziWjjox7/BWWMDuzMbQ==';
// ECOF1u903MreCcTnT9UtsA== || => PostMaillerID
// xloaki/bRgZRnxiJ1ySOVJK/gyMgWzFghUUpCk0D+YI= || => PostMaillerUserName
// U2SziWjjox7/BWWMDuzMbQ==  || => PostMaillerTime



$sqli = new mysqli($db_host, $db_username , $db_password , $db_table);
mysqli_set_charset($sqli,"utf8");

if(mysqli_connect_error()){ echo mysqli_connect_error(); }



		function en($s){
			$r = openssl_encrypt($s,"AES-128-ECB","Se3/mo!!74@7");
			return $r;
		} 

		function de($s){
			$r = openssl_decrypt($s,"AES-128-ECB","Se3/mo!!74@7");
			return $r;
		} 


		function sIO($ss){ 
			return addslashes(htmlspecialchars(trim($ss))); 
		}



// $timestamp = strtotime('2019-05-23');
// echo " String : ".$timestamp;
// echo "<br>";
// echo "HEX : ".date('d / m / Y',$timestamp);

?>