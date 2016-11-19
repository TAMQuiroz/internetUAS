@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Mostrar Fase</h3>
            </div>
        </div>
    </div>
</div>    

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Información</h3>
            </div>
            <div class="panel-body">
                <div class="form-horizontal">            
                    <div class="form-group">
                        {{Form::label('Número *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('numero',$Phase->numero,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Descripción *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('descripcion',$Phase->descripcion,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {{Form::label('Fecha Inicio*',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::date('fecha_inicio',$Phase->fecha_inicio,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>  

                    <div class="form-group">
                        {{Form::label('Fecha de Fin *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::date('fecha_fin',$Phase->fecha_fin,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Curso de PSP*',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            <select name="Proceso_de_Psp" id="Proceso_de_Psp" class="form-control" disabled="">
                                <option value="">{{$Phase->PspProcess->Course->Nombre}}</option>
                            </select>                             
                        </div>
                    </div>       

                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <a class="btn btn-default pull-right" href="{{ route('phase.index') }}">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection