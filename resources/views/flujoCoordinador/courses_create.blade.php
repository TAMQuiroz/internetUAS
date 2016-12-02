@extends('appWithoutHamburger')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> Nuevo Curso</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Información del Curso</h2>
                    <div class="clearfix"></div>
                </div>
                <form action="{{ route('courses_store.flujoCoordinador', $idEspecialidad) }}" method="POST" class="form-horizontal" id="formCourse">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="x_content">
                        <div class="form-group">
                            <input type="text" id="validateCode" name="validateCode" hidden>
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="coursecode" class="form-control col-md-7 col-xs-12" type="text"
                                       name="coursecode" maxlength="6" required="required"
                                       onkeypress="return isNumberKey(event)" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="coursename" class="form-control col-md-7 col-xs-12" type="text"
                                       name="coursename" maxlength="100" required="required"
                                       onkeypress="return isNumberKey(event)">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label col-md-4 col-xs-12 checkbox">
                                <label class="">¿Electivo?
                                    <div class="icheckbox_flat-green" style="position: relative;" id="checkboelective">
                                        <input type="checkbox" class="flat" style="position: absolute; opacity: 0;" id="checkboxelective" name="checkboxelective">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%;  width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                    </div>
                                </label>
                            </div>

                        </div>

                        <div class="form-group" id="divplan" style="display:none;">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel Académico <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="courseacademicLevel" class="form-control col-md-7 col-xs-12" type="number" min="0" max="12" value="1" name="courseacademicLevel">
                            </div>
                        </div>

                        

                        <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-10">
                                <h2> Profesores Asociados </h2>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12">
                                
                                <div class="btn btn-success" data-toggle="modal" data-target="#modal-regular-professor">
                                    <i class="fa fa-plus"></i> Asignar Profesor
                                </div>
                            </div>
                        </div>
                        <p> Cuando se seleccionan a los profesores, estos están habilitados para dictar este curso en los ciclos académicos próximos.</p>
                        <p> Se recomienda seleccionar por lo menos a un profesor, para que pueda crearse un horario adecuadamente, en los siguientes pasos del flujo.</p>
                        <br>
                        <div class="row">
                            <table class="table table-striped responsive-utilities jambo_table bulk_action" id="prof_table"  name="table-objs">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">Codigo</th>
                                    <th class="column-title">Nombre</th>
                                    <th class="column-title">Especialidad</th>
                                    <th class="column-title">Acción</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <button class="btn btn-success pull-right" type="submit">Guardar</button>
                                    <a href="{{ route('courses_index.flujoCoordinador', $idEspecialidad) }}" class="btn btn-default pull-right">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
     <script type="text/javascript">
        $( document ).ready(function(){
            $('#divplan').show(); 
            $('#checkboelective').on('click',function(){
                $('#divplan').toggle();
            });
        });
    </script>
    <script src="{{ URL::asset('js/myvalidations/course.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/regularprofessors.js')}}"></script>
    @include('courses.modal-regular-professors')

@endsection