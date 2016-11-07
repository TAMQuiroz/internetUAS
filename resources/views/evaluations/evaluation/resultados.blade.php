@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Resultados de {{$evaluation->nombre}}</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">   
            <h4>Competencias evaluadas: {{count($compxtutxevs)}}</h4>                         
            <h4>Alumnos evaluados: {{$compxtutxevs[0]->cantidad}}</h4>                         
            <h4>Puntaje total: {{$total_puntaje}}</h4>                         
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">                    
                    <col width="40%" >
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="20%">                    
                    <thead>
                        <tr class="headings">                                                        
                            <th class="column-title">Competencia</th>             
                            <th class="column-title">Puntaje base</th>                            
                            <th class="column-title">Mínimo</th>
                            <th class="column-title">Máximo</th>
                            <th class="column-title">Promedio (ptos.)</th>
                            <th class="column-title">Promedio (%)</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compxtutxevs as $compxtutxev)                        
                        <tr class="even pointer">                                                   
                            <!-- <td class=" ">{{$compxtutxev->id_competence }}</td> -->
                            <td class=" ">{{$compxtutxev->nombre }}</td>                            
                            <td class=" ">{{$compxtutxev->maximo }}</td>                            
                            <td class=" ">{{$compxtutxev->min }}</td>
                            <td class=" ">{{$compxtutxev->max }}</td>
                            <td class=" ">{{$compxtutxev->prom_punt }}</td>
                            <td class=" ">{{ ($compxtutxev->prom_punt / $compxtutxev->maximo)*100 }} %</td>
                        </tr>                                           
                        @endforeach
                    </tbody>
                </table>                
            </div>             
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a class="btn btn-default pull-left" href="{{ route('evaluacion.ver_evaluaciones_alumnos_coord',$evaluation->id) }}">Regresar</a>
                    <a class="btn btn-primary pull-right" href="{{ route('evaluacion.enviar_resultados',$evaluation->id) }}">Enviar resultados a alumnos <i class="fa fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection