@extends('app')
@section('content')
	<div class="page-title">
		<div class="title_left">
			<h3>Adjuntar Archivo</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<form class="form-horizontal">
							<div class="x_content">
								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Planificada </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="dateP" class="form-control col-md-7 col-xs-12" type="text" name="dateP" value="{{$planaccion->cicle->Descripcion}}" readonly="true">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<textarea id="description" class="form-control col-md-7 col-xs-12"  rows="2" name="description" readonly="true">{{$planaccion->Descripcion}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Responsable </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="dateP" class="form-control col-md-7 col-xs-12" type="text" name="dateP"
											   <?php if ($planaccion->IdDocente!=null): ?>
											   value="{{$planaccion->teacher->Nombre}} {{$planaccion->teacher->ApellidoPaterno}} {{$planaccion->teacher->ApellidoMaterno}}"
											   <?php else: ?>
											   value="Todos"
											   <?php endif ?> readonly="true">
									</div>
								</div>
								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Comentario</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<textarea id="description" class="form-control col-md-7 col-xs-12"  rows="2" name="description" readonly="true">{{$planaccion->Comentario}}</textarea>
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Porcentaje Avance </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="dateP" class="form-control col-md-7 col-xs-12" type="text" name="dateP"
											   <?php if ($planaccion->Porcentaje!=null): ?>
											   value="{{$planaccion->Porcentaje}} %"
											   <?php else: ?>
											   value="0 %"
											   <?php endif ?>  readonly="true">
									</div>
								</div>

								<div class="x_title">
									<h2>Adjuntar Archivo</h2>

									<div class="clearfix"></div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="x_content">
					<form action="{{route('addentryA', [])}}" method="POST" enctype="multipart/form-data">
						<div class="x_content">
							<input type="file" name="filefield">
							<input hidden="true" name="actionPlanId" value="{{$actionPlanId}}">
							<input hidden="true" name="improvementPlanId" value="{{$improvementPlanId}}">
						</div>
						<div class="x_content">
							<button type="submit" class="btn btn-success">Adjuntar Archivo</button>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

					</form>
					@if($entries != null)
						<div class="x_title">
							<h2>Descargar Archivo</h2>
							<div class="clearfix"></div>
						</div>
						<!-- -->
						<div class="x_content">
							<div class="bs-docs-section">
								<div class="bs-glyphicons">
									<ul class="bs-glyphicons-list">
										@foreach($entries as $entry)
											<a href="{{route('getentry', $entry->filename)}}" class="">
												<li>
													<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
													<span class="glyphicon-class">{{$entry->original_filename}}</span>
												</li>
											</a>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
						<!-- -->
					@endif
					<div class="row">
						<div class="col-md-9 col-sm-12 col-xs-12">
							<a href="{{ route('tracing.enhacementPlan', ['improvementPlanId' => $improvementPlanId]) }}" class="btn btn-default pull-right"> Regresar</a>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
@endsection