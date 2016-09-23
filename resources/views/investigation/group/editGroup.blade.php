@extends('app')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Grupo de Investigación</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informacion del Grupo</h2>
                        <div class="clearfix"></div>
                    </div>

                    <form action="{{ route('grupo.update', ['id' => $group->id]) }}" method="POST" class="form-horizontal" id="group_edit_form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="group-id" class="hidden" type="text" name="group-id" value="{{ $group->id }}">
                        <div class="x_content">
                            <div class="row" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="group-code" class="form-control col-md-7 col-xs-12" type="text" name="group-code" value="{{ $group->id }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error"> * </span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="group-name" class="form-control col-md-7 col-xs-12" type="text"
                                               name="group-name" value="{{ $group->nombre }}"
                                               maxlength="100" required="required" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Especialidad <span class="error">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="facultyName" class="form-control col-md-7 col-xs-12" type="text"
                                               name="facultyName" value="{{ $faculty->Nombre }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="resizable_textarea form-control" id="groupDescription" maxlength="200" name="groupDescription" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;">{{$group->descripcion}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Lider <span class="error">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="leaderCode" id="leaderCode" class="form-control" required="required">
                                            @foreach( $teachers as $teacher)
                                             @if($teacher->IdDocente == $group->id_lider)
                                                <option value="{{$teacher->IdDocente}}" selected="">{{$teacher->Nombre}} {{$teacher->ApellidoPaterno}}</option>
                                               @else
                                                <option value="{{$teacher->IdDocente}}">{{$teacher->Nombre}} {{$teacher->ApellidoPaterno}}</option>
                                              @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 


                            <div class="row">
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <button class="btn btn-success submit pull-right" type="submit">Guardar</button>
                                    <a href="{{ route('grupo.index') }}" class="btn btn-default pull-right"> Cancelar</a>
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
    <!--<script src="{{ URL::asset('js/myvalidations/regularprofessors.js')}}"></script>-->
    @include('modals.edit-modal', ['message' => 'Do you want to save the changes for this course?', 'action' => route('index.courses'), 'button' => 'Save' ])
    @include('courses.modal-regular-professors')
@endsection