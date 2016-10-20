<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css')}}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
  
    <body>

        
        <!--La barra superior principal-->
        <nav class="" style="background-color: #C24847;">
          <div class="nav-wrapper container ">

            <!--Menu de barra de haburguesa-->
            <ul id="slide-out" class="side-nav">
              <li><div class="userView">
                <img class="background" width= "100%" src="{{ asset('img/md_noche.png')}}">
                <i class="material-icons center">account_circle</i>
                <a href="#!"><span class="white-text name">Henry Espinoza</span></a>
                <a href="#!"><span class="white-text email">henryEspinozat@gmail.com</span></a>
              </div></li>             
              
              <li><a class="subheader">Menu</a></li>
              <li><div class="divider"></div></li>

              <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                  <li class="">                    
                    <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">store</i>Inicio</a>  
                  </li>

                  <li class="bold">
                    <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Especialidad y cursos</a>

                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#!">Profesores</a></li>
                        <li><a href="#!">Cursos de la especialidad</a></li>
                        <li><a href="#!">Cursos del ciclo</a></li>
                        <li><a href="#!">Mis cursos</a></li>
                      </ul>
                    </div>

                  </li>
                  <li class="bold">
                    <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Configurar acreditación</a>

                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#!">Objetivos educacionales</a></li>
                        <li><a href="#!">Resultados estudiantiles</a></li>
                        <li><a href="#!">Aspectos</a></li>
                        <li><a href="#!">Instrumentos de medicion</a></li>
                      </ul>
                    </div>

                  </li>
                  <li class="bold">
                    <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Asignación de resultados</a>

                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#!">Res. Est. por cursos</a></li>
                      </ul>
                    </div>

                  </li>
                  <li class="bold">
                    <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Mejora continua</a>

                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#!">Tipos de plan de mejora</a></li>
                        <li><a href="#!">Planes de mejora</a></li>
                        <li><a href="#!">Sugerencias</a></li>
                        <li><a href="#!">Mis sugerencias</a></li>
                      </ul>
                    </div>

                  </li>
                  <li class="bold">
                    <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Consolidados generales</a>

                    <div class="collapsible-body">
                      <ul>
                        
                      </ul>
                    </div>

                  </li>
                  <li class="bold">
                    <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Consolidados por especialidad</a>

                    <div class="collapsible-body">
                      <ul>
                        
                      </ul>
                    </div>

                  </li>

                  <li class="bold">
                    <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Consolidados por curso</a>

                    <div class="collapsible-body">
                      <ul>
                        
                      </ul>
                    </div>

                  </li>
                  <li class="bold">
                    <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>Configuración del sistema</a>

                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#!">Planificación</a></li>
                        <li><a href="#!">Asignar viajes</a></li>
                        <li><a href="#!">Control</a></li>
                      </ul>
                    </div>

                  </li>                  

                </ul>   
              </li>
            </ul> 
            
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
            <!--Fin barra de hamburgauesa-->            

            <a href="#" class="brand-logo center">UAS</a>

          </div>
        </nav>
        

        







      @yield('contenido')
      

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>




      <footer class="page-footer" style="background-color: #1E3E57;">
        <div class="container">
          <div class="row">

            <div class="col l8 s12">
              <h5 class="white-text">Acreditación</h5>
              <p class="grey-text text-lighten-4">Acreditación es un proyecto de tesis que busca ayudar a las pequeñas empresas a planificar de manera sencilla la distribución de sus pedidos.</p>
            </div>
            
            <div class="col l4 s12">
              <h5 class="white-text">Contacto</h5>
              <ul>
                <li><a class="white-text" href="#!">henryespinozat@gmail.com</a></li>
                <li><a class="white-text" href="#!">(01) 606-3477</a></li>
                <li><a class="white-text" href="#!">Facebook</a></li>
                <li><a class="white-text" href="#!">PUCP</a></li>
              </ul>
            </div>

          </div>
        </div>

        <div class="footer-copyright">
          <div class="container">
          Desarrollado por <a class="orange-text text-lighten-3" href="https://www.facebook.com/henry.espinozatorres">Henry A. Espinoza</a>
          </div>
        </div>

      </footer>


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="{{ asset('js/materialize.min.js')}}"></script>
      
      
      
      <script>
        $(document).ready(function() {
                  
          $(".dropdown-button").dropdown();
          $(".button-collapse").sideNav();      /*es para que boton de hamburgesa funcione*/
          
        });
      </script>

      @yield('scriptcontenido')
      
    </body>
  </html>