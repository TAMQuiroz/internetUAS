@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <h3>Grupo de investigación</h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Informacion del Grupo</h3>
            </div>

            <div class="panel-body">
                <div class="form-horizontal col-xs-12 col-md-8">
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input id="group-code" class="form-control col-md-7 col-xs-12" type="text" name="group-code" value="{{ $group->id }}" readonly="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error"> * </span></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input id="group-name" class="form-control col-md-7 col-xs-12" type="text" name="group-name" value="{{ $group->nombre }}" maxlength="100" required="required" readonly="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Especialidad <span class="error">*</span></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input id="facultyName" class="form-control col-md-7 col-xs-12" type="text" name="facultyName" value="{{ $group->faculty->Nombre }}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <textarea class="resizable_textarea form-control" id="groupDescription" maxlength="200" readonly="" name="groupDescription" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;">{{$group->descripcion}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Lider <span class="error">*</span></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            {{Form::text('lider', $group->leader->Nombre.' '.$group->leader->ApellidoPaterno.' '.$group->leader->ApellidoMaterno, ['class'=>'form-control','readonly'])}}
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-11 col-sm-12 col-xs-12">
                            <a href="{{route('grupo.edit', $group->id)}}">
                                <button class="btn btn-success submit pull-right" type="submit">Editar</button>
                            </a>
                            <a href="{{ route('grupo.index') }}" class="btn btn-default pull-right"> Regresar</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-4">
                    <div class="row">
                        Imagen del grupo:
                    </div>
                    <div class="row">
                        @if($group->imagen)
                        {{Html::image(asset($group->imagen), null, ['class'=>'img-thumbnail'])}}
                        @endif
                    </div>
                </div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Integrantes del Grupo</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                        <thead> 
                            <tr class="headings"> 
                                <th>Nombre</th> 
                                <th>Apellido Paterno</th> 
                                <th>Apellido Materno</th> 
                                <th>Especialidad</th> 
                                <th>Tipo de integrante</th>
                                <th colspan="2">Acciones</th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            @foreach($integrantes as $integrante)
                                @if(isset($integrante->id))
                                    <tr> 
                                        <td>{{$integrante->nombre}}</td> 
                                        <td>{{$integrante->ape_paterno}}</td> 
                                        <td>{{$integrante->ape_materno}}</td> 
                                        <td>{{$integrante->faculty->Nombre}}</td>
                                        <td>Investigador</td>
                                        <td>
                                            <a href="{{route('investigador.show', $integrante->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr> 
                                @elseif(isset($integrante->IdDocente))
                                    <tr> 
                                        <td>{{$integrante->Nombre}}</td> 
                                        <td>{{$integrante->ApellidoPaterno}}</td> 
                                        <td>{{$integrante->ApellidoMaterno}}</td> 
                                        <td>{{$integrante->faculty->Nombre}}</td>
                                        <td>Profesor</td>
                                        <td></td>
                                    </tr> 
                                @endif
                            @endforeach

                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection