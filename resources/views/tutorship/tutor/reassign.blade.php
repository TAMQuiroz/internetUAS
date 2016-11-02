@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Reasignación</h3>
    </div>    
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Información</h3>
            </div>

            <div class="panel-body">
                <div class="form-horizontal">                    
                    {{Form::open(['route' => ['tutor.deactivate',$tutor->IdDocente], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                    <div class="form-group">
                        {{Form::label('Motivo',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @foreach($razones as $razon)
                            {{Form::radio('motivo', $razon->id , false, array('class' => 'check'))}} {{$razon->nombre}} <br> 
                            @endforeach                            
                        </div>                        
                    </div>                                        

                    <div class="form-group">
                        {{Form::label('Tutores',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">

                            <table class="table table-striped responsive-utilities jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">                                        
                                        <th class="column-title">Código </th>
                                        <th class="column-title">Apellidos&nbsp;y&nbsp;Nombres</th>                                                                
                                        <th class="column-title">Horas semanales</th>
                                        <th class="column-title">Alumnos</th>
                                        <th class="column-title">Asignación </th>                                        
                                        <th class="column-title last">Seleccionar</th>                            
                                    </tr>
                                </thead>
                                <tbody>         
                                    @foreach($tutors as $t)
                                    <tr class="even pointer">                                        
                                        <td class="">{{ $t->Codigo }}</td>
                                        <td class="">{{ $t->ApellidoPaterno.' '.$t->ApellidoMaterno.', '.$t->Nombre }}</td>
                                        <td class="">{{ $horas[$t->IdDocente] }}</td>
                                        <td class="">{{ count($t->tutorships)}} </td>
                                        <td class="">{{ Form::number('cant['.$t->IdDocente.']',0,['class'=>'form-control', 'required','min'=>'0', 'maxlength' => 50]) }}</td>                            
                                        <td class="">{{ Form::checkbox('name', 'value') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>                                        

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h4>Cantidad de alumnos a reasignar: {{count($tutor->tutorships)}}</h4>                        
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            {{Form::submit('Desactivar tutor y reasignar', ['class'=>'btn btn-success pull-right'])}}
                            <a class="btn btn-default pull-right" href="{{ route('tutor.index') }}">Cancelar</a>
                        </div>
                    </div>
                    {{Form::close()}}                                        
                </div>

            </div>
        </div>
    </div>
</div>

@endsection