@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
            <h3>Editar proyecto</h3>
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

		    	{{Form::open(['route' => ['proyecto.update', $proyecto->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
					<div class="form-group">
		    			{{Form::label('Nombre *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::text('nombre',$proyecto->nombre,['class'=>'form-control', 'required', 'maxlength' => 50])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Número de entregables *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::number('num_entregables',$proyecto->num_entregables,['class'=>'form-control', 'required','min'=>1])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha de inicio *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
                            @if(count($proyecto->firstdeliverable) != 0)
		    				{{Form::date('fecha_ini',$proyecto->fecha_ini,['id'=>'fecha_ini','class'=>'form-control', 'required','min'=>\Carbon\Carbon::today()->toDateString(), 'max' => $proyecto->firstdeliverable->first()->fecha_inicio])}}
                            @else
                            {{Form::date('fecha_ini',$proyecto->fecha_ini,['id'=>'fecha_ini','class'=>'form-control', 'required','min'=>\Carbon\Carbon::today()->toDateString()])}}
                            @endif
		    			</div>
		    		</div>
                    @if(count($proyecto->lastdeliverable) != 0)
                    {{Form::hidden('fecha_limite', $proyecto->lastdeliverable->first()->fecha_limite, ['id'=>'fecha_limite'])}}
                    @endif
		    		<div class="form-group">
		    			{{Form::label('Fecha fin *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
                            @if(count($proyecto->lastdeliverable) != 0)
		    				{{Form::date('fecha_fin',$proyecto->fecha_fin,['id'=>'fecha_fin','class'=>'form-control', 'required','min'=>$proyecto->lastdeliverable->first()->fecha_limite])}}
                            @else
                            {{Form::date('fecha_ini',$proyecto->fecha_ini,['id'=>'fecha_ini','class'=>'form-control', 'required','min'=>\Carbon\Carbon::today()->toDateString()])}}
                            @endif
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Grupo *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::select('grupo', $grupos, $proyecto->id_grupo, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Area *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::select('area', $areas, $proyecto->id_area, ['class' => 'form-control', 'required'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Descripcion *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-6">
		    				{{Form::textarea('descripcion', $proyecto->descripcion, ['class' => 'form-control', 'required', 'rows'=>'5', 'maxlength'=>200])}}
		    			</div>
		    		</div>

                    <div class="form-group">
                        {{Form::label('Estado *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-6">
                            {{Form::select('estado', $estados, $proyecto->estado ,['class' => 'form-control', 'required'])}}
                        </div>
                    </div>

		    		<div class="row">
						<div class="col-md-9 col-sm-12 col-xs-12">
							{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('proyecto.show',$proyecto->id) }}">Cancelar</a>
						</div>
					</div>
		    	{{Form::close()}}

		  	</div>

            <div class="panel-heading">
                <h3 class="panel-title">Integrantes del Proyecto</h3>
            </div>
            <div class="panel-body">
                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Investigadores Elegibles</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                    <thead> 
                                        <tr class="headings"> 
                                            <th>Nombre</th> 
                                            <th>Apellido Paterno</th> 
                                            <th>Apellido Materno</th>
                                            <th>Especialidad</th>
                                            <th colspan="2">Acciones</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        @foreach($investigators as $investigator)
                                        <tr> 
                                            <td>{{$investigator->nombre}}</td> 
                                            <td>{{$investigator->ape_paterno}}</td> 
                                            <td>{{$investigator->ape_materno}}</td> 
                                            <td>{{$investigator->faculty->Nombre}}</td> 
                                            <td>
                                                {{Form::open(['route' => ['proyecto.afiliacion.store.investigador'], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                                                    <a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                                                    {{Form::button('<i class="fa fa-plus"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit'])}}

                                                    {{Form::hidden('id_proyecto',$proyecto->id)}}
                                                    {{Form::hidden('id_investigator',$investigator->id)}}
                                                {{Form::close()}}
                                            </td>
                                        </tr> 

                                        @endforeach
                                        
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Investigadores Asignados</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                    <thead> 
                                        <tr class="headings"> 
                                            <th>Nombre</th> 
                                            <th>Apellido Paterno</th> 
                                            <th>Apellido Materno</th> 
                                            <th>Especialidad</th> 
                                            <th colspan="2">Acciones</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        @foreach($proyecto->investigators as $investigator)
                                        <tr> 
                                            <td>{{$investigator->nombre}}</td> 
                                            <td>{{$investigator->ape_paterno}}</td> 
                                            <td>{{$investigator->ape_materno}}</td> 
                                            <td>{{$investigator->faculty->Nombre}}</td>
                                            <td>
                                                <a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#af{{$investigator->pivot->id}}" title="Quitar"><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr> 

                                        @include('modals.delete', ['id'=> 'af'.$investigator->pivot->id, 'message' => '¿Esta seguro que desea quitar este investigador del proyecto?', 'route' => route('proyecto.afiliacion.delete.investigador', $investigator->pivot->id)])
                                        @endforeach
                                        
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-12">
                    <hr>
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profesores Elegibles</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                    <thead> 
                                        <tr class="headings"> 
                                            <th>Nombre</th> 
                                            <th>Apellido Paterno</th> 
                                            <th>Apellido Materno</th>
                                            <th>Especialidad</th>
                                            <th colspan="2">Acciones</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        @foreach($elegible_teachers as $teacher)
                                        <tr> 
                                            <td>{{$teacher->Nombre}}</td> 
                                            <td>{{$teacher->ApellidoPaterno}}</td> 
                                            <td>{{$teacher->ApellidoMaterno}}</td> 
                                            <td>{{$teacher->faculty->Nombre}}</td> 
                                            <td>
                                                {{Form::open(['route' => ['proyecto.afiliacion.store.docente'], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                                                    {{--<a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>--}}
                                                    {{Form::button('<i class="fa fa-plus"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit'])}}

                                                    {{Form::hidden('id_proyecto',$proyecto->id)}}
                                                    {{Form::hidden('id_docente',$teacher->IdDocente)}}
                                                {{Form::close()}}
                                            </td>
                                        </tr> 

                                        @endforeach
                                        
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profesores Asignados</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                    <thead> 
                                        <tr class="headings"> 
                                            <th>Nombre</th> 
                                            <th>Apellido Paterno</th> 
                                            <th>Apellido Materno</th> 
                                            <th>Especialidad</th> 
                                            <th colspan="2">Acciones</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        @foreach($proyecto->teachers as $teacher)
                                        <tr> 
                                            <td>{{$teacher->Nombre}}</td> 
                                            <td>{{$teacher->ApellidoPaterno}}</td> 
                                            <td>{{$teacher->ApellidoMaterno}}</td> 
                                            <td>{{$teacher->faculty->Nombre}}</td>
                                            <td>
                                                {{--<a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>--}}
                                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#prf{{$teacher->pivot->id}}" title="Quitar"><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr> 

                                        @include('modals.delete', ['id'=> 'prf'.$teacher->pivot->id, 'message' => '¿Esta seguro que desea quitar este profesor del proyecto?', 'route' => route('proyecto.afiliacion.delete.docente', $teacher->pivot->id)])
                                        @endforeach
                                        
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-12">
                    <hr>
                </div>

                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Alumnos Elegibles</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                    <thead> 
                                        <tr class="headings"> 
                                            <th>Nombre</th> 
                                            <th>Apellido Paterno</th> 
                                            <th>Apellido Materno</th>
                                            <th>Especialidad</th>
                                            <th colspan="2">Acciones</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        @foreach($students as $student)
                                        <tr> 
                                            <td>{{$student->nombre}}</td> 
                                            <td>{{$student->ape_paterno}}</td> 
                                            <td>{{$student->ape_materno}}</td> 
                                            <td>{{$student->faculty->Nombre}}</td> 
                                            <td>
                                                {{Form::open(['route' => ['proyecto.afiliacion.store.estudiante'], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                                                    {{--<a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>--}}
                                                    {{Form::button('<i class="fa fa-plus"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit'])}}

                                                    {{Form::hidden('id_proyecto',$proyecto->id)}}
                                                    {{Form::hidden('id_estudiante',$student->id)}}
                                                {{Form::close()}}
                                            </td>
                                        </tr> 

                                        @endforeach
                                        
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Alumnos Asignados</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                    <thead> 
                                        <tr class="headings"> 
                                            <th>Nombre</th> 
                                            <th>Apellido Paterno</th> 
                                            <th>Apellido Materno</th> 
                                            <th>Especialidad</th> 
                                            <th colspan="2">Acciones</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        @foreach($proyecto->students as $student)
                                        <tr> 
                                            <td>{{$student->nombre}}</td> 
                                            <td>{{$student->ape_paterno}}</td> 
                                            <td>{{$student->ape_materno}}</td> 
                                            <td>{{$student->faculty->Nombre}}</td>
                                            <td>
                                                {{--<a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>--}}
                                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#est{{$student->pivot->id}}" title="Quitar"><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr> 

                                        @include('modals.delete', ['id'=> 'est'.$student->pivot->id, 'message' => '¿Esta seguro que desea quitar este alumno del proyecto?', 'route' => route('proyecto.afiliacion.delete.estudiante', $student->pivot->id)])
                                        @endforeach
                                        
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>

@endsection