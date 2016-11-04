@extends('app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
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
						<h4>Pregunta:{{$key}} ({{$ev->pregunta->puntaje}} puntos)</h4>
						<p>{{$ev->pregunta->descripcion}}</p>
						<h5>Respuesta:</h5>

						@if($ev->pregunta->tipo == 2)
							@if($ev->respuesta == "")
							<p>-</p>
							@else
							<p>{{$ev->respuesta}}</p>
							@endif
						@elseif($ev->pregunta->tipo == 1)
						<ul>
							@foreach($ev->pregunta->alternativas as $key => $alt)
							<li>

								<div class="radio">
								<label>
								@if($ev->clave_elegida == $alt->letra)
								<input checked type="radio"/>
								@else
								<input type="radio"/>
								@endif
								 {{$alt->letra}}. {{$alt->descripcion}} 
								 </label>
								</div>
																						
							</li>
							@endforeach
						</ul>
						@elseif($ev->pregunta->tipo == 3)
							@if($ev->path_archivo != null)
							<a style="color:blue;text-decoration: underline" href="{{route('evaluacion.descargar_respuesta',$ev->id)}}">Descargar archivo</a>
							@else
							<p style="color:gray;text-decoration: underline" >Sin archivo</p>
							@endif
						@endif
						<h5>Corrección:</h5>
						@if(( is_null( $ev->puntaje)) && ($ev->pregunta->tipo !=1) )
						<h6>Aun no corregida</h6>
						@elseif (($ev->puntaje >= 0) && ($ev->pregunta->tipo !=1) )
						<textarea readonly class="form-control" rows="4">{{$ev->comentario}}</textarea>
						<label class="control-label col-md-2 col-sm-3 col-xs-5">Puntaje:</label>
						<div class="col-md-2 col-sm-2 col-xs-3">							
							<input type="text" value="{{$ev->puntaje}}" readonly class="form-control" >			
						</div>
						@elseif ($ev->pregunta->tipo ==1 )
						<strong>Respuesta correcta: {{$ev->pregunta->rpta}}</strong>
						@endif
					</div><br>
					
					@endforeach					

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<center>
								<a class="btn btn-default" href="{{ route('evaluacion.ver_evaluaciones_alumnos_coord',$evaluation->id) }}">	Regresar</a>												
							</center>												
						</div>
					</div>					
				{{Form::close()}}
			</div>				
		</div>
	</div>
</div>
@endsection

