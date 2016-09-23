@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Perfiles</h3>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(in_array(62,Session::get('actions')))
                            <a href="{{ route('new.profile') }}" class="btn btn-success pull-right"><i class="fa fa-plus" name="btnNewProfile"></i> Nuevo Perfil</a>
                        @endif
                    </div>
                </div>

                <div class="x_content">
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Nombre </th>
                        <th class="column-title">Descripcion </th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $profile)
                        <tr class="even pointer">
                            <td hidden class="profile-id">{{ $profile->IdPerfil }}</td>
                            <td class=" ">{{ $profile->Nombre }}</td>
                            <td class=" ">{{ $profile->Descripcion }}</td>
                            <td class=" ">
                                @if(in_array(66,Session::get('actions')))
                                    <a href="{{ route('view.profile', ['profileCode' => $profile->IdPerfil]) }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                                @endif

                                @if(in_array(64,Session::get('actions')))
                                    <a href="{{ route('edit.profile', ['profileCode' => $profile->IdPerfil]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                @endif

                                @if($profile->IdPerfil != 2 && $profile->IdPerfil != 1 && $profile->IdPerfil != 4 && $profile->IdPerfil != 3 && $profile->IdPerfil != 5)
                                    @if(in_array(65,Session::get('actions')))
                                        <a href="" class="btn btn-danger btn-xs delete-profile" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="{{ URL::asset('js/intranetjs/profiles/index-script.js')}}"></script>

    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el perfil?', 'action' => '#', 'button' => 'Delete'])

@endsection