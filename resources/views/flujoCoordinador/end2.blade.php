@extends('appWithoutHamburger')
@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Continuar configuración</h3>
  </div>  
</div>

<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">

    <div class="x_title">
      <h2>Segunda parte del Flujo terminada con exito</h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
            
      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-12 col-sm-12"></div>
          <p>
            La segunda parte del flujo de coordinador está por concluir, se agregaron los siguientes elementos:
          </p>
          <br>
          <p>- Profesores creados</p>
          <p>- Cursos creados</p>
          <br>
          <p>Usted ha terminado satisfactoriamente la segunda parte del flujo. Se guardarán los cambios.
          </p>
          <br>
          <p>Ahora se comenzará el tercer flujo que contienen 2 funcionalidades importantes para la acreditación de una especialidad. Las funcionalidades mencionadas son:
          </p>
          <br>
          <p>- Periodo iniciado</p>
          <p>- Ciclo iniciado</p>
          <br>
        </div>
      </div>        
      
    </div>

    <div class="row"></div>
      <div class="separator"></div>
      <div class="row">

          <div class="col-md-12 col-sm-12 col-xs-12">
               <a  href="{{ route('period_init.flujoCoordinador',$idEspecialidad) }}" class="btn btn-success pull-right">Continuar ></a>
               <a  href="{{ route('courses_index.flujoCoordinador',$idEspecialidad) }}"  class="btn btn-default pull-left">< Atras</a>
          </div>
      </div>

    <br>

  </div>
</div>
@endsection