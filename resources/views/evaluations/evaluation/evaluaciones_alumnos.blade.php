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
                    
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Evaluación </th>                                                    
                            <th class="column-title">Fecha corrección </th>                            
                            <th class="column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tutstudentxevaluations as $tutstudentxevaluation)
                        <tr class="even pointer">                                                   
                            <td class=" ">{{$tutstudentxevaluation->id }}</td>
                            <td class=" ">-</td>                                                                                    
                            <td class="">                                
                                <a href="{{route('evaluacion.corregir',[$tutstudentxevaluation->id_tutstudent,$tutstudentxevaluation->id_evaluation])}}" title="Corregir" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>                               
                            </td>
                        </tr>                        
                        @endforeach
                    </tbody>
                </table>                
            </div>             
            
        </div>
    </div>
</div>
@endsection