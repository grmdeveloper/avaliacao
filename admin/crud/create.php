<?php 

require "connection.php";

$nome = 	trim($_POST['nome']);
$titulo = 	trim($_POST['titulo']);
$titulo = 	trim($_POST['titulo']);
$motd = 	trim($_POST['motd']);

$stmt="INSERT INTO configs (nome,titulo,motd) VALUES ('$nome','$titulo','$motd')";

$result = $con->query($stmt);

if($result){
	echo "Unidade cadastrada com sucesso";
	header("refresh:3");
}

else{
	echo "Erro ao cadastrar";
	header("refresh:3;");	
}

?>