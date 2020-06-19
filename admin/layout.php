<?php
	$header="<!DOCTYPE html>
	<html lang='pt-br'>
	<head>
		<title>Painel administrativo - AVALIAÇÕES</title>
		<meta charset='utf-8'>
		<link rel='stylesheet' type='text/css' href='../node_modules/bootstrap/dist/css/bootstrap.min.css'>
		<script type='text/javascript' src='../node_modules/bootstrap/dist/js/bootstrap.min.js'></script>
		<link href='css/style.css' rel='stylesheet' type='text/css'>
		<script type='text/javascript' src='../node_modules/jquery/dist/jquery.js' > </script>

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
				url:'api/create.php',
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
