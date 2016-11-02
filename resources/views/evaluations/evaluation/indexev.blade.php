@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Mis Evaluaciones por corregir</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">                              
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">                    
                    <col width="20%">
                    <col width="20%">
                    <col width="30%">                    
                    <col width="10%">                                       
                    <col width="20%">
                    <thead>
                        <tr class="headings">                                   
                            <th class="column-title">Código </th>    
                            <th class="column-title">Nombre </th>                                                        
                            <th class="column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluations as  $key => $evaluation)                         
                        <tr class="even pointer">
                            <td class=" ">{{ $evaluation->id}}</td>                                                      
                            <td class=" ">{{ $evaluation->nombre }}</td>                                          
                            <td class="">                                
                                <a href="{{route('evaluacion.ver_evaluaciones_alumnos',$evaluation->id)}}" title="Ver evaluaciones por corregir" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-search"></i>
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