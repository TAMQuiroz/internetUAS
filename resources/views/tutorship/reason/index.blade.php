@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Motivos</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">

            </div>
        </div>
    </div>
</div>

<div class="clearfix">

</div>


<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
    <div class="x_title">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="{{ route('motivo.create') }}" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i>
                    Nuevo Motivo</a>
                </div>
            </div>

            <div class="x_content">
                <div class="clearfix"></div>
            </div>
            <div class="">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">Código </th>
                            <th class="column-title">Tipo </th>                        
                            <th class="column-title">Nombre </th>                        
                            <th class="column-title last">Acciones</th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reasons as $reason)
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $reason->id }}</td>
                            <td class=" ">{{ $reason->id }}</td>
                            <td class=" "> @if ($reason->tipo == 1) De cancelación/rechazo de cita @else De desactivación de tutor @endif </td>
                            <td class=" ">{{ $reason->nombre }}</td>                            
                            <td class=" ">
                                <a href="{{route('motivo.edit',$reason->id)}}" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$reason->id}}">
                                    <i class="fa fa-remove"></i>
                                </a>
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