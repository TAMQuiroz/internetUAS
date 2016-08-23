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
					</div>
				</div>
				<div class="x_title">
					<h2>Adjuntar Archivo</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form action="{{route('addPentryA', [])}}" method="POST" enctype="multipart/form-data">
						<div class="x_content">
							<input type="file" name="filefield">
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
							<a href="{{ route('index.enhacementPlan') }}" class="btn btn-default pull-right"> Regresar</a>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
@endsection