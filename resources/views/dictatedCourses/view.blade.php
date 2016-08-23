@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{$course->Nombre}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Información del Curso</h2>
                    <div class="clearfix"></div>
                </div>
                <form action="{{route('save.courses')}}" method="POST" class="form-horizontal" id="viewCourse" name="viewCourse">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="x_content">
                        <input id="courseId" name="courseId" type="text" name="code" readonly="true" value="{{$course->IdCurso}}" hidden="true">
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="code" class="form-control col-md-7 col-xs-12" type="text" name="code" readonly="true" value="{{$course->Codigo}}">
                            </div>
                        </div>
                        <!--
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del Curso</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" type="text" name="name" readonly="true" value="{{$course->Nombre}}">
                            </div>
                        </div>
                        -->
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel Académico </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="academicLevel" class="form-control col-md-7 col-xs-12" name="academicLevel" type="text" readonly="true" value="{{$course->NivelAcademico}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Especialidad </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="faculty" name="faculty" class="form-control col-md-7 col-xs-12" type="text" readonly="true" value="{{$course->faculty->Nombre}}">
                            </div>
                        </div>

                        <div class="separator"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h2> Horarios </h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <a href="{{ route('timetable.dictatedCourses', ['courseId' => $course->IdCurso]) }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar Horario</a>
                            </div>                                         
                        </div>  

                        <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs" border="2">
                            <thead>
                            <tr class="headings">
                                <th class="column-title text-center" width="10%">Horario</th>
                                <th class="column-title text-center" width="30%">Docente</th>
                                <th class="column-title text-center" width="30%">Correo</th>
                                <!--<th class="column-title text-center" width="20%">Número Alumnos</th>-->
                                <th class="column-title last text-center" width="10%">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($timetablexteacher as $txt)
                                    <tr class="even pointer">
                                        <td class="timetableId" hidden="true">{{$txt[0]->timetable->IdHorario}}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                        <?php if (count($txt)!=0): ?>
                                            {{$txt[0]->timetable->Codigo}}
                                        <?php endif ?>
                                        </td>
                                        <td class="" style="vertical-align: middle">
                                        @for($i=0; $i<count($txt);$i++)
                                            {{$txt[$i]->teacher->Codigo}} - {{$txt[$i]->teacher->Nombre}} {{$txt[$i]->teacher->ApellidoPaterno}} {{$txt[$i]->teacher->ApellidoMaterno}}<br>
                                        @endfor
                                        </td>
                                        <td class="" style="vertical-align: middle">
                                        @for($j=0; $j<count($txt);$j++)
                                            {{$txt[$j]->teacher->Correo}}<br>
                                        @endfor
                                        </td>
                                        <!--
                                        <td class="text-center" style="vertical-align: middle">
                                        <?php if (count($txt)!=0): ?>
                                             {{$txt[0]->timetable->TotalAlumnos}} Alumnos
                                        <?php endif ?>
                                        </td>
                                        -->
                                        <td class="text-center" style="vertical-align: middle">
                                            <a href="{{ route('editTimeTable.dictatedCourses', ['timetableId' => $txt[0]->timetable->IdHorario ,'courseId' => $course->IdCurso])}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger btn-xs delete-timetable" data-toggle="modal" data-target=".bs-example-modal-sm" title="Eliminar"><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="clearfix"></div>
                        <div class="separator"></div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <!--<button class="btn btn-success pull-right" type="submit">Guardar</button>-->
                                <a href="{{ route('index.dictatedCourses') }}" class="btn btn-default pull-right">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ URL::asset('js/intranetjs/DictatedCourses/index-script.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/course.js')}}"></script>
    @include('modals.delete-modal', ['message' => '¿Está seguro que desea eliminar este horario?', 'action' => '#', 'button' => 'Delete'])

@endsection