@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Documentos</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('new.template') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Nuevo Documento</a>
                    </div>
                </div>
                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Titulo</th>
                        <th class="column-title">Plantilla</th>
                        <th class="column-title">Obligatorio</th>
                        <th class="column-title">Fase</th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    	<tr class="even pointer">
                            <td class="">Ficha de Inscripcion</td>
                            <td class=" ">FichaInscr.xls</td>
                            <td class="">Obligatorio</td>
                            <td class="">1</td>
                            <td class=" ">
                                    <a href="{{ route('template.edit',1) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs delete-teacher" data-toggle="modal" data-target=".bs-example-modal-sm" title="Eliminar"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection