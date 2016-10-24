@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Evaluadores</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">

                </div>
            </div>
        </div>
    </div>    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="#filter-tutors" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                        <a href="{{ route('evaluador.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo evaluador</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Código </th>
                            <th class="column-title">Apellidos y Nombres </th>                        
                            <th class="column-title">Correo </th>                            
                            <th class="column-title last">Acciones</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluators as $evaluator)
                        <tr class="even pointer">
                            <td class=" ">{{ $evaluator->Codigo }}</td>
                            <td class=" ">{{ $evaluator->ApellidoPaterno.' '.$evaluator->ApellidoMaterno.', '.$evaluator->Nombre }}</td>
                            <td class=" ">{{ $evaluator->Correo }}</td>                            
                            <td class=" ">
                                <!-- <a href="{{route('evaluador.show',$evaluator->IdDocente)}}" title="Ver" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-search"></i>
                                </a> -->
                                <a href="{{route('evaluador.edit',$evaluator->IdDocente)}}" title="Editar" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" title="Desactivar" data-toggle="modal" data-target="#{{$evaluator->IdDocente}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $evaluator->IdDocente, 'message' => '¿Está seguro que desea desactivar este evaluador?', 'route' => route('evaluador.delete', $evaluator->IdDocente)])
                        @endforeach
                    </tbody>
                </table>
                </div>
                
                
            </div>
        </div>
    </div>
<!-- @include('tutorship.modals.filter', ['title' => 'Filtrar', 'route' => route('evaluador.index')]) -->
@endsection