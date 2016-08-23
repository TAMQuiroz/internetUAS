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
				
				<!--
					 <div class="row" style="margin-top: 10px;">
					 <div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Coordinador de Especialidad<span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="cycle-coordinator" class="form-control col-md-7 col-xs-12" type="text" name="cycle-coordinator" value="" disabled >
                            </div>
					</div>
					</div>

				-->

					 
					<div class="row" style="margin-top: 10px;"> 	
					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo<span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              	<select name="cycle-id" id="cycle-id" class="form-control" required="true" disabled="true">
		                              	<option value="@if($cicle!=null) {{$cicle->academicCycle->IdCicloAcademico}} @endif">@if($cicle!=null){{$cicle->academicCycle->Descripcion}}@endif</option>
								</select>
                            </div>
					</div>
					</div>

					<div class="row" style="margin-top: 10px;">
					 <div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Inicio<span class="error">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="cycle-dateI" class="form-control col-md-7 col-xs-12 date" type="text" name="cycle-dateI"  value="@if($cicle!=null) <?php  echo date('d/m/Y',strtotime($cicle->FechaInicio)); ?> @endif" readonly>
						</div>
					</div>
					</div>

					<div class="row" style="margin-top: 10px;">
					 <div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Fin<span class="error">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="cycle-dateF" class="form-control col-md-7 col-xs-12" type="text" name="cycle-dateF"  value="@if($cicle!=null) <?php  echo date('d/m/Y',strtotime($cicle->FechaFin)); ?> @endif" readonly>
						</div>
					</div>
					</div>

					<div class="clearfix"></div>
                    <div class="separator"></div>

					<h2>Resultados Estudiantiles a Evaluarse</h2>

					<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
					<thead>
						<tr class="headings">
							<th class=" ">Identificador</th>
							<th class=" " width="80%">Resultado Estudiantil</th>
						</tr>
					</thead>
					<tbody>
					@if(Session::get('academic-cycle')!=null)
						@if($cyclexresults!=null)
							@foreach($cyclexresults as $cr)
							<tr class="even pointer">
								<td class=" ">{{$cr->studentsResult->Identificador}}</td>
								<td class=" ">{{$cr->studentsResult->Descripcion}}</td>
							</tr>
							@endforeach
						@endif
					@endif
					</tbody>
				</table>

					@if($period != null)
	                <div class="row">
						<div class="col-md-9 col-sm-12 col-xs-12">
							<a href="{{ route('editCycle.faculty') }}" class="btn btn-success pull-right submit">Editar</a>
						</div>
					</div>
					@else
					<div class="row">
                     	<div class="col-md-12 col-sm-12 col-xs-12">
                         	<div class="alert alert-warning">
                              	<strong>Advertencia: </strong> No hay un periodo activo, debe iniciar uno.
                         	</div>
                       	</div>
                  	</div>
                  	@endif
			</div>
		</div>
		
	</div>
</div>
<script src="{{ URL::asset('js/myvalidations/confFaculty.js')}}"></script>

	@endsection