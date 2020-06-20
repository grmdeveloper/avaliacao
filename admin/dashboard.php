<?php 

ini_set('display_errors',1);

require"../connection.php";
require"../config.php";
require"../src/classes/Auth.class.php";
require"../src/classes/Unidade.class.php";
session_start();

if(Auth::isLogged()){
	if(isset($_GET['u']))
		$unidade= new Unidade($_GET['u'],$con);

	else {
		$unidade = new Unidade(Unidade::getFirstId($con),$con);
	}

	$id=			$unidade->getId();
	$nome=			$unidade->getName();
	$titulo= 		$unidade->getTitle();
	$motd=			$unidade->getMotd();
	$updated= 		$unidade->getUpdate();

	$assessments = 	$unidade->getAssessments($con);
	$unidades = Unidade::getAll($con);
	$con->close();

	require"../src/templates/admin/layout.php";

	header("Content-type:text/html; charset=utf-8");

	include("../src/templates/admin/dashboard.php");

	echo $header;
	echo $content;
	echo $footer;
}
else
	header('location:index.php');
