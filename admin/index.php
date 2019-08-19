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
	$updated = 	date( 'd/m/y G:i:s',strtotime($row['updated_at']) );
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

	<div>
		<img src='../logo.jpg' width='50px' style='margin-left:4%;'>
		<ul id='menu'>
			<li><a href='index.php'>Dashboard</a></li>
			<li><a href='logout.php'>Sair</a></li>
		</ul>
	</div>

	<h3 class='alert alert-primary h4 text-center' style='text-indent:100px; color:white; text-shadow:1px 1px 1px black; text-indent:25px;'>
	 Dashboard
	</h3>";
	$content.="
	<div class='d-inline-flex justify-content-center'>
	<div class='card w-50 text-center'>
		<div class='card-header'>
			<h5 class='card-title h5'>Opções Gerais</h5>
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

	$content.="
	<div class='card'>
		<div class='card-header'>
			<h5 class='card-title h5'>Informações</h5>
		</div>
		<div class='card-body'>

			<p>Avaliações</p>
			<span class='badge badge-success w-50 text-left'>Excelente </span>
			<span class='badge badge-success'>"		.$excelente." 		</span><br>
			<span class='badge badge-primary w-50 text-left'>Bom  </span>
			<span class='badge badge-primary'>"		.$bom."			</span><br>
			<span class='badge badge-warning w-50 text-left'>Regular </span>
			<span class='badge badge-warning'>"		.$regular."  </span><br>
			<span class='badge badge-danger w-50 text-left'>Ruim  </span>
			<span class='badge badge-danger'>"		.$ruim."	 	</span><br>
			<br>
			<span class='badge'>ID ".$id."</span>
			<div><b class='badge'>endereço</b> 
			<br>
			<a href='http://".$_SERVER['HTTP_HOST']."/avaliacao/?u=".$id."' 
			target='_BLANK' class='badge'>Página de avaliação</a></div>

			<div class='badge'>Atualizado em: ".$updated."</div>
		</div>

	</div>";


	$content.="
	<div class='card'>
		<div class='card-header'>
			<h5 class='card-title h5'>Unidades no sistema</h5>
		</div>
		<div class='card-body'>
		";
	foreach($unidades as $unidade){
		$content.="<a class='btn btn-dark btn-block' href='?u=".$unidade['id']."'>".$unidade['nome']."</a>";
	}

	$content.="
		</div>";

	$content.="
	</div>";

	$content.="
		<div class='card'>
			<div class='card-header'>
				<h5 class='h5'>CRUD</h5>
			</div>
			<div class='card-body'>
				<button class='btn btn-primary btn-block' onclick='showform()'>Nova Unidade</button>
				<button class='btn btn-danger btn-block' onclick='showdelete()'>Deletar Unidade</button>
			</div>
		</div>";


	$content.="
		<div class='card w-50 form-create' style='position:absolute; z-index:3; top:25%; left:25%; display:none;'>
			<div class='card-header'>
				<h5 class='h5'>Criar  
					<a class='badge badge-danger' href='#' style='float:right;' onclick='hideform()'> X </a>
				</h5>
			</div>
			<div class='card-body'>
				<form id='create'>
				<label class='w-100'>
					Nome da unidade
					<input type='text' name='nome' class='form-control'/>
				</label>		
				<label class='w-100'>
					Título do totem
					<input type='text' name='titulo' class='form-control' value='Como foi seu atendimento na unidade ?'/>
				</label>		
				<label class='w-100'>
					Mensagem de agradecimento
					<input type='text' name='motd' class='form-control' value='<h1>Obrigado</h1> por usar nosso sistema, sua opnião é importante para nós'/>
				</label>
				</form>

				<button class='btn btn-success btn-block save' onclick='save()'>Salvar</button>
			</div>
		</div>
	";


	$content.="
	<div class='card w-50 delete-screen' style='position:absolute; z-index:2; top:25%; left:25%; display:none;'>
		<div class='card-header'>
			<h5 class='alert alert-danger h5'>DELETAR unidade
			<a class='badge badge-danger' href='#' style='float:right;' onclick='hidedelete()'>X</a>
			</h5>
		</div>
		<div class='card-body'>
	";

	foreach($unidades as $unidade){
		$content.="<a class='btn btn-danger btn-block' href='crud/delete.php?id=".$unidade['id']."'>".
		$unidade['nome']."</a>";
	}

	$content.="
		</div>";

	$content.="
	</div>";

}


echo $header;
echo $content;
echo $footer;
	
?>