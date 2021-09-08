<?php
include("session.php");


if($_SESSION['username'] == NULL || $_SESSION['ID'] == NULL){
     header("Location:./login");
    exit();
}else{
 header("Location:./$HomePageSession"); 
	exit();
}


?>