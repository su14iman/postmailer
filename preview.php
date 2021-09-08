<?php 
/***

			Preview email application :)) "
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
include ("./session.php");


// Load default page .. 
$loadDefaultPage = file_get_contents('./TemplateHTML/default.template.html');
$publicDomainApp = $POSTMAILLER->GetMainDomain();




// Template Info :)) .. 
$TemplateInfo =  $POSTMAILLER->showTemplateDesignNormal($myID);
$TemplateInfoArray = $TemplateInfo['showTemplateDesign'][0];
	
	$TemplateInfoArrayOfRowLogo = $TemplateInfoArray['logo'];
	$TemplateInfoArrayOfRowLogoPosition = $TemplateInfoArray['logoPosition'];
	$TemplateInfoArrayOfRowColorHeader = $TemplateInfoArray['ColorHeader'];
	$TemplateInfoArrayOfRowColorFooter = $TemplateInfoArray['ColorFooter'];
	$TemplateInfoArrayOfRowColorBodyBox = $TemplateInfoArray['ColorBodyBox'];
	$TemplateInfoArrayOfRowColorBodyPage = $TemplateInfoArray['ColorBodyPage'];
	
	// echo $TemplateInfoArrayOfRowLogoPosition;




// Mail content .. 
$EmailContace =  $POSTMAILLER->loadContaentEmailNormal($myID);
$EmailContaceArray = $EmailContace['loadContaentEmail'][0];

	$EmailContaceArrayOfRowSubject = $EmailContaceArray['Subject'];
	$EmailContaceArrayOfRowHTML = $EmailContaceArray['HTML'];
	$EmailContaceArrayOfRowTimeUpdate = $EmailContaceArray['timeUpdate'];

	// echo $EmailContaceArrayOfRowTimeUpdate;



// Social networking details
$UserContact =  $POSTMAILLER->ShowUserContactNormal($myID);
$UserContactArray = $UserContact['ShowUserContact'][0];

	$UserContactArrayOfRowNumberPhome = $UserContactArray['numberPhome'];
	$UserContactArrayOfRowAddresss = $UserContactArray['addresss'];
	$UserContactArrayOfRowEmail = $UserContactArray['email'];

	$UserContactArrayOfRowFacebook = $UserContactArray['facebook'];
	$UserContactArrayOfRowTwitter = $UserContactArray['twitter'];
	$UserContactArrayOfRowInstagram = $UserContactArray['instagram'];

	$UserContactArrayOfRowLastUpdate = $UserContactArray['lastUpdate'];
	
	// echo $UserContactArrayOfRowInstagram;	



/**
LogoUrlHere -> url image .
PostionLogoHere -> left - right - center.

# color : 
COLORBODY -> body
COLORHEADER -> header
COLOR2BODYEMAIL -> body email
COLORFOOTER -> footer


TEXTMAILHERE -> contaec html . 
SocialmediaHERE -> loop <a img . 
DetailsHere -> text : number - email - address .

**/



// Logo::
 $loadDefaultPage =  str_replace("LogoUrlHere",$TemplateInfoArrayOfRowLogo,$loadDefaultPage); 

  $loadDefaultPage =  str_replace("PostionLogoHere",$TemplateInfoArrayOfRowLogoPosition,$loadDefaultPage); 



// Color's::
   $loadDefaultPage =  str_replace("COLORBODY",$TemplateInfoArrayOfRowColorBodyPage,$loadDefaultPage); 

   $loadDefaultPage =  str_replace("COLORHEADER",$TemplateInfoArrayOfRowColorHeader,$loadDefaultPage); 

   $loadDefaultPage =  str_replace("COLOR2BODYEMAIL",$TemplateInfoArrayOfRowColorBodyBox,$loadDefaultPage); 

   $loadDefaultPage =  str_replace("COLORFOOTER",$TemplateInfoArrayOfRowColorFooter,$loadDefaultPage); 




// Footer Details::
   		$lesFooter = $UserContactArrayOfRowNumberPhome.'<br> '.$UserContactArrayOfRowEmail.'<br>'.$UserContactArrayOfRowAddresss;

    $loadDefaultPage = str_replace("DetailsHere",$lesFooter,$loadDefaultPage); 



// Mail content HTML::
     $loadDefaultPage =  str_replace("TEXTMAILHERE",$EmailContaceArrayOfRowHTML,$loadDefaultPage); 





// Social media:
		$FooterIcons = '<a href="'.$UserContactArrayOfRowFacebook.'"><img src="'.$publicDomainApp.'/icon/2/fb.png" width="30"></a> <a href="'.$UserContactArrayOfRowInstagram.'"><img src="'.$publicDomainApp.'/icon/2/in.png" width="30"></a> <a href="'.$UserContactArrayOfRowTwitter.'"><img src="'.$publicDomainApp.'/icon/2/tw.png" width="30"></a>';

     $loadDefaultPage =  str_replace("SocialmediaHERE",$FooterIcons,$loadDefaultPage); 


			$urlFilesHTML = './HtmlFilesUser/';


            $myfile = fopen($urlFilesHTML.$myID.'.leterMail.html', "w");
            fseek($myfile, 0);
            fwrite($myfile,$loadDefaultPage);
            fclose($myfile);


echo $loadDefaultPage;






?>