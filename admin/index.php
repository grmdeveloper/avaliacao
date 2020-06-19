<?php 

//ini_set('display_errors',1);

require"../connection.php";
require"../config.php";

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
if(isset($_POST['password']) ){
	$_SESSION['password']=$_POST['password'];
}

if($_SESSION['password']!=$SITE['password']){
	$content="
	<div class='text-center'>
		<img src='../assets/logo.jpg' width='100px'>
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
elseif($_SESSION['password'] == $SITE['password']){
	$content="

	<div id='menu'>
		<img src='../assets/logo.jpg' width='50px' style='margin-left:4%;'>
		<ul>
			<li><a href='index.php'> Dashboard </a></li>
			<li style='position:absolute; right:25px;'><a href='logout.php'>Sair</a></li>
		</ul>
	</div>

	<h3 class='alert h4 text-center' style='text-indent:100px; color:white; text-shadow:1px 1px 1px black; text-indent:25px;'>	 Dashboard	</h3>";
	$content.="
	<div class='d-inline-flex justify-content-center'>
	<div class='card w-50 text-center'>
		<div class='card-header'>
			<h5 class='card-title h5'>Opções Gerais</h5>
		</div>

		<div class='card-body '>
			<form action='api/update.php' method='post'>
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
	<div class='card' style='min-width:300px'>
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
			<a href='http://".$SITE['root']."?u=".$id."' 
			target='_BLANK' class='badge'>Página de avaliação</a></div>

			<div class='badge'>Atualizado em: ".$updated."</div>
		</div>

	</div>";



	// CARD START
	$content.="
	<div class='card' style='min-width:240px; max-width:280px;'>
		<div class='card-header'>
			<h5 class='card-title h5'>Selecionar unidade</h5>
		</div>
		<div class='card-body'  style='max-height:280px; overflow-y:scroll;'>
		";
	foreach($unidades as $unidade){
		$content.="<a class='btn btn-warning btn-block' href='?u=".$unidade['id']."'>".$unidade['nome']."</a>";
	}

	$content.="
		</div>";

	$content.="
	</div>";
	//CARD END


	//END FLEXBOX----
	$content.="	</div>";
	//END FLEXBOX----



	//OPÇẼS CRIAR DELETAR UNIDADE
	$content.="
		<div style='margin:15px auto; display:block; width:50%;'>
			<div class='btn-group w-100'>
				<button class='btn btn-success btn-group-item' onclick='showform()'>Cadatrar nova unidade</button>
				<button class='btn btn-danger btn-group-item' onclick='showdelete()'>Deletar unidade existente</button>
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
					<input type='text' name='motd' class='form-control' value='Obrigado por usar nosso sistema, sua opnião é importante para nós'/>
				</label>
				</form>

				<button class='btn btn-success btn-block save' onclick='save()'>Salvar</button>
			</div>
		</div>
	";

	
	// Start DELETE CARD LIST 
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
		$content.="
		<form action='api/delete.php' method='post'>
			<input class='btn btn-danger btn-block' 
			name='nome'
			value='".$unidade['nome']."'
			type='submit'></a>

			<input hidden
			name='id'
			value='".$unidade['id']."'
			type='number'></a>
		</form>
		";
	}
	$content.="
		</div>
	</div>";
	//END DELETE CARD List
}


echo $header;
echo $content;
echo $footer;
	
?>