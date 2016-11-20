@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="">
				<h3>{{$evaluation->nombre}} - {{$tutstudent->ape_paterno.' '.$tutstudent->ape_materno.', '.$tutstudent->nombre  }}</h3>				
				<input hidden type="number" id="minutos" value="{{$evaluation->tiempo}}">
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div id="panel" class="panel-body">
			{{Form::open(['files'=>true, 'class'=>'form-horizontal', 'id'=>'respuestas'])}}
					@foreach($evs as $key => $ev)
										
					<div class="pregunta form-group">
						<h4>Pregunta {{$key+1}}: ({{$ev->pregunta->puntaje}} puntos)</h4>
						<p>{{$ev->pregunta->descripcion}}</p>
						<h5>Respuesta del alumno:</h5>

						@if($ev->pregunta->tipo == 2) <!-- ABIERTA -->
							@if($ev->respuesta == "")
							<p>No respondida</p>
							@else
							<p>{{$ev->respuesta}}</p>
							@endif
							<h5>Comentario de {{explode(' ',trim($ev->evaluador->Nombre))[0]    .' '.$ev->evaluador->ApellidoPaterno}}:</h5>
							@if( is_null( $ev->puntaje) )
							<h6 style="color: red">Aún no corregida</h6>
							@else
							<textarea readonly class="form-control" rows="4">{{$ev->comentario}}</textarea>
							<label class="control-label">Puntaje: {{$ev->puntaje}}/{{$ev->pregunta->puntaje}}</label>
							@endif

						@elseif($ev->pregunta->tipo == 1) <!-- CERRADA -->
						<ul>
							@foreach($ev->pregunta->alternativas as $key => $alt)
							<li>		
								<div style="" class="radio">
								<label @if(($ev->clave_elegida == $alt->letra) && ($ev->pregunta->rpta != $ev->clave_elegida) ) 
											style="background-color:rgba(245, 5, 5, 0.26)"
											@elseif ($ev->pregunta->rpta == $alt->letra ) 
											style="background-color:#9be89b"
								 @endif >								
								<input onclick="return false;" type="radio" @if($ev->clave_elegida == $alt->letra) checked @endif  />								
								 {{$alt->letra}}. {{$alt->descripcion}} 
								 </label>
								</div>
																						
							</li>
							@endforeach
							<strong>Respuesta correcta: {{$ev->pregunta->rpta}}</strong><br>
							<label class="control-label ">Puntaje: {{$ev->puntaje}}/{{$ev->pregunta->puntaje}}</label>
						</ul>
						@elseif($ev->pregunta->tipo == 3) <!-- ARCHIVO -->
							@if($ev->path_archivo != null)
							<a style="color:blue;text-decoration: underline" href="{{route('evaluacion.descargar_respuesta',$ev->id)}}">Descargar archivo</a>
							@else
							<p style="color:gray;text-decoration: underline" >Sin archivo</p>
							@endif

							<h5>Comentario de {{explode(' ',trim($ev->evaluador->Nombre))[0]    .' '.$ev->evaluador->ApellidoPaterno}}:</h5>

							@if( is_null( $ev->puntaje) )
							<h6 style="color: red">Aún no corregida</h6>
							@else
							<textarea readonly class="form-control" rows="4">{{$ev->comentario}}</textarea>
							<label class="control-label ">Puntaje: {{$ev->puntaje}}/{{$ev->pregunta->puntaje}}</label>	
							@endif
						@endif
					</div>
					
					@endforeach					

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<center>
								<a class="btn btn-default" href="{{ route('evaluacion.ver_evaluaciones_alumnos_coord',$evaluation->id) }}"><i class="fa fa-backward" aria-hidden="true"></i> Regresar</a>												
							</center>												
						</div>
					</div>					
				{{Form::close()}}
			</div>				
		</div>
	</div>
</div>
@endsection

