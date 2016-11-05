@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Ver Alumno</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Información</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Datos</h4>
                    </div>
                </div>
                <form class='form-horizontal'>
                    <div class="form-group">
                        <p class="col-sm-2 col-xs-12">
                            <strong>Código: </strong>{{$student->codigo}}
                        </p>
                        <p class="col-sm-4 col-xs-12">
                            <strong>Apellidos, Nombres: </strong>{{$student->ape_paterno}} {{$student->ape_materno}}, {{$student->nombre}}
                        </p>
                        <p class="col-sm-3 col-xs-12">
                            <strong>Correo: </strong>{{$student->correo}}
                        </p>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Evaluaciones de Competencias</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Evaluación</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12"> 
                        <a class="btn btn-default pull-right" href="{{ route('mis_alumnos.index') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection