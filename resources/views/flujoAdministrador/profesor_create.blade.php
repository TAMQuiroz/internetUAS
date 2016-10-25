@extends('appWithoutHamburger')
@section('content')
<div class="page-title">
	<div class="title_left">
		<h3>Crear profesor</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Información del Profesor</h2>
				<div class="clearfix"></div>
			</div>
			<form action="{{ route('profesor_store.flujoAdministrador', $idEspecialidad)}}" method="POST" id="formTeacher" name="formTeacher" novalidate="true" class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="text" id="validarCode" name="validarCode" hidden>
			<input type="text" id="validarEmail" name="validarEmail" hidden>
			<div class="x_content">
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código <span class="error">* </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control col-md-7 col-xs-12" type="text" name="teachercode" id="teachercode" required="true" maxlength="8">
					</div>
				</div>
				
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">* </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control col-md-7 col-xs-12" type="text" name="teachername" id="teachername" required="true">
					</div>
				</div>


				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span class="error">* </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control col-md-7 col-xs-12" type="text" name="teacherlastname" id="teacherlastname" required="true">
					</div>
				</div>

				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span class="error">* </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control col-md-7 col-xs-12" type="text" name="teachersecondlastname" id="teachersecondlastname" required="true">
					</div>
				</div>

				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correo <span class="error">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control col-md-7 col-xs-12" type="text" name="teacheremail" id="teacheremail" required="true">
					</div>
				</div>
					
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Categoría <span class="error">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select class="form-control" name="teacherposition" id="teacherposition" required="true">
							<option value="0">--Seleccione--</option>
							<option >Profesor Asociado</option>
							<option >Profesor Contratado</option>
							<option >Profesor Ordinario</option>
						</select>
					</div>
				</div>

				<input type="text" name="teacherstatus" id="teacherstatus" hidden="true" value="1">
				
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<textarea class="resizable_textarea form-control" id="teacherdescription" maxlength="200" name="teacherdescription" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;"></textarea>
					</div>
				</div> 
				
				<div class="clearfix"></div>
				<div class="separator"></div>

				<div class="row">
					<div class="col-md-9 col-sm-12 col-xs-12">
						 <button class="btn btn-success pull-right" type="submit"> Guardar</button>
						 <a href="{{ route('profesor_index.flujoAdministrador', $idEspecialidad) }}" class="btn btn-default pull-right"> Cancelar</a>
					</div>
				</div>
			</div>
			
			</form>
		</div>
	</div>
</div>

<script src="{{ URL::asset('js/myvalidations/teacher.js')}}"></script>
@endsection