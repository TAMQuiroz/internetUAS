@extends(Auth::user() ? 'app' : 'appPublic')
@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="page-title">
            <h3>Lista de Proyectos</h3>
	    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-info">
			<div class="panel-heading">
		    	<h3 class="panel-title">Proyectos</h3>
			</div>
		  	<div class="panel-body">
		  		<div class="row">
			  		<div class="col-md-6">
			  			<a href="#filter" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
			        </div>
			        @if(Auth::user() && $esLider && (Auth::user()->IdPerfil == Config::get('constants.docente') || Auth::user()->IdPerfil == Config::get('constants.admin')))
					<div class="col-md-6">
						<a href="{{route('proyecto.create')}}">
							{{Form::button('<i class="fa fa-plus"></i> Crear Proyecto',['class'=>'btn btn-success pull-right'])}}
						</a>
					</div>
					@endif
				</div>
		  		<div class="table-responsive">
					<table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
						<thead> 
							<tr> 
								<th>Nombre</th> 
								<th>Fecha final</th> 
								<th>Area</th> 
								<th>Grupo</th>
								<th>Cantidad de integrantes</th> 
								<th>Estado</th> 
								<th colspan="2">Acciones</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($proyectos as $proyecto)
							<tr> 
								<td>{{$proyecto->nombre}}</td> 
								<td>{{$proyecto->fecha_fin}}</td> 
								<td>{{$proyecto->area->nombre}}</td> 
								<td>{{$proyecto->group->nombre}}</td>
								<td>{{count($proyecto->investigators) + count($proyecto->teachers)  + count($proyecto->students) }}</td>
								<td>
								@if($proyecto->status)
									{{$proyecto->status->nombre}}
								@endif
								</td>
								<td>
									<a href="{{route('proyecto.show', $proyecto->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-eye"></i></a>
									@if(Auth::user() && (Auth::user()->IdUsuario == $proyecto->group->leader->user->IdUsuario || Auth::user()->IdPerfil == Config::get('constants.admin')))
									<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$proyecto->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
									@endif
								</td>
							</tr> 

							@include('modals.delete', ['id'=> $proyecto->id, 'message' => '¿Esta seguro que desea eliminar este proyecto?', 'route' => route('proyecto.delete', $proyecto->id)])
							@endforeach
							
						</tbody> 
					</table>
					{{$proyectos->links()}}
				</div>
		  	</div>
		</div>
    </div>
</div>

@include('investigation.modals.filter_project', ['title' => 'Filtrar', 'route' => 'proyecto.index'])
@endsection