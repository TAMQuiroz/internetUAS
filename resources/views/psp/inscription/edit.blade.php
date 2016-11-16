@extends('app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-title">
        	<div class="title_left">
        		<h3>Editar información de Empresa</h3>
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
            {{Form::open(['route' => ['inscription.update',$inscription->id], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

            	<div class="form-group">
                    {{Form::label('Actividades formativas *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('activ_formativas',$inscription->activ_formativas,['class'=>'form-control', 'required','maxlength' => 1000])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Actividad económica *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('actividad_economica',$inscription->actividad_economica,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Condiciones de seguridad area *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('cond_seguridad_area',$inscription->cond_seguridad_area,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Correo jefe directo *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('correo_jefe_directo',$inscription->Correo_jefe_directo,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <!--
                <div class="form-group">
                    {{Form::label('debe_modificarse *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('debe_modificarse',null,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>
                -->


                <div class="form-group">
                    {{Form::label('Distrito de la empresa *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('distrito_empresa',$inscription->distrito_empresa,['class'=>'form-control', 'required','maxlength' => 500])}}
                    </div>
                </div>
                
                <div class="form-group">
                    {{Form::label('Direccion empresa *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('direccion_empresa',$inscription->direccion_empresa,['class'=>'form-control', 'required','maxlength' => 500])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Equipo del practicante *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('equi_del_practicante',$inscription->equi_del_practicante,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Equipamiento area *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('equipamiento_area',$inscription->equipamiento_area,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Fecha inicio *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::date('fecha_inicio',$inscription->fecha_inicio,['class'=>'form-control', 'required'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Fecha recepción convenio *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::date('fecha_recep_convenio',$inscription->fecha_recep_convenio,['class'=>'form-control', 'required'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Fecha de termino *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::date('fecha_termino',$inscription->fecha_termino,['class'=>'form-control', 'required'])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Jefe directo auxiliar *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('jefe_directo_aux',$inscription->jefe_directo_aux,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Nombre de area *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('nombre_area',$inscription->nombre_area,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Personal de area *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('personal_area',$inscription->personal_area,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Puesto *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('puesto',$inscription->puesto,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Razon social *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('razon_social',$inscription->razon_social,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('Teléfono jefe directo *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('telef_jefe_directo',$inscription->telef_jefe_directo,['class'=>'form-control', 'required'])}}
                    </div>
                </div>

                 <div class="form-group">
                    {{Form::label('Ubicacion área *',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
                    <div class="col-md-4">
                        {{Form::text('ubicacion_area',$inscription->ubicacion_area,['class'=>'form-control', 'required','maxlength' => 200])}}
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="tcomentariol" class="control-label col-md-4 col-sm-3 col-xs-12">Recomendaciones</label>
                    <div class="col-md-4">
                    <textarea id=recomendaciones type="text" class="form-control" disabled name="" value=""><?php echo htmlspecialchars($inscription->recomendaciones); ?></textarea>
                    </div>
                </div>                

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                        <a class="btn btn-default pull-right" href="{{ route('inscription.index') }}">Cancelar</a>
                    </div>
                </div>

          
                {{Form::close()}}

            </div>
        </div>
    </div>
</div>
@endsection