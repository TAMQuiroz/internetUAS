@extends('app')
@section('content')

<div class="page-title">
    <div class="title_left">
        <h3>Nueva Cita</h3>
    </div>
</div>

<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>


                {{Form::open(['route' => 'meeting.store','class' => ' form-horizontal','id'=>'formSuggestion'])}}
                    
                <div class="form-group">
                    {{Form::label('Cita',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4 col-sm-6 col-xs-12">
                                <select name="disponibilidad" id="disponibilidad" class="form-control" required="required">
                                    @foreach( $freeHours as $hora)
                                        <option value="{{$hora->id}}">{{$hora->fecha.' - '.$hora->hora_ini.' - '.$hora->supervisor->nombres.' '.$hora->supervisor->apellido_paterno}}</option>
                                    @endforeach
                                </select>                             
                     </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('meeting.index') }}">Cancelar</a>
                    </div>
                </div>

                {{Form::close()}}


            </div>
        </div>
    </div>

@endsection