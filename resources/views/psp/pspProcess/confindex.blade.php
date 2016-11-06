@extends('app')
@section('content')


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
        <div class="panel-heading">
                <h3 class="panel-title">Cursos PSP en la facultad</h3>
            </div>
            <div class="panel-body">
                <div class="form-horizontal">   
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">Código </th>
                            <th class="column-title">Nombre curso</th>
                            <th class="column-title">Ciclo</th>
                            <th class="column-title last">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($procesos!=null)
                            @foreach($procesos as $proceso)                            
                            <tr class="even pointer">
                                <td class="a-center ">{{$proceso->Course->Codigo}}</td>
                                <td>{{$proceso->Course->Nombre}} </td>
                                <td>{{$proceso->Cicle->Descripcion}} </td>
                                <td >
                                    <a href="{{ route('pspProcess.editconf', $proceso['id']) }}"  class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif                            
                        </tbody>
                    </table>
                </div>
                @if($procesos == null)
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-warning">
                            <strong>Advertencia: </strong> No hay modulos activos.
                        </div>
                    </div>
                </div>    
                @endif
            </div>
        </div>
    </div>
</div>                

@endsection