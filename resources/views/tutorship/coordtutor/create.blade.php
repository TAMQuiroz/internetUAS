@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Nuevo coordinador de tutoría</h3>
        </div>        
    </div>
    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        {{Form::open(['route' => ['coordinadorTutoria.store'], 'class'=>'', 'id'=>''])}}
            <div class="x_title">                
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="#filter-coords" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                        <h5 class="pull-right"><strong> Elija uno o más profesores.</strong></h5>
                    </div>
                </div>               
                
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Código </th>
                            <th class="column-title">Profesor</th>                            
                            <th class="column-title">Especialidad</th> 
                            <th class="column-title last">Seleccionar</th>                            
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
                {{ $teachers->links() }}
                
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
    @include('tutorship.modals.filtercoord', ['title' => 'Filtrar', 'route' => route('coordinadorTutoria.create')])
@endsection