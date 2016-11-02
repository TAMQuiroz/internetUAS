@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Lista de Grupos de Investigación</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Grupos</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="#" method="get">
                            <div class="input-group">
                                <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                <input class="form-control" id="group-search" name="q" placeholder="Buscar" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    @if(Auth::user()->IdPerfil != 5 || Auth::user()->IdPerfil == Config::get('constants.admin'))
                    <div class="col-md-6">
                        <a href="{{route('grupo.create')}}">
                            {{Form::button('<i class="fa fa-plus"></i> Crear Grupo',['class'=>'btn btn-success pull-right'])}}
                        </a>
                    </div>
                    @endif
                </div>
                <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th>Código </th>
                        <th>Nombre </th>
                        <th>Lider </th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->nombre }}</td>
                            <td>{{ $group->leader->Nombre}} {{ $group->leader->ApellidoPaterno}} {{ $group->leader->ApellidoMaterno}}</td>
                            <td>
                                <a href="{{route('grupo.show',$group->id)}}" class="btn btn-primary btn-xs view-group""><i class="fa fa-eye"></i></a>
                                @if(Auth::user()->IdUsuario == $group->leader->user->IdUsuario || Auth::user()->IdPerfil == Config::get('constants.admin'))
                                <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$group->id}}"><i class="fa fa-remove"></i></a>
                                @endif
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $group->id, 'message' => '¿Esta seguro que desea eliminar este grupo?', 'route' => route('grupo.delete', $group->id)])
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="{{ URL::asset('js/intranetjs/investigation/group/index-group-script.js')}}"></script>

@endsection