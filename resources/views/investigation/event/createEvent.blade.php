@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> Nuevo Evento de Investigación</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Información del Evento</h2>
                    <div class="clearfix"></div>
                </div>
                <form action="{{ route('evento.store') }}" method="POST" class="form-horizontal" id="formEvent">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="x_content">

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="eventName" class="form-control col-md-7 col-xs-12" type="text"
                                       name="eventName" maxlength="255" required="required"
                                       onkeypress="return isNumberKey(event)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ubicación <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="eventLocation" class="form-control col-md-7 col-xs-12" type="text"
                                       name="eventLocation" maxlength="255" required="required"
                                       onkeypress="return isNumberKey(event)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha y Hora <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group date' id='eventDate'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#eventDate').datetimepicker();
                                });
                            </script>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Duración <span class="error">*</span></label>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <select name="eventHH" id="eventHH" class="form-control"  title="Horas">
                                  <option value="" selected disabled>Horas</option>
                                  @for ($i= 0; $i<=6; $i++)
                                  <option value="{{$i}}">{{$i}}</option>
                                  @endfor
                                </select>

                                <!--<input id="eventHH" class="form-control col-md-1 col-xs-1" name="value"  placeholder="Horas" />-->
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <!--<input id="eventMM" class="form-control col-md-1 col-xs-1" name="value"  placeholder="Minutos" />-->
                                <select name="eventMM" id="eventMM" class="form-control"  title="Horas">
                                  <option value="" selected disabled>Minutos</option>
                                  @for ($j= 0; $j<=59; $j++)
                                  <option value="{{$j}}">{{$j}}</option>
                                  @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="eventType" id="eventType" class="form-control" required="required">
                                    <option value="" selected disabled="">-- Seleccione --</option>
                                        <option value="0">Público</option>
                                        <option value="1">Privado</option>
                                </select>
                            </div>
                        </div> 


                        </div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <button class="btn btn-success pull-right" type="submit">Guardar</button>
                                <a href="{{ route('evento.index') }}" class="btn btn-default pull-right">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).on('ready',function(){
                $('$eventDate').datetimepicker();   
            });
    </script>

    <script type="text/javascript">
        $(document).on('ready',function(){
            $('#divplan').show();    
        });
    </script>
    <script type="text/javascript">
        $( document ).ready(function(){
            $('#checkboelective').on('click',function(){
                $('#divplan').toggle();
            });
        });
    </script>
    <script src="{{ URL::asset('js/intranetjs/investigation/event/create-event.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/regularprofessors.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/event.js')}}"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>                       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

@endsection