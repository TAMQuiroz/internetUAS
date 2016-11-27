@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Reportes</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">

            <div class="clearfix"></div>

            <ul class="tabs-page">                  
                <a href="{{route('reporte.tutor')}}">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Citas por tutor</li>
                    </div>
                </a>                
                <div class="tab-page-wrapper active">
                    <li class="tab-page">Citas por alumno</li>
                </div>                
                <a href="{{route('reporte.topic')}}">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Citas por tema</li>
                    </div>
                </a>                
                <a href="{{route('reporte.cancelledMeeting')}}">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Citas canceladas</li>
                    </div>
                </a>                
            </ul>

            <div class="tab-content-container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">                            
                            <div class="panel-body">
                                <form method="GET" action="{{route('reporte.tutstudentDate')}}">
                                    <div class="form-group">
                                        {{Form::label('Desde: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
                                        <div class="col-md-3 col-sm-3 col-xs-8">                        
                                            <div class="input-group date" id="fecha_inicio_reporte">
                                                <input type="text" class="form-control input-date" name="beginDate" id="fecha_inicio" placeholder="aaaa-mm-dd" required/>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>                      
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Hasta: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
                                        <div class="col-md-3 col-sm-3 col-xs-8">                        
                                            <div class="input-group date" id="fecha_fin_reporte">
                                                <input type="text" class="form-control input-date" name="endDate" id="fecha_fin" placeholder="aaaa-mm-dd" required/>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>                      
                                        </div>
                                    </div>	
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">                                        
                                             <button class="btn btn-submit pull-right" type="submit"><i class="fa fa-search"></i> Buscar</button>
                                        </div>
                                    </div>
                                </form>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">Alumno </th>
                            <th class="column-title">Citas pendientes </th>
                            <th class="column-title">Citas canceladas </th>
                            <th class="column-title">Citas sugeridas </th>
                            <th class="column-title">Citas rechazadas </th>
                            <th class="column-title">Citas asistidas </th>
                            <th class="column-title">Citas no asistidas </th>
                            <th class="column-title">Citas no programadas</th>
                            <th class="column-title">Citas confirmadas </th>
                            <th class="column-title">Citas total </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tutMeetingsByTutstudents as  $key => $tutMeetingsByTutstudent)
                        <tr class="even pointer">
                            <td hidden class="group-id">{{$tutMeetingsByTutstudent->id}} </td>

                            <td class=""> {{ $tutMeetingsByTutstudent->tutstudent->nombre }} {{ $tutMeetingsByTutstudent->tutstudent->ape_paterno }} {{ $tutMeetingsByTutstudent->tutstudent->ape_materno }}</span></td>                            
                            @if($tutstudentPendientes)
                            <td class=" ">{{ $tutstudentPendientes[$key] }}</td>
                            @else
                            0
                            @endif
                            @if($tutstudentCanceladas)
                            <td class=" ">{{ $tutstudentCanceladas[$key] }}</td>
                            @else
                            0
                            @endif
                            @if($tutstudentSugeridas)
                            <td class=" ">{{ $tutstudentSugeridas[$key] }}</td>
                            @else
                            0
                            @endif
                            @if($tutstudentRechazadas)
                            <td class=" ">{{ $tutstudentRechazadas[$key] }}</td>
                            @else
                            0
                            @endif
                            @if($tutstudentAsistidas)
                            <td class=" ">{{ $tutstudentAsistidas[$key] }}</td>
                            @else
                            0
                            @endif
                            @if($tutstudentNoAsistidas)
                            <td class=" ">{{ $tutstudentNoAsistidas[$key] }}</td>
                            @else
                            0
                            @endif
                            @if($tutstudentNoProgramadas)
                            <td class=" ">{{ $tutstudentNoProgramadas[$key] }}</td>
                            @else
                            0
                            @endif
                            @if($tutstudentConfirmadas)
                            <td class=" ">{{ $tutstudentConfirmadas[$key] }}</td>
                            @else
                            0
                            @endif
                            @if($tutstudentTotal)
                            <td class=" ">{{ $tutstudentTotal[$key] }}</td>
                            @else
                            0
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div id="pendientes" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$pendientes}}"></div>
            <div id="canceladas" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$canceladas}}"></div>
            <div id="sugeridas" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$sugeridas}}"></div>
            <div id="rechazadas" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$rechazadas}}"></div>
            <div id="asistidas" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$asistidas}}"></div>
            <div id="noasistidas" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$no_asistidas}}"></div>            
            <div id="confirmadas" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$confirmadas}}"></div>
            <div id="noprogramadas" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$no_programadas}}"></div>
            <div id="citas" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$citas}}"></div>
            <div id="graphics" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="{{ URL::asset('js/tutorship/reportDatesByTutstudent.js')}}"></script>
@endsection