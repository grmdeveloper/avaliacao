<?php 
	require"connection.php";
	if(isset($_GET['u'])){
		header('Content-type:text/html; charset=utf-8');
		$unidadeid = $_GET['u'];
		$stmt = "SELECT * FROM configs WHERE id='$unidadeid'";
		$result = $con->query($stmt);

		while($row=$result->fetch_assoc()){
			$id=		$row['id'];
			$unidade=	$row['nome'];
			$titulo=	$row['titulo'];
			$motd= 		$row['motd'];

		}
	}
	else{
	//	echo "Selecione a unidade que você se encontra";
	}
	$con->close();
?>


<!DOCTYPE html>
<html lg='pt-br'>
<head>
	<title>Avaliação</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<table class='table table-stripped w-75' style='margin:auto;'>
		<tr>
			<th class='title h1 text-center' style='color:#a18635;'>
			<img src="logo.jpg" width='120px' style='margin:10px;'>
			<br>
				<?php echo $titulo; ?>
			</th>	
		</tr>
			
		<tr>
			<td>
			<form method='post' action='input.php' class='option'>	
				<img src="excelente.png">
				<input type="text" name="motd" value="<?php echo $motd; ?>" hidden>
				<input type="number" name="id" value="<?php echo $id; ?>" hidden>
				<input type="text" name="avaliacao" hidden value='EXCELENTE'>
				<input type='submit' class='btn' value='EXCELENTE' id='excelente'>
			</form>
			</td>
		</tr>
			
		<tr>
			<td>
			<form method='post' action='input.php' class='option'>	
				<img src="bom.png">
				<input type="text" name="motd" value="<?php echo $motd; ?>" hidden>
				<input type="number" name="id" value="<?php echo $id; ?>" hidden>
				<input type="text" name="avaliacao" hidden value='BOM'>
				<input type='submit' class='btn' value='BOM' id='bom'>
			</form>
			</td>
		</tr>

		<tr>
			<td>	
			<form method='post' action='input.php'  class='option'>
				<img src="regular.png">
				<input type="text" name="motd" value="<?php echo $motd; ?>" hidden>
				<input type="number" name="id" value="<?php echo $id; ?>" hidden>
				<input type="text" name="avaliacao" hidden value='REGULAR'>
				<input type='submit' class='btn' value='REGULAR' id='regular'>
			</form>
			</td>
		</tr>
		<tr>
			<td>	
			<form method='post' action='input.php' class='option'>	
				<img src="ruim.png">
				<input type="text" name="motd" value="<?php echo $motd; ?>" hidden>
				<input type="number" name="id" value="<?php echo $id; ?>" hidden>
				<input type="text" name="avaliacao" hidden value='RUIM'>
				<input type='submit' class='btn' value='RUIM' id='ruim'>
			</form>
			</td>
		</tr>
	</table>
</body>

<style type="text/css">
	.table{
		align-items:left;
	}
	.option{
		color:white;
		text-align: center;
	}
	#excelente{
		background-color:#431887;
		color:#eee;
		width:300px;
		font-size:21pt;
		text-shadow:1px 1px 1px black;
	}	
	#bom{
		background-color:green;
		color:#eee;
		width:300px;
		font-size:21pt;
		text-shadow:1px 1px 1px black;
	}	
	#regular{
		background-color:orange;
		color:#eee;
		width:300px;
		font-size:21pt;
		text-shadow:1px 1px 1px black;
	}	
	#ruim{
		background-color:red;
		color:#eee;
		width:300px;
		font-size:21pt;
		text-shadow:1px 1px 1px black;
	}
	form img{
		width:60px;
	}
</style>
</html>