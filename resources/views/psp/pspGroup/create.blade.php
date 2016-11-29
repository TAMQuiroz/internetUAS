@extends('app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Creación de Grupos</h3>
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

		    	{{Form::open(['route' => 'pspGroup.store', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
		    		<div class="form-group">
		    			{{Form::label('Numero *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::number('numero',null,['class'=>'form-control', 'required', 'min' => 1, 'max' => 9])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Descripcion  *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('descripcion',null,['class'=>'form-control', 'required', 'maxlength' => 100])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
                        {{Form::label('Curso de PSP*',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            <select name="Proceso_de_Psp" id="Proceso_de_Psp" class="form-control" required="required">
	                            @if($pspproc!=null)
	                            	<option value="">-- Seleccione --</option>
	                                @foreach( $pspproc as $psp)
	                                    @if($psp!=null)
	                                    <option value="{{$psp->id}}">{{$psp->Course->Nombre}}</option>
	                                    @endif
	                                @endforeach
	                            @endif
	                        </select>
	                    </div>
	                </div>
	                
		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
							{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('pspGroup.index') }}">Cancelar</a>
						</div>
					</div>

		    	{{Form::close()}}

		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/pspGroup.js')}}"></script>
@endsection