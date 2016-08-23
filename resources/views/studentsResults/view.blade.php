@extends('app')
@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>{{ $title }}</h3>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">

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
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Identificador </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="identifier" class="form-control col-md-7 col-xs-12" type="text" name="identifier" value="{{ $studentsResult->Identificador }}" disabled >
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Descripción </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="description" class="resizable_textarea form-control" name="description" disabled style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" >{{ $studentsResult->Descripcion }}</textarea>
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
          <h2> Objetivos Educacionales Asociados </h2>
          <div class="separator"></div>
        </div>
      </div>     

      <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
        <thead>
          <tr class="headings">
            <th class="column-title" hidden="true">Identificador</th>
            <th class="column-title">Objetivo Educacional</th>
          </tr>
        </thead>
        <tbody>
          @if($educationalObjetives!=null)
          @foreach($educationalObjetives as $objs)
          <tr class="even pointer">                          
            <td class=" " hidden="true">@if($objs!=null) {{ $objs->Numero }} @endif</td>
            <td class=" ">@if($objs!=null) {{ $objs->Descripcion }} @endif</td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>

      <div class="row" style="margin-top: 10px;">
        <div class="col-md-3 col-sm-3 col-xs-3 pull-right">
          <a href="{{ route('index.studentsResult') }}" class="btn btn-default"> Cancelar </a>
          @if(in_array(22,Session::get('actions')))
          <a href="{{ route('edit.studentsResult', ['idStudentsResult' => $studentsResult->IdResultadoEstudiantil]) }}" class="btn btn-success submit">Editar</a>
          @endif
        </div>                                         
      </div>

    </div>
  </div>
</div>

@endsection