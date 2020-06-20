<?php 

ini_set('display_errors',1);

require"../connection.php";
require"../config.php";
require"../src/classes/Unidade.class.php";
require"../src/classes/Auth.class.php";
require"../src/classes/Admin.class.php";

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

// ADMIN FUNCTIONS - CRUD
if( isset($_SESSION['auth']) ){
	
	if($_POST['create'] && $_SESSION['auth']){
		Admin::createUnity( trim( $_POST['nome'] ), trim( $_POST['titulo'] ), trim( $_POST['motd'] ), $con);
	}

	if($_POST['delete'] && $_SESSION['auth']){
		Admin::deleteUnity($_POST['id'],$con);
	}

	if($_POST['update'] && $_SESSION['auth']){
		Admin::updateUnity( 
			$_ṔOST['id'], 
			trim( $_POST['nome'] ), 
			trim( $_POST['titulo'] ), 
			trim( $_POST['motd'] ), 
			$con );
	}
}

$con->close();

require"../src/templates/admin/layout.php";

header("Content-type:text/html; charset=utf-8");
session_start();

if( isset($_GET['logout']) ){
	Auth::logout();
}

if(isset($_POST['password'])){
	$auth = Auth::isValid($SITE['password'],$_POST['password']);
	if($auth){
		$_SESSION['auth'] = $auth;
	}else{
		header('reload');
	}

}


if(!isset($_SESSION['auth'])){
	include("../src/templates/admin/login-box.php");
}
else{
	include("../src/templates/admin/dashboard.php");
}

echo $header;
echo $content;
echo $footer;
	
?>