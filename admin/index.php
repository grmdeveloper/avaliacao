<?php 




echo "<link href='css/style.css' type='text/css'> ";
require"connection.php";
if(isset($_GET['u']))
	$uSelected = $_GET['u'];
else $uSelected = 1;

$stmt="SELECT * FROM configs";
$result=$con->query($stmt);

$x=0;
$unidades=array();
while($row = $result->fetch_assoc()){
	$unidades[$x]=$row;
	$x++;
}

$stmt= "SELECT * FROM configs WHERE id='$uSelected' ";
$result= $con->query($stmt);

while( $row = $result->fetch_assoc() ){
	$id=		$row['id'];
	$unidade=	$row['nome'];
	$titulo= 	$row['titulo'];
	$motd=		$row['motd'];
}

$stmt= "SELECT * FROM avaliacoes WHERE unidadeId='$uSelected' ";
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

session_start();
if(isset($_POST['password'])){
	$_SESSION['password']=$_POST['password'];
}

if($_SESSION['password']!="tec_mes1234"){
	$content="
	<div class='text-center'>
		<img src='../logo.jpg' width='100px'>
		<div class='card w-25' style='margin:10px auto; border:1px solid #402010;'>
			<div class='card-header h4'>
				Login
			</div>

				<div class='card-body'>
					<form method='post'>
					<label>
						Senha
						<input type='password' name='password' class='form-control'>
					</label>
					<input type='submit' class='btn btn-warning'>
					</form>
				
				</div>
		</div>
	</div>
	";
}
elseif($_SESSION['password'] == "tec_mes1234"){
$content="
<img src='../logo.jpg' width='100px' style='margin-left:47%;'>
<h3 class='alert alert-primary h4 text-center' style='text-indent:100px; color:white; text-shadow:1px 1px 1px black; text-indent:25px;'>
 Dashboard
</h3>";
$content.="
<div class='d-inline-flex justify-content-center'>
<div class='card w-50 text-center'>
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
	<h4 class='h4 card-title'>Informações</h4>
</div>
<div class='card-body'>
	<div>
		<p>Avaliações</p>
		<span class='badge badge-success w-50 text-left'>Excelente </span>
		<span class='badge badge-success'>"		.$excelente." 		</span><br>
		<span class='badge badge-primary w-50 text-left'>Bom  </span>
		<span class='badge badge-primary'>"		.$bom."			</span><br>
		<span class='badge badge-warning w-50 text-left'>Regular </span>
		<span class='badge badge-warning'>"		.$regular."  </span><br>
		<span class='badge badge-danger w-50 text-left'>Ruim  </span>
		<span class='badge badge-danger'>"		.$ruim."	 	</span><br>

	</div>
</div>
";




	$content.="
	<div class='card'>
		<div class='card-header'>
			<h4 class='card-title h4'>Unidades no sistema</h4>
		</div>
		<div class='card-body'>
		";
	foreach($unidades as $unidade){
		$content.="<a class='btn btn-warning btn-block' href='?u=".$unidade['id']."'>".$unidade['nome']."</a>";
	}

	$content.="
		</div>";

	$content.="</div>";
}
echo $header;
echo $content;
echo $footer;


?>

