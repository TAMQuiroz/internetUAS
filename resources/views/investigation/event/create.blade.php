@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
            <h3>Crear evento</h3>
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

		    	{{Form::open(['route' => 'evento.store', 'files'=>true, 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
		    		<div class="form-group">
		    			{{Form::label('Nombre *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::text('nombre',null,['class'=>'form-control', 'required', 'maxlength' => 200])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Ubicacion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::text('ubicacion',null,['class'=>'form-control', 'required', 'maxlength' => 100])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">                        
					        <div class="input-group date">
					            <input type="text" class="form-control input-date" name="fecha" id="fecha" placeholder="dd/mm/aaaa" required/>
					            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					        </div>
					    </div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Hora *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::time('hora',null,['class'=>'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Duracion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::number('duracion',null,['class'=>'form-control', 'required', 'max' => 24, 'min' => 1])}}
		    			</div>
		    		</div>


		    		<div class="form-group">
		    			{{Form::label('Tipo *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::select('tipo', [0=>'Publico',1=>'Privado'], null, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Grupo *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::select('grupo', $groups, null, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Descripcion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::textarea('descripcion', null, ['class' => 'form-control', 'required', 'rows'=>'5', 'maxlength'=>2000])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Imagen',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-6">
                            {{Form::file('imagen', ['class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Solo ingresar imagenes con formato .jpg', 'accept'=>'image/*'])}}    
                        </div>
                        
                    </div>

		    		<div class="row">
						<div class="col-md-9 col-sm-12 col-xs-12">
							{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('evento.index') }}">Cancelar</a>
						</div>
					</div>
		    	{{Form::close()}}

		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>

@endsection