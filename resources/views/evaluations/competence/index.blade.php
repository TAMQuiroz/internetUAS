@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Competencias a evaluar en la especialidad</h3>
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
                        <a href="{{ route('competencia.create') }}" class="btn btn-success pull-right">
                            <i class="fa fa-plus"></i> Nueva Competencia</a>
                    </div>
                </div>

                <div class="x_content">
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Nombre </th>                        
                            <th class="column-title">Descripción </th>    
                            <th class="column-title last">Acciones</th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($competences as $competence)
                        <tr class="even pointer">                            
                            <td class=" ">{{ $competence->nombre }}</td>                            
                            <td class=" ">{{ $competence->descripcion }}</td> 
                            <td class=" ">
                                <a href="{{route('competencia.edit',$competence->id)}}" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$competence->id}}">
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
@endsection