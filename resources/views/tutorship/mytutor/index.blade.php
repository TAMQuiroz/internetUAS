@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Tutor</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del tutor</h3>
            </div>

            <div class="panel-body">
                @if($tutor)
                <div class="form-horizontal">

                    <div class="form-group">
                        {{Form::label('Código',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('Codigo',$tutor->Codigo,['class'=>'form-control', 'required', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Nombres',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('Nombre',$tutor->Nombre,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Apellidos',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('apellidos',$tutor->ApellidoPaterno.' '.$tutor->ApellidoMaterno, ['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Correo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('Correo',$tutor->Correo,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Categoría',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('Cargo',$tutor->Cargo,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Teléfono',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($tutor->telefono != null)
                            {{Form::text('telefono',$tutor->telefono,['class'=>'form-control', 'readonly'])}}
                            @else
                            {{Form::text('telefono', '-',['class'=>'form-control', 'readonly'])}}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Oficina',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($tutor->oficina != null)
                            {{Form::text('oficina',$tutor->oficina,['class'=>'form-control', 'readonly'])}}
                            @else
                            {{Form::text('oficina','-',['class'=>'form-control', 'readonly'])}}
                            @endif		    				
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Anexo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($tutor->anexo != null)
                            {{Form::text('anexo',$tutor->anexo,['class'=>'form-control', 'readonly'])}}
                            @else
                            {{Form::text('anexo','-',['class'=>'form-control', 'readonly'])}}
                            @endif		    				
                        </div>
                    </div>		    		

                    <div class="form-group">
                        {{Form::label('Horario de atención',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        
                        <?php foreach($horarios as $horario) { ?> 
                            <?php $dia = tranformaDia($horario->dia)?>
                            <div class="col-md-4">
                                {{Form::text('horas',$dia." ".$horario->hora_inicio,['class'=>'form-control', 'readonly'])}}
                            </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <?php } ?>                                                            
                    </div>                    

                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">							
                            <a class="btn btn-primary pull-right" href="{{ route('cita_alumno.index') }}">Solicitar cita</a>
                        </div>
                    </div>
                </div>
                @else
                <div>
                    No tiene tutor asignado aun.
                </div>
                @endif
            </div>

        </div>
    </div>
</div>

<!-- <script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script> -->

@endsection

<?php 

function tranformaDia($dia ) {
    if ($dia == 1) return 'Lunes';
    if ($dia == 2) return 'Martes';
    if ($dia == 3) return 'Miércoles';
    if ($dia == 4) return 'Jueves';
    if ($dia == 5) return 'Viernes';
    if ($dia == 6) return 'Sábado';
}
?>