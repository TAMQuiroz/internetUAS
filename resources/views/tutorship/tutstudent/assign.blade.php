@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Asignar tutor a alumnos de {{Session::get('faculty-name')}}</h3>
    </div>
    
</div>
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
    {{Form::open(['route' => ['alumno.asignardo'], 'class'=>'', 'id'=>'formulario'])}}
        <div class="x_title">

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4>Se encontraron {{count($students)}} alumnos sin tutor</h4>
                    {{Form::text('total',count($students), ['class'=>'','hidden'])}}

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">                    
                    {{Form::submit('Asignar tutores', ['class'=>'btn btn-success pull-right'])}}

                    <a href="{{ route('alumno.index') }}" class="btn btn-default pull-right"><i class=""></i> Regresar</a>
                </div>
            </div>

            <div class="x_content">
                <div class="clearfix"></div>
            </div>
            <table class="table table-striped responsive-utilities jambo_table bulk_action">
                <thead>
                    <tr class="headings">                            
                        <th class="column-title">Código </th>
                        <th class="column-title">Tutor </th>                        
                        <th class="column-title">Horas a la semana</th>                        
                        <th class="column-title">Cantidad actual </th>
                        <th class="column-title last">A asignar</th>                            
                    </tr>
                </thead>
                <tbody>
                    @foreach($tutors as $tutor)
                    <tr class="even pointer">
                        <td hidden class="group-id">{{ $tutor->IdDocente }}</td>
                        <td class=" ">{{ $tutor->Codigo }}</td>
                        <td class=" ">{{ $tutor->ApellidoPaterno.' '.$tutor->ApellidoMaterno.', '.$tutor->Nombre }}</td>                            
                        <td class=" ">-</td>                            
                        <td class=" ">{{count($tutor->tutorships)}}</td>    
                        <td class=" ">
                            {{Form::number('cant['.$tutor->IdDocente.']',0,['class'=>'form-control', 'required','min'=>'0', 'maxlength' => 50])}}
                        </td>
                    </tr>                        
                    @endforeach
                </tbody>
            </table>

        </div>
        {{Form::close()}}
    </div>
</div>
</div>
@endsection