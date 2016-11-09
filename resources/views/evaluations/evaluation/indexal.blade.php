@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Mis evaluaciones</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="">                
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- <a data-toggle="modal" data-target="#filter-evaluations"  class="btn btn-warning pull-left">
                        <i class="fa fa-filter"></i> Filtrar
                    </a>  -->                   
                </div>
            </div>   
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">                    
                    <col width="10%">
                    <col width="20%">
                    <col width="20%">
                    <col width="40%">                                                                       
                    <col width="10%">
                    <thead>
                        <tr class="headings">       
                            <th class="centered column-title">Estado </th>    
                            <th class="centered column-title">Vigencia </th>    
                            <th class="centered column-title">Fecha y hora de evaluación </th>    
                            <th class=" column-title">Evaluación</th>
                            <th class="centered column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluations as  $key => $evaluation) 
                        @if( (   ($evaluation->estado == 2) && ($evaluation->fecha_inicio <= date("Y-m-d", time())) && ($evaluation->fecha_fin > date("Y-m-d", time()-86400))    )  || $tutstudentxevaluations[$key]->fecha_hora != null)
                        <tr class="even pointer">   
                            <td class="centered">
                            @if($tutstudentxevaluations[$key]->fecha_hora == null)
                            <span class="label label-success"> Pendiente </span>
                            @elseif($tutstudentxevaluations[$key]->corregida == 1)
                            <span class="label label-primary"> Corregida </span>
                            @else
                            <span class="label label-warning"> Por corregir </span>
                            @endif    
                            </td>                                  

                            <td class="centered">{{date("d/m/Y", strtotime($evaluation->fecha_inicio)).' - '.date("d/m/Y", strtotime($evaluation->fecha_fin)) }}</td>

                            @if($tutstudentxevaluations[$key]->fecha_hora != null)
                            <td class="centered">{{ date("d/m/Y g:i a", strtotime($tutstudentxevaluations[$key]->fecha_hora))}}</td>
                            @else
                            <td class="centered">-</td>
                            @endif   

                            <td class="">{{ $evaluation->nombre }}</td>

                            <td class="centered">                                
                                @if($tutstudentxevaluations[$key]->intentos > 0)
                                <a href="{{route('evaluacion.rendir',$evaluation->id)}}" title="Rendir evaluación" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>                                                            
                                
                                @elseif($tutstudentxevaluations[$key]->corregida == 1)
                                <a href="{{route('evaluacion.mis_resultados',[$id_tutstudent,$evaluation->id])}}" title="Ver resultados" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-file-text"></i>
                                </a> 
                                @else
                                -                                                           
                                @endif
                            </td>
                        </tr>                        
                        @endif                        
                        @endforeach
                    </tbody>
                </table>
                
            </div>             
            
        </div>
    </div>
</div>
@include('evaluations.modals.filter_evaluations', ['title' => 'Filtrar', 'route' => route('evaluacion.index')])
@endsection