<!DOCTYPE html>
<html lg='pt-br'>
<head>
	<title>Avaliação</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script type="text/javascript">
	doc
</script>
</head>
<body>
	<table class='table table-stripped'>
		<tr>
			<img src="logo.jpg" width='55px' style='margin:10px'>
			<th class='title h2 text-center'>
				Como foi seu atendimento?
			</th>	
		</tr>
			
		<tr>
			<td>
			<form method='post' action='input.php' class='option'>	
				<input type="text" name="avaliacao" hidden value='BOM'>
				<input type='submit' class='btn btn-block' value='BOM' id='bom'>
			</form>
			</td>
		</tr>

		<tr>
			<td>	
			<form method='post' action='input.php'  class='option'>
				<input type="text" name="avaliacao" hidden value='REGULAR'>
				<input type='submit' class='btn btn-block' value='REGULAR' id='regular'>
			</form>
			</td>
		</tr>
		<tr>
			<td>	
			<form method='post' action='input.php' class='option'>	
				<input type="text" name="avaliacao" hidden value='RUIM'>
				<input type='submit' class='btn btn-block' value='RUIM' id='ruim'>
			</form>
			</td>
		</tr>
	</table>
</body>

<style type="text/css">
	.option{
		text-align:center;
		color:white;
	}
	#bom{
		background-color:green;
		color:#eee;
		text-shadow:1px 1px 1px black;
	}	
	#regular{
		background-color:orange;
		color:#eee;
		text-shadow:1px 1px 1px black;
	}	
	#ruim{
		background-color:red;
		color:#eee;
		text-shadow:1px 1px 1px black;
	}
</style>
</html>