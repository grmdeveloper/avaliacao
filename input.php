<?php 

	require"connection.php";
	
	$unidadeid=$_POST['id'];
	$valor=$_POST['avaliacao'];
	$ip=strval($_SERVER["REMOTE_ADDR"]);


	
	$stmt = "INSERT INTO avaliacoes (unidadeId, valor, ip) VALUES ('$unidadeid','$valor','$ip')";

	$con->query($stmt);

	$con->close();

	echo "<div style='text-align:center; width:60%; color:#431887; margin:10% auto;'>".$_POST['motd']."</div>";
	echo "<br><center><img src='logo.jpg' width='220px' alt='prefeitura de mesquita' /></center>";
	echo "<h2 style='text-align:center; color:#431887;'>Equipe de desenvolvimento da prefeitura de mesquita</h2>";
?>

<script type="text/javascript">
	setTimeout(function(){
		window.history.back();
	}, 15000);
</script>