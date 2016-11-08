@extends('appWithoutHamburger')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>{{$title}}</h3>
	</div>
</div>

<!--<form action="{{ route('updateCycle.faculty') }}" method="POST" id="editConf" novalidate="true" name="editConf" class="form-horizontal">-->
<form action="{{ route('academicCycle_store.flujoCoordinador',$idEspecialidad) }}" method="POST" id="formEditCycle" novalidate="true" name="formEditCycle" class="form-horizontal">

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="text" id="validateIdentifier" name="validateIdentifier" hidden>

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="form-horizontal">

					<div class="row" style="margin-top: 10px;">
					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo<span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              	<select name="cycleId" id="cycleId" class="form-control" >
									<option value="0">-- Seleccione --</option>
									@if($cycleAcademic != null)
										@foreach($cycleAcademic as $ca)
		                              		<option value="{{$ca->IdCicloAcademico}}"
		                              		selected="true">{{$ca->Descripcion}}</option>
		                         		@endforeach
	                         		@endif
								</select>
                            </div>
					</div>
					</div>


					<div class="row" style="margin-top: 10px;">
					 <div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Inicio<span class="error">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="cycleDateI" type="text"  class="form-control col-md-7 col-xs-12" name="cycleDateI"   value="<?php echo date("d/m/Y");?>">
						</div>
					</div>
					</div>

					<div class="row" style="margin-top: 10px;">
					 <div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Fin<span class="error">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="cycleDateF" type="text" class="form-control col-md-7 col-xs-12" name="cycleDateF" value="<?php echo date("d/m/Y");?>" >
						</div>
					</div>
					</div>

					<div class="clearfix"></div>
                    <div class="separator"></div>

     
					<h2>Resultados Estudiantiles a Evaluarse</h2>

					<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
						<thead>
							<tr class="headings">
								<th>
									<input type="checkbox" id="select_all" name="select_all" class="">
								</th>
								<th class=" ">Identificador</th>
								<th class=" " width="80%">Resultado Estudiantil</th>
							</tr>
						</thead>
						<tbody>

							<tr class="even pointer" hidden="true">
								<td class="a-center">
									<input value="0" type="checkbox" id="check" name="check[]" checked="true" onchange="c(this)" onclick="c(this)"></input>
								</td>
							</tr>
							@if($results!=null)
							@foreach($results as $re)

								<?php $temp = ""; ?>
		                        @if($cyclexresults!=null)
			                        @foreach($cyclexresults as $cyr)
			                          @if($cyr->IdResultadoEstudiantil == $re->IdResultadoEstudiantil)
			                            <?php $temp = "checked"; ?>
			                          @endif
			                        @endforeach
		                       	@endif

							<tr class="even pointer">

								<td class="a-center">
									<input value="{{$re->IdResultadoEstudiantil}}" type="checkbox" class="check" id="check" name="check[]" {{$temp}}></input>
								</td>
								<td class=" ">{{$re->studentsResult->Identificador}}</td>
								<td class=" ">{{$re->studentsResult->Descripcion}}</td>
							</tr>
							@endforeach
							@endif

						</tbody>
					</table>

					
	                <div class="row"></div>
                    <div class="separator"></div>

	                <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;">
							<a class="btn btn-default pull-left submit" href="{{ route('period_init.flujoCoordinador',$idEspecialidad) }}">< ATRAS</a>
							<!--<a class="btn btn-primary pull-right init" href="{{ route('activate.faculty') }}">Iniciar Ciclo</a>-->
							
							<button class="btn btn-success pull-right submit" type="submit">SIGUIENTE ></button>
							
						</div>
					</div>
					
				</div>

			</div>
		</div>

	</div>
</div>
</form>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>
jQuery(function ($) {
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
					 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
});
</script>
<script>
	$(function () {
		$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#cycleDateI").datepicker({
				firstDay: 1
			});
	});
</script>
<script>
	$(function () {
		$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#cycleDateF").datepicker({
				firstDay: 1,
				minDate: <?php echo date("d/m/Y");?>
			});
	});
</script>
<script type="text/javascript">
    function c(a)
    {
        a.checked='checked';
    }
</script>
<script type="text/javascript">
$("#select_all").change(function () {
	$('.check').prop("checked", $(this).prop("checked"));
});
</script>

<script src="{{ URL::asset('js/myvalidations/confFaculty.js')}}"></script>

	@endsection