@extends('no-menu')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Especialidades</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_content">
            <div class="row">
                @if($isEmpty)
                    <label>El profesor no tiene asignado ningun curso en el sistema.</label>
                @endif
                @foreach($faculties as $fac)
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a href="{{ route('index.ourFaculty', ['faculty-code' => $fac->IdEspecialidad]) }}">
                            <div class="tile-stats faculty">
                                <div class="icon col-lg-3 col-md-3 col-sm-6 col-xs-12"><i class="fa fa-arrow-circle-right" style="color:#26B99A;"></i>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">

                                    <br>
                                    <h3 class="faculty-name">@if($fac!=null) {{$fac->Nombre}} @endif</h3>
                                    <br>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <div class="x_content">
            <div class="row">
                <h3>Botones de Configuración</h3>
            </div>
            <div class="row">
                @if(Auth::user() && (Auth::user()->IdPerfil == 3))
                <a href="{{ route('index.flujoAdministrador') }}" class="btn btn-success pull-left"><i class="fa fa-cogs"></i> Iniciar Especialidad</a>
                @endif
            </div>
        </div>
    </div>
@endsection