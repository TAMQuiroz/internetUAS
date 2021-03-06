@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Cursos</h3>
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
                <h2>{{ $faculty->Nombre }}</h2>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(in_array(5,Session::get('actions')))
                            <a href="{{ route('new.courses') }}" class="btn btn-success pull-right">
                                <i class="fa fa-plus"></i> Nuevo Curso</a>
                        @else
                            <a class="btn btn-success pull-right">
                                <i class="fa fa-plus"></i> Nuevo Curso</a>
                        @endif
                    </div>
                </div>

                <div class="x_content">
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Código </th>
                        <th class="column-title">Nivel Académico </th>
                        <th class="column-title">Nombre </th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $cours)
                        <tr class="even pointer">
                            <td hidden class="course-id">{{ $cours->IdCurso }}</td>
                            <td class=" ">{{ $cours->Codigo }}</td>
                            <td class=" ">{{ $cours->NivelAcademico }}</td>
                            <td class=" ">{{ $cours->Nombre }}</td>
                            <td class=" ">
                         
                                @if(in_array(9,Session::get('actions')))
                                    <a class="btn btn-primary btn-xs view-course" onclick="show('{{$cours->IdCurso}}')"><i class="fa fa-search"></i></a>
                                @else
                                    <a class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
                                @endif

                                @if(in_array(7,Session::get('actions')))
                                    <a href="{{ route('edit.courses', ['courseCode' => $cours->IdCurso]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                @else
                                    <a class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                @endif

                                @if(in_array(8,Session::get('actions')))
                                    <a href="" class="btn btn-danger btn-xs delete-course" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
                                @else
                                    <a class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="{{ URL::asset('js/intranetjs/courses/index-script.js')}}"></script>

    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el curso?', 'action' => '#', 'button' => 'Delete'])
    @include('courses.view-modal', ['title' => 'Course #'])
@endsection