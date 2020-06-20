	<table class='table table-stripped w-75' style='margin:auto;'>
		<tr>
			<th class='title h1 text-center' style='color:#a18635;'>
			<img src="assets/logo.jpg" width='120px' style='margin:10px;'>
			<br>
				<?php echo $unidade->getTitle(); ?>
			</th>	
		</tr>

		<tr>
			<td>
			<form method='post' action='assess.php' class='option'>	
				<img src="assets/excelente.png">
				<input type="text" name="motd" value="<?php echo $unidade->getMotd(); ?>" hidden>
				<input type="number" name="id" value="<?php echo $unidade->getId(); ?>" hidden>
				<input type="text" name="avaliacao" hidden value='EXCELENTE'>
				<input type='submit' class='btn' value='EXCELENTE' id='excelente'>
			</form>
			</td>
		</tr>

		<tr>
			<td>
			<form method='post' action='assess.php' class='option'>
				<img src="assets/bom.png">
				<input type="text" name="motd" value="<?php echo $unidade->getMotd(); ?>" hidden>
				<input type="number" name="id" value="<?php echo $unidade->getId(); ?>" hidden>
				<input type="text" name="avaliacao" hidden value='BOM'>
				<input type='submit' class='btn' value='BOM' id='bom'>
			</form>
			</td>
		</tr>

		<tr>
			<td>
			<form method='post' action='assess.php'  class='option'>
				<img src="assets/regular.png">
				<input type="text" name="motd" value="<?php echo $unidade->getMotd(); ?>" hidden>
				<input type="number" name="id" value="<?php echo $unidade->getId(); ?>" hidden>
				<input type="text" name="avaliacao" hidden value='REGULAR'>
				<input type='submit' class='btn' value='REGULAR' id='regular'>
			</form>
			</td>
		</tr>
		
		<tr>
			<td>
			<form method='post' action='assess.php' class='option'>
				<img src="assets/ruim.png">
				<input type="text" name="motd" value="<?php echo $unidade->getMotd(); ?>" hidden>
				<input type="number" name="id" value="<?php echo $unidade->getId(); ?>" hidden>
				<input type="text" name="avaliacao" hidden value='RUIM'>
				<input type='submit' class='btn' value='RUIM' id='ruim'>
			</form>
			</td>
		</tr>
	</table>