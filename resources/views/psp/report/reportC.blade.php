@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Reporte de Alumnos por Criterios de PSP</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>

                {{Form::open(['route' => 'reportC.generate','class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

                <div class="form-group">
                        {{Form::label('Curso de PSP*',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                        <div class="col-md-4 col-sm-4 col-xs-12">
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

                    <a href="{{route('reportC.genPDF')}}">
                     {{Form::button('<i class="fa fa-pdf"></i> Exportar a PDF',['class'=>'btn btn-success pull-right'])}}
                    </a>

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
                        <th class="column-title">Alumno</th>
                        <th class="column-title">Criterio</th>
                        <th class="column-title">Nota de Criterio</th>          
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reporte as $rep)
                        <tr> 
                            <td>{{$rep->PspStudent->Student->Codigo}}</td>
                            <td>{{$rep->PspStudent->Student->Nombre.' '.$rep->PspStudent->Student->ApellidoPaterno.' '.$rep->PspStudent->Student->ApellidoMaterno}}</td> 
                            <td>{{$rep->Pspcriterio->nombre}}</td> 
                            <td>{{$rep->nota}}
                        </tr> 
                    @endforeach
                    </tbody>
                </table>
        @endif

    </div>
@endsection