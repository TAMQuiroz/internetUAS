@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Reporte de Porcentaje de Asistencia de Alumnos a las Reuniones </h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>

                {{Form::open(['route' => 'attendanceRate.generate','class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

                <div class="form-group">
                        {{Form::label('Curso de PSP*',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="Proceso_de_Psp" id="Proceso_de_Psp" class="form-control" required="required">
                            @if($pspproc!=null)
                                @foreach( $pspproc as $psp)
                                    @if($psp!=null)
                                    <option value="{{$psp->id}}">{{$psp->Course->Nombre}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>                             
                    </div>
                    {{Form::submit('Generar Reporte', ['class'=>'btn btn-success pull-right'])}}
                </div>

                {{Form::close()}}

            </div>
        </div>

        @if($reporte!=null)
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Codigo</th>
                        <th class="column-title">Supervisor</th>
                        <th class="column-title">Porcentaje de asistencia</th>          
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supervisors as $key => $sup)
                        <tr> 
                            <td>{{$sup->codigo_trabajador}}</td>
                            <td>{{$sup->nombres.' '.$sup->apellido_paterno.' '.$sup->apellido_materno}}</td> 
                            <td>{{$reporte[$key].' %'}}</td>                             
                        </tr> 
                    @endforeach
                    </tbody>
                </table>
        @endif

    </div>
@endsection