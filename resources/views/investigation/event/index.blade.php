@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Eventos de Investigación</h3>
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
                        <a href="{{ route('evento.create') }}" class="btn btn-success pull-right">
                            <i class="fa fa-plus"></i> Nuevo Evento</a>
                    </div>
                </div>

                <div class="x_content">
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Código </th>
                        <th class="column-title">Nombre </th>
                        <th class="column-title">Tipo </th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr class="even pointer">
                            <td hidden class="event-id">{{ $event->id }}</td>
                            <td class=" ">{{ $event->id }}</td>
                            <td class=" ">{{ $event->nombre }}</td>
                            @if($event->tipo == 0)
                                <td class=" ">Público</td>
                            
                            @else
                                <td class=" ">Privado</td>
                            
                            @endif
                            <td class=" ">
                                    <a href="{{route('evento.show',$event->id)}}" class="btn btn-primary btn-xs view-event""><i class="fa fa-search"></i></a>
                                    <a href="" class="btn btn-danger btn-xs delete-event" data-toggle="modal" data-target="#{{$event->id}}"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $event->id, 'message' => '¿Esta seguro que desea eliminar este evento?', 'route' => route('evento.delete', $event->id)])
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection