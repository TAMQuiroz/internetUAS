@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Solicitar Cita</h3>
    </div>    
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Información</h3>
			</div>
			<div class="panel-body">

				{{Form::open(['route' => 'cita_alumno.store', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
				<div class="form-group">
					{{Form::label('Alumno: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-12'])}}
					<div class="col-sm-4 col-xs-12">
						<label class="control-label">{{$student->ape_paterno}} {{$student->ape_materno}}, {{$student->nombre}}</label>
					</div>
					<input type="text" name="id" style="display: none;" value="{{$student->id}}">
				</div>

				<div class="form-group">
					{{Form::label('Fecha: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-12'])}}
					<div class="col-sm-3 col-xs-12">
						<div class="input-group date tutorship-create-date .prev .next">
                            <input type="text" class="form-control input-date" name="dayDate" id="dayDate" placeholder="dd-mm-aaaa" maxlength="10" required/>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>  
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Horario: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-12'])}}
					<div class="col-sm-3 col-xs-12">
						<select id="schedule" class="form-control" name="hourId">
		                    <option value>Seleccione Horario</option>
		                </select>
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Tema: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-12'])}}
					<div class="col-sm-3 col-xs-12">
						<select class="form-control" name="topicId">
		                    <option value>Seleccione Tema</option>
		                    @foreach ($topics as $topic)
		                        <option value="{{$topic->id}}">{{$topic->nombre}}</option>
		                    @endforeach
		                </select>
					</div>
				</div>



				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
						<a class="btn btn-default pull-right" href="{{ route('miscitas.index') }}">Cancelar</a>
					</div>
				</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(function() {
        var today = new Date();

        var timeDateTutorship = $(".input-group.date.tutorship-create-date");

        timeDateTutorship.datepicker({
            format: "dd-mm-yyyy",
            startDate: "today",
            endDate: "{{$endDate}}",
            language: "es",
            autoclose: true,
            daysOfWeekDisabled: '{{$disabledDays}}'        
        });
        
        timeDateTutorship.datepicker('setDate', '');

        var inputTimeDateTutorship = timeDateTutorship.children('.input-date');

        inputTimeDateTutorship.change(function() {
        	var valueInputTime = $(this).val();
        	$.ajax({
		        method: 'GET',
		        url: "{{ route('mis_citas.showSchedule')}}",
		        data: {
		            date: valueInputTime
		        },
		        success: function(response) {
		        	$('#schedule').html(response['html']);
		        }
		    });
        });

    });
</script>
@endsection