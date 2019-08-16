<?php 

require "../connection.php";


	$stmt="CREATE TABLE IF NOT EXISTS configs (
	id INT PRIMARY KEY AUTO_INCREMENT, 
	nome VARCHAR(255) NOT NULL UNIQUE, 
	titulo text NOT NULL, 
	motd text,
	updated_at timestamp DEFAULT current_timestamp)";
	
	$result=$con->query($stmt);
	
	if($result){
		echo "Tabela criada com sucesso <br>";
		$stmt = "INSERT INTO configs (nome,titulo,motd) VALUES ('Prefeitura','Como foi seu atendimento?','Obrigado por utilizar nosso sistema, sua opniao e importante para nos')";
		$result = $con->query($stmt);
		if($result){
			echo "Seed inserida com sucesso";
		}	else echo "Erro ao inserir Seed";
	} 	else echo "Erro ao criar tabela ";


	$stmt="CREATE TABLE IF NOT EXISTS avaliacoes(
	id int PRIMARY KEY AUTO_INCREMENT,
	unidadeId int,
	valor enum('EXCELENTE','BOM','REGULAR','RUIM'),
	ip varchar(50),
	updated_at timestamp DEFAULT current_timestamp,
	CONSTRAINT fk_unidadeId FOREIGN KEY(unidadeId) REFERENCES configs(id)
	)";
	
	$result=$con->query($stmt);
	
	if($result){
		echo "Tabela criada com sucesso <br>";
	}else echo "Erro ao criar tabela ";
	

	$con->close();
?>