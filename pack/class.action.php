<?php 
/***

            Class Contral Application :)) "
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

// $timeEnd = 31536000 + $timeNow; // Plus one year .. 

class POSTMAILLER
{

//  Private Functions :)) 

   private function HashPassword($pass){
        $res = "#Dr.".md5(md5($pass)).".SAi";
        return $res;
   }

   private function ClinetInfo(){
        $res['time'] = time();
        $res['ip'] = $_SERVER['REMOTE_ADDR'];
        $res['browser'] = $_SERVER['HTTP_USER_AGENT']; 
        return $res;
   }

    private function timeYMD($t){
        return date("Y-m-d h:i:a",$t);
    }

    private function GetDeMe(){
        $res['time'] = time();
        $res['ip'] = $_SERVER['REMOTE_ADDR'];
        $res['browser'] = $_SERVER['HTTP_USER_AGENT'];
        return $res;
    } 

    private function IpInfo($ip){
        $details = json_decode(file_get_contents("https://ipinfo.io/".$ip."/json"));
            $i['hostname'] = $details->hostname; // -> "US"
            $i['city'] = $details->city; // -> "US"
            $i['region'] = $details->region; // -> "US"
            $i['country'] = $details->country; // -> "US"
            $i['1'] = $details->country; // -> "US"
            $i['loc'] = $details->loc; // -> "US"
        if($i['1'] == null){$i['1'] = 'unknown';}
        if($i['city'] == null){$i['city'] = 'unknown';}
       return $i;
    }






//  Public Functions :)) 

    public function login($email,$password){
        global $sqli;
        $hashPassword = $this->HashPassword($password);
        $query = $sqli->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$hashPassword'");
        $num = mysqli_num_rows($query);
            if($num = 1){
                $fetchQuery = $query->fetch_array();
                $resFetch['id'] =  $fetchQuery['id'];  
                $resFetch['status'] =  $fetchQuery['status']; 
                if($resFetch['status'] == 1){
                    $res['id'] = $resFetch['id'];
                    $res['s'] = 'ok';
                }else{
                    $res['s'] = 'error';
                }
            }

        // $res = $resFetch['status'];
        return $res;
    }



    public function ChangPassword($myID,$oldPass,$newPass){
        global $sqli;
                $newPass = $this->HashPassword($newPass);
                $oldPass = $this->HashPassword($oldPass);
            $Query = $sqli->query("SELECT * FROM `users` WHERE `id` = '$myID'");
            $fetchQuery = $Query->fetch_array();
            $OldPassword = $fetchQuery['password'];
                if($oldPass == $OldPassword ){
                    $sqli->query("UPDATE `users` SET `password` = '$newPass' WHERE `id` = '$myID'");
                    $rJson['s'] = 'ok';
                }else{
                    $rJson['s'] = 'error';
                }
        return json_encode(array('ChangPassword'=>$rJson));
    }




    public function RestPasswordStep1($email){
        global $sqli;
        $MyInformtion = $this->ClinetInfo();
            $MyTime = $MyInformtion['time'];
            $MyIP = $MyInformtion['ip'];
            $MyBrowser = $MyInformtion['browser'];
        $Token = md5($MyIP.$MyBrowser.$MyTime);

            $QueryGetID = $sqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
            $numEmail = mysqli_num_rows($QueryGetID);
            if($numEmail == 1){

             $fetchQueryGetID = $QueryGetID->fetch_array();
            $UserID = $fetchQueryGetID['id'];

            $sqli->query("UPDATE `passwordToken` SET `Status` = '0' WHERE `userID` = '$UserID'");

            $sqli->query("INSERT INTO `passwordToken` (`id`, `userID`, `Token`, `timeCreate`,`IP`, `Status`) VALUES (NULL, '$UserID', '$Token', '$MyTime','$MyIP', '1');");

            // Send $Token TO: $Email  
                $rJson['s'] = 'ok';              
            }else{
                $rJson['s'] = 'error';
            }

        return array('RestPasswordStep1'=>$rJson);
    }


    public function RestPasswordStep2($token,$newPassword){
        global $sqli;
        $newPassword = $this->HashPassword($newPassword);

        // Step One
        $Query = $sqli->query("SELECT * FROM `passwordToken` WHERE `Token` = '$token' AND `Status` = 1");
        $numQuery = mysqli_num_rows($Query);
        $fetchQuery = $Query->fetch_array();

        $timeCreate = $fetchQuery['timeCreate'];
        $timeNow = time();
        $SumTime = $timeNow - $timeCreate; 
            if($numQuery == 1 && $SumTime < 900){
                
                    $UserID = $fetchQuery['userID'];


                // Step Two
                $QueryChangPass = $sqli->query("UPDATE `users` SET `password` = '$newPassword' WHERE `id` = '$UserID';"); 

                $sqli->query("UPDATE `passwordToken` SET `Status` = '0' WHERE `Token` = '$token';"); 

                
                $rJson['s'] = 'ok';               
            }else{
                $rJson['s'] = 'error';
            }
            // $rJson['sum'] = $SumTime;
        return array('RestPasswordStep2'=>$rJson);
    }



    public function logout($sessionID){
        global $sqli;
        $Query = $sqli->query("UPDATE `SecLogOfLogin` SET `status` = '1' WHERE `session_id` = '$sessionID';");
        return 'ok';
    }


    // Profile Section .. 
    public function EditMyFullName($myID,$name){
        global $sqli;
        $sqli->query("UPDATE `users` SET `fullname` = '$name' WHERE `id` = '$myID';");
        $rJson['s'] = 'ok';
        return json_encode(array('EditMyFullName'=>$rJson));

    }


    public function EditMyImage($myID,$image){
        global $sqli;
        $sqli->query("UPDATE `users` SET `image` = '$image' WHERE `id` = '$myID';");
        $rJson['s'] = 'ok';
        return json_encode(array('EditMyImage'=>$rJson));

    }

    public function EditMyEmail($myID,$email){
        global $sqli;
        $sqli->query("UPDATE `users` SET `email` = '$email' WHERE `id` = '$myID';");
        $rJson['s'] = 'ok';
        return json_encode(array('EditMyEmail'=>$rJson));

    }


    public function EditMyEmailSend($myID,$email){
        global $sqli;
        $sqli->query("UPDATE `users` SET `EmailSend` = '$email' WHERE `id` = '$myID';");
        $rJson['s'] = 'ok';
        return json_encode(array('EditMyEmailSend'=>$rJson));

    }


    public function GetClientInfo($myID){
        global $sqli;
        $query = $sqli->query("SELECT * FROM `users` WHERE `id`= '$myID' ");
        while ($resp = $query->fetch_array()) {
            $i['fullname'] = $resp['fullname'];
            $i['image'] = $resp['image'];
            $i['email'] = $resp['email'];
            $i['EmailSend'] = $resp['EmailSend'];
            $i['timeCreate'] = $this->timeYMD($resp['timeCreate']);
            $i['timeEnd'] = $this->timeYMD($resp['timeEnd']);
        $r[] = $i;    
        }
        
        return json_encode(array('GetClientInfo'=>$r));
    }


    public function sumTimeLimtedForAccountDays($myID){
        global $sqli;
        $query = $sqli->query("SELECT * FROM `users` WHERE `id`= '$myID' ");
        $resp = $query->fetch_array();

        $timeCreate = $resp['timeCreate'];
        $timeEnd = $resp['timeEnd'];
        $timeNow = time();

        $sum = $timeEnd - $timeNow;

        // munite
         $muinte = intval($sum / 60);

        // hour
         $hour = intval($muinte / 60);

        // day
        $r['day'] = $day = intval($hour / 24);

        // // weak
        // $r['weak'] = $weak = intval($day / 7);

        // // month
        // $r['month'] = $month = intval($day / 30);

        // // year
        // $r['year'] = $year = intval($month / 12);


        
        return json_encode(array('sumTimeLimtedForAccountDays'=>$r));
    }






// Maill List 

    public function AddEmailToMailList($myID,$email,$name=NULL){
        global $sqli;
        $timeNow = time();
            $sqli->query("INSERT INTO `mailList` (`id`, `userID`, `FullName`, `email`, `timeAdd`, `status`) VALUES (NULL, '$myID', '$name', '$email', '$timeNow', '1');");
            $rJson['s'] = 'ok';
        return json_encode(array('AddEmailToMailList'=>$rJson));
    }



    public function RemoveEmailToMailList($myID,$emailID){
        global $sqli;
        
            $sqli->query("UPDATE `mailList` SET `status` = '0' WHERE `id` = '$emailID' AND `userID` = '$myID';");
            $rJson['s'] = 'ok';
        return json_encode(array('RemoveEmailToMailList'=>$rJson));
    }

    public function RemoveAllEmailToMailList($myID){
        global $sqli;
        
            $sqli->query("UPDATE `mailList` SET `status` = '0' WHERE `userID` = '$myID';");
            $rJson['s'] = 'ok';
        return json_encode(array('RemoveAllEmailToMailList'=>$rJson));
    }


    public function GetAllMyMailList($myID){
        global $sqli;
        $Query = $sqli->query("SELECT * FROM `mailList` WHERE `userID` = '$myID' AND `status` = 1");
            while ($resp = $Query->fetch_array()) {
                $i['id'] = $resp['id'];
                $i['FullName'] = $resp['FullName'];
                $i['email'] = $resp['email'];
                $i['timeAdd'] = $this->timeYMD($resp['timeAdd']);
            $r[] = $i;
            }
        return json_encode(array('GetAllMyMailList'=>$r));            

    }










// Template design

    public function CreatTemplateDesign($myID){
        global $sqli;
        $queryCheck = $sqli->query("SELECT * FROM `TemplateDesign` WHERE `userID` = '$myID'");
        $num = mysqli_num_rows($queryCheck);
            if($num == 1){
                $rJson['s'] = 'ok';
            }else{
                $sqli->query("INSERT INTO `TemplateDesign` (`id`, `userID`, `logo`, `logoPosition`, `ColorHeader`, `ColorFooter`, `ColorBodyBox`, `ColorBodyPage`) VALUES (NULL, '$myID', NULL, NULL, NULL, NULL, NULL, NULL);");
                $rJson['s'] = 'ok';
            }
        return json_encode(array('CreatTemplateDesign'=>$rJson));
    }

    public function AddLogoTemplateDesign($myID,$logo){
        global $sqli;
        $sqli->query("UPDATE `TemplateDesign` SET `logo` = '$logo' WHERE `id` = '$myID';");
        $rJson['s'] = 'ok';
        return json_encode(array('AddLogoTemplateDesign'=>$rJson));
    }


    public function PostionLogoTemplateDesign($myID,$postion=NULL){
        global $sqli;
            if($postion ==2){
                $po = 'left';
            }elseif($postion ==3){
                $po = 'right';
            }elseif($postion ==1){
                $po = 'center';
            } 
        $sqli->query("UPDATE `TemplateDesign` SET `logoPosition` = '$po' WHERE `id` = '$myID';");
        $rJson['s'] = 'ok';
        return json_encode(array('PostionLogoTemplateDesign'=>$rJson));
    }




    public function EditColorTemplateDesign($myID,$ColorHeader,$ColorFooter,$ColorBodyBox,$ColorBodyPage){
        global $sqli;
        $sqli->query("UPDATE `TemplateDesign` SET `ColorHeader` = '$ColorHeader', `ColorFooter` = '$ColorFooter', `ColorBodyBox` = '$ColorBodyBox', `ColorBodyPage` = '$ColorBodyPage' WHERE `id` = '$myID';");
        $rJson['s'] = 'ok';
        return json_encode(array('EditColorTemplateDesign'=>$rJson));
    }


    public function showTemplateDesign($myID){
        global $sqli;
        $query = $sqli->query("SELECT * FROM `TemplateDesign` WHERE `userID` = '$myID'");
        while ($resp = $query->fetch_array()) {
            $i['logo'] = $resp['logo'];
            $i['logoPosition'] = $resp['logoPosition'];
            $i['ColorHeader'] = $resp['ColorHeader'];
            $i['ColorFooter'] = $resp['ColorFooter'];
            $i['ColorBodyBox'] = $resp['ColorBodyBox'];
            $i['ColorBodyPage'] = $resp['ColorBodyPage'];
            $r[] = $i;
        }
        return json_encode(array('showTemplateDesign'=>$r));
    }


    public function showTemplateDesignNormal($myID){
        global $sqli;
        $query = $sqli->query("SELECT * FROM `TemplateDesign` WHERE `userID` = '$myID'");
        while ($resp = $query->fetch_array()) {
            $i['logo'] = $resp['logo'];
            $i['logoPosition'] = $resp['logoPosition'];
            $i['ColorHeader'] = $resp['ColorHeader'];
            $i['ColorFooter'] = $resp['ColorFooter'];
            $i['ColorBodyBox'] = $resp['ColorBodyBox'];
            $i['ColorBodyPage'] = $resp['ColorBodyPage'];
            $r[] = $i;
        }
        return array('showTemplateDesign'=>$r);
    }









// Content Email


    public function createContaentEmail($myID){
        global $sqli;
        $timeNow = time();
        $queryCheck = $sqli->query("SELECT * FROM `ContentEmail` WHERE `userID` = '$myID'");
        $num = mysqli_num_rows($queryCheck);
           
            if($num == 1){
               $rJson['s']='ok'; 
            }else{
                $sqli->query("INSERT INTO `ContentEmail` (`id`, `userID`, `Subject`, `HTML`, `timeUpdate`) VALUES (NULL, '$myID', NULL, NULL, '$timeNow');");
                $rJson['s']='ok';
            }

        return json_encode(array('createContaentEmail'=>$rJson));
    }



    public function EditContaentEmail($myID,$subject,$html){
        global $sqli;
        $timeNow = time();
        $sqli->query("UPDATE `ContentEmail` SET `Subject` = '$subject',`timeUpdate` = '$timeNow', `HTML` = '$html' WHERE `userID` = '$myID' ; ");
        $rJson['s'] = 'ok';
        return json_encode(array('EditContaentEmail'=>$rJson));
    }



    public function loadContaentEmail($myID){
        global $sqli;
        $query = $sqli->query("SELECT * FROM `ContentEmail` WHERE `userID` = '$myID'");
        while ($resp = $query->fetch_array()) {
            $i['Subject'] = $resp['Subject'];
            $i['HTML'] = $resp['HTML'];
            $i['timeUpdate'] = $this->timeYMD($resp['timeUpdate']);
            $r[] = $i;
        }
        return json_encode(array('loadContaentEmail'=>$r));
    }



    public function loadContaentEmailNormal($myID){
        global $sqli;
        $query = $sqli->query("SELECT * FROM `ContentEmail` WHERE `userID` = '$myID'");
        while ($resp = $query->fetch_array()) {
            $i['Subject'] = $resp['Subject'];
            $i['HTML'] = $resp['HTML'];
            $i['timeUpdate'] = $this->timeYMD($resp['timeUpdate']);
            $r[] = $i;
        }
        return array('loadContaentEmail'=>$r);
    }








// user Contact

    public function CreateUserContact($myID){
        global $sqli;
        $timeNow = time();
        $queryCheck = $sqli->query("SELECT * FROM `userContact` WHERE `userID` = '$myID'");
        $num = mysqli_num_rows($queryCheck);
            if($num == 1){
               $rJson['s']='ok'; 
            }else{
                $sqli->query("INSERT INTO `userContact` (`id`, `userID`, `numberPhome`, `addresss`, `facebook`, `twitter`, `instagram`, `email`, `lastUpdate`) VALUES (NULL, '$myID', NULL, NULL, NULL, NULL, NULL, NULL, '$timeNow');");
                $rJson['s']='ok';
            }
        return json_encode(array('CreateUserContact'=>$rJson));
    }




    public function EditUserContact($myID,$numberPhome=NULL,$addresss=NULL,$facebook=NULL,$twitter=NULL,$instagram=NULL,$email=NULL){
        global $sqli;
        $timeNow = time();
        $sqli->query("UPDATE `userContact` SET `numberPhome` = '$numberPhome', `addresss` = '$addresss', `facebook` = '$facebook', `twitter` = '$twitter', `instagram` = '$instagram', `email` = '$email', `lastUpdate` = '$timeNow' WHERE `userID` = '$myID';");
        $rJson['s']='ok';
        return json_encode(array('EditUserContact'=>$rJson));
    }


    public function ShowUserContact($myID){
        global $sqli;
        $q = $sqli->query("SELECT * FROM `userContact` WHERE `userID` = '$myID';");
        while ($resp = $q->fetch_array()) {
            $i['numberPhome'] = $resp['numberPhome'];
            $i['addresss'] = $resp['addresss'];
            $i['facebook'] = $resp['facebook'];
            $i['twitter'] = $resp['twitter'];
            $i['instagram'] = $resp['instagram'];
            $i['email'] = $resp['email'];
            $i['lastUpdate'] = $this->timeYMD($resp['lastUpdate']);
            $r[] = $i;
        }
        return json_encode(array('ShowUserContact'=>$r));
    }



    public function ShowUserContactNormal($myID){
        global $sqli;
        $q = $sqli->query("SELECT * FROM `userContact` WHERE `userID` = '$myID';");
        while ($resp = $q->fetch_array()) {
            $i['numberPhome'] = $resp['numberPhome'];
            $i['addresss'] = $resp['addresss'];
            $i['facebook'] = $resp['facebook'];
            $i['twitter'] = $resp['twitter'];
            $i['instagram'] = $resp['instagram'];
            $i['email'] = $resp['email'];
            $i['lastUpdate'] = $this->timeYMD($resp['lastUpdate']);
            $r[] = $i;
        }
        return array('ShowUserContact'=>$r);
    }






// Log File .. 


    public function CreatLogFile($myID){
        global $sqli;
        $urlFilesLog = "./log/";
        $timeNow = time();
        $logFileName = md5($myID.$timeNow).".txt";
        $sqli->query("INSERT INTO `LogSender` (`id`, `userID`, `timeCreate`, `LogFile`) VALUES (NULL, '$myID', '$timeNow', '$logFileName');");

            fopen($urlFilesLog.$logFileName, "w");

        $rJson['s'] = 'ok';
        $rJson['logFile'] = $logFileName;
        return json_encode(array('CreatLogFile'=>$rJson));
    }

    public function WriteOnLogfile($myID){
        global $sqli;
        $q = $sqli->query("SELECT * FROM `LogSender` WHERE `userID` = '$myID' ORDER BY `timeCreate` DESC");
        $fetchQuery = $q->fetch_array();
            $fileNameLog = $fetchQuery['LogFile'];
            $urlFilesLog = "./log/";

            $testTXT = '0|semoo@dr.com|2017-08-08 12:40pm;';

            $myfile = fopen($urlFilesLog.$fileNameLog, "a");
            fseek($myfile, 0);
            fwrite($myfile,$testTXT);
            fclose($myfile);
        
        return $fileNameLog;
    }



    public function ReadOnLogfile($myID,$id){
        global $sqli;
        $q = $sqli->query("SELECT * FROM `LogSender` WHERE `id` = '$id' AND `userID` = '$myID' ");
        $num = mysqli_num_rows($q);
            if($num == 1 ){
                $resFetch = $q->fetch_array();
                $isFileName = $resFetch['LogFile'];
                $urlFilesLog = "./log/";
                $LogFile = file_get_contents($urlFilesLog.$isFileName);
                $LogFile = str_replace("|"," - ",$LogFile); 
                $LogFileArray = explode(";",$LogFile);
                $rJson['Lines'] = $LogFileArray;
                $rJson['s'] = 'ok';
            }else{
                $rJson['s']='error';
            }
        return json_encode(array('ReadOnLogfile'=>$rJson));
    }


    public function ListMyLogs($myID){
        global $sqli;
        $q = $sqli->query("SELECT * FROM `LogSender` WHERE `userID` = '$myID'");
        while ($resp = $q->fetch_array()) {
            $i['id'] = $resp['id'];
            $i['timeCreate'] = $this->timeYMD($resp['timeCreate']);
            $r[] = $i;
        }
       return json_encode(array('ListMyLogs'=>$r)); 
    }





// Show last login > 7 


                public function SecLogOfLoginInsert($myID){
                    global $sqli;
                    $MyInfo = $this->GetDeMe();
                    
                    $TimeNow = $MyInfo['time'];
                    $MyIp = $MyInfo['ip'];
                    $IpInfoV = $this->IpInfo($MyIp);
                    $sessionID = session_id();

                    $MyBrowser = $MyInfo['browser'];
                    $waitTime = 600;
                    $contry = $IpInfoV['1']." , ".$IpInfoV['city'];

                    $QueryCheck = $sqli->query("SELECT * FROM `SecLogOfLogin` WHERE `userid` = '$myID' AND `ip` = '$MyIp'  AND `browser` = '$MyBrowser' AND `session_id`='$sessionID' AND `status`=0 ORDER BY `id` DESC ");
                    $numCheck = mysqli_num_rows($QueryCheck);
                        if($numCheck > 0){
                            $QueryFetch = $QueryCheck->fetch_array();
                            $LastTimeLogin = $QueryFetch['time'];
                            $sumTime = $TimeNow - $LastTimeLogin;
                                if($sumTime < $waitTime){
                                    $sqli->query("UPDATE `SecLogOfLogin` SET `time` = '$TimeNow' WHERE `userid` = '$myID' AND `time` = '$LastTimeLogin'  ;");
                                    $res = 'update';
                                }else{
                                    $QueryInsertData = $sqli->query("INSERT INTO `SecLogOfLogin` (`id`, `userid`, `ip`, `browser`, `contry`,`session_id`, `time`,`status`) VALUES (NULL, '$myID', '$MyIp', '$MyBrowser','$contry','$sessionID','$TimeNow','0');");
                                    $res = 'insert';
                                }
                        }else{
                            $res = 'add new';
                            $QueryInsertData = $sqli->query("INSERT INTO `SecLogOfLogin` (`id`, `userid`, `ip`, `browser`, `contry`,`session_id`, `time`,`status`) VALUES (NULL, '$myID', '$MyIp', '$MyBrowser','$contry','$sessionID','$TimeNow','0');");
                        }

                    return $res;
                }




                
                public function SecLogOfLoginSelect($myID){
                    global $sqli;
                    $QueryOne = $sqli->query("SELECT * FROM `SecLogOfLogin` WHERE `userid` = '$myID' AND `status`= 0 ORDER BY `id` DESC ");
                    $numi = 0;
                    $numLoop = 7;
                    while ($fetchQuery = $QueryOne->fetch_array()) {
                        $i['ip'] = $fetchQuery['ip'];
                        $i['browser'] = $fetchQuery['browser'];
                        $i['contry'] = $fetchQuery['contry'];
                        $i['status'] = $fetchQuery['status'];
                        $i['time'] = $this->timeYMD($fetchQuery['time']);
                        $i['num'] = $numi;
                        if ($numi == $numLoop) {break;}
                        $numi++;
                        $res[] = $i;
                    }
                    return json_encode(array('SecLogOfLoginSelect'=>$res));
                }









// Other Function 

        public function GetMainDomain(){
            global $sqli;
            $q = $sqli->query("SELECT * FROM `SMTP`");
            $fetchQuery = $q->fetch_array();
            $res = $fetchQuery['domainName'];
            return $res;
        }




/**
LogoUrlHere -> url image .
PostionLogoHere -> left - right - center.

# color : 
COLORBODY -> body
COLORHEADER -> header
COLORBODYEMAIL -> body email
COLORFOOTER -> footer


TEXTMAILHERE -> contaec html . 
SocialmediaHERE -> loop <a img . 
DetailsHere -> text : number - email - address .





**/



}


?>