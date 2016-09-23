@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Grupos de Investigación</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('grupo.create') }}" class="btn btn-success pull-right">
                            <i class="fa fa-plus"></i> Nuevo Grupo</a>
                    </div>
                </div>

                <div class="x_content">
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Código </th>
                        <th class="column-title">Nombre </th>
                        <th class="column-title">Lider </th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $group->id }}</td>
                            <td class=" ">{{ $group->id }}</td>
                            <td class=" ">{{ $group->nombre }}</td>
                            <td class=" ">{{ $group->id_lider }}</td>
                            <td class=" ">
                                    <a class="btn btn-primary btn-xs view-group" onclick="show('{{$group->id}}')"><i class="fa fa-search"></i></a>
                                    <a href="{{ route('grupo.edit', ['id' => $group->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/intranetjs/investigation/group/index-group-script.js')}}"></script>

    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el grupo de investigación?', 'action' => '#', 'button' => 'Delete'])
    @include('investigation.group.view-modal-group')

@endsection