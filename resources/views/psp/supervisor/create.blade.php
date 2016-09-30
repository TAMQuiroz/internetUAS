@extends('app')
@section('content')
<div class="page-title">
	<div class="title_left">
		<h3>Nuevo Supervisor</h3>
	</div>
</div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Informacion del Supervisor</h2>
                    <div class="clearfix"></div>
                </div>
                <form  class="form-horizontal" id="formUser" novalidate="true">
                <!--<form action="{{ route('supervisor.store') }}" method="POST" class="form-horizontal" id="formUser" novalidate="true">-->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="x_content">
                    	<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código <span class="error">* </span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-12" type="text" name="teachercode" id="teachercode" required="true" maxlength="8">
							</div>
						</div>
                        <div class="form-group">
                            <input type="text" id="validateCode" name="validateCode" hidden>
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre(s)<span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userfirstname" class="form-control col-md-7 col-xs-12" type="text" name="userfirstname" maxlength="20" required="required" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userlastname" class="form-control col-md-7 col-xs-12" type="text" name="userlastname"
                                       maxlength="20" required="required" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userspanishlastname" class="form-control col-md-7 col-xs-12" type="text" name="userspanishlastname"
                                       maxlength="20" required="required" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correo <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="useremail" class="form-control col-md-7 col-xs-12" type="text" name="useremail"
                                       maxlength="30" required="required" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userusername" class="form-control col-md-7 col-xs-12" type="text" 
                                   maxlength="30" required="required" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Dirección <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userusername" class="form-control col-md-7 col-xs-12" type="text" 
                                   maxlength="30" required="required" >
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <button class="btn btn-success pull-right" name="btnSave" type="submit">Guardar</button>
                                <a href="{{ route('supervisor.index') }}" class="btn btn-default pull-right"> Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection