@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Cargar alumnos</h3>
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

				{{Form::open(['route' => 'alumno.storeAll', 'class'=>'form-horizontal', 'id'=>'formSuggestion', 'files' => true])}}
				<div class="form-group">
					{{Form::label('Especialidad *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
					<div class="col-md-4">
						{{Form::text('codigo',Session::get('faculty-name'),['class'=>'form-control', 'readonly', 'maxlength' => 50])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Archivo Excel *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
					<div class="col-md-4">111
						{{Form::file('csv_file',null,['class'=>'form-control', 'required', 'maxlength' => 50])}}
						<a href="{{route('alumno.example')}}">Archivo Ejemplo</a>
					</div>
				</div>

				

				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						{{Form::submit('Cargar', ['class'=>'btn btn-success pull-right'])}}
						<a class="btn btn-default pull-right" href="{{ route('alumno.index') }}">Cancelar</a>
					</div>
				</div>
				{{Form::close()}}

			</div>
		</div>
	</div>
</div>

<!-- <script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script> -->

@endsection