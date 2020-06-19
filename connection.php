<?php 
require 'config.php';

$con = new mysqli(
	$mysql['host'],
	$mysql['user'],
	$mysql['password'],
	$mysql['bd']
);

if($con->connect_error){
	die('Erro: '.$con->connect_errno);
}

?>