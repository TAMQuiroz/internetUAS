@extends('appWithoutHamburger')
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
      <h2>Flujo terminado con exito</h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
            
      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-12 col-sm-12"></div>
          <p>
            El flujo de administrador esta por concluir, se agregaron los siguientes elementos:
          </p>
          <br>
          <p>- Nueva especialidad creada</p>
          <p>- Profesores y coordinador creados</p>
          <p>- Ciclos académicos creados</p>
          <br>
          <p>Si necesita agregar mas información, podra hacerlo desde las opciones del menú.</p>
          <br>
          <p>Usted ha terminado satisfactoriamente la primera parte del flujo. Comuniquese con el coordinador de la especialidad para que este continue con el proceso.</p>
              
            

            
          </p>
        </div>
      </div>        

      
    </div>

    <a class="btn btn-default" href="{{ route('academicCycle_index.flujoAdministrador') }}">Atras</a>
    <a class="btn btn-success pull-right " href="{{ route('index.subindex') }}">Finalizar</a>

  </div>
</div>
@endsection