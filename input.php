<?php 
header('Content-Type: text/html; charset=utf-8');

	$valor=$_POST['avaliacao'];
	require"connection.php";

	
	$stmt = "INSERT INTO avaliacoes (valor) VALUES ('$valor')";

	$con->query($stmt);

	$con->close();
	?>
<h1 style='font-size:65px;font-family:sans-serif;text-align:center; width:100%; color:#431887;'>OBRIGADO</h1>
<h1 style='font-size:20px;font-family:sans-serif;text-align:center; width:100%; color:#431887;'>Sua opinião é muito importante para nós</h1>
<br><center><img src='logo.jpg' width='220px' alt='prefeitura de mesquita' /><br><br></center>
<h2 style='font-family:sans-serif;text-align:center; color:#431887;'>Equipe de Desenvolvimento da Prefeitura de Municipal de Mesquita</h2>

<style>
body {
		background-color:#fff;}
</style>
<script type="text/javascript">
	setTimeout(function(){
		window.history.back();
	}, 15000);
</script>