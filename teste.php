<?php 
require "connection.php";

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
echo $bom;
 ?>