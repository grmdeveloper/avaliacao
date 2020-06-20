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