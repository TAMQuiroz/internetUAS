@extends('app')
@section('content')
    <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Reporte de avance de tablas de desempeno</h3>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <div class="form-horizontal">
                    <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Ciclo Academico Actual: {{ $current->academicCycle->Descripcion }} </label>

                    </div>
                </div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Nro. </th>
                        <th class="column-title">Nombre </th>
                        <th class="column-title last">Codigo / Curso</th>
                        <th class="column-title last">Horario</th>
                        <th class="column-title last">Cumplio</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    <?php $j=0 ?>
                    @if($schedules != null)
                        @foreach($schedules as $schedule)
                            <tr class="even pointer">
                                @foreach($schedule->professors as $professor)
                                    <td class=" ">{{ $i }}</td>
                                    <td class=" ">
                                        {{ $professor->Nombre . " ".  $professor->ApellidoPaterno }}
                                    </td>
                                    <td class=" ">
                                        {{ $schedule->coursexcycle->course->Codigo . "/". $schedule->coursexcycle->course->Nombre}}
                                    </td>
                                    <td class=" ">{{ $schedule->Codigo }}</td>
                                    <td class=" "> {{ $progress[$j] . "%" }}</td>
                                    @break
                                @endforeach
                            </tr>
                            <?php ++$i ?>
                            <?php ++$j ?>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="{{ URL::asset('js/intranetjs/consolidated/evaluation-status-index-script.js')}}"></script>
@endsection