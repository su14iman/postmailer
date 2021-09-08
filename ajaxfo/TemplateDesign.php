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




#Template Design

$POSTMAILLER->CreatTemplateDesign($myID);



$TemDesignColorbody = $_POST['TemDesignColorbody'];
$TemDesignColorheader = $_POST['TemDesignColorheader'];
$TemDesignColorfooter = $_POST['TemDesignColorfooter'];
$TemDesignColorbodyemail = $_POST['TemDesignColorbodyemail'];

	if(!empty($TemDesignColorbody) && !empty($TemDesignColorheader) && !empty($TemDesignColorfooter) && !empty($TemDesignColorbodyemail)){
		echo $POSTMAILLER->EditColorTemplateDesign($myID,$TemDesignColorheader,$TemDesignColorfooter,$TemDesignColorbodyemail,$TemDesignColorbody);
	}




$TemDesignShowColor = $_POST['TemDesignShowColor'];
if(!empty($TemDesignShowColor)){
	echo $POSTMAILLER->showTemplateDesign($myID);
}



$TemDesignLogoPostionE = $_POST['TemDesignLogoPostionE'];

if(!empty($TemDesignLogoPostionE)){
	echo $POSTMAILLER->PostionLogoTemplateDesign($myID,$TemDesignLogoPostionE);	
}



$TemDesignLogoE = $_POST['TemDesignLogoE'];

if(!empty($TemDesignLogoE)){
	echo $POSTMAILLER->AddLogoTemplateDesign($myID,$TemDesignLogoE);
}









// echo $POSTMAILLER->AddLogoTemplateDesign($myID,$logo);
// 
// echo $POSTMAILLER->EditColorTemplateDesign($myID,$ColorHeader,$ColorFooter,$ColorBodyBox,$ColorBodyPage);
// echo $POSTMAILLER->showTemplateDesign($myID);


// $aa =  $POSTMAILLER->showTemplateDesignNormal($myID);


?>