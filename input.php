<?php 

	$valor=$_POST['avaliacao'];
	require"connection.php";

	
	$stmt = "INSERT INTO avaliacoes (avaliacao) VALUES ('$valor')";

	$con->query($stmt);

	$con->close();

	echo "<h2 style='text-align:center;margin-top:10%;'>Obrigado por usar nosso sistema de avaliação!</h2>";
	echo "<br><center><img src='logo.jpg' width='200px' alt='prefeitura de mesquita' /></center>";
?>

<script type="text/javascript">
	setTimeout(function(){
		window.history.back();
	}, 15000);
</script>