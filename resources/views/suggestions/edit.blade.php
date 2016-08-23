@extends('app')
@section('content')

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
					<form class="form-horizontal" novalidate="true" action="{{ route('update.suggestions')}}" method="POST" id="editSuggestion" name="editSuggestion">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input name="suggestionId" id="suggestionId" value="{{ $suggestion->IdSugerencia}}" hidden="true" type="text">
						<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Título <span class="error">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-12" type="text" name="title" id="title" required="true" value="{{$suggestion->Titulo}}">
							</div>
						</div>

						<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="error">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea class="form-control col-md-7 col-xs-12" id="description" name="description" rows="4" required="true" style="resize: vertical;">{{$suggestion->Descripcion}}</textarea>
							</div>
						</div>
						<div class="separator"></div>
						@if ($suggestion->IdPlanMejora == null)
							<div class="form-group">
								<div class="control-label col-md-3 col-sm-3 col-xs-12"></div>

								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="checkbox">
										<label class="">
											¿Asociar a Plan de Mejora?
											<div class="icheckbox_flat-green checked" style="position: relative;" id="asociarplan">
												<input type="checkbox" class="flat" style="position: absolute; opacity: 0;">
												<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
											</div>
										</label>
									</div>
								</div>

							</div>
						@endif
						<div class="form-group"
							 <?php if ($suggestion->IdPlanMejora == null): ?>
							 id="divplan" style="display:none;"
						<?php endif ?> >
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Plan de Mejora </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control col-md-7 col-xs-12" name="improvementPlan" id="improvementPlan">
									<option value="0">-- Seleccione --</option>
									@if($improvementPlans != null)
										@foreach($improvementPlans as $plans)
											<option value="{{$plans->IdPlanMejora}}" <?php if ($plans->IdPlanMejora == $suggestion->IdPlanMejora): ?>
											selected="true"
											<?php endif ?>>{{$plans->Descripcion}}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>

						<div class="separator"></div>

						<div class="row">
							<div class="col-md-9 col-sm-12 col-xs-12">
								<button class="btn btn-success pull-right" type="submit">Guardar</button>
								<a class="btn btn-default pull-right" href="{{ route('index.suggestions') }}">Cancelar</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$( document ).ready(function(){
			$('#asociarplan').on('click',function(){
				$('#divplan').toggle();
				/*if ($('#asociarplan>div').hasClass('checked') ) {
				 console.log('holi');
				 $('#divplan').removeClass('hidden');
				 }else{
				 console.log('gato');
				 $('#divplan').addClass('hidden');
				 }*/
			});
		});
	</script>
	<script src="{{ URL::asset('js/myvalidations/suggestion.js')}}"></script>
@endsection