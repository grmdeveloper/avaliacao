<?php 

	require "connection.php";
	$id=$_GET['id'];

	$stmt="DELETE FROM configs WHERE id='$id'";
	$result = $con->query($stmt);

	if($result)
		header("location:/avaliacao/admin");

	else
		echo "A requisição não pode ser completada <a href='/avaliacao/admin'>Voltar</a>";
?>