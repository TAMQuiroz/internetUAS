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

        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <h2> Información del Criterio </h2>
          </div>
        </div>
        <div class="separator"></div>

        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Aspecto</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="aspect-code" class="form-control col-md-7 col-xs-12" type="hidden" name="aspect-code" value="{{ $criterion->aspect->IdAspecto }}">
              <input id="aspect-name" class="form-control col-md-7 col-xs-12" type="text" name="aspect-name" value="{{ $criterion->aspect->Nombre }}" disabled>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Criterio</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="criterion-code" class="form-control col-md-7 col-xs-12" type="hidden" name="criterion-code" value="{{ $criterion->IdCriterio }}">
              <input id="criterion-name" class="form-control col-md-7 col-xs-12" type="text" name="criterion-name" value="{{ $criterion->Nombre }}" disabled>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Estado </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <h5>
                @if($criterion->Estado == 1)
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
          <h2> Niveles Asociados </h2>
          <div class="separator"></div>
        </div>
      </div>

      <div class="form-horizontal">

        <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Periodo </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="period" class="form-control col-md-7 col-xs-12" type="text" name="period" >
              <option value="">-- Seleccione --</option>
              @foreach($periods as $prd)
                <option value="{{$prd->IdPeriodo}}">
                  {{ $prd->configuration->cycleAcademicStart->Descripcion }} - {{ $prd->configuration->cycleAcademicEnd->Descripcion }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <table class="table table-striped responsive-utilities jambo_table bulk_action">
        <thead>
          <tr class="headings">
            <th class="column-title">Valor </th>
            <th class="column-title">Descripción </th>
          </tr>
        </thead>
        <tbody>

        @foreach($periods as $prd)
          @foreach($prd->levels as $lvl)
            @if($lvl->IdCriterio == $criterion->IdCriterio)
              <tr class="even pointer level {{$prd->IdPeriodo}}" hidden="true">
                <td class="levelValue">{{ $lvl->Valor }}</td>
                <td class="levelDesc">{{ $lvl->Descripcion }}</td>
              </tr>
            @endif
          @endforeach
        @endforeach

        </tbody>
      </table>

      <div class="row">
        <div class="col-md-9 col-sm-9"></div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <div>                         
            <a class="btn btn-default submit" href="{{ route('view.aspects', ['aspect-code' => $criterion->aspect->IdAspecto]) }}">Cerrar</a>
            <a class="btn btn-success submit" href="{{ route('edit.criteria', ['criterion-code' => $criterion->IdCriterio]) }}">Editar</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="{{ URL::asset('js/intranetjs/criteria/view-criteria-script.js')}}"></script>

@endsection