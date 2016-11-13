@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Ver alumno</h3>
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
                <form class='form-horizontal'>
                    <div class="form-group">
                        {{Form::label('Código *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('codigo',$student->codigo,['class'=>'form-control', 'readonly', 'maxlength' => 50])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Apellidos, nombres *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('nombre',$student->ape_paterno.' '.$student->ape_materno.', '.$student->nombre,['class'=>'form-control', 'readonly', 'maxlength' => 50])}}
                        </div>
                    </div>

                    
                    <div class="form-group">
                        {{Form::label('Correo *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('correo',$student->correo,['class'=>'form-control ', 'readonly', 'maxlength' => 50])}}
                        </div>
                    </div>
                </form>

                
                

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">                        
                        <a class="btn btn-default pull-right" href="{{ route('evstudent.index') }}">Regresar</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- <script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script> -->

@endsection