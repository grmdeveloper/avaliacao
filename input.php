<?php 

	require"connection.php";
	
	$unidadeid=$_POST['id'];
	$valor=$_POST['avaliacao'];


	
	$stmt = "INSERT INTO avaliacoes (unidadeId, valor) VALUES ('$unidadeid','$valor')";

	$con->query($stmt);

	$con->close();

	echo "<h1 style='text-align:center; width:60%; color:#431887; margin:10% auto;'>".$_POST['motd']."</h1>";
	echo "<br><center><img src='logo.jpg' width='220px' alt='prefeitura de mesquita' /></center>";
	echo "<h2 style='text-align:center; color:#431887;'>Equipe de desenvolvimento da prefeitura de mesquita</h2>";
?>

<script type="text/javascript">
	setTimeout(function(){
		window.history.back();
	}, 15000);
</script>