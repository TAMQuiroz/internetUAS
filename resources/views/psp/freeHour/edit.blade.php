@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Disponibilidad</h3>
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
                {{Form::open(['route' => ['freeHour.update',$freeHour->id],'class' => ' form-horizontal','id'=>'formSuggestion'])}}
                    
                <div class="form-group">
                    {{Form::label('Fecha',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::date('fecha', $freeHour->fecha,['class'=>'form-control'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Hora',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::number('hora_ini',$freeHour->hora_ini,['class'=>'form-control', 'required', 'min' => 8, 'max' => 21])}}    
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('freeHour.show',$freeHour->id) }}">Cancelar</a>
                    </div>
                </div>

                {{Form::close()}}

            </div>
        </div>
    </div>

@endsection