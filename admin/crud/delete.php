<?php 

	require "connection.php";
	$id=$_GET['id'];

	$stmt="DELETE FROM configs WHERE id='$id'";
	$con->query($stmt);

	header("location:/avaliacao/admin");

?>