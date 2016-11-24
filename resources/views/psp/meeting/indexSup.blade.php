@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">            
                <h3>Lista de Reuniones</h3>            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Reunion</h3>
            </div>
            <div class="panel-body">
                <div class="row"> 
                    <div class="col-md-6">
                        <a href="#filter" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                    </div>  
                    <div class="col-md-6">
                        <a href="{{route('meeting.createSup')}}">
                            {{Form::button('<i class="fa fa-plus"></i> Nueva Reunion',['class'=>'btn btn-success pull-right'])}}
                        </a>
                    </div>
                    
                </div>
                <div class="table-responsive">
                    <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
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
                                </td>                                                        
                            </tr>                            

                            @endforeach 
                    </table>
                    {{$meetings->links()}}                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('psp.meeting.filter_meeting', ['title' => 'Filtrar', 'route' => 'meeting.indexSup'])
@endsection