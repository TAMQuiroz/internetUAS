var cantidadPreguntas = 0;
$(document).ready(function($) {
		var form = $('#form-search-question');

		$('#search-question').on('click', function() {			
			var data = form.serialize();
			$.post(form.attr('action'), data, function(table) {
				$('#table-question').html(table);
			});
		});

		$('#actual-questions').on('click', '.delete-prof', function() {
			$(this).parent().parent().remove();
			cantidadPreguntas--;

			//reorganizar los numeros
			var init = 0;
			$('#actual-questions').find('.order').each(function(){
				init++;				
				$(this).html(init);				
			});	
		});




		//para pedir los evaluadores de una pregunta
		var form = $('#form-search-question');

		$('.edit_question').on('click', function() {	

			var data = form.serialize();

			$.post('preguntas/editEv', data, function(formulario) {
				$('#cuerpo').html(formulario);
			});
		});
});


	function selectQuestions(){  
	    $('#modal-buscar-banco-preguntas').modal('hide');//oculto todo el modal
	    var questions = $('.questions_selected:checked');//saco las filas con check    
	    fillTable(questions);
	}

	function fillTable(questions) {
		questions.each(function(index, input) {//para cada fila que tenga checkbox			
			var tr = $(input).parent().parent();//chapo el elemento tr
			var codigo = tr.find('.id').text();
			var esrepetido = false;

			//funcion para ver si la pregunta ya esta en la lista
			$('#actual-questions').find('.id').each(function(){
				var id= $(this).text();
				if( id == codigo){
					esrepetido = true;
				}				
			});	


			if(!esrepetido){
				cantidadPreguntas++;
				tr.prepend('<td class="order">'+cantidadPreguntas+'</td>');
				tr.find('td:last').remove();//quito el checkbox
				tr.find('.oculto').removeAttr( "hidden" );
				tr.append('<td><a href="{{ route("pregunta.editar") }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a><a class="btn btn-danger btn-xs delete-prof"><i class="fa fa-remove"></i></a></td>');

				$('#actual-questions').find('tbody').append(tr);
			}

		});
	}

