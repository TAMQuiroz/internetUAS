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
				<form action="{{ route('saveAcademicCycle.faculty') }}" method="POST" id="formConfFaculty" novalidate="true" name="formConfFaculty" class="form-horizontal form-label-left">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">


					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Coordinador de Especialidad <span class="error">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select name="facultyCoordinator" id="facultyCoordinator"class="form-control" required="true">
								<option value="0">-- Seleccione --</option>
								@foreach( $teachers as $teach)
								  @if ($conf!=null && $conf->IdDocente==$teach->IdDocente)
								   <option value="{{$teach->IdDocente}}" selected="">{{$teach->Nombre.' '.$teach->ApellidoPaterno}}</option>
								  @else
								  <option value="{{$teach->IdDocente}}">{{$teach->Nombre.' '.$teach->ApellidoPaterno}}</option>
								  @endelse
								  @endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel de Criterio <span class="error"> *</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="criteriaLevel" class="form-control col-md-7 col-xs-12" type="number" name="criteriaLevel" value="@if($conf!=null){{$conf->CantNivelCriterio}}@endif">
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel de Aceptación <span class="error">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="facultyAgreementLevel" class="form-control col-md-7 col-xs-12" type="number" name="facultyAgreementLevel" value="@if($conf!=null){{$conf->NivelEsperado}}@endif">
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Aceptación % <span class="error">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="facultyAgreement" class="form-control col-md-7 col-xs-12" type="number" name="facultyAgreement"  value="@if($conf!=null){{$conf->UmbralAceptacion}}@endif">
						</div>
					</div>

					<div class="separator"></div>
					<div class="row">
						<div class="col-md-9 col-sm-12 col-xs-12">
							<button class="btn btn-success submit pull-right" type="submit">Guardar</button>
							</a>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
</div>
<script src="{{ URL::asset('js/myvalidations/confFaculty.js')}}"></script>
	@include('modals.delete-modal', ['message' => '¿Está seguro de querer eliminar esta especialidad?', 'action' => '#', 'button' => 'Delete'])
	@endsection