@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{$evaluation->nombre}}</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">                            
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <col width="10%" >
                    <col width="15%">
                    <col width="15%">
                    <col width="10%">
                    <col width="40%">
                    <col width="10%">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Número de refrencia</th>
                            <th class="column-title">Fecha de inicio </th>                            
                            <th class="column-title">Fecha de fin </th>                            
                            <th class="column-title">Código </th>                            
                            <th class="column-title">Alumno </th>                            
                            <th class="column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tutstudentxevaluations as $tutstudentxevaluation)
                        
                        <tr class="even pointer">                                                   
                            <td class=" ">{{$tutstudentxevaluation->id }}</td>
                            <td class=" ">{{ date("d/m/Y g:i a", strtotime($tutstudentxevaluation->inicio))}}</td>
                            @if($tutstudentxevaluation->fecha_hora != null)                                                                  
                            <td class=" ">{{ date("d/m/Y g:i a", strtotime($tutstudentxevaluation->fecha_hora))}}</td>
                            @else
                            <td class=" ">-</td>
                            @endif                                              
                            <td class=" ">{{ $tutstudentxevaluation->alumno->codigo }}</td>                                                                                    
                            <td class=" ">{{ $tutstudentxevaluation->alumno->ape_paterno.' '.$tutstudentxevaluation->alumno->ape_materno.', '.$tutstudentxevaluation->alumno->nombre  }}</td>                                                                                    
                            <td class="">  
                            @if(! is_null($tutstudentxevaluation->fecha_hora)  )               
                                <a href="{{route('evaluacion_corregida.show',$tutstudentxevaluation->id)}}" title="Visualizar" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-eye"></i>
                                </a>                               
                                @elseif (is_null($tutstudentxevaluation->fecha_hora)  && ($tutstudentxevaluation->intentos == 0 ))
                                <a href="{{route('evaluacion.dar_permiso',[$tutstudentxevaluation->id_tutstudent,$tutstudentxevaluation->id_evaluation] )}}" title="Otorgar permiso extra" class="btn btn-default btn-xs view-group"">
                                    <i class="fa fa-check"></i>
                                </a>                               
                                @endif
                            </td>
                        </tr>   
                                           
                        @endforeach
                    </tbody>
                </table>                
            </div>             
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a class="btn btn-default pull-left" href="{{ route('evaluacion.index') }}">Regresar</a>
            </div>
                
            </div>
        </div>
    </div>
</div>
@endsection