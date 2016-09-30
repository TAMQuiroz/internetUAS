@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Edicion de Evento</h3>
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

		    	{{Form::open(['route' => ['evento.update', $evento->id], 'files'=>true, 'class'=>'form-horizontal col-md-8', 'id'=>'formSuggestion'])}}
		    		<div class="form-group">
		    			{{Form::label('Nombre *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-8">
		    				{{Form::text('nombre',$evento->nombre,['class'=>'form-control', 'required', 'maxlength' => 50])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Ubicacion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-8">
		    				{{Form::text('ubicacion',$evento->ubicacion,['class'=>'form-control', 'required', 'maxlength' => 100])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-8">
		    				{{Form::date('fecha',$evento->fecha,['class'=>'form-control', 'required','min'=>\Carbon\Carbon::today()->toDateString()])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Hora *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-8">
		    				{{Form::time('hora',date("H:i", strtotime( $evento->hora )),['class'=>'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Duracion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-8">
		    				{{Form::number('duracion',$evento->duracion,['class'=>'form-control', 'required', 'max' => 24, 'min' => 1])}}
		    			</div>
		    		</div>


		    		<div class="form-group">
		    			{{Form::label('Tipo *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-8">
		    				{{Form::select('tipo', [0=>'Publico',1=>'Privado'], $evento->tipo, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Grupo *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-8">
		    				{{Form::select('grupo', $groups, $evento->grupo_id, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Descripcion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-8">
		    				{{Form::textarea('descripcion', $evento->descripcion, ['class' => 'form-control', 'required', 'rows'=>'5', 'maxlength'=>200])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Imagen',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-8">
                            {{Form::file('imagen', ['class'=>'form-control'])}}    
                        </div>
                        
                    </div>

		    		<div class="row">
						<div class="col-md-11 col-sm-12 col-xs-12">
							{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('evento.show',$evento->id) }}">Cancelar</a>
						</div>
					</div>
		    	{{Form::close()}}

		    	<div class="col-md-4">
                    <div class="row">
                        Imagen del evento:
                    </div>
                    <div class="row">
                        @if($evento->imagen)
                        {{Html::image(asset($evento->imagen), null, ['class'=>'img-thumbnail'])}}
                        @endif
                    </div>
		    	</div>

		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>

@endsection