@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Información de empresa</h3>
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
                        <a href="{{ route('inscription.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Nuevo inscription</a>
                    </div>
                </div>
                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Nombre de area</th>
                        <th class="column-title">Puesto</th>
                        <th class="column-title">Razon social</th>
                        <th class="column-title last">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach($inscriptiones as $inscription)      	
                    	<tr class="even pointer">
                            <td >{{$inscription->nombre_area}}</td>
                            <td >{{$inscription->puesto}}</td>
                            <td >{{$inscription->razon_social}}</td>
                            <td >
                        		<a href="{{ route('inscription.show', $inscription->id) }}"  class="btn btn-primary btn-xs" ><i class="fa fa-search"></i></a>
                                <a href="{{ route('inscription.edit', $inscription->id) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                <!--<a class="btn btn-danger btn-xs delete-teacher" data-toggle="modal" data-target=".bs-example-modal-sm" title="Eliminar"><i class="fa fa-remove"></i></a>-->
                                <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$inscription->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $inscription->id, 'message' => '¿Esta seguro que desea eliminar esta información?', 'route' => route('inscription.delete', $inscription->id)])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection