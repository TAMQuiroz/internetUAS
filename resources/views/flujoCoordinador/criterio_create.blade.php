@extends('appWithoutHamburger')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Crear criterio</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Criterio</h2>
                <div class="clearfix"></div>
            </div>
            <form action="{{ route('criterio_store.flujoCoordinador', $idEspecialidad)}}" method="POST" novalidate="true" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="x_content">
                <div class="form-group">
                    <label for="idResultado" class="control-label col-md-3 col-sm-3 col-xs-12">Resultado estudiantil <span class="error">* </span></label>
                    <input id="idResultado" class="form-control col-md-7 col-xs-12" type="hidden" name="idResultado" value="{{ $aspecto->studentsResult->IdResultadoEstudiantil}}" >
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="" class="form-control col-md-7 col-xs-12" type="text" name="" value="{{ $aspecto->studentsResult->Descripcion}}" disabled="true">
                    </div>
                        
                </div>
                
                <div class="form-group">
                    <label for="idAspecto" class="control-label col-md-3 col-sm-3 col-xs-12">Aspecto <span class="error">* </span></label>
                    <input id="idAspecto" class="form-control col-md-7 col-xs-12" type="hidden" name="idAspecto" value="{{ $aspecto->IdAspecto}}" >
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="" class="form-control col-md-7 col-xs-12" type="text" name="" value="{{ $aspecto->Nombre}}" disabled="true">
                    </div>
                        
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción<span class="error">* </span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea required="true" class="resizable_textarea form-control" id="nombre" maxlength="100" name="nombre" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;"></textarea>
                    </div>
                </div>


                <div class="clearfix"></div>
                <div class="separator"></div>

                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                         <button class="btn btn-success pull-right" type="submit"> Guardar</button>
                         <a href="{{ route('criterio_index.flujoCoordinador', $idEspecialidad) }}" class="btn btn-default pull-right"> Cancelar</a>
                    </div>
                </div>

            </div>
            
            </form>
        </div>
    </div>
</div>

@endsection