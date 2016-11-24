@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Atención de sin cita</h3>
    </div>    
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Información</h3>
			</div>
			<div class="panel-body">
				{{Form::open(['route' => 'atencion.storeMeeting', 'class'=>'form-horizontal', 'id'=>'formAttention'])}}
				<div class="form-group">
					<label class="control-label col-md-4 col-sm-4 col-xs-12">Alumno: </label>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<input type="text" disabled value="{{$meeting->tutstudent->ape_paterno}} {{$meeting->tutstudent->ape_materno}}, {{$meeting->tutstudent->nombre}}" style="color: #8487ae;">
						<input type="hidden" id="code" name="code" value="{{$meeting->id}}">
						<input type="hidden" id="hour" name="startHour" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-4 col-sm-4 col-xs-12">Tema: </label>
					<div class="col-sm-4 col-xs-12">
						<input type="text" disabled value="{{$meeting->topic->nombre}}" style="color: #8487ae;">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-4 col-sm-4 col-xs-12">Observaciones: </label>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<textarea class="form-control" name="observations" rows="5"></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
						<a class="btn btn-default pull-right" href="{{ URL::previous() }}">Cancelar</a>
					</div>
				</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
<script>
	$(function() {
		$('#hour').val(new Date());
	});
</script>
@endsection