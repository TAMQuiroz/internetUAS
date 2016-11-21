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
                <a href="{{route('reporte.meeting')}}">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Citas</li>
                    </div>
                </a>
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
                        <li class="tab-page">Citas por tema</li>
                    </div>
                
                <a href="{{route('reporte.cancelledMeeting')}}">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Citas canceladas</li>
                    </div>
                </a>
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
            
            
            
        </div>
    </div>
</div>
@endsection