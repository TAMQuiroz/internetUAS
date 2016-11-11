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
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">                    
                    <col width="50%">
                    <col width="10%">
                    <thead>
                        <tr class="headings">                            
                            <th class="centered column-title">N° referencia</th>
                            <th class="centered column-title">Fecha registro </th>                            
                            <th class="centered column-title">Inicio </th>                            
                            <th class="centered column-title">Fin </th>                            
                            <th class="column-title">Código - Alumno </th>
                            <th class="centered column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tutstudentxevaluations as $tutstudentxevaluation)                        
                        <tr class="even pointer">                                                   
                            <td class="centered ">{{$tutstudentxevaluation->id }}</td>
                            <td class="centered ">{{ date("d/m/Y", strtotime($tutstudentxevaluation->inicio))}}</td>
                            <td class="centered ">{{ date("g:i a", strtotime($tutstudentxevaluation->inicio))}}</td>
                            
                            @if($tutstudentxevaluation->fecha_hora != null) 
                            <td class="centered ">{{ date("g:i a", strtotime($tutstudentxevaluation->fecha_hora))}}</td>
                            @else
                            <td class="centered ">-</td>
                            @endif

                            <td class=" ">{{ $tutstudentxevaluation->alumno->codigo.' - '.$tutstudentxevaluation->alumno->ape_paterno.' '.$tutstudentxevaluation->alumno->ape_materno.', '.$tutstudentxevaluation->alumno->nombre  }}</td>                                                                                    
                            <td class="centered">  
                                @if(! is_null($tutstudentxevaluation->fecha_hora)  )               
                                <a href="{{route('evaluacion_corregida.show',$tutstudentxevaluation->id)}}" title="Visualizar evaluación" class="btn btn-primary btn-xs view-group"">
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
                    @if($completo == true)
                    <a class="btn btn-primary pull-right" href="{{ route('evaluacion_resultados.index',$evaluation->id) }}">Ver resultados <i class="fa fa-file-text"></i></a>
                    @endif
                    <a class="btn btn-default pull-right" href="{{ route('evaluacion.index') }}"><i class="fa fa-backward" aria-hidden="true"></i> Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection