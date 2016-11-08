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
                <h3 class="panel-title">Información</h3>
            </div>

            <div class="panel-body">

                {{Form::open(['route' => ['miperfil.update',$teacher->IdDocente], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
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
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">&nbsp;&nbsp;&nbsp;&nbsp;Hora&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="column-title">Lunes </th>
                                    <th class="column-title">Martes</th> 
                                    <th class="column-title">Miércoles </th>
                                    <th class="column-title">Jueves</th>
                                    <th class="column-title">Viernes</th>
                                    <th class="column-title">Sábado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($h=8; $h<22; $h++)
                                <tr class="even pointer">                                                                     
                                    <td class=" ">{{$h}}:00 hs</td>       
                                    @for ($d=1; $d<7; $d++)
                                    <?php if (encuentraHorario($tutSchedule, $d, $h)) { ?>
                                        <td class=" "> {{Form::checkbox('check['.$d.$h.']',1 , true, array('class' => 'check'))}} </td>
                                    <?php } else { ?>
                                        <td class=" "> {{Form::checkbox('check['.$d.$h.']',1 , false, array('class' => 'check'))}} </td>                                        
                                    <?php } ?>
                                    @endfor                                                                       
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <a id="add" class="btn btn-warning tCerr"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        <a id="remove" class="btn btn-danger tCerr"><i class="fa fa-minus" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('No Disponibilidad *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">  
                        Desde
                        <div class="input-group date fechaDesde">
                            <input type="text" class="form-control input-date" name="fechaDesde[1]" id="fecha_desde" placeholder="dd-mm-aaaa" maxlength="10" required/>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>                        
                    </div>
                    <div class="col-md-4">  
                        Hasta
                        <div class="input-group date fechaHasta">
                            <input type="text" class="form-control input-date" name="fechaHasta[1]" id="fecha_hasta" placeholder="dd-mm-aaaa" maxlength="10" required/>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>                        
                    </div>
                </div>

                <div id="fechas">
                    
                    
                    
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('miperfil.index') }}">Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}

            </div>


        </div>
    </div>
</div>

<!-- <script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script> -->
<script type="text/javascript">
    var n = 1;

    $("#add").click(function() {
        var x = $("#add").attr('disabled');
        if (typeof x !== typeof undefined && x !== false) {
            return;
        }
        if (n == 5) {
            return;
        }
        n++;
        $("#fechas").append('<div class="form-group fecha">heyyyyy</div>');
    });
    
    $("#remove").click(function() {
        var x = $("#remove").attr('disabled');
        if (typeof x !== typeof undefined && x !== false) {
            return;
        }
        if (n == 1) {
            return
        }
        $(".fecha:last-child").remove();
        n--;
    });
    
    
    $(function() {
        var today = new Date();

        var startDate = $(".input-group.date.fechaDesde");
        var endDate = $(".input-group.date.fechaHasta");

        startDate.datepicker({
            format: "dd-mm-yyyy",
            startDate: "today",
            endDate: "{{$futureDay}}",
            language: "es",
            autoclose: true,
            todayHighlight: true,
        });

        startDate.datepicker('setDate', '{{$startDate}}');

        endDate.datepicker({
            format: "dd-mm-yyyy",
            startDate: "{{$startDate}}",
            endDate: "{{$futureDay}}",
            language: "es",
            autoclose: true,
        });

        endDate.datepicker('setDate', '{{$endDate}}');

        var inputStartDate = startDate.children(".input-date");

        inputStartDate.change(function() {
            var valueInputStart = $(this).val();
            console.log(valueInputStart + "");
            endDate.datepicker('setStartDate', valueInputStart);
        });

    });
</script>
@endsection

<?php

function encuentraHorario($tutSchedule, $d, $h) {
    foreach ($tutSchedule as $schedule) {
        if ($schedule->dia == $d && intval($schedule->hora_inicio) == $h) {
            return true;
        }
    }
    return false;
}
?>