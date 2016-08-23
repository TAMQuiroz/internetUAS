@extends('app')
@section('content')
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>{{ $title }}</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Información del Profesor</h2>
                  <div class="clearfix"></div>
                </div>
                
                <form action="{{ route('updateTeacher.teachers')}}" method="POST" id="editTeacher" name="editTeacher" novalidate="true" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" id="validarEmail" name="validarEmail" hidden>
                <div class="x_content">
                    <input name="teacherid" id="teacherid" value="{{ $teacher->IdDocente }}" hidden="true" type="text">
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="teachercode" id="teachercode" value="{{ $teacher->Codigo }}" readonly="true">
                        </div>
                      </div>
                    </div>
                    <!--
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Especialidad <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="teacherfaculty" id="teacherfaculty">
                          <option value="0">--Seleccione--</option>
                          @foreach($faculties as $fac)
                              <option value="{{$fac->IdEspecialidad}}" <?php if ($teacher->IdEspecialidad == $fac->IdEspecialidad): ?> selected="true"<?php endif ?>>{{$fac->Nombre}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    -->
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="teachername" id="teachername" required="true" value="{{$teacher->Nombre}}">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="teacherlastname" id="teacherlastname" required="true" value="{{$teacher->ApellidoPaterno}}">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="teachersecondlastname" id="teachersecondlastname" required="true" value="{{$teacher->ApellidoMaterno}}">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correo <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="teacheremail" id="teacheremail" required="true" value="{{$teacher->Correo}}">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Categoría <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="teacherposition" id="teacherposition">
                            <option value="0" <?php if ($teacher->Cargo == 0): ?> selected="true"<?php endif ?>>--Seleccione--</option>
                            <option <?php if ($teacher->Cargo == "Profesor Asociado"): ?> selected="true"<?php endif ?>>Profesor Asociado</option>
                            <option <?php if ($teacher->Cargo == "Profesor Contratado"): ?> selected="true"<?php endif ?>>Profesor Contratado</option>
                            <option <?php if ($teacher->Cargo == "Profesor Ordinario"): ?> selected="true"<?php endif ?>>Profesor Ordinario</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!--
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estado <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="teacherstatus" id="teacherstatus" required="true">
                            <option value="1" <?php if ($teacher->Vigente == 1): ?>selected="true"<?php endif ?>>Activo</option>
                            <option value="0" <?php if ($teacher->Vigente == 0): ?>selected="true"<?php endif ?>>Inactivo</option>  
                          </select>
                        </div>
                      </div>
                    </div>
                    -->
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="resizable_textarea form-control" id="teacherdescription" name="teacherdescription" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;">{{$teacher->Descripcion}}</textarea>
                        </div>
                      </div>
                    </div> 
                    <div class="clearfix"></div>
                    <div class="separator"></div>

                    <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                       <button class="btn btn-success submit pull-right" type="submit"> Guardar</button>
                       <a href="{{ route('index.teachers') }}" class="btn btn-default pull-right"> Cancelar</a>
                    </div>
                  </div>

                    <!--
                    <div class="row">
                      <div class="col-md-5"></div>
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <button class="btn btn-success submit" type="submit"> Guardar</button>
                      </div>
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <a href="{{ route('index.teachers') }}" class="btn btn-default"> Cancelar</a>
                      </div>
                  </div> 
                  -->
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
        <script src="{{ URL::asset('js/myvalidations/teacher.js')}}"></script>
@include('modals.edit-modal', ['message' => 'Do you want to save the changes for this teacher?', 'action' => route('index.teachers'), 'button' => 'Save' ])
@endsection