@extends('appWithoutHamburger')
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
			<div class="x_title">
				<h2>Nuevo Aspecto</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form class="form-horizontal" novalidate="true" action="{{ route('aspect_store.flujoAdministrador')}}" method="POST" id="formAcademic" name="formAcademic">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="x_content">
						<div class="form-group">
				          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resultado Estudiantil <span class="error">*</span></label>
				          <div class="col-md-6 col-sm-6 col-xs-12">
		                      <select id="studentsResult_new_code" class="form-control col-md-7 col-xs-12" type="text" name="studentsResult_new_code" >
		                        @if($resultado==null)
		                        	<option value="">-- Seleccione un resultado--</option>
		                        @else($resultado!=null)
		                          <option value="{{$resultado->IdResultadoEstudiantil}}">
		                            {{ $resultado->Identificador }} - {{ $resultado->Descripcion }}
		                          </option>
		             			@endif
		                      </select>
	                    	</div>
				        </div>
						<div class="form-group">
				          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del Aspecto<span class="error">*</span></label>
				          <div class="col-md-6 col-sm-6 col-xs-12">
				            <input id="aspect_new_name" class="form-control col-md-7 col-xs-12" type="text" name="aspect_new_name" required="true" >
				          </div>
				        </div>
						<div class="row">
							<div class="col-md-9 col-sm-12 col-xs-12">
								<button class="btn btn-success pull-right" type="submit" value="Guardar">Guardar</button>
								<a class="btn btn-default pull-right" href="{{ route('aspect_index.flujoAdministrador') }}">Atras</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="{{ URL::asset('js/myvalidations/aspect.js')}}"></script>

@endsection
    