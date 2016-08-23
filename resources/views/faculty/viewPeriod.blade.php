@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>{{$title}}</h3>
	</div>
</div>

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="form-horizontal">
				

					<div class="row" style="margin-top: 10px;"> 	
					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo Inicio<span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              	<select name="cycle-coordinator" id="cycle-coordinator" class="form-control" disabled="">
									<option value="">-- Seleccione --</option>
									@if($conf!=null && $conf->IdCicloInicio==2) <option value="2" selected="">2016-2</option> 
								    @else  <option value="2" >2016-2</option>   @endif
								    @if($conf!=null && $conf->IdCicloInicio==1) <option value="1" selected="">2016-1</option> 
								    @else  <option value="1" >2016-1</option>   @endif
								</select>
                            </div>
					</div>
					</div>

					<div class="row" style="margin-top: 10px;"> 	
					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo Fin<span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              	<select name="cycle-coordinator" id="cycle-coordinator" class="form-control" disabled="">
									<option value="">-- Seleccione --</option>
									@if($conf!=null && $conf->IdCicloFin==2) <option value="2" selected="">2016-2</option> 
								    @else  <option value="2" >2016-2</option>   @endif
								    @if($conf!=null && $conf->IdCicloFin==1) <option value="1" selected="">2016-1</option> 
								    @else  <option value="1" >2016-1</option>   @endif
								</select>
                            </div>
					</div>
					</div>


					 <div class="row" style="margin-top: 10px;">
					 <div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel de Criterio <span class="error"> *</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="criteriaLevel" class="form-control col-md-7 col-xs-12" type="number" name="criteriaLevel" value="@if($conf!=null){{$conf->CantNivelCriterio}}@endif" readonly>
						</div>
					</div>
					</div>

					 <div class="row" style="margin-top: 10px;">
					 <div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel de Aceptación <span class="error">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="facultyAgreementLevel" class="form-control col-md-7 col-xs-12" type="number" name="facultyAgreementLevel" value="@if($conf!=null){{$conf->NivelEsperado}}@endif" readonly>
						</div>
					</div>
					</div>

					 <div class="row" style="margin-top: 10px;">
					 <div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Aceptación % <span class="error">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="facultyAgreement" class="form-control col-md-7 col-xs-12" type="number" name="facultyAgreement"  value="@if($conf!=null){{$conf->UmbralAceptacion}}@endif" readonly>
						</div>
					</div>
					</div>

					<div class="separator"></div>

					 <div class="row" style="margin-top: 10px;">
	                    <div class="col-md-9 col-sm-9 col-xs-9"></div>
		                  	<div class="col-md-3 col-sm-3 col-xs-3">
		                    <a href="{{ route('editPeriod.faculty') }}" class="btn btn-success submit">Editar</a>
	                  	</div>                                         
	                </div>
				</div>

			</div>
		</div>
		
	</div>
</div>
<script src="{{ URL::asset('js/myvalidations/confFaculty.js')}}"></script>

	@endsection