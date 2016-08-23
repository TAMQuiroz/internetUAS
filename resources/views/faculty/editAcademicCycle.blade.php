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
                <form action="{{ route('updateAcademicCycle.faculty')}}" method="POST">
                <input type="hidden" name="faculty-code" id="faculty-code" value="{{ $conf->IdConfEspecialidad }}" />  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="x_content">
                                         

                     <div class="row" style="margin-top: 10px;">
                          <div class="form-group">
                        
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><span class="error">*</span>Coordinador de Especialidad:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="faculty-coordinator" class="form-control col-md-7 col-xs-12" type="text" name="faculty-coordinator" value="{{$coordinator->Nombre.' '.$coordinator->ApellidoPaterno}}" disabled >
                            </div>
                          </div>
                      </div>
          
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><span class="error">*</span>Nivel de Criterio:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="criteria-level" class="form-control col-md-7 col-xs-12" type="number" name="criteria-level" max="100" min="1" value="{{$conf->CantNivelCriterio}}">


                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><span class="error">*</span>Nivel de Aceptación:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="faculty-agreement-level" class="form-control col-md-7 col-xs-12" type="number" name="faculty-agreement-level" max="100" min="1" value="{{$conf->NivelEsperado}}">
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"><span class="error">*</span>Aceptación %:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="faculty-agreement" class="form-control col-md-7 col-xs-12" type="number" name="faculty-agreement" max="100" min="1" value="{{$conf->UmbralAceptacion}}">
                        </div>
                      </div>
                    </div>             
					
					          
                    </div>

                    
              
  
            
              
              </div>

                   
                    <div class="row">
                      <div class="col-md-9 col-sm-9 col-xs-9"></div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                           <a href="" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm"> Guardar</a>
                           <a href="{{ route('indexAcademicCycle.faculty') }}" class="btn btn-default"> Cancelar</a>
                      </div>
                    </div>     


                </div>
              </div>
            </div>
          </div>
        </div>
@include('modals.edit-modal', ['message' => '¿Desea guardar los cambios de esta especialidad?', 'action' => route('indexAcademicCycle.faculty'), 'button' => 'Guardar' ])
@endsection