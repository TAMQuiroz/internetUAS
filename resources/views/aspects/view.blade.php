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

      <div class="form-horizontal">

        <input id="aspect-code" class="form-control col-md-7 col-xs-12" name="aspect-code" type="hidden" value="{{ $aspect->IdAspecto }}">

        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <h2> Información del Aspecto </h2>
          </div>
        </div>
        <div class="separator"></div>

        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resultado Estudiantil</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="aspect-name" class="form-control col-md-7 col-xs-12" type="text" name="aspect-name" rows="3" readonly="true" style="resize: none;">{{ $aspect->studentsResult->Identificador}} - {{ $aspect->studentsResult->Descripcion}}</textarea>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del Aspecto</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="aspect-name" class="form-control col-md-7 col-xs-12" type="text" name="aspect-name" value="{{ $aspect->Nombre }}" disabled>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Estado </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <h5>
                @if($aspect->Estado == 1)
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
        <div class="col-md-8 col-sm-8 col-xs-12">
          <h2> Criterios Asociados </h2>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12 pull-right">
          <a class="btn btn-success pull-right" data-toggle="modal" data-target="#criteria-new"><i class="fa fa-plus"></i> Nuevo Criterio </a>
        </div>
      </div>
      <div class="separator"></div>

      <table class="table table-striped responsive-utilities jambo_table bulk_action" id="criteria-table">
        <thead>
          <tr class="headings">
            <th class="col-sm-2 column-title">Estado </th>
            <th class="col-sm-8 column-title">Criterio </th>
            <th class="col-sm-2 column-title last">Acciones</th>
          </tr>
        </thead>
        <tbody >
          @if($aspect->criterion!=null)
          @foreach($aspect->criterion as $crit)
          <tr class="even pointer">
            <input type="hidden" class="criteriaItem" name="criteriaItem[]" value="{{ $crit->IdCriterio }}-{{ $crit->Nombre }}" />
            <td class="criteriaCode" hidden="true">{{$crit->IdCriterio }}</td>
            @if($crit->Estado == 1)
            <td class=""><span class="label label-success"> Activo </span></td>
            @else
            <td class=""><span class="label label-danger"> Inactivo </span></td>
            @endif
            <td class="criteriaName">{{str_limit($crit->Nombre,100) }}</td>
            <td class=" ">
              <a href="{{ route('view.criteria', ['aspect-code' => $aspect->IdAspecto, 'criterion-code' => $crit->IdCriterio]) }}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i></a>
              <a class="btn btn-primary btn-xs edit-criteria"  data-toggle="modal" data-target="#criteria-edit"><i class="fa fa-pencil"></i></a>
              <a class="btn btn-danger btn-xs delete-criteria" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>

      <div class="row">
          <div class="col-md-9 col-sm-12 col-xs-12">
             <a class="btn btn-default submit pull-right" href="{{ route('index.aspects') }}">Cancelar</a>
          </div>
      </div>

    </div>
  </div>
</div>

@include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el criterio?'])
@include('criteria.criteria-new-modal', ['title' => 'Nuevo Criterio'])
@include('criteria.criteria-edit-modal', ['title' => 'Editar Criterio'])

<script src="{{ URL::asset('js/intranetjs/aspects/view-aspect-script.js')}}"></script>

@endsection