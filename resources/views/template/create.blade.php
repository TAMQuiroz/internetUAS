@extends('app')
@section('content')
<div class="page-title">
	<div class="title_left">
		<h3>Nuevo Documento</h3>
	</div>
</div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Informacion del Documento</h2>
                    <div class="clearfix"></div>
                </div>

                    <div class="x_content">
                    {{Form::open(['route' => 'store.template', 'files'=>true, 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                    	<div class="form-group">
                            {{Form::label('Fase *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
							<div class="col-md-6 col-sm-6 col-xs-12">
								{{Form::select('fase', [1=>'1',2=>'2'], null, ['class' => 'form-control', 'required'])}}                              
							</div>
						</div>
                        <div class="form-group">
                            {{Form::label('Titulo *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::text('titulo',null,['class'=>'form-control', 'required', 'maxlength' => 100])}}
                            </div>                            
                        </div>

                        <div class="form-group">
                            {{Form::label('ruta',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            {{Form::file('ruta', ['class'=>'form-control','required'])}} 
                            </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('Obligatorio *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                            <div class="col-md-1 col-sm-1 col-xs-12">
                            {{Form::checkbox('obligatorio',1,false, ['class' => 'form-control'])}}
                            </div>                            
                        </div>     

                        <div class="clearfix"></div>
                        <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                                <a href="{{ route('index.templates') }}" class="btn btn-default pull-right"> Cancelar</a>
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>

            </div>
        </div>
    </div>

@endsection