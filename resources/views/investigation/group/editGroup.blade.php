@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Edicion de grupos de investigación</h3>
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
                {{Form::open(['route' => ['grupo.update',$group->id],'files'=>true, 'class'=>'form-horizontal col-md-8', 'id'=>'formSuggestion'])}}
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input id="group-code" class="form-control col-md-7 col-xs-12" type="text" name="group-code" value="{{ $group->id }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error"> * </span></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input id="nombre" class="form-control col-md-7 col-xs-12" type="text"
                                   name="nombre" value="{{ $group->nombre }}"
                                   maxlength="100" required="required" onkeypress="return isNumberKey(event)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Especialidad <span class="error">*</span></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input id="facultyName" class="form-control col-md-7 col-xs-12" type="text"
                                   name="facultyName" value="{{ $faculty->Nombre }}"
                                   disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción *</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <textarea class="resizable_textarea form-control" id="descripcion" maxlength="200" name="descripcion" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;">{{$group->descripcion}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Lider <span class="error">*</span></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <select name="lider" id="lider" class="form-control" required="required">
                                @foreach( $teachers as $teacher)
                                 @if($teacher->IdDocente == $group->id_lider)
                                    <option value="{{$teacher->IdDocente}}" selected="">{{$teacher->Nombre}} {{$teacher->ApellidoPaterno}}</option>
                                   @else
                                    <option value="{{$teacher->IdDocente}}">{{$teacher->Nombre}} {{$teacher->ApellidoPaterno}}</option>
                                  @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Imagen <span class="error">*</span></label>
                        <div class="col-md-8">
                            {{Form::file('imagen', ['class'=>'form-control'])}}    
                        </div>
                        
                    </div> 

                    <div class="row">
                        <div class="col-md-11 col-sm-9 col-xs-9">
                            <button class="btn btn-success submit pull-right" type="submit">Guardar</button>
                            <a href="{{ route('grupo.show',$group->id) }}" class="btn btn-default pull-right"> Cancelar</a>
                        </div>
                    </div>
                {{Form::close()}}

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
                <div class="col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Investigadores Elegibles</h3>
                        </div>
                        <div class="panel-body table-scroll">
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
                                    @foreach($investigators as $investigator)
                                    <tr> 
                                        <td>{{$investigator->nombre}}</td> 
                                        <td>{{$investigator->ape_paterno}}</td> 
                                        <td>{{$investigator->ape_materno}}</td> 
                                        <td>{{$investigator->faculty->Nombre}}</td> 
                                        <td>
                                            {{Form::open(['route' => ['grupo.afiliacion.store.investigador'], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                                                <a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
                                                {{Form::button('<i class="fa fa-plus"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit'])}}

                                                {{Form::hidden('id_group',$group->id)}}
                                                {{Form::hidden('id_investigator',$investigator->id)}}
                                            {{Form::close()}}
                                        </td>
                                    </tr> 

                                    @endforeach
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Investigadores Asignados</h3>
                        </div>
                        <div class="panel-body table-scroll">
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
                                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#af{{$investigator->pivot->id}}" title="Quitar"><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr> 

                                    @include('modals.delete', ['id'=> 'af'.$investigator->pivot->id, 'message' => '¿Esta seguro que desea quitar este investigador del grupo?', 'route' => route('grupo.afiliacion.delete.investigador', $investigator->pivot->id)])
                                    @endforeach
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profesores Elegibles</h3>
                        </div>
                        <div class="panel-body table-scroll">
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
                                    @foreach($elegible_teachers as $teacher)
                                    <tr> 
                                        <td>{{$teacher->Nombre}}</td> 
                                        <td>{{$teacher->ApellidoPaterno}}</td> 
                                        <td>{{$teacher->ApellidoMaterno}}</td> 
                                        <td>{{$teacher->faculty->Nombre}}</td> 
                                        <td>
                                            {{Form::open(['route' => ['grupo.afiliacion.store.docente'], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
                                                {{--<a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>--}}
                                                {{Form::button('<i class="fa fa-plus"></i>',['class'=>'btn btn-success btn-xs','type'=>'submit'])}}

                                                {{Form::hidden('id_group',$group->id)}}
                                                {{Form::hidden('id_docente',$teacher->IdDocente)}}
                                            {{Form::close()}}
                                        </td>
                                    </tr> 

                                    @endforeach
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profesores Asignados</h3>
                        </div>
                        <div class="panel-body table-scroll">
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
                                    @foreach($group->teachers as $teacher)
                                    <tr> 
                                        <td>{{$teacher->Nombre}}</td> 
                                        <td>{{$teacher->ApellidoPaterno}}</td> 
                                        <td>{{$teacher->ApellidoMaterno}}</td> 
                                        <td>{{$teacher->faculty->Nombre}}</td>
                                        <td>
                                            {{--<a href="{{route('investigador.show', $investigator->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>--}}
                                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#prf{{$teacher->pivot->id}}" title="Quitar"><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr> 

                                    @include('modals.delete', ['id'=> 'prf'.$teacher->pivot->id, 'message' => '¿Esta seguro que desea quitar este profesor del grupo?', 'route' => route('grupo.afiliacion.delete.docente', $teacher->pivot->id)])
                                    @endforeach
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>

@endsection