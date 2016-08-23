@extends('app')
@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Mi Especialidad</h3>
  </div>
  
</div>
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>{{ $fac->Nombre }}</h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-3 col-sm-3"></div>
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código:</label>
          <div class="col-md-3 col-sm-3 col-xs-12">{{ $fac->Codigo }}
          </div>
        </div>
      </div>
      
      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-3 col-sm-3"></div>
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción:</label>
          <div class="col-md-3 col-sm-3 col-xs-12"style="text-align: justify;">
            {{ $fac->Descripcion }}
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-3 col-sm-3"></div>
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Coordinador:</label>
          <div class="col-md-3 col-sm-3 col-xs-12">@if($fac->IdDocente!=null){{$fac->teacher->Nombre}} {{$fac->teacher->ApellidoPaterno}} {{$fac->teacher->ApellidoMaterno}}@endif
          </div>
        </div>
      </div>
      @if($conf != null)
      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-3 col-sm-3"></div>
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Niveles de Criterio:</label>
          <div class="col-md-3 col-sm-3 col-xs-12">@if($conf!=null) {{$conf->CantNivelCriterio}} @endif
          </div>
        </div>
      </div>

      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-3 col-sm-3"></div>
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Niveles de Aceptación:</label>
          <div class="col-md-3 col-sm-3 col-xs-12">@if($conf!=null)de {{$conf->NivelEsperado}} a {{$conf->CantNivelCriterio}}@endif
          </div>
        </div>
      </div> 

      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-3 col-sm-3"></div>
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Porcentaje de Aceptación:</label>
          <div class="col-md-3 col-sm-3 col-xs-12">@if($conf!=null){{$conf->UmbralAceptacion}} % @endif
          </div>
        </div>
      </div>
      @endif
    </div>
    @if($coordinator!=null)
      @if(Session::get('faculty-code') == $coordinator->IdEspecialidad)
      <div class="clearfix"></div>
      <div class="separator"></div>
      
      <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
               <a  href="{{ route('editCoordinator.faculty', ['facultyId' => $fac->IdEspecialidad]) }}" class="btn btn-success pull-right" > Editar</a>
            </div>
      </div>
      @endif
    @endif
  </div>
</div>
@endsection