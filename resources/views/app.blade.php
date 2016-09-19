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
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <!--TEACHER MENU-->

          <div class="menu_section">
            <ul class="nav side-menu">
            <!--
                <li>
                  <a href="{{ route('layout.master') }}"><i class="fa fa-home"></i> Inicio </a>
                </li>
                -->
              <li>
                <a href="{{ route('index.ourFaculty', ['faculty-code' => Session::get('faculty-code')] ) }}">
                  <i class="fa fa-home"></i> Inicio</a>
              </li>

              @if(in_array(70,Session::get('actions')))
                <li>
                <!--<a href="{{ route('indexAcademicCycle.faculty') }}">-->
                  <a href="{{ route('index.faculty') }}">
                    <i class="fa fa-institution"></i> Especialidades</a>
                </li>
              @endif
              @if(in_array(11,Session::get('actions')) || in_array(6,Session::get('actions')) || in_array(1,Session::get('actions')) || in_array(2,Session::get('actions')))
                <li>
                  <a>
                    <i class="fa fa-certificate"></i> Mi Especialidad<span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu" style="display: none">
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

                  <!--<li><a href="{{ route('index.timetable')}}">Horarios</a></li>-->
                  </ul>
                </li>
              @endif
              @if(in_array(16,Session::get('actions')))
                <li>
                  <a href="{{ route('index.educationalObjectives') }}">
                    <i class="fa fa-mortar-board"></i> Objetivos Educacionales</a>
                </li>
              @endif
              @if(in_array(21,Session::get('actions')))
                <li>
                  <a href="{{ route('index.studentsResult') }}">
                    <i class="fa fa-file-text"></i> Resultados Estudiantiles</a>
                </li>
              @endif
              @if(in_array(25,Session::get('actions')))
                <li>
                  <a href="{{ route('index.aspects') }}">
                    <i class="fa fa-gavel"></i> Aspectos</a>
                </li>
              @endif
              @if(in_array(31,Session::get('actions')))
                <li>
                  <a href="{{ route('index.measurementSource') }}">
                    <i class="fa fa-area-chart"></i> Instrumentos de Medición</a>
                </li>
              @endif
              @if(in_array(7,Session::get('actions')) || in_array(8,Session::get('actions')) || in_array(9,Session::get('actions')) )
                <!--
                <li>
                  <a>
                    <i class="fa fa-list"></i> Configurar Medición<span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu" style="display: none">

                  @if(in_array(16,Session::get('actions')))
                    <li><a href="{{ route('index.educationalObjectives') }}">Objetivos Educacionales</a></li>
                  @endif

                  @if(in_array(21,Session::get('actions')))
                    <li><a href="{{ route('index.studentsResult') }}">Resultados Estudiantiles</a></li>
                  @endif
                  @if(in_array(25,Session::get('actions')))

                      <li><a href="{{ route('index.rubrics') }}">Rúbricas</a></li>


                  @endif
                  @if(in_array(25,Session::get('actions')))
                    <li><a href="{{ route('index.aspects') }}">Aspectos</a></li>
                  @endif
                  @if(in_array(31,Session::get('actions')))
                    <li><a href="{{ route('index.measurementSource') }}">Instrumentos de Medición</a></li>
                  @endif

                  <li><a href="{{ route('index.timetable')}}">Horarios</a></li>
                  </ul>

                </li>
                -->
              @endif
              @if(in_array(28,Session::get('actions')) || in_array(29,Session::get('actions')) || in_array(67,Session::get('actions')) )
                <li>
                  <a>
                    <i class="fa fa-check"></i> Evaluación <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu" style="display: none">
                    @if(in_array(28,Session::get('actions')))
                      <li><a href="{{ route('contributions.studentsResult') }}">Matriz de Aporte</a></li>
                    @endif
                    @if(in_array(29,Session::get('actions')))
                      <!--<li><a href="{{ route('indexEvaluated.studentsResult') }}">Resultados Estudiantiles Evaluados</a></li>-->
                    @endif
                    @if(in_array(67,Session::get('actions')))
                      <li><a href="{{ route('index.dictatedCourses') }}">Cursos Dictados</a></li>
                  @endif
                  @if(in_array(13,Session::get('actions')))
                    <!--<li><a href="#">Instrumentos de Medición</a></li>-->
                  @endif

                  <!--<li><a href="{{ route('index.timetable')}}">Horarios</a></li>-->
                  </ul>
                </li>
              @endif

              @if(in_array(67,Session::get('actions')))
                <li>
                  <a href="{{ route('index.myCourses') }}">
                    <i class="fa fa-book"></i> Mis Cursos
                  </a>
                </li>
              @endif

              @if(in_array(41,Session::get('actions')) || in_array(44,Session::get('actions')) ||
              in_array(68,Session::get('actions')) || in_array(50,Session::get('actions')))
                <li>
                  <a>
                    <i class="fa fa-edit"></i> Mejora Continua <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu" style="display: none">

                    @if(in_array(41,Session::get('actions')))
                      <li><a href="{{ route('index.suggestions') }}">Mis Sugerencias</a></li>
                    @endif
                    @if(in_array(44,Session::get('actions')))
                      <li><a href="{{ route('indexAll.suggestions') }}">Sugerencias</a></li>
                    @endif
                    @if(in_array(68,Session::get('actions')))
                      <li><a href="{{ route('index.enhacementPlan') }}">Plan de Mejora</a></li>
                    @endif
                    @if(in_array(50,Session::get('actions')))
                      <li><a href="{{ route('index.typeImprovement') }}">Tipos Planes de Mejora</a></li>
                    @endif

                  </ul>
                </li>
              @endif
              @if(in_array(53,Session::get('actions')) || in_array(54,Session::get('actions'))
              || in_array(55,Session::get('actions')) || in_array(56,Session::get('actions')) )
                <li>
                  <a>
                    <i class="fa fa-line-chart"></i> Consolidados<span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu" style="display: none">
                    @if(in_array(79,Session::get('actions')))
                      <li><a href="{{ route('view-status.evaluation') }}">Avance de Medición</a></li>
                    @endif
                    @if(in_array(53,Session::get('actions')))
                      <li><a href="{{ route('index.studyPlan') }}">De Cursos Dictados</a></li>
                    @endif
                    @if(in_array(54,Session::get('actions')))
                      <li><a href="{{ route('index.measuring') }}">De Medición</a></li>
                    @endif
                    @if(in_array(55,Session::get('actions')))
                      <li><a href="{{ route('index.evaluation') }}">De Evaluación</a></li>
                    @endif
                    @if(in_array(56,Session::get('actions')))
                      <li><a href="{{ route('index.results') }}">De Resultados de Medición</a></li>
                    @endif
                    @if(Auth::user() && (Auth::user()->IdPerfil == 3 || Auth::user()->IdPerfil == 4))
                      <li><a href="{{ route('pending.index')}}">De Evaluacion Pendiente</a></li>
                    @endif
                    <!--<li><a href="{{ route('index.timetable')}}">Horarios</a></li>-->
                  </ul>
                </li>
              @endif

              @if(in_array(58,Session::get('actions')) || in_array(63,Session::get('actions')) || in_array(64,Session::get('actions'))  )
                <li>
                  <a>
                    <i class="fa fa-cog"></i> Configuracion Sistema<span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu" style="display: none">

                    @if(in_array(58,Session::get('actions')))
                      <li><a href="{{ route('index.users') }}">Visitantes</a></li>
                    @endif
                    @if(in_array(63,Session::get('actions')))
                      <li><a href="{{ route('index.profile')}}">Perfiles</a></li>
                    @endif
                    @if(in_array(64,Session::get('actions')))
                      <li><a href="{{ route('index.academicCycle')}}">Ciclo Académico</a></li>
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
              @if ( Session::get('user')->IdUsuario != 1)
                <a href="{{route('edit.myUser', ['userCode' => Session::get('user')->IdUsuario])}}" style="color:#fff" onMouseOver="this.style.color='#26B99A'" onMouseOut="this.style.color='#fff'">
              @endif
                  {{Session::get('user')->Nombre}} {{Session::get('user')->ApellidoPaterno}} {{Session::get('user')->ApellidoMaterno}}
              @if (Session::get('user')->IdPerfil != 1)
                </a>
              @endif
              </span>
              <span>&nbsp</span>
              <span class="label label-info hidden-xs hidden-sm">{{Session::get('faculty-name')}}</span>
              <span class="label label-info hidden-xs hidden-sm">@if(Session::get('academic-cycle')!=null){{Session::get('academic-cycle')->academicCycle->Descripcion}}@endif</span>
              @if(Session::has('academic-cycle'))
                <span class="label label-danger col-10">
                  Días restantes para el fin de ciclo: {{ $diffForHumans }}
                </span>
              @endif
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
            <li>
                <span class="info-number"><a href="{{ route('index.subindex')}}" class="btn btn-sm btn-dark hidden-xs hidden-sm">Mis Especialidades
                  <i class="fa fa-institution fa-lg"></i></a><span class="badge bg-blue">{{Session::get('numFaculties')}}</span>
                </span>
                <span><a href="{{ route('index.subindex')}}" class="btn btn-md btn-dark visible-xs visible-sm">
                  <i class="fa fa-institution fa-lg"></i></a>
                </span>
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
<!-- /datepicker -->
<!-- /footer content -->
</body>

</html>
