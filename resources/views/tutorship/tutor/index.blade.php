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
        <div class="">
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
                        <th class="column-title">Horas Semanales </th>
                        <th class="column-title">Alumnos </th>
                        <th class="column-title last">Acciones</th>                            
                    </tr>
                </thead>
                <tbody>
                    @foreach($tutors as $tutor)
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $tutor->IdDocente }}</td>

                            @if ($tutor->rolTutoria == 1) 
                                <td class=""><span class="label label-success"> Activo </span></td>
                            @elseif ($tutor->rolTutoria == 3) 
                                <td class=""><span class="label label-danger"> Inactivo </span></td>
                            @endif

                            <td class=" ">{{ $tutor->Codigo }}</td>
                            <td class=" ">{{ $tutor->ApellidoPaterno.' '.$tutor->ApellidoMaterno.', '.$tutor->Nombre }}</td>
                            <td class=" ">{{ $tutor->Correo }}</td>
                            <td class=" ">{{ $horas[$tutor->IdDocente] }}</td>                            
                            <td class=" ">{{ $alumnos[$tutor->IdDocente] }}</td> 
                            <td class=" ">
                                <a href="{{route('tutor.show',$tutor->IdDocente)}}" title="Ver" class="btn btn-primary btn-xs view-group">
                                    <i class="fa fa-search"></i>
                                </a>
                                @if ($tutor->rolTutoria == 1)
                                    <a href="" class="btn btn-danger btn-xs delete-group" title="Desactivar" data-toggle="modal" data-target="#{{$tutor->IdDocente}}">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                @elseif ($tutor->rolTutoria == 3) 
                                    <a href="" class="btn btn-danger btn-xs delete-group" title="Activar" data-toggle="modal" data-target="#{{$tutor->IdDocente}}">
                                        <i class="fa fa-check"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>

                        @if ($alumnos[$tutor->IdDocente]==0 && $tutor->rolTutoria == 1)                        
                            @include('modals.delete', ['id' => $tutor->IdDocente, 'message' => '¿Está seguro que desea desactivar este tutor?', 'route' => route('tutor.delete', $tutor->IdDocente)])
                        @endif
                        @if ($alumnos[$tutor->IdDocente]>0 && $tutor->rolTutoria == 1)
                            @include('modals.reassign', ['id' => $tutor->IdDocente, 'message' => 'Este tutor tiene asignado '.$alumnos[$tutor->IdDocente].' alumnos. Es necesario hacer una reasignación.', 'route' => route('tutor.reassign', $tutor->IdDocente)])
                        @endif
                        @if ($tutor->rolTutoria == 3)
                            @include('modals.activate', ['id' => $tutor->IdDocente, 'message' => 'Se reasignarán los alumnos que tenía este tutor. ¿Desea activarlo?', 'route' => route('tutor.activate', $tutor->IdDocente)])
                        @endif
                    @endforeach
                </tbody>
            </table>
            {{ $tutors->links() }}
        </div>
    </div>
</div>
@include('tutorship.modals.filter', ['title' => 'Filtrar', 'route' => route('tutor.index')])
@endsection