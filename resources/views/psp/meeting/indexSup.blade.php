@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Reuniones</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="{{route('meeting.createSup')}}">
            {{Form::button('<i class="fa fa-plus"></i> Nueva Reunion',['class'=>'btn btn-success pull-right'])}}
        </a>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">                
                <div class="clearfix"></div>
            
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Tipo</th>                        
                        <th class="column-title">Alumno involucrado</th>
                        <th class="column-title">Lugar</th>
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Hora</th>
                        <th class="column-title">Estado</th>
                        <th colspan="2">Acciones</th>                     
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($meetings as $key => $meeting)
                        <tr>
                                                        
                            @if($meeting->tiporeunion==1)
                            <td>Supervisor - Alumno</td>
                            @else
                            <td>Supervisor - Jefe</td>
                            @endif
                            {{--Aqui ira el nombre del jefe en caso reservarlo--}} 
                            <td>{{$meeting->student->Nombre.' '.$meeting->student->ApellidoPaterno}}</td>
                            <td>{{$meeting->lugar}}</td>
                            <td>{{$meeting->fecha}}</td>
                            <td>{{$meeting->hora_inicio}} - {{$meeting->hora_fin}}</td>
                            <td>{{$meeting->status->nombre}}</td>                    
                            <td>
                                <a href="{{route('meeting.edit',$meeting->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>                                                                
                                <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$meeting->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                <a href= "{{route('meeting.mail', $meeting->student->idalumno)}}" class="btn btn-primary btn-xs" title="Email"><i class="fa fa-envelope"></i></a>
                            </td>                                                        
                        </tr>
                        @include('modals.delete', ['id'=> $meeting->id, 'message' => '¿Esta seguro que desea cancelar esta reunion?', 'route' => route('meeting.delete', $meeting->id)])

                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection