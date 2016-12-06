


	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Objetivos Educacionales (OE)</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">

							@foreach($period->educationalObjetives as $objs)
								<p><strong>{{ $objs->Numero }}.</strong> {{ $objs->Descripcion }}</p>
							@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Resultados Estudiantiles (RE)</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						
	                        @foreach($period->studentsResults as $stRsl)
	                        	<h5><strong>{{ $stRsl->Identificador }}. {{ $stRsl->Descripcion }}</strong></h5>
	                        	<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<col>
											<col>
											<colgroup span=" {{ $period->configuration->CantNivelCriterio }} "></colgroup>
											<tr class="success">
												<th rowspan="2" class="text-center col-md-2">Aspecto</th>
												<th rowspan="2" class="text-center col-md-2">Criterio</th>
												<th colspan=" {{ $period->configuration->CantNivelCriterio }}" scope="colgroup" class="text-center">Nivel</th>
											</tr>
											<tr class="success">
											@for($valor = 1; $valor <= $period->configuration->CantNivelCriterio; $valor++)
												<th scope="col" class="text-center"> {{ $valor }} </th>
											@endfor
											</tr>
										</thead>
										<tbody>
										@foreach($stRsl->aspects as $SRasp)
										@foreach($period->aspects as $asp)
											@if($SRasp->IdAspecto == $asp->IdAspecto)

												<?php $cantCriterion = 0; ?>
												@foreach($asp->criterion as $Acrt)
												@foreach($period->criterions as $crt)
													@if($Acrt->IdCriterio == $crt->IdCriterio)
														<?php $cantCriterion = $cantCriterion + 1; ?>
														<tr>
															<td> {{ $asp->Nombre }} </td>
															<td> {{ $crt->Nombre }} </td>

															<?php $cantLevel = 0; $cantLvlPeriod = $period->configuration->CantNivelCriterio; ?>
															@foreach($crt->criterionLevel as $Clvl)
															@foreach($period->levels as $lvl)
																@if($cantLvlPeriod > $cantLevel and $Clvl->IdNivelCriterio == $lvl->IdNivelCriterio)
																	<?php $cantLevel = $cantLevel + 1; ?>
																	<td> {{ $lvl->Descripcion }} </td>
																@endif
															@endforeach
															@endforeach

															@if($cantLevel < $cantLvlPeriod)
																@for($v = $cantLevel; $v < $period->configuration->CantNivelCriterio; $v++)
																	<td> - </td>
																@endfor
															@endif
														</tr>
													@endif
												@endforeach
												@endforeach

												@if($cantCriterion == 0)
													<tr>
														<td> {{ $asp->Nombre }} </td>
														<td> - </td>
														@for($v = 1; $v <= $period->configuration->CantNivelCriterio; $v++)
															<td> - </td>
														@endfor
													</tr>
												@endif

											@endif
										@endforeach
										@endforeach
										</tbody>
									</table>
								</div>
	                        @endforeach	                 
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Relación entre OE y RE</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
						<col>
						<colgroup span="4"></colgroup>

						<tr class="success">
							<th rowspan="2" class="text-center col-md-8">Resultados Estudiantiles</th>
							<th colspan=" {{ count($period->educationalObjetives) }} " scope="colgroup" class="text-center">Objetivos Educacionales</th>
						</tr>
						<tr class="success">
							@if(count($period->educationalObjetives)>0)
								@foreach($period->educationalObjetives as $objs)
									<th scope="col" class="text-center">{{ $objs->Numero }}</th>
								@endforeach
							@endif
						</tr>
						</thead>
						<tbody>
							@foreach($period->studentsResults as $stRsl)
								<tr>
									<td>{{ $stRsl->Identificador }}. {{ $stRsl->Descripcion }}</td>
									@if(count($period->educationalObjetives)>0)
										@foreach($period->educationalObjetives as $objs)

											@if(count($stRsl->resultxObjective) > 0)
												<?php $temp = ''; ?>
												@foreach($stRsl->resultxObjective as $rxo)
													@if($rxo->IdObjetivoEducacional == $objs->IdObjetivoEducacional)
														<?php $temp = 'X'; ?>
													@endif
												@endforeach
												<td class="text-center"> {{ $temp }} </td>
											@else
												<td class="text-center"></td>
											@endif

										@endforeach
									@endif

								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
