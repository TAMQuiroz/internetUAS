@extends('app')
@section('content')

	<div class="page-title">
		<div class="title_left">
			<h3> {{ $timeTable->Codigo }} - {{ $timeTable->courseXCicle->course->Nombre }} ({{ $timeTable->courseXCicle->course->Codigo }})</h3>
		</div>
	</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">

			<div class="x_title">
				<h2>{{$title}}</h2>
				<div class="clearfix"></div>
			</div>

			<form action="{{ route('reportSave.myCourses')}}" method="POST" id="formReport" name="formReport" novalidate="true" class="form-horizontal">

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="idTimeTable" value="{{$timeTable->IdHorario}}">

				<?php $reportTitle = ''; ?>
				<?php $reportDescription = ''; ?>
				<?php $idReport = 0; ?>
				@if($timeTable->report != null)
					<?php $reportTitle = $timeTable->report->Titulo; ?>
					<?php $reportDescription = $timeTable->report->Descripcion; ?>
					<?php $idReport = $timeTable->report->IdInforme; ?>
				@endif

				<input type="hidden" name="idReport" value="{{$idReport}}">

				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Título </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control col-md-7 col-xs-12" type="text" name="title" id="title" value="{{$reportTitle}}">
					</div>
				</div>

				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Informe </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<textarea class="resizable_textarea form-control" id="description" name="description" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 200px;">{{$reportDescription}}</textarea>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-9 col-sm-12 col-xs-12">
						 <button class="btn btn-success pull-right" type="submit"> Guardar</button>
						 <a href="{{ route('index.myCourses') }}" class="btn btn-default pull-right"> Cancelar</a>
					</div>
				</div>

			</form>
			</div>
		</div>
	</div>
</div>
	<script src="{{ URL::asset('js/myvalidations/report.js')}}"></script>
@endsection