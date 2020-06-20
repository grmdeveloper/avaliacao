<?php 


class Unidade {

	protected $id;
	protected $name;
	protected $title;
	protected $motd;
	protected $updated;

	function __construct($id, $con){

		$stmt = "SELECT * FROM configs WHERE id='$id' LIMIT 1";
		$result = $con->query($stmt);

		while($row=$result->fetch_assoc()){
			$this->id=		$row['id'];
			$this->name=	$row['nome'];
			$this->title=	$row['titulo'];
			$this->motd= 	$row['motd'];
			$this->updated = date( 'd/m/y G:i:s',strtotime($row['updated_at']) );

		}
	}

	public function getFirstId($con){
		$stmt = "SELECT id FROM configs LIMIT 1";
		$result = $con->query($stmt);
		while($row = $result->fetch_assoc()){
			$id=		$row['id'];
		}
		return $id;
	}

	public function getAll($con){
		$stmt="SELECT * FROM configs";
		$result=$con->query($stmt);

		$x=0;
		$unidades=array();
		while($row = $result->fetch_assoc()){
			$unidades[$x]=$row;
			$x++;
		}

		return $unidades;
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
	public function getUpdate(){
		return $this->updated;
	}

	public function getAssessments($con){
		$stmt= "SELECT * FROM avaliacoes WHERE unidadeId='$this->id' ";
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
		return Array('great'=>$excelente,'good'=>$bom,'regular'=>$regular,'bad'=>$ruim);

	}


}