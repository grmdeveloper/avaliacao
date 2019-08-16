<?php 
	require"connection.php";

	$stmt="SELECT * FROM configs";
	$result=$con->query($stmt);
	while($row = $result->fetch_assoc()){
		print_r($row);
	}
?>
