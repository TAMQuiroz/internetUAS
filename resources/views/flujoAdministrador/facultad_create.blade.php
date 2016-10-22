@extends('base')
@section('contenido')
<!-- Estos linea es para las migajas-->
<nav class="red lighten-2">
  <div class="nav-wrapper container">
    <div class="col s12">
      <a href="{{ url('flujoAdministrador')}}" class="breadcrumb">Facultad</a>
    </div>
  </div>
</nav>



	
		<!--Contenido del cuerpo-->
        <br>
        <div class="container">

          <div class="row">
            <div class="col s12 m10 l8 offset-m1 offset-l2 ">
              <div class="card">
                <div class="card-content">
                  {{Form::open (array('url' => 'flujoAdministrador/facultad', 'method'=>'POST'))}} <!--para llamar al store, se le llama igual que al index, pero con metodo post-->
                    <div class="row">
                      <h4 class="red-text">Crear facultad</h4>
                    </div>
                    <br>
                    
                    <!--Mostrara los errores que se hayan cometido:-->
                    @if (count($errors)>0)
                    <div class="alert">
                      <ul>
                          @foreach ($errors -> all() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                      </ul>
                    </div>
                    @endif
					
                    
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="codigo" type="text" class="validate"  required value="{{ old('codigo') }}" name="codigo">
                        <label for="codigo">Código *</label>
                      </div>
                      
                      <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nombre" type="text" class="validate" required value="{{ old('nombre') }}" name="nombre">
                        <label for="nombre">Nombre *</label>
                      </div>              
                    </div>

                    <div class="row">              
                      <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="descripcion" type="text" class="validate" required value="{{ old('descripcion') }}" name="descripcion">
                        <label for="descripcion">Descripción *</label>
                      </div>
                     
                    </div>                   


                    <!--Los botones del formulario-->
                    <div class="row">
                      <div class="input-field col s12 right-align">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Siguiente
                          <i class="material-icons right">skip_next</i>
                        </button>                
                      </div>              
                    </div>
                    
                  {{ Form::close()}}
                </div>
              </div>
            </div>
          </div>
        </div>
	




@endsection