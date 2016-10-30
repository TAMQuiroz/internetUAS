@extends('appWithoutHamburger')
@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Iniciar configuración</h3>
  </div>  
</div>

<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">

    <div class="x_title">
      <h2>Primera parte del Flujo terminada con exito</h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
            
      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-12 col-sm-12"></div>
          <p>
            La primera parte del flujo de administrador está por concluir, se agregaron los siguientes elementos:
          </p>
          <br>
          <p>- Nuevos Objetivos Educacionales creados</p>
          <p>- Resultados Estudiantiles creados</p>
          <p>- Aspectos creados</p>
          <p>- Criterios creados</p>
          <br>
          <p>Si necesita agregar más información, podrá hacerlo desde las opciones del menú.</p>
          <br>
          <p>Usted ha terminado satisfactoriamente la primera parte del flujo. Se guardarán los cambios.</p>
          </p>
        </div>
      </div>        
      <div class="separator"></div>
      
    </div>

    <div class="row"></div>
      <div class="separator"></div>
      <div class="row">

          <div class="col-md-12 col-sm-12 col-xs-12">
               <a  href="" class="btn btn-success pull-right">Siguiente ></a>
               <a  href="" class="btn btn-success pull-left">Atras ></a>
          </div>
      </div>

    <br>
    
    <a class="btn btn-default" href="{{ route('aspect_index.flujoCoordinador') }}">Atras</a>
    <a class="btn btn-success pull-right " href="">Finalizar</a>

  </div>
</div>
@endsection