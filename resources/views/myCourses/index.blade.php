@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{ $title }}</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            @if ($currentCycle != null)

            <div class="x_title">
              <h2> Cursos del Ciclo Actual: {{ $currentCycle->academicCycle->Descripcion }}</h2>
              <div class="clearfix"></div>
          </div>

          <table class="table table-striped responsive-utilities jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">Clave</th>
                    <th class="column-title">Curso</th>
                    <th class="column-title">Horario</th>
                    <th class="column-title last">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timeTables as $tt)
                <tr class="even pointer">
                    <td class=" ">{{ $tt->courseXCicle->course->Codigo }}</td>
                    <td class=" ">{{ $tt->courseXCicle->course->Nombre }}</td>
                    <td class=" ">{{ $tt->Codigo }}</td>
                    <td class=" ">
                        @if($tt->courseXCicle->Evaluado == 1)
                        @if(in_array(36, Session::get('actions')))
                        <a class="btn btn-primary btn-xs" href="{{ route('tableView.myCourses', ['id' => $tt->IdHorario]) }}" title="Tabla de Desempeño"><i class="fa fa-file-excel-o"></i></a>
                        @endif                  

                        @if(in_array(37, Session::get('actions')))
                        <a class="btn btn-primary btn-xs view-myCourses" href="{{ route('reportView.myCourses', ['id' => $tt->IdHorario]) }}" title="Informe de Curso"><i class="fa fa-file-text"></i></a>
                        @endif
                        @endif

                        @if($tt->courseXCicle->Evaluado == 1)
                        @if(in_array(38,Session::get('actions')))
                        <a class="btn btn-primary btn-xs loadStudents-myCourses" href="{{ route('load.students', ['id' => $tt->IdHorario]) }}" title="Cargar Alumnos"><i class="fa fa-group"></i></a>
                        @endif
                        @endif

                        @if(in_array(39,Session::get('actions')))
                        <a class="btn btn-primary btn-xs uploadEvidence-myCourses" href="{{ route('upload.evidences', ['id' => $tt->IdHorario]) }}" title="Subir Evidencias del Curso"><i class="fa fa-upload"></i></a>
                        @endif

                        @if($tt->courseXCicle->Evaluado == 1)
                        @if(in_array(40,Session::get('actions')))
                        <a class="btn btn-primary btn-xs" href="{{ route('uploadMeasuring.evidences', ['id' => $tt->IdHorario]) }}" title="Subir Evidencias de Medición"><i class="fa fa-cloud-upload"></i></a>
                        @endif
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            @endif

            <div class="x_title">
              <h2> Ver Cursos Históricos de Ciclos Regulares </h2>
              <div class="clearfix"></div>
          </div>

          <div class="form-group">
                <label>
                  @foreach ($cycles as $cycle)
                      @if($currentCycle == null or ( $currentCycle!=null and  $currentCycle->academicCycle->Descripcion!=$cycle->academicCycle->Descripcion) )
                        <a class="cycle">{{$cycle->academicCycle->Descripcion}}</a>
                        @endif
                  @endforeach
              </label>
          </div>

          <div class="form-group" hidden="true" id="cycleSelected">
                <label> Cursos del Ciclo: </label>
                <label id="current"> </label>
          </div>

          <table class="table table-striped responsive-utilities jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">Clave</th>
                    <th class="column-title">Curso</th>
                    <th class="column-title">Horario</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($timeTablesAll as $tt)
                @if ($currentCycle == null)
                <tr class="even pointer timeTableByCycle {{ $tt->courseXCicle->cicle->academicCycle->Descripcion }}" hidden="true">
                    <td class=" ">{{ $tt->courseXCicle->course->Codigo }}</td>
                    <td class=" ">{{ $tt->courseXCicle->course->Nombre }}</td>
                    <td class=" ">{{ $tt->Codigo }}</td>                    
                </tr>
                @elseif($tt->courseXCicle->cicle->IdCicloAcademico !=  $currentCycle->IdCicloAcademico )
                <tr class="even pointer timeTableByCycle {{ $tt->courseXCicle->cicle->academicCycle->Descripcion }}" hidden="true">
                    <td class=" ">{{ $tt->courseXCicle->course->Codigo }}</td>
                    <td class=" ">{{ $tt->courseXCicle->course->Nombre }}</td>
                    <td class=" ">{{ $tt->Codigo }}</td>                    
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>

<script type="text/javascript">
    $( document ).ready(function(){
        $('.cycle').on('click',function(){
            var cycle = $(this).text();
            $('#current').text(cycle);
            $('#cycleSelected').attr("hidden", false);
            $('.timeTableByCycle').attr("hidden", true);
            $('.' + cycle).attr("hidden", false);
        });
    });
</script>

@endsection