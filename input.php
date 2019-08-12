<?php 

	$valor=$_POST['avaliacao'];
	require"connection.php";

	
	$stmt = "INSERT INTO avaliacoes (valor) VALUES ('$valor')";

	$con->query($stmt);

	$con->close();

	echo "<h1 style='text-align:center; width:60%; color:#431887; margin:10% auto;'>Obrigado por usar nosso sistema de avaliação, nos ajudando a melhorar o serviço público prestado!</h1>";
	echo "<br><center><img src='logo.jpg' width='220px' alt='prefeitura de mesquita' /></center>";
	echo "<h2 style='text-align:center; color:#431887;'>Equipe de desenvolvimento da prefeitura de mesquita</h2>";
?>

<script type="text/javascript">
	setTimeout(function(){
		window.history.back();
	}, 15000);
</script>