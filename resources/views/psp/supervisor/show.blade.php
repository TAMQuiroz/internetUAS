@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Mostrar Supervisor</h3>
    </div>
</div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Informacion del Supervisor</h2>
                    <div class="clearfix"></div>
                </div>
                <form action="{{ route('supervisor.update',1) }}" method="POST" class="form-horizontal" id="editSup" novalidate="true">
                    

                    <div class="x_content">
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="teachercode" id="teachercode" required="true" maxlength="8" value="20112188" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" id="validateCode" name="validateCode" hidden>
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre(s)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userfirstname" class="form-control col-md-7 col-xs-12" type="text" name="userfirstname" maxlength="20" value="Claudia" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userlastname" class="form-control col-md-7 col-xs-12" type="text" name="userlastname"
                                       maxlength="20" value="Villanueva" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userspanishlastname" class="form-control col-md-7 col-xs-12" type="text" name="userspanishlastname"
                                       maxlength="20" value="Chirinos" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="useremail" class="form-control col-md-7 col-xs-12" type="text" name="useremail"
                                       maxlength="30" value="claudia@pucp.pe" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userusername" class="form-control col-md-7 col-xs-12" type="text" 
                                   maxlength="30" value="1231234" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Dirección</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userusername" class="form-control col-md-7 col-xs-12" type="text" 
                                   maxlength="30" value="Av Mundo 1234" disabled>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <!--<button class="btn btn-success pull-right" name="btnSave" type="submit">Guardar</button>-->
                                <a href="{{ route('supervisor.index') }}" class="btn btn-default pull-right"> Regresar</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection