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
            <div class="x_title">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4>Se encontraron {{count($students)}} alumnos sin tutor</h4>
                        <a href="{{ route('alumno.asignardo') }}" class="btn btn-success pull-right"><i class="fa fa-arrows-alt"></i> Asignar tutores</a>
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
                            <td class=" ">0</td>    
                            <td class=" ">
                                {{Form::text('cant',0,['class'=>'form-control', 'required', 'maxlength' => 50])}}
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