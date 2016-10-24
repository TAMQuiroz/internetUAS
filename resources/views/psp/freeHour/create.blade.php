@extends('app')
@section('content')
<div class="page-title">
	<div class="title_left">
		<h3>Nuevo Disponibilidad</h3>
	</div>
</div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <form  class="form-horizontal" id="formUser" novalidate="true">
                <!--<form action="{{ route('supervisor.store') }}" method="POST" class="form-horizontal" id="formUser" novalidate="true">-->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="x_content">
                    	<div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Reunion <span class="error"> </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="hall" id="hall" value="Seleccionar">
                                    <option>Seleccionar</option>
                                </select>                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">                        
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha <span class="error"> </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" name="fecha">                              
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Hora <span class="error"> </span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="hall" id="hall" value="Seleccionar">
                                    <option>Elige Hora</option>
                                    <option>10:00-11:00</option>
                                    <option>11:00-12:00</option>
                                    <option>12:00-13:00</option>
                                    <option>13:00-14:00</option>
                                </select>                                
                            </div>
                        </div>
                             

                        <div class="clearfix"></div>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <button class="btn btn-success pull-right" name="btnSave" type="submit">Guardar</button>
                                <a href="{{ route('freeHour.index') }}" class="btn btn-default pull-right"> Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection