<?php 


class Admin{


	public function createUnity($nome, $titulo, $motd, $con){
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
	}
	public function deleteUnity($id, $con){

		$stmt= "DELETE FROM avaliacoes WHERE unidadeId = '$id'";
		$con->query($stmt);

		$stmt="DELETE FROM configs WHERE id='$id'";
		$result = $con->query($stmt);

		if($result){
			header("location:".$SITE['root']."admin");
		}
		else{
			echo "A requisição falhou <a onclick='window.history.back()'>voltar</a> <br>";
			echo $con->error;
		}
	}

	public function updateUnity($id, $nome, $titulo, $motd, $con){
		$date =date('Y-m-d G:i:s');
		$con->query("UPDATE configs SET nome='$nome',titulo='$titulo',motd='$motd',updated_at='$date' WHERE id='$id' ");

		header('location:'.$_SERVER['HTTP_REFERER']);
	}

}