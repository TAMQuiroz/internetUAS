@extends('app')
@section('content')

<div class="page-title">
  <div class="title_left">
    <h3> {{ $title }} </h3>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">

      <form action="{{ route('update.studentsResult') }}" method="POST" id="editStudentsResult" novalidate="true" name="editStudentsResult" class="form-horizontal">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" id="validateIdentifier" name="validateIdentifier" hidden>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <h2> Información del Resultado Estudiantil</h2>
            <div class="separator"></div>
          </div>
        </div>  

        <div class="form-horizontal">
          <input id="code" class="form-control col-md-7 col-xs-12" type="hidden" name="code" value="{{ $studentsResult->IdResultadoEstudiantil }}"  >             

          <div class="row" style="margin-top: 10px;">
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Identificador <span class="error">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="identifier" class="form-control col-md-7 col-xs-12" type="text" name="identifier" value="{{ $studentsResult->Identificador }}" maxlength="1">                    
              </div>
            </div>
          </div>

          <div class="row" style="margin-top: 10px;">
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Descripción <span class="error">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="description" class="resizable_textarea form-control" name="description" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" >{{ $studentsResult->Descripcion }}</textarea>
              </div>
            </div>
          </div>

          <div class="row" style="margin-top: 10px;">
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Estado </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <h5>
                  @if($studentsResult->Estado == 1)
                    <span class="label label-success"> Activo </span>
                  @else
                    <span class="label label-danger"> Inactivo </span>
                  @endif
                </h5>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <h2> Asociar Objetivos Educacionales</h2>
            <div class="separator"></div>
          </div>
        </div>  


        <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
          <thead>
            <tr class="headings">
              <th class="col-sm-2 column-title"></th>
              <th class="column-title" hidden="true">Identificador</th>
              <th class="col-sm-10 column-title">Objetivo Educacional</th>
            </tr>
          </thead>
          <tbody>                        
            @if($educationalObjetives!=null)
            @foreach($educationalObjetives as $objs)
            <tr class="even pointer">

              <?php $temp = ""; ?>
              @if($resultxObjective!=null)
              @foreach($resultxObjective as $rxo)
              @if($rxo!=null AND $rxo->IdObjetivoEducacional == $objs->IdObjetivoEducacional)
              <?php $temp = "checked"; ?>                              
              @endif
              @endforeach
              @endif

              <td>
                <input value="@if($objs!=null) {{ $objs->IdObjetivoEducacional }} @endif" type="checkbox" class="flat" id="objsCheck" name="objsCheck[]" {{ $temp }}>
              </td>                                               
              <td class=" " hidden="true">@if($objs!=null) {{ $objs->Numero }} @endif</td>
              <td class=" ">@if($objs!=null) {{ str_limit($objs->Descripcion,80) }} @endif</td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>

        <div class="row" style="margin-top: 10px;">
          <div class="col-md-3 col-sm-3 col-xs-3 pull-right">
            <a class="btn btn-default submit" href="{{ route('index.studentsResult') }}">Cancel</a>
            <button class="btn btn-success submit" type="submit">Guardar</button>
          </div>                                         
        </div>  

      </form>
    </div>
  </div>
</div>

<script src="{{ URL::asset('js/myvalidations/studentsResult.js')}}"></script>

@endsection