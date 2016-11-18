@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Disponibilidad</h3>
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
                        {{Form::text('fecha', $freeHour->fecha,['class'=>'form-control','required','readonly'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Hora',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('hora_ini',$freeHour->hora_ini,['class'=>'form-control', 'required','readonly'])}}    
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <a class="btn btn-success pull-right" href="{{ route('freeHour.edit', $freeHour->id) }}">Editar</a>
                        <a class="btn btn-default pull-right" href="{{ route('freeHour.index') }}">Cancelar</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection