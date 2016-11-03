
@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Periodos</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(Session::get('period-code')==null)
                        <a href="{{ route('createPeriod.faculty') }}" class="btn btn-success pull-right">
                                <i class="fa fa-plus"></i> Iniciar Nuevo Periodo</a>
                        @endif
                    </div>
                </div>

                <div class="x_content">
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Estado </th>
                        <th class="column-title">Ciclo de Inicio </th>
                        <th class="column-title">Ciclo de Fin </th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($periods as $p)
                            <tr class="even pointer">
                                <td class="a-center ">
                                    @if($p->Vigente)
                                        <span class="label label-success">Activo</span>
                                    @else
                                        <span class="label label-danger">Cerrado</span>
                                    @endif
                                </td>
                                <td>{{ $p->configuration->cycleAcademicStart->Descripcion or 'No ha sido definida' }} </td>
                                <td>{{ $p->configuration->cycleAcademicEnd->Descripcion or 'No ha sido definida' }} </td>
                                <td>
                                    @if($p->Vigente)
                                        <a href="{{ url("/faculty/periods/{$p->IdPeriodo}") }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
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