<?php 

require"connection.php";

$stmt= "SELECT * FROM configs WHERE id=1 ";
$result= $con->query($stmt);

while( $row = $result->fetch_assoc() ){
	$id=		$row['id'];
	$unidade=	$row['nome'];
	$titulo= 	$row['titulo'];
	$motd=		$row['motd'];
}

$stmt= "SELECT * FROM avaliacoes WHERE unidadeId=1";
$result= $con->query($stmt);

$excelente=0;$bom=0;$regular=0;$ruim=0;

while( $row = $result->fetch_assoc() ){
	if($row['valor']=='EXCELENTE')
		$excelente++;
	if($row['valor']=='BOM')
		$bom++;
	if($row['valor']=='REGULAR')
		$regular++;	
	if($row['valor']=='RUIM')
		$ruim++;
	
} 

$con->close();

header("Content-type:text/html; charset=utf-8");

require"layout.php";
$content="
<div class='flex'>
<h3 class='jumbotron h3'>Dashboard</h3>";
$content.="
<div class='card w-50 text-center align-self-center'>
	<div class='card-header'>
		<h4 class='card-title'>Opções Gerais</h4>
	</div>

	<div class='card-body '>
		<form action='save.php' method='post'>
		<input type='number' name='id' value='".$id."' hidden>
			
			<label class='w-75'>
				<h5 class='h5 badge'>
				Nome da Unidade
				</h5>
					<input name='unidade' type='text' class='form-control' value='".$unidade."'>			
			</label>			

			<label class='w-75'>
				<h5 class='h5 badge'>
				Título da avaliação
				</h5>
					<input name='titulo' class='form-control' value='".$titulo."'>			
			</label>
			
			<label class='w-75'>
				<h5 class='h5 badge'>
				Mensagem de agradecimento
				</h5>
					<input name='motd' class='form-control' value='".$motd."'>
			</label>

			<input type='submit' value='salvar' class='btn btn-block btn-primary'>
		</form>
	</div>
</div>
";

$content.="<div class='card w-25'>
<div class='card-header'>
	<h3 class='h3 card-title'>Informações</h3>
</div>
<div class='card-body'>
	<div>
		<h5>Avaliações</h5>
		<span class='badge'>Excelente ".$excelente." </span>
		<span class='badge'>Bom ".$bom." </span>
		<span class='badge'>Regular ".$regular." </span>
		<span class='badge'>Ruim ".$ruim." </span>

	</div>
</div>
";

$content.="</div>";
echo $header;
echo $content;
echo $footer;

include "classes/unidade.php";
?>
