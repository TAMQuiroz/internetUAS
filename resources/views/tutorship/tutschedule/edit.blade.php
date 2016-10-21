@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Perfil</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Perfil</h3>
            </div>

            <div class="panel-body">

                {{Form::open(['route' => ['disponibilidad.update',$teacher->IdDocente], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                <div class="form-group">
                    {{Form::label('Teléfono *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('telefono',$teacher->telefono,['class'=>'form-control', 'required', 'maxlength' => 50])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Oficina *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('oficina',$teacher->oficina,['class'=>'form-control', 'required', 'maxlength' => 50])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Anexo *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('anexo',$teacher->anexo,['class'=>'form-control', 'required', 'maxlength' => 50])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Disponibilidad *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        
                    </div>
                </div>
                          
                <div class="form-group">
                    {{Form::label('No Disponibilidad *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('disponibilidad.index') }}">Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}

            </div>


        </div>
    </div>
</div>

<!-- <script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script> -->

@endsection