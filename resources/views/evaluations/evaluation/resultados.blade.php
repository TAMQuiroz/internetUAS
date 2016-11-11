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
            <h4>Código de evaluación: {{ $evaluation->id }}</h4>
            <h4>Evaluación: {{ $evaluation->nombre }}</h4>
            <h4>Cantidad de competencias evaluadas: {{ count($compxtutxevs) }}</h4>            
            <h4>Cantidad de alumnos objetivo: {{ $total_students  }}</h4>
            <h4>Cantidad de alumnos evaluados: {{ $compxtutxevs[0]->cantidad  }}</h4>
            <h4>Aceptación: {{round( ($compxtutxevs[0]->cantidad / $total_students)*100 ,2) }}%</h4>
            <h4>Puntaje total de la evaluación: {{$total_puntaje}}</h4>                         
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">                    
                    <col width="50%" >
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">                    
                    <thead>
                        <tr class="headings">                                                        
                            <th class="column-title">Competencia</th>             
                            <th class="centered column-title">Puntaje base</th>                            
                            <th class="centered column-title">Mínimo</th>
                            <th class="centered column-title">Máximo</th>
                            <th class="centered column-title">Promedio</th>
                            <th class="centered column-title">Promedio(%)</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compxtutxevs as $compxtutxev)                        
                        <tr class="even pointer">                            
                            <td class=" ">{{$compxtutxev->nombre }}</td>                            
                            <td class="centered ">{{$compxtutxev->maximo }}</td>                            
                            <td class="centered ">{{$compxtutxev->min }}</td>
                            <td class="centered ">{{$compxtutxev->max }}</td>
                            <td class="centered ">{{round ($compxtutxev->prom_punt ,2)}}</td>
                            <td class="centered ">{{round( ($compxtutxev->prom_punt / $compxtutxev->maximo)*100 ,2)}}%</td>
                        </tr>                                           
                        @endforeach
                    </tbody>
                </table>                
            </div>             
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a class="btn btn-default pull-left" href="{{ route('evaluacion.ver_evaluaciones_alumnos_coord',$evaluation->id) }}"><i class="fa fa-backward" aria-hidden="true"></i> Regresar</a>
                    <a class="btn btn-primary pull-right" href="{{ route('evaluacion.enviar_resultados',$evaluation->id) }}">Enviar resultados a alumnos <i class="fa fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection