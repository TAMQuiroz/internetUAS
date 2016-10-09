@extends('app')
@section('content')

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
			<div class="panel-body">
				{{Form::open(['route' => 'pregunta.store', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
				<div class="form-group">
					{{Form::label('Pregunta *',null,['class'=>'control-label col-md-2 col-sm-4 col-xs-6'])}}
					<div class="col-md-10 col-sm-8 col-xs-6">
						{{Form::textarea('descripcion',null,['class'=>'form-control', 'required', 'maxlength' => 500])}}
					</div>
				</div>
				<div class="form-group">
					{{Form::label('Competencia *',null,['class'=>'control-label col-md-2 col-sm-4 col-xs-6'])}}
					<div class="col-md-10 col-sm-8 col-xs-6">
						<select name="competencia" class="form-control">
						<option value="0">Seleccione</option>
						@foreach($competences as $competence)
							<option value="{{$competence->id}}" >{{$competence->nombre}}</option>
						@endforeach	
						</select>
						
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Tipo *',null,['class'=>'control-label col-md-2 col-sm-4 col-xs-6'])}}
					<div class="col-md-10 col-sm-8 col-xs-6">
						<div class="radio">
						<label><input type="radio" name="tipo" checked>Cerrada</label>
						</div>
						<div class="radio">
							<label><input type="radio" name="tipo">Abierta</label>
						</div>
						<div class="radio">
							<label><input type="radio" name="tipo">Archivo</label>
						</div>
						
					</div>
				</div>

				
				<div class="form-group">
					{{Form::label('Tiempo estimado *',null,['class'=>'control-label col-md-2 col-sm-4 col-xs-6'])}}
					<div class="col-md-10 col-sm-8 col-xs-6">
						{{Form::number('tiempo',null,['class'=>'form-control', 'required','min'=>'1'])}}
					</div>
				</div>
				
				<div class="form-group">
					{{Form::label('Puntaje *',null,['class'=>'control-label col-md-2 col-sm-4 col-xs-6'])}}
					<div class="col-md-10 col-sm-8 col-xs-6">
						{{Form::number('puntaje',null,['class'=>'form-control', 'required','min'=>'1'])}}
					</div>
				</div>
				<div class="form-group">
					{{Form::label('Dificultad *',null,['class'=>'control-label col-md-2 col-sm-4 col-xs-6'])}}
					<div class="col-md-10 col-sm-8 col-xs-6">
						<select name="dificultad" class="form-control">
							<option value="0">Seleccione</option>
							<option value="1">Baja</option>
							<option value="2">Media</option>
							<option value="3">Alta</option>							
						</select>
						
					</div>
				</div>
				<div class="form-group">
					{{Form::label('Requisitos ',null,['class'=>'control-label col-md-2 col-sm-4 col-xs-6'])}}
					<div class="col-md-10 col-sm-8 col-xs-6">
						{{Form::textarea('requisitos',null,['class'=>'form-control', 'required', 'maxlength' => 100])}}
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

<!-- <script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script> -->

@endsection