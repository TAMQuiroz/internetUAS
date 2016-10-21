@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Editar mis datos</h3>
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
		  		{{Form::open(['route' => ['miperfil.update', $topic->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
		    		<div class="form-group">
		    			{{Form::label('Teléfono',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">		    				
		    				{{Form::text('telefono',$tutor->telefono,['class'=>'form-control'])}}		
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Oficina',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">		    				
		    					{{Form::text('oficina',$tutor->oficina,['class'=>'form-control'])}}		
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Anexo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">		    				
		    					{{Form::text('anexo',$tutor->anexo,['class'=>'form-control'])}}
		    			</div>
		    		</div>

		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">							
							<a class="btn btn-primary pull-right" href="{{ route('miperfil.edit') }}">Guardar</a>
						</div>
					</div>
		    	{{Form::close()}}		    	
		  	</div>

		</div>
    </div>
</div>

<!-- <script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script> -->

@endsection