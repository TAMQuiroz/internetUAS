@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>{{$title}}</h3>
	</div>
</div>


{{ Form::button('Finalizar Periodo', ['class' => 'btn btn-primary pull-right final', 'data-toggle' => 'modal', 'data-target' => '#modalDelete'])}}

<form action="{{ route('updatePeriod.faculty') }}" method="POST" id="formEditPeriod"  name="formEditPeriod" novalidate="true" class="form-horizontal">
	<input type="hidden" name="conf-code" value="{{ $period->configuration->IdConfEspecialidad }}">
	<input type="hidden" name="period-code" value="{{ $period->IdPeriodo }}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" id="validateIdentifier" name="validateIdentifier" hidden>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<div class="form-horizontal">
						<div class="row" style="margin-top: 10px;">
						<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo Inicio<span class="error">*</span></label>
	                            <div class="col-md-6 col-sm-6 col-xs-12">
	                              	<select name="cycleStart" id="cycleStart" class="form-control" required="true">
										<option value="0">-- Seleccione --</option>
										@foreach($semesters as $s)
											@if($s->deleted_at == null)
												<option {{ ($period->configuration->IdCicloInicio == $s->IdCicloAcademico)?'selected':'' }} numero="{{ $s->Numero }}" value="{{ $s->IdCicloAcademico }}">{{ $s->Descripcion }}</option>
											@endif	
										@endforeach
									</select>
	                            </div>
						</div>
						</div>
						<div class="row" style="margin-top: 10px;">
						<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo Fin<span class="error">*</span></label>
	                            <div class="col-md-6 col-sm-6 col-xs-12">
	                              	<select name="cycleEnd" id="cycleEnd" class="form-control" required="true">
										<option value="0">-- Seleccione --</option>
										@foreach($semesters as $s)
											@if($s->deleted_at == null)
												<option {{ ($period->configuration->IdCicloFin == $s->IdCicloAcademico)?'selected':'' }} numero="{{ $s->Numero }}" value="{{ $s->IdCicloAcademico }}">{{ $s->Descripcion }}</option>
											@endif	
										@endforeach
									</select>
	                            </div>
						</div>
						</div>

						 <div class="row" style="margin-top: 10px;">
						 <div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel de Criterio <span class="error"> *</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="criteriaLevel" class="form-control col-md-7 col-xs-12" type="number" name="criteriaLevel" value="{{ $period->configuration->CantNivelCriterio }}">
							</div>
						</div>
						</div>

						 <div class="row" style="margin-top: 10px;">
						 <div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel de Aceptación <span class="error">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="facultyAgreementLevel" class="form-control col-md-7 col-xs-12" type="number" name="facultyAgreementLevel" value="{{$period->configuration->NivelEsperado}}" >
							</div>
						</div>
						</div>

						<div class="row" style="margin-top: 10px;">
							 <div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Aceptación % <span class="error">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="facultyAgreement" class="form-control col-md-7 col-xs-12" type="number" name="facultyAgreement"  value="{{$period->configuration->UmbralAceptacion}}" >
								</div>
							</div>
						</div>
						<div class="separator"></div>
						<div class="row">
	                        <div class="col-md-6">
	                            <h2> Instrumentos de Medición </h2>
	                        </div>
	                        <div class="col-md-6 col-sm-12 col-xs-12">
	                            <div class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-measures">
	                                <i class="fa fa-plus"></i> Asociar Instrumentos de Medición
	                            </div>
	                        </div>
	                    </div>

	                    <div class="row">
	                        <table class="table table-striped responsive-utilities jambo_table bulk_action" id="measaure_table"  name="table-objs">
	                            <thead>
	                            <tr class="headings">
	                                <th class="column-title">Nombre</th>
	                                <th class="column-title">Acción</th>
	                            </tr>
	                            </thead>
	                            <tbody>
	                            	@foreach($period->measures as $m)
	                            		<tr>
											<input type="hidden" name="measures[]" value="{{ $m->IdFuenteMedicion }}">
	                            			<td>{{ $m->Nombre }}</td>
	                            			<td><div class="btn btn-danger btn-xs delete-measure"><i class="fa fa-remove"></i></div></td>
	                            		</tr>
	                            	@endforeach
								</tbody>
							</table>
						</div>
						<div class="separator"></div>
	                    <div class="row">
	                        <div class="col-md-6">
	                            <h2> Ciclos del periodo </h2>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <table class="table table-striped responsive-utilities jambo_table bulk_action" id="measaure_table"  name="table-objs">
	                            <thead>
	                            <tr class="headings">
	                                <th class="column-title">Estado</th>
	                                <th class="column-title">Ciclo</th>
	                                <th class="column-title">Editar periodo actual</th>
	                            </tr>
	                            </thead>
	                            <tbody>
	                                @foreach($period_semesters as $semester)
	                                    <tr>
	                                        <td>
	                                            @if($semester->Vigente)
	                                                <span class="label label-success">Activo</span>
	                                            @else
	                                                <span class="label label-danger">Cerrado</span>
	                                            @endif
	                                        </td>
	                                        <td>{{ $semester->academicCycle->Descripcion }}</td>
	                                        <td>
	                                            @if($semester->Vigente)
	                                                <a href="{{ url('/faculty/viewCycle') }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
	                                            @endif
	                                        </td>
	                                    </tr>
	                                @endforeach
	                            </tbody>
	                        </table>
	                    </div>


						<div class="row">
							<div class="col-md-6">
								<h2> Asociar Objetivos Educacionales </h2>
							</div>
						</div>
						<div class="separator"></div>

						<div class="row">
							<table class="table table-striped responsive-utilities jambo_table bulk_action">
								<thead>
								<tr class="headings">
									<th>
										<input type="checkbox" id="objCheckAll" name="objCheckAll">
									</th>
									<th colspan="3" scope="colgroup" class="text-center"> Objetivos Educacionales </th>
								</tr>
								</thead>
								<tbody>
								@foreach($educationalObjetives as $obj)
									<?php $tempObj = ""; ?>
									@if($period->educationalObjetives()->where('PeriodoxObjetivo.IdObjetivoEducacional', '=', $obj->IdObjetivoEducacional)->first() != null)
										<?php $tempObj = "checked"; ?>
									@endif

									<?php $results = ""; ?>
									@foreach($obj->studentsResults as $result)
										<?php $results = $results . " A" . $result->IdResultadoEstudiantil; ?>
									@endforeach
									<tr>
										<td>
											<input type="checkbox" value="{{$obj->IdObjetivoEducacional}}" id="objCheck{{$obj->IdObjetivoEducacional}}" class="objCheck {{$results}}" name="objCheck[]" {{$tempObj}} />
										</td>
										<td colspan="3" scope="colgroup">{{$obj->Numero}}. {{$obj->Descripcion}}</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>

						<div class="row">
							<div class="col-md-6">
								<h2> Asociar Resultados Estudiantiles </h2>
							</div>
						</div>
						<div class="separator"></div>

						<div class="row">
							<table class="table table-striped responsive-utilities jambo_table bulk_action">
								<thead>
								<tr class="headings">
									<th>
										<input type="checkbox" id="stRstCheckAll" name="stRstCheckAll">
									</th>
									<th colspan="3" scope="colgroup" class="text-center"> Resultados Estudiantiles </th>
								</tr>
								</thead>
								<tbody>
								@foreach($studentsResults as $stRst)
									<?php $tempStRst = ""; ?>
									@if($period->studentsResults()->where('PeriodoxResultado.IdResultadoEstudiantil', '=', $stRst->IdResultadoEstudiantil)->first() != null)
										<?php $tempStRst = "checked"; ?>
									@endif
									<?php $objs = ""; ?>
									@foreach($stRst->educationalObjectives as $objective)
										<?php $objs = $objs . " O" . $objective->IdObjetivoEducacional; ?>
									@endforeach
									<tr class="success">
										<td>
											<input type="checkbox" value="{{$stRst->IdResultadoEstudiantil}}" id="stRstCheckA{{$stRst->IdResultadoEstudiantil}}" class="stRstCheck {{$objs}}" name="stRstCheck[]" {{$tempStRst}} />
										</td>
										<td colspan="3" scope="colgroup">{{$stRst->Identificador}}. {{$stRst->Descripcion}}</td>
									</tr>
									@foreach($stRst->aspect as $asp)
										<?php $tempAsp = ""; ?>
										@if($period->aspects()->where('PeriodoxAspecto.IdAspecto', '=', $asp->IdAspecto)->first() != null)
											<?php $tempAsp = "checked"; ?>
										@endif
										<tr>
											<td></td>
											<td>
												<input type="checkbox" value="{{$asp->IdAspecto}}" id="aspCheckC{{$asp->IdAspecto}}" class="aspCheck A{{$stRst->IdResultadoEstudiantil}} {{$objs}}" name="aspCheck[]" {{$tempAsp}} />
											</td>
											<td colspan="2" scope="colgroup">{{ $asp->Nombre }}</td>
										</tr>
										@foreach($asp->criterion as $crt)
											<?php $tempCrt = ""; ?>
											@if($period->criterions()->where('PeriodoxCriterio.IdCriterio', '=', $crt->IdCriterio)->first() != null)
												<?php $tempCrt = "checked"; ?>
											@endif
											<tr>
												<td scope="col" ></td>
												<td scope="col" ></td>
												<td>
													<input type="checkbox" value="{{$crt->IdCriterio}}" id="crtCheck{{$crt->IdCriterio}}" class="crtCheck A{{$stRst->IdResultadoEstudiantil}} C{{$asp->IdAspecto}} {{$objs}}" name="crtCheck[]" {{$tempCrt}} />
												</td>
												<td colspan="1" scope="colgroup">{{ $crt->Nombre }}</td>
											</tr>
										@endforeach
									@endforeach
								@endforeach
								</tbody>
							</table>
						</div>

	                    <div class="separator"></div>

						<div class="row" style="margin-top: 10px;">
		                    <div class="col-md-9 col-sm-9 col-xs-9"></div>
			                  	<div class="col-md-3 col-sm-3 col-xs-3">
			                    <a class="btn btn-default submit" href="{{ url('faculty/periods') }}">Cancelar</a>

								<button class="btn btn-success pull-right submit" type="submit">Guardar</button>
		                  	</div>
		                </div>

					</div>

				</div>
			</div>

		</div>
	</div>

</form>

<script src="{{ URL::asset('js/myvalidations/confFaculty.js')}}"></script>
<script src="{{ URL::asset('js/myvalidations/periods.js')}}"></script>
@include('modals.delete', ['id'=>'modalDelete','message' => '¿Esta seguro que desea eliminar este periodo?', 'route' => route('endPeriod.faculty', $period->IdPeriodo)])
@include('periods.modals-measures')

<script src="{{ URL::asset('js/intranetjs/period/edit-script.js')}}"></script>

@endsection