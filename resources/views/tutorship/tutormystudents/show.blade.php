@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Ver Alumno</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Información</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Datos</h4>
                    </div>
                </div>
                <form class='form-horizontal'>
                    <div class="form-group">
                        <p class="col-sm-2 col-xs-12">
                            <strong>Código: </strong>{{$student->codigo}}
                        </p>
                        <p class="col-sm-4 col-xs-12">
                            <strong>Apellidos, Nombres: </strong>{{$student->ape_paterno}} {{$student->ape_materno}}, {{$student->nombre}}
                        </p>
                        <p class="col-sm-3 col-xs-12">
                            <strong>Correo: </strong>{{$student->correo}}
                        </p>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Evaluaciones de Competencias</h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Compentencia</th>
                                @foreach($tutstudentxevaluations as $tutstudentxevaluation)                                                                                                    
                                <th class="column-title">{{$tutstudentxevaluation->evaluation->nombre }}</th>
                                @endforeach                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($competenceResults as $competenceResult)                                                            
                            <tr class="even pointer">                                
                                <td class=" ">{{$competenceResult->nombre}}</td>
                                @if(count($tutstudentxevaluations) >  0)
                                    @if(!$competenceResult->puntajeMaxEva1)
                                        <td class=" ">0%</td>
                                    @else
                                        <td class=" ">{{round( ($competenceResult->puntajeEva1/$competenceResult->puntajeMaxEva1)*100, 2)}}%</td>
                                    @endif
                                @endif
                                @if(count($tutstudentxevaluations) >  1)
                                    @if(!$competenceResult->puntajeMaxEva2)
                                        <td class=" ">0%</td>
                                    @else
                                    <td class=" ">{{round( ($competenceResult->puntajeEva2/$competenceResult->puntajeMaxEva2)*100, 2)}}%</td>
                                    @endif   
                                @endif   
                                @if(count($tutstudentxevaluations) >  2)
                                    @if(!$competenceResult->puntajeMaxEva3)
                                        <td class=" ">0%</td>
                                    @else
                                    <td class=" ">{{round( ($competenceResult->puntajeEva3/$competenceResult->puntajeMaxEva3)*100, 2)}}%</td>
                                    @endif   
                                @endif   
                                @if(count($tutstudentxevaluations) >  3)
                                    @if(!$competenceResult->puntajeMaxEva4)
                                        <td class=" ">0%</td>
                                    @else
                                    <td class=" ">{{round( ($competenceResult->puntajeEva4/$competenceResult->puntajeMaxEva4)*100, 2)}}%</td>
                                    @endif   
                                @endif   
                                @if(count($tutstudentxevaluations) >  4)
                                    @if(!$competenceResult->puntajeMaxEva5)
                                        <td class=" ">0%</td>
                                    @else
                                    <td class=" ">{{round( ($competenceResult->puntajeEva5/$competenceResult->puntajeMaxEva5)*100, 2)}}%</td>
                                    @endif   
                                @endif   
                                @if(count($tutstudentxevaluations) >  5)
                                    @if(!$competenceResult->puntajeMaxEva5)
                                        <td class=" ">0%</td>
                                    @else
                                    <td class=" ">{{round( ($competenceResult->puntajeEva6/$competenceResult->puntajeMaxEva6)*100, 2)}}%</td>                                
                                    @endif   
                                @endif   
                            </tr>
                            @endforeach                                
                                
                            
                        </tbody>
                    </table>
                </div>
                <div id="graphic" style="min-width: 310px; height: 400px; margin: 0 auto"></div>                
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12"> 
                        <a class="btn btn-default pull-right" href="{{ route('mis_alumnos.index') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    var series = [];
    var data = [];  
    var evaluaciones = [];    
    $(".table tbody tr").each(function (index) 
    {
        var campo1, campo2, campo3, campo4, campo5, campo6, campo7;
        $(this).children("td").each(function (index2) 
        {
            switch (index2) 
            {
                case 0: campo1 = $(this).text();
                        break;
                case 1: campo2 = $(this).text();
                        break;
                case 2: campo3 = $(this).text();
                        break;
                case 3: campo4 = $(this).text();
                        break;
                case 4: campo5 = $(this).text();
                        break;
                case 5: campo6 = $(this).text();
                        break;
                case 6: campo7 = $(this).text();
                        break;

            }                       
        })
        data = [parseFloat(campo2), parseFloat(campo3), parseFloat(campo4), parseFloat(campo5), parseFloat(campo6), parseFloat(campo7)];
        series.push({
            name: campo1,
            data: data,
        });                   
    }) 
    $(".table thead tr").each(function (index) 
    {
        var campo1, campo2, campo3, campo4, campo5, campo6, campo7;
        $(this).children("td").each(function (index2) 
        {
            switch (index2) 
            {
                case 0: campo1 = $(this).text();
                        break;
                case 1: campo2 = $(this).text();
                        break;
                case 2: campo3 = $(this).text();
                        break;
                case 3: campo4 = $(this).text();
                        break;
                case 4: campo5 = $(this).text();
                        break;
                case 5: campo6 = $(this).text();
                        break;                

            }                       
        })
        categories = [campo1, campo2, campo3, campo4, campo5, campo6 ];                         
    })
    Highcharts.chart('graphic', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Evolución del alumno'
        },
        subtitle: {
            text: 'Fuente: Evaluaciones'
        },
        xAxis: {       
            categories: categories
        },
        yAxis: {
            max : 100,            
            title: {
                text: 'Porcentaje (%)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },        
        series: series        
    })    
});
</script>

@endsection