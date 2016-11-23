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
				{{Form::open(['route' => 'atencion.store', 'class'=>'form-horizontal', 'id'=>'formAttention'])}}
				<div class="form-group">
					<label class="control-label col-md-4 col-sm-4 col-xs-12">Código:</label>
					<div class="col-sm-4 col-xs-12">
						<input id="code" type="text" name="code" maxlength="8">
					</div>
					<div class="col-sm-4 col-xs-12">
						<button id="search-button" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-4 col-sm-4 col-xs-12">Alumno: </label>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<input type="text" id="name" disabled value="Sin resultado" style="color: #8487ae;">
						<input type="text" id="id" name="alumno" style="display: none;" value="">
						<input type="text" id="hour" name="startHour" style="display: none;" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-4 col-sm-4 col-xs-12">Tema: </label>
					<div class="col-sm-4 col-xs-12">
						<select class="form-control" name="tema">
		                    <option value>Seleccione Tema</option>
		                    @foreach ($topics as $topic)
		                        <option value="{{$topic->id}}">{{$topic->nombre}}</option>
		                    @endforeach
		                </select>
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
						<a class="btn btn-default pull-right" href="{{ route('cita_alumno.index') }}">Cancelar</a>
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
		console.log(new Date());
		$('#search-button').click(function (e){
			e.preventDefault();
			var code = $('#code').val();
			$.ajax({
		        method: 'GET',
		        url: "{{ route('mis_alumnos.get_name')}}",
		        data: {
		            code: code,
		        },
		        success: function(response) {
		        	var nameLabel = $('#name');
		        	var codeInput = $('#id');
		        	if (response['code'] == 1) {
		        		nameLabel.css('color', '#8487ae');
		        	} else {
		        		nameLabel.css('color', 'red');
		        	}
		        	nameLabel.val(response['html']);
		        	codeInput.val(response['id']);
		        }
		    });
		});
	});
</script>
@endsection