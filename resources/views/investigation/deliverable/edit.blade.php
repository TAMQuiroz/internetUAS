@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
            <h3>Editar entregable</h3>
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

		    	{{Form::open(['route' => ['entregable.update', $entregable->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
		    		{{Form::hidden('id_proyecto',$proyecto->id,['id'=>'id_proyecto'])}}
                    <div class="form-group">
		    			{{Form::label('Nombre *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">
		    				{{Form::text('nombre', $entregable->nombre,['class'=>'form-control', 'required', 'maxlength' => 50])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Porcentaje de avance *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">
		    				{{Form::number('porcen_avance', $entregable->porcen_avance,['class'=>'form-control', 'required', 'min'=>0, 'max'=>100])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha inicio *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">
		    				{{Form::date('fecha_ini',$entregable->fecha_inicio,['id'=>'fecha_ini','class'=>'form-control', 'required','min'=>$proyecto->fecha_ini, 'max'=>$proyecto->fecha_fin])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha fin *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">
		    				{{Form::date('fecha_fin',$entregable->fecha_limite,['id'=>'fecha_fin','class'=>'form-control', 'required','min'=> $proyecto->fecha_ini, 'max'=>$proyecto->fecha_fin])}}
		    			</div>
		    		</div>

                    <div class="form-group">
                        {{Form::label('Tarea padre',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{Form::select('padre_id',$entregables->prepend('No tiene'),$entregable->id_padre,['id'=>'padre','class'=>'form-control', 'required'])}}
                        </div>
                    </div>

		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
							{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
							<a class="btn btn-default pull-right" href="{{ route('entregable.show',$entregable->id) }}">Cancelar</a>
						</div>
					</div>
		    	{{Form::close()}}

		  	</div>

            <div class="panel-heading">
                <h3 class="panel-title">Responsables</h3>
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
                                                {{Form::open(['route' => ['entregable.afiliacion.store.investigador'], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                                                    <a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                                                    {{Form::button('<i class="fa fa-plus"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit'])}}

                                                    {{Form::hidden('id_entregable',$entregable->id)}}
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
                                        @foreach($entregable->investigators as $investigator)
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

                                        @include('modals.delete', ['id'=> 'af'.$investigator->pivot->id, 'message' => '¿Esta seguro que desea quitar este investigador del entregable?', 'route' => route('entregable.afiliacion.delete.investigador', $investigator->pivot->id)])
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
                                                {{Form::open(['route' => ['entregable.afiliacion.store.docente'], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                                                    {{--<a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>--}}
                                                    {{Form::button('<i class="fa fa-plus"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit'])}}

                                                    {{Form::hidden('id_entregable',$entregable->id)}}
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
                                        @foreach($entregable->teachers as $teacher)
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

                                        @include('modals.delete', ['id'=> 'prf'.$teacher->pivot->id, 'message' => '¿Esta seguro que desea quitar este profesor del entregable?', 'route' => route('entregable.afiliacion.delete.docente', $teacher->pivot->id)])
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