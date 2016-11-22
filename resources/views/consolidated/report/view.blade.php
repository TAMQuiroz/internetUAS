@extends('app')
@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
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
                                    @if($period != null)
                                        {{ $period->cycleAcademicStart->Descripcion }} al {{ $period->cycleAcademicEnd->Descripcion }}
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
                <div class="x_title">
                    <h2>Resumen de Resultados de Medición</h2>
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
                                    @if( $tipoFiltro == 1)
                                        <thead>
                                        <tr class="success">
                                            <th rowspan="2" class="text-center col-md-2">Resultado</th>
                                            <th rowspan="2" class="text-center col-md-2">Aspecto</th>
                                            <th rowspan="2" class="text-center col-md-2">Criterio</th>
                                            <th rowspan="2" class="text-center col-md-2">Curso</th>
                                            @foreach($ciclos as $ciclo)
                                                <th rowspan="1" class="text-center col-md-2"> {{ $ciclo->Descripcion }}</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>                                 
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                @foreach($resultadosMedicion as $res)
                                                    <th rowspan="1" class="text-center col-md-2"> {{ $res }}</th>
                                                @endforeach
                                            </tr>
                                    
                                        </tbody>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection