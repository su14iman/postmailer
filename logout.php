<?php
session_start();
if(session_destroy()){
header("Location: login"); // Redirecting To Home Page
	}
?>