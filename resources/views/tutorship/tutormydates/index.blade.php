@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Mis Citas</h3>
    </div>    
</div>
<div class="row">
    <div class="col-sm-3 col-xs-12">
        <div class="input-group date tutorship-tutor-mydates .prev .next" style="margin-left: auto; margin-right: auto">
        </div>         
    </div>
    <div class="col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-sm-4 col-xs-4">
                <a href="#filter-tutorDates" class="btn btn-warning"><i class="fa fa-filter"></i> Filtrar</a>                
            </div>            
            <div class="col-sm-4 col-xs-4">
                <button class="btn btn-warning pull-right"><i class="fa fa-eye"></i>  Cambiar vista</button>
            </div>
            <div class="col-sm-4 col-xs-4">
                <a href="{{ route('mis_alumnos.index') }}" class="btn btn-submit pull-right"><i class="fa fa-plus"></i>  Nueva cita</a>
            </div>
        </div>
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
                        <td class="text-center">{{$h}}:00 - {{$h+1}}:00</td>
                        @for ($d=1; $d<7; $d++)
                            <td>
                            @if (true)
                                <a href="#" class="btn btn-primary tutorship-dates"> 
                                    hora ini - hora fin Alumno
                                </a>
                            @endif
                            </td>
                        @endfor
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>



        <div class="table-responsive">
        <table class="table table-striped responsive-utilities jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">Estado </th>
                    <th class="column-title">Código </th>
                    <th class="column-title">Hora inicio </th>                    
                </tr>
            </thead>
            <tbody>
                @foreach($tutMeetings as  $key => $tutMeeting)
                <tr class="even pointer">
                    <td hidden class="group-id">{{$tutMeeting->id}}</td>

                    <td class=""><span class="label label-success"> {{ $tutMeeting->estado }} {{$fecha[$key]}} {{$hora[$key]}} {{$hora_inicio[$key]}} {{$hora_fin[$key]}}</span></td>
                    
                    <td class=" ">{{ $tutMeeting->tutstudent->codigo }}</td>                                      

                    <td class=" ">{{ $tutMeeting->inicio }}</td>      
                    
                </tr>
                @endforeach
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
            startDate: "today",
            language: "es",
            autoclose: true,
            todayHighlight: true,
         });

        calendarTutorDates.datepicker('setDate', '');
        calendarTutorDates.children('div').css({ display: 'block'});

        //important classes:  table-condensed

        


    });
</script>
@include('tutorship.modals.filterTutorDates', ['title' => 'Filtrar', 'route' => route('cita_alumno.index')])

@endsection