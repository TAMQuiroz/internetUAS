@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Consolidado de Medición</h3>
	</div>
</div>

<form method="POST" id="form-measuring" action="{{ route('period.measuring')}}">
	{{ csrf_field() }}
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">

				<div class="form-horizontal">
					<div class="row" style="margin-top: 10px;margin-bottom: 10px;">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Periodo </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="period" class="form-control col-md-7 col-xs-12" type="text" name="period" >
								<option value="">-- Seleccione --</option>
								@foreach($periods as $prd)
									<option value="{{$prd->IdPeriodo}}">
										{{ $prd->configuration->cycleAcademicStart->Descripcion }} - {{ $prd->configuration->cycleAcademicEnd->Descripcion }}
									</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</form>

<div class="row" id="period-info">

</div>




<script type="text/javascript">
	jQuery(document).ready(function($){
		var form = $('#form-measuring');
		var periodVal;
		$('#period').change(function(event){
			$.post(form.attr('action'), form.serialize(), function(info) {
				$('#period-info').html(info);
			});
			periodVal =$("#period").val();
			formMeasuring.period.value = periodVal;
		})
	});
</script>

@endsection	