@extends('app')
@section('content')
<div class="page-title">
	<div class="title_left">
		<h3>Subir Documentos</h3>
	</div>
</div>

<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            

                <div class="separator"></div>
                <h4>Detalle de Documento</h4>
                <br/>
                <div class="clearfix"></div>   
                    {{Form::open(['route' => ['pspDocument.updateC', $pspDocument->id], 'files'=>true, 'class'=>'form-horizontal col-md-8', 'id'=>'formSuggestion'])}}  
                        
                        <div class="form-group">
                            <label for="fasel" class="control-label col-md-3 col-sm-3 col-xs-12">Fase</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <select name="fase" disabled class="form-control">
                                <option value="first">{{$pspDocument->numerofase}}</option>
                            </select>   
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="titulol" class="control-label col-md-3 col-sm-3 col-xs-12">Titulo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id=titulo type="text" class="form-control" disabled name="" value="<?php echo htmlspecialchars($pspDocument->titulo_plantilla); ?>"/>
                            </div>
                        </div>
                        @if($pspDocument->es_fisico==0)
                        <div class="form-group">
                            <label for="plantillal" class="control-label col-md-3 col-sm-3 col-xs-12">Plantilla</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id=plantilla type="text" class="form-control" disabled name="" value="<?php echo htmlspecialchars($pspDocument->ruta_plantilla); ?>"/>
                            </div>
                            <a class="btn btn-primary btn-xs" href="{{route('getentry.template', $pspDocument->idtemplate)}}" title="Descargar Plantilla"><i class="fa fa-download"></i></a>
                        </div>

                        <div class="form-group">
                            <label for="documetnol" class="control-label col-md-3 col-sm-3 col-xs-12">Documento</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id=documento type="text" class="form-control" disabled name="" value="<?php echo htmlspecialchars($pspDocument->ruta); ?>"/>
                            @if($pspDocument->ruta!=null)
                            </div>
                            <a class="btn btn-primary btn-xs" href="{{route('getentry.pspDocument', $pspDocument->id)}}" title="Descargar Documento"><i class="fa fa-download"></i></a>
                            @endif                            
                        </div>
                        @endif 
                        <div class="form-group">
                            <div  class="col-md-12 col-sm-12 col-xs-12">
                            <label for="obligatoriol" class="control-label col-md-3 col-sm-3 col-xs-12">Obligatorio</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            @if($pspDocument->es_obligatorio=='s')
                                <input id=obligatorio type="checkbox" class="form-control" disabled name="" checked="true"/>
                            @else
                                <input id=obligatorio type="checkbox" class="form-control" disabled name="" />
                            @endif                            
                            </div>
                            </div>
                        </div>

                         <div class="form-group">
                            {{Form::label('Comentario *',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{Form::textArea('observaciones',$pspDocument->observaciones,['class'=>'form-control','required','maxlength' => 64])}}
                            </div>                            
                        </div>


                        <div class="form-group">
                            <label for="estadol" class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            @if($pspDocument->idtipoestado==3)
                                <select name="estado" disabled class="form-control">
                                <option value="first">No Subido</option>
                                </select> 
                            @elseif($pspDocument->idtipoestado==4)
                                <select name="estado" disabled class="form-control">
                                <option value="first">Subido</option>
                                </select> 
                            @elseif($pspDocument->idtipoestado==5)
                                <select name="estado" disabled class="form-control">
                                <option value="first">Revisado</option>
                                </select>  
                            @endif                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fechal" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Limite</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id=fecha type="text" class="form-control" disabled name="" value="<?php echo htmlspecialchars($pspDocument->fecha_limite); ?>"/>

                            </div>
                        </div>                        

                    <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
                                <a href="" onclick="javascript:history.back()" class="btn btn-default pull-right"> Cancelar</a>
                            </div>
                        </div>
                    {{Form::close()}}
                               

            </div>
        </div>
    </div>
<script src="{{ URL::asset('js/myvalidations/pspDocumentsRev.js')}}"></script>
@endsection