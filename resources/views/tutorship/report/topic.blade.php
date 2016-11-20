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
                                {{Form::open(['route' => ['motivo.update', ''], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

                                <div class="form-group">
                                    {{Form::label('Desde:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        {{Form::select('desde', [null=>'Seleccione',1=>'De cancelación/rechazo de cita',2=>'De desactivación de tutor'], '', ['class' => 'form-control', 'required'])}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{Form::label('Hasta:',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        {{Form::text('hasta','',['class'=>'form-control', 'required', 'maxlength' => 50])}}
                                    </div>
                                </div>		    		

                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                                        <a class="btn btn-default pull-right" href="{{ route('motivo.index','') }}">Cancelar</a>
                                    </div>
                                </div>
                                {{Form::close()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection