@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3> Cursos Dictados </h3>
	</div>
</div>

<div class="clearfix"></div>
<div class="separator"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="form-horizontal">

					<div class="form-horizontal">
						<div class="row" style="margin-top: 10px;margin-bottom: 10px;">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Ciclo Académico </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" id="semester-select">
									<option value="0" selected="selected">-- Seleccione --</option>
									@if(isset($semesters))
										@foreach($semesters as $semester)
											<?php  $selected = (isset($actual_semester) && $semester->IdCicloAcademico == $actual_semester)?'selected':'' ?>
											<option {{ $selected }} value="{{ $semester->IdCicloAcademico }}">{{ $semester->academicCycle->Descripcion }}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	@if(isset($semesters))
		<div id="courses-body">
			@include('studyPlan.courses')
		</div>
	@endif
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#semester-select').change(function(){
			var semester_id = $('#semester-select').val();
			if(semester_id != 0){
				$.get(baseUrl + '/studyPlan/' + semester_id + '/courses')
				 .done(function(body) {
				 	$('#courses-body').html(body);
				 })
			}
		})
	});
</script>

@endsection