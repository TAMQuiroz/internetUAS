@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Evaluaciones</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">                
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ route('evaluacion.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i> Nueva evaluación
                    </a>
                </div>
            </div>   
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <col width="10%" >
                    <col width="15%">
                    <col width="15%">
                    <col width="45%">                    
                    <col width="10%">
                    <col width="10%">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Estado </th>                        
                            <th class="column-title">Desde </th>    
                            <th class="column-title">Hasta </th>    
                            <th class="column-title">Nombre </th>    
                            <th class="column-title">Avance </th>                            
                            <th class="column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluations as $evaluation)
                        <tr class="even pointer">                            
                            <td class=" ">{{ $evaluation->estado }}</td>
                            <td class=" ">{{ $evaluation->fecha_inicio->format('d/m/Y')}}</td>
                            <td class=" ">{{ $evaluation->fecha_fin->format('d/m/Y')}}</td>                            
                            <td class=" ">{{ $evaluation->nombre }}</td>              
                            <td class=" ">-</td>
                            <td class="">
                                <a href="{{route('evaluacion.edit',$evaluation->id)}}" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$evaluation->id}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $evaluation->id, 'message' => '¿Está seguro que desea desactivar esta evaluación?', 'route' => route('evaluacion.delete', $evaluation->id)])
                        @endforeach
                    </tbody>
                </table>
            </div>             
            
        </div>
    </div>
</div>
@endsection