@extends('app')
@section('content')
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3> Editar Especialidad</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Información de Especialidad</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <form action="{{ route('updateCoordinator.faculty')}}" method="POST" id="formEdit" name="formEdit" novalidate="true" class="form-horizontal">
                <input type="hidden" name="facultyId" id="facultyId" value="{{ $fac->IdEspecialidad }}" />  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" id="validarName" name="validarName" hidden>
                <input type="text" id="validarCode" name="validarCode" hidden>
                <div class="x_content">
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="code" class="form-control col-md-7 col-xs-12" type="text" name="code" value="{{ $fac->Codigo }}" readonly="true">
                        </div>
                      </div>
                    </div>
					
					         <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" type="text" name="name" value="{{ $fac->Nombre }}" readonly="true">
                        </div>
						           </div>
                   </div>

                   <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Coordinador <span class="error">* </span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="coordinator" id="coordinator" required="true">
                            <option value="0">--Seleccione--</option>
                            @foreach($teachers as $teach)
                              <option value="{{$teach->IdDocente}}" 
                              <?php if ($teach->IdDocente == $fac->IdDocente): ?>
                                selected="true"
                              <?php endif ?>
                              >{{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    
                   <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="description" name="description"class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;">{{ $fac->Descripcion }}</textarea>
                        </div>
                      </div>
                   </div>
                   
          
              <div class="clearfix"></div>
              
              </div>

                    <div class="clearfix"></div>


                    <div class="row">
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <button class="btn btn-success submit pull-right" type="submit">Guardar</button>
                        <a class="btn btn-default submit pull-right" href="{{ route('index.ourFaculty' , ['faculty-code' => $fac->IdEspecialidad]) }}">Cancelar</a>
                      </div>
                    </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>
<script src="{{ URL::asset('js/myvalidations/faculty.js')}}"></script>
@include('modals.edit-modal', ['message' => '¿Desea guardar los cambios para esta especialidad?', 'action' => route('index.faculty'), 'button' => 'Save' ])
@endsection