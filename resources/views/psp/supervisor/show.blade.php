@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Mostrar Supervisor</h3>
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
                <div class="form-group">
                    {{Form::label('Código *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('codigo',$supervisor->codigoTrabajador,['class'=>'form-control', 'readonly'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Nombre(s) *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('nombres',$supervisor->nombres,['class'=>'form-control', 'readonly'])}}
                    </div>
                </div>
                
                <div class="form-group">
                    {{Form::label('Apellido Paterno *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('apPaterno',$supervisor->apellidoPaterno,['class'=>'form-control', 'readonly'])}}
                    </div>
                </div>  

                <div class="form-group">
                    {{Form::label('Apellido Materno *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('apMaterno',$supervisor->apellidoMaterno,['class'=>'form-control', 'readonly'])}}
                    </div>
                </div>      

                <div class="form-group">
                    {{Form::label('Correo *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('correo',$supervisor->correo,['class'=>'form-control', 'readonly'])}}
                    </div>
                </div> 

                <div class="form-group">
                    {{Form::label('Teléfono *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('telefono',$supervisor->telefono,['class'=>'form-control', 'readonly'])}}
                    </div>
                </div> 

                <div class="form-group">
                    {{Form::label('Dirección *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('direccion',$supervisor->direccion,['class'=>'form-control', 'readonly'])}}
                    </div>
                </div> 

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <a class="btn btn-default pull-right" href="{{ route('supervisor.index') }}">Regresar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection