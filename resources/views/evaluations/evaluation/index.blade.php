@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Evaluaciones</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">                
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a data-toggle="modal" data-target="#filter-evaluations"  class="btn btn-warning pull-left">
                        <i class="fa fa-filter"></i> Filtrar
                    </a>
                    <a href="{{ route('evaluacion.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i> Nueva evaluación
                    </a>
                </div>
            </div>   
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <col width="10%" >
                    <col width="10%">
                    <col width="10%">
                    <col width="35%">                    
                    <col width="10%">                    
                    <col width="10%">
                    <col width="20%">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Estado </th>                        
                            <th class="column-title">Desde </th>    
                            <th class="column-title">Hasta </th>    
                            <th class="column-title">Nombre </th>    
                            <th class="column-title">Cant. preg </th>    
                            <th class="column-title">Avance </th>                            
                            <th class="column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluations as $evaluation)
                        <tr class="even pointer">                        
                            @if($evaluation->estado == 1)
                            <td class=" ">Registrada</td>
                            @elseif($evaluation->estado == 0)
                            <td class=" ">Cancelada</td>
                            @elseif($evaluation->estado == 2)
                            <td class=" ">Activa</td>
                            @elseif($evaluation->estado == 3)
                            <td class=" ">Inactiva</td>
                            @endif
                            <td class=" ">{{date("d/m/Y", strtotime($evaluation->fecha_inicio)) }}</td>
                            <td class=" ">{{date("d/m/Y", strtotime($evaluation->fecha_fin)) }}</td>
                            <td class=" ">{{ $evaluation->nombre }}</td>              
                            <td class=" ">{{ count($evaluation->preguntas) }}</td>              
                            <td class=" ">-</td>
                            <td class="">
                                @if($evaluation->estado == 1)
                                <a href="{{route('evaluacion.edit',$evaluation->id)}}" title="Editar" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="{{route('evaluacion.activate',$evaluation->id)}}" title="Activar" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-check"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" title="Eliminar" data-toggle="modal" data-target="#{{'eliminar'.$evaluation->id}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                                @endif
                                @if($evaluation->estado == 2)    
                                <a href="" class="btn btn-danger btn-xs delete-group" title="Cancelar" data-toggle="modal" data-target="#{{$evaluation->id}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                                @endif
                                @if($evaluation->estado == 0)  
                                <a href="{{route('evaluacion.activate',$evaluation->id)}}" class="btn btn-default btn-xs" title="Activar" data-toggle="modal">
                                    <i class="fa fa-check"></i>
                                </a>
                                @endif
                                @if($evaluation->estado == 3)
                                <a href="{{route('evaluacion.show',$evaluation->id)}}" title="Visualizar" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-eye"></i>
                                </a>                                
                                @endif
                            </td>
                        </tr>
                        @include('evaluations.modals.delete', ['id'=> $evaluation->id, 'message' => 'Está a punto de cancelar esta evaluación. Si continúa, ningún alumno tendrá acceso a rendirla. ¿Desea continuar?', 'route' => route('evaluacion.cancel', $evaluation->id)])
                        @include('modals.delete', ['id'=> 'eliminar'.$evaluation->id, 'message' => '¿Está seguro que desea eliminar esta evaluación?', 'route' => route('evaluacion.delete', $evaluation->id)])
                        @endforeach
                    </tbody>
                </table>
                {{ $evaluations->links() }}
            </div>             
            
        </div>
    </div>
</div>
@include('evaluations.modals.filter_evaluations', ['title' => 'Filtrar', 'route' => route('evaluacion.index')])
@endsection