@extends(Auth::user() ? 'app' : 'appPublic')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
            <h3>Lista de Investigadores</h3>
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
						<a href="#filter" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
			        </div>

			        @if(Auth::user() && (Auth::user()->IdPerfil == Config::get('constants.docente') || Auth::user()->IdPerfil == Config::get('constants.admin')))
			        <div class="col-md-6">
						<a href="{{route('investigador.create')}}">
							{{Form::button('<i class="fa fa-plus"></i> Crear investigador',['class'=>'btn btn-success pull-right'])}}
						</a>
					</div>
					@endif
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
								<th colspan="2">Acciones</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($investigadores as $investigador)
							<tr> 
								<td>{{$investigador->nombre}}</td> 
								<td>{{$investigador->ape_paterno}}</td> 
								<td>{{$investigador->ape_materno}}</td> 
								<td>{{$investigador->correo}}</td> 
								<td>{{$investigador->faculty->Nombre}}</td>
								<td>
									<a href="{{route('investigador.show', $investigador->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-eye"></i></a>
									@if(Auth::user() && (Auth::user()->IdPerfil == Config::get('constants.docente') || Auth::user()->IdPerfil == Config::get('constants.admin')))
									<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$investigador->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
									@endif
								</td>
							</tr> 

							@include('modals.delete', ['id'=> $investigador->id, 'message' => '¿Esta seguro que desea eliminar este investigador?', 'route' => route('investigador.delete', $investigador->id)])
							@endforeach
						</tbody> 
					</table>
					{{$investigadores->links()}}
				</div>
				
		  	</div>
		</div>
    </div>
</div>

@include('investigation.modals.filter_investigator', ['title' => 'Filtrar', 'route' => 'investigador.index'])
@endsection