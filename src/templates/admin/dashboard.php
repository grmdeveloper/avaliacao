<?php 

	//TOP-MENU
	$content="

	<div id='menu'>
		<img src='../assets/logo.jpg' width='50px' style='margin-left:4%;'>
		<ul>
			<li><a href='index.php'> Dashboard </a></li>
			<li style='position:absolute; right:25px;'>
			<a href='".$SITE['root']."admin/index.php?logout=1'>Sair</a></li>
		</ul>
	</div>
	<h3 class='alert h4 text-center' style='text-indent:100px; color:white; text-shadow:1px 1px 1px black; text-indent:25px;'>	 Dashboard	</h3>

	<div class='d-inline-flex justify-content-center'>
	";

	//FLEXBOX START
	$content.="
	<div class='card w-50 text-center'>
		<div class='card-header'>
			<h5 class='card-title h5'>Configurações Gerais</h5>
		</div>
		<div class='card-body '>
			<form action='api/update.php' method='post'>

			<input name='update' hidden>
			<input type='number' name='id' value='".$id."' hidden>
				
				<label class='w-75'>
					<h5 class='h5 badge'>
					Nome da Unidade
					</h5>
						<input name='unidade' type='text' class='form-control' value='".$nome."'>			
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
	
	<div class='card' style='min-width:300px'>
		<div class='card-header'>
			<h5 class='card-title h5'>Informações</h5>
		</div>
		<div class='card-body'>

			<p>Avaliações</p>
			<span class='badge badge-success w-50 text-left'>Excelente </span>
			<span class='badge badge-success'>"		.$assessments['great']." 		</span><br>
			<span class='badge badge-primary w-50 text-left'>Bom  </span>
			<span class='badge badge-primary'>"		.$assessments['good']."			</span><br>
			<span class='badge badge-warning w-50 text-left'>Regular </span>
			<span class='badge badge-warning'>"		.$assessments['regular']."  </span><br>
			<span class='badge badge-danger w-50 text-left'>Ruim  </span>
			<span class='badge badge-danger'>"		.$assessments['bad']."	 	</span><br>
			<br>

			<div>
			<br>
			<a href='http://".$SITE['root']."?u=".$id."' 
			target='_BLANK' class='badge'>Página de avaliação</a></div>

			<div class='badge'>Atualizado em: ".$updated."</div>
		</div>

	</div>
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


	//FLEXBOX ENDS----
	$content.="	</div>";
	//FLEXBOX ENDS----


	//CRUD OPTIONS
	$content.="
		<div style='margin:15px auto; display:block; width:50%;'>
			<div class='btn-group w-100'>
				<button class='btn btn-success btn-group-item' onclick='showform()'>Cadatrar nova unidade</button>
				<button class='btn btn-danger btn-group-item' onclick='showdelete()'>Deletar unidade existente</button>
			</div>
		</div>";

	//CREATE UNITY FORM
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
				<button class='btn btn-success btn-block' onclick='save()'> Salvar <button/>

			</div>
		</div>
	";

	// DELETE CARDs LIST 
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
	</div>
	</body>";
	//END DELETE CARDs List
