@extends(Auth::user() ? 'app' : 'appPublic')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Investigadores según Área</h3>
	        </div>
	    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-info">
			<div class="panel-heading">
		    	<h3 class="panel-title">Configuración</h3>
			</div>
		  	<div class="panel-body">

		    	{{Form::open(['route' => 'reporteISA.generateISA', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
		    		<div class="form-group">
		    			{{Form::label('Area',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">

		    				{{Form::select('area',$comboAreas, $idArea, ['class'=>'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
							{{Form::submit('Generar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('reporteISA.index') }}">Cancelar</a>
						</div>
					</div>
		    	{{Form::close()}}

		  	</div>
		</div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-info">
			<div class="panel-heading">
		    	<h3 class="panel-title">Investigadores</h3>
			</div>
		  	<div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-6">
			            <form action="#" method="get">
			                <div class="input-group">
			                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
			                    <input class="form-control" id="investigator-search" name="q" placeholder="Buscar" required>
			                    <span class="input-group-btn">
			                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			                    </span>
			                </div>
			            </form>
			        </div>
				</div>

		  		<div class="table-responsive">
					<table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
						<thead> 
							<tr class="headings"> 
								<th>Nombre</th> 
								<th>Apellido Paterno</th> 
								<th>Apellido Materno</th> 
								<th>Correo</th> 
								<th>Especialidad</th> 
								<!--<th colspan="2">Acciones</th>-->
							</tr> 
						</thead>
						@if($investigadores != null)
						<tbody> 
							@foreach($investigadores as $investigador)
							<tr> 
								<td>{{$investigador->nombre}}</td> 
								<td>{{$investigador->ape_paterno}}</td> 
								<td>{{$investigador->ape_materno}}</td> 
								<td>{{$investigador->correo}}</td> 
								<td>{{$investigador->faculty->Nombre}}</td>
								<!--<td>
									<a href="{{route('reporteISA.show', $investigador->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-eye"></i></a>
								</td>-->
							</tr>
							@endforeach
						</tbody>
						@endif 
					</table>
				</div>
		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>
<script src="{{ URL::asset('js/intranetjs/investigation/investigator/index-investigator.js')}}"></script>

@endsection