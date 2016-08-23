@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Visitantes (Acreditadores)</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar">
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                  </span>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(in_array(57,Session::get('actions')))
                            <a href="{{ route('new.users') }}" class="btn btn-success pull-right" name="btnNewUSer"><i class="fa fa-plus"></i> Nuevo Visitante</a>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Nombre del Visitante</th>
                        <th class="column-title">Nombre de Usuario</th>
                        <th class="column-title">Perfil</th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($users !=null)

                        @foreach($users as $user)
                            <tr class="even pointer">
                                <td hidden class="user-id">{{ $user->IdUsuario }}</td>
                                <td class="col-sm-4">{{$user->Nombre}} {{$user->ApellidoPaterno}} {{$user->ApellidoMaterno}}</td>
                                <td class="col-sm-3">{{ $user->user->Usuario }}</td>
                                <td class="col-sm-3">{{ $user->user->profile->Nombre}}</td>
                                <td class="col-sm-2">
                                    @if(in_array(61,Session::get('actions')))
                                        <a class="btn btn-primary btn-xs view-user" ><i class="fa fa-search"></i></a>
                                    @endif

                                    @if(in_array(59,Session::get('actions')))
                                        <a href="{{ route('edit.users', ['userCode' => $user->IdUsuario]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    @endif

                                    @if(in_array(60,Session::get('actions')))
                                        <a href="" class="btn btn-danger btn-xs delete-user" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/intranetjs/users/index-script.js')}}"></script>

    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar este Usuario?', 'action' => '#', 'button' => 'Delete'])
    @include('users.view-modal', ['title' => 'User Record'])
@endsection