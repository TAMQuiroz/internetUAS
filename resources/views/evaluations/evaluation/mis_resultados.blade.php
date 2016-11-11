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
            <h4>Puntaje total: {{$total_puntaje}}</h4>                         
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">                    
                    <col width="40%" >                                        
                    <col width="20%">
                    <col width="20%">                    
                    <thead>
                        <tr class="headings">                                                        
                            <th class="column-title">Competencia</th>          
                            <th class="column-title">Puntaje obtenido</th>
                            <th class="column-title">Puntaje (%)</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compxtutxevs as $compxtutxev)                        
                        <tr class="even pointer">                            
                            <td class=" ">{{$compxtutxev->competencia->nombre }}</td>          
                            <td class=" ">{{$compxtutxev->puntaje }}/{{$compxtutxev->puntaje_maximo }}</td>
                            <td class=" ">{{ ($compxtutxev->puntaje / $compxtutxev->puntaje_maximo)*100 }} %</td>
                        </tr>                                           
                        @endforeach
                    </tbody>
                </table>                
            </div>             
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a class="btn btn-default pull-left" href="{{ route('evaluacion_alumno.index') }}"><i class="fa fa-backward"></i> Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection