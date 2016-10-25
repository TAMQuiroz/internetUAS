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
            {{Form::open(['route' => 'pspProcess.store','class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
            {{ Form::hidden('idCiclo', $cycle) }}
                <div class="form-horizontal">   
                    @if($proceso!=null)
                    <a class="btn btn-primary pull-right final" href="{{ route('pspProcess.delete') }}">Finalizar Ciclo</a>
                    @endif
                    <div class="form-group">
                        {{Form::label('Nombre de curso',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($proceso!=null)
                            {{Form::text('nombreCurso',$proceso->nomCurso,['class'=>'form-control'])}}    
                            @elseif($courses!=null)
                            {{ Form::select('IdCurso', $courses, null, ['class'=>'control-label']) }}
                            @else
                            {{Form::text('nombreCurso','-',['class'=>'form-control','readonly'])}}    
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('Ciclo activo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($proceso!=null)
                            {{Form::text('nombreCiclo',$proceso->ciclo,['class'=>'form-control', 'readonly'])}}    
                            @else
                            {{Form::text('nombreCiclo','-',['class'=>'form-control', 'readonly'])}}    
                            @endif
                        </div>
                    </div>
                    @if($proceso!=null)
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
                    @endif
                </div> 
                @if($courses == null && $proceso==null)
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-warning">
                            <strong>Advertencia: </strong> No hay cursos dictados en el ciclo, debe agregar al menos uno.
                        </div>
                    </div>
                </div>    
                @endif
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        @if($courses!=null)
                        {{Form::submit('Activar', ['class'=>'btn btn-success pull-right'])}}
                        @endif
                        <a class="btn btn-default pull-right" href="{{ route('pspProcess.index') }}">Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}   
            </div>
        </div>
    </div>
</div>                

@endsection