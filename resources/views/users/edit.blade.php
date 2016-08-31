@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> Editar Visitante</h3>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Información del Visitante</h2>
                    <div class="clearfix"></div>
                </div>
                <form action="{{ route('update.users') }}" method="POST" class="form-horizontal" id="editUser" novalidate="true">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="user-id" name="user-id" value="{{ $user->IdUsuario }}">
                    <input type="hidden" id="accreditor-id" name="accreditor-id" value="{{ $accreditor->IdAcreditador }}">


                    <div class="x_content">

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userfirstname" class="form-control col-md-7 col-xs-12" type="text" name="userfirstname" maxlength="20" required="required" onkeypress="return isNumberKey(event)" value="{{ $accreditor->Nombre }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userlastname" class="form-control col-md-7 col-xs-12" type="text" name="userlastname"  maxlength="20" required="required" onkeypress="return isNumberKey(event)" value="{{ $accreditor->ApellidoPaterno }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userspanishlastname" class="form-control col-md-7 col-xs-12" type="text" name="userspanishlastname"  maxlength="20" required="required" onkeypress="return isNumberKey(event)" value="{{ $accreditor->ApellidoMaterno }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correo <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="useremail" class="form-control col-md-7 col-xs-12" type="text" name="useremail" maxlength="30" required="required" onkeypress="return isNumberKey(event)" value="{{ $accreditor->Correo }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" id="validateCode" name="validateCode" hidden>
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Usuario <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="userusername" class="form-control col-md-7 col-xs-12" type="text" name="userusername" maxlength="30" required="required" onkeypress="return isNumberKey(event)" value="{{ $user->Usuario }}" disabled>
                            </div>
                        </div>


                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Perfil:</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" required="required"  name="profilecode" id="profilecode" >

                                        <option value="">-- Seleccione --</option>

                                        @foreach( $profiles as $prof)
                                            @if($prof->IdPerfil > 2)
                                                @if ($user->IdPerfil==$prof->IdPerfil)
                                                    <option value="{{$prof->IdPerfil}}" selected="">{{$prof->Nombre}}</option>
                                                @else
                                                    <option value="{{$prof->IdPerfil}}">{{$prof->Nombre}}</option>

                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" id="facultyBlock" hidden>
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Facultad <span class="error">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="facultyCode" id="facultyCode" class="form-control" required="required">
                                        @foreach( $faculties as $faculty)
                                            <option value="{{$faculty->IdEspecialidad}}">{{$faculty->Nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator"></div>

                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nueva Clave</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" class="form-control" placeholder="Contraseña" id="password"  name="password" />
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

    <script src="{{ URL::asset('js/intranetjs/users/edit-script.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/user.js')}}"></script>
@endsection