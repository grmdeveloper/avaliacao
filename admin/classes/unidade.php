<?php 

function create($nome){	
	$nu= new Unidade($nome);
	$nu->titulo="Como foi seu atendimento na unidade ".$nome."?";
	$nu->motd="Obrigado por usar nosso sistema de avaliação, nos ajudando a melhorar o serviço público prestado!";
}


 class Unidade{
 	public $nome;
 	public $titulo;
 	public $motd;
 	public $options;

 	function __construct ($nome){
 		$this->nome = $nome;
 	}

 	public function setTitle($new){
 		return $this->titulo = $new;
 	}

 	public function getTitle(){
 		return $this->titulo;
 	}

 	public function setMotd($new){
 		return $this->motd = $new;
 	}

 	public function getMotd(){
 		return $this->motd;
 	}

 	public function setOptions($new){
 		return $this->options = $new;
 	}

 	public function getOptions(){
 		return $this->options;
 	}

 }

 ?>