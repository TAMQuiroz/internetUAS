var cantidadPreguntas = parseInt($('#total_preg').html());
var puntaje_acumulado = parseFloat($('#total_puntaje').html());
var tiempo_acumulado = parseInt($('#total_tiempo').html());
var row_id = 0;
var tempPuntaje = 0;

$(document).ready(function($) {

	var form = $('#form-search-question');

	//Datepickers
	$(".input-group.date").datepicker({
		    format: "yyyy-mm-dd",
		    startDate: "today", 
		    language: "es",
		    autoclose: true,
		    todayHighlight: true
		 });	
	// $('.input-group.date').datepicker('setDate',"");

	

	$('#search-question').on('click', function() {			
		var data = form.serialize();
		$.post(form.attr('action'), data, function(table) {
			$('#table-question').html(table);
		});
	});

		//cada vez que se elimine una pregunta
		$('#actual-questions').on('click', '.delete-prof', function() {			
			//actualizo el puntaje acumulado
			puntaje_acumulado -=  parseFloat($(this).parent().parent().find('.puntaje').text());

			//actualizo el tiempo acumulado
			tiempo_acumulado -=  parseInt($(this).parent().parent().find('.tiempo').text());

			//quito la fila
			$(this).parent().parent().remove();
			cantidadPreguntas--;

			//se deshabilita el boton de guardar si ya no hay preguntas
			if(cantidadPreguntas == 0 ){
				$('#submit').attr("disabled","disabled");
			}

			//reorganizar los numeros
			var init = 0;
			$('#actual-questions').find('.order').each(function(){
				init++;				
				$(this).html(init);				
			});	

			//actualizo la cantidad de preguntas
			$('#total_preg').html(cantidadPreguntas);
			$('#total_puntaje').html(puntaje_acumulado);
			$('#total_tiempo').html(tiempo_acumulado);
		});


		//delegador para obtener el codigo de competencia y el puntaje de la pregunta
		$("#actual-questions").on('click',".editbtn", function(){			
			var tr = $(this).parent().parent();//chapo el tr
			var puntaje = tr.find('.puntaje').text();
			tempPuntaje = parseFloat(puntaje);//variable auxiliar para calcular el puntaje acumulado luego
			var idCompetence = tr.find('td .id_competence').val();		
			var idEvaluator = tr.find('td .row_evaluador').val();		
			row_id = tr.attr("id");			
			$.get('/evaluaciones/preguntas/editQuestion',{id_competence:idCompetence,id_evaluator:idEvaluator},function(data){
		    	$('#datosPregunta').empty();//vacio los datos
		    	$('#datosPregunta').append(data);	 //mete un select con los evaluadores
		    	$('#datosPregunta').append('<div class="form-group"><label class="control-label col-md-4">Puntaje: </label><div class="col-md-6"> <input id="input_puntaje" class="form-control" onkeypress="return validateFloatKeyPress(this,event);" maxlength="5" type="text" name="puntaje" value="'+tempPuntaje+'">   </div>    </div>');
		    	// $('#modal-editar-pregunta').modal('show');//muestro el modal
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
	    // $('#modal-buscar-banco-preguntas').modal('hide');//oculto todo el modal
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

			if(!esrepetido){//si no esta repetida
				cantidadPreguntas++;

				//actualizo el puntaje acumulado
				puntaje_acumulado +=  parseFloat(tr.find('.puntaje').text());

				//actualizo el tiempo acumulado
				tiempo_acumulado +=  parseInt(tr.find('.tiempo').text());

				tr.prepend('<td class="centered order">'+cantidadPreguntas+'</td>');
				tr.find('td:last').remove();//quito el checkbox
				tr.find('.oculto').removeAttr( "hidden" );
				tr.append('<td class="centered" ><a href="#modal-editar-pregunta" class="editbtn btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a><a class="btn btn-danger btn-xs delete-prof"><i class="fa fa-remove"></i></a></td>');

				$('#actual-questions').find('tbody').append(tr);

				//se habilita el boton de guardar
				if(cantidadPreguntas > 0 ){
					$('#submit').removeAttr("disabled");
				}
			}

		});

		//actualizo la cantidad de preguntas
		$('#total_preg').html(cantidadPreguntas);
		$('#total_puntaje').html(puntaje_acumulado);
		$('#total_tiempo').html(tiempo_acumulado);
	}

	function guardarCambios(){  
		if(cambiosvalidos()){
			$('#modal-editar-pregunta').modal('hide');//oculto el modal
			var id_evaluador = $("#select_evaluador").val();
			var evaluador = $("#select_evaluador option:selected").html();
			var puntaje = parseFloat($("#input_puntaje").val());


			$('#'+row_id+' .puntaje').html(puntaje);//cambio el puntaje en la fila
			$('#'+row_id+' td .row_puntaje').val(puntaje);//cambio el puntaje en el input en la fila

			$('#'+row_id+' .responsable').html(evaluador);//cambio el nombre del evaluador en la fila
			$('#'+row_id+' td .row_evaluador').val(id_evaluador);//cambio el codigo del evaluador en el input en la fila		

			//actualizo el puntaje acumulado
			puntaje_acumulado -=  tempPuntaje;
			puntaje_acumulado += puntaje; //agrego el nuevo puntaje

			$('#total_puntaje').html(puntaje_acumulado);	
		}
		
	}

	function cambiosvalidos(){
		var n = $("#input_puntaje").val();
		if( (Number(n) == NaN) || (n=="") || (n <= 0) ||  (n > 100) || (!Number.isInteger(n*100))  )  {
			return false;
		}		
		return true;
	}


	function validateFloatKeyPress(el, evt) {
	    var charCode = (evt.which) ? evt.which : event.keyCode;
	    var number = el.value.split('.');
	    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    //just one dot (thanks ddlab)
	    if(number.length>1 && charCode == 46){
	         return false;
	    }
	    //get the carat position
	    var caratPos = getSelectionStart(el);
	    var dotPos = el.value.indexOf(".");
	    if( caratPos > dotPos && dotPos>-1 && (number[1].length > 1)){
	        return false;
	    }
	    return true;
	}

	//thanks: http://javascript.nwbox.com/cursor_position/
	function getSelectionStart(o) {
	    if (o.createTextRange) {
	        var r = document.selection.createRange().duplicate()
	        r.moveEnd('character', o.value.length)
	        if (r.text == '') return o.value.length
	        return o.value.lastIndexOf(r.text)
	    } else return o.selectionStart
	}