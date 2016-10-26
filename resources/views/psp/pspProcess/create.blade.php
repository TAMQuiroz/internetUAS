@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Información del módulo actual de PSP</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
            {{Form::open(['route' => 'pspProcess.store','class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
            {{ Form::hidden('idCiclo', $cycle) }}
                @if($courses != null)
                <div class="form-horizontal">   
                    <div class="form-group">
                        {{Form::label('Nombre de curso',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{ Form::select('IdCurso', $courses, null, ['class'=>'control-label']) }}

                        </div>
                    </div>
                </div> 
                @endif
                @if($courses == null)
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-warning">
                            <strong>Advertencia: </strong> No hay cursos dictados en el ciclo, debe agregar al menos uno.
                        </div>
                    </div>
                </div>    
                @endif
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        @if($courses!=null)
                        {{Form::submit('Agregar', ['class'=>'btn btn-success pull-right'])}}
                        @endif
                        <a class="btn btn-default pull-right" href="{{ route('pspProcess.index') }}">Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}   
            </div>
        </div>
    </div>
</div>                

@endsection