<?php
ob_start();
include 'config.php';
require 'includes/functions.php';
 
$loginCtl = new LoginForm;
 
$loginCtl->insertMembersLogs(  $_GET['userId'], 'OUT');
session_start();
 
//remove PHPSESSID from browser
if ( isset( $_COOKIE[session_name()] ) )
    setcookie( session_name(), “”, time()-3600, “/” );

//clear session from globals
$_SESSION = array();

//clear session from disk
session_destroy();

header("location:main_login.php");
 
 
 