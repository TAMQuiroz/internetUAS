@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Editar pregunta</h3>
			</div>	        
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">			
			<div class="panel-body">
				{{Form::open(['route' => ['pregunta.update',$question->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
				<div class="form-group">
					{{Form::label('Pregunta: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-10 col-sm-10 col-xs-6">
						{{Form::textarea('descripcion',$question->descripcion,['class'=>'form-control','placeholder'=>'Escriba el contenido de la pregunta','rows'=>'4', 'required', 'maxlength' => 1000])}}
					</div>
				</div>
				<div class="form-group">
					{{Form::label('Competencia: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-10 col-sm-10 col-xs-6">
						<select name="competencia" required="required" class="form-control">
							<option value="">Seleccione</option>
							@foreach($competences as $competence)
							@if(in_array($competence->id, $arrcompetences))
							@if($competence->id == $question->id_competence)
							<option selected value="{{$competence->id}}" >{{$competence->nombre}}</option>
							@else
							<option value="{{$competence->id}}" >{{$competence->nombre}}</option>
							@endif
							@endif
							@endforeach	
						</select>
						
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Tiempo estimado:*',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-2 col-sm-3 col-xs-6">
						<div class="input-group">							
							<input name="tiempo" required="required" type="number" min="1" max="200" class="form-control" aria-describedby="basic-addon1" value="{{$question->tiempo}}">
							<span class="input-group-addon" id="basic-addon1">minutos</span>
						</div>
					</div>

					{{Form::label('Puntaje: *',null,['class'=>'control-label col-md-2 col-sm-1 col-xs-6'])}}
					<div class="col-md-2 col-sm-3 col-xs-6">
						<div class="input-group">							
							<input name="puntaje" required="required" type="number" min="1" max="200" class="form-control" aria-describedby="basic-addon1" value="{{$question->puntaje}}">
							<span class="input-group-addon" id="basic-addon1">puntos</span>
						</div>						
					</div>

					{{Form::label('Dificultad: *',null,['class'=>'control-label col-md-2 col-sm-1 col-xs-6'])}}
					<div class="col-md-2 col-sm-2 col-xs-6">
						<select name="dificultad" class="form-control" required="required">
							<option value="" >Seleccione</option>
							<option value="1" @if($question->dificultad==1) selected @endif>Baja</option>
							<option value="2"@if($question->dificultad==2) selected @endif>Media</option>
							<option value="3"@if($question->dificultad==3) selected @endif>Alta</option>			
						</select>						
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Requisitos: ',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-10 col-sm-10 col-xs-6">
						{{Form::textarea('requisitos',$question->requisito,['class'=>'form-control','rows'=>'2','placeholder'=>'Escriba requisitos que tenga la pregunta para ser resuelta', 'maxlength' => 1000])}}
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="form-group">
							{{Form::label('Tipo: *',null,['class'=>'control-label col-md-6 col-sm-6 col-xs-6'])}}
							<div class="col-md-6 col-sm-6 col-xs-6">						
								<div class="radio">
									<label><input type="radio" value="2" name="tipo" @if($question->tipo==2) checked @endif >Abierta</label>
								</div>
								<div class="radio">
									<label><input type="radio" value="3" name="tipo" @if($question->tipo==3) checked @endif>Archivo</label>
								</div>
								<div class="radio">
									<label><input type="radio" value="1" name="tipo" @if($question->tipo==1) checked @endif>Cerrada</label>
								</div>						
							</div>
						</div>
					</div>
					<div id="form-archivo" @if($question->tipo!=3) hidden="true" @endif  class="col-md-8 col-sm-8 col-xs-12">
						<div class="form-group">							
							{{Form::label('Extensión: *',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
							<div class="col-md-4 col-sm-4 col-xs-6">
								{{Form::text('extension',$question->extension_arch,['class'=>'form-control tArch','placeholder'=>'p.e. doc/ppt/xlxs/zip/mp4', 'maxlength' => 1000])}}
							</div>						
						</div>
						<div class="form-group">
							{{Form::label('Tamaño máximo: *',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
							<div class="col-md-4 col-sm-4 col-xs-6">
								<div class="input-group ">							
									<input name="tamanomax" type="number" min="1" class="form-control tArch" aria-describedby="basic-addon1" value="{{$question->tamano_arch}}">
									<span class="input-group-addon" id="basic-addon1">MB</span>
								</div>	
							</div>							
						</div>
					</div>
					<div id="form-cerrada" @if($question->tipo!=1) hidden="true" @endif  class="col-md-8 col-sm-8 col-xs-12">
						<div class="row">
							<div class="form-group">
								{{Form::label('Alternativas: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
								<div class="col-md-8 col-sm-8 col-xs-6">
									<a id="add" class="btn btn-warning tCerr">Agregar</a>
									<a id="remove" class="btn btn-danger tCerr">Quitar</a>
								</div>
							</div>
						</div>

						<div id="opciones" class="row">	
							@if($question->alternativas->isEmpty())
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
							@else
							@foreach($question->alternativas as $alternativa)	
							<div class="form-group">
								{{Form::label($alternativa->letra.'.',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-1 col-md-offset-0 col-sm-offset-0 col-xs-offset-5'])}}
								<div class="col-md-8 col-sm-8 col-xs-6">
									<div class="input-group">										
										{{Form::text('clave['.$alternativa->id.']',$alternativa->descripcion,['class'=>'form-control tCerrada', 'maxlength' => 500])}}
										<span class="input-group-addon">
											<input class="tCerr" type="radio" value="{{$alternativa->letra}}" name="rpta" @if($question->rpta==$alternativa->letra) checked @endif > Rpta.
										</span>
									</div>
								</div>

							</div>
							@endforeach	
							@endif
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

	var lastLetter=$("#opciones div label:last").text().charAt(0).toLowerCase().charCodeAt()-97;;

	var n = 1;
	$("#add").click(function() {
		var x = $("#add").attr('disabled');
		if (typeof x !== typeof undefined && x !== false) {return;	}
		if(n + lastLetter -1==25){return;}
		n++;    
		var chrm = String.fromCharCode(97 + n + lastLetter -1);
		var chrM = String.fromCharCode(65 + n + lastLetter -1 );
		$("#opciones").append('<div class="form-group preg"><label class="control-label col-md-2 col-sm-2 col-xs-1 col-md-offset-0 col-sm-offset-0 col-xs-offset-5">'+ chrM+'.</label><div class="col-md-8 col-sm-8 col-xs-6"><div class="input-group"><input type="text" name="clave['+chrm+']" class="form-control tCerrada" required maxlength="500">										<span class="input-group-addon"><input type="radio" required class="tCerr" value="'+chrm+'" name="rpta" > Rpta.</span></div></div>	</div>');

	});
	$("#remove").click(function() {
		var x = $("#remove").attr('disabled');
		if (typeof x !== typeof undefined && x !== false) {return;	}
		if(n   ==1){return}
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

	
	
</script>

@endsection