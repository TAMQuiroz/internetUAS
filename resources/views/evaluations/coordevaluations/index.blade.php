@extends('app')
@section('content')


<div class="page-title">
    <div class="title_left">
        <h3>Administradores de Evaluaciones</h3>
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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">                    
                    <a href="{{ route('coordinadorEvaluaciones.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo administrador</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <col width="10%" >
                    <col width="45%" >
                    <col width="30%">
                    <col width="15%">
                    <thead>
                        <tr class="headings">                            
                            <th class="centered column-title">Código </th>
                            <th class="column-title">Apellidos y Nombres </th> 
                            <th class="centered column-title">Especialidad </th>
                            <th class="centered column-title last">Acciones</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $tutor)
                        <tr class="even pointer">
                            <td class="centered">{{ $tutor->Codigo }}</td>
                            <td class=" ">{{ $tutor->ApellidoPaterno.' '.$tutor->ApellidoMaterno.', '.$tutor->Nombre }}</td>
                            <td class="centered">{{ $tutor->faculty->Nombre }}</td>
                            <td class=" centered">                                
                                <a href="" title="Desactivar" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$tutor->IdDocente}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $tutor->IdDocente, 'message' => '¿Está seguro que desea desactivar este administrador?', 'route' => route('coordinadorEvaluaciones.delete', $tutor->IdDocente)])
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection