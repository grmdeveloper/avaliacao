<?php 



class Unidade {

	public $id;
	public $name;
	public $title;
	public $motd;

	function __construct($id, $con){

		$stmt = "SELECT * FROM configs WHERE id='$id'";
		$result = $con->query($stmt);

		while($row=$result->fetch_assoc()){
			$this->id=		$row['id'];
			$this->name=	$row['nome'];
			$this->title=	$row['titulo'];
			$this->motd= 	$row['motd'];
		}
		$con->close();

	}

	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getTitle(){
		return $this->title;
	}
	public function getMotd(){
		return $this->motd;
	}

}