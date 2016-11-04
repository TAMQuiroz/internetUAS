<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Home | University Accreditation System</title>

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

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css')}}"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{ URL::asset('css/custom.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('css/maps/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" type="text/css"/>
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
              <i class="material-icons center">account_circle</i>        
              <div id="info-user" class="bar-info">
                <span class="white-text email">
                </span>
              </div>
            </div>
          </li>             
          
          <li><a class="subheader">Menu</a></li>
          <li><div class="divider"></div></li>

          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
              <li class="bold">
                <a class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>Investigación</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{route('investigacion.index')}}">Home</a></li>
                        <li><a href="{{route('investigador.index')}}">Ver Investigadores</a></li>
                        <li><a href="{{route('grupo.index')}}">Ver Grupos de Investigación</a></li>
                        <li><a href="{{route('evento.index')}}">Ver Eventos</a></li>
                        <li><a href="{{route('proyecto.index')}}">Ver Proyectos</a></li>
                        <li><a href="{{route('reporteISP.index')}}">Investigadores según proyecto</a></li>
                        <li><a href="{{route('reporteISA.index')}}">Investigadores según área</a></li>  
                    </ul>
                </div>
              </li> 
            </ul>   
          </li>
        </ul> 
        
        <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
        <!--Fin barra de hamburgauesa-->            

        <a href="/" class="brand-logo center">UAS</a>


      </div>
    </nav>
<div class="main-container-sumajg">
  <div class="main_container">
    <div class="page-content-sumajg" role="main">
        @yield('content')
    </div>
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
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.orderBars.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.time.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/date.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.spline.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.stack.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/curvedLines.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/flot/jquery.flot.resize.js')}}"></script>

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

<script type="text/javascript" src="{{ asset('js/materialize.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();      /*es para que boton de hamburgesa funcione*/
    });
</script>

</body>

</html>