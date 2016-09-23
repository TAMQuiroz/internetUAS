@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Edicion de Investigadores</h3>
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

		    	{{Form::open(['route' => ['investigador.update',$investigador->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
		    		<div class="form-group">
		    			{{Form::label('Nombre',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('nombre',$investigador->nombre,['class'=>'form-control', 'required', 'maxlength' => 10])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Apellido Paterno',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('apellido_paterno',$investigador->ape_paterno,['class'=>'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Apellido Materno',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('apellido_materno',$investigador->ape_materno,['class'=>'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Correo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::email('correo',$investigador->correo,['class'=>'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Celular',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::number('celular',$investigador->celular,['class'=>'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Especialidad',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::select('especialidad', $especialidades, $investigador->id_especialidad, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Área',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::select('area', $areas, $investigador->id_area, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
							{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('investigador.show',$investigador->id) }}">Cancelar</a>
						</div>
					</div>
		    	{{Form::close()}}

		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>

@endsection