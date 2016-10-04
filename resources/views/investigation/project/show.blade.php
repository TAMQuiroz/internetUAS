@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>
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
                <div class="form-horizontal col-md-8">
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
                        <div class="col-md-11 col-sm-9 col-xs-9">
                            <a href="{{route('grupo.edit', $group->id)}}">
                                <button class="btn btn-success submit pull-right" type="submit">Editar</button>
                            </a>
                            <a href="{{ route('grupo.index') }}" class="btn btn-default pull-right"> Regresar</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
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
                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                    <thead> 
                        <tr class="headings"> 
                            <th>Nombre</th> 
                            <th>Apellido Paterno</th> 
                            <th>Apellido Materno</th> 
                            <th>Especialidad</th> 
                            <th colspan="2">Acciones</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        @foreach($group->investigators as $investigator)
                        <tr> 
                            <td>{{$investigator->nombre}}</td> 
                            <td>{{$investigator->ape_paterno}}</td> 
                            <td>{{$investigator->ape_materno}}</td> 
                            <td>{{$investigator->faculty->Nombre}}</td>
                            <td>
                                <a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>

@endsection