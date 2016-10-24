@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Activar módulo</h3>
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
                        <a href="{{route('pspProcess.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Activar nuevo ciclo</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Estado </th>
                        <th class="column-title">Nombre de curso </th>
                        <th class="column-title">Ciclo </th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($proceso as $p)
                            <tr class="even pointer">
                                <td class="a-center ">
                                    @if($p->Vigente)
                                        <span class="label label-success">Activo</span>
                                    @else
                                        <span class="label label-danger">Cerrado</span>
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    @if($p->Vigente)
                                        <a href="" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection