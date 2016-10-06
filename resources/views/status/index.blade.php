@extends('app')
@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Lista de Status</h3>
	        </div>
	    </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<a href="{{route('status.create')}}">
			{{Form::button('<i class="fa fa-plus"></i> Crear Status',['class'=>'btn btn-success pull-right'])}}
		</a>
	</div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h3 class="panel-title">Status</h3>
			</div>
		  	<div class="panel-body">
				<table class="table table-striped responsive-utilities jambo_table bulk_action"> 
					<thead> 
						<tr class="headings"> 
							<th>Nombre</th> 
							<th>Tipo</th> 
							<th colspan="2">Acciones</th>
						</tr> 
					</thead> 
					<tbody> 
						@foreach($statuses as $status)
						<tr> 
							<td>{{$status->nombre}}</td> 
							<td>
								@if($status->tipo_estado == 0)
								Proyecto
								@endif
							</td> 
							<td>
								<a href="{{route('status.edit', $status->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-pencil"></i></a>
								<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$status->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
							</td>
						</tr> 

						@include('modals.delete', ['id'=> $status->id, 'message' => '¿Esta seguro que desea eliminar este status?', 'route' => route('status.delete', $status->id)])
						@endforeach
						
					</tbody> 
				</table>
				<div class="row">
					<div class="col-md-12">
						<a class="btn btn-default pull-right" href="{{ route('status.indexType') }}">Regresar</a>
					</div>
				</div>
		  	</div>
		</div>
    </div>
</div>


@endsection