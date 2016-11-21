@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Disponibilidad</h3>
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
                {{Form::open(['route' => ['freeHour.update',$freeHour->id],'class' => ' form-horizontal','id'=>'formSuggestion'])}}
                
                <div class="form-group">
                    {{Form::label('Fecha',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        <input class="form-control" type="text" name="fecha" id="fecha" placeholder="dd-mm-aaaa" minlength="10" maxlength="10" value="{{$freeHour->fecha}}" required/>
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Disponibilidad *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
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
                                    @if($freeHour->hora_ini==$h)
                                    <td class="centered "> {{Form::radio('hora_ini',$h , true, array('class' => 'hora_ini'))}} </td>
                                    @else
                                    <td class="centered "> {{Form::radio('hora_ini',$h , false, array('class' => 'hora_ini'))}} </td>
                                    @endif
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('freeHour.show',$freeHour->id) }}">Cancelar</a>
                    </div>
                </div>

                {{Form::close()}}

            </div>
        </div>
    </div>
{{--<script src="{{ URL::asset('js/myvalidations/freeHour.js')}}"></script>--}}
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