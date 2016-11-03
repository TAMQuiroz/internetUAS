<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Home | University Accreditation System</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('images/icon/apple-touch-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('images/icon/apple-touch-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('images/icon/apple-touch-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('images/icon/apple-touch-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('images/icon/apple-touch-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('images/icon/apple-touch-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('images/icon/apple-touch-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('images/icon/apple-touch-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('images/icon/apple-touch-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ URL::asset('images/icon/android-chrome-192x192.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('images/icon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('images/icon/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('images/icon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{ URL::asset('images/icon/manifest.json')}}">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="apple-mobile-web-app-title" content="UAS">
  <meta name="application-name" content="UAS">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="{{ URL::asset('images/icon/mstile-144x144.png')}}">
  <meta name="theme-color" content="#ffffff">



  <!-- NEW LOOK -->

  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css')}}"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


  <!-- Bootstrap core CSS -->

  <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{ URL::asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{ URL::asset('css/custom.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/maps/jquery-jvectormap-2.0.3.css')}}" />
  <link href="{{ URL::asset('css/icheck/flat/green.css')}}" rel="stylesheet" />
  <link href="{{ URL::asset('css/floatexamples.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('css/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />

  <!-- Datatables -->
  <link href="{{  URL::asset('js/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{  URL::asset('css/datatables/css/jquery.dataTables.css')}}" rel="stylesheet" type="text/css">

  <link href="{{ URL::asset('css/styles.css')}}" rel="stylesheet">

  <script src="{{ URL::asset('js/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('js/nprogress.js')}}"></script>
  <script src="{{ URL::asset('js/toastr/toastr.min.js')}}"></script>
  <script src="{{ URL::asset('js/validate/jquery.validate.min.js')}}"></script>
  <script src="{{ URL::asset('js/validate/additional-methods.min.js')}}"></script>


  <script src="{{ URL::asset('js/remodal.js')}}"></script>
  <link href="{{ URL::asset('css/remodal.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('css/remodal-default-theme.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/remodal/remodal-modify.css')}}" rel="stylesheet">
  <script type="text/javascript">
    var baseUrl = "{{ url('') }}";
  </script>

  <!--[if lt IE 9]>
  <script src="../assets/js/ie8-responsive-file-warning.js"></script>
  <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Datepicker -->
  <link href="{{  URL::asset('css/bootstrap-datepicker.css')}}" rel="stylesheet" type="text/css">  

</head>


<body class="nav-md">

<!--La barra superior principal-->
    <nav class="bar-top">
      <div class="nav-wrapper container" style="width: 85%;">

        <!--Menu de barra de haburguesa-->
        <ul id="slide-out" class="side-nav">
          <li>
            <div class="userView">
              <!--
                <img class="background" height= "100%" src="{{ asset('img/md_noche.png')}}">
              -->
              <i class="material-icons center">account_circle</i>        
              <div id="info-user" class="bar-info">
                <span class="white-text email">
                @if( isset(Session::get('user')->user) && Session::get('user')->user->IdPerfil == 5)
                    {{Session::get('user')->nombre}} {{Session::get('user')->ape_paterno}} {{Session::get('user')->ape_materno}}
                @elseif( isset(Session::get('user')->user) && Session::get('user')->user->IdPerfil == 6)
                    {{Session::get('user')->nombres}} {{Session::get('user')->apellido_paterno}} {{Session::get('user')->apellido_materno}}
                @else
                    {{Session::get('user')->Nombre}} {{Session::get('user')->ApellidoPaterno}} {{Session::get('user')->ApellidoMaterno}}
                @endif
                </span>
              </div>

              <div id="info-faculty" class="bar-info">
                <span class="label label-info hidden-xs hidden-sm">{{Session::get('faculty-name')}}</span>
                @if(Session::get('academic-cycle')!=null)
                  <span class="label label-info hidden-xs hidden-sm">                  
                    {{Session::get('academic-cycle')->academicCycle->Descripcion}}                  
                  </span>
                @endif
              </div>
                
              <div id="info-endcycle" class="bar-info">
                @if(Session::has('academic-cycle'))
                <span class="label label-danger col-10">
                  Días restantes para el fin de ciclo: {{ $diffForHumans }}
                </span>
                @endif
              </div>
            </div>
          </li>             
          
          <li><a class="subheader">Menu</a></li>
          <li><div class="divider"></div></li>

          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
              <li class="">                    
                <a class="collapsible-header waves-effect waves-teal" href="{{ route('index.ourFaculty', ['faculty-code' => Session::get('faculty-code')] ) }}"><i class="material-icons">store</i>Inicio</a>  
              </li>
              <li class="bold">
                  <a class="collapsible-header waves-effect waves-teal" href="{{ route('index.subindex') }}"><i class="material-icons">assessment</i>Mis Especialidades</a>
                </li>

              @if(in_array(70,Session::get('actions')))
                @if(Auth::user() && Auth::user()->IdPerfil != 5)
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-teal" href="{{ route('index.faculty') }}"><i class="material-icons">assessment</i>Especialidad</a>                
                </li>
                @endif
              @endif

              @if(in_array(11,Session::get('actions')) || in_array(6,Session::get('actions')) || in_array(1,Session::get('actions')) || in_array(2,Session::get('actions')))
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Mi especialidad</a>

                <div class="collapsible-body">
                  <ul>
                    @if(in_array(11,Session::get('actions')))
                      <li><a href="{{ route('index.teachers') }}">Profesores</a></li>
                    @endif
                    @if(in_array(6,Session::get('actions')))
                      <li><a href="{{ route('index.courses') }}">Cursos</a></li>
                    @endif
                    @if(in_array(1,Session::get('actions')))
                      <li><a href="{{ url('faculty/periods') }}">Periodo</a></li>
                    @endif
                    @if(in_array(2,Session::get('actions')))
                      <li><a href="{{ route('viewCycle.faculty') }}">Ciclo</a></li>
                    @endif
                  </ul>
                </div>
              </li>
              @endif

              @if(in_array(16,Session::get('actions')))
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal" href="{{ route('index.educationalObjectives') }}"><i class="material-icons">assessment</i>Objetivos educacionales</a>                
              </li>
              @endif

              @if(in_array(21,Session::get('actions')))
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal" href="{{ route('index.studentsResult') }}"><i class="material-icons">assessment</i>Resultados estudiantiles</a>
              </li>
              @endif

              @if(in_array(25,Session::get('actions')))
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Aspectos</a>
              </li>
              @endif

              @if(in_array(31,Session::get('actions')))
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal" href="{{ route('index.measurementSource') }}"><i class="material-icons">assessment</i>Instrumentos de medición</a>
              </li>
              @endif

              @if(in_array(28,Session::get('actions')) || in_array(29,Session::get('actions')) || in_array(67,Session::get('actions')) )
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">assessment</i>Evaluación</a>

                <div class="collapsible-body">
                  <ul>
                    @if(in_array(28,Session::get('actions')))
                     <li><a href="{{ route('contributions.studentsResult') }}">Matriz de aporte</a></li>
                    @endif
                    @if(in_array(67,Session::get('actions')))
                    <li><a href="{{ route('index.dictatedCourses') }}">Cursos dictados</a></li>
                    @endif
                  </ul>
                </div>
              </li>
              @endif

              @if(in_array(67,Session::get('actions')))
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal" href="{{ route('index.myCourses') }}"><i class="material-icons">settings</i>Mis cursos</a>
              </li>   
              @endif

              @if(in_array(41,Session::get('actions')) || in_array(44,Session::get('actions')) ||
              in_array(68,Session::get('actions')) || in_array(50,Session::get('actions')))
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>Mejora continua</a>

                <div class="collapsible-body">
                  <ul>
                    @if(in_array(41,Session::get('actions')))
                    <li><a href="{{ route('index.suggestions') }}">Mis sugerencias</a></li>
                    @endif
                    @if(in_array(44,Session::get('actions')))
                    <li><a href="{{ route('indexAll.suggestions') }}">Sugerencias</a></li>
                    @endif
                    @if(in_array(68,Session::get('actions')))
                    <li><a href="{{ route('index.enhacementPlan') }}">Plan de mejora</a></li>
                    @endif
                    @if(in_array(50,Session::get('actions')))
                    <li><a href="{{ route('index.typeImprovement') }}">Tipos Planes de mejora</a></li>
                    @endif
                  </ul>
                </div>
              </li> 
              @endif

              @if(Auth::user() && Auth::user()->IdPerfil != 5)
                @if(in_array(53,Session::get('actions')) || in_array(54,Session::get('actions'))
                || in_array(55,Session::get('actions')) || in_array(56,Session::get('actions')) )
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>Consolidados</a>

                <div class="collapsible-body">
                  <ul>
                    @if(in_array(53,Session::get('actions')))
                    <li><a href="{{ route('index.studyPlan') }}">De cursos dictados</a></li>
                    @endif

                    @if(in_array(54,Session::get('actions')))
                    <li><a href="{{ route('index.measuring') }}">De medición</a></li>
                    @endif

                    @if(in_array(55,Session::get('actions')))
                    <li><a href="{{ route('index.evaluation') }}">De evaluación</a></li>
                    @endif

                    @if(in_array(56,Session::get('actions')))
                    <li><a href="{{ route('index.results') }}">De resultados de medición</a></li>
                    @endif

                    @if(Auth::user() && (Auth::user()->IdPerfil == 3 || Auth::user()->IdPerfil == 4))
                    <li><a href="{{ route('pending.index')}}">De evaluación pendiente</a></li>
                    @endif

                    @if(Auth::user() && (Auth::user()->IdPerfil == 1 || Auth::user()->IdPerfil == 4))
                    <li><a href="{{ route('evidences.index')}}">Evidencias por especialidad</a></li>
                    @endif
                  </ul>
                </div>
                @endif
              @endif
         

              @if(in_array(58,Session::get('actions')) || in_array(63,Session::get('actions')) || in_array(64,Session::get('actions'))  )
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>Configuación sistema</a>

                  <div class="collapsible-body">
                    <ul>
                      <li><a href="{{ route('index.users') }}">Visitantes</a></li>
                      <li><a href="{{ route('index.profile')}}">Perfiles</a></li>
                      <li><a href="{{ route('index.academicCycle')}}">Ciclo académico</a></li>
                      <li><a href="{{route('status.indexType')}}">Administración de status</a></li>
                    </ul>
                  </div>

                </li>  
              @endif

              <!-- nueva barra PSP -->


              @if(Auth::user() && (Auth::user()->professor || Auth::user()->IdPerfil == 3 || Auth::user()->IdPerfil == 6 || Auth::user()->IdPerfil==0)) 
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>PSP</a>
                  <div class="collapsible-body">
                    <ul>
                        @if(Auth::user()->professor) <!--si es profesor o coordinador-->
                        <li><a href="{{route('pspGroup.index')}}"> Administrar Grupos</a></li>
                        <li><a href="{{route('phase.index')}}"> Administrar Fases</a></li>
                        <li><a href="{{route('supervisor.index')}}"> Administrar Supervisores</a></li>
                        <li><a href="{{route('template.index')}}"> Administrar Documentos</a></li>
                        <li><a href="{{route('scheduleMeeting.index')}}"> Cronograma de reunión</a></li>
                        {{--<li><a href=""> Ver alumnos</a></li>--}}
                        @endif
                        @if(Auth::user()->IdPerfil == 6) <!--si es supervisor-->
                        <li><a href="{{route('freeHour.index')}}"> Horario de reuniones</a></li>
                        <li><a href=""> Reuniones</a></li>
                        <li><a href=""> Documentos</a></li>
                        <li><a href="{{route('student.index')}}"> Administrar Alumnos</a></li>
                        <li><a href="{{route('studentScore.index')}}"> Notas Finales</a></li>
                        @endif
                        @if(Auth::user()->IdPerfil == 3) <!--si es admin-->
                        <li><a href="{{route('pspProcess.index')}}"> Activar Módulo Psp</a></li>
                        <li><a href="{{route('phase.index')}}"> Administrar Fases</a></li>
                        <li><a href="{{route('pspGroup.index')}}"> Administrar Grupos</a></li>
                        <li><a href="{{route('template.index')}}"> Administrar Documentos</a></li>
                        @endif
                        @if(Auth::user()->IdPerfil == 0) <!--si es alumno-->
                        <li><a href="{{route('inscription.index')}}"> Información de Empresa</a></li>
                        <li><a href="{{route('pspGroup.selectGroupCreate')}}"> Seleccionar Grupo</a></li>
                        <li><a href="{{route('pspDocument.index')}}"> Documentos</a></li>
                        <li><a href="{{route('meeting.index')}}"> Reservar Cita</a></li>
                        @endif
                    </ul>
                  </div>
                </li>  
              @endif

              @if(Auth::user() && (Auth::user()->IdPerfil == Config::get('constants.docente') || Auth::user()->IdPerfil == Config::get('constants.investigador') || Auth::user()->IdPerfil == Config::get('constants.admin')))
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>Investigación</a>
                <div class="collapsible-body">
                  <ul>
                    @if(Auth::user()->IdPerfil == Config::get('constants.docente') || Auth::user()->IdPerfil == Config::get('constants.investigador') || Auth::user()->IdPerfil == Config::get('constants.admin'))
                      <li><a href="{{route('investigador.index')}}">Administrar Investigadores</a></li>
                      <li><a href="{{route('grupo.index')}}">Administrar Grupos de Investigación</a></li>
                    @endif

                    @if(Auth::user()->IdPerfil == Config::get('constants.docente') || Auth::user()->IdPerfil == Config::get('constants.admin'))
                    <li><a href="{{route('area.index')}}">Administrar Áreas</a></li>
                    @endif

                    @if(Auth::user()->IdPerfil == Config::get('constants.docente') || Auth::user()->IdPerfil == Config::get('constants.investigador') || Auth::user()->IdPerfil == Config::get('constants.admin'))
                      <li><a href="{{route('evento.index')}}">Administrar Eventos</a></li>
                      <li><a href="{{route('proyecto.index')}}">Administrar Proyectos</a></li>
                    @endif                    
                  </ul>
                </div>
              </li> 
              @endif

              <!--Menu Tutotia-->
              <!--Si son alumnos de tutoria idPerfil == 0 -->
              @if(Auth::user() && ((Auth::user()->professor != null && 
                  (Auth::user()->IdPerfil == 2 && Auth::user()->professor->rolTutoria != null || Auth::user()->IdPerfil == 3 || Auth::user()->IdPerfil == 1)) || 
                  (Auth::user()->student !=null && Auth::user()->IdPerfil == 0)))     


              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>Tutoría</a>
                <div class="collapsible-body">
                  <ul>

                    <!-- docentes -->
                    @if(Auth::user()->IdPerfil != 0)
                    
                    <!-- coordinador de especialidad-->
                      @if(Auth::user()->IdPerfil == 1) 
                      <li><a href="{{route('coordinadorTutoria.index')}}"> Administrar Coordinadores</a></li>
                      @endif

                      <!-- coordinador de tutoria -->
                      @if(Auth::user()->professor->rolTutoria == 2)
                      <li><a href="{{route('tutor.index')}}"> Administrar Tutores</a></li>
                      <li><a href="{{route('alumno.index')}}"> Administrar Alumnos</a></li>
                      <li><a href="{{route('parametro.index.duration')}}"> Configuraciones</a></li>
                      @endif

                      <!-- tutor-->
                      @if(Auth::user()->professor->rolTutoria == 1)
                      <li><a href="{{route('miperfil.index')}}"> Mi perfil</a></li>
                      <li><a href="{{route('cita_alumno.index')}}"> Mis alumnos</a></li>                  
                      <li><a href="{{route('cita_alumno.index')}}"> Citas</a></li>
                      @endif   
                    
                    @endif

                    <!-- alumno  -->
                    @if(Auth::user()->IdPerfil == 0)
                    <li><a href="{{route('mitutor.index')}}"> Mi tutor</a></li>
                    <li><a href="{{route('cita_alumno.index')}}"> Mis citas</a></li>
                    @endif
                  </ul>
                </div>
              </li> 
              @endif

               

              <!--Menu Evaluaciones-->
              @if(Auth::user() && ((Auth::user()->IdPerfil <= 2)  ) )

              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">receipt</i>Evaluaciones</a>
                <div class="collapsible-body">
                  <ul>
                    @if(Auth::user()->IdPerfil == 1)   <!-- coordinador de especialidad-->
                    <li><a href="{{route('coordinadorEvaluaciones.index')}}"> Administradores</a></li>
                    @endif

                    @if(Auth::user()->professor != null)
                      @if(Auth::user()->professor->rolEvaluaciones == 1)  <!-- Aministrador de evaluaciones-->
                      <li><a href="{{route('competencia.index')}}"> Administrar Competencia</a></li>
                      <li><a href="{{route('pregunta.index')}}"> Administrar Preguntas</a></li>
                      <li><a href="{{route('evaluador.index')}}"> Administrar Evaluadores</a></li>
                      <li><a href="{{route('evaluacion.index')}}"> Administrar Evaluaciones</a></li>
                      @endif
                    @endif

                    @if(Auth::user()->professor != null)
                      @if(Auth::user()->professor->rolEvaluaciones == 2) <!-- Evaluador de competencias -->
                      <li><a href="{{route('pregunta.index')}}"> Administrar Preguntas</a></li>                
                      <li><a href="{{route('evaluacion_evaluador.index')}}"> Mis Evaluaciones</a></li>
                      @endif
                    @endif

                    @if(Auth::user()->IdPerfil == 0)<!-- Alumno  -->                    
                    <li><a href="{{route('evaluacion_alumno.index')}}"><i class="material-icons">reorder</i> Mis evaluaciones</a></li>
                    @endif
                  </ul>
                </div>
              </li> 
             
              @endif
              


            </ul>   
          </li>
        </ul> 
        
        <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
        <!--Fin barra de hamburgauesa-->            

        <a href="#" class="brand-logo center">UAS</a>

        <!-- Logout-->
        <a href="" class="brand-logo right logout">
            {{Form::open(['url' => '/logout', 'method'=>'GET'])}}
              <button class="btn btn-dark btn-sm hidden-xs hidden-sm"><span>Cerrar Sesión</span>
                <i class="fa fa-sign-out fa-lg"></i>
              </button>
                <button class="btn btn-dark visible-xs visible-sm">
                <i class="fa fa-sign-out fa-lg"></i>
              </button>
            {{Form::close()}}
        </a>

      </div>
    </nav>
<div class="main-container-sumajg">

  <div class="main_container">

    <!-- page content -->
    <div class="page-content-sumajg" role="main">
      
        @yield('content')
      
    </div>
    <!-- /page content -->
  </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
  <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
  </ul>
  <div class="clearfix"></div>
  <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>

<!-- gauge js -->
<script type="text/javascript" src="{{ URL::asset('js/gauge/gauge.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/gauge/gauge_demo.js')}}"></script>
<!-- bootstrap progress js -->
<script src="{{ URL::asset('js/progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- icheck -->
<script src="{{ URL::asset('js/icheck/icheck.min.js')}}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{ URL::asset('js/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/datepicker/daterangepicker.js')}}"></script>
<!-- chart js -->
<script src="{{ URL::asset('js/chartjs/chart.min.js')}}"></script>
<!-- moris js -->
<script src="{{ URL::asset('js/moris/raphael-min.js')}}"></script>
<script src="{{ URL::asset('js/moris/morris.min.js')}}"></script>

<script src="{{ URL::asset('js/custom.js')}}"></script>

<!-- flot js -->
<!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.orderBars.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.time.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/date.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.spline.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.stack.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/curvedLines.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.resize.js')}}"></script>
<script>
  $(document).ready(function() {
    // [17, 74, 6, 39, 20, 85, 7]
    //[82, 23, 66, 9, 99, 6, 2]
    var data1 = [
      [gd(2012, 1, 1), 17],
      [gd(2012, 1, 2), 74],
      [gd(2012, 1, 3), 6],
      [gd(2012, 1, 4), 39],
      [gd(2012, 1, 5), 20],
      [gd(2012, 1, 6), 85],
      [gd(2012, 1, 7), 7]
    ];
    var data2 = [
      [gd(2012, 1, 1), 82],
      [gd(2012, 1, 2), 23],
      [gd(2012, 1, 3), 66],
      [gd(2012, 1, 4), 9],
      [gd(2012, 1, 5), 119],
      [gd(2012, 1, 6), 6],
      [gd(2012, 1, 7), 9]
    ];
    $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
      data1, data2
    ], {
      series: {
        lines: {
          show: false,
          fill: true
        },
        splines: {
          show: true,
          tension: 0.4,
          lineWidth: 1,
          fill: 0.4
        },
        points: {
          radius: 0,
          show: true
        },
        shadowSize: 2
      },
      grid: {
        verticalLines: true,
        hoverable: true,
        clickable: true,
        tickColor: "#d5d5d5",
        borderWidth: 1,
        color: '#fff'
      },
      colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
      xaxis: {
        tickColor: "rgba(51, 51, 51, 0.06)",
        mode: "time",
        tickSize: [1, "day"],
        //tickLength: 10,
        axisLabel: "Date",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 10
        //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
      },
      yaxis: {
        ticks: 8,
        tickColor: "rgba(51, 51, 51, 0.06)",
      },
      tooltip: false
    });
    function gd(year, month, day) {
      return new Date(year, month - 1, day).getTime();
    }
  });
</script>

<!-- worldmap -->
<script type="text/javascript" src="{{ URL::asset('js/maps/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/maps/gdp-data.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/maps/jquery-jvectormap-us-aea-en.js')}}"></script>
<!-- pace -->
<script src="{{ URL::asset('js/pace/pace.min.js')}}"></script>

<!-- dropzone -->
<script src="{{ URL::asset('js/dropzone/dropzone.js')}}"></script>

<!-- datepicker -->
<script src="{{ URL::asset('js/bootstrap-datepicker.js')}}"></script>

<script>
  $(function() {
    $('#world-map-gdp').vectorMap({
      map: 'world_mill_en',
      backgroundColor: 'transparent',
      zoomOnScroll: false,
      series: {
        regions: [{
          values: gdpData,
          scale: ['#E6F2F0', '#149B7E'],
          normalizeFunction: 'polynomial'
        }]
      },
      onRegionTipShow: function(e, el, code) {
        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
      }
    });
  });
</script>
<!-- skycons -->
<script src="{{ URL::asset('js/skycons/skycons.min.js')}}"></script>
<script>
  var icons = new Skycons({
            "color": "#73879C"
          }),
          list = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;
  for (i = list.length; i--;)
    icons.set(list[i], list[i]);
  icons.play();
</script>

<!-- dashbord linegraph -->
<script>
  Chart.defaults.global.legend = {
    enabled: false
  };
  var data = {
    labels: [
      "Symbian",
      "Blackberry",
      "Other",
      "Android",
      "IOS"
    ],
    datasets: [{
      data: [15, 20, 30, 10, 30],
      backgroundColor: [
        "#BDC3C7",
        "#9B59B6",
        "#455C73",
        "#26B99A",
        "#3498DB"
      ],
      hoverBackgroundColor: [
        "#CFD4D8",
        "#B370CF",
        "#34495E",
        "#36CAAB",
        "#49A9EA"
      ]
    }]
  };
  var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
    type: 'doughnut',
    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
    data: data
  });
</script>
<!-- /dashbord linegraph -->
<!-- datepicker -->
<script type="text/javascript">
  $(document).ready(function() {
    var cb = function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
    }
    var optionSet1 = {
      startDate: moment().subtract(29, 'days'),
      endDate: moment(),
      minDate: '01/01/2012',
      maxDate: '12/31/2015',
      dateLimit: {
        days: 60
      },
      showDropdowns: true,
      showWeekNumbers: true,
      timePicker: false,
      timePickerIncrement: 1,
      timePicker12Hour: true,
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      opens: 'left',
      buttonClasses: ['btn btn-default'],
      applyClass: 'btn-small btn-primary',
      cancelClass: 'btn-small',
      format: 'MM/DD/YYYY',
      separator: ' to ',
      locale: {
        applyLabel: 'Submit',
        cancelLabel: 'Clear',
        fromLabel: 'From',
        toLabel: 'To',
        customRangeLabel: 'Custom',
        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        firstDay: 1
      }
    };
    $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    $('#reportrange').daterangepicker(optionSet1, cb);
    $('#reportrange').on('show.daterangepicker', function() {
      console.log("show event fired");
    });
    $('#reportrange').on('hide.daterangepicker', function() {
      console.log("hide event fired");
    });
    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
      console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
    });
    $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
      console.log("cancel event fired");
    });
    $('#options1').click(function() {
      $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
    });
    $('#options2').click(function() {
      $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
    });
    $('#destroy').click(function() {
      $('#reportrange').data('daterangepicker').remove();
    });
  });
</script>
<script>
  NProgress.done();
</script>

<script type="text/javascript">
  //Code for show success  messages
  @if( @Session::has('success') )
    toastr.success('{{ @Session::get('success') }}');
  @endif
</script>

<script type="text/javascript">
  //Code for show success  messages
  @if( @Session::has('warning') )
    toastr.error('{{ @Session::get('warning') }}');
  @endif
</script>

<script type="text/javascript">
  //Code for show back error messages
  @if (@Session::has('errors'))
    @foreach ($errors->all() as $error)
        toastr.error('{{ @$error }}');
    @endforeach
  @endif
</script>


 <script type="text/javascript" src="{{ asset('js/materialize.min.js')}}"></script>
      
      
      
  <script>
    $(document).ready(function() {
              
      $(".dropdown-button").dropdown();
      $(".button-collapse").sideNav();      /*es para que boton de hamburgesa funcione*/
      
    });
  </script>

<!-- /datepicker -->
<!-- /footer content -->
</body>

</html>