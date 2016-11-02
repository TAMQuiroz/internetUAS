@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Mis Evaluaciones</h3>
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
                </div>
            </div>   
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">                    
                    <col width="30%">
                    <col width="10%">
                    <col width="30%">                    
                    <col width="10%">                                       
                    <col width="20%">
                    <thead>
                        <tr class="headings">       
                            <th class="column-title">Vigencia </th>    
                            <th class="column-title">Evaluada </th>    
                            <th class="column-title">Nombre </th>                            
                            <th class="column-title">Resultado </th>                            
                            <th class="column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluations as  $key => $evaluation) 
                        @if( (   ($evaluation->estado == 2) && ($evaluation->fecha_inicio <= date("Y-m-d", time())) && ($evaluation->fecha_fin > date("Y-m-d", time()-86400))    )  || ($evaluation->estado == 3))
                        <tr class="even pointer">                                     
                            <td class=" ">{{'Del '.date("d/m/Y", strtotime($evaluation->fecha_inicio)).' al '.date("d/m/Y", strtotime($evaluation->fecha_fin)) }}</td>
                            <td class=" ">-</td>
                            <td class=" ">{{ $evaluation->nombre }}</td>              
                            <td class=" ">-</td>                            
                            <td class="">                                
                                @if($tutstudentxevaluations[$key]->intentos > 0)
                                <a href="{{route('evaluacion.rendir',$evaluation->id)}}" title="Rendir evaluación" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>                                                            
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