@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
            <h3>Lista de Areas</h3>
	    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h3 class="panel-title">Áreas</h3>
			</div>
		  	<div class="panel-body">
		  		<div class="row">
		  			<div class="col-md-6">
			            <form action="#" method="get">
			                <div class="input-group">
			                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
			                    <input class="form-control" id="area-search" name="q" placeholder="Buscar" required>
			                    <span class="input-group-btn">
			                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			                    </span>
			                </div>
			            </form>
			        </div>
			        @if(Auth::user()->IdPerfil != 5 || Auth::user()->IdPerfil == Config::get('constants.admin'))
					<div class="col-md-6">
						<a href="{{route('area.create')}}">
							{{Form::button('<i class="fa fa-plus"></i> Crear Area',['class'=>'btn btn-success pull-right'])}}
						</a>
					</div>
					@endif
				</div>
		  		<div class="table-responsive">
					<table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
						<thead> 
							<tr class="headings"> 
								<th>Nombre</th> 
								<th>Descripcion</th> 
								<th colspan="2">Acciones</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($areas as $area)
							<tr> 
								<td>{{$area->nombre}}</td> 
								<td>{{$area->descripcion}}</td> 
								<td>
									<a href="{{route('area.edit', $area->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-pencil"></i></a>
									@if(Auth::user()->IdPerfil != 5 || Auth::user()->IdPerfil == Config::get('constants.admin'))
									<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$area->id}}" ti
									tle="Eliminar"><i class="fa fa-remove"></i></a>
									@endif
								</td>
							</tr> 

							@include('modals.delete', ['id'=> $area->id, 'message' => '¿Esta seguro que desea eliminar esta area?', 'route' => route('area.delete', $area->id)])
							@endforeach
							
						</tbody> 
					</table>
				</div>
		  	</div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/intranetjs/investigation/area/index-area.js')}}"></script>

@endsection