@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Competencias</h3>
    </div>        
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ route('competencia.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i> Nueva Competencia</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <col width="5%" >
                        <col width="20%" >
                        <col width="60%">
                        <col width="15%">
                        <thead>
                            <tr class="headings">                            
                                <th class="centered column-title">Código </th>                        
                                <th class="centered column-title">Nombre </th>                        
                                <th class="column-title">Descripción </th>    
                                <th class="centered column-title last">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($competences as $competence)
                            <tr class="even pointer">                            
                                <td class="centered">{{ $competence->id }}</td>                            
                                <td class="centered">{{ $competence->nombre }}</td>                            
                                <td class=" ">{{ $competence->descripcion }}</td> 
                                <td class="centered">
                                    <a href="{{route('competencia.edit',$competence->id)}}" title="Editar" class="btn btn-primary btn-xs view-group"">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger btn-xs delete-group" title="Eliminar" data-toggle="modal" data-target="#{{$competence->id}}">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                            @include('modals.delete', ['id'=> $competence->id, 'message' => '¿Está seguro que desea eliminar esta competencia?', 'route' => route('competencia.delete', $competence->id)])
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    @endsection