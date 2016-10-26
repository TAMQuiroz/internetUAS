@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Información de módulos para PSP</h3>
			</div>
		</div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{{route('pspProcess.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Agregar curso</a>
                </div>
                <div class="form-horizontal">   

                    <h2>Cursos PSP activos en la facultad</h2>
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">Código </th>
                            <th class="column-title">Nombre curso</th>
                            <th class="column-title">Ciclo activo</th>
                            <th class="column-title last">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($procesos!=null)
                            @foreach($procesos as $proceso)                            
                            <tr class="even pointer">
                                <td class="a-center ">{{$proceso['codCurso']}}</td>
                                <td>{{$proceso['nomCurso']}} </td>
                                <td>{{$proceso['ciclo']}} </td>
                                <td >
                                    <a href="{{ route('pspProcess.show', $proceso['id']) }}"  class="btn btn-primary btn-xs" ><i class="fa fa-search"></i></a>
                                    <a href="" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                    <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$proceso['id']}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                            @include('modals.delete', ['id'=> $proceso['id'], 'message' => '¿Esta seguro que desea eliminar este proceso?', 'route' => route('pspProcess.delete', $proceso['id'])])
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