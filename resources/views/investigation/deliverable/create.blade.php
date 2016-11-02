@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Crear entregable</h3>
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

		    	{{Form::open(['route' => 'entregable.store', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
		    		{{Form::hidden('id_proyecto',$proyecto->id,['id'=>'id_proyecto'])}}
		    		<div class="form-group">
		    			{{Form::label('Nombre *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('nombre',null,['class'=>'form-control', 'required', 'maxlength' => 50])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha inicio *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::date('fecha_ini',null,['id'=>'fecha_ini','class'=>'form-control', 'required','min'=>$proyecto->fecha_ini, 'max'=>$proyecto->fecha_fin])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha fin *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::date('fecha_fin',null,['id'=>'fecha_fin','class'=>'form-control', 'required','min'=> $proyecto->fecha_ini, 'max'=>$proyecto->fecha_fin])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Tarea padre',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::select('padre_id',$entregables->prepend('No tiene'), null, ['id'=>'padre','class'=>'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
							{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('entregable.index',$proyecto->id) }}">Cancelar</a>
						</div>
					</div>
		    	{{Form::close()}}

		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>

@endsection