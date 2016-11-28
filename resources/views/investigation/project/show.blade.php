@extends(Auth::user() ? 'app' : 'appPublic')
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
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Información</h3>
            </div>
            <div class="panel-body">

                <div class="form-horizontal col-md-6">
                    <div class="form-group">
                        {{Form::label('Nombre *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            @if(Auth::user())
                            {{Form::text('nombre',$proyecto->nombre,['class'=>'form-control', 'readonly', 'maxlength' => 50])}}
                            @else
                            <div class="form-control no-border">
                                {{$proyecto->nombre}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Número de entregables *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            @if(Auth::user())
                            {{Form::text('num_entregables',$proyecto->num_entregables,['class'=>'form-control', 'readonly'])}}
                            @else
                            <div class="form-control no-border">
                                {{$proyecto->num_entregables}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Fecha de inicio *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            @if(Auth::user())
                            {{Form::text('fecha_ini',$proyecto->fecha_ini,['id'=>'fecha_ini','class'=>'form-control', 'readonly','min'=>\Carbon\Carbon::today()->toDateString()])}}
                            @else
                            <div class="form-control no-border">
                                {{$proyecto->fecha_ini}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Fecha de fin *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            @if(Auth::user())
                            {{Form::text('fecha_fin',$proyecto->fecha_fin,['id'=>'fecha_fin','class'=>'form-control', 'readonly','min'=>\Carbon\Carbon::today()->toDateString()])}}
                            @else
                            <div class="form-control no-border">
                                {{$proyecto->fecha_fin}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Grupo *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            @if(Auth::user())
                            {{Form::text('grupo', $proyecto->group->nombre, ['class' => 'form-control', 'readonly'])}}
                            @else
                            <div class="form-control no-border">
                                {{$proyecto->group->nombre}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Area *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            @if(Auth::user())
                            {{Form::text('area', $proyecto->area->nombre, ['class' => 'form-control', 'readonly'])}}
                            @else
                            <div class="form-control no-border">
                                {{$proyecto->area->nombre}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Descripcion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            @if(Auth::user())
                            {{Form::textarea('descripcion', $proyecto->descripcion, ['class' => 'form-control', 'readonly', 'rows'=>'5', 'maxlength'=>200])}}
                            @else
                            <div class="form-control no-border">
                                {{$proyecto->descripcion}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Estado *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            @if(Auth::user())
                            {{Form::text('estado', $proyecto->status->nombre, ['class' => 'form-control', 'readonly'])}}
                            @else
                            <div class="form-control no-border">
                                {{$proyecto->status->nombre}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-11 col-sm-12 col-xs-12">
                            @if(Auth::user() && (Auth::user()->IdUsuario == $proyecto->group->leader->user->IdUsuario || Auth::user()->IdPerfil == Config::get('constants.admin')))
                            <a class="btn btn-success pull-right" href="{{ route('proyecto.edit',$proyecto->id) }}">Editar</a>
                            @endif
                            <a class="btn btn-default pull-right" href="{{ route('proyecto.index') }}">Regresar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Diagrama de Gantt:</h3>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['gantt'], 'language': 'es'});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var entregables = {!!$proyecto->deliverables!!};
                                    if(entregables.length != 0){
                                        var data = new google.visualization.DataTable();
                                        data.addColumn('string', 'Task ID');
                                        data.addColumn('string', 'Task Name');
                                        data.addColumn('date', 'Start Date');
                                        data.addColumn('date', 'End Date');
                                        data.addColumn('number', 'Duration');
                                        data.addColumn('number', 'Percent Complete');
                                        data.addColumn('string', 'Dependencies');

                                        for (key in entregables){
                                            id              = entregables[key].id;
                                            nombre          = entregables[key].nombre;
                                            fecha_inicio    = new Date(entregables[key].fecha_inicio.replace(/-/g, '\/'));
                                            fecha_fin       = new Date(entregables[key].fecha_limite.replace(/-/g, '\/'));
                                            porcentaje      = parseInt(entregables[key].porcen_avance);
                                            dependencia     = entregables[key].id_padre;

                                            if(dependencia){
                                                data.addRows([
                                                    ['T'+id, nombre, fecha_inicio, fecha_fin, null,  porcentaje,  'T'+dependencia],
                                                ]);
                                            }else{
                                                data.addRows([
                                                    ['T'+id, nombre, fecha_inicio, fecha_fin, null,  porcentaje,  null],
                                                ]);
                                            }
                                            
                                        }

                                        var options = {
                                            height: 300
                                        };

                                        var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

                                        chart.draw(data, options);
                                    }
                                }
                            </script>
                            <div id="chart_div"></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Integrantes</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
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
                                        <td>
                                            @if($integrante->codigo)
                                                Alumno
                                            @else
                                                Investigador
                                            @endif
                                        </td>
                                        <td>
                                        @if(!$integrante->codigo)
                                            <a href="{{route('investigador.show', $integrante->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                                        @endif
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
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Entregables</h3>
            </div>
            <div class="panel-body">
                
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <h4>Se ha terminado {{$entregables_realizados}} entregable(s) de {{$proyecto->num_entregables}}</h4>
                    </div>
                    @if(Auth::user())
                    <div class="col-xs-12 col-md-6">
                        <a href="{{route('entregable.index',$proyecto->id)}}" class="btn btn-success pull-right">Mis entregables</a>
                    </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                        <thead> 
                            <tr class="headings"> 
                                <th>Nombre</th> 
                                <th>Responsable</th> 
                                <th>Fecha de entrega</th> 
                                <th>Porcentaje de avance</th>
                                <th colspan="2">Acciones</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($proyecto->deliverables as $deliverable)
                            <tr> 
                                <td>{{$deliverable->nombre}}</td> 
                                <td>
                                    <ul>
                                        @if(count($deliverable->investigators) && count($deliverable->teachers))
                                            @if(count($deliverable->investigators))
                                                @foreach($deliverable->investigators as $investigator)
                                                    <li> {{$investigator->nombre}} {{$investigator->ape_paterno}} </li>
                                                @endforeach
                                            @endif
                                            @if(count($deliverable->teachers))
                                                @foreach($deliverable->teachers as $teacher)
                                                    <li> {{$teacher->Nombre}} {{$teacher->ApePaterno}} </li>
                                                @endforeach
                                            @endif
                                            @if(count($deliverable->students))
                                                @foreach($deliverable->students as $student)
                                                    <li> {{$student->nombre}} {{$student->ape_paterno}} </li>
                                                @endforeach
                                            @endif
                                        @else
                                            <li> No hay asignados </li>
                                        @endif
                                    </ul>
                                </td> 
                                <td>{{$deliverable->fecha_limite}}</td> 
                                <td>
                                    {{$deliverable->porcen_avance}} %
                                </td>
                                <td>
                                    @if(Auth::user())
                                    <a href="{{route('entregable.show', $deliverable->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                                    @endif
                                    @if(count($deliverable->versions)!=0)
                                    <a href="{{route('entregable.download', $deliverable->lastversion->first()->id)}}" class="btn btn-primary btn-xs" title="Descargar"><i class="fa fa-download"></i></a>
                                    @endif
                                    @if(Auth::user() && (Auth::user()->IdUsuario == $proyecto->group->leader->user->IdUsuario || Auth::user()->IdPerfil == Config::get('constants.admin')))
                                    <a href="{{route('entregable.notify', $deliverable->project->group->id)}}" class="btn btn-primary btn-xs" title="Notificar"><i class="fa fa-envelope"></i></a>
                                    @endif

                                </td>
                            </tr> 
                            @endforeach
                            
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection