@extends('app')
@section('content')

<div class="page-title">
    <div class="title_left">
        <h3>Reservar Cita</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                @if($meetings->count()==NULL)
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('meeting.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Nueva Cita</a>
                    </div>
                @endif
                </div>
                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Reunión</th>
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Hora</th>  
                        <th class="column-title">Estado</th>  
                        <th colspan="2">Acciones</th>                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($meetings as $meeting)
                        <tr> 
                            <td>{{$meeting->id}}</td> 
                            <td>{{$meeting->fecha}}</td> 
                            <td>{{$meeting->hora_inicio}}</td> 
                            <td>{{$meeting->status->nombre}}</td>
                            <td>
                                <a href="{{route('meeting.show', $meeting->id)}}" class="btn btn-primary btn-xs" title="Mostrar"><i class="fa fa-search"></i></a>
                            </td>
                        </tr> 
                        @include('modals.delete', ['id'=> $meeting->id, 'message' => '¿Esta seguro que desea eliminar esta cita?', 'route' => route('meeting.delete', $meeting->id)])
                        @endforeach
                    </tbody>
                </table>
                {{$meetings->links()}}
            </div>
        </div>
    </div>
@endsection