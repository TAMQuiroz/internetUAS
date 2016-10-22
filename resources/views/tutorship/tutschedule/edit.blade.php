@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Perfil</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Perfil</h3>
            </div>

            <div class="panel-body">

                {{Form::open(['route' => ['disponibilidad.update',$teacher->IdDocente], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                <div class="form-group">
                    {{Form::label('Teléfono *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('telefono',$teacher->telefono,['class'=>'form-control', 'required', 'maxlength' => 50])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Oficina *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('oficina',$teacher->oficina,['class'=>'form-control', 'required', 'maxlength' => 50])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Anexo *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('anexo',$teacher->anexo,['class'=>'form-control', 'required', 'maxlength' => 50])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Disponibilidad *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">&nbsp;&nbsp;&nbsp;&nbsp;Hora&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th class="column-title">Lunes </th>
                                    <th class="column-title">Martes</th> 
                                    <th class="column-title">Miércoles </th>
                                    <th class="column-title">Jueves</th>
                                    <th class="column-title">Viernes</th>
                                    <th class="column-title">Sábado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="even pointer">                                                                     
                                    <td class=" ">8:00 am</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                             
                                </tr>   
                                <tr class="even pointer">                                                                     
                                    <td class=" ">9:00 am</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                             
                                </tr>   
                                <tr class="even pointer">                                                                     
                                    <td class=" ">10:00 am</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                             
                                </tr>   
                                <tr class="even pointer">                                                                     
                                    <td class=" ">11:00 am</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                             
                                </tr>   
                                <tr class="even pointer">                                                                     
                                    <td class=" ">12:00 pm</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                              
                                </tr>   
                                <tr class="even pointer">                                                                     
                                    <td class=" ">1:00 pm</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                             
                                </tr>   
                                <tr class="even pointer">                                                                     
                                    <td class=" ">2:00 pm</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                              
                                </tr>   
                                <tr class="even pointer">                                                                     
                                    <td class=" ">3:00 pm</td>                                    
                                    <<td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                              
                                </tr>   
                                <tr class="even pointer">                                                                     
                                    <td class=" ">4:00 pm</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                             
                                </tr>  
                                <tr class="even pointer">                                                                     
                                    <td class=" ">5:00 pm</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                             
                                </tr>  
                                <tr class="even pointer">                                                                     
                                    <td class=" ">6:00 pm</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                              
                                </tr> 
                                <tr class="even pointer">                                                                     
                                    <td class=" ">7:00 pm</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                              
                                </tr>  
                                <tr class="even pointer">                                                                     
                                    <td class=" ">8:00 pm</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                              
                                </tr>  
                                <tr class="even pointer">                                                                     
                                    <td class=" ">9:00 pm</td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                    
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                     
                                    <td class=" "> {{Form::checkbox('name', 'value')}} </td>                                                                                                              
                                </tr>  
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('No Disponibilidad *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('disponibilidad.index') }}">Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}

            </div>


        </div>
    </div>
</div>

<!-- <script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script> -->

@endsection