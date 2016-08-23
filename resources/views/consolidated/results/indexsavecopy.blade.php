@extends('app')
@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Consolidado de Resultados de Medición</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">

                    <div class="form-horizontal">
                        <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Periodo </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="period" class="form-control col-md-7 col-xs-12" type="text" name="period" >
                                    <option value="">-- Seleccione --</option>
                                    @foreach($periods as $prd)
                                        <option value="{{$prd->IdPeriodo}}">
                                            {{ $prd->configuration->cycleAcademicStart->Descripcion }} - {{ $prd->configuration->cycleAcademicEnd->Descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-horizontal">
                        <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <a href="{{ route('downloadAsPdf.results') }}" class=""><button class="btn btn-primary pull-right no-print" onclick="" style="margin-right: 5px;"><i class="fa fa-download"></i> Exportar como PDF</button></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Resumen de Resultados </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="success">
                                        <th rowspan="2" class="text-center col-md-1">Identificador</th>
                                        <th rowspan="2" class="text-center col-md-10">Resultado Estudiantil</th>
                                        <th class="text-center col-md-1">Actual</th>
                                        <!--foreach($inYoRush as $inYo)
                                            <th class="text-center">{$inYo->Descripcion}}</th>
                                        endforeach-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!--foreach($superMatrixHolder as $matrixLines)-->
                                    <!--foreach($matrixLines as $matrixLine)-->
                                    @foreach($matrixLines as $matrixLine)
                                        <tr>
                                            <td class="text-center">{{$matrixLine->studentResult->Identificador}}</td>
                                            <td>{{$matrixLine->studentResult->Descripcion}}</td>
                                            <td class="text-center"> {{ number_format($matrixLine->studentResultRating*100, 2, '.', '') }}%</td>
                                        </tr>
                                    @endforeach
                                    <!--endforeach-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Resultado Detallado de Mediciones</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @if($matrixLines!=null && !empty($matrixLines))
                                @foreach($matrixLines as $matrixLine)
                                    <p><strong>{{$matrixLine->studentResult->Identificador}}. {{$matrixLine->studentResult->Descripcion}}</strong></p>
                                    <?php $x=0 ?>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr class="success">
                                                <th rowspan="2" class="text-center col-md-3">Aspecto</th>
                                                <th class="text-center col-md-8">Criterio</th>
                                                <th class="text-center col-md-1">Actual</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if($matrixLine->aspectsDetail!=null && !empty($matrixLine->aspectsDetail))
                                                @for ($x = 0; $x < sizeof($matrixLine->aspectsDetail) ; $x++)
                                                    <?php $j=0 ?>
                                                    @foreach($matrixLine->aspectsDetail[$x] as $matrixLineDetail)
                                                        @for ($j = 0; $j <  sizeof($matrixLineDetail->criterions); $j++)
                                                            <tr>
                                                                <td>{{$matrixLine->aspects[$x]->Nombre}}</td>
                                                                <td>{{$matrixLineDetail->criterions[$j]->Nombre}}</td>
                                                                @if(sizeof($matrixLineDetail->criterionsRating)>0)
                                                                    <td class="text-center">{{number_format($matrixLineDetail->criterionsRating[$j]*100, 2, '.', '') }} %</td>
                                                                @else
                                                                    <td class="text-center">0.00%</td>
                                                                @endif
                                                            </tr>
                                                        @endfor
                                                    @endforeach
                                                @endfor
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 container body">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Gráficas según el Resumen de Resultados</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p><strong>C. Diseña sistemas, componentes o procesos que satisfagan las necesidades presentadas</strong></p>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_content2">
                                            <div id="graph_line" style="width:100%; height:300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    -->

    <!-- this row will not appear when printing -->


@endsection