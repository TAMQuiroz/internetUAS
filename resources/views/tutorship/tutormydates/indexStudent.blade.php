@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Mis Citas</h3>
    </div>    
</div>
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-sm-4 col-xs-4">
                <a href="#filter-tutorDates" class="btn btn-warning"><i class="fa fa-filter"></i> Filtrar</a>                
            </div>            
            
            <div class="col-sm-4 col-xs-4 pull-right">
                @if(Auth::user()->student)
                <a href="{{ route('cita_alumno.create', Auth::user()->student->id) }}" class="btn btn-submit pull-right"><i class="fa fa-plus"></i>  Nueva cita</a>
                @else
                <a href="{{ route('mis_alumnos.index') }}" class="btn btn-submit pull-right"><i class="fa fa-plus"></i>  Nueva cita</a>
                @endif
            </div>
        </div>

        <div class="table-responsive">
        <table class="table table-striped responsive-utilities jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">Estado </th>
                    <th class="column-title">Código </th>
                    <th class="column-title">Hora inicio </th>                    
                    <th class="column-title">Tema</th> 
                    <th class="column-title">Accion</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($tutMeetings as  $key => $tutMeeting)
                <tr class="even pointer">
                    <td hidden class="group-id">{{$tutMeeting->id}}</td>

                    <td class="">
                        @if($tutMeeting->estado == Config::get('constants.cancelada') || $tutMeeting->estado == Config::get('constants.rechazada') )
                        <span class="label label-danger"> 
                        @elseif($tutMeeting->estado == Config::get('constants.pendiente'))
                        <span class="label label-warning"> 
                        @elseif($tutMeeting->estado == Config::get('constants.sugerida'))
                        <span class="label label-success color-status-4">
                        @else
                        <span class="label label-success"> 
                        @endif
                            @if($tutMeeting->estado == Config::get('constants.pendiente'))
                                Pendiente
                            @elseif($tutMeeting->estado == Config::get('constants.confirmada'))
                                Confirmada
                            @elseif($tutMeeting->estado == Config::get('constants.cancelada'))
                                Cancelada
                            @elseif($tutMeeting->estado == Config::get('constants.sugerida'))
                                Sugerida
                            @elseif($tutMeeting->estado == Config::get('constants.rechazada'))
                                Rechazada
                            @elseif($tutMeeting->estado == Config::get('constants.asistida'))
                                Asistida
                            @elseif($tutMeeting->estado == Config::get('constants.noasistida'))
                                No asistida
                            @endif
                        </span>
                    </td>
                    
                    <td class=" ">{{ $tutMeeting->tutstudent->codigo }}</td>                                      

                    <td class=" ">{{ $tutMeeting->inicio }}</td>

                    <td class=" ">{{ $tutMeeting->topic->nombre }}</td>

                    <td class=" ">

                        @if((($tutMeeting->estado == Config::get('constants.pendiente')) && ($tutMeeting->creador == 0)) || (($tutMeeting->estado == Config::get('constants.sugerida')) && ($tutMeeting->creador == 1)) || ($tutMeeting->estado == Config::get('constants.confirmada')) || ($tutMeeting->estado == Config::get('constants.rechazada')) || ($tutMeeting->estado == Config::get('constants.cancelada')))
                        <a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ver{{$tutMeeting->id}}" title="Ver"><i class="fa fa-eye"></i></a>
                        @endif
                        @if((($tutMeeting->estado == Config::get('constants.sugerida')) && ($tutMeeting->creador == 1)))
                        <a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#confirmar{{$tutMeeting->id}}" title="Confirmar"><i class="fa fa-check"></i></a>
                        @if(($tutMeeting->estado == Config::get('constants.sugerida')) && ($tutMeeting->creador == 1))
                        <a href="#rechazar{{$tutMeeting->id}}" class="btn btn-danger btn-xs" title="Rechazar"><i class="fa fa-remove"></i></a>
                        @endif
                        @elseif(($tutMeeting->estado == Config::get('constants.confirmada')) || (($tutMeeting->estado == Config::get('constants.pendiente')) && ($tutMeeting->creador == 0)))
                        <a href="#cancelar{{$tutMeeting->id}}" class="btn btn-danger btn-xs" title="Cancelar"><i class="fa fa-remove"></i></a>
                        @endif
                    </td>                    
                </tr>

                @include('tutorship.tutormydates.accept-cita', ['id'=> "confirmar".$tutMeeting->id, 'message' => 'Esta a punto de confirmar esta cita, ¿Desea continuar?', 'route' => route('mis_citas.accept', $tutMeeting->id)])
                @include('tutorship.tutormydates.refuse-cita', ['id'=> "rechazar".$tutMeeting->id, 'route' => route('mis_citas.refuse', $tutMeeting->id), 'cita' => $tutMeeting, 'motivos' => $motivos])
                @include('tutorship.tutormydates.cancel-cita', ['id'=> "cancelar".$tutMeeting->id, 'route' => route('mis_citas.delete', $tutMeeting->id), 'cita' => $tutMeeting, 'motivos' => $motivos])
                @include('tutorship.tutormydates.ver-cita', ['id'=> "ver".$tutMeeting->id, 'message' => 'Ver cita', 'cita' => $tutMeeting])
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

@include('tutorship.modals.filterTutstudentDates', ['title' => 'Filtrar', 'route' => route('miscitas.index')])


@endsection