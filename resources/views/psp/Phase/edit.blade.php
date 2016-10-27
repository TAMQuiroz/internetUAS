@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-title">
        	<div class="title_left">
        		<h3>Editar fase</h3>
        	</div>
        </div>
    </div>
</div>        

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Información</h3>
            </div>
            <div class="panel-body">
            {{Form::open(['route' => ['phase.update',$phase->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

            	<div class="form-group">
                    {{Form::label('Numero *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('numero',$phase->numero,['class'=>'form-control', 'required'])}}
                    </div>
				</div>

                <div class="form-group">
                    {{Form::label('Descripción *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('descripcion',$phase->descripcion,['class'=>'form-control', 'required', 'maxlength' => 100])}}
                    </div>
                </div>
                
                <div class="form-group">
                    {{Form::label('Fecha de Inicio *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::date('fecha_inicio',$phase->fecha_inicio,['class'=>'form-control', 'required'])}}
                    </div>
                </div>  

                <div class="form-group">
                    {{Form::label('Fecha de Fin *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::date('fecha_fin',$phase->fecha_fin,['class'=>'form-control', 'required'])}}
                    </div>
                </div>       

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('phase.index') }}">Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}

            </div>
        </div>
    </div>
</div>
@endsection