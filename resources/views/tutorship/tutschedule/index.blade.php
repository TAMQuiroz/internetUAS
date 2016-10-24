@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Disponibilidad Semanal</h3>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Mi Perfil</h3>
            </div>
            
            <div class="panel-body">

                <div class="form-horizontal">
                    <div class="form-group">
                        {{Form::label('Código',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('Codigo',$user->Codigo,['class'=>'form-control', 'required', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Nombres y apellidos',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('Nombre',$user->Nombre.' '.$user->ApellidoPaterno.' '.$user->ApellidoMaterno,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>                    

                    <div class="form-group">
                        {{Form::label('Correo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('Correo',$user->Correo,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Categoría',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('Cargo',$user->Cargo,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Teléfono',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($user->telefono != null)
                            {{Form::text('telefono',$user->telefono,['class'=>'form-control', 'readonly'])}}
                            @else
                            {{Form::text('telefono', '-',['class'=>'form-control', 'readonly'])}}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Oficina',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($user->oficina != null)
                            {{Form::text('oficina',$user->oficina,['class'=>'form-control', 'readonly'])}}
                            @else
                            {{Form::text('oficina','-',['class'=>'form-control', 'readonly'])}}
                            @endif		    				
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Anexo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($user->anexo != null)
                            {{Form::text('anexo',$user->anexo,['class'=>'form-control', 'readonly'])}}
                            @else
                            {{Form::text('anexo','-',['class'=>'form-control', 'readonly'])}}
                            @endif		    				
                        </div>
                    </div>                    

                    <div class="form-group">
                        {{Form::label('Horas a la semana',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('horas','-',['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">							
                            <a class="btn btn-default pull-right" href="{{ route('disponibilidad.edit',$user->IdDocente) }}">Editar</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection