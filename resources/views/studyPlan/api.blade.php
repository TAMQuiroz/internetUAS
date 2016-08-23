<!DOCTYPE html>
<html lang="es">
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



</head>
<body style="background: white; color: black">
<div class="page-title">
    <div class="title_left">
        <h3> {{ $course->Codigo }} - {{ $course->Nombre }} </h3>
    </div>
</div>

<div class="clearfix"></div>
<div class="separator"></div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_title">
                <h2> Resultados Estudiantiles</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                @foreach($studentResults as $sr)
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p><strong> {{$sr->studentsResult->Identificador}} {{$sr->studentsResult->Descripcion}} </strong></p>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="success">
                                        <th rowspan="2"  class="text-center col-md-4">Aspecto</th>
                                        <th rowspan="2" class="text-center  col-md-4">Criterio</th>
                                        @foreach($schedules as $s)
                                            <th class="text-center">{{ $s->Codigo }}</th>
                                        @endforeach
                                        <th class="text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sr->studentsResult->criterions as $criterion)
                                            <tr>
                                                <td>{{ $criterion->aspect->Nombre }}</td>
                                                <td>{{ $criterion->Nombre }}</td>
                                                @foreach($schedules as $s)
                                                    <th class="text-center">{{ sprintf("%0.2f", $sr->performanceMatrix[$s->IdHorario][$criterion->IdCriterio]) }}%</th>
                                                @endforeach
                                                <td class="text-center"><strong>{{ sprintf("%0.2f", $sr->performanceMatrix['total'][$criterion->IdCriterio]) }}%</strong></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td><strong>Total</strong></td>
                                            @foreach($schedules as $s)
                                                <th class="text-center">{{ sprintf("%0.2f", $sr->performanceMatrix[$s->IdHorario]['total']) }}%</th>
                                            @endforeach
                                            <td class="text-center"><strong>{{ sprintf("%0.2f", $sr->performanceMatrix['total']['total']) }}%</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>