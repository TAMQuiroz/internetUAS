@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Crear Reunion</h3>
            </div>
        </div>
    </div>
</div>

<div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                {{Form::open(['route' => 'meeting.storeSup','class' => ' form-horizontal','id'=>'formSuggestion'])}}
                    
                {{--Combo box tipo de reunion jefe/supervisor --}}
                <div class="form-group">
                    {{Form::label('Tipo de reunion',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        <select name="tiporeunion" id="tiporeunion" class="form-control" required="required">
                            <option value="">-- Seleccione --</option>
                            <option value="1">Supervisor - Alumno</option>
                            <option value="2">Supervisor - Jefe</option>                           
                        </select>  
                    </div>                                   
                </div>

                <div class="form-group">
                    {{Form::label('Fecha',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        <input class="form-control" type="text" name="fecha" id="fecha" placeholder="dd-mm-aaaa" minlength="10" maxlength="10" value="" required/>
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Hora inicio *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="centered column-title">Hora</th>
                                    <th class="centered column-title"></th>                                        
                                </tr>
                            </thead>
                            <tbody>
                                @for ($h=8; $h<22; $h++)
                                <tr class="even pointer">                                                                     
                                    <td class="centered ">{{$h}}:00 hs</td>
                                    <td class="centered "> {{Form::radio('hora_inicio',$h , false, array('class' => 'hora_inicio'))}} </td>                                                    
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

                {{--Ir a la lista de alumnos--}}
                <div class="form-group">
                    {{Form::label('Alumno',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        <select name="alumno" id="alumno" class="form-control" required="required">
                            <option value="" selected>-- Seleccione --</option>
                            @foreach( $students as $student)                                
                                <option value="{{$student->IdAlumno}}">{{$student->Nombre.' '.$student->ApellidoPaterno.' '.$student->ApellidoMaterno}}</option>                                
                            @endforeach
                        </select>     
                    </div>                    
                </div>
                
                <div class="form-group">
                    {{Form::label('Lugar',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('lugar',$lugar,['class'=>'form-control'])}}    
                    </div>                    
                </div>


                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{route('meeting.indexSup')}}">Cancelar</a>
                    </div>
                </div>

                {{Form::close()}}

            </div>
        </div>
    </div>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
        $(function () {
            var today = new Date();

            $("#fecha").datepicker({
                format: "dd-mm-yyyy",                                                                
                startDate: "today",
                language: "es",                
                todayHighlight: true,
            });

        
        });
    </script>

@endsection