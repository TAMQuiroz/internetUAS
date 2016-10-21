@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Parámetros</h3>
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
                    <div class="form-group">
                        {{Form::label('Duración de una cita:',null,['class'=>'control-label col-md-6 col-sm-6 col-xs-6'])}}
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            {{Form::label($parameters[0]->duracionCita.' minutos',null,['class'=>'control-label'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <a class="btn btn-success pull-right" href="{{ route('parametro.edit',1) }}">Editar</a>
                            
                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection