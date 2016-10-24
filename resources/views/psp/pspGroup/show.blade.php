@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Grupo</h3>
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

		    	<div class="form-horizontal">
		    		<div class="form-group">
		    			{{Form::label('Numero',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::number('numero',$pspGroup->numero,['class'=>'form-control', 'required', 'readonly'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Descripcion',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('descripcion',$pspGroup->descripcion,['class'=>'form-control', 'readonly'])}}
		    			</div>
		    		</div>

		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
							<a class="btn btn-success pull-right" href="{{ route('pspGroup.edit', $pspGroup->id) }}">Editar</a>
							<a class="btn btn-default pull-right" href="{{ route('pspGroup.index') }}">Regresar</a>
						</div>
					</div>
		    	</div>

		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>

@endsection