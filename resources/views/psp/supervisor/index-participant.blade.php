@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Supervisores</h3>
			</div>
		</div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content">
            <div class="panel-body">
                <div class="form-horizontal">   
                    <div class="form-group">
                        {{Form::label('Proceso PSP',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4">
                            {{ Form::select('IdProceso', $procesos, null, ['class'=>'form-control']) }}

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Supervisores Activos</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                <thead> 
                                    <tr class="headings"> 
                                        <th>Código</th> 
                                        <th>Nombre</th> 
                                        <th>Apellido Paterno</th>  
                                        <th colspan="2">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach($supActivos as $sup) 
                                    <tr> 
                                        <td >{{$sup->codigo_trabajador}}</td>
                                        <td >{{$sup->nombres}}</td>
                                        <td >{{$sup->apellido_paterno}}</td>
                                        <td ><a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#af{{$sup->id}}" title="Quitar"><i class="fa fa-remove"></i></a></td>
                                    </tr> 
                                    @include('modals.delete', ['id'=> 'af'.$sup->id, 'message' => '¿Esta seguro que desea quitar este supervisor del proceso?', 'route' => route('supervisor.participant.delete.supervisor', $sup->id)])
                                    @endforeach
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Supervisores Elegibles</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                <thead> 
                                    <tr class="headings"> 
                                        <th>Código</th> 
                                        <th>Nombre</th> 
                                        <th>Apellido Paterno</th> 
                                        <th colspan="2">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach($supervisores as $supervisor) 
                                    <tr> 
                                        <td >{{$supervisor->codigo_trabajador}}</td>
                                        <td >{{$supervisor->nombres}}</td>
                                        <td >{{$supervisor->apellido_paterno}}</td>
                                        <td>
                                            {{Form::open(['route' => ['supervisor.participant.store.supervisor'], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                                            <a href="{{ route('supervisor.show', $supervisor->id) }}"  class="btn btn-primary btn-xs" title="Ver más"><i class="fa fa-search"></i></a>
                                            {{Form::button('<i class="fa fa-plus"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit'])}}
                                            <!--<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$supervisor->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>-->

                                            {{Form::hidden('idSupervisor',$supervisor->id)}}
                                            {{Form::close()}}
                                        </td>
                                    </tr> 
                                    @endforeach
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profesores Activos</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                <thead> 
                                    <tr class="headings"> 
                                        <th>Código</th> 
                                        <th>Nombre</th> 
                                        <th>Apellido Paterno</th> 
                                        <th>Apellido Materno</th>  
                                        <th colspan="2">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    
                                    <tr> 
                                        
                                    </tr> 

                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profesores Elegibles</h3>
                        </div>
                        <div class="panel-body table-scroll">
                            <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                                <thead> 
                                    <tr class="headings"> 
                                        <th>Código</th> 
                                        <th>Nombre</th> 
                                        <th>Apellido Paterno</th> 
                                        <th>Apellido Materno</th>  
                                        <th colspan="2">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr> 
                                    </tr> 

                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    
@endsection