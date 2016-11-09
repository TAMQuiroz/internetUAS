@extends('app')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Curso</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informacion del Curso</h2>
                        <div class="clearfix"></div>
                    </div>

                    <form action="{{ route('update.courses') }}" method="POST" class="form-horizontal" id="course_edit_form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="course-id" class="hidden" type="text" name="course-id" value="{{ $course->IdCurso }}">
                        <div class="x_content">
                            <div class="row" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="course-code" class="form-control col-md-7 col-xs-12" type="text" name="course-code" value="{{ $course->Codigo }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error"> * </span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="course-name" class="form-control col-md-7 col-xs-12" type="text"
                                               name="course-name" value="{{ $course->Nombre }}"
                                               maxlength="100" required="required" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                            </div>

                                <div class="form-group">
                                    <div class="control-label col-md-4 col-xs-12 checkbox">
                                        <label class="">¿Electivo?
                                            <div class="icheckbox_flat-green check" style="position: relative;" id="checkboelective">
                                                <input type="checkbox" class="flat" style="position: absolute; opacity: 0;" id="checkboxelective" name="checkboxelective" @if($course->NivelAcademico==-1) checked="true" @endif>
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%;  width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                            </div>
                                        </label>
                                    </div>

                                </div>

                                <input id="electivo" type="number" name="electivo" hidden="true" value="{{$course->NivelAcademico}}">
                                <div class="row" style="margin-top: 10px;">
                                    <div class="form-group" id="divplan" style="display:none;">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel Academico <span class="error">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="course-academicLevel" class="form-control col-md-7 col-xs-12" type="number" min="0" max="12" name="course-academicLevel" @if($course->NivelAcademico!=-1) value="{{$course->NivelAcademico}}" @else value="1" @endif>
                                        </div>
                                    </div>
                                </div>

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
                                        @foreach($course->regularProfessors as $professor)
                                        <tr>
                                            <input type="hidden" value="{{ $professor->IdDocente }}" name="regular_professors[]">
                                            <td>{{ $professor->Codigo }}</td>
                                            <td>{{ "{$professor->Nombre} {$professor->ApellidoPaterno}" }}</td>
                                            <td>{{ $professor->faculty->Nombre }}</td>
                                            <td><div class="btn btn-danger btn-xs delete-prof"><i class="fa fa-remove"></i></div></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>



                            <div class="row">
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <button class="btn btn-success submit pull-right" type="submit">Guardar</button>
                                    <a href="{{ route('index.courses') }}" class="btn btn-default pull-right"> Cancelar</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-1 col-sm-1 col-xs-12">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on('ready',function(){
            var electivo = $('#electivo').val();
            if(electivo == -1){
                $('#divplan').hide();  
            }else{
                $('#divplan').show(); 
            }
               
        });
    </script>
    <script type="text/javascript">
        $( document ).ready(function(){
            $('#checkboelective').on('click',function(){
                $('#divplan').toggle();
            });
        });
    </script>
    <script src="{{ URL::asset('js/myvalidations/regularprofessors.js')}}"></script>
    @include('modals.edit-modal', ['message' => 'Do you want to save the changes for this course?', 'action' => route('index.courses'), 'button' => 'Save' ])
    @include('courses.modal-regular-professors')
@endsection