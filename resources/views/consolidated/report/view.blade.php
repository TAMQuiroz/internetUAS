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
                                    @if( $tipoFiltro == 5) <!-- caso mas general-->
                                        <thead>
                                            <tr class="success">
                                                <th class="text-center col-md-2">Resultado</th>
                                                <th class="text-center col-md-2">Aspecto</th>
                                                <th class="text-center col-md-2">Criterio</th>
                                                <th class="text-center col-md-2">Curso</th>                                            
                                                @foreach($ciclos as $ciclo)
                                                    <th class="text-center col-md-2"> {{ $ciclo->Descripcion }} </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($resultadosMedicion['resultados'] as $resultado) 
                                                <tr>
                                                    <td rowspan = "{{ $resultado['cantRows']}}"> {{ $resultado['resultadoEstudiantil'] }} </td> <!-- {{count($resultado['aspectos'])}} -->
                                                    @foreach($resultado['aspectos'] as $aspecto) 
                                                        <td rowspan = "{{ $aspecto['cantRows']}}"> {{ $aspecto['aspecto'] }}</td>  <!-- {{count($aspecto['criterios'] )}} -->
                                                        @if(!empty($aspecto['criterios']))
                                                            @foreach($aspecto['criterios'] as $criterio)                                                                 
                                                                <td rowspan = "{{ $criterio['cantRows']}}"> {{ $criterio['criterio'] }} </td> <!-- {{count($criterio['cursos'] )}} -->
                                                                @if(!empty($criterio['cursos']))
                                                                    @foreach($criterio['cursos'] as $curso) 
                                                                        <td > {{$curso['nombre']}} </td>
                                                                        @foreach($curso['resultadoxciclo'] as $res)
                                                                                <td>
                                                                                    {{$res['resultado']}}
                                                                                </td>                                                                        
                                                                        @endforeach   
                                                                        </tr>
                                                                    @endforeach  
                                                                @else
                                                                    <td></td>  
                                                                    @foreach($ciclos as $ciclo)
                                                                        <td> </td>
                                                                    @endforeach
                                                                    </tr>
                                                                @endif                                                                                        
                                                            @endforeach

                                                        @else
                                                            <td></td> 
                                                            <td></td>  
                                                            @foreach($ciclos as $ciclo)
                                                                <td> </td>
                                                            @endforeach
                                                            </tr> 
                                                        @endif  
                                                    @endforeach                                                    
                                            @endforeach  
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