<?php 

	require "connection.php";
	$id=$_POST['id'];

	$stmt="DELETE FROM configs WHERE id='$id'";
	$result = $con->query($stmt);

	if($result)
		header("location:/avaliacao/admin");

	else
		echo "A requisição não pode ser completada <a href='/avaliacao/admin'>voltar</a> <br>";
		echo $con->error;
?>