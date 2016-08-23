@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> Editar Mi Usuario</h3>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Mi información</h2>
                    <div class="clearfix"></div>
                </div>
                <!--Session::get('user', 'relations')->user->IdPerfil-->
                <form action="{{ route('update.myUser') }}" method="POST" class="form-horizontal" id="editUser">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="user-id" name="user-id" value="{{ $user->IdUsuario }}">
                    <input type="hidden" id="accreditororteacher-id" name="accreditororteacher-id" value="{{  $myUserId }}">
                    <div class="x_content">
                        <div class="form-group">
                            <input type="text" id="validateCode" name="validateCode" hidden>
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Usuario </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userusername" class="form-control col-md-7 col-xs-12" type="text" name="userusername" maxlength="30" required="required" onkeypress="return isNumberKey(event)" value="{{ $user->Usuario }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userfirstname" class="form-control col-md-7 col-xs-12" type="text" name="userfirstname" maxlength="20" required="required" onkeypress="return isNumberKey(event)" value="{{ $myUserName }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userlastname" class="form-control col-md-7 col-xs-12" type="text" name="userlastname"  maxlength="20" required="required" onkeypress="return isNumberKey(event)" value="{{ $myUserLNameFather }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userspanishlastname" class="form-control col-md-7 col-xs-12" type="text" name="userspanishlastname"  maxlength="20" required="required" onkeypress="return isNumberKey(event)" value="{{ $myUserLNameMother }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correo <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="useremail" class="form-control col-md-7 col-xs-12" type="text" name="useremail" maxlength="30" required="required" onkeypress="return isNumberKey(event)" value="{{$myUserEmail }}">
                            </div>
                        </div>

                        <input type="text" name="profilecode" value="{{Session::get('user', 'relations')->user->IdPerfil}}" hidden>
                        <input type="text" name="facultyCode" value="{{Session::get('user')->IdEspecialidad}}" hidden>

                        <div class="separator"></div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nueva Contraseña</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" class="form-control" placeholder="Contraseña" id="password"  name="password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Repetir Contraseña</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" class="form-control" placeholder="Repetir Contraseña"  id="repeat_password" name="repeat_password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="alert alert-error" id="pw-message-error" style="display:none; margin:0 auto; width:50%">
                                Ambas contraseñas deben ser iguales y tener al menos 8 caracteres
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <button class="btn btn-success pull-right" type="submit">Guardar</button>
                                <a href="{{ route('index.users') }}" class="btn btn-default pull-right"> Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/intranetjs/myUser/edit-script.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/user.js')}}"></script>
@endsection