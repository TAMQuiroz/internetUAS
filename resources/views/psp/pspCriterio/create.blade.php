@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Crear Criterio</h3>
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

		    	{{Form::open(['route' => 'pspCriterio.store', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

					<div class="form-group">
	                    {{Form::label('Curso de PSP *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    	<div class="col-md-4 col-sm-6 col-xs-12">
                        	<select name="pspprocess" class="form-control" required="required">
	                        @if($procesos!=null)
	                            @foreach( $procesos as $psp)
	                                @if($psp!=null)
	                                <option value="{{$psp->id}}">{{$psp->Course->Nombre}}</option>
	                                @endif
	                            @endforeach
	                        @endif
	                    	</select>
	                	</div>
		            </div>

		    		<div class="form-group">
		    			{{Form::label('Nombre *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">
		    				{{Form::text('nombre',null,['class'=>'form-control', 'required', 'maxlength' => 50])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Peso  *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">
		    				{{Form::number('peso',null,['class'=>'form-control', 'required','min'=>1])}}
		    			</div>
		    		</div>

		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
							{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('pspCriterio.index') }}">Cancelar</a>
						</div>
					</div>
		    	{{Form::close()}}

		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>

@endsection