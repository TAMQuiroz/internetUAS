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
			<div class="">
				<h3>Ver pregunta</h3>
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
				{{Form::open(['route' => ['pregunta.edit',$question->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
				<div class="form-group">
					{{Form::label('Pregunta: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-10 col-sm-10 col-xs-6">
						{{Form::textarea('descripcion',$question->descripcion,['class'=>'form-control','placeholder'=>'Escriba el contenido de la pregunta','rows'=>'4', 'readonly', 'maxlength' => 1000])}}
					</div>
				</div>
				<div class="form-group">
					{{Form::label('Competencia: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-10 col-sm-10 col-xs-6">
						<input type="text" readonly class="form-control" value="{{$question->competencia->nombre}}" >
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Tiempo estimado:*',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-2 col-sm-3 col-xs-6">
						<div class="input-group">							
							<input name="tiempo" readonly type="text" class="form-control" aria-describedby="basic-addon1" value="{{$question->tiempo}}">
							<span class="input-group-addon" id="basic-addon1">minuto(s)</span>
						</div>
					</div>

					{{Form::label('Puntaje: *',null,['class'=>'control-label col-md-2 col-sm-1 col-xs-6'])}}
					<div class="col-md-2 col-sm-3 col-xs-6">
						<div class="input-group">							
							<input name="puntaje" readonly type="text" class="form-control" aria-describedby="basic-addon1" value="{{$question->puntaje}}">
							<span class="input-group-addon" id="basic-addon1">punto(s)</span>
						</div>						
					</div>

					{{Form::label('Dificultad: *',null,['class'=>'control-label col-md-2 col-sm-1 col-xs-6'])}}
					<div class="col-md-2 col-sm-2 col-xs-6">
					@if($question->dificultad==1)
						<input class="form-control" type="text" readonly value="Baja"> 
					@elseif ($question->dificultad==2) 
						<input class="form-control" type="text" readonly value="Media">
					@elseif ($question->dificultad==3)
						<input class="form-control" type="text" readonly value="Alta">
					@endif							
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Requisitos: ',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-6'])}}
					<div class="col-md-10 col-sm-10 col-xs-6">
						{{Form::textarea('requisitos',$question->requisito,['class'=>'form-control','rows'=>'2','readonly'])}}
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="form-group">
							{{Form::label('Tipo: *',null,['class'=>'control-label col-md-6 col-sm-6 col-xs-6'])}}
							<div class="col-md-6 col-sm-6 col-xs-6">						
								<div class="radio">
									<label><input type="radio" onclick="return false;" value="2" name="tipo" @if($question->tipo==2) checked @endif >Abierta</label>
								</div>
								<div class="radio">
									<label><input type="radio" onclick="return false;" value="3" name="tipo" @if($question->tipo==3) checked @endif>Archivo</label>
								</div>
								<div class="radio">
									<label><input type="radio" onclick="return false;" value="1" name="tipo" @if($question->tipo==1) checked @endif>Cerrada</label>
								</div>						
							</div>
						</div>
					</div>
					@if($question->tipo==3)
					<div id="form-archivo" @if($question->tipo!=3) hidden="true" @endif  class="col-md-8 col-sm-8 col-xs-12">
						<div class="form-group">							
							{{Form::label('Extensión: *',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
							<div class="col-md-4 col-sm-4 col-xs-6">
								{{Form::text('extension',$question->extension_arch,['class'=>'form-control tArch','readonly','placeholder'=>'p.e. doc/ppt/xlxs/zip/mp4', 'maxlength' => 1000])}}
							</div>						
						</div>
						<div class="form-group">
							{{Form::label('Tamaño máximo: *',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
							<div class="col-md-4 col-sm-4 col-xs-6">
								<div class="input-group ">							
									<input name="tamanomax" readonly type="number" min="1" class="form-control tArch" aria-describedby="basic-addon1" value="{{$question->tamano_arch}}">
									<span class="input-group-addon" id="basic-addon1">MB</span>
								</div>	
							</div>							
						</div>
					</div>
					@elseif($question->tipo==1)
					<div id="form-cerrada" @if($question->tipo!=1) hidden="true" @endif  class="col-md-8 col-sm-8 col-xs-12">
						<div class="row">
							<div class="form-group">
								{{Form::label('Alternativas: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}								
							</div>
						</div>

						<div id="opciones" class="row">								
							@foreach($question->alternativas as $alternativa)	
							<div class="form-group">
								{{Form::label($alternativa->letra.'.',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-1 col-md-offset-0 col-sm-offset-0 col-xs-offset-5'])}}
								<div class="col-md-8 col-sm-8 col-xs-6">
									<div class="input-group">										
										{{Form::text('clave['.$alternativa->id.']',$alternativa->descripcion,['class'=>'form-control tCerrada', 'readonly'])}}
										<span class="input-group-addon">
											<input class="tCerr" type="radio" onclick="return false;" value="{{$alternativa->letra}}" name="rpta" @if($question->rpta==$alternativa->letra) checked @endif > Rpta.
										</span>
									</div>
								</div>

							</div>
							@endforeach	
							
						</div>						
					</div>
					@endif
				</div>				
				
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						@if($canEdit)
						<a class="btn btn-primary pull-right" href="{{route('pregunta.edit',$question->id)}}">Editar</a>
						@endif
						<a class="btn btn-default pull-right" href="{{ route('pregunta.index') }}">Regresar</a>
					</div>
				</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>



	

@endsection