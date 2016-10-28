@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Fases</h3>
			</div>
		</div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('phase.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Nueva Fase</a>
                    </div>
                </div>
                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Numero</th>
                        <th class="column-title">Descripción</th>
                        <th class="column-title">Fecha de Inicio</th>
                        <th class="column-title">Fecha de Fin</th>
                        <th colspan="2">Acciones</th>    
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach($Phaseses as $Phases)      	
                    	<tr class="even pointer">
                            <td >{{$Phases->numero}}</td>
                            <td >{{$Phases->descripcion}}</td>
                            <td >{{$Phases->fecha_inicio}}</td>
                            <td >{{$Phases->fecha_fin}}</td>
                            <td >
                        		<a href="{{ route('phase.show', $Phases->id) }}"  class="btn btn-primary btn-xs" ><i class="fa fa-search"></i></a>
                                <a href="{{ route('phase.edit', $Phases->id) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                
                                <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$Phases->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $Phases->id, 'message' => '¿Esta seguro que desea eliminar esta fase?', 'route' => route('phase.delete', $Phases->id)])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection