@extends('app')
@section('content')
<div class="page-title">
	<div class="title_left">
		<h3>{{ $title }}</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<form action="{{ route('update.typeImprovement')}}" method="POST" id="editTypeImprovement" name="editTypeImprovement" novalidate="true" class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input name="typeImprovementPlanId" id="typeImprovementPlanId" value="{{$typeImprovementPlan->IdTipoPlanMejora}}" hidden="true" type="text">
			<input type="text" id="validarCode" name="validarCode" hidden>
			<div class="x_content">
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código <span class="error">* </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control col-md-7 col-xs-12" type="text" name="code" id="code" required="true" value="{{$typeImprovementPlan->Codigo}}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tema Relacionado <span class="error">* </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control col-md-7 col-xs-12" type="text" name="theme" id="theme" required="true" value="{{$typeImprovementPlan->Tema}}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<textarea class="resizable_textarea form-control" id="description" name="description" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: vertical; height: 80px;">{{$typeImprovementPlan->Descripcion}}</textarea>
					</div>
				</div> 
				
				<div class="clearfix"></div>
				<div class="separator"></div>

				<div class="row">
					<div class="col-md-9 col-sm-12 col-xs-12">
						 <button class="btn btn-success pull-right" type="submit"> Guardar</button>
						 <a href="{{ route('index.typeImprovement') }}" class="btn btn-default pull-right"> Cancelar</a>
					</div>
				</div>
			</div>
			
			</form>
		</div>
	</div>
</div>

<script src="{{ URL::asset('js/myvalidations/typeImprovementPlan.js')}}"></script>
@endsection