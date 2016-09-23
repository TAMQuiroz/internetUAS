@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> Nuevo Grupo de Investigación</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Información del Grupo</h2>
                    <div class="clearfix"></div>
                </div>
                <form action="{{ route('grupo.store') }}" method="POST" class="form-horizontal" id="formGroup">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="x_content">

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="groupName" class="form-control col-md-7 col-xs-12" type="text"
                                       name="groupName" maxlength="100" required="required"
                                       onkeypress="return isNumberKey(event)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Especialidad <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="facultyName" class="form-control col-md-7 col-xs-12" type="text"
                                       name="facultyName" value="{{ $faculty->Nombre }}"
                                       disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="resizable_textarea form-control" id="groupDescription" maxlength="200" name="groupDescription" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Lider <span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="leaderCode" id="leaderCode" class="form-control" required="required">
                                    <option value="">-- Seleccione --</option>
                                    @foreach( $teachers as $teacher)
                                        <option value="{{$teacher->IdDocente}}">{{$teacher->Nombre}} {{$teacher->ApellidoPaterno}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        </div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <button class="btn btn-success pull-right" type="submit">Guardar</button>
                                <a href="{{ route('grupo.index') }}" class="btn btn-default pull-right">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).on('ready',function(){
            $('#divplan').show();    
        });
    </script>
    <script type="text/javascript">
        $( document ).ready(function(){
            $('#checkboelective').on('click',function(){
                $('#divplan').toggle();
            });
        });
    </script>
    <script src="{{ URL::asset('js/myvalidations/course.js')}}"></script>
    <script src="{{ URL::asset('js/myvalidations/regularprofessors.js')}}"></script>

@endsection