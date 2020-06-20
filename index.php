<?php 

	header('Content-type:text/html; charset=utf-8');
	clearstatcache();
	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
	header("Pragma: no-cache"); // HTTP 1.0.
	header("Expires: 0"); // Proxies.
	//ini_set('display_errors',1);

	require"connection.php";
	require"src/classes/Unidade.class.php";

	if(isset($_GET['u']))
		$unidade= new Unidade($_GET['u'],$con);

	else {
		$unidade = new Unidade(Unidade::getFirstId($con),$con);
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Avaliação</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel='stylesheet' type='text/css' href='node_modules/bootstrap/dist/css/bootstrap.min.css'>
		<script type='text/javascript' src='node_modules/bootstrap/dist/js/bootstrap.min.js'></script>
		<link href='css/style.css' rel='stylesheet' type='text/css'>
		<script type='text/javascript' src='node_modules/jquery/dist/jquery.js' > </script>
</head>
<body>
	<?php include"src/templates/app.php"; ?>
</body>

</html>
