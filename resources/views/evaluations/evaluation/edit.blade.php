@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Editar evaluación</h3>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			{{Form::open(['route' => ['evaluacion.update',$evaluation->id], 'class'=>'form-horizontal'])}}
			<div class="panel-heading">
				<h4 class="">Información</h4>
			</div>
			<div class="panel-body">
				
				<div class="form-group">
					{{Form::label('Nombre: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-8 col-sm-8 col-xs-8">
						{{Form::text('nombre',$evaluation->nombre,['class'=>'form-control','id'=>'nombre', 'required', 'maxlength' => 200])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Fecha inicio: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-3 col-sm-3 col-xs-8">
						{{Form::date('fecha_inicio',$evaluation->fecha_inicio,['class'=>'form-control', 'id'=>'fecha_inicio' ,'required'])}}
					</div>

					{{Form::label('Fecha fin: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-3 col-sm-3 col-xs-8">
						{{Form::date('fecha_fin',$evaluation->fecha_fin,['class'=>'form-control','id'=>'fecha_fin' ,'required'])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Descripción: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-8 col-sm-8 col-xs-8">
						{{Form::textarea('descripcion',$evaluation->descripcion,['class'=>'form-control', 'required', 'rows'=>'2' , 'maxlength' => 500])}}
					</div>
				</div>

				<div class="form-group">
					{{Form::label('Duración:*',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
					<div class="col-md-8 col-sm-8 col-xs-8">
						<div class="input-group">							
							<input name="tiempo" value="{{$evaluation->tiempo}}" required="required" type="number" min="1" max="200" class="form-control" aria-describedby="basic-addon1">
							<span class="input-group-addon" id="basic-addon1">minutos</span>
						</div>
					</div>
				</div>

			</div>
			<div class="panel-heading">
				<h4 class="">Preguntas</h4>
			</div>
			<div class="panel-body">				
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<center>
							<a class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar-banco-preguntas"  ><i class="fa fa-university fa-2x pull-left" aria-hidden="true"></i> Abrir banco <br> de preguntas</a>
						</center>
						
					</div>
					<div id="aca">
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">						
						<div class="table-responsive">							
							<table id="actual-questions" class="table table-striped responsive-utilities jambo_table bulk_action">
								<thead>
									<tr class="headings">                
										<th class="column-title">N.</th><!-- nuevo-->
										<th class="column-title">Cód.</th>
										<th class="column-title">Tipo</th>
										<th class="column-title">Competencia</th>
										<th class="column-title">Pregunta</th>
										<th class="column-title">Tiempo</th>
										<th class="column-title">Dificultad</th>
										<th class="column-title">Puntaje</th><!-- nuevo-->
										<th class="column-title">Evaluador</th><!-- nuevo-->
										<th class="column-title">Acción</th><!-- nuevo-->
									</tr>
								</thead>
								<tbody>
									<!-- aca se metera la tabla de preguntas elegidas -->
									@foreach($questions as $question)
									<tr id="question_{{$question->id}}">
										<td class="order">9</td>
										<td hidden><input type="number" value="{{$question->id}}" name="arrIds[{{$question->id}}]"></td>
										<td class="id">{{ $question->id }}</td>

										@if($question->tipo == 1)
										<td>Cerrada</td>
										@elseif ($question->tipo == 2)
										<td>Abierta</td>
										@else
										<td>Archivo</td>
										@endif

										<td hidden ><input class="id_competence" type="number" value="{{$question->competencia->id}}"></td>
										<td >{{ $question->competencia->nombre }}</td>

										<td>{{ $question->descripcion }}</td>

										<td>{{ $question->tiempo }}</td>            

										@if($question->dificultad == 1)
										<td>Baja</td>
										@elseif ($question->dificultad == 2)
										<td>Media</td>
										@else
										<td>Alta</td>
										@endif

										<td hidden><input class="row_puntaje" type="number" value="{{$question->puntaje}}" name="arrPuntajes[{{$question->id}}]"></td>
										<td class="oculto puntaje" >{{ $question->puntaje }}</td>

										<td hidden><input class="row_evaluador" type="number" value="{{$question->responsable->IdDocente}}" name="arrEvaluadores[{{$question->id}}]"></td>
										<td class="oculto responsable" >{{ explode(' ',trim($question->responsable->Nombre))[0].' '.$question->responsable->ApellidoPaterno}}</td>

										<td><a class="editbtn btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a><a class="btn btn-danger btn-xs delete-prof"><i class="fa fa-remove"></i></a></td>                    
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<h4 class="">Alumnos</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						
						<div class="form-group">
							{{Form::label('Dirigido: *',null,['class'=>'control-label col-md-2 col-sm-2 col-xs-4'])}}
							<div class="col-md-8 col-sm-8 col-xs-8">
								<div class="radio">
									<label><input type="radio" value="todos" checked name="alumnos">A todos los alumnos de la especialidad</label>
								</div>
								<div class="radio">
									<label><input type="radio" value="algunos" name="alumnos">Elegir...</label>
								</div>
							</div>
						</div>							
						
					</div>
				</div>
				<div class="row" id="alumnosEspecialidad" hidden>
					<div class="col-md-6 col-md-offset-3">
						<div class="table-responsive">
							<table class="table table-striped responsive-utilities jambo_table bulk_action">
								<thead>
									<tr class="headings">										
										<th class="column-title">Código </th>
										<th class="column-title">Apellidos y Nombres </th>
										<th class="column-title last">Seleccionar</th>           
									</tr>
								</thead>
								<tbody>
									@foreach($students as $student)
									<tr class="even pointer">
										<td class=" ">{{ $student->codigo }}</td>
										<td class=" ">{{ $student->ape_paterno.' '.$student->ape_materno.', '.$student->nombre }}</td>
										<td class=" ">
											<div class="checkbox">
												<label><input type="checkbox" checked name="arrStudents[{{$student->id}}]" value="1"></label>
											</div>
										</td>
									</tr>
									@endforeach										
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-sm-10 col-xs-12">
					{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right','id'=>'submit'])}}
					<a class="btn btn-default pull-right" href="{{ route('evaluacion.index') }}">Cancelar</a>
				</div>
			</div><br>
			{{Form::close()}}
		</div>
	</div>
</div>
<script src="{{ URL::asset('js/evaluations/search.js')}}"></script>
@include('evaluations.evaluation.modal-buscar-banco-preguntas')
@include('evaluations.evaluation.modal-editar-pregunta')
@endsection