@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Nueva evaluación</h3>
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
				{{Form::open(['route' => 'evaluacion.store', 'class'=>'form-horizontal'])}}
				<div class="form-group">
					{{Form::label('Nombre: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-8 col-sm-8 col-xs-8">
						{{Form::text('nombre',null,['class'=>'form-control', 'required', 'maxlength' => 200])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Fecha inicio: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-3 col-sm-3 col-xs-8">
						{{Form::date('nombre',null,['class'=>'form-control', 'required'])}}
					</div>

					{{Form::label('Fecha fin: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-3 col-sm-3 col-xs-8">
						{{Form::date('nombre',null,['class'=>'form-control', 'required'])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Descripción: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-8 col-sm-8 col-xs-8">
						{{Form::textarea('descripcion',null,['class'=>'form-control', 'required', 'rows'=>'2' , 'maxlength' => 500])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Duración:*',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-8 col-sm-8 col-xs-8">
						<div class="input-group">							
							<input name="tiempo" required="required" type="number" min="1" max="200" class="form-control" aria-describedby="basic-addon1">
							<span class="input-group-addon" id="basic-addon1">minutos</span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 col-sm-12 col-xs-12">
						{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
						<a class="btn btn-default pull-right" href="{{ route('evaluacion.index') }}">Cancelar</a>
					</div>
				</div>
				{{Form::close()}}

			</div>
			<div class="panel-heading">
				<h3 class="panel-title">Preguntas</h3>
			</div>
			<div class="panel-body">				
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<a class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar-banco-preguntas"  ><i class="fa fa-university fa-2x pull-left" aria-hidden="true"></i> Abrir banco <br> de preguntas</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('evaluations.evaluation.modal-buscar-banco-preguntas')
@endsection