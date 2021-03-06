@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Editar alumno</h3>
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

				{{Form::open(['route' => ['alumno.update',$student->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
				<div class="form-group">
					{{Form::label('Código *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
					<div class="col-md-4">
						{{Form::text('codigo',$student->codigo,['class'=>'form-control', 'required', 'maxlength' => 50])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Nombres *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
					<div class="col-md-4">
						{{Form::text('nombre',$student->nombre,['class'=>'form-control', 'required', 'maxlength' => 50])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Apellido paterno *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
					<div class="col-md-4">
						{{Form::text('app',$student->ape_paterno,['class'=>'form-control', 'required', 'maxlength' => 50])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Apellido materno *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
					<div class="col-md-4">
						{{Form::text('apm',$student->ape_materno,['class'=>'form-control', 'required', 'maxlength' => 50])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Correo *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
					<div class="col-md-4">
						{{Form::text('correo',$student->correo,['class'=>'form-control', 'required', 'maxlength' => 50])}}
					</div>
				</div>

				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
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