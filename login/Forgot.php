<?php
session_start(); 
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
include ("../pack/configAppPostMailler.php");
include ("../pack/class.action.php");

# Varbile !! 
$POSTMAILLER = new POSTMAILLER();


$error = '';


if($_SESSION['username'] == NULL || $_SESSION['ID'] == NULL){

}else{
 header("Location:../$HomePageSession"); 
  exit();
}







  if(!empty($_POST['emaill'])){

$emailPOST = sIO($_POST['emaill']);

    
      $SttepOne = $POSTMAILLER->RestPasswordStep1($emailPOST);
        
        if($SttepOne['RestPasswordStep1']['s'] == 'ok'){
          // echo "ok";
          // header('Location: ../'.$HomePageSession);
          // exit();
          $error ='Check your email ..';
        }else{
          $error = 'Check your email ..';
        }

  }





?>


<!DOCTYPE html>
<html >
<head>

  
  
  
      <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Login || Post Mailler</title>
    <link rel="icon" href="../ext/img/logo1.ico" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  </head>

  <body class="align">

      <!-- Logo -->
      <div style=" text-align: center;">
        <img width="230" src="../ext/img/logo1.ico">
      </div>


      <div id="error" style=" color: #EC5778; margin: 2%; font-size: 1rem; ">
        <?php echo $error; ?>
      </div>

    <div class="grid">

      <form action="" method="POST" class="form login">

        <div class="form__field">
          <label for="login__username"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Email</span></label>
          <input id="login__username" type="email" name="emaill" class="form__input" placeholder="Email" required>
        </div>

        

        <div class="form__field">
          <input type="submit" value="Reset account">
        </div>

      </form>

      

    </div>
    
    <svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/></symbol></svg>

  </body>

</html>
  
  
</body>
</html>
