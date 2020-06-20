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

<?php include"src/templates/layout.php" ?>

<?php echo $header; ?>
<?php include"src/templates/app.php"; ?>
<?php echo $footer; ?>