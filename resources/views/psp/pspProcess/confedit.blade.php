@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-title">
        	<div class="title_left">
        		<h3>Actualizar Configuracion</h3>
        	</div>
        </div>
    </div>
</div>        

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Información de la Configuracion Actual</h3>
            </div>
            <div class="panel-body">
            {{Form::open(['route' => ['pspProcess.updateconf',$psp->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

            	<div class="form-group">
                    {{Form::label('Tamaño Maximo de Archivo *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('Tamaño_Maximo_de_Archivo',$psp->max_tam_plantilla,['class'=>'form-control', 'required'])}}
                    </div>
				</div>

                <div class="form-group">
                    {{Form::label('Numero maximo de Plantillas*',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('Numero_maximo_de_Plantillas',$psp->numero_Plantillas,['class'=>'form-control', 'required'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Numero maximo de Fases*',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('Numero_maximo_de_Fases',$psp->numero_Fases,['class'=>'form-control', 'required'])}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('pspProcess.conf') }}">Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}

            </div>
        </div>
    </div>
</div>
@endsection