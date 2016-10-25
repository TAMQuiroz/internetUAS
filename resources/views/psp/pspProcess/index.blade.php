@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Información del módulo actual de PSP</h3>
			</div>
		</div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{{route('pspProcess.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Editar</a>
                </div>
                <div class="form-horizontal">   
                    <div class="form-group">
                        {{Form::label('Nombre de curso',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($proceso!=null)
                            {{Form::text('nombreCurso',$proceso->nomCurso,['class'=>'form-control', 'readonly'])}}    
                            @else
                            {{Form::text('nombreCurso','',['class'=>'form-control', 'readonly'])}}    
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('Ciclo activo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($proceso!=null)
                            {{Form::text('nombreCiclo',$proceso->ciclo,['class'=>'form-control', 'readonly'])}}    
                            @else
                            {{Form::text('nombreCiclo','',['class'=>'form-control', 'readonly'])}}    
                            @endif
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="separator"></div>

                    <h2>Profesores del curso en el ciclo</h2>
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">Código </th>
                            <th class="column-title">Nombre</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($profesores!=null)
                            @foreach($profesores as $profesor)                            
                            <tr class="even pointer">
                                <td class="a-center ">{{$profesor['codigo']}}</td>
                                <td>{{$profesor['nombre']}} {{$profesor['apellidoPat']}}</td>
                            </tr>
                            @endforeach
                        @endif                            
                        </tbody>
                    </table>
                </div>
                @if($proceso == null)
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-warning">
                            <strong>Advertencia: </strong> No hay un modulo activo, debe iniciar uno.
                        </div>
                    </div>
                </div>    
                @endif
            </div>
        </div>
    </div>
</div>                

@endsection