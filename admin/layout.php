<?php
	$header="<!DOCTYPE html>
	<html lang='pt-br'>
	<head>
		<title>Painel administrativo - AVALIAÇÕES</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
	<script
	  src='https://code.jquery.com/jquery-3.4.1.min.js'
	  integrity='sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=''
	  crossorigin='anonymous'>
	</script>

	<script type='text/javascript'>

		var showform = function(){
			$('.form-create').fadeIn(400);
		}
		var hideform = function(){
			$('.form-create').fadeOut(400);
		}

		var save = function(){
			let dados = $('#create').serialize();
			$('.save').attr('disabled',true);

			$.ajax({
				type:'POST',
				url:'crud/create.php',
				data:dados,

				success:function(data){
					$('.save').attr('disabled',false);
					alert(data);
					window.location.reload();
				},
				fail:function(data){	
				$('.save').attr('disabled',false);
				alert(data);
				}
			})
		}

		var showdelete = function(){
			$('.delete-screen').fadeIn(400);
		}
		var hidedelete = function(){
			$('.delete-screen').fadeOut(400);
		}

	</script>

	</head><body>";

	$footer="
	</body></html>";
?>

<style type="text/css">
	#menu{
		display:inline-block;
		list-style: none;
	}
	#menu li {
		margin: 0 15px;
		display:inline-block;
	}#menu li:first-child{ margin:0; }
	#menu a {
		text-decoration: none;
		text-transform: none;
		color:black;
	}
</style>