@extends('app')
@section('content')
<ul class="tabs-page">
	<div class="tab-page-wrapper active">
  		<li class="tab-page">Citas</li>
	</div>
	<a href="#">
		<div class="tab-page-wrapper">
	  		<li class="tab-page">Temas</li>
		</div>
	</a>
	<a href="#">
		<div class="tab-page-wrapper">
	  		<li class="tab-page">Motivos</li>
		</div>
	</a>
</ul>
<div class="tab-content-container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">General</h3>
                </div>
                <div class="panel-body">
                    {{ Form::open(['route' => ['parametro.update.duration'], 'class'=>'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form::label('Duración de una cita *',null, ['class' => 'control-label col-sm-4']) }}
                        <div class="col-sm-2">
 	                       {{ Form::select('duration', array('0' => '00', '5' => '05', '10' => '10', '15' => '15', '20' => '20', '30' => '30', '60' => '60', '120' => '120'), $duration, ['class' => 'form-control']) }}                    	
                        </div>
                        <div class="col-sm-6 text-left">
                        	{{Form::label('minutos.',null,['class'=>'control-label'])}}
                        </div>
                    </div>
                    <div></div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
		</div>
	</div>
</div>
@endsection