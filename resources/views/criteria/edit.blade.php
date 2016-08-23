@extends('app')
@section('content')
  <div class="page-title">

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="title_left">
        <h3>{{ $title }}</h3>
      </div>
    </div>

    <form action="{{ route('updateCriterionLevel.criteria') }}" method="POST" id="formEditCriterion" novalidate="true" name="formEditCriterion" class="form-horizontal form-label-left">

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

          <div class="x_content">

            <div class="row" style="margin-top: 10px;">
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Aspecto</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="aspect-code" class="form-control col-md-7 col-xs-12" type="hidden" name="aspectcode" value="{{ $criterion->aspect->IdAspecto }}">
                  <input id="aspect-name" class="form-control col-md-7 col-xs-12" type="text" name="aspectname" value="{{ $criterion->aspect->Nombre }}" disabled>
                </div>
              </div>
            </div>

            <div class="row" style="margin-top: 10px;">
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Criterio</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="criterioncode" class="form-control col-md-7 col-xs-12" type="hidden" name="criterioncode" value="{{ $criterion->IdCriterio }}">
                  <input id="criterionname" class="form-control col-md-7 col-xs-12" type="text" name="criterionname" value="{{ $criterion->Nombre }}">
                </div>
              </div>
            </div>

            </br>

            <div class="clearfix"></div>


            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12">
                <h2> Niveles Asociados del Periodo Actual</h2>
              </div>
            </div>
            <div class="separator"></div>

            @if($message!='')
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="alert alert-warning">
                    <strong>Advertencia: </strong> {{ $message }}
                  </div>
                </div>
              </div>

              @if($caso==2)
                <div class="row">
                  <div class="col-md-8 col-sm-12 col-xs-12">
                    <h2> Niveles Antiguos Asociados del Periodo Actual</h2>
                  </div>
                </div>
                <div class="separator"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                  <tr class="headings">
                    <th class="column-title">Valor </th>
                    <th class="column-title">Descripción </th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($levels as $lvl)
                    <tr class="even pointer">
                      <td class="levelValue">@if($lvl!=null){{ $lvl->Valor }}@endif</td>
                      <td>@if($lvl!=null){{ $lvl->Descripcion }}@endif</td>
                    </tr>
                  @endforeach

                  </tbody>
                </table>

                <div class="row">
                  <div class="col-md-8 col-sm-12 col-xs-12">
                    <h2> Niveles Nuevos Asociados del Periodo Actual</h2>
                  </div>
                </div>
                <div class="separator"></div>
              @endif

            @endif

            <table class="table table-striped responsive-utilities jambo_table bulk_action">
              <thead>
              <tr class="headings">
                <th class="column-title">Valor </th>
                <th class="column-title">Nombre </th>
              </tr>
              </thead>
              <tbody>
              @if($caso==1 || $caso==2)
                @for($valor = 1; $valor <= $cantLevels; $valor++)
                  <tr class="even pointer">
                    <td class="levelValue">{{ $valor }}</td>
                    <td>
                      <input hidden id="levelCodeCurrent" name="levelCodeCurrent[]" value="0"/>
                      <input hidden id="levelValueCurrent" name="levelValueCurrent[]" value="{{ $valor }}"/>
                      <input class="form-control col-md-7 col-xs-12" type="text" id="levelDescCurrent" name="levelDescCurrent[]" value=""/>
                    </td>
                  </tr>
                @endfor
                @if($levels!=null)
                  @foreach($levels as $lvl)
                    <input hidden id="levelCode" name="levelCode[]" value="@if($lvl!=null){{ $lvl->IdNivelCriterio }}@endif"/>
                  @endforeach
                @endif
              @else
                @if($levels!=null)
                  @foreach($levels as $lvl)
                    <tr class="even pointer">
                      <td class="levelValue">@if($lvl!=null){{ $lvl->Valor }}@endif</td>
                      <td>
                        <input hidden id="levelCodePast" name="levelCodePast[]" value="@if($lvl!=null){{ $lvl->IdNivelCriterio }}@endif"/>
                        <input class="form-control col-md-7 col-xs-12" type="text" id="levelDescPast" name="levelDescPast[]" value="@if($lvl!=null){{ $lvl->Descripcion }}@endif"/>
                      </td>
                    </tr>
                  @endforeach
                @endif
              @endif
              </tbody>
            </table>

            <div class="row">
              <div class="col-md-9 col-sm-9"></div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <div>
                  <a class="btn btn-default submit" href="{{ route('view.aspects', ['aspect-code' => $criterion->aspect->IdAspecto]) }}">Cerrar</a>
                  <button class="btn btn-success submit" type="submit">Guardar</button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="{{ URL::asset('js/myvalidations/criteria.js')}}"></script>
@endsection