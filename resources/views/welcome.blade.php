<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>UAS | University Acreditation System</title>

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
  <link href="{{ URL::asset('css/icheck/flat/green.css')}}" rel="stylesheet">


  <script src="{{ URL::asset('js/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('js/validate/jquery.validate.min.js')}}"></script>
  <script src="{{ URL::asset('js/validate/additional-methods.min.js')}}"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <div class="text-center" style="border: 0; margin-top:20px; height:140px;">
            <img src="{{ URL::asset('images/uas.png')}}" class="img-circle img-responsive center-block" width="120px" style="display: inline-block;"><br>
            <h2>University Accreditation System</h2>
          </div>
          <div class="separator"></div>
          <div class="clearfix"></div>
          <form method="POST" action="{{ url('login') }}">
            {{ csrf_field() }}
            @if (session('error'))
              <div class="alert alert-error" id="message-error">
                  {{ session('error') }}
              </div>
            @endif
            <div>
              <input type="text" class="form-control" placeholder="Usuario" name="user" id="user"/>
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password"/>
            </div>
            <div>
              <button class="btn btn-default submit">Iniciar Sesión</button>
            </div>
            <div>
              <a href="{{route('investigacion.index')}}" class="btn btn-default public_link">Sección Publica</a>
            </div>
            <div class="clearfix"></div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>
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
