@extends('app')
@section('content')
<style type="text/css">
	input { 
    text-align: center; 
}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Nueva pregunta</h3>
			</div>	        
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Información</h3>
			</div>			
			<div class="panel-body">
				{{Form::open(['route' => 'pregunta.store', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
				<div class="form-group">
					{{Form::label('Pregunta: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-10 col-sm-10 col-xs-6">
						{{Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Escriba el contenido de la pregunta','rows'=>'4', 'required', 'maxlength' => 1000])}}
					</div>
				</div>
				<div class="form-group">
					{{Form::label('Competencia: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-10 col-sm-10 col-xs-6">
						<select name="competencia" required="required" class="form-control">
							<option value="">Seleccione</option>
							@foreach($competences as $competence)
							@if(in_array($competence->id, $arrcompetences))
							<option value="{{$competence->id}}" >{{$competence->nombre}}</option>
							@endif
							@endforeach	
						</select>						
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Tiempo estimado:*',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-2 col-sm-3 col-xs-6">
						<div class="input-group">							
							<input name="tiempo" required="required" type="number" min="1" max="200" class="form-control" aria-describedby="basic-addon1">
							<span class="input-group-addon" id="basic-addon1">minutos</span>
						</div>
					</div>

					{{Form::label('Puntaje: *',null,['class'=>'control-label col-md-2 col-sm-1 col-xs-6'])}}
					<div class="col-md-2 col-sm-3 col-xs-6">
						<div class="input-group">							
							<input name="puntaje" required="required" type="text" maxlength="5" class="form-control" aria-describedby="basic-addon1" onkeypress="return validateFloatKeyPress(this,event);" >
							<span class="input-group-addon" id="basic-addon1">puntos</span>
						</div>						
					</div>

					{{Form::label('Dificultad: *',null,['class'=>'control-label col-md-2 col-sm-1 col-xs-6'])}}
					<div class="col-md-2 col-sm-2 col-xs-6">
						<select name="dificultad" class="form-control" required="required">
							<option value="">Seleccione</option>
							<option value="1">Baja</option>
							<option value="2">Media</option>
							<option value="3">Alta</option>							
						</select>						
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Requisitos: ',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-10 col-sm-10 col-xs-6">
						{{Form::textarea('requisitos',null,['class'=>'form-control','rows'=>'2','placeholder'=>'Escriba requisitos que tenga la pregunta para ser resuelta', 'maxlength' => 1000])}}
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="form-group">
							{{Form::label('Tipo: *',null,['class'=>'control-label col-md-6 col-sm-6 col-xs-6'])}}
							<div class="col-md-6 col-sm-6 col-xs-6">						
								<div class="radio">									
									<label><input type="radio" value="2" name="tipo" checked > Abierta </label>
									<i class="fa fa-pencil-square-o fa-2x" title="Abierta" aria-hidden="true"></i>
								</div>
								<div class="radio">
									<label><input type="radio" value="3" name="tipo">Archivo </label>
									<i class="fa fa-file fa-2x" title="Archivo" aria-hidden="true"></i>
								</div>
								<div class="radio">
									<label><input type="radio" value="1" name="tipo" >Cerrada </label>
									<i class="fa fa-list-ul fa-2x" title="Cerrada" aria-hidden="true"></i>
								</div>						
							</div>
						</div>
					</div>

					<div id="form-archivo" hidden="true" class="col-md-8 col-sm-8 col-xs-12">
						<div class="form-group">							
							{{Form::label('Extensión: *',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
							<div class="col-md-4 col-sm-4 col-xs-6">
								{{Form::text('extension',null,['class'=>'form-control tArch','readonly'=>'true','placeholder'=>'p.e. doc/ppt/xlxs/zip/mp4', 'maxlength' => 10])}}
							</div>						
						</div>
						<div class="form-group">
							{{Form::label('Tamaño máximo: *',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
							<div class="col-md-4 col-sm-4 col-xs-6">
								<div class="input-group ">							
									<input name="tamanomax" readonly="true" type="number" min="1" max="10000" class="form-control tArch" aria-describedby="basic-addon1">
									<span class="input-group-addon" id="basic-addon1">MB</span>
								</div>	
							</div>							
						</div>
					</div>

					<div id="form-cerrada" hidden="true" class="col-md-8 col-sm-8 col-xs-12">
						<div class="row">
							<div class="form-group">
								{{Form::label('Alternativas: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
								<div class="col-md-8 col-sm-8 col-xs-6">
									<a id="add" disabled class="btn btn-warning tCerr">Agregar</a>
									<a id="remove" disabled class="btn btn-danger tCerr">Quitar</a>
								</div>
							</div>
						</div>

						<div id="opciones" class="row">									
							<div class="form-group">
								{{Form::label('a.',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-1 col-md-offset-0 col-sm-offset-0 col-xs-offset-5'])}}
								<div class="col-md-8 col-sm-8 col-xs-6">
									<div class="input-group">										
										{{Form::text('clave[a]',null,['class'=>'form-control tCerrada','readonly', 'maxlength' => 500])}}
										<span class="input-group-addon">
											<input class="tCerr" type="radio" disabled value="a" name="rpta" > Rpta.
										</span>
									</div>
								</div>

							</div>
							<div class="form-group">
								{{Form::label('b.',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-1 col-md-offset-0 col-sm-offset-0 col-xs-offset-5'])}}
								<div class="col-md-8 col-sm-8 col-xs-6">
									<div class="input-group">										
										{{Form::text('clave[b]',null,['class'=>'form-control tCerrada','readonly', 'maxlength' => 500])}}
										<span class="input-group-addon">
											<input class="tCerr" type="radio" disabled value="b" name="rpta" > Rpta.
										</span>
									</div>
								</div>
							</div>

						</div>


						
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
						<a class="btn btn-default pull-right" href="{{ route('pregunta.index') }}">Cancelar</a>
					</div>
				</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>

<script>
	var n=1;
	
	$("#add").click(function() {
		var x = $("#add").attr('disabled');
		if (typeof x !== typeof undefined && x !== false) {return;	}
		if(n==25){return;}
		n++;    
		var chrm = String.fromCharCode(97 + n);
		var chrM = String.fromCharCode(65 + n);
		$("#opciones").append('<div class="form-group preg"><label class="control-label col-md-2 col-sm-2 col-xs-1 col-md-offset-0 col-sm-offset-0 col-xs-offset-5">'+ chrM+'.</label><div class="col-md-8 col-sm-8 col-xs-6"><div class="input-group"><input type="text" name="clave['+chrm+']" class="form-control tCerrada" required maxlength="500">										<span class="input-group-addon"><input type="radio" required class="tCerr" value="'+chrm+'" name="rpta" > Rpta.</span></div></div>	</div>');

	});
	$("#remove").click(function() {
		var x = $("#remove").attr('disabled');
		if (typeof x !== typeof undefined && x !== false) {return;	}
		if(n==1){return}
			$(".preg:last-child").remove();
		n--;
	});

	$('input[type=radio][name=tipo]').change(function() {
		var tipo = $('input[name=tipo]:checked').val();
		$(".tCerrada").attr("readonly","true");
		$(".tCerrada").removeAttr("required");
		$(".tCerr").attr("disabled","true");
		$(".tCerr").removeAttr("required");
		$("#form-cerrada").attr("hidden","true");

		$(".tArch").attr("readonly","true");		
		$(".tArch").removeAttr("required");
		$("#form-archivo").attr("hidden","true");
		

		if(tipo==3){//si es tipo archivo		
			$(".tArch").removeAttr("readonly");			
			$(".tArch").attr("required","true");	
			$("#form-archivo").removeAttr("hidden");	
		}
		else if(tipo==1){
			$(".tCerrada").removeAttr("readonly");
			$(".tCerrada").attr("required","true");
			$(".tCerr").removeAttr("disabled");
			$(".tCerr").attr("required","true");
			$("#form-cerrada").removeAttr("hidden");	
		}
	});

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
	
</script>

@endsection