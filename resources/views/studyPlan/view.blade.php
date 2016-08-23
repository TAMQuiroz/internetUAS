@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3> {{ $course->Codigo }} - {{ $course->Nombre }} </h3>
	</div>
</div>

<div class="clearfix"></div>
<div class="separator"></div>
<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<div class="x_title">
				<h2> Resultados Estudiantiles</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				@foreach($studentResults as $sr)
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<p><strong> {{$sr->studentsResult->Identificador}} {{$sr->studentsResult->Descripcion}} </strong></p>

							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
									<tr class="success">
										<th rowspan="2"  class="text-center col-md-4">Aspecto</th>
										<th rowspan="2" class="text-center  col-md-4">Criterio</th>
										@foreach($schedules as $s)
											<th class="text-center">{{ $s->Codigo }}</th>
										@endforeach
										<th class="text-center">Total</th>
									</tr>
									</thead>
									<tbody>
										@foreach($sr->studentsResult->criterions as $criterion)
											<tr>
												<td>{{ $criterion->aspect->Nombre }}</td>
												<td>{{ $criterion->Nombre }}</td>
												@foreach($schedules as $s)
													<th class="text-center">{{ sprintf("%0.2f", $sr->performanceMatrix[$s->IdHorario][$criterion->IdCriterio]) }}%</th>
												@endforeach
												<td class="text-center"><strong>{{ sprintf("%0.2f", $sr->performanceMatrix['total'][$criterion->IdCriterio]) }}%</strong></td>
											</tr>
										@endforeach
										<tr>
											<td></td>
											<td><strong>Total</strong></td>
											@foreach($schedules as $s)
												<th class="text-center">{{ sprintf("%0.2f", $sr->performanceMatrix[$s->IdHorario]['total']) }}%</th>
											@endforeach
											<td class="text-center"><strong>{{ sprintf("%0.2f", $sr->performanceMatrix['total']['total']) }}%</strong></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@foreach($schedules as $schedule)
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="x_title">
					<h2> Horario: {{ $schedule->Codigo }}</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-12"></div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<p><strong>Profesor(es): </strong></p>
							<ul>
								@foreach($schedule->professors as $p)
									<li>{{ "{$p->Nombre} {$p->ApellidoPaterno} {$p->ApellidoMaterno}" }}</li>
								@endforeach
							</ul>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<p><strong>Total de Alumnos Evaluados: </strong> {{ $schedule->numEvaluated }} </p>
						</div>
					</div>

				<!-- 	<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
									<tr class="success">
										<th rowspan="2" class="text-center col-md-10">Evidencia de Medición</th>
										<th rowspan="2" class="text-center col-md-2"></th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td> Reporte de Experimentación Numérica </td>
										<td><a class="btn btn-primary btn-xs"><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td> Evaluación de Desempeño </td>
										<td><a class="btn btn-primary btn-xs"><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td> Monografía </td>
										<td><a class="btn btn-primary btn-xs"><i class="fa fa-download"></i></a></td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div> -->

					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="table-responsive">
								@if(! $schedule->courseEvidences->isEmpty())
									<table class="table table-bordered">
										<thead>
										<tr class="success">
											<th rowspan="2" class="text-center col-md-10">Evidencia del Curso</th>
											<th rowspan="2" class="text-center col-md-2"></th>
										</tr>
										</thead>
										<tbody>
										@foreach($schedule->courseEvidences as $evidence)
											<tr>
												<td> {{ $evidence->file_name }} </td>
												<td><a target="_blank" href="{{ $evidence->file_url }}" class="btn btn-primary btn-xs"><i class="fa fa-download"></i></a></td>
											</tr>
										@endforeach
										</tbody>
									</table>
								@endif
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endforeach

@endsection