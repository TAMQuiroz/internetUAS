@extends('app')
@section('content')

<div class="page-title">
  <div class="row">
    <div class="">

      <div class="page-title">
        <div class="title_left">
          <h3> {{ $title }} </h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

         <form action="{{ route('update.educationalObjectives') }}" method="POST" id="editEducationalObjetive" class="form-horizontal">
          
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="text" id="validateIdentifier" name="validateIdentifier" hidden>

          <div class="x_panel">
            <div class="x_content">

              <input id="code" class="form-control col-md-7 col-xs-12" type="hidden" name="code" value="{{ $educationalObjetive->IdObjetivoEducacional }}"  >             
              <!--    
              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Identificador <span class="error">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="number" class="form-control col-md-7 col-xs-12" type="text" name="number" value="{{ $educationalObjetive->Numero }}" maxlength="1">                    
                  </div>
                </div>
              </div>         
              -->
              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Descripción <span class="error">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="description" class="resizable_textarea form-control" name="description" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" >{{ $educationalObjetive->Descripcion }}</textarea>
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

              <div class="clearfix"></div>
              <div class="separator"></div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h2> Asociar Resultados Estudiantiles </h2>
                </div>
              </div>

              <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
                <thead>
                  <tr class="headings">
                    <th class="column-title"></th>
                    <th class="column-title">Identificador</th>
                    <th class="column-title">Descripción</th>
                  </tr>
                </thead>
                <tbody>                        
                @if($studentsResults!=null)
                  @foreach($studentsResults as $stRst)
                    <tr class="even pointer">
                    
                      <?php $temp = ""; ?>
                      @if($resultxObjective!=null)
                      @foreach($resultxObjective as $rxo)
                          @if($rxo!=null AND $rxo->IdResultadoEstudiantil == $stRst->IdResultadoEstudiantil)
                            <?php $temp = "checked"; ?>                              
                          @endif
                      @endforeach
                      @endif
                            
                      <td>
                        <input value="@if($stRst!=null) {{ $stRst->IdResultadoEstudiantil }} @endif" type="checkbox" class="flat" id="stRstCheck" name="stRstCheck[]" {{ $temp }}>
                      </td>                                               
                      <td class=" ">@if($stRst!=null) {{ $stRst->Identificador }} @endif</td>
                      <td class=" ">@if($stRst!=null) {{ $stRst->Descripcion }} @endif</td>
                    </tr>
                  @endforeach
                @endif
                </tbody>
              </table>

              <div class="row" style="margin-top: 10px;">
                <div class="col-md-9 col-sm-9 col-xs-9"></div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                  <a class="btn btn-default submit" href="{{ route('index.educationalObjectives') }}">Cancel</a>
                  <button class="btn btn-success submit" type="submit">Guardar</button>
                </div>                                         
              </div>  

            </div>                               
          </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>

@include('modals.edit-modal',['message' => 'Guardar los cambios?'])

</form>


<script src="{{ URL::asset('js/intranetjs/educationalObjetives/educationalObjetive-script.js')}}"></script>
<script src="{{ URL::asset('js/myvalidations/educationalObjetive.js')}}"></script>
@include('educationalObjectives.educationalObjetive-new-modal', ['title' => 'Nuevo Resultado Estudiantil'])
@include('educationalObjectives.educationalObjetive-edit-modal', ['title' => 'Editar Resultado Estudiantil'] )
@endsection
