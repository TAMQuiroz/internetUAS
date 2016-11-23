@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Mis Citas</h3>
    </div>    
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-sm-4 col-xs-5">
                <div class="btn-group">
                    <a href="#filter-tutorDates" class="btn btn-warning"><i class="fa fa-filter"></i> Filtrar</a>                
                    <a href="{{ route('cita_alumno.index_table') }}" class="btn btn-warning"><i class="fa fa-times"></i></a>
                </div>
            </div>            
            <div class="col-sm-4 col-xs-7 text-center">
                <a href="{{ route('cita_alumno.index')}}" class="btn btn-default"><i class="fa fa-eye"></i>  Cambiar vista</a>
            </div>
            <div class="col-sm-4 col-xs-12">
                <a href="{{ route('mis_alumnos.index') }}" class="btn btn-submit pull-right"><i class="fa fa-plus"></i>  Nueva cita</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered responsive-utilities jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title">Estado </th>
                        <th class="column-title">Fecha </th>
                        <th class="column-title">Hora </th>
                        <th class="column-title">Alumno</th>
                        <th class="column-title">Tema</th>
                        <th class="column-title">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tutMeetings as $key => $tutMeeting)
                    <tr class="even pointer">
                        <td hidden class="group-id">{{ $tutMeeting->id }}</td>

                        <td class="">
                            <span class="label label-success color-status-{{$tutMeeting->estado}}"> 
                                {{$status[$tutMeeting->estado]}} 
                            </span>
                        </td>

                        <td class="text-center">
                            {{ $fecha[$key] }}
                        </td>

                        <td class="text-center">
                            {{$hora_inicio[$key]}} - {{$hora_fin[$key]}}
                        </td>                       
                        <td class=" ">
                            {{ $students[$key]->ape_paterno.' '.$students[$key]->ape_materno.', '.$students[$key]->nombre }}
                        </td>

                        <td class=" ">
                            {{ $topics[$key]->nombre }}
                        </td> 

                        <td class="text-center">
                            @if($tutMeeting->estado != 1 && 
                                $tutMeeting->estado != 2 && 
                                $tutMeeting->estado != 4)
                                <a href="" class="btn btn-primary btn-xs view-group" title="Ver" style="height: inherit;">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endif
                            @if($tutMeeting->estado == 1)
                                <a href="" class="btn btn-success btn-xs view-group" title="Confirmar" style="height: inherit;">
                                    <i class="fa fa-check"></i>
                                </a>
                            @endif
                            @if($tutMeeting->estado == 2)
                                <a href="" class="btn btn-warning btn-xs view-group" title="Atender" style="height: inherit;">
                                    <i class="fa fa-database"></i>
                                </a>
                            @endif
                            @if($tutMeeting->estado == 1 || 
                                $tutMeeting->estado == 2 || 
                                $tutMeeting->estado == 4)
                                <a href="" class="btn btn-danger btn-xs view-group" title="Cancelar" style="height: inherit;">
                                    <i class="fa fa-close"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('tutorship.modals.filterTutorDates', ['title' => 'Filtrar', 'route' => route('cita_alumno.index_table')])

@endsection