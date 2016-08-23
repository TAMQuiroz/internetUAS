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
                                <label for="middle-name" class="control-label col-md-7 col-xs-12">
                                    @if($currentPeriod != null)
                                        {{ $currentPeriod->cycleAcademicStart->Descripcion }} al {{ $currentPeriod->cycleAcademicEnd->Descripcion }}
                                    @else
                                        Debe iniciar un nuevo periodo.
                                    @endif
                                </label>
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
                                        <th rowspan="2" class="text-center col-md-8">Resultado Estudiantil</th>
                                        @foreach($inYoRush as $inYo)
                                            <th class="text-center">{{$inYo->Descripcion}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($superMatrixHolder != null)
                                        @for($k = 0; $k < sizeof($superMatrixHolder[0]); $k++)
                                            <tr>
                                                <td class="text-center">{{$superMatrixHolder[0][$k]->studentResult->Identificador}}</td>
                                                <td>{{$superMatrixHolder[0][$k]->studentResult->Descripcion}}</td>
                                                @for($x = 0; $x < sizeof($inYoRush) ; $x++)
                                                    <td class="text-center"> {{ number_format($superMatrixHolder[$x][$k]->studentResultRating*100, 2, '.', '')}}%</td>
                                                @endfor
                                            </tr>
                                        @endfor
                                    @endif
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
                            @if($superMatrixHolder!=null && !empty($superMatrixHolder))
                                @for($k = 0; $k < sizeof($superMatrixHolder[0]); $k++)
                                    <p><strong>{{$superMatrixHolder[0][$k]->studentResult->Identificador}}. {{$superMatrixHolder[0][$k]->studentResult->Descripcion}}</strong></p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr class="success">
                                                <th rowspan="2" class="text-center col-md-3">Aspecto</th>
                                                <th class="text-center col-md-6">Criterio</th>
                                                @foreach($inYoRush as $inYo)
                                                    <th class="text-center">{{$inYo->Descripcion}}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($superMatrixHolder[0][$k]->aspectsDetail!=null && !empty($superMatrixHolder[0][$k]->aspectsDetail))
                                                @for ($x = 0; $x < sizeof($superMatrixHolder[0][$k]->aspectsDetail) ; $x++)
                                                    @foreach($superMatrixHolder[0][$k]->aspectsDetail[$x] as $matrixLineDetail)
                                                        @for ($j = 0; $j <  sizeof($matrixLineDetail->criterions); $j++)
                                                            <tr>
                                                                <td>{{$superMatrixHolder[0][$k]->aspects[$x]->Nombre}}</td>
                                                                <td>{{$matrixLineDetail->criterions[$j]->Nombre}}</td>
                                                                @for($y = 0; $y < sizeof($inYoRush) ; $y++)
                                                                    @if(!empty($superMatrixHolder[$y][$k]->aspectsDetail[$x][$j]->criterionsRating) &&
                                                                        sizeof($superMatrixHolder[$y][$k]->aspectsDetail[$x][$j]->criterionsRating)>0)
                                                                        <td class="text-center">{{number_format($superMatrixHolder[$y][$k]->aspectsDetail[$x][$j]->criterionsRating[$j]*100, 2, '.', '') }} %</td>
                                                                    @else
                                                                        <td class="text-center">0.00%</td>
                                                                    @endif
                                                                @endfor
                                                            </tr>
                                                        @endfor
                                                    @endforeach
                                                @endfor
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection