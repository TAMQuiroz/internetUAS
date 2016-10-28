@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Reasignación</h3>
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
                <div class="form-horizontal">                    
                    {{Form::open(['route' => ['tutor.deactivate',$tutor->IdDocente], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                    <div class="form-group">
                        {{Form::label('Motivo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{$tutor->IdDocente}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Tutores',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">

                        </div>
                    </div>                                        

                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            {{Form::submit('Desactivar tutor y reasignar', ['class'=>'btn btn-success pull-right'])}}
                            <a class="btn btn-default pull-right" href="{{ route('tutor.index') }}">Cancelar</a>
                        </div>
                    </div>
                    {{Form::close()}}                                        
                </div>

            </div>
        </div>
    </div>
</div>

@endsection