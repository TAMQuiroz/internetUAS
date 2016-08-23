@extends('app')
@section('content')

<style type="text/css">
.fila-base{ display: none; } /* Fila Base Oculta */
</style>

<div class="page-title">
	<div class="title_left">
		<h3>{{ $title }}</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="separator"></div>

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<form class="form-horizontal" novalidate="true" action="{{ route('comment.enhacementPlan')}}" method="POST" id="editImprovementPlan" name="editImprovementPlan">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input name="improvementPlanId" id="improvementPlanId" value="{{$improvementPlan->IdPlanMejora}}" hidden="true" type="text">

					<div class="clearfix"></div>
					<h2>Actividades Planteadas</h2>
					<div class="separator"></div>

					<table class="table table-bordered" id="address-table" name="address-table">
                    	<thead>
                        	<tr>
                            	<th class="col-sm-1 text-center" style="vertical-align: middle">Fecha Planificada</th>
								<th class="col-sm-3 text-center" style="vertical-align: middle">Descripción</th>
								<th class="col-sm-2 text-center" style="vertical-align: middle">Responsable</th>
								<th class="col-sm-3 text-center" style="vertical-align: middle">Comentario</th>
								<th class="col-sm-2 text-center" style="vertical-align: middle">Porcentaje Avance</th>
								<th class="col-sm-1 text-center" style="vertical-align: middle">Acciones</th>
                           	</tr>
                   		</thead>
 						<tbody>

 							@foreach($actionplan as $act)
 							<tr class="success">
 								<td hidden="true"><input type="text" value="{{$act->IdPlanAccion}}" name="actionPlanId[]" id="actionPlanId"></input></td>
								<td class="actionPlanId" hidden="true">{{$act->IdPlanAccion}}</td>
								<td scope="col" class="text-center" style="vertical-align: middle">{{$act->cicle->Descripcion}}</td>
								<td><textarea type="text" class="form-control" rows="3" style="resize: vertical; vertical-align: middle;" readonly="true">{{$act->Descripcion}}</textarea></td>
								<!--<td scope="col" style="vertical-align: middle;" align="justify">{{$act->Descripcion}}</td>-->
								<td scope="col" class="text-center" style="vertical-align: middle;">
									<?php if ($act->IdDocente != null): ?>
                              			{{$act->teacher->Nombre}} {{$act->teacher->ApellidoPaterno}} {{$act->teacher->ApellidoMaterno}}
                                	<?php else: ?>
                                		Todos
                                	<?php endif ?>		
                                </td>
                                <td><textarea type="text" class="form-control" name="comment[]" id="comment" rows="3" style="resize: vertical; vertical-align: middle;"
									<?php if ($improvementPlan->Estado == "Cerrado"): ?>
										readonly="true"
									<?php endif ?>
								>{{$act->Comentario}}</textarea></td>
								
								<td style="vertical-align: middle">
									<select class="form-control col-md-7 col-xs-12" name="porcent[]" id="porcent" <?php if ($improvementPlan->Estado == "Cerrado"): ?>
										disabled="true"
									<?php endif ?>>
										<option value="0" <?php if ($act->Porcentaje == 0): ?> selected="true" <?php endif ?>>0%</option>
										<option value="5" <?php if ($act->Porcentaje == 5): ?> selected="true" <?php endif ?>>5%</option>
										<option value="10" <?php if ($act->Porcentaje == 10): ?> selected="true" <?php endif ?>>10%</option>
										<option value="15" <?php if ($act->Porcentaje == 15): ?> selected="true" <?php endif ?>>15%</option>
                              			<option value="20" <?php if ($act->Porcentaje == 20): ?> selected="true" <?php endif ?>>20%</option>
                              			<option value="25" <?php if ($act->Porcentaje == 25): ?> selected="true" <?php endif ?>>25%</option>
                              			<option value="30" <?php if ($act->Porcentaje == 30): ?> selected="true" <?php endif ?>>30%</option>
                              			<option value="35" <?php if ($act->Porcentaje == 35): ?> selected="true" <?php endif ?>>35%</option>
                              			<option value="40" <?php if ($act->Porcentaje == 40): ?> selected="true" <?php endif ?>>40%</option>
                              			<option value="45" <?php if ($act->Porcentaje == 45): ?> selected="true" <?php endif ?>>45%</option>
                              			<option value="50" <?php if ($act->Porcentaje == 50): ?> selected="true" <?php endif ?>>50%</option>
                              			<option value="55" <?php if ($act->Porcentaje == 55): ?> selected="true" <?php endif ?>>55%</option>
                              			<option value="60" <?php if ($act->Porcentaje == 60): ?> selected="true" <?php endif ?>>60%</option>
                              			<option value="65" <?php if ($act->Porcentaje == 65): ?> selected="true" <?php endif ?>>65%</option>
                              			<option value="70" <?php if ($act->Porcentaje == 70): ?> selected="true" <?php endif ?>>70%</option>
                              			<option value="75" <?php if ($act->Porcentaje == 75): ?> selected="true" <?php endif ?>>75%</option>
                              			<option value="80" <?php if ($act->Porcentaje == 80): ?> selected="true" <?php endif ?>>80%</option>
                              			<option value="85" <?php if ($act->Porcentaje == 85): ?> selected="true" <?php endif ?>>85%</option>
                              			<option value="90" <?php if ($act->Porcentaje == 90): ?> selected="true" <?php endif ?>>90%</option>
                              			<option value="95" <?php if ($act->Porcentaje == 95): ?> selected="true" <?php endif ?>>95%</option>
                              			<option value="100" <?php if ($act->Porcentaje == 100): ?> selected="true" <?php endif ?>>100%</option>
									</select>
								</td>
								<td class="col-sm-1 text-center" style="vertical-align: middle">
									<a class="btn btn-primary btn-xs" href="{{ route('uploadAction.enhacementPlan' , ['actionPlanId' => $act->IdPlanAccion, 'improvementPlanId' => $improvementPlan->IdPlanMejora] )}}" title="Subir Archivo"><i class="fa fa-upload"></i></a>

								</td>
							</tr>
                           	@endforeach
                      	</tbody>
                  	</table>
                  	
					<div class="hr-line-dashed"></div>
					<div class="clearfix"></div>
					<div class="separator"></div>

					<div class="row">
						<div class="col-md-9 col-sm-12 col-xs-12">
							 <button class="btn btn-success pull-right" type="submit"> Guardar</button>
							 <a href="{{ route('index.enhacementPlan') }}" class="btn btn-default pull-right"> Regresar</a>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		Dropzone.autoDiscover = false;
		$("#dropzone-enhacement").dropzone({ url: "/#" });
	});
</script>
<script type="text/javascript">
	$('textarea').autoResize();
</script>
@endsection