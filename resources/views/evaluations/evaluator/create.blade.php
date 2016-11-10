@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Nuevo evaluador</h3>
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
				{{Form::open(['route' => 'evaluador.store', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
				<input type="text" id="idDocente" name="idDocente"  hidden>
				<div class="form-group">
					{{Form::label('Profesor: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-4'])}}
					<div class="col-md-5 col-sm-5 col-xs-5">
						{{Form::text('nombre',null,['class'=>'form-control','id'=>'nombre', 'required','readonly' ])}}
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3">						
						<a class="btn btn-primary" href="#modal-buscar-profesor">Buscar</a>
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Competencias: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-4'])}}
					<div class="col-md-6">
						@foreach($competences as $competence)
						<div class="checkbox">
							<label><input type="checkbox" name="arr_competencias[{{$competence->id}}]"> {{$competence->nombre}}</label>
						</div>
						@endforeach						
					</div>
				</div>

				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
						<a class="btn btn-default pull-right" href="{{ route('evaluador.index') }}">Cancelar</a>
					</div>
				</div>
				{{Form::close()}}

			</div>
		</div>
	</div>
</div>
@include('evaluations.evaluator.modal-buscar-profesor')
<!--Este script sirve para el buscar en modal-->
<script type="text/javascript">
	$(document).ready(function($) {
		//////////////////////////// BUSCAR PROFESORES PARA EVALUACIONES ////////////////

		var form = $('#form-search-teacher');

		$('#search-teacher').on('click', function() {
			var data = form.serialize();
			$.post(form.attr('action'), data, function(table) {
				$('#table-teacher').html(table);
			});
		});

	});

	function select(id,app,apm,nombre){  
	    $('#modal-buscar-profesor').modal('hide');//oculto todo el modal
	    $('#idDocente').val(id);//copio el id en un input oculto
	    $('#nombre').val(app+' '+ apm+', '+nombre); // copio el nombre completo
	}
</script>


@endsection