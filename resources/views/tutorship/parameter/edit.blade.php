@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Editar Parámetros</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Información</h3>
                </div>
                <div class="panel-body">

                    {{Form::open(['route' => ['parametro.update', 1], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

                    <div class="form-group">
                        {{Form::label('Duración de una cita *',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-6'])}}
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            {{Form::select('duracionCita', [0=>'0 minutos',5=>'5 minutos',15=>'15 minutos',30=>'30 minutos',60=>'60 minutos'], $parameter->duracionCita, ['class' => 'form-control', 'required'])}}
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                            <a class="btn btn-default pull-right" href="{{ route('parametro.index') }}">Cancelar</a>
                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection