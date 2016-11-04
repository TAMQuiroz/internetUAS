@extends('appWithoutHamburger')
@section('content')
<div class="page-title">
	<div class="title_left">
		<h3>Crear Instrumento</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Instrumento</h2>
				<div class="clearfix"></div>
			</div>
			<form action="{{ route('instrumento_store.flujoCoordinador', $idEspecialidad)}}" method="POST" id="formInstrumento" name="formInstrumento" novalidate="true" class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<div class="x_content">
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">* </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control col-md-7 col-xs-12" type="text" name="nombre" id="instrumentonombre" required="true" maxlength="20">
					</div>
				</div>
				
				<div class="clearfix"></div>
				<div class="separator"></div>

				<div class="row">
					<div class="col-md-9 col-sm-12 col-xs-12">
						 <button class="btn btn-success pull-right" type="submit"> Guardar</button>
						 <a href="{{ route('instrumento_index.flujoCoordinador', $idEspecialidad) }}" class="btn btn-default pull-right"> Cancelar</a>
					</div>
				</div>

			</div>
			
			</form>
		</div>
	</div>
</div>

@endsection