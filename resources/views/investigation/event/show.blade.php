@extends(Auth::user() ? 'app' : 'appPublic')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Evento</h3>
	        </div>
	    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-info">
			<div class="panel-heading">
		    	<h3 class="panel-title">Información</h3>
			</div>
		  	<div class="panel-body">

		    	<div class="form-horizontal col-md-8">
		    		<div class="form-group">
		    			{{Form::label('Nombre',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-8">
		    				@if(Auth::user())
		    				{{Form::text('nombre',$evento->nombre,['class'=>'form-control', 'readonly', 'maxlength' => 50])}}
		    				@else
		    				<div class="form-control no-border">
		    					{{$evento->nombre}}
		    				</div>
		    				@endif
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Ubicacion',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-8">
		    				@if(Auth::user())
		    				{{Form::text('ubicacion',$evento->ubicacion,['class'=>'form-control', 'readonly', 'maxlength' => 100])}}
		    				@else
		    				<div class="form-control no-border">
		    					{{$evento->ubicacion}}
		    				</div>
		    				@endif
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-8">
		    				@if(Auth::user())
		    				{{Form::text('fecha',$evento->fecha,['class'=>'form-control', 'readonly'])}}
		    				@else
		    				<div class="form-control no-border">
		    					{{$evento->fecha}}
		    				</div>
		    				@endif
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Hora',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-8">
		    				@if(Auth::user())
		    				{{Form::time('hora',date("H:i", strtotime( $evento->hora )),['class'=>'form-control', 'readonly'])}}
		    				@else
		    				<div class="form-control no-border">
		    					{{$evento->hora}}
		    				</div>
		    				@endif
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Duracion',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-8">
		    				@if(Auth::user())
		    				{{Form::number('duracion',$evento->duracion,['class'=>'form-control', 'readonly', 'max' => 24, 'min' => 1])}}
		    				@else
		    				<div class="form-control no-border">
		    					{{$evento->duracion}}
		    				</div>
		    				@endif
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Tipo',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-8">
		    				@if(Auth::user())
		    				{{Form::text('grupo', $estados[$evento->tipo], ['class' => 'form-control', 'readonly'])}}
		    				@else
		    				<div class="form-control no-border">
		    					{{$estados[$evento->tipo]}}
		    				</div>
		    				@endif
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Grupo',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-8">
		    				@if(Auth::user())
		    				{{Form::text('grupo', $evento->group->nombre, ['class' => 'form-control', 'readonly'])}}
    						@else
		    				<div class="form-control no-border">
		    					{{$evento->group->nombre}}
		    				</div>
		    				@endif
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Descripcion',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-8">
		    				@if(Auth::user())
		    				{{Form::textarea('descripcion', $evento->descripcion, ['class' => 'form-control', 'rows'=>'5', 'readonly', 'maxlength'=>200])}}
    						@else
		    				<div class="form-control no-border">
		    					{{$evento->descripcion}}
		    				</div>
		    				@endif
		    			</div>
		    		</div>

		    		<div class="row">
						<div class="col-md-11 col-sm-12 col-xs-12">
							@if(Auth::user() && (Auth::user()->IdUsuario == $evento->group->leader->user->IdUsuario || Auth::user()->IdPerfil == Config::get('constants.admin')))
							<a class="btn btn-success pull-right" href="{{ route('evento.edit',$evento->id) }}">Editar</a>
							@endif
							<a class="btn btn-default pull-right" href="{{ route('evento.index') }}">Regresar</a>
						</div>
					</div>
		    	</div>

		    	<div class="col-md-4">
                    <div class="row">
                        Imagen del evento:
                    </div>
                    <div class="row">
                        @if($evento->imagen)
                        {{Html::image(asset($evento->imagen), null, ['class'=>'img-thumbnail'])}}
                        @else
                        {{Html::image(asset('images/nofoto.png'), null, ['class'=>'img-thumbnail'])}}
                        @endif
                    </div>
		    	</div>

		  	</div>
		</div>
    </div>
</div>


@endsection