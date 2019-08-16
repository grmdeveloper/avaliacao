<?php 

	header('Content-type:text/html; charset=utf-8');
	clearstatcache();
	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
	header("Pragma: no-cache"); // HTTP 1.0.
	header("Expires: 0"); // Proxies.

	require"connection.php";

	if(isset($_GET['u']))
		$unidadeid = $_GET['u'];
	else $unidadeid = 1;


	$stmt = "SELECT * FROM configs WHERE id='$unidadeid'";
	$result = $con->query($stmt);

	while($row=$result->fetch_assoc()){
		$id=		$row['id'];
		$unidade=	$row['nome'];
		$titulo=	$row['titulo'];
		$motd= 		$row['motd'];
	}
	$con->close();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Avaliação</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
	body {
		background-color:#fff;
	}
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
