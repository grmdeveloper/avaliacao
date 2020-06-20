	
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

			success:(data)=>{
				let dados = JSON.parse(data);
				$('.save').attr('disabled',false);
				console.log(dados);
				$('#alert').html(dados.message);
				$('#unities-card-body').append(dados.child);
				hideform();

			},
			fail:(data)=>{	
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