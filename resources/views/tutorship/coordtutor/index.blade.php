@extends('app')
@section('content')


<div class="page-title">
    <div class="title_left">
        <h3>Coordinadores de Tutoría</h3>
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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="#filter-coords" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                    <a href="{{ route('coordinadorTutoria.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo coordinador</a>
                </div>
            </div>

            

            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Código </th>
                            <th class="column-title">Apellidos y Nombres </th> 
                            <th class="column-title">Especialidad </th>
                            <th class="column-title last">Acciones</th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tutors as $tutor)
                        <tr class="even pointer">                            
                            
                            <td class=" ">{{ $tutor->Codigo }}</td>
                            <td class=" ">{{ $tutor->ApellidoPaterno.' '.$tutor->ApellidoMaterno.', '.$tutor->Nombre }}</td>
                            <td class="">{{ $tutor->faculty->Nombre }}</td>
                            <td class=" ">                                
                                <a href="" title="Desactivar" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$tutor->IdDocente}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $tutor->IdDocente, 'message' => '¿Está seguro que desea desactivar este coordinador?', 'route' => route('coordinadorTutoria.delete', $tutor->IdDocente)])
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>



@include('tutorship.modals.filter', ['title' => 'Filtrar', 'route' => route('coordinadorTutoria.index')])
@endsection