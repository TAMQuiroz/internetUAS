@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Nueva Cita</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
            </div>
            <div class="form-horizontal">
                
                <div class="form-group">
                    {{Form::label('Fecha',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::date('fecha', $meeting->fecha,['class'=>'form-control','required','readonly'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Hora',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::time('hora_inicio',$meeting->hora_inicio,['class'=>'form-control', 'required', 'min' => 8, 'max' => 22,'readonly'])}}    
                    </div>                    
                </div>

                <div class="form-group">
                    {{Form::label('Supervisor',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::number('supervisor',$meeting->idSupervisor,['class'=>'form-control', 'required', 'min' => 8, 'max' => 22,'readonly'])}}    
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                    <a class="btn btn-default pull-right" href="{{ route('meeting.index') }}">Regresar</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection