@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Creación de Proyecto</h3>
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

		    	{{Form::open(['route' => 'proyecto.store', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
		    		<div class="form-group">
		    			{{Form::label('Nombre *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-6">
		    				{{Form::text('nombre',null,['class'=>'form-control', 'required', 'maxlength' => 50])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Número de entregables *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-6">
		    				{{Form::text('num_entregables',null,['class'=>'form-control', 'required', 'min'=>1])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha de inicio *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-6">
		    				{{Form::date('fecha_ini',null,['id'=>'fecha_ini','class'=>'form-control', 'required','min'=>\Carbon\Carbon::today()->toDateString()])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha de fin *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-6">
		    				{{Form::date('fecha_fin',null,['id'=>'fecha_fin','class'=>'form-control', 'required','min'=>\Carbon\Carbon::today()->toDateString()])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Grupo *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-6">
		    				{{Form::select('grupo', $grupos, null, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Area *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-6">
		    				{{Form::select('area', $areas, null, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Descripcion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-6">
		    				{{Form::textarea('descripcion', null, ['class' => 'form-control', 'required', 'rows'=>'5', 'maxlength'=>200])}}
		    			</div>
		    		</div>

		    		<div class="row">
						<div class="col-md-9 col-sm-12 col-xs-12">
							{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('proyecto.index') }}">Cancelar</a>
						</div>
					</div>
		    	{{Form::close()}}

		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>

@endsection