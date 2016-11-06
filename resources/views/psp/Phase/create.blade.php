@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Creación de Fase</h3>
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
            {{Form::open(['route' => 'phase.store','class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

                <div class="form-group">
                    {{Form::label('Número *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('numero',null,['class'=>'form-control', 'required'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Descripción *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('descripcion',null,['class'=>'form-control', 'required', 'maxlength' => 100])}}
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Fecha de Inicio <span class="error">* </span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="fecha_inicio" id="fecha_inicio" minlength="10" maxlength="10" value="" required/>
                            <!--<?php echo date("d/m/Y");?>-->
                    </div>
                </div> 

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Fecha de Fin <span class="error">* </span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" type="text" name="fecha_fin" id="fecha_fin" minlength="10" maxlength="10" value="" required/>
                            <!--<?php echo date("d/m/Y");?>-->
                    </div>
                </div>     

                <div class="form-group">
                        {{Form::label('Curso de PSP*',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="Proceso_de_Psp" id="Proceso_de_Psp" class="form-control" required="required">
                            @foreach( $pspproc as $psp)
                                <option value="{{$psp->id}}">{{$psp->Course->Nombre}}</option>
                            @endforeach
                        </select>                             
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('phase.index') }}">Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}

            </div>
        </div>
    </div>
</div>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $.datepicker.setDefaults($.datepicker.regional["es"]);
            $("#fecha_fin").datepicker({
                firstDay: 1,
                minDate: <?php echo date("d/m/Y");?>
            });
        });
    </script>
    <script>
        $(function () {
            $.datepicker.setDefaults($.datepicker.regional["es"]);
            $("#fecha_inicio").datepicker({
                firstDay: 1,
                minDate: <?php echo date("d/m/Y");?>
            });
        });
    </script>
@endsection