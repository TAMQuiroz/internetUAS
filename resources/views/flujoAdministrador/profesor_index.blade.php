@extends('appWithoutHamburger')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Lista de profesores</h3>
        </div>
    </div>
    


    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(in_array(10, Session::get('actions')))
                            <a href="{{ route('profesor_create.flujoAdministrador', $idEspecialidad) }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo Profesor</a>
                        @endif
                    </div>
                </div>

                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Código</th>
                        <th class="column-title">Nombre</th>
                        <th class="column-title">Correo</th>
                        <th class="column-title">Categoría</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teach)
                        <tr class="even pointer">
                            <td class="a-center " hidden="true">
                                <?php if ($teach->Vigente==1): ?>
                                <span class="label label-success">Activo</span>
                                <?php endif ?>
                                <?php if ($teach->Vigente==0): ?>
                                <span class="label label-danger">Inactivo</span>
                                <?php endif ?>
                            </td>
                            <td class="teacherid" hidden="true">{{$teach->IdDocente}}</td>
                            <td class="teachercode">{{$teach->Codigo}}</td>
                            <td class=" ">{{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</td>
                            <td class="teacherspecialtyId" hidden="true">{{$teach->IdEspecialidad}}</td>
                            <td class="teacherEmail">{{$teach->Correo}}</td>
                            <td class="teacherCategory">{{$teach->Cargo}} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                <br>
                <br>

            </div>
            
            <form action="{{ route('coordinador_store.flujoAdministrador', $idEspecialidad)}}" method="POST" id="formTeacher" name="formTeacher" novalidate="true" class="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                    <div class="form-group">
                        <div class="row">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Coordinador<span class="error">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  required="true" name="coordinador" class="form-control">
                                    <option value="">--Seleccione--</option>
                                    @foreach($teachers as $teach)
                                        <option value= "{{$teach->IdDocente}}">{{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        
                        <br>
                        <div class="separator"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                 <button class="btn btn-success pull-right" type="submit">Siguiente ></button>
                                 <a href="{{ route('facultad_edit.flujoAdministrador', $idEspecialidad) }}" class="btn btn-default">< Atras</a>
                            </div>
                        </div>
                    </div>
                   
                    
                    
            </form>


        </div>
        
        <script src="{{ URL::asset('js/intranetjs/teachers/index-teacher-script.js')}}"></script>
@endsection