@extends('appWithoutHamburger')
@section('content')

<style type="text/css">
.fila-base{ display: none; } /* Fila Base Oculta */
</style>
<div class="page-title">
    <div class="title_left">
        <h3>Nuevo Horario</h3>
    </div>
</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$coursexcicle->course->Nombre}}</h2>
                    <div class="clearfix"></div>
                </div>
                <form action="{{route('cursosCicloHorario_store.flujoCoordinador',['id' => $idEspecialidad,'idCourse' => $coursexcicle->course->IdCurso])}}" method="POST" class="form-horizontal" id="registerTimeTable" name="registerTimeTable" novalidate="true">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="x_content">
                        <input id="idT" name="idT" value="{{$coursexcicle->IdCursoxCiclo}}" hidden="true">
                        <input id="courseId" name="courseId" value="{{$coursexcicle->IdCurso}}" hidden="true">
                        <input type="text" id="validarCode" name="validarCode" hidden>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código <span class="error"> * </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="codeT" class="form-control col-md-7 col-xs-12" type="text" name="codeT">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="clearfix"></div>
                        <div class="separator"></div>

                        <h2>Docente</h2>
                        @if(count($coursexteachers) !=0)
                        <table class="table table-bordered responsive-utilities jambo_table bulk_action" id="address-table" name="address-table">
                            <thead>
                                <tr class="headings">
                                    <th class="col-sm-3 text-center" >Nombre</th>
                                    <th class="col-sm-1 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <tr>
                                    <td style="vertical-align:middle">
                                        <select class="form-control col-md-7 col-xs-12 myselect" name="teacher[]" id="teacher">
                                            @foreach($coursexteachers as $cxt) 
                                                <option value="{{$cxt->IdDocente}}">{{$cxt->teacher->Codigo}} - {{$cxt->teacher->Nombre}} {{$cxt->teacher->ApellidoPaterno}} {{$cxt->teacher->ApellidoMaterno}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center eliminar" style="vertical-align:middle">
                                        <a class="btn btn-danger btn-xs"><i class="fa fa-remove fa-lg"></i></a>
                                    </td>

                                </tr>
                               
                            </tbody>
                        
                        </table>    
                        <a class="btn btn-success pull-right" id="btn-add-address" name="btn-add-address" type="button"><i class="fa fa-plus"></i> Nuevo Docente</a>                    
                        @else
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="alert alert-warning">
                                    <strong>Advertencia: </strong> No hay profesores disponibles para este curso.
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="hr-line-dashed"></div>

                        <div class="clearfix"></div>
                        <div class="separator"></div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                @if(count($coursexteachers) !=0)
                                <button class="btn btn-success pull-right" type="submit">Guardar</button>
                                @endif
                                <a href="{{ route('cursosCicloHorario_index.flujoCoordinador', ['id' => $idEspecialidad,'idCourse' => $coursexcicle->course->IdCurso]) }}" class="btn btn-default pull-right">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ URL::asset('js/intranetjs/coursexteacher/form-timetable-script.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/timetable.js')}}"></script>
@endsection