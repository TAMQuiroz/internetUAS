@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Mis Citas</h3>
    </div>    
</div>
<div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="input-group date tutorship-tutor-mydates .prev .next" style="margin-left: auto; margin-right: auto">
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="row">      
                    <div class="col-sm-12 col-xs-12 text-center" style="margin-top: 30px;">
                        <a href="{{ route('cita_alumno.index_table')}}" class="btn btn-default">
                            <i class="fa fa-eye"></i>  Cambiar vista
                        </a>
                    </div>
                    <div class="col-sm-12 col-xs-12 text-center" style="margin-top: 20px;">
                        <a href="{{ route('atencion_sin_cita.create')}}" class="btn btn-primary">
                            <i class="fa fa-database"></i>  Atención sin cita
                        </a>
                    </div>
                    <div class="col-sm-12 col-xs-12 text-center" style="margin-top: 20px;">
                        <a href="{{ route('mis_alumnos.index') }}" class="btn btn-success"><i class="fa fa-plus"></i>  Nueva cita</a>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <ul class="dates-guide">
                            <li><i class="fa fa-square" style="color: #ff9800;"></i> Pendiente</li>
                            <li><i class="fa fa-square" style="color: #26a69a;"></i> Confirmada</li>
                            <li><i class="fa fa-square" style="color: #d9534f;"></i> Cancelada</li>
                            <li><i class="fa fa-square" style="color: #ffeb3b;"></i> Sugerida</li>
                            <li><i class="fa fa-square" style="color: #9e9e9e;"></i> Rechazada</li>
                            <li><i class="fa fa-square" style="color: #4051b5;"></i> Asistida</li>
                            <li><i class="fa fa-square" style="color: #4caf50;"></i> No asistida</li>
                        </ul>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered responsive-utilities jambo_table bulk_action">
                <thead>
                    <tr class="headings">
                        <th class="column-title text-center">Horas</th>
                        <th class="column-title text-center">Lunes</th>
                        <th class="column-title text-center">Martes</th>
                        <th class="column-title text-center">Miércoles</th>
                        <th class="column-title text-center">Jueves</th>
                        <th class="column-title text-center">Viernes</th>
                        <th class="column-title text-center">Sábado</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($h=8; $h<22; $h++)
                    <tr>
                        <td class="text-center date-card-hour">
                                {{$h}}:00 - {{$h+1}}:00
                        </td>
                        @for ($d=1; $d<7; $d++)
                            <td class="dates-card-info-container">
                            @if ($schedule[$h][$d] == -1)
                                <div class="text-right">
                                    <a href="#" class="btn btn-info btn-add-new-date">
                                        <i class="fa fa-plus"></i> 
                                    </a>
                                </div>
                            @endif
                            @foreach($tutMeetings as $key => $meeting)
                                @if ($fecha[$key] == $d && $hora[$key] == $h)
                                    <a href="#" class="btn btn-primary color-status-{{$meeting->estado}} tutorship-dates"> 
                                        <div class="dates-card-info text-left">
                                            {{$hora_inicio[$key]}} - {{$hora_fin[$key]}} <br>
                                            {{$students[$key]}}
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                            </td>
                        @endfor
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var today = new Date();

        var calendarTutorDates = $(".input-group.date.tutorship-tutor-mydates");

        calendarTutorDates.datepicker({
            format: "dd-mm-yyyy",
            startDate: "{{$startDay}}",
            endDate: "{{$endDay}}",
            language: "es",
            autoclose: true,
            todayHighlight: false,
         });

        calendarTutorDates.datepicker('setDate', "{{$currentDay}}");
        calendarTutorDates.children('div').css({ display: 'block'});

        calendarTutorDates.datepicker().on('changeDate', function (ev) {
            curr = $(this).datepicker('getDate');
            var first = curr.getDate() - curr.getDay();
            var firstday = new Date(curr.setDate(first));
            var dateBegin = firstday.getDate() + '-' + 
                            (firstday.getMonth() + 1) + '-' + 
                            firstday.getFullYear();
            window.location     = "{{ route('cita_alumno.index') }}" + 
                                '?beginDate=' + dateBegin;
        });
    });
</script>

@endsection