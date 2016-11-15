@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
            <h3>Lista de Criterios</h3>
	    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h3 class="panel-title">Criterios</h3>
			</div>
		  	<div class="panel-body">
		  		<div class="row">
		  			<div class="col-md-6">
			            <a href="#filter" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
			        </div>
			        @if(Auth::user()->IdPerfil == Config::get('constants.docente') || Auth::user()->IdPerfil == Config::get('constants.admin'))
					<div class="col-md-6">
						<a href="{{route('pspCriterio.create')}}">
							{{Form::button('<i class="fa fa-plus"></i> Crear Criterio',['class'=>'btn btn-success pull-right'])}}
						</a>
					</div>
					@endif
				</div>
		  		<div class="table-responsive">
					<table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
						<thead> 
							<tr class="headings"> 
								<th>Nombre</th> 
								<th>Peso</th> 
								<th>Curso de PSP</th> 
								<th colspan="2">Acciones</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($criterios as $criterio)
							<tr>								
								<td>{{$criterio->nombre}}</td> 
								<td>{{$criterio->peso}}</td> 
								<td>{{$criterio->pspProcess->course->Nombre}}</td> 
								<td>
									<a href="{{route('pspCriterio.edit', $criterio->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
									@if(Auth::user()->IdPerfil == Config::get('constants.docente') || Auth::user()->IdPerfil == Config::get('constants.admin'))
									<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$criterio->id}}" ti
									tle="Eliminar"><i class="fa fa-remove"></i></a>
									@endif
								</td>
							</tr> 

							@include('modals.delete', ['id'=> $criterio->id, 'message' => '¿Esta seguro que desea eliminar este criterio?', 'route' => route('pspCriterio.delete', $criterio->id)])
							@endforeach
							
						</tbody> 
					</table>
					{{$criterios->links()}}
				</div>
		  	</div>
		</div>
    </div>
</div>

@include('investigation.modals.filter_area', ['title' => 'Filtrar', 'route' => 'area.index'])
@endsection