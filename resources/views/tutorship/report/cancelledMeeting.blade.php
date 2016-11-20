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
                <div class="tab-page-wrapper">
                    <li class="tab-page">Citas</li>
                </div>    
                <a href="">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Citas por tutor</li>
                    </div>
                </a>
                <a href="{{route('reporte.tutstudentDate')}}">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Citas por alumno</li>
                    </div>
                </a>
                
                    <div class="tab-page-wrapper active">
                        <li class="tab-page">Citas canceladas</li>
                    </div>
                
                <a href="">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Reasignación de tutores</li>
                    </div>
                </a>
            </ul>

            <div class="tab-content-container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">                            
                            <div class="panel-body">
                                <form method="GET" action="{{route('reporte.cancelledMeeting')}}">
                                    <div class="form-group">
                                        {{Form::label('Fecha inicio: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
                                        <div class="col-md-3 col-sm-3 col-xs-8">                        
                                            <div class="input-group date" id="fecha_inicio_reporte">
                                                <input type="text" class="form-control input-date" name="beginDate" id="fecha_inicio" placeholder="aaaa-mm-dd" required/>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>                      
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('Fecha fin: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
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
                            <th class="column-title">Razón </th>
                            <th class="column-title">Cantidad </th>
                            <th class="column-title">Porcentaje respecto de las canceladas</th>                    
                            <th class="column-title">Porcentaje respecto del total </th>                    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cancelledtutMeetings as  $key => $cancelledtutMeeting)
                        <tr class="even pointer">
                            <td hidden class="group-id">{{$cancelledtutMeeting->id}} </td>

                            <td class="">{{$reasons_name_list[$key] }}</span></td>
                            
                            <td class=" ">{{ $reasons_amount_list[$key] }}</td>                                      
                            
                            <td class=" ">{{ round($reasons_amount_list[$key]/$cancelledTotal*100,2) }}</td>      

                            <td class=" ">{{ round($reasons_percentage_list[$key],2) }}</td>      
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>            
            <div id="canceladas_report" style="min-width: 310px; height: 400px; margin: 0 auto" class="hidden" value="{{$canceladas}}"></div>            
            <div id="graphic_cancelled" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="{{ URL::asset('js/tutorship/reportDatesByCancelledMeeting.js')}}"></script>
@endsection