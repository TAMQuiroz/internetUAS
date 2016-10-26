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

                <div class="form-horizontal">   
                    <div class="form-group">
                        {{Form::label('Nombre de curso',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('nombreCurso',$proceso->nomCurso,['class'=>'form-control', 'readonly'])}}    

                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('Código',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('codigoCurso',$proceso->codCurso,['class'=>'form-control', 'readonly'])}}    
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('Ciclo activo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::text('ciclo',$proceso->ciclo,['class'=>'form-control', 'readonly'])}}    
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
                            <th class="column-title last">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($profesores!=null)
                            @foreach($profesores as $profesor)                            
                            <tr class="even pointer">
                                <td class="a-center ">{{$profesor['codigo']}}</td>
                                <td>{{$profesor['nombre']}} {{$profesor['apellidoPat']}}</td>
                                <td>
                                    @if($profesor['activo']==0)
                                        {{Form::open(['route' => ['pspProcess.activateTeacher'], 'id'=>'formSuggestion'])}}
                                        {{Form::button('<i class="fa fa-plus"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit', 'title'=>'Dar Acceso'])}}
                                        {{Form::hidden('idProceso',$proceso->id)}}
                                        {{Form::hidden('idProfesor',$profesor['IdDocente'])}}
                                        {{Form::hidden('proceso',$proceso->id)}}
                                        {{Form::close()}}
                                    @endif
                                    {{Form::open(['route' => ['pspProcess.activateStudents'], 'id'=>'formSuggestion'])}}
                                    {{Form::button('<i class="fa fa-group"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit', 'title'=>'Dar Acceso Alumnos'])}}
                                    {{Form::close()}}
                                </td>
                            </tr>
                            @endforeach
                        @endif                            
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <a class="btn btn-default pull-right" href="{{ route('pspProcess.index') }}">Regresar</a>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>                

@endsection