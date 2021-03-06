@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Nuevo administrador de evaluaciones</h3>
    </div>        
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        {{Form::open(['route' => ['coordinadorEvaluaciones.store'], 'class'=>'', 'id'=>''])}}
        <div class="x_title">                
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <a href="#filter-coords" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                    
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h5 class="pull-right"><strong> Elija uno o más profesores.</strong></h5>
                </div>
            </div>    
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <col width="10%" >
                    <col width="45%" >
                    <col width="30%">
                    <col width="15%">
                    <thead>
                        <tr class="headings">                            
                            <th class="centered column-title">Código </th>
                            <th class="column-title">Profesor</th>                            
                            <th class="centered column-title">Especialidad</th> 
                            <th class="centered column-title last">Seleccionar</th>                            
                        </tr>
                    </thead>
                    <tbody>                    
                        @foreach($teachers as $index=>$teacher) 
                        <tr class="even pointer">                            
                            <td class="centered">{{ $teacher->Codigo }}</td>
                            <td class="">{{ $teacher->ApellidoPaterno.' '.$teacher->ApellidoMaterno.', '.$teacher->Nombre }}</td>                            
                            <td class="centered">{{ $teacher->faculty->Nombre }}</td>
                            <td class="centered">                                

                                {{Form::checkbox('check['.$teacher->IdDocente.']',1 , false, array('class' => 'check'))}}
                            </td>
                        </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>            
            {{ $teachers->links() }}

        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                <a class="btn btn-default pull-right" href="{{ route('coordinadorEvaluaciones.index') }}">Cancelar</a>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>

@include('tutorship.modals.filtercoord', ['title' => 'Filtrar', 'route' => route('coordinadorEvaluaciones.create')])
@endsection