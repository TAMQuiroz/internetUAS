@extends('app')
@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>{{ $title }}</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="separator"></div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <form class="form-horizontal" novalidate="true" action="{{ route('save-cicle-edit.enhacementPlan', $improvementPlanId)}}" method="POST" id="formAcademic" name="formAcademic">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input name="improvementPlanId" id="improvementPlanId" value="{{$improvementPlanId}}" hidden="true" type="text">
          <input type="text" id="validarCycle" name="validarCycle" hidden>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Año Ciclo <span class="error">* </span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12 anio"  name="anio" id="anio" required="true">
                        <option value="0">--Seleccione--</option>
                    <?php
                      for($anio=(date("Y")); $anio<=(date("Y")+10); $anio++) 
                      {
                        echo "<option value=".$anio.">".$anio."</option>";
                      }
                    ?>
                  </select> 
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Número Ciclo <span class="error">* </span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control col-md-7 col-xs-12 numberC"  name="numberC" id="numberC" required="true">
                <option value="3">--Seleccione--</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
              </select> 
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo Académico</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input class="form-control col-md-7 col-xs-12"  name="cycle" id="cycle" readonly="true" value =""></input> 
            </div>
          </div>

          <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
              <button class="btn btn-success pull-right" type="submit">Guardar</button>
              <a class="btn btn-default pull-right" href="{{ route('edit-AddCicle.enhacementPlan',$improvementPlanId) }}">Cancelar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="{{ URL::asset('js/myvalidations/academicCycle.js')}}"></script>

@endsection