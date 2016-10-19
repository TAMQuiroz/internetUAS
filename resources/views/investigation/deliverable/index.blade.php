@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Proyecto: {{$proyecto->nombre}} - Lista de entregables</h3>
	        </div>
	        <div class="pull-right">
	        	<h3>Faltan crear {{$proyecto->num_entregables - count($proyecto->deliverables)}} entregables</h3>
	        </div>
	    </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<a href="{{route('entregable.create',$proyecto->id)}}">
			{{Form::button('<i class="fa fa-plus"></i> Crear Entregable',['class'=>'btn btn-success pull-right'])}}
		</a>
	</div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h3 class="panel-title">Entregables</h3>
			</div>
		  	<div class="panel-body">
				<table class="table table-striped responsive-utilities jambo_table bulk_action"> 
					<thead> 
						<tr class="headings"> 
							<th>Nombre</th> 
							<th>Responsable</th> 
							<th>Fecha de entrega</th> 
							<th>Porcentaje</th> 
							<th colspan="2">Acciones</th>
						</tr> 
					</thead> 
					<tbody> 
						@foreach($entregables as $entregable)
						<tr> 
							<td>{{$entregable->nombre}}</td> 
							<td>
								<ul>
									@if(count($entregable->investigators))
										@foreach($entregable->investigators as $investigator)
											<li> {{$investigator->nombre}} {{$investigator->ape_paterno}} </li>
										@endforeach
									@else
										<li> No hay asignados </li>
									@endif
								</ul>
							</td> 
							<td>{{$entregable->fecha_limite}}</td>	
							<td>{{$entregable->porcen_avance}}%</td>	
							<td>
								<a href="{{route('entregable.show', $entregable->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
								@if(count($entregable->lastversion) != 0)
								<a href="{{route('entregable.download', $entregable->lastversion->first()->id)}}" class="btn btn-primary btn-xs" title="Descargar ultima version"><i class="fa fa-download"></i></a>
								@endif
								<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$entregable->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
							</td>
						</tr> 

						@include('modals.delete', ['id'=> $entregable->id, 'message' => '¿Esta seguro que desea eliminar este entregable?', 'route' => route('entregable.delete', $entregable->id)])
						@endforeach
						
					</tbody> 
				</table>
		  	</div>
		</div>
    </div>
</div>

@endsection