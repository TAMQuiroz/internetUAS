@extends('app')
@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Iniciar especialidad</h3>
  </div>  
</div>

<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">

    <div class="x_title">
      <h2>Flujo administrador</h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
            
      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-12 col-sm-12"></div>
          <p>
            Durante el transcurso de este flujo se le guiará por 3 funcionalidades importantes e impresindibles para la acreditacion de una especialidad. Las funcionalidades mencionadas son:
          </p>
          <p>- Creacion de la especialidad</p>
          <p>- Creacion de profesor y asignación de coordinador</p>
          <p>- Creacion de ciclos academicos</p>

            <p>Una ves iniciado el flujo, este no podrá ser cancelado hasta concluirlo.</p>
            
            

            
          </p>
        </div>
      </div>        

      
    </div>

    <a class="btn btn-default" href="{{ route('index.subindex') }}">Cancelar</a>
    <a class="btn btn-success pull-right " href="{{ route('facultad_create.flujoAdministrador') }}">Aceptar</a>

  </div>
</div>
@endsection