@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Entregable</h3>
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
			  	<div class="form-horizontal">
		    		<div class="form-group">
		    			{{Form::label('Nombre',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">
		    				{{Form::text('nombre',$entregable->nombre,['class'=>'form-control', 'readonly'])}}
		    			</div>
		    		</div>

                    <div class="form-group">
                        {{Form::label('Porcentaje de avance',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-4">
                            {{Form::number('porcen_avance', $entregable->porcen_avance,['class'=>'form-control', 'readonly'])}}
                        </div>
                    </div>

		    		<div class="form-group">
		    			{{Form::label('Fecha inicio',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">
		    				{{Form::date('fecha_ini',$entregable->fecha_inicio,['id'=>'fecha_ini','class'=>'form-control', 'readonly'])}}
		    			</div>
		    		</div>

		    		<div class="form-group">
		    			{{Form::label('Fecha limite',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
		    			<div class="col-xs-12 col-md-4">
		    				{{Form::date('fecha_fin',$entregable->fecha_limite,['id'=>'fecha_fin','class'=>'form-control', 'readonly'])}}
		    			</div>
		    		</div>

                    <div class="form-group">
                        {{Form::label('Tarea padre',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            @if($entregable->father)
                                {{Form::text('padre_id',$entregable->father->nombre,['class'=>'form-control', 'readonly'])}}
                            @else
                                {{Form::text('padre_id','No tiene padre',['class'=>'form-control', 'readonly'])}}
                            @endif
                        </div>
                    </div>

		    		<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
                            @if(Auth::user()->IdUsuario == $entregable->project->group->leader->user->IdUsuario || Auth::user()->IdPerfil == Config::get('constants.admin'))
							<a class="btn btn-success pull-right" href="{{ route('entregable.edit',$entregable->id) }}">Editar</a>
                            @endif							
                            <a class="btn btn-default pull-right" href="{{ route('entregable.index', $entregable->project->id) }}">Regresar</a>
						</div>
					</div>
		  		</div>
		  	</div>

            <div class="panel-heading">
                <h3 class="panel-title">Responsables</h3>
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
                        @if($integrantes)
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
                        @endif      
                        </tbody> 
                    </table>
                </div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Versiones</h3>
            </div>
            <div class="panel-body">
                {{Form::open(['route' => ['entregable.upload', $entregable->id], 'files'=>true, 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                    {{Form::hidden('id_usuario', Auth::user()->IdUsuario)}}
                    {{Form::hidden('id_entregable', $entregable->id)}}
                    {{Form::submit('Subir', ['class'=>'btn btn-success pull-right'])}}
                    <div class="col-md-4 pull-right">
                        {{Form::file('archivo', ['class'=>'form-control', 'required', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Solo ingresar archivos con formato .doc, .docx, .xls, .xlsx, .pdf, .jpg'])}}  
                    </div>
                    {{Form::label('Subir nueva version',null,['class'=>'control-label hidden-xs col-md-4 col-sm-3 col-xs-12 pull-right'])}}
                {{Form::close()}}

                <div class="table-responsive">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                        <thead> 
                            <tr class="headings"> 
                                <th>Nombre</th>
                                <th>Version</th> 
                                <th>Responsable</th> 
                                <th>Observacion</th> 
                                <th colspan="2">Acciones</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($entregable->versions as $version)
                                <tr> 
                                    <td hidden class="version-id">{{ $version->id }}</td>
                                    <td hidden class="entregable-id">{{ $entregable->id }}</td>
                                    <td>{{$entregable->nombre.'V'.$version->version}}</td> 
                                    <td>{{$version->version}}</td> 
                                    <td>
                                        @if($version->user->IdPerfil == 2)
                                            {{$version->user->professor->Nombre}} {{$version->user->professor->ApellidoPaterno}}
                                        @else
                                            {{$version->user->investigator->nombre}} {{$version->user->investigator->ape_paterno}}
                                        @endif
                                    </td>
                                    @if($version->observacion != null)
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="truncate">{{$version->observacion}}</div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="btn btn-primary btn-xs view-observation" onclick="show('{{$version->id}}')" title="Visualizar"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td>Sin observación</td>
                                    @endif
                                    <td>
                                        <a href="{{route('entregable.download', $version->id)}}" class="btn btn-primary btn-xs" title="Descargar"><i class="fa fa-download"></i></a>
                                        @if(Auth::user()->IdUsuario == $entregable->project->group->leader->user->IdUsuario || Auth::user()->IdPerfil == Config::get('constants.admin'))
                                        <a class="btn btn-primary btn-xs write-observation" onclick="show('{{$version->id}}')" title="Observación"><i class="fa fa-pencil"></i></a>
                                        <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$version->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                        @endif
                                    </td>
                                </tr> 

                                @include('modals.delete', ['id'=> $version->id, 'message' => '¿Esta seguro que desea eliminar esta version?', 'route' => route('entregable.deleteVersion', $version->id)])
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
		</div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>
<script src="{{ URL::asset('js/intranetjs/investigation/deliverable/versionModal.js')}}"></script>

@include('investigation.deliverable.write-observation-modal', ['title' => 'Version #'])
@include('investigation.deliverable.view-observation-modal', ['title' => 'Version #'])

@endsection