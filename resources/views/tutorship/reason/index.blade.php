@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Motivos</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">        
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ route('motivo.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i>
                        Nuevo Motivo
                    </a>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">Código </th>
                            <th class="column-title">Tipo </th>                        
                            <th class="column-title">Nombre </th>                        
                            <th class="column-title last">Acciones</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reasons as $reason)
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $reason->id }}</td>
                            <td class=" ">{{ $reason->id }}</td>
                            <td class=" "> @if ($reason->tipo == 1) De cancelación/rechazo de cita @else De desactivación de tutor @endif </td>
                            <td class=" ">{{ $reason->nombre }}</td>                            
                            <td class="">
                                @if($reason->id != 1 && $reason->id != 2 )
                                <a href="{{route('motivo.edit',$reason->id)}}" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$reason->id}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $reason->id, 'message' => '¿Está seguro que desea eliminar este motivo?', 'route' => route('motivo.delete', $reason->id)])
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>


@endsection