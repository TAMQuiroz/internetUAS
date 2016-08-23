@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> Nuevo Perfil</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Información del Perfil</h2>
                    <div class="clearfix"></div>
                </div>

                <form action="{{ route('save.profile') }}" method="POST" class="form-horizontal" id="formProfile">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="x_content">
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="profilename" class="form-control col-md-7 col-xs-12" type="text"
                                       name="profilename" maxlength="30" required="required" title="Nombre del Perfil">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea cols="40" rows="5" id="profiledescription" class="form-control col-md-7 col-xs-12" maxlength="100"
                                          title="Descripcion del Perfil" name="profiledescription"></textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <h2> Permisos </h2>
                            </div>
                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar" name="keysearchpermission" id="keysearchpermission">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">
                                    <input type="checkbox" class="check" id="select_all" title="Selecciona todo"/>
                                </th>
                                <th class="column-title">Descripcion</th>
                            </tr>
                            </thead>
                        </table>
                        <table class="table table-striped responsive-utilities jambo_table bulk_action" id="permissiontable">
                            <tbody>
                            @if($permissions!=null)
                                @foreach($permissions as $permission)
                                    <tr class="even pointer">
                                        <td>
                                            <input value="{{ $permission->IdAccion }}" type="checkbox" class="check" id="objsCheck" name="objsCheck[]" >
                                        </td>
                                        <td class=" ">{{ $permission->Nombre }} </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                        <div class="clearfix"></div>
                        <div class="separator"></div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <button class="btn btn-success pull-right" type="submit" name="btnSave">Guardar</button>
                                <a href="{{ route('index.courses') }}" class="btn btn-default pull-right">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/myvalidations/profile.js')}}"></script>
    <script src="{{ URL::asset('js/intranetjs/profiles/form-edit-script.js')}}"></script>
    <script type="text/javascript">
        $("#select_all").change(function () {
            $('.check').prop("checked", $(this).prop("checked"));
        });
    </script>
@endsection