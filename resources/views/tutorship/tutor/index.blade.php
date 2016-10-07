@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Tutores</h3>
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
                        <a href="#filter-tutors" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                        <a href="{{ route('tutor.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo tutor</a>
                    </div>
                </div>

                <div class="x_content">
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">Estado </th>
                            <th class="column-title">Código </th>
                            <th class="column-title">Apellidos y Nombres </th>                        
                            <th class="column-title">Correo </th>
                            <th class="column-title">Horas a la semana </th>
                            <th class="column-title last">Acciones</th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tutors as $tutor)
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $tutor->IdDocente }}</td>
                            
                            @if ($tutor->rolTutoria == 1) 
                                <td class=""><span class="label label-success"> Activo </span></td>
                            @elseif ($tutor->rolTutoria == 0) 
                                <td class=""><span class="label label-danger"> Inactivo </span></td>
                            @endif

                            <td class=" ">{{ $tutor->Codigo }}</td>
                            <td class=" ">{{ $tutor->ApellidoPaterno.' '.$tutor->ApellidoMaterno.', '.$tutor->Nombre }}</td>
                            <td class=" ">{{ $tutor->Correo }}</td>
                            <td class=" ">-</td>                            
                            <td class=" ">
                                <a href="{{route('tutor.show',$tutor->IdDocente)}}" class="btn btn-primary btn-xs view-group"">
                                <i class="fa fa-search"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$tutor->IdDocente}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $tutor->IdDocente, 'message' => '¿Está seguro que desea desactivar este tutor?', 'route' => route('tutor.delete', $tutor->IdDocente)])
                        @endforeach
                    </tbody>
                </table>
                {{ $tutors->links() }}
            </div>
        </div>
    </div>
@include('tutorship.modals.filter', ['title' => 'Filtrar'])
@endsection