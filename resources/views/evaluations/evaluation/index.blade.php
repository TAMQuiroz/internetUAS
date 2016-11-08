@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Evaluaciones</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="">                
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="#filter-evaluations"  class="btn btn-warning pull-left">
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
                    <col width="30%">
                    <col width="10%">                    
                    <col width="10%">                    
                    <col width="15%">
                    <col width="15%">
                    <thead>
                        <tr class="headings">                            
                            <th class="centered column-title">Estado </th>                        
                            <th class="centered column-title">Código </th>    
                            <th class="column-title">Nombre </th>    
                            <th class="centered column-title">Desde </th>    
                            <th class="centered column-title">Hasta </th>    
                            <th class="centered column-title">Cant. preguntas</th>    
                            <!-- <th class="column-title">Avance </th>                             -->
                            <th class="centered column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluations as $evaluation)
                        <tr class="even pointer">                        
                            @if($evaluation->estado == 1)
                            <td class="centered"><span class="label label-primary"> Registrada </span></td>
                            @elseif($evaluation->estado == 0)
                            <td class="centered"><span class="label label-danger"> Cancelada </span></td>
                            @elseif($evaluation->estado == 2)
                            <td class="centered"><span class="label label-success"> Activa </span></td>
                            @elseif($evaluation->estado == 3)
                            <td class="centered"><span class="label label-default"> Inactiva </span></td>
                            @endif
                            <td class="centered ">{{ $evaluation->id }}</td>              
                            <td class=" ">{{ $evaluation->nombre }}</td>     
                            <td class="centered ">{{date("d/m/Y", strtotime($evaluation->fecha_inicio)) }}</td>
                            <td class="centered ">{{date("d/m/Y", strtotime($evaluation->fecha_fin)) }}</td>
                            <td class="centered ">{{ count($evaluation->preguntas) }}</td>              
                            
                            <td class="centered">
                                @if($evaluation->estado == 1)
                                <a href="{{route('evaluacion.edit',$evaluation->id)}}" title="Editar" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#activar_{{$evaluation->id}}" title="Activar" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-check"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" title="Eliminar" data-toggle="modal" data-target="#{{'eliminar'.$evaluation->id}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                                @endif
                                @if($evaluation->estado == 2)    
                                <a href="{{route('evaluacion.ver_evaluaciones_alumnos_coord',$evaluation->id)}}" class="btn btn-primary btn-xs" title="Visualizar" >
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#cancelar_{{$evaluation->id}}" class="btn btn-danger btn-xs" title="Cancelar" >
                                    <i class="fa fa-remove"></i>
                                </a>
                                @endif
                                @if($evaluation->estado == 0)  
                                <a href="#activar_{{$evaluation->id}}" class="btn btn-primary btn-xs" title="Activar" >
                                    <i class="fa fa-check"></i>
                                </a>
                                @endif
                                @if($evaluation->estado == 3)
                                <a href="{{route('evaluacion.ver_evaluaciones_alumnos_coord',$evaluation->id)}}" class="btn btn-primary btn-xs" title="Visualizar" >
                                    <i class="fa fa-eye"></i>
                                </a>                               
                                @endif
                            </td>
                        </tr>
                        @include('evaluations.modals.delete', ['id'=> 'cancelar_'.$evaluation->id, 'message' => 'Está a punto de cancelar esta evaluación. Si continúa, ningún alumno tendrá acceso a rendirla. ¿Desea continuar?', 'route' => route('evaluacion.cancel', $evaluation->id)])

                        @include('evaluations.modals.delete', ['id'=> 'activar_'.$evaluation->id, 'message' => 'Está a punto de activar esta evaluación. Si continúa, se enviará un correo a cada alumno participante y ellos tendrán acceso a rendirla a partir de la fecha de inicio. Además, no podrá modificar la evaluación. ¿Desea continuar?', 'route' => route('evaluacion.activate', $evaluation->id)])

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