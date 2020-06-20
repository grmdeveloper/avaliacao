<?php 

require "../../connection.php";

$nome = 	trim($_POST['nome']);
$titulo = 	trim($_POST['titulo']);
$motd = 	trim($_POST['motd']);

$stmt="INSERT INTO configs (nome,titulo,motd) VALUES ('$nome','$titulo','$motd')";
$result = $con->query($stmt);
$id = $con->insert_id;

if($result){
	echo json_encode([
		'message'=>'Unidade cadastrada com sucesso!',
		'child'=>"<a class='btn btn-warning btn-block' href='?u=".$id."'>".$nome."</a>"
	]);
}

else{
	echo json_encode(['message'=>"Erro ao cadastrar"]);
}

?>