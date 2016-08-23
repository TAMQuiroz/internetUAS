@extends('app')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Perfil</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informacion del Perfil</h2>
                        <div class="clearfix"></div>
                    </div>

                    <form action="{{ route('update.profile') }}" method="POST" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="x_content">
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="profile-code" class="form-control col-md-7 col-xs-12" type="hidden"
                                           name="profile-code" maxlength="30" required="required" title="Nombre del Perfil"
                                           value="{{ $profile->IdPerfil }}" onkeypress="return isNumberKey(event)">

                                    <input id="profile-name" class="form-control col-md-7 col-xs-12" type="text"
                                           name="profile-name" maxlength="30" required="required" title="Nombre del Perfil"
                                           value="{{ $profile->Nombre }}" onkeypress="return isNumberKey(event)" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion <span class="error">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea cols="40" rows="5" id="course-academicLevel" class="form-control col-md-7 col-xs-12" maxlength="300"
                                          title="Descripcion del Perfil" name="profile-description" readonly>{{ $profile->Descripcion }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h2> Permisos </h2>
                                </div>
                            </div>

                            <table class="table table-striped responsive-utilities jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">Nombre</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($profilexpermissions!=null)
                                    @foreach($profilexpermissions as $profilexpermission)
                                        <tr class="even pointer">
                                            <td class=" ">{{ $profilexpermission->permission->Nombre }} </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>


                            <div class="clearfix"></div>
                            <div class="separator"></div>

                            <div class="row">
                                <div class="col-md-9 col-sm-12 col-xs-12">
                                 @if(in_array(64,Session::get('actions')))
                                    <a href="{{ route('edit.profile', ['profileCode' => $profile->IdPerfil]) }}" class="btn btn-success pull-right" >Editar</a>
                                @endif
                                    <a href="{{ route('index.profile') }}" class="btn btn-default pull-right">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection