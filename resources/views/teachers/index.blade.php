@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>
        <form action="{{ route('search.teachers')}}" method="POST" id="formSearch" name="formSearch">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" name="word" id="word">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                  </span>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(in_array(10, Session::get('actions')))
                            <a href="{{ route('new.teacher') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo Profesor</a>
                        @endif
                    </div>
                </div>

                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Código</th>
                        <th class="column-title">Nombre</th>
                        <th class="column-title">Correo</th>
                        <th class="column-title">Categoría</th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teach)
                        <tr class="even pointer">
                            <td class="a-center " hidden="true">
                                <?php if ($teach->Vigente==1): ?>
                                <span class="label label-success">Activo</span>
                                <?php endif ?>
                                <?php if ($teach->Vigente==0): ?>
                                <span class="label label-danger">Inactivo</span>
                                <?php endif ?>
                            </td>
                            <td class="teacherid" hidden="true">{{$teach->IdDocente}}</td>
                            <td class="teachercode">{{$teach->Codigo}}</td>
                            <td class=" ">{{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</td>
                            <td class="teacherspecialtyId" hidden="true">{{$teach->IdEspecialidad}}</td>
                            <td class="teacherEmail">{{$teach->Correo}}</td>
                            <td class="teacherCategory">{{$teach->Cargo}} </td>
                            <td class=" ">
                                @if(in_array(14, Session::get('actions')))
                                    <a class="btn btn-primary btn-xs view-teacher" data-toggle="modal" data-target=".bs-example-modal-lg" title="Visualizar"><i class="fa fa-search"></i></a>
                                @endif

                                @if(in_array(12, Session::get('actions')))
                                    <a href="{{ route('edit.teacher', ['teacherid' => $teach->IdDocente]) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                @endif

                                @if ($teach->Vigente == 1)
                                    @if(in_array(13, Session::get('actions')))
                                        <a class="btn btn-danger btn-xs delete-teacher" data-toggle="modal" data-target=".bs-example-modal-sm" title="Eliminar"><i class="fa fa-remove"></i></a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <script src="{{ URL::asset('js/intranetjs/teachers/index-teacher-script.js')}}"></script>
    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar al profesor?', 'action' => '#', 'button' => 'Delete'])
    @include('teachers.view-modal', ['title' => 'Información del Profesor'])
@endsection