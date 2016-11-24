@extends('app')
@section('content')
<ul class="tabs-page">
	<div class="tab-page-wrapper active">
  		<li class="tab-page">Citas</li>
	</div>
	<a href="{{route('tema.index')}}">
		<div class="tab-page-wrapper">
	  		<li class="tab-page">Temas</li>
		</div>
	</a>
	<a href="{{route('motivo.index')}}">
		<div class="tab-page-wrapper">
	  		<li class="tab-page">Motivos</li>
		</div>
	</a>
</ul>
<div class="tab-content-container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">General</h3>
                </div>
                <div class="panel-body">
                    {{ Form::open(['route' => ['parametro.update.duration'], 'class'=>'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form::label('Duración de cita *',null, ['class' => 'control-label col-sm-5 col-xs-12']) }}
                        <div class="col-sm-2 col-xs-5">
 	                       {{ Form::select('duration', array('10' => '10', '15' => '15', '20' => '20', '30' => '30', '60' => '60'), $duration, ['class' => 'form-control']) }}                    	
                        </div>
                        <div class="col-sm-5 col-xs-7 text-left">
                        	{{Form::label('minutos.',null,['class'=>'control-label'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Máximo de días para solicitar cita *',null, ['class' => 'control-label col-sm-5 col-xs-12']) }}
                        <div class="col-sm-2 col-xs-5">
                           {{ Form::text('numberDays', $numberDays,['class' => 'form-control text-center', 'maxlength' => '2']) }}                        
                        </div>
                        <div class="col-sm-5 col-xs-7 text-left">
                            {{Form::label('días.',null,['class'=>'control-label'])}}
                        </div>
                    </div>
                    <div class="form-group input-daterange">
                        {{ Form::label('Rango de fechas para cita *',null, ['class' => 'control-label col-sm-5 col-xs-12']) }}
                        <div class="col-sm-1 col-xs-3 text-right">
                            {{ Form::label('del',null, ['class' => 'control-label']) }}
                        </div>
                        <div class="col-sm-3 col-xs-8">                        
                            <div class="input-group date tutorship-settings-dates-start .prev .next">
                                <input type="text" class="form-control input-date" name="startDate" id="startDate" placeholder="dd-mm-aaaa" maxlength="10" required/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>                      
                        </div>
                        <div class="col-sm-6 col-xs-3 text-right">
                            {{ Form::label('hasta',null, ['class' => 'control-label']) }}
                        </div>
                        <div class="col-sm-3 col-xs-8">                        
                            <div class="input-group date tutorship-settings-dates-end .prev .next">
                                <input type="text" class="form-control input-date" name="endDate" id="endDate" placeholder="dd-mm-aaaa" maxlength="10" required/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>                      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(function() {
        var today = new Date();

        var startDateTutorship = $(".input-group.date.tutorship-settings-dates-start");
        var endDateTutorship = $(".input-group.date.tutorship-settings-dates-end");

        startDateTutorship.datepicker({
            format: "dd-mm-yyyy",
            startDate: "{{$startDate}}",
            endDate: "{{$futureDay}}",
            language: "es",
            autoclose: true,
            todayHighlight: true,
         });

        startDateTutorship.datepicker('setDate', '{{$startDate}}');

        endDateTutorship.datepicker({
            format: "dd-mm-yyyy",
            startDate: "{{$startDate}}",
            endDate: "{{$futureDay}}",
            language: "es",
            autoclose: true,
         });

        endDateTutorship.datepicker('setDate', '{{$endDate}}');

        var inputStartDateTutorship = startDateTutorship.children(".input-date");
        inputStartDateTutorship.change(function() {

            var valueInputStart = $(this).val();
            endDateTutorship.datepicker('setStartDate', valueInputStart);
        });

    });
</script>
@endsection
