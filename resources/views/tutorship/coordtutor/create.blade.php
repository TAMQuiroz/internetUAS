@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Nuevo coordinador de tutoría</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        {{Form::open(['route' => ['coordinadorTutoria.store'], 'class'=>'', 'id'=>''])}}
            <div class="x_title">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="#filter-coords" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                    </div>
                </div>

                <div class="x_content">
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <h6>Elija uno o más profesores</h6>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Código </th>
                            <th class="column-title">Profesor</th>                            
                            <th class="column-title">Especialidad</th> 
                            <th class="column-title last">Seleccionar</th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>                    
                        @foreach($teachers as $index=>$teacher)  
                        
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $teacher->IdDocente }}</td> 
                            <td class="">{{ $teacher->Codigo }}</td>
                            <td class="">{{ $teacher->ApellidoPaterno.' '.$teacher->ApellidoMaterno.', '.$teacher->Nombre }}</td>                            
                            <td class="">{{ $teacher->faculty->Nombre }}</td>
                            <td class="">                                

                                {{Form::checkbox('check['.$teacher->IdDocente.']',1 , false, array('class' => 'check'))}}
                            </td>
                        </tr>                        
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                    <a class="btn btn-default pull-right" href="{{ route('coordinadorTutoria.index') }}">Cancelar</a>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
    @include('tutorship.modals.filter', ['title' => 'Filtrar', 'route' => route('coordinadorTutoria.index')])
@endsection