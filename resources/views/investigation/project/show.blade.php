@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Proyecto</h3>
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

                <div class="form-horizontal col-md-6">
                    <div class="form-group">
                        {{Form::label('Nombre *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-8">
                            {{Form::text('nombre',$proyecto->nombre,['class'=>'form-control', 'readonly', 'maxlength' => 50])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Número de entregables *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-8">
                            {{Form::text('num_entregables',$proyecto->num_entregables,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Fecha de inicio *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-8">
                            {{Form::text('fecha_ini',$proyecto->fecha_ini,['id'=>'fecha_ini','class'=>'form-control', 'readonly','min'=>\Carbon\Carbon::today()->toDateString()])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Fecha de Fecha fin *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-8">
                            {{Form::text('fecha_fin',$proyecto->fecha_fin,['id'=>'fecha_fin','class'=>'form-control', 'readonly','min'=>\Carbon\Carbon::today()->toDateString()])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Grupo *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-8">
                            {{Form::text('grupo', $proyecto->group->nombre, ['class' => 'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Area *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-8">
                            {{Form::text('area', $proyecto->area->nombre, ['class' => 'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Descripcion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-8">
                            {{Form::textarea('descripcion', $proyecto->descripcion, ['class' => 'form-control', 'readonly', 'rows'=>'5', 'maxlength'=>200])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Estado *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-md-8">
                            {{Form::text('estado', $proyecto->status->nombre, ['class' => 'form-control', 'readonly'])}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-11 col-sm-12 col-xs-12">
                            <a class="btn btn-success pull-right" href="{{ route('proyecto.edit',$proyecto->id) }}">Editar</a>
                            <a class="btn btn-default pull-right" href="{{ route('proyecto.index') }}">Regresar</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        Diagrama de Gantt:
                    </div>
                </div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Investigadores</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                    <thead> 
                        <tr class="headings"> 
                            <th>Nombre</th> 
                            <th>Apellido Paterno</th> 
                            <th>Apellido Materno</th> 
                            <th>Especialidad</th> 
                            <th>Tipo de integrante</th>
                            <th colspan="2">Acciones</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        @foreach($integrantes as $integrante)
                            @if(isset($integrante->id))
                                <tr> 
                                    <td>{{$integrante->nombre}}</td> 
                                    <td>{{$integrante->ape_paterno}}</td> 
                                    <td>{{$integrante->ape_materno}}</td> 
                                    <td>{{$integrante->faculty->Nombre}}</td>
                                    <td>Investigador</td>
                                    <td>
                                        <a href="{{route('investigador.show', $integrante->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                                    </td>
                                </tr> 
                            @elseif(isset($integrante->IdDocente))
                                <tr> 
                                    <td>{{$integrante->Nombre}}</td> 
                                    <td>{{$integrante->ApellidoPaterno}}</td> 
                                    <td>{{$integrante->ApellidoMaterno}}</td> 
                                    <td>{{$integrante->faculty->Nombre}}</td>
                                    <td>Profesor</td>
                                    <td></td>
                                </tr> 
                            @endif
                        @endforeach
                        
                    </tbody> 
                </table>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Entregables</h3>
            </div>
            <div class="panel-body">
                
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('entregable.index',$proyecto->id)}}" class="btn btn-success pull-right">Mis entregables</a>
                    </div>
                </div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                    <thead> 
                        <tr class="headings"> 
                            <th>Nombre</th> 
                            <th>Responsable</th> 
                            <th>Fecha de entrega</th> 
                            <th colspan="2">Acciones</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        @foreach($proyecto->deliverables as $deliverable)
                        <tr> 
                            <td>{{$deliverable->nombre}}</td> 
                            <td>
                                <ul>
                                    @if(count($deliverable->investigators))
                                        @foreach($deliverable->investigators as $investigator)
                                            <li> {{$investigator->nombre}} {{$investigator->ape_paterno}} </li>
                                        @endforeach
                                    @else
                                        <li> No hay asignados </li>
                                    @endif
                                </ul>
                            </td> 
                            <td>{{$deliverable->fecha_limite}}</td> 
                            <td>
                                <a href="{{route('entregable.show', $deliverable->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                                <a href="{{route('entregable.download', $deliverable->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-download"></i></a>
                            </td>
                        </tr> 
                        @endforeach
                        
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>


@endsection