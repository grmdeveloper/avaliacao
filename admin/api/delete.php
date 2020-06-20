<?php 

	ini_set('display_errors',1);
	require "../../connection.php";
	require "../../config.php";
	
	$id=$_POST['id'];
	print($id);

	$stmt= "DELETE FROM avaliacoes WHERE unidadeId = '$id'";
		$con->query($stmt);//

	$stmt="DELETE FROM configs WHERE id='$id'";
	$result = $con->query($stmt);//

	if($result)
		header("location:".$SITE['root']."admin");//

	else{
		echo "A requisição falhou <a onclick='window.history.back()'>voltar</a> <br>";
		echo $con->error;
	}
?>