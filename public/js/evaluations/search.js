var cantidadPreguntas = 0;
var row_id = 0;
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

			//se deshabilita el boton de guardar
			if(cantidadPreguntas == 0 ){
				$('#submit').attr("disabled","disabled");
			}

			//reorganizar los numeros
			var init = 0;
			$('#actual-questions').find('.order').each(function(){
				init++;				
				$(this).html(init);				
			});	
		});


		//delegador para obtener el codigo de competencia y el puntaje de la pregunta
		$("#actual-questions").on('click',".editbtn", function(){
			var tr = $(this).parent().parent();//chapo el tr
			var puntaje = tr.find('.puntaje').text();
			var idCompetence = tr.find('td .id_competence').val();		
			row_id = tr.attr("id");			
			$.get('/evaluaciones/preguntas/editQuestion',{id_competence:idCompetence},function(data){
		    	$('#datosPregunta').empty();//vacio los datos
		    	$('#datosPregunta').append(data);	 //mete un select con los evaluadores
		    	$('#datosPregunta').append('<div class="form-group"><label class="control-label col-md-4">Puntaje: </label><div class="col-md-6"> <input id="input_puntaje" class="form-control" type="number" name="puntaje" value="1">   </div>    </div>');
		    	$('#modal-editar-pregunta').modal('show');//muestro el modal
	    	});

		});



		//evento para mostrar los alumnos de la especialidad
		$('input[type=radio][name=alumnos]').change(function() {
			if (this.value == 'todos') {
				$("#alumnosEspecialidad").hide();
			}
			else if (this.value == 'algunos') {
				$("#alumnosEspecialidad").show();
			}
		});

		//evento para validar las fechas
		// $('#fecha_fin').bind('input', function() {
		// 	if($('#fecha_inicio').val()!=""){
		// 		if($('#fecha_inicio').val() >  $('#fecha_fin').val() ){
		// 			$('#submit').attr("disabled","disabled");
		// 		}
		// 	}
		// });
		// //evento para validar las fechas
		// $('#fecha_inicio').bind('input', function() {
		// 	if($('#fecha_fin').val()!=""){
		// 		if($('#fecha_inicio').val() >  $('#fecha_fin').val() ){
		// 			$('#submit').attr("disabled","disabled");	
		// 		}
		// 	}
		// });



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
				tr.append('<td><a class="editbtn btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a><a class="btn btn-danger btn-xs delete-prof"><i class="fa fa-remove"></i></a></td>');

				$('#actual-questions').find('tbody').append(tr);

				//se habilita el boton de guardar
				if(cantidadPreguntas > 0 ){
					$('#submit').removeAttr("disabled");
				}
			}

		});
	}

	function guardarCambios(){  
		$('#modal-editar-pregunta').modal('hide');//oculto el modal
		var id_evaluador = $("#select_evaluador").val();
		var evaluador = $("#select_evaluador option:selected").html();
		var puntaje = $("#input_puntaje").val();

		$('#'+row_id+' .puntaje').html(puntaje);//cambio el puntaje en la fila
		$('#'+row_id+' td .row_puntaje').val(puntaje);//cambio el puntaje en el input en la fila

		$('#'+row_id+' .responsable').html(evaluador);//cambio el nombre del evaluador en la fila
		$('#'+row_id+' td .row_evaluador').val(id_evaluador);//cambio el codigo del evaluador en el input en la fila		
	}