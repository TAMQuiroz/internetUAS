@extends('app')
@section('content')

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Objetivo Educacional</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      
      <div class="x_panel">
        
        <div class="x_content">
          <form class="form-horizontal">
            <div class="form-horizontal">

              <input id="educationalObjetive_code" class="form-control col-md-7 col-xs-12" type="hidden" name="educationalObjetive_code" value="{{ $educationalObjetive->IdObjetivoEducacional }}"  >
                  </div>                  
              <!--
              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Identificador </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="educationalObjective_number" class="form-control col-md-7 col-xs-12" type="text" name="educationalObjective_number" value="{{ $educationalObjetive->Numero }}" disabled >
                    
                  </div>
                </div>
              </div>
              -->
              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Descripción </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="educationalObjective_description" class="resizable_textarea form-control" name="educationalObjective_description" disabled style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" >{{ $educationalObjetive->Descripcion }}</textarea>
                  </div>
                </div>
              </div>

            <div class="row" style="margin-top: 10px;">
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Estado </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h5>
                    @if($educationalObjetive->Estado == 1)
                      <span class="label label-success"> Activo </span>
                    @else
                      <span class="label label-danger"> Inactivo </span>
                    @endif
                  </h5>
                </div>
              </div>
            </div>
          </form>

        </div>

          <div class="clearfix"></div>

          <h2> Resultados Estudiantiles Asociados </h2>
          <div class="separator"></div>
          
          <div class="x_panel">
            <div class="x_content">
              <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-res">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Identificador</th>
                    <th class="column-title">Descripcion</th>
                  </tr>
                </thead>
                <tbody>
                  @if($resultxObjective!=null)
                  @foreach($resultxObjective as $res)
                  <tr class="even pointer">                          
                    <td class=" ">@if($res->studentsResult->Identificador!=null) {{ $res->studentsResult->Identificador }} @endif</td>
                    <td class=" ">@if($res->studentsResult->Descripcion!=null) {{ $res->studentsResult->Descripcion }} @endif</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>

        <div class="row" style="margin-top: 10px;">
          <div class="col-md-9 col-sm-9 col-xs-9"></div>
          <div class="col-md-3 col-sm-3 col-xs-3">
            <a href="{{ route('index.educationalObjectives') }}" class="btn btn-default"> Cancelar </a>
            @if(in_array(17, Session::get('actions')))
            <a href="{{ route('edit.educationalObjectives', ['educationalObjetive_code' => $educationalObjetive->IdObjetivoEducacional]) }}" class="btn btn-success submit">Editar</a>
            @endif
          </div>                                         
        </div>

      </div>
    </div>
  </div>
</div>
@include('modals.edit-modal', ['message' => 'Do you want to save the changes for this student\'s result?', 'action' => route('save.studentsResult'), 'button' => 'Save' ])
@endsection