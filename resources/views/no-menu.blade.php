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

  <!-- Bootstrap core CSS -->

  <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{ URL::asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{ URL::asset('css/custom.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/maps/jquery-jvectormap-2.0.3.css')}}" />
  <link href="{{ URL::asset('css/icheck/flat/green.css')}}" rel="stylesheet" />
  <link href="{{ URL::asset('css/floatexamples.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('css/styles.css')}}" rel="stylesheet" type="text/css" />

  <script src="{{ URL::asset('js/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('js/nprogress.js')}}"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">


          <div class="navbar nav_title text-center" style="border: 0; margin-top:20px; height:auto;">
            <img src="{{ URL::asset('images/uas.png')}}" class="img-circle img-responsive center-block" width="80px" style="display: inline-block;">
            <br>
            <h5 style="color: #FFF;" class="hidden-xs hidden-sm">University Accreditation System</h5>
          </div>

          <div class="clearfix"></div>
          <div class="separator"></div>
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="height:500px">
            <div class="menu_section">
                <ul class="nav side-menu">
                  @if(Auth::user() && (Auth::user()->IdPerfil == 2 || Auth::user()->IdPerfil == 5))
                  <li>
                    <a>
                       <i class="fa fa-flask"></i> Investigación <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu" style="display: none">
                      @if(Auth::user()->IdPerfil == 2)
                      <li><a href="{{route('investigador.index')}}"> Administrar Investigadores</a></li>
                      <li><a href="{{route('grupo.index')}}"> Administrar Grupos de Investigación</a></li>
                      <li><a href="{{route('area.index')}}"> Administrar Áreas</a></li>
                      <li><a href="{{route('evento.index')}}"> Administrar Eventos</a></li>
                      <li><a href="{{route('proyecto.index')}}"> Administrar Proyectos</a></li>
                      @endif
                    </ul>
                  </li>
                  @endif
                </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu" style="padding-top: 5px;">
          <nav class="" role="navigation">
            <ul class="nav navbar-nav navbar-right" style="padding-left:5px;">
              <li class="nav toggle visible-xs visible-sm pull-left" style="padding-top:0;">
                <button id="menu_toggle" class="btn btn-dark"><i class="fa fa-lg fa-bars"></i></button>
              </li>
              <li class="user-profile pull-left" >
                <img src="{{ URL::asset('images/ic_circle_placeholder.png')}}" alt="">
                
                <span class="label label-default hidden-xs hidden-sm">
                  @if( isset(Session::get('user')->user) && Session::get('user')->user->IdPerfil == 5)
                      {{Session::get('user')->nombre}} {{Session::get('user')->ape_paterno}} {{Session::get('user')->ape_materno}}
                  @else
                      {{Session::get('user')->Nombre}} {{Session::get('user')->ApellidoPaterno}} {{Session::get('user')->ApellidoMaterno}}
                  @endif
                </span>
              </li>
              <li>
                <form method="GET" action="{{ url('logout') }}">
                  <button class="btn btn-dark btn-sm hidden-xs hidden-sm">Cerrar Sesión
                    <i class="fa fa-sign-out fa-lg"></i>
                  </button>
                    <button class="btn btn-dark visible-xs visible-sm">
                    <i class="fa fa-sign-out fa-lg"></i>
                  </button>
                </form>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          @yield('content')
        </div>
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

  <script src="{{ URL::asset('js/custom.js')}}"></script>
  <!-- /footer content -->
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
</body>

</html>
