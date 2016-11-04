@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Rendir evaluación</h3>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<h4 class="">{{$evaluation->nombre}}</h4>
			</div>
			<div class="panel-body">
				<form class="form-horizontal">
					<div class="form-group">
					<label class="control-label ccol-md-4 col-sm-4 col-xs-4" for="email">Descripción:</label>
						<div class="col-md-6 col-sm-6 col-xs-8">
							<h5>{{$evaluation->descripcion}}</h5>
						</div>
					</div>

					<div class="form-group">
						{{Form::label('Tiempo necesario:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-4'])}}
						<div class="col-md-6 col-sm-6 col-xs-8">
							<h5>{{$evaluation->tiempo}} minutos</h5>
						</div>					
					</div>

					<div class="form-group">	
						{{Form::label('Cantidad de preguntas:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-4'])}}
						<div class="col-md-6 col-sm-6 col-xs-8">
							<h5>{{count($evaluation->preguntas)}}</h5>
						</div>
					</div>

					<div class="form-group">
						{{Form::label('Requisitos:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-4'])}}
						<div class="col-md-6 col-sm-6 col-xs-8">
							<ul>
								@foreach($evaluation->preguntas as $key=>$preg)
								@if($preg->requisito != "")
								<li><h5>Pregunta {{$key+1}}: {{$preg->requisito}}</h5></li>								
								@endif
								@endforeach
							</ul>
						</div>
					</div>
				</form>
				
			</div>			
			
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-12">					
					<a class="btn btn-success pull-right" href="{{ route('evaluacion.rendirev',$evaluation->id) }}">Rendir evaluación</a>
					<a class="btn btn-default pull-right" href="{{ route('evaluacion_alumno.index') }}">Cancelar</a>
				</div>
			</div><br>
			
		</div>
	</div>
</div>
@endsection