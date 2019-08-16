<?php 
header('Content-Type: text/html; charset=utf-8');

	require"connection.php";
	
	$unidadeid=$_POST['id'];
	$valor=$_POST['avaliacao'];
	$ip=strval($_SERVER["REMOTE_ADDR"]);


	
	$stmt = "INSERT INTO avaliacoes (unidadeId, valor, ip) VALUES ('$unidadeid','$valor','$ip')";

	$con->query($stmt);

	$con->close();
	?>
<h1 style='font-size:65px;font-family:sans-serif;text-align:center; width:100%; color:#431887;'>OBRIGADO</h1>
<h1 style='font-size:20px;font-family:sans-serif;text-align:center; width:100%; color:#431887;'>Sua opinião é muito importante para nós</h1>
<br><center><img src='logo.jpg' width='220px' alt='prefeitura de mesquita' /><br><br></center>
<h2 style='font-family:sans-serif;text-align:center; color:#431887;'>Equipe de Desenvolvimento da Prefeitura de Municipal de Mesquita</h2>

<<<<<<< HEAD
<style>
body {
		background-color:#fff;}
</style>
=======
	echo "<h1 style='text-align:center; width:60%; color:#431887; margin:10% auto;'>".$_POST['motd']."</h1>";
	echo "<br><center><img src='logo.jpg' width='220px' alt='prefeitura de mesquita' /></center>";
	echo "<h2 style='text-align:center; color:#431887;'>Equipe de desenvolvimento da prefeitura de mesquita</h2>";
?>

>>>>>>> a259287bc446f86ee43290c4ffe3de6c30a3c36d
<script type="text/javascript">
	setTimeout(function(){
		window.history.back();
	}, 15000);
</script>