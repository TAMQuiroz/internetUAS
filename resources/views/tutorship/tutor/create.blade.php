@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Nuevo tutor</h3>
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
        {{Form::open(['route' => ['tutor.store'], 'class'=>'', 'id'=>'formulario'])}}
            <div class="x_title">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href=" " class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                    </div>
                </div>

                <div class="x_content">
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Código </th>
                            <th class="column-title">Apellidos y Nombres </th>                            
                            <th class="column-title last">Seleccionar</th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody> 
                    <input type="checkbox" id="user_project_1" name="check[4]" value="1" />                   
                        @foreach($teachers as $index=>$teacher)  
                        
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $teacher->IdDocente }}</td> 
                            <td class="">{{ $teacher->Codigo }}</td>
                            <td class="">{{ $teacher->ApellidoPaterno.' '.$teacher->ApellidoMaterno.', '.$teacher->Nombre }}</td>                            
                            <!-- <td class="">                                
                                {{Form::checkbox('check['.$teacher->IdDocente.']',1 , false, array('class' => 'check'))}}
                            </td> -->
                            <td class="">  
                                <input type="checkbox" id="user_project_1" name="check1" value="1" />                              
                                <!-- {{Form::checkbox('check',1 , false, array('class' => 'check'))}} -->
                            </td>

                        </tr>                        
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                    <a class="btn btn-default pull-right" href="{{ route('tutor.index') }}">Cancelar</a>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection