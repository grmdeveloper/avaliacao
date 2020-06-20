<?php 

ini_set('display_errors',1);
require"../connection.php";
require"../config.php";
require"../src/classes/Auth.class.php";
session_start();

//IF LOGGED REDIRECT TO DASHBOARD
if( Auth::isLogged() ){
	header('location:'.$SITE['root'].'admin/dashboard.php');
}

//IF LOGOUT REFRESH THE PAGE
if( isset($_GET['logout']) ){
	Auth::logout();
}

//IF POST REQUEST TRY AUTH // ELSE INCLUDE LOGIN-BOX
if(isset($_POST['password'])){
	$auth = Auth::isValid($SITE['password'],$_POST['password']);
}

include("../src/templates/admin/layout.php");
include("../src/templates/admin/login-box.php");
echo $header;
echo $content;
echo $footer;
