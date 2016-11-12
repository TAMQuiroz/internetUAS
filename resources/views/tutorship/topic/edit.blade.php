@extends('app')
@section('content')

<ul class="tabs-page">
    <a href="{{route('parametro.index.duration')}}">
        <div class="tab-page-wrapper">
            <li class="tab-page">Citas</li>
        </div>
    </a>
    <div class="tab-page-wrapper active">
        <li class="tab-page">Temas</li>
    </div>
    <a href="{{route('motivo.index')}}">
        <div class="tab-page-wrapper">
            <li class="tab-page">Motivos</li>
        </div>
    </a>
</ul>
<div class="tab-content-container">

	<div class="row">
		<div class="col-md-12">
			<div class="page-title">
		        <div class="">
		            <h3>Edición de Tema</h3>
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
			    	{{Form::open(['route' => ['tema.update', $topic->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
			    		<div class="form-group">
			    			{{Form::label('Nombre: *',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-12'])}}
			    			<div class="col-md-4 col-sm-4 col-xs-12">
			    				{{Form::text('nombre',$topic->nombre,['class'=>'form-control', 'required', 'maxlength' => 50])}}
			    			</div>
			    		</div>		    		

			    		<div class="row">
							<div class="col-md-8 col-sm-12 col-xs-12">
								{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
								<a class="btn btn-default pull-right" href="{{ route('tema.index',$topic->id) }}">Cancelar</a>
							</div>
						</div>
			    	{{Form::close()}}

			  	</div>
			</div>
	    </div>
	</div>

</div>

<!-- <script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script> -->

@endsection