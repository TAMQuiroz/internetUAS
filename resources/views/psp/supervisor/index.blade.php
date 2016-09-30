@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Supervisores</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('supervisor.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Nuevo Supervisor</a>
                    </div>
                </div>
                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Código</th>
                        <th class="column-title">Nombre</th>
                        <th class="column-title">Apellido</th>
                        <th class="column-title">Correo</th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    	<tr class="even pointer">
                            <td class="teachercode">20112188</td>
                            <td class=" ">Claudia</td>
                            <td class="">Villanueva</td>
                            <td class="teacherEmail">claudia@pucp.pe</td>
                            <td class=" ">
                            		<a class="btn btn-primary btn-xs view-user" ><i class="fa fa-search"></i></a>
                                    <a href="{{ route('supervisor.edit', ['id' => 1]) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs delete-teacher" data-toggle="modal" data-target=".bs-example-modal-sm" title="Eliminar"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection