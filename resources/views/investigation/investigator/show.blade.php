@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Investigador:</h3>
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
		    			{{Form::label('Nombre',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('nombre',$investigador->nombre,['class'=>'form-control', 'readonly', 'maxlength' => 10])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Apellido Paterno',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('apellido_paterno',$investigador->ape_paterno,['class'=>'form-control', 'readonly'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Apellido Materno',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('apellido_materno',$investigador->ape_materno,['class'=>'form-control', 'readonly'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Correo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::email('correo',$investigador->correo,['class'=>'form-control', 'readonly'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Celular',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::number('celular',$investigador->celular,['class'=>'form-control', 'readonly'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Especialidad',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('especialidad', $investigador->faculty->Nombre, ['class' => 'form-control', 'readonly'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Área',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-md-4">
		    				{{Form::text('area', $investigador->area, ['class' => 'form-control', 'readonly'])}}
		    			</div>
		    		</div>

		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
						<a class="btn btn-success pull-right" href="{{ route('investigador.edit',$investigador->id) }}">Editar</a>
							<a class="btn btn-default pull-right" href="{{ route('investigador.index') }}">Regresar</a>
						</div>
					</div>
				</div>
		  	</div>

		  	<div class="panel-heading">
		    	<h3 class="panel-title">Grupos de investigación</h3>
			</div>
		  	<div class="panel-body">
				<table class="table table-striped responsive-utilities jambo_table bulk_action"> 
					<thead> 
						<tr class="headings"> 
							<th>Nombre</th> 
							<th>Especialidad</th> 
						</tr> 
					</thead> 
					<tbody> 
						<tr> 
							<td>Ejemplo Nombre</td> 
							<td>Ejemplo Especialidad</td> 
						</tr> 
					</tbody> 
				</table>		  	
		  	</div>

		  	<div class="panel-heading">
		    	<h3 class="panel-title">Proyectos</h3>
			</div>
		  	<div class="panel-body">
				<table class="table table-striped responsive-utilities jambo_table bulk_action"> 
					<thead> 
						<tr class="headings"> 
							<th>Nombre</th> 
							<th>Fecha Inicio</th> 
							<th>Fecha Fin</th> 
							<th>Grupo</th> 
							<th>Especialidad</th> 
						</tr> 
					</thead> 
					<tbody> 
						<tr> 
							<td>Ejemplo Nombre</td> 
							<td>Ejemplo Fecha inicio</td> 
							<td>Ejemplo Fecha fin</td> 
							<td>Ejemplo Grupo</td> 
							<td>Ejemplo Especialidad</td> 
						</tr> 
					</tbody> 
				</table>		  	
		  	</div>
		</div>
    </div>
</div>

@endsection