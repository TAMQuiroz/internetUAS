@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{$evaluation->nombre}} (pendientes)</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">                            
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <col width="15%" >
                    <col width="70%">
                    <col width="25%">
                    <thead>
                        <tr class="headings">                            
                            <th class="centered column-title">N° de referencia</th>
                            <th class="centered column-title">Fecha de registro </th>
                            <th class="centered column-title last">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tutstudentxevaluations as $tutstudentxevaluation)
                        @if(! in_array($tutstudentxevaluation->id,  $arr_no_include ))
                        <tr class="even pointer">                                                   
                            <td class="centered">{{$tutstudentxevaluation->id }}</td>
                            <td class="centered ">{{ date("d/m/Y g:i a", strtotime($tutstudentxevaluation->fecha_hora))}}</td>                                                                                    
                            <td class="centered ">                                
                                <a href="{{route('evaluacion.corregir',[$tutstudentxevaluation->id_tutstudent,$tutstudentxevaluation->id_evaluation])}}" title="Corregir evaluación" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                </a>                               
                            </td>
                        </tr>   
                        @endif                     
                        @endforeach
                    </tbody>
                </table>                
            </div>             
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a class="btn btn-default pull-left" href="{{ route('evaluacion_evaluador.index') }}"><i class="fa fa-backward" aria-hidden="true"></i> Regresar</a>
            </div>
                
            </div>
        </div>
    </div>
</div>
@endsection