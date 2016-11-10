@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-title">
        	<div class="title_left">
        		<h3>Editar Semana de Reuniones</h3>
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
            {{Form::open(['route' => ['scheduleMeeting.update',$schedule->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

            	
                <div class="form-group">
                    {{Form::label('Fase *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                    <div class="col-md-6 col-sm-6 col-xs-12">                                
                        <select name="fase" id="fase" class="form-control" required="required">
                            @foreach( $phases as $phase)
                                @if($phase->id==$schedule->idfase)                            
                                    <option value="{{$phase->id}}" selected="selected">{{$phase->numero.': '.date("m/d/Y",strtotime($phase->fecha_inicio)).' - '.date("m/d/Y",strtotime($phase->fecha_fin))}} </option>
                                @else
                                    <option value="{{$phase->id}}">{{$phase->numero.': '.date("m/d/Y",strtotime($phase->fecha_inicio)).' - '.date("m/d/Y",strtotime($phase->fecha_fin))}} </option>
                                @endif
                            @endforeach
                        </select>                              
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Inicio <span class="error">* </span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        @if($schedule->fecha_inicio!="0000-00-00")
                        <input class="form-control col-md-7 col-xs-12" type="text" name="fecha_inicio" id="fecha_inicio" minlength="10" maxlength="10"  value="<?php echo date("m/d/Y",strtotime($schedule->fecha_inicio));?>"/>
                        @else
                        <input class="form-control col-md-7 col-xs-12" type="text" name="fecha_inicio" id="fecha_inicio" minlength="10" maxlength="10" value="<?php echo date("m/d/Y",strtotime(\Carbon\Carbon::now()));?>"/>
                        @endif
                            <!--<?php echo date("d/m/Y");?>-->
                    </div>
                </div> 
                
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Fin <span class="error">* </span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        @if($schedule->fecha_fin!="0000-00-00")
                        <input class="form-control col-md-7 col-xs-12" type="text" name="fecha_fin" id="fecha_fin" minlength="10" maxlength="10" value="<?php echo date("m/d/Y",strtotime($schedule->fecha_fin));?>"/>
                        @else
                        <input class="form-control col-md-7 col-xs-12" type="text" name="fecha_fin" id="fecha_fin" minlength="10" maxlength="10" value="<?php echo date("m/d/Y",strtotime(\Carbon\Carbon::now()));?>"/>
                        @endif
                            <!--<?php echo date("d/m/Y");?>-->
                    </div>
                </div> 

                <div class="form-group">
                    <label for="tipol" class="control-label col-md-3 col-sm-3 col-xs-12">Fase</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="tipo" disabled class="form-control">
                            <option value="first">{{$schedule->tipo}}</option>
                        </select>   
                    </div>
                </div>      

                </br>
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('scheduleMeeting.index') }}">Cancelar</a>
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